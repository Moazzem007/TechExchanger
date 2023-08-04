<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart($productId)
    {
        $userId = Auth::id();
        $data = array();
        $data['user_id'] = $userId;
        $data['product_id'] = $productId;
        DB::table('carts')->insert($data);
        return redirect()->back()->with('success', 'Added to cart.');
    }

    public function deleteFromCart($productId)
    {
        $product = Cart::where('product_id', '=', $productId)->first();
        $product->delete();
        return redirect()->back();
    }
}
