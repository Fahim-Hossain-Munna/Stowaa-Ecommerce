<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceProductManagement extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function RelationWithProductTable(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function RelationWithInvoiceTable(){
        return $this->hasOne(Invoice::class,'id','invoice_id');
    }
    public function RelationWithSizeTable(){
        return $this->hasOne(VariationSize::class,'id','size_id');
    }
    public function RelationWithColorTable(){
        return $this->hasOne(VariationColor::class,'id','color_id');
    }
}
