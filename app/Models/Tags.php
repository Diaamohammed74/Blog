<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tags extends Model
{
    use HasFactory;
    public function articles(){
        return $this->belongsToMany(Article::class,'article_tag','article_id','tag_id');
    }
}
