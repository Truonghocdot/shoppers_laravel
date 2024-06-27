<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Oders ;

class OderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','count','pro_id','size'];

    public function order(){
        return $this->belongsTo(Oders::class,'order_id','id');
    }
}
