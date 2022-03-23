<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table="payments";

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function manage_products(){
        return $this->belongsTo(ManageProduct::class,'manage_product_id','id');
    }

    public function orders(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
