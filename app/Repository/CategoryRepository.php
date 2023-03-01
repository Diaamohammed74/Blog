<?php

namespace App\Repository;

use App\Models\Category;
use App\Repository\CategoryInterface;

class CategoryRepository implements CategoryInterface
{
    public function index(){
        return Category::all();
    }
}