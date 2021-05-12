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

    public function showCategory(Request $request, $cat_alias){

        $category = Category::where('alias', $cat_alias)->first();

        $products = Product::where('category_id', $category->id)->get();

        if (isset($request->orderBy)) {
          if ($request->orderBy == 'price-low-high') {
            $products = Product::where('category_id', $category->id)->orderBy('price')->get();
          }

          if ($request->orderBy == 'price-high-low') {
            $products = Product::where('category_id', $category->id)->orderBy('price', 'desc')->get();
          }
          if ($request->orderBy == 'name-a-z') {
            $products = Product::where('category_id', $category->id)->orderBy('title')->get();
          }
          if ($request->orderBy == 'name-z-a') {
            $products = Product::where('category_id', $category->id)->orderBy('title', 'desc')->get();
          }
        }

        if ($request->ajax()) {
            return view('ajax.order-by', [
                'products' => $products
            ])->render();

        }
        return view('categories.index', [
          'cat' => $category,
          'products' => $products,
        ]);

    }
}
