<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','usa_price','bdt_price','category_id','type'];
    public function images()
    {
       return $this->hasMany(Image::class);
    }
   public function category()
   {
      return $this->belongsTo(Category::class);
   }
   public function user(){
      return $this->belongsTo(User::class);
  }
  public function orderdetail(){
      return $this->hasOne(OrderDetail::class, 'product_id');
   }
   public function order()
   {
      return $this->belongsTo(Order::class);
   }
}
