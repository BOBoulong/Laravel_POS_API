<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'order_date',
        'product_id',
        'quantity',
        'price',
        'total_amount',
        'discount',
        'status',
        'customer_id',
        'payment_method',
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }
}