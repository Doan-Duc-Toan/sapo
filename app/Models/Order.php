<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'payment_status',
        'payment_method',
        'payment_amount',
        'delivery_status',
        'delivery_address'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_detail')->withPivot(['color_id', 'count']);;
    }
}
