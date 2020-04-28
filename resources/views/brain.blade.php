@extends('layouts.final')
@section('content')
    <div id="clogune "class="container"><h1>Choose Payment Method</h1>
        <h4>$total Amount is $ {{$total}} </h4>
    <form method="post" id="payment-form" action="{{route('pay.braintree')}}">
        @csrf
                <section>
                   
                        <div >
                        <input type="hidden" name="amount" type="tel" min="1" placeholder="Amount" value="{{$total}}">
                        </div>
                   

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>
                <div class="shortlists">
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="button" type="submit"><span>Do Transaction</span></button>
                </div>
        </form>
    </div>
     <script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{$token}}";

        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script>
@endsection