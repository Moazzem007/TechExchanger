<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

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
        return view('products.allCategories');
    }
}
