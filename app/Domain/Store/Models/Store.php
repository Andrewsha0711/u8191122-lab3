<?php

namespace App\Domain\Store\Models;

use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model{
    use HasFactory;

    protected $table = 'stores';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $filltable = [
        'name',
        'short_description',
        'description',
        'seller',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function fill($values){
        $this->name = $values['name'] ?? null;
        $this->short_description = $values['short_description'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->seller = $values['seller'] ?? null;
    }

    //TODO : подумать куда перенести или оставить
    public function patch($values){
        $this->name = $values['name'] ?? $this->name;
        $this->short_description = $values['short_description'] ?? $this->short_description;
        $this->description = $values['description'] ?? $this->description;
        $this->seller = $values['seller'] ?? $this->seller;;
    }
}