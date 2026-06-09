<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UseFactory(OrderFactory::class)]
class Order extends Model
{
    protected $table = "orders_table";

    protected $fillable = [
        'product_id' , 'user_id' , 'price'
    ];


    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class,'id','product_id');
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class,'id','user_id');
    }
}
