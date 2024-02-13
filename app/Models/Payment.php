<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = ['name','amount','payment_date','order_id'];
    public function order(){
        return $this->belongsTo(Order::class,);
    }
}