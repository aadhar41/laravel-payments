@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Basic implementation for the 2Pay.js client</h5>

                    <form type="post" id="payment-form">
                        <div class="form-group">
                            <label for="name" class="label control-label">Name</label>
                            <input type="text" id="name" class="field form-control">
                        </div>

                        <div id="card-element">
                            <!-- A TCO IFRAME will be inserted here. -->
                        </div>
                        <hr>
                        <button class="btn btn-primary" type="submit">Generate token</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<script src="">
    window.addEventListener('load', function() {
        // Initialize the 2Pay.js client.
        let jsPaymentClient = new TwoPayClient('{{config("twocheckout.sellerId")}}');

        // Create the component that will hold the card fields.
        let component = jsPaymentClient.components.create('card');

        // Mount the card fields component in the desired HTML tag. This is where the iframe will be located.
        component.mount('#card-element');

        // Handle form submission.
        document.getElementById('payment-form').addEventListener('submit', (event) => {
            event.preventDefault();

            // Extract the Name field value
            const billingDetails = {
                name: document.querySelector('#name').value
            };

            // Call the generate method using the component as the first parameter
            // and the billing details as the second one
            jsPaymentClient.tokens.generate(component, billingDetails).then((response) => {
                console.log(response.token);
            }).catch((error) => {
                console.error(error);
            });
        });
    });
</script>

@endsection