@extends('header')
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('app/images/bg_6.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('index')}}">Home</a></span> <span>Cart</span></p>
          <h1 class="mb-0 bread">My Wishlist</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-cart">
          <div class="container">
              <div class="row">
              <div class="col-md-12 ftco-animate">
                  <div class="cart-list">
                      <table class="table">
                          <thead class="thead-primary">
                            <tr class="text-center">
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th>Product</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              {{-- <th>Total</th> --}}
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $item)
                              <tr class="text-center">
                              <td class="product-remove"><a href="{{route('cart.delete',['id' => $item->id]) }}"><span class="ion-ios-close"></span></a></td>
                                
                                <td class="image-prod"><div class="img" style="background-image: {{ url('uploads/products/'. $item->image) }};">
                                  {{-- 'url({{ url('app/images/'. $item->image) }} )' --}}
                                </div></td>
                                
                                <td class="product-name">
                                    <h3>{{$item->name}}</h3>
                                    <p>{{$item->attributes->description}}</p>
                                </td>
                                
                                <td class="price">${{$item->price}}</td>
                                
                                <td class="quantity">
                                    <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="quantity form-control input-number" value="{{$item->quantity}}" min="1" max="100">
                                  </div>
                              </td>
                                
                                {{-- <td class="total">${{Cart::getTotal()}}</td> --}}
                              </tr><!-- END TR-->   
                            @endforeach
                            
                          </tbody>
                        </table>
                    </div>
              </div>
          </div>
          <div class="row justify-content-start">
              <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                      <h3>Cart Totals</h3>
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
                  <p class="text-center"><a href="{{route('cart.checkout')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
              </div>
          </div>
          </div>
      </section>

@endsection
   

    