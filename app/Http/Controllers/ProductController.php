<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function show($cat, $product_id){
        $item = Product::where('id', $product_id)->first();

        return view('product.show', ['item' => $item]);


    }

    public function showCategory(){

    }
}
