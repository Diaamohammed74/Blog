<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;

// use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $articles=Article::with('category')->get();
        $categories=Category::get();
        return view('site.index',compact('articles','categories'));
    }
    public function ShowBlog($id){
        $article=Article::findOrFail($id);
        // dd($article->user->name);
        return view('site.showblog',compact('article'));
    }
    public function ShowByCategory($id){
        $categories=Category::get();
        $articles=Article::where('category_id','=',$id)->get();
        // dd($article,$categories);
        return view('site.index',compact('articles','categories'));
    }
}
