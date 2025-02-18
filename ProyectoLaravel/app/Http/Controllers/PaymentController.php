<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentReceipt;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::where('user_id', Auth::id())->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        return view('payments.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'completed',
        ]);

        Mail::to(Auth::user()->email)->send(new PaymentReceipt($payment));

        return redirect()->route('payments.index')->with('success', 'Pago realizado con éxito.');
    }

    public function show(Payment $payment)
    {
        $this->authorize('view', $payment);
        return view('payments.show', compact('payment'));
    }
}
