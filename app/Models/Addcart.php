<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addcart extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    function ProductTableRelation(){
    return $this->hasOne(Product::class , 'id' , 'product_id');
    }

    function SizeTableRelation(){
    return $this->hasOne(VariationSize::class , 'id' , 'size_id');
    }

    function ColorTableRelation(){
        return $this->hasOne(VariationColor::class , 'id' , 'color_id');
     }
     function VendorTableRelation(){
        return $this->hasOne(User::class , 'id' , 'vendor_id');
     }

}
