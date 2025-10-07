<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'transaction_header_id',
        'name',
        'image',
        'transaction_date',
        'amount',
    ];

    public function transactionHeader()
    {
        return $this->belongsTo(TransactionHeader::class);
    }
}
