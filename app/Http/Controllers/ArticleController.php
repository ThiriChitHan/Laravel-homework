<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;;

class ArticleController extends Controller
{
    public function userdata()
    {
        $userdata = Article::all();
        return view('categories.article', compact('userdata'));
    }
    public function show($id)
    {
        // dd('here');
        // dd($id);
        $userdata = Article::find($id);

        // dd($category);
        return view('categories.show', compact('userdata'));
    }
}
