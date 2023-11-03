<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{

    public function payment(Request $request)
    {
        // $stripe = new \Stripe\StripeClient(config('STRIPE_SK'));
        // $customer = $stripe->customers->create([
        //     'description' => 'example customer',
        //     'email' => 'email@example.com',
        //     'payment_method' => 'pm_card_visa',
        // ]);
        // echo $customer;


        // dd($request->price);
        try {
            $stripe = new \Stripe\StripeClient(config('stripe.sk'));
            $response = $stripe->checkout->sessions->create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => 'Test Product',
                            ],
                            'unit_amount' => $request->price * 100, // 4000 cents
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('stripe.success'),
                'cancel_url' => route('stripe.cancel'),
            ]);

            return redirect()->away($response->url);
        } catch (\Exception $e) {
            return response()->json(['error' => $e]);
        }
    }


    public function success(Request $request)
    {
        return response()->json(['status' => true, 'message' => 'Payment Successful.', 'data' => $request->all()]);
    }


    public function cancel(Request $request)
    {
    }
}
