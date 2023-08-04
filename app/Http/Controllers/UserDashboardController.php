<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('userDashboard.userProfile', compact('user'));
    }

    public function userProducts()
    {
        $userId = Auth::id();
        $products = Product::where('user_id', 'LIKE', $userId)->paginate(15);
        $categories = Category::all();
        return view('userDashboard.userProducts', compact('products', 'categories'));
    }

    public function editUserProducts($id)
    {
        $product = Product::where('id', 'LIKE', $id)->first();
        $categories = Category::all();


        return view('userDashboard.productEdit', compact('product', 'categories'));
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
        return redirect()->route('user.products');
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
        return redirect()->back();
    }

    public function userCart()
    {
        $userId = Auth::id();
        $cartProducts = Cart::where('user_id', '=', $userId)->get();
        $products = Product::all();
        $categories = Category::all();
        return view('userDashboard.userCart', compact('cartProducts', 'products', 'categories'));

    }
}
