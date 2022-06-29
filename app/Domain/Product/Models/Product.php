<?php

namespace App\Domain\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $filltable = [
        'name',
        'short_description',
        'description',
        'actual_price',
        'discount'
    ];

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function fill($values){
        $this->name = $values['name'] ?? null;
        $this->short_description = $values['short_description'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->actual_price = $values['actual_price'] ?? null;
        $this->discount = $values['discount'] ?? null;
        $this->store_id = $values['store_id'] ?? null;
    }
    
    public function patch($values){
        $this->name = $values['name'] ?? $this->name;
        $this->short_description = $values['short_description'] ?? $this->short_description;
        $this->description = $values['description'] ?? $this->description;
        $this->actual_price = $values['actual_price'] ?? $this->actual_price;
        $this->discount = $values['discount'] ?? $this->discount;
        $this->store_id = $values['store_id'] ?? $this->store_id;
    }
}