<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class ProductController extends BaseController
{

    protected $productRepository;
    protected $categoryRepository;
    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        // $this->middleware('permission:productList', ['only' => ['index']]);
        // $this->middleware('permission:productCreate', ['only' => ['store']]);
        // $this->middleware('permission:productUpdate', ['only' => ['update']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productRepository->index();
        // dd($products);
        $data = ProductResource::collection($products);
        return $this->success($data, "Products Retrieved Successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'category_id' => 'required|exists:categoryies,id',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'required',
            'status' => 'required',

        ]);

        if ($validation->fails()) {
            $this->error("Validation Error", $validation->errors(), 422);
        }

        if ($request->hasFile('image')) {
            $imageName = time() . $request->image->extension();

            $request->image->move(public_path('productImage'), $imageName);
        }

        //    $products = Product::create([
        //         'name' => $request->name,
        //         'description' => $request->description,
        //         'price' => $request->price,
        //         'image' => $imageName,
        //         'category_id' => $request->category_id,
        //     ]);

        $products = $this->productRepository->store([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
            'category_id' => $request->category_id,
            'status' => $request->status ? 1 : 0,
        ]);
        return $this->success($products, "Products Created Successfully", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = $this->productRepository->edit($id);
        $data = new ProductResource($products);
        return  $this->success($data, "Product Show Successfully", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        if ($validation->fails()) {
            $this->error("Validation Error", $validation->errors(), 422);
        }
        $products = $this->productRepository->edit($id);
        $products->update($request->all());

        return $this->success($products, "Products Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = $this->productRepository->edit($id);
        $products->delete();
        return  $this->success(null, "Delete Successfully", 200);
    }
}
