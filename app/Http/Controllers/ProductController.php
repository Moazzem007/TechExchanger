<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;




class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('products.productcreate', compact('categories'));
    }

    public function store(Request $request)
    {


        $randomNumber = random_int(100000, 999999);
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['user_id'] = Auth::id();
        $data['condition'] = $request->condition;
        $data['authenticity'] = $request->authenticity;
        $data['brand_name'] = $request->brand_name;
        $data['model'] = $request->model;
        $data['unique_id'] = $randomNumber;
        $data['release_date'] = $request->release_date;
        $data['features'] = $request->features;
        $data['description'] = $request->description;
        $data['price'] = $request->price;


        if ($request->image1){
            $uniqueID = \Illuminate\Support\Str::random(20);
            $photo1 = $request->image1;
            $photo1name = $uniqueID.'.'.$photo1->getClientOriginalExtension();
            $target = public_path('media/'.$photo1name);
            Image::make($photo1)->fit(400,600)->save($target);
            $data['image1'] = 'media/'.$photo1name;
        }

        if ($request->image2){
            $uniqueID = \Illuminate\Support\Str::random(20);
            $photo2 = $request->image1;
            $photo2name = $uniqueID.'.'.$photo2->getClientOriginalExtension();
            $target = public_path('media/'.$photo2name);
            Image::make($photo2)->fit(400,600)->save($target);
            $data['image2'] = 'media/'.$photo2name;

        }

        if ($request->image3){
            $uniqueID = \Illuminate\Support\Str::random(20);
            $photo3 = $request->image3;
            $photo3name = $uniqueID.'.'.$photo3->getClientOriginalExtension();
            $target = public_path('media'.$photo3name);
            Image::make($photo3)->fit(400,600)->save($target);
            $data['image3'] = 'media.\.'.$photo3name;
        }


        DB::table('products')->insert($data);
        return redirect()->route('user.products');






    }


    public function allProducts()
    {
        $products = Product::paginate(15);
        $categories = Category::all();
        return view('products.allproducts', compact('products', 'categories'));
    }


    public function singleProduct($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.singleProduct', compact('product', 'categories'));
    }


    public function search(Request $request)
    {

        $search = $request['search'];
        if ($search != ''){
            $products = Product::where('brand_name', 'LIKE', "%$search%")->paginate(15);
            $counted = Product::where('brand_name', 'LIKE', "%$search%")->count();
            if ($counted == 0){
                $products = Product::where('model', 'LIKE', "%$search%")->paginate(15);
                $counted = Product::where('model', 'LIKE', "%$search%")->count();

            }
            if ($counted == 0){
                $products = Product::where('features', 'LIKE', "%$search%")->paginate(15);
                $counted = Product::where('features', 'LIKE', "%$search%")->count();

            }
            if ($counted == 0){
                $products = Product::where('description', 'LIKE', "%$search%")->paginate(15);
                $counted = Product::where('features', 'LIKE', "%$search%")->count();
            }
            if ($counted == 0){
                $products = Product::where('category_id', '=', $search)->paginate(15);
            }

        }else{
            $products = Product::paginate(15);
        }
        $categories = Category::all();

        return view('products.allproducts', compact('products', 'categories'));

    }
}
