<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        "image_id",
        "category_id"
    ];

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

   /* public function carts(){
        return $this->belongsTo(Category::class);
    }*/



}
