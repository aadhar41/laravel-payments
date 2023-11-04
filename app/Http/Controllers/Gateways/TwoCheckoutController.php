<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwoCheckoutController extends Controller
{
    public function showForm(Request $request) {
        return view('gateways.twocheckout-form');
    }
    
    public function handlePayment(Request $request) {
        dd($request->all());
    }
}
