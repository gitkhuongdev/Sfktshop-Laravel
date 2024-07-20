<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'user_fullname',
        'user_email',
        'user_phone',
        'user_address',
        'user_note',
        'total_money',
        'total_quantity',
        'status'
    ];

    // Define relationships, if any
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}