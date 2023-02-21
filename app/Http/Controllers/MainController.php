<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(){
        $users=User::all();
        $articles=Article::all();
        $categories=Category::all();
        return view('admin.index',compact(['users','articles','categories']));
    }
}
