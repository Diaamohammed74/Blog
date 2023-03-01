<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.articles.articles-index',compact('articles'));
    }

    public function create()
    {
        $categories = Category::with('subcategory')->get();
        $tags=Tags::get();
        return view('admin.articles.articles-create',compact('categories','tags'));
    }


    public function getByCategory(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->category_id)->get();

        return response()->json($subcategories);
    }

    public function autocomplete(Request $request){
        $res = Tags::select("name")
            ->where("name","LIKE","%{$request->term}%")
            ->get();
        return response()->json($res);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required|max:40|min:3",
            'short_description'=>"required|max:160|min:20",
            'content'=>"required|min:20",
            'category'=>"required",
            'subcategory'=>"required",
            'tags' => 'required|array|min:1',
            'tags.*' => 'required|string',
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

        Article::create([
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'content'=>$request->content,
            'cover'=>$path,
            'category_id'=>$request->category,
            'sub_category_id'=>$request->subcategory,
            'user_id' => auth()->user()->id
        ]);
        $article_id = Article::latest('id')->first()->id;
        foreach ($request->tags as $tag)
        {
        DB::table('article_tag')
        ->insert([
            'article_id' => $article_id ,
            'tag_id' => $tag
            ] );
        }


        return back()->with('success',"Article Posted Successfuly");
    }


    public function show($id)
    {
        $article=Article::find($id);
        return view('admin.articles.articles-show',compact('article'));
    }

    public function edit($id)
    {
        $article=Article::with(['subcategory','tags'])->find($id);
        $categories = Category::get();
        $subcategories=SubCategory::get();
        $tags = Tags::with('articles')->get();
        return view('admin.articles.articles-edit', [
            'article' => $article,
            'categories' => $categories,
            'tags' => $tags,
            'subcategories' => $subcategories,
        ]);
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|max:40|min:3',
            'short_description' => 'required|max:160|min:20',
            'content' => 'required|min:20',
            'category' => 'required',
            'subcategory' => 'required',
            'tags' => 'required|array|min:1',
            'tags.*' => 'required|string',
            //'.*'-> each element of the array is validated individually
            'cover' => 'sometimes|required|image|max:2048'
        ]);
        $article=Article::findOrFail($id);
        if ($request->hasFile('cover'))
        {
            $image = $request->file('cover')->getClientOriginalName();
            $path = $request->file('cover')->storeAs('articles', $image, 'blog');
            DB::table('articles')->where('id', '=', $id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'content' => $request->content,
                'category_id' => $request->category,
                'sub_category_id' => $request->subcategory,
                'cover' => $path
            ]);
        } 
        else
        {
            DB::table('articles')->where('id', '=', $id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'content' => $request->content,
                'category_id' => $request->category,
                'sub_category_id' => $request->subcategory
            ]);
        }
        $article->tags()->sync($request->tags);

        return redirect('admin/articles')->with('success', 'Article Updated Successfully');
        
    }

    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();
        return back()->with('deleted',"$article->title Deleted Successfuly");
    }
}