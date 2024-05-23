<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
     protected $guarded = [];
       public function client(){
        return $this->hasOne(Client::class , 'id' , 'client_id');
    }
}
