<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function payment(Request $request)
    {
        $response = [];
        $api = new Api(config('razorpay.key'), config('razorpay.secret'));
        $payment = $api->payment->fetch($request->razorpay_payment_id);
        if ($request->has('razorpay_payment_id') && $request->filled('razorpay_payment_id')) {
            try {
                $response = $api->payment->fetch($request->razorpay_payment_id)
                    ->capture(array('amount' => $payment['amount'])); // You can capture the amount in INR.
            } catch (\Exception $e) {
                return response()->json(['error' => true, 'message' => $e->getMessage()], 422);
            }
            $success = true;
            $msg = "Transaction Successful";
        } else {
            $success = false;
            $msg = "Transaction Failed";
        }

        if ($response['status'] == 'captured') {
            return response()->json(['success' => $success, 'message' => $msg, 'data' => $response, 'payment' => $payment]);
        }
    }

    public function success(Request $request)
    {
        dd($request->all());
    }

    public function cancel(Request $request)
    {
        dd($request->all());
    }
}
