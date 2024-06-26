<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;
    protected $fillable = ['pro_id', 'cart_id', 'count', 'size'];
    public function products(){
        return $this->hasOne(Products::class,"pro_id");
    }

    public function cart(){
        return $this->belongsTo(Carts::class,"cart_id");
    }
    
}
