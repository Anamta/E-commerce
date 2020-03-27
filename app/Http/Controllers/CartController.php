<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\ShoppingcartServiceProvider;
use Gloudemans\Shoppingcart\CartItem;


class CartController extends Controller
{
    public function add_cart()
    {
        // dd(request()->all());
         $pdt = Product::find(request()->product_id);
         $cart = Cart::add(array(
            'id' => $pdt->id,
            'name' => $pdt->name,
            'price' => $pdt->price,
            'quantity' => 1,
            'attributes' => [
                'description' => $pdt->description,
                'image' => $pdt->image,
            ],
            
        ));
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 3.00%',
            'type' => 'tax',
            'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '3.00%',
            
        ));
        
        // Cart::associate($cart->id,'App\Product');

        //  dd($cart);
        // dd(Cart::getContent());
        Session::flash('success','Product added to cart');

        return redirect()->route('cart');

    }


    public function cart()
    {
         $data = Cart::getContent();
         return view('cart',compact('data'));
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect()->route('cart');
        
    }

    public function cart_checkout()
    {
        if(Cart::getContent()->count() == 0)
        {
          Session::flash('info','Your cart is still empty.do some shopping');
          return back();
        }
        return view('checkout');
    }

    public function pay()
    {
        // dd(request()->all());
        Stripe::setApiKey("sk_test_9EkE86LaFEGOu2eloObTj0T000BcwUKePB");
        $token = request()->stripeToken;
        $charge = Charge::create([
            'amount' => Cart::getTotal() * 100,
            'currency' => 'usd',
            'description' => 'e-commerce practice',
            'source' => $token,
        ]);
        // dd('your cart was charged successfully.');
        Session::flash('success','Purchase successfully.wait for our email');
        // Cart::remove(Cart::getContent());
        Cart::clear();
        // Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);
        return redirect()->route('index');
    }
}
