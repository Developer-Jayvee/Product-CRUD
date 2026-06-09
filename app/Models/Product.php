<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[UseFactory(ProductFactory::class)]
class Product extends Model
{
    protected $table = "products_table";

    protected $fillable = [
        'product_name' , 'product_description' , 'quantity' , 'price' , 'status'
    ];


    protected $casts = [
        'price' => 'float'
    ];
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class,'product_id');
    }

}
