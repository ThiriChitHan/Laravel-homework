<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function product() {
    $products = Product::all();
    return view('categories.product', compact('products'));
    }

       public function show_detail($id)
    {
        $product = Product::find($id);
        return view('categories.show_detail', compact('product'));
    }

}
