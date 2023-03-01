<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];
    public $timestanps=false;

    public function name():Attribute
    {
        return Attribute::make(
            get:fn ($value)=>ucfirst($value ),
            // get:fn ($value)=>sort($value ),
        );
    }
    public function articles(){
            return $this->hasMany(Article::class);
    }
    public function subcategory(){
        return $this->hasMany(SubCategory::class);
    }
    
}
