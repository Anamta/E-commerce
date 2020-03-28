@extends('header')
<style>
  .mt-32 {
      margin-top: 32px;
  }
</style>

<script src="https://js.stripe.com/v3/"></script>

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('app/images/bg_6.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('index')}}">Home</a></span> <span>Checkout</span></p>
          <h1 class="mb-0 bread">Checkout</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 ftco-animate">
                      <form action="#" class="billing-form">
                          <h3 class="mb-4 billing-heading">Billing Details</h3>
                <div class="row align-items-end">
                    <div class="col-md-6">
                  <div class="form-group">
                      <label for="firstname">Firt Name</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
              </div>
              <div class="w-100"></div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="country">State / Country</label>
                          <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                            <option value="">France</option>
                          <option value="">Italy</option>
                          <option value="">Philippines</option>
                          <option value="">South Korea</option>
                          <option value="">Hongkong</option>
                          <option value="">Japan</option>
                        </select>
                      </div>
                      </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                      <label for="streetaddress">Street Address</label>
                    <input type="text" class="form-control" placeholder="House number and street name">
                  </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                    <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
                  </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                      <label for="towncity">Town / City</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="postcodezip">Postcode / ZIP *</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="phone">Phone</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="emailaddress">Email Address</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12">
                  <div class="form-group mt-4">
                                      <div class="radio">
                                        <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                                        <label><input type="radio" name="optradio"> Ship to different address</label>
                                      </div>
                                  </div>
              </div>
              </div>
            </form><!-- END -->



            <div class="row mt-5 pt-3 d-flex">
                <div class="col-md-6 d-flex">
                    <div class="cart-detail cart-total bg-light p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Cart Total</h3>
                        <p class="d-flex">
                                  <span>Subtotal</span>
                                  <span>${{Cart::getSubTotal()}}</span>
                              </p>
                              <p class="d-flex">
                                  <span>Delivery</span>
                                  <span>$0.00</span>
                              </p>
                              {{-- <p class="d-flex">
                                  <span>Discount</span>
                                  <span>$3.00</span>
                              </p> --}}
                              <hr>
                              <p class="d-flex total-price">
                                  <span>Total</span>
                                  <span>${{Cart::getTotal()}}</span>
                              </p>
                              </div>
                </div>
                <div class="col-md-6">
                    <div class="cart-detail bg-light p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Payment Method</h3>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                        <form id="payment-form" action="{{route('cart.checkout')}}" method="POST">
                                          {{ csrf_field() }}
                                          <div id="card-element">
                                            <!-- Elements will create input elements here -->
                                          </div>
                                              
                                        <script
                                          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                          data-key=""
                                          data-amount="{{Cart::getTotal() * 100}}"
                                          data-name="E-Commerce"
                                          data-description="Buy Anything"
                                          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                          data-locale="auto"
                                                            {{-- data-zip-code="true" --}}
                                                            >
                                        </script>
                                        
                                          <!-- We'll put the error messages in this element -->
                                          <div id="card-errors" role="alert"></div>
                                        
                                          {{-- <button id="submit">Pay</button> --}}
                                        </form>
                                          {{-- <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                                          </div> --}}
                                      </div>
                                  </div>
                                  {{-- <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                          </div>
                                      </div>
                                  </div> --}}
                                  {{-- <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="checkbox">
                                             <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                          </div>
                                      </div>
                                  </div>
                                  <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p> --}}
                              </div>
                </div>
            </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->
      

@endsection
   
<script>
  var stripe = Stripe('');
  var elements = stripe.elements();

  var style = {
  base: {
    color: "#32325d",
  }
};

var card = elements.create("card", { style: style });
card.mount("#card-element");

card.addEventListener('change', ({error}) => {
  const displayError = document.getElementById('card-errors');
  if (error) {
    displayError.textContent = error.message;
  } else {
    displayError.textContent = '';
  }
});


var form = document.getElementById('payment-form');

form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  stripe.confirmCardPayment(clientSecret, {
    payment_method: {
      card: card,
      billing_details: {
        name: 'Jenny Rosen'
      }
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
      }
    }
  });
});
</script>
    
