<?php

namespace App\Models;

use App\Models\Tags;
use App\Models\Article_Tag;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    
    protected $fillable=[
        'title',
        'short_description',
        'content',
        'cover',
        'category_id',
        'sub_category_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function tags(){
        return $this->belongsToMany(Tags::class,'article_tag','article_id','tag_id');
    }



    public function title():Attribute
    {
        return Attribute::make(
            get:fn($value)=>ucfirst($value)
        );
    }

}
