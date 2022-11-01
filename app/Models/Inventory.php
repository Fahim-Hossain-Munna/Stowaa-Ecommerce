<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    function VariationSizeTableRelation(){
        return $this->hasOne(VariationSize::class , 'id' , 'size_id');
    }
    function VariationColorTableRelation(){
        return $this->hasOne(VariationColor::class , 'id' , 'color_id');
    }
}
