<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkouts';
    protected $fillable = ['total'];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
