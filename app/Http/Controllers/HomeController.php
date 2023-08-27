<?php

namespace App\Http\Controllers;


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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
}
