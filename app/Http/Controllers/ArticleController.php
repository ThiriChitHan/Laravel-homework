<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articledata = Article::all();
        return view('articles.index', compact('articledata'));
    }
    public function show($id)
    {
        // dd('here');
        // dd($id);
        $articledata = Article::find($id);
        // dd($category);
        return view('articles.show', compact('articledata'));
    }
    public function edit($id)
    {
        // dd('here');
        $articles = Article::find($id);
        return view('articles.edit', compact('articles'));
    }
    public function update(Request $request)
    {
        $articledata = Article::find($request->id);
        $articledata->update([
            'name' => $request->name,
        ]);
        return redirect()->route('articles.index');
    }
    public function create()
    {
        // dd('here');
        return view('articles.create');
    }
    public function store(Request $request)
    {
        Article::create([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->route('articles.index');
    
    }
    public function delete($id)
    {
        $articledata = Article::find($id);

        $articledata->delete();

        return redirect()->route('articles.index');
    }

}
