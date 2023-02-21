<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        dd($articles);
        // $articles = Article::orderByRaw('LENGTH(title)')->get();



        return view('admin.articles.articles-index',compact('articles'));
    }

    public function create()
    {
        $categories=Category::paginate(); // to show categories in creation page
        return view('admin.articles.articles-create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required|max:40|min:3",
            'short_description'=>"required|max:160|min:50",
            'content'=>"required|max:800|min:160",
            'select'=>"required",
            'cover' => ['required', 'image', 'max:2048'] 
        ]);

        $image=$request->file('cover')
        ->getClientOriginalName(); // to get the original name of the photo
        $path=$request->file('cover')
        ->storeAs(
            'articles',$image,'blog'
            /*     file     original name      disk
                            of the photo  
            */
        );

        $article=Article::create([
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'content'=>$request->content,
            'category_id'=>$request->select,
            'cover'=>$path,
            'user_id' => auth()->user()->id
        ]);
        
        return back()->with('success'," $article->title Article Posted Successfuly");
    }


    public function show($id)
    {
        $article=Article::find($id);
        return view('admin.articles.articles-show',compact('article'));
    }

    public function edit($id)
    {
        $article=Article::find($id);
        // dd($article->cover);
        $categories=Category::all();
        return view('admin.articles.articles-edit',compact(['article','categories']));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>"required|max:40|min:3",
            'short_description'=>"required|max:160|min:50",
            'content'=>"required|max:800|min:160",
            'cover' => ['required,image', 'max:2048'] 
        ]);
        if ($request->hasFile('cover'))
        {
            $image=$request->file('cover')->getClientOriginalName();
            $path=$request->file('cover')->storeAs(
                'articles',$image,'blog');
            DB::table('articles')->where('id', '=', $id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'content' => $request->content,
                'category_id'=>$request->select,
                'cover' => $path
            ]);
        } 
        else
        {
            DB::table('articles')->where('id', '=', $id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'content' => $request->content,
                'category_id'=>$request->select
            ]);
        }
        return redirect('admin/articles')->with('success','Article Updated Successfuly');
    }

    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();
        return back()->with('deleted',"$article->title Deleted Successfuly");
    }
}
