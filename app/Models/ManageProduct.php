<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ManageProduct extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = "manage_products";


    // public function categories(){
    //     return $this->belongsTo(Category::class,'category_id','id');
    // }

    public function stocks(){
        return $this->belongsTo(Stock::class,'stock_id','id');
    }

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }


}

