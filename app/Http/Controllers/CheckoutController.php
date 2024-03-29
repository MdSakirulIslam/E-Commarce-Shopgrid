<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $order,$customer,$orderDetail;
    public function index()
    {
        return view('front-end.checkout.index');
    }
    public function newOrder(Request $request)
    {
        $this->customer = new Customer();
        $this->customer->name       = $request->name;
        $this->customer->email      = $request->email;
        $this->customer->mobile     = $request->mobile;
        $this->customer->password   = bcrypt($request->mobile);
        $this->customer->save();

        $this->order = new Order();
        $this->order->customer_id = $this->customer->id;
        $this->order->order_total = $this->customer->order_total;
        $this->order->tax_total = $this->customer->tax_total;
        $this->order->shipping_total = $this->customer->shipping_total;
        $this->order->order_date = date('Y-m-d');
        $this->order->order_timestamp = strtotime(date('Y-m-d'));
        $this->order->delivery_address = $this->customer->delivery_address;
        $this->order->payment_method = $this->customer->payment_method;
        $this->order->save();

        foreach (Cart::content() as $item)
        {
            $this->orderDetail->order_id        = $this->order->id;
            $this->orderDetail->product_id      = $item->id;
            $this->orderDetail->product_name    = $item->name;
            $this->orderDetail->product_code    = $item->options->code;
            $this->orderDetail->product_price   = $item->price;
            $this->orderDetail->product_qty     = $item->qty;
            $this->orderDetail->save();
        }


        return redirect('/complete-order')->with('message','Congratulation.....Your product info post successfully...we contact with you soon.');
    }
    public function completeOrder()
    {
        return view('front-end.checkout.complete-order');
    }
}
