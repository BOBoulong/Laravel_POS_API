<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = ['name','order_detail_id'];
    public function order_detail(){
        return $this->belongsTo(Order_Detail::class,);
    }
}