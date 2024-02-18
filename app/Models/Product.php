<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'description',
        'bar_code',
        'quantity',
        'price',
        'alert_stock',
        'category_id',
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

}