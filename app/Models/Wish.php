<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    use HasFactory;
     protected $guarded = [];
    public function product(){
        return $this->hasOne(Product::class, 'id' ,'product_id');
    }
    public function size(){
        return $this->hasOne(ProductSize::class, 'id' ,'size_id');
    }
    public function color(){
        return $this->hasOne(ProductColor::class, 'id' ,'color_id');

    }
}
