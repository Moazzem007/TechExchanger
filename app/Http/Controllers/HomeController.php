<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Models\Category;
use App\Models\OrderHistory;
use App\Models\OrderHistry;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        If products are paid for and it does not gets delivered to inventory within 4days of buy date then it will be automatically deleted
        // Start date
        $orders = OrderHistry::all();

        foreach ($orders as $order){
            $date = $order->buyTime;
            $diff = now()->diffInDays(Carbon::parse($date));

            if ($diff>3){
                $product = Product::where('id', '=', $order->product_id)->first();
                $data = array();
                $data['product_refunded'] = 1;
                \Illuminate\Support\Facades\DB::table('order_histries')->where('id', '=' ,$order->id)->update($data);

                $buyer = User::where('id', '=', $order->buyer_id)->first();
                $seller = User::where('id', '=', $order->seller_id)->first();

                $sendmail = $buyer->email;
                $data = ['data' => "We are sorry to inform you that we did not received your ordered product in our inventory. We have refunded the given price of the item in your account. Thank uou. :)"];
                $user['to'] = $sendmail;
                $user['subject'] = "Delivery Cancellation and refund.";
                Mail::send('mail', $data, function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject($user['subject']);
                });

                $sendmail = $seller->email;
                $data = ['data' => "Hello sir, Previously we got an order for your product. But because of your unavailablity we had to cancel the order. Thank uou. :)"];
                $user['to'] = $sendmail;
                $user['subject'] = "Order Cancellation.";
                Mail::send('mail', $data, function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject($user['subject']);
                });
            }
        }

        // End date



    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


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
        $categories = Category::all();
        $products = \Illuminate\Support\Facades\DB::table('products')
            ->orderBy('id', 'DESC')
            ->paginate(15);

        return view('home.userpage', compact('products', 'categories'));
    }

    public function home()
    {
        return view('home.userpage');
    }


    public function allCategories()
    {
        $categories = Category::all();
        return view('products.allCategories', compact('categories'));
    }

    public function buyNow($id)
    {
        $cart = Cart::where('product_id', '=', $id)->first();
        if ($cart){
            $cart->delete();
        }

        $product = Product::where('id', '=', $id)->first();
        return view('home.buyNow', compact('product'));

    }

    public function paymentSuccess(Request $request, $product_id)
    {



        $buyTime = date('Y-m-d');

        $data = array();
        $data['status'] = 1;
        \Illuminate\Support\Facades\DB::table('products')->where('id', '=' ,$product_id)->update($data);

        $product = Product::where('id', '=', $product_id)->first();
        $user = User::where('id', '=', Auth::id())->first();
        $this->myMail($user->email, "Product purchase confirmation!!", "Hello sir,
        We are glad to inform you that you have successfully paid for .$product->brand_name. .$product->model.. Thank you for purchasing this product.
        Next Steps:
        -> First we will call and request the seller to send the product to our warehouse.
        -> Then we will check if the product functions as described.
        -> After checking the functionality if everything works as described then we will deliver the product to you.
        NOTE: If we find the product faulty then we will refund you immediately and the product will be sent to the seller.");
        $data = array();
        $data['product_id'] = $product_id;
        $data['seller_id'] = $product->user_id;
        $data['buyer_id'] = Auth::id();
        $data['brand_name'] = $product->brand_name;
        $data['model'] = $product->model;
        $data['image'] = $product->image1;
        $data['contacted_seller'] = null;
        $data['product_delivered'] = null;
        $data['product_received'] = null;
        $data['buyTime'] = $buyTime;
        \Illuminate\Support\Facades\DB::table('order_histries')->insert($data);
        $userId = Auth::id();
        $order_histries = OrderHistry::where('buyer_id', '=', $userId)->get();



        return view('userDashboard.orderHistry', compact('order_histries'));

    }

    public function orderHistory()
    {
        $userId = Auth::id();
        $order_histries = OrderHistry::where('buyer_id', '=', $userId)->get();

        return view('userDashboard.orderHistry', compact('order_histries'));
    }

    public function downloadInvoice($id)
    {
        $histry_product = OrderHistry::where('id', '=', $id)->first();
        $product = Product::where('id', '=', $histry_product->product_id)->first();
        $buyer = User::where('id', '=', $histry_product->buyer_id)->first();
        $seller = User::where('id', '=', $histry_product->seller_id)->first();

        $buyer_details = new Buyer([
            'name' => $buyer->name,
            'custom_fields' => [
                'email' => $buyer->email,
                'address' => $buyer->address,
                'Phone' => $buyer->mobile_no,
            ],

        ]);

        $seller_details = new Buyer([
            'name' => $seller->name,
            'custom_fields' => [
                'email' => $seller->email,
                'address' => $seller->address,
                'phone' => $seller->mobile_no,
                'product ID' => $histry_product->product_id,
            ],

        ]);

        $itemName = $product->brand_name. ' ' .$product->model;

        $item = (new InvoiceItem())->title($itemName)->pricePerUnit(100);

        $invoice = Invoice::make()
            ->buyer($buyer_details)
            ->seller($seller_details)
            ->shipping(100)
            ->addItem($item)
            ->currencySymbol('Taka ')
            ->currencyCode('BDT')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->logo(public_path('home/img/logo.png'));

        return $invoice->download();



    }


    public function contactPage()
    {
        return view('home.contactPage');
    }
}
