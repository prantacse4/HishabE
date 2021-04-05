<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveSaleRecords extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'sale_type',
        'customer_id',
        'customer_mobile',
        'total_amount',
        'discount',
        'payable_amount',
        'payment',
        'due',
    ];
}
