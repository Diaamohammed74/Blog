<?php

namespace App\Models;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    // protected $table='sub_categories';
    protected $fillable=[
        'name',
        'category_id',
        'created_at',
        'updated_at'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function article(){
        return $this->hasMany(Article::class);
    }
}
