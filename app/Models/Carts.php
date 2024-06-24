<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartItems;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = ['uid'] ;

    public function cart_items(){
        return $this->hasMany(CartItems::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
