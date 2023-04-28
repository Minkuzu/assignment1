<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['product_id', 'quantity', 'subtotal', 'order_id', 'grandtotal'];

    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'order_id');
    }
}
