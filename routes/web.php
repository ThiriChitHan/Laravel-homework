<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});

// // Static Route
// Route::get('/blogs', function(){
//     return "This is Blog.";
// });

// // Dynamic Route
// Route::get('/blogs/{id}', function($id){
//     return "This is Blog Details - $id";
// });

// // // Naming Route
// // Route::get('/dashboard', function(){
// //     return "Welcome TPP";
// // })->name('dashboard.tpp');

// // Route::get('/tpp', function(){
// //     return redirect()->route('dashboard.tpp');
// // });

// // Group Route
// Route::prefix('/dashboard')->group(function(){
//     Route::get('/admin', function(){
//         return "This is Admin Dashboard";
//     });

//     Route::get('/user', function(){
//         return "This is User Dashabord";
//     })->name('user');

//     Route::get('/tpp', function(){
//         return redirect()->route('user');
//     });
// });


//Category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
//Create & Store Category Route
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

//Show Category Route
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');


//Edit & Update Category Route
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

//Delete Category Route
Route::post('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
//Article Route
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

//Products Route
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
//Create & Store Products Route
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
//Show Products Route
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
//Edit & Update Products Route 
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
//Delete Products Route
Route::post('/products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');



// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User Route
Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Create&Store User Route
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
//Show User Route
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
//Edit & Update User Route
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
//Delete User Route
Route::post('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');

Auth::routes(['register' => false]);

Route::post('/users/{id}/stauts', [UserController::class, 'userStatus'])->name('users.status');
