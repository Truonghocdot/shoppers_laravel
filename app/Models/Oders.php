<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OderDetail ;
class Oders extends Model
{
    use HasFactory;
    protected $fillable = ['status','uid','address','userphone','full_name','email','total_money','payment','notes','id'];

    public function detail(){
        return $this->hasMany(OderDetail::class ,'order_id','id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'uid');
    }
}
