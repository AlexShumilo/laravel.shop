<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ShopController extends Controller
{
    public function getShop($category = NULL) {
        if($category == NULL){
            $products = Product::with('material')->orderBy('created_at', 'desc')->Paginate(6);
        } else {
            $categoryProducts = Category::where('cat_code', $category)->first();
            $products = Product::with('material')->where('category_id', $categoryProducts->id)->orderBy('created_at', 'desc')->Paginate(6);
        }

        return view('shop', ['products'=>$products]);
    }

    public function detail($category, $prod_code) {
        $product = Product::where('prod_code', $prod_code)->first();

        return view('product', ['product'=>$product]);
    }
}
