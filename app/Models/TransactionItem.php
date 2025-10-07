<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $table = 'transaction_items';

    protected $fillable = [
        'transaction_header_id',
        'product_id',
        'quantity',
        'price',
        'total_price',
    ];

    public function transactionHeader()
    {
        return $this->belongsTo(TransactionHeader::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
