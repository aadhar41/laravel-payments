<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{

    public function payment(Request $request)
    {
        // dd($request->all());

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        // Create a new charge
        try {
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "purchase_units" => [[
                    "amount" => ["currency_code" => "USD", "value" => $request->input('price')],
                ]],
                "application_context" => [
                    "cancel_url" => route('paypal.cancel'),
                    "return_url" => route('paypal.success')
                ]
            ]);

            // return response()->json(['status' => true, 'data' => $response]);
            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        return redirect()->away($link['href']);
                    }
                }
            } else {
                return redirect()->route('paypal.cancel');
            }

            return response()->json(['status' => true, 'data' => $response]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        // Through facade. No need to import namespaces
        // $provider = \PayPal::setProvider();
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $order_id = $request->token;
        $response = $provider->capturePaymentOrder($order_id);
        // dd($response);
        if (isset($response['status']) && $response['status'] === "COMPLETED") {
            // Insert into database
           return 'Successfully purchased the product!';
        }
        return redirect()->route('paypal.cancel');
    }

    public function cancel(Request $request)
    {
        return 'Payment fail.';
    }
}
