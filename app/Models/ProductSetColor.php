<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSetColor extends Model
{
    use HasFactory;
    protected $guarded = [];
      public function colorItem(){
    return $this ->belongsTo(ProductColor::class , 'color_id' , 'id');
}
}
