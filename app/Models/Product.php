<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
public function ratings(){
        return $this->hasmany(Review::class);
    }
    public function colors(){
        return $this->hasmany(ProductSetColor::class)->with("colorItem");
    }
    public function category(){
        return $this->hasOne(Category::class , 'id' , 'category_id');
    }
    public function sizes(){
        return $this->hasmany(ProductSetSize::class)->with("sizeItem");
    }
    public function images(){
        return $this->hasMany(ProductImage::class) ;
    }
    public function reviews(){
        return $this->hasMany(Review::class , 'product_id' , 'id')->latest()->take(5)->with('client');
    }
    public function reviewsCount(){
        return $this->hasMany(Review::class , 'product_id' , 'id');
    }
    public function partner(){
        return $this->hasMany(Review::class , 'product_id' , 'id');
    }
}
