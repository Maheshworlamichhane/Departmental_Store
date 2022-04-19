<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    // protected $fillable = ['name', 'email','address','price','product_id','product_name','product_price','quantity','total'];

    public function manage_products(){
        return $this->belongsTo(ManageProduct::class,'manage_product_id','id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
