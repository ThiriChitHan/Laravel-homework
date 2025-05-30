<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('welcome');
});

//Static Route
Route::get('/blogs', function () {
    return "This is Blog.";
});
//Dynamic Route
Route::get('/blogs/{id}', function ($id) {
    return "This is Blog Details - $id";
});

// //Naming Route
// Route::get('/dashboard', function() {
//     return "Welcom Tpp";
// })->name('dashboard.tpp');

// Route::get('/tpp',function(){
//     return redirect()->route('dashboard.tpp');
// });

//Group Route
Route::prefix('/dashboard')->group(function () {
    Route::get('/admin', function () {
        return "This is Admin Dashboard";
    });
    Route::get('/user', function () {
        return "This is User Dashboard";
    })->name('user');
    Route::get('/tpp', function () {
        return redirect()->route('user');
    });
});

// Route::get('/categories',function(){
//     return view("categories.index");
// });
Route::get('/categories', [CategoryController::class, 'index']);

//Articles
Route::get('/articledata', [ArticleController::class, 'index'])->name('articles.index');

//Articles Create
Route::get('/articledata/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articledata/store',[ArticleController::class,'store'])->name('articles.store');

//Articles Delete
Route::post('/articledata/{id}/delete',[ArticleController::class,'delete'])->name('articles.delete');

//Articles Show
Route::get('/articledata/{id}', [ArticleController::class, 'show'])->name('articles.show');

//Articles edit & update
Route::get('/articledata/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::post('/articledata/{id}/update', [ArticleController::class, 'update'])->name('articles.update');



//Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

//Products Create
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');

//Products Delete
Route::post('/products/{id}/delete',[ProductController::class,'delete'])->name('products.delete');

//Products edit&update
Route::get('/products/{id}/edit' , [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}/update' , [ProductController::class, 'update'])->name('products.update');

//Products show
Route::get('/products/{id}', [ProductController::class, 'show_detail'])->name('products.show');


