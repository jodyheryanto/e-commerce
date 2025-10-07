<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactionHeaders = TransactionHeader::all();
        return view('transaction.index', compact('transactionHeaders'));
    }

    public function update($id)
    {
        $transactionHeader = TransactionHeader::findOrFail($id);
        $transactionHeader->is_paid = true;
        $transactionHeader->status = 'shipping';
        $transactionHeader->save();
        return redirect()->route('transaction.index');
    }
}
