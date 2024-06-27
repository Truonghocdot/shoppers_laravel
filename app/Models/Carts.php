<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CouponUsed;
use App\Models\CartItems;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = ['uid','total'] ;

    public function cart_items(){
        return $this->hasMany(CartItems::class,'cart_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function couponUsed() {
        return $this->hasMany(CouponUsed::class,'cart_id','id');
    }
}
