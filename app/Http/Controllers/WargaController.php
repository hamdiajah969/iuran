<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class WargaController extends Controller
{
    public function paymentHistory()
    {
        $user = Auth::user();
        $payments = Payment::with('duesCategory')
            ->where('users_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('warga.payment_history', compact('payments'));
    }
}
