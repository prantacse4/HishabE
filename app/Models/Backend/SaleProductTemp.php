<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProductTemp extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_name',
        'qty',
        'pro_pur',
        'pro_sell',
        'total'
    ];
}
