@extends('layout.main')

<script src="https://js.stripe.com/v3/"></script>
<link rel="stylesheet" href="{{asset('dist/css/stripe.css')}}"/>
@section('content')
       <!--<form>
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_V0WJADxGustnOAJjCYIL11oZ00ACxwRa9y"
                        data-amount="999"
                        data-name="Demo Site"
                        data-description="Widget"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto">

            </form> -->


    <div class="row">
        <div class="small-6 small-centered columns">
            <form action="{{route('payment.store')}}" method="post" id="payment-form">
                {{Csrf_field()}}
                <div class="form-row">
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display Element errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>

                  <input type="submit" class="submit button success" value="submit payment">
            </form></div>


    </div>


    <script>
        var stripe = Stripe('pk_test_V0WJADxGustnOAJjCYIL11oZ00ACxwRa9y');
        var elements = stripe.elements();
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '16px',
                color: "#32325d",
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');


        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the customer that there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });


        function stripeTokenHandler(token) {

            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
           form.submit();
        }
    </script>
@endsection