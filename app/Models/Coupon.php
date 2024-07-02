<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CouponUsed ;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['content','value','role','count','code'];
    public function used(){
        return $this->hasMany(CouponUsed::class,'coupon_id','id');
    }
}
