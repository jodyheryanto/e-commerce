<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\TransactionHeader;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $transaction = TransactionHeader::where('user_id', Auth::user()->id)->where('is_paid', false)->first();
        
        if(!empty($transaction)){
            return view('checkout-pending', compact('transaction'));
        }

        $transaction = TransactionHeader::where('user_id', Auth::user()->id)->where('status', 'shipping')->first();

        if(!empty($transaction)){
            return view('checkout-shipping', compact('transaction'));
        }

        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('checkout', compact('carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required'
        ]);

        $TransactionHeader = TransactionHeader::create([
            'user_id' => Auth::user()->id,
            'total_price' => 0,
            'is_paid' => false,
            'payment_method' => $request->payment_method,
            'status' => 'pending'
        ]);

        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $totalPrice = 0;
        foreach($carts as $cart){
            $totalPrice += $cart->product->price * $cart->quantity;
            TransactionItem::create([
                'transaction_header_id' => $TransactionHeader->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price, 
                'total_price' => $cart->product->price * $cart->quantity
            ]);
        }

        if ($request->file('bukti_pembayaran')) {
            $bukti_pembayaran = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        Payment::create([
            'transaction_header_id' => $TransactionHeader->id,
            'name' => Auth::user()->name,
            'transaction_date' => now(),
            'amount' => $totalPrice,
            'image' => $bukti_pembayaran,
            'payment_method' => $request->payment_method,
        ]);

        $TransactionHeader->update([
            'total_price' => $totalPrice
        ]);

        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('checkout.index');
    }

    public function done()
    {
        $transaction = TransactionHeader::where('user_id', Auth::user()->id)->where('status', 'shipping')->first();
        $transaction->status = 'delivered';
        $transaction->save();

        return redirect()->route('landing-page');
    }
}
