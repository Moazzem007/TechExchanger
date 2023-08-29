<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Delivery;
use App\Models\Inventory;
use App\Models\OrderHistry;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{


    public function myMail($sendmail, $subject, $description)
    {
        $data = ['data' => $description];
        $user['to'] = $sendmail;
        $user['subject'] = $subject;
        Mail::send('mail', $data, function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject($user['subject']);
        });
    }
    public function index()
    {
        return view('adminDashboard.adminLogin');
    }

    public function adminDashboard(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if($email == "admin@gmail.com"){
            if ($password == 'admin123'){
                return view('adminDashboard.adminDashboard');
            }
        }
    }

    public function allUsers()
    {
        $users = User::all();
        return view('adminDashboard.allUsers', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('adminDashboard.editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['mobile_no'] = $request->mobile_no;
        $data['address'] = $request->address;

        DB::table('users')->where('id', $id)->update($data);
        $users = User::all();
        return view('adminDashboard.allUsers', compact('users'));
    }

    public function allProducts()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('adminDashboard.allProducts', compact('products', 'categories'));
    }


    public function editAdminProducts($id)
    {
        $product = Product::where('id', 'LIKE', $id)->first();
        $categories = Category::all();


        return view('adminDashboard.productEdit', compact('product', 'categories'));
    }

    public function productUpdate(Request $request, $id)
    {

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['condition'] = $request->condition;
        $data['authenticity'] = $request->authenticity;
        $data['brand_name'] = $request->brand_name;
        $data['model'] = $request->model;
        $data['release_date'] = $request->release_date;
        $data['features'] = $request->features;
        $data['description'] = $request->description;
        $data['price'] = $request->price;

        if ($request->image1){
            $image1 = $request->image1;
            if (File::exists($request->old_image_1)){
                File::delete($request->old_image_1);
            }
            $uniqueID = \Illuminate\Support\Str::random(20);
            $photo1name = $uniqueID.'.'.$image1->getClientOriginalExtension();
            $target = public_path('media/'.$photo1name);
            Image::make($image1)->fit(400,600)->save($target);
            $data['image1'] = 'media/'.$photo1name;
        }

        if ($request->image2){
            $image2 = $request->image2;
            if (File::exists($request->old_image_2)){
                File::delete($request->old_image_2);
            }
            $uniqueID = \Illuminate\Support\Str::random(20);
            $photo2name = $uniqueID.'.'.$image2->getClientOriginalExtension();
            $target = public_path('media/'.$photo2name);
            Image::make($image2)->fit(400,600)->save($target);
            $data['image2'] = 'media/'.$photo2name;
        }

        if ($request->image3){
            $image3 = $request->image3;
            if (File::exists($request->old_image_3)){
                File::delete($request->old_image_3);
            }
            $uniqueID = \Illuminate\Support\Str::random(20);
            $photo3name = $uniqueID.'.'.$image3->getClientOriginalExtension();
            $target = public_path('media/'.$photo3name);
            Image::make($image3)->fit(400,600)->save($target);
            $data['image3'] = 'media/'.$photo3name;
        }



        DB::table('products')->where('id', $id)->update($data);
        $products = Product::all();
        $categories = Category::all();
        return view('adminDashboard.allProducts', compact('products', 'categories'));
    }

    public function productDelete($id)
    {
        $product = Product::where('id', '=', $id)->first();
        if ($product->image1){
            if (File::exists($product->image1)){
                File::delete($product->image1);
            }
        }
        if ($product->image2){
            if (File::exists($product->image2)){
                File::delete($product->image2);
            }
        }
        if ($product->image){
            if (File::exists($product->image)){
                File::delete($product->image);
            }
        }

        $product->delete();


        $products = Product::all();
        $categories = Category::all();
        return view('adminDashboard.allProducts', compact('products', 'categories'));
    }

    public function allCategories()
    {
        $categories = Category::all();
        return view('adminDashboard.allCategories', compact('categories'));
    }

    public function addCategory()
    {
        return view('adminDashboard.addCategory');
    }

    public function storeCategory(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        DB::table('categories')->insert($data);
        $categories = Category::all();
        return view('adminDashboard.allCategories', compact('categories'));
    }

    public function deleteCategory($id)
    {
        $category = Category::where('id', '=', $id)->first();
        if ($category) {
            $category->delete();
        }
        $categories = Category::all();
        return view('adminDashboard.allCategories', compact('categories'));
    }

    public function editCategory($id)
    {
        $category = Category::where('id', '=', $id)->first();
        return view('adminDashboard.editCategory', compact('category'));
    }

    public function updateCategory(Request$request, $id)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        DB::table('categories')->where('id',$id)->update($data);
        $categories = Category::all();
        return view('adminDashboard.allCategories', compact('categories'));
    }

    public function requestDelivery()
    {
        $order_histries = OrderHistry::all();
        $users = User::all();
        return view('adminDashboard.requestDelivery', compact('order_histries', 'users'));
    }

    public function contactedSeller($id)
    {

        $order = OrderHistry::where('id', '=', $id)->first();
        $buyer = User::Where('id', '=', $order->buyer_id)->first();
        $seller = User::Where('id', '=', $order->seller_id)->first();
        $buyer_mail = $buyer->email;
        $seller_mail = $seller->email;
//        email to buyer
        $this->myMail($buyer_mail, "Successfully contacted seller", "Hello sir,
        We are glad to inform you that we have contacted the seller for for .$order->brand_name. .$order->model..
         We will let you know about he update as soon as possible. Thank you :)");
//        email to seller
        $this->myMail($seller_mail, "Request for .$order->brand_name. .$order->model..", "Hello sir,
        We are glad to inform you one of our sellers has requested to buy .$order->brand_name. .$order->model.. Which you have listed to sell on our platform. Now you have to pack the product in a box with the product ID which is .$order->product_id.. Write it clearly on the top of your box and send it to this address via courier. Name: Sifat. Mobile: 01719811582 Address: House - 19, Road - 8, Nikunja - 2, Khilkhet, Dhaka.
          Thank you :)");



        $data = array();
        $data['contacted_seller'] = 1;
        DB::table('order_histries')->where('id', '=' ,$id)->update($data);
        return redirect()->back();
    }

    public function productRefund($id)
    {

        $order = OrderHistry::where('id', '=', $id)->first();
        $buyer = User::Where('id', '=', $order->buyer_id)->first();
        $seller = User::Where('id', '=', $order->seller_id)->first();
        $buyer_mail = $buyer->email;
        $seller_mail = $seller->email;
//      email to buyer
        $this->myMail($buyer_mail, "Successfully contacted seller", "Hello sir,
        We are sorry to inform you that we have contacted the seller for for .$order->brand_name. .$order->model. and the seller is unavailable or unable to send the product.
        We have refunded the full amount of the product to your account. Thank you :)");
//      email to seller
        $this->myMail($seller_mail, "Request for .$order->brand_name. .$order->model..", "Hello sir,
        We are sorry to inform you one of our sellers had requested to buy .$order->brand_name. .$order->model.. Which you had listed to sell on our platform. But we could not contact you. That is why we are cancelling the order. Thank you. :)");


        $data = array();
        $data['product_refunded'] = 1;
        DB::table('order_histries')->where('id', '=' ,$id)->update($data);
        $product = DB::table('order_histries')->where('id', '=' ,$id)->first();
        $data = array();
        $data['product_id'] = $product->product_id;
        $data['seller_id'] = $product->seller_id;
        $data['buyer_id'] = $product->buyer_id;
        $data['brand_name'] = $product->brand_name;
        $data['model'] = $product->model;
        $data['image'] = $product->image;
        $data['contacted_seller'] = $product->contacted_seller;
        $data['product_delivered'] = $product->product_delivered;
        $data['product_received'] = $product->product_received;
        $data['product_refunded'] = $product->product_refunded;
        $data['buyTime'] = $product->buyTime;
        DB::table('returns')->insert($data);
        return redirect()->back();
    }

    public function adminInventory()
    {
        $inventory_products = Inventory::all();
        $users = User::all();
        return view('adminDashboard.inventory', compact('inventory_products', 'users') );
    }

    public function addInventory(Request $request)
    {
        $productId = $request->productId;

        $order = OrderHistry::where('product_id', '=', $productId)->first();
        $buyer = User::Where('id', '=', $order->buyer_id)->first();
        $seller = User::Where('id', '=', $order->seller_id)->first();
        $buyer_mail = $buyer->email;
        $seller_mail = $seller->email;
//      email to buyer
        $this->myMail($buyer_mail, "Item reached our inventory!!", "Hello sir,
        We are glad to inform you that your product .$order->brand_name. .$order->model. has been received in our inventory.
        Currently we are checking the product. We will let you know via email when we send the product on your way. Thank you :)");
//      email to seller
        $this->myMail($seller_mail, "Request for .$order->brand_name. .$order->model..", "Hello sir,
        We are glad to inform you that your product: .$order->brand_name. .$order->model.. Has veen received in our inventory.
        We will let you know via email whether we send the product to the customer or if it gets rejected and goes back to you. Thank you. :)");





        $product = OrderHistry::where('product_id', '=', $productId)->first();
        $data = array();
        $data['product_id'] = $productId;
        $data['seller_id'] = $product->seller_id;
        $data['buyer_id'] = $product->buyer_id;
        $data['brand_name'] = $product->brand_name;
        $data['model'] = $product->model;
        $data['image'] = $product->image;
        $data['contacted_seller'] = $product->contacted_seller;
        $data['product_delivered'] = $product->product_delivered;
        $data['product_received'] = 1;
        $data['product_refunded'] = $product->product_refunded;
        $data['buyTime'] = $product->buyTime;
        DB::table('inventories')->insert($data);

        $inventory_products = Inventory::all();
        $users = User::all();
        return view('adminDashboard.inventory', compact('inventory_products', 'users') );
    }

    public function productDelivered($id)
    {
        $order = OrderHistry::where('product_id', '=', $id)->first();
        $product = Product::where('id', '=', $id)->first();
        $buyer = User::Where('id', '=', $order->buyer_id)->first();
        $seller = User::Where('id', '=', $order->seller_id)->first();
        $buyer_mail = $buyer->email;
        $seller_mail = $seller->email;
//      email to buyer
        $this->myMail($buyer_mail, "Product is on your route!!", "Hello sir,
        We are glad to inform you that your product .$order->brand_name. .$order->model. has been cleared as functional from our inventory.
        We have send the product in the courier service. You will received it in 1-3 business days. Thank you :)");
//      email to seller
        $this->myMail($seller_mail, "Request for .$order->brand_name. .$order->model..", "Hello sir,
        We are glad to inform you that your product: .$order->brand_name. .$order->model.. Has been cleared as functional from our inventory.
        We have already paid the amount for the product which is Taka $product->price. Thank you. :)");




        $data = array();
        $data['product_delivered'] = 1;
        DB::table('order_histries')->where('product_id', '=' ,$id)->update($data);
        DB::table('inventories')->where('product_id', '=' ,$id)->update($data);
        $product = OrderHistry::where('product_id', '=', $id)->first();
        $data = array();
        $data['product_id'] = $product->product_id;
        $data['seller_id'] = $product->seller_id;
        $data['buyer_id'] = $product->buyer_id;
        $data['brand_name'] = $product->brand_name;
        $data['model'] = $product->model;
        $data['image'] = $product->image;
        $data['contacted_seller'] = $product->contacted_seller;
        $data['product_delivered'] = 1;
        $data['product_received'] = $product->product_received;
        $data['product_refunded'] = $product->product_refunded;
        $data['buyTime'] = $product->buyTime;
        DB::table('deliveries')->insert($data);
        $inventory_products = Inventory::all();
        $users = User::all();
        return view('adminDashboard.inventory', compact('inventory_products', 'users') );
    }

    public function deliveredPage()
    {
        $deliveredProducts = Delivery::all();
        $users = User::all();
        return view('adminDashboard.delivered', compact('deliveredProducts', 'users') );
    }

    public function refundedPage()
    {
        $products = DB::table('returns')->get();
        $users = User::all();
        return view('adminDashboard.refunded', compact('products', 'users') );
    }

}
