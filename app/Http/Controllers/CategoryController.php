<?php

namespace App\Http\Controllers;

use App\Models\Category;
// use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\CategoryUpdateRequest;


class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->middleware('auth');
    }
    public function index()
    {

        // $categories = Category::all();

        $categories = $this->categoryRepository->index();

        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {

        // dd('here');
        // dd($id);
        $category = Category::find($id);
        // dd($category);
        return view('categories.show', compact('category'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = $request->validate([
            'name' => 'required|string',
            'image' => 'required',

        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            // dd($imageName);

            $request->image->move(public_path('categoryImages'), $imageName);

            $category = array_merge($category, ['image' => $imageName]);
        }
        // Category::create($category);
        $this->categoryRepository->store($category);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        // $category = Category::find($id);
        $category = $this->categoryRepository->edit($id);

        return view('categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request)
    {
        // $category = Category::find($request->id);
        $category = $this->categoryRepository->edit($request->id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }


    public function delete($id)
    {
        // $category = Category::find($id);
        $category = $this->categoryRepository->edit($id);

        $category->delete();

        return redirect()->route('categories.index');
    }

    public function categoriesCount()
    {
        $categories = Category::get();

        // dd($categories);
        $totalCategories = count($categories);
        // dd($totalCatgories);
        return view('index', compact('totalCategories'));
    }
}
