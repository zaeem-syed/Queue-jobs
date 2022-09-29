<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //


    public function index()
    {
        return Product::with('category:id,name')->get();
    }



    public function purchase(Request $request)
    {

    }


    public function show(Product $product)
    {
        $currentURL = url()->current();
        $current=explode("/",$currentURL);
        $product=Product::where('slug',$current[4])->get();
        return view('show')->with('product',$product);


    }
}
