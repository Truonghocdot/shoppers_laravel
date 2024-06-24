<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Categories; 

class Products extends Model
{
    use HasFactory;
    public function category(){
        return $this->beLongsTo(Categories::class,'cat_id');
    }   
    protected $fillable = ['title', 'description', 'image','price','cat_id','count','promotion_price'];
    public $timestamps = true;
    
}
