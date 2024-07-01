<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Products;

class TypeProduct extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['title', 'thumbnail'];
    public function product(){
        return $this->hasMany(Products::class,"cat_id","id");
    }
}
