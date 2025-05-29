<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //product = route name
    public function index() {
     //Model data   
    $products = Product::all();
    return view('products.index', compact('products'));
    }

       public function show_detail($id)
    {
        $product = Product::find($id);
        return view('products.show_detail', compact('product'));
    }

}
