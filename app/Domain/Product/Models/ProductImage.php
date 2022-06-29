<?php

namespace App\Domain\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model{
    use HasFactory;

    protected $table = 'product_images';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $filltable = [
        'url'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}