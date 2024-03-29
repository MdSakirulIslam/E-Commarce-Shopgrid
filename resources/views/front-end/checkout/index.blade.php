@extends('front-end.master')
@section('title','Checkout Page')
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('new.order')}}" method="post">
        @csrf
    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Checkout Form </h6>

                                    <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Full Name</label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            <input type="text" placeholder="Full Name" name="name"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        <input type="email" placeholder="Email Address" name="email"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        <input type="number"name="mobile" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address</label>
                                                    <div class="form-input form">
                                                        <textarea class="pt-2" name="delivery_address" placeholder="Delivery Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Payment Method</label>
                                                    <div class="">
                                                        <label class="me-3"><input type="radio" checked name="payment_method" value="Cash">Cash on delivery</label>
                                                        <label><input type="radio" name="payment_method" value="online">Online</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button type="submit" class="btn" >Confirm Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>


                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">Your Cart Summary</h5>
                            <div class="sub-total-price">
                                @foreach(Cart::content() as $cartProduct)
                                <div class="total-price">
                                    <p class="value">{{$cartProduct->name}} - {{$cartProduct->price}} * {{$cartProduct->qty}}</p>
                                    <p class="price">{{round($cartProduct->subtotal)}}</p>
                                </div>
                                @endforeach
                            </div>
                            </hr>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Subtotal:</p>
                                    <p class="price">{{$sum=Session::get('sum')}}</p>
                                    <input type="hidden"value="{{$sum}}" name="order_total">
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Tax Total:</p>
                                    <p class="price">{{$tax=round($sum*0.15)}}</p>
                                    <input type="hidden"value="{{$tax}}" name="tax_total">
                                </div>
                                <div class="total-price discount">
                                    <p class="value">Shipping Cost:</p>
                                    <p class="price">{{$shipping = 100}}</p>
                                    <input type="hidden"value="{{$shipping}}" name="shipping_total">
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Payable Amount:</p>
                                    <p class="price">{{$orderTotal=$sum+$tax+$shipping}}</p>
                                    <input type="hidden"value="{{$orderTotal}}" name="order_total">
                                </div>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('/')}}front-end-assets/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    </form>
@endsection
