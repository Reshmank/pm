<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_Varients;

class Products extends Model
{
    protected $table="products";
    protected $guarded = [];

    public function productVarients()
    {
          return $this->hasMany(Product_Varients::class,'fk_product_id','id');
                           
    }
}