<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use App\Models\Product;
 use App\Models\Order;
 use App\Models\Address;
class OrderDetail extends Model
{
    
    use HasFactory;

    protected $fillable=['order_id','payment_method','product_id'];
    
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
