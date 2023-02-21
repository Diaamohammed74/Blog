<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    
    protected $fillable=[
        'title',
        'short_description',
        'content',
        'category_id',
        'user_id',
        'cover',
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

    public function title():Attribute
    {
        return Attribute::make(
            get:fn($value)=>ucfirst($value)
        );
    }

}
