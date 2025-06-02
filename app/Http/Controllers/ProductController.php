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
        $products = Product::find($id);
        return view('products.show_detail', compact('products'));
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('products.edit',compact('products'));
    }

    public function update(Request $request)
    {
        $products = Product::find($request->id);
        $products->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect()->route('products.index');
    }

    public function create(){

         return view('products.create');
    }

     public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect()->route('products.index');
    
    }

     public function delete($id)
    {
        $products = Product::find($id);

        $products->delete();

        return redirect()->route('products.index');
    }

    
}
