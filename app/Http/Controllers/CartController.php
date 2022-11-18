<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $product;
    private $cartProducts;

    public function index(Request $request, $id)
    {
        // if(!Auth::check())
        // {
        //     return redirect()
        // }
        // return 'adssfs';
        $this->product = Product::find($id);
        \Cart::add([
            'id'        => $this->product->id,
            'name'      => $this->product->name,
            'price'     => $this->product->selling_price?? 0,
            'quantity'  => $request->qty,
            'attributes' => [
                'image'     => $this->product->image,
            ]
        ]);
        // return Session::get('customer_id');
        // \Cart::session(Session::get('customer_id'))->add(array(
        //     'id'        => $this->product->id,
        //     'name'      => $this->product->name,
        //     'price'     => $this->product->selling_price,
        //     'quantity'  => $request->qty,
        //     'attributes' => [
        //     'image'     => $this->product->image,]
        // ));
        return redirect('/show-cart-product');
    }

    public function show()
    {
        $this->cartProducts = \Cart::getContent();
       // return $this->cartProducts;

        return view('front.cart.show', ['products' => $this->cartProducts]);
    }

    public function update(Request $request, $id)
    {
        \Cart::update($id, [
            'quantity' => [
                'relative'  => false,
                'value'     => $request->qty
            ]
        ]);
        return redirect('/show-cart-product')->with('message', 'Cart product info update successfully.');
    }

    public function delete($id)
    {
        \Cart::remove($id);
        return redirect('/show-cart-product')->with('message', 'Cart product info delete successfully.');
    }
}
