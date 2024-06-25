<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products ;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['pro_id','uid'];

    public function products(){
        return $this->hasOne(Products::class,'id','pro_id');
    }
}
