<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function RelationWithInvoiceManagementTable(){
        return $this->hasOne(InvoiceProductManagement::class,'invoice_id','id');
    }
}
