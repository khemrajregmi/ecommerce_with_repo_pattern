@extends('home.layouts.master')
	@section('content')
		<!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h1>Checkout</h1>
                    <p>Review</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="{{route(' ')}}">Home</a></li>
                        <li><a href="{{route('checkout')}}">Checkout</a></li>
                        <li class="active">Review</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
	<!-- ==========================
    	BREADCRUMB - END 
    =========================== -->
    
    <!-- ==========================
    	MY ACCOUNT - START 
    =========================== -->
    <section class="content account">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="account-content checkout-steps">
                        
                        <div class="row row-no-padding">
                        	<div class="col-xs-6 col-sm-3">
                            	<div class="checkout-step active">
                                	<div class="number">1</div>
                                    <div class="title">Billing & Shipping Address</div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="checkout-step active">
                                	<div class="number">2</div>
                                    <div class="title">Shipping Method</div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="checkout-step active">
                                	<div class="number">3</div>
                                    <div class="title">Payment Method</div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="checkout-step active">
                                	<div class="number">4</div>
                                    <div class="title">Review</div>
                                </div>
                            </div>
                        </div>
                                                
                        <div class="progress checkout-progress hidden-xs"><div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div></div>
                        	
                        <form>
                            <h3>Review Order</h3>                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <h4>Billing Address</h4>
                                        <ul class="list-unstyled">
                                            <li><b>John Doe</b></li>
                                            <li>17 Boulevard des Invalides</li>
                                            <li>75007 Paris</li>
                                            <li>France</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <h4>Shipping Address</h4>
                                        <ul class="list-unstyled">
                                            <li><b>John Doe</b></li>
                                            <li>17 Boulevard des Invalides</li>
                                            <li>75007 Paris</li>
                                            <li>France</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <h4>Payment Method</h4>
                                        <ul class="list-unstyled">
                                            <li>Credit Card - VISA</li>
                                        </ul>
                                    </div>
                                    <div class="box">
                                        <h4>Shipping Method</h4>
                                        <ul class="list-unstyled">
                                            <li>Post Air Mail</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <h4>Order Details</h4>
                                        <ul class="list-unstyled">
                                            <li><b>Email: </b>johndoe@umarket.com</li>
                                            <li><b>Phone: </b>+420 123 456 789</li>
                                        </ul>
                                        <h5>Addition information:</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="products-order checkout shopping-cart">
                                <div class="table-responsive">
                                    <table class="table table-products">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-xs-1"><img src="assets/images/products/product-1.jpg" alt="" class="img-responsive"></td>
                                                <td class="col-xs-4 col-md-5"><h4><a href="single-product.html">Fusce Aliquam</a><small>M, Black, Esprit</small></h4></td>
                                                <td class="col-xs-2 text-center"><span>$30</span></td>
                                                <td class="col-xs-2 col-md-1 text-center"><span><b>2 items</b></span></td>
                                                <td class="col-xs-2 text-center"><span><b>$60</b></span></td>
                                            </tr>
                                            <tr>
                                                <td class="col-xs-1"><img src="assets/images/products/product-2.jpg" alt="" class="img-responsive"></td>
                                                <td class="col-xs-4 col-md-5"><h4><a href="single-product.html">Fusce Aliquam</a><small>M, Black, Esprit</small></h4></td>
                                                <td class="col-xs-2 text-center"><span>$80</span></td>
                                                <td class="col-xs-2 col-md-1 text-center"><span><b>2 items</b></span></td>
                                                <td class="col-xs-2 text-center"><span><b>$160</b></span></td>
                                            </tr>
                                            <tr>
                                                <td class="col-xs-1"><img src="assets/images/products/product-3.jpg" alt="" class="img-responsive"></td>
                                                <td class="col-xs-4 col-md-5"><h4><a href="single-product.html">Fusce Aliquam</a><small>M, Black, Esprit</small></h4></td>
                                                <td class="col-xs-2 text-center"><span>$95</span></td>
                                                <td class="col-xs-2 col-md-1 text-center"><span><b>1 item</b></span></td>
                                                <td class="col-xs-2 text-center"><span><b>$95</b></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <ul class="list-unstyled order-total">
                                    <li>Total products<span>$315.00</span></li>
                                    <li>Discount<span>- $25.00</span></li>
                                    <li>Shipping<span>$15.00</span></li>
                                    <li>Subtotal<span class="total">$305.00</span></li>
                                </ul>
                            </div>
                            <div class="clearfix">
                            	<div class="checkbox pull-left">
                                	<input type="checkbox" id="checkout-terms-conditions">
                                    <label for="checkout-terms-conditions">I have read and agree to the <a href="terms-conditions.html" target="_blank">Terms & Conditions</a></label>
                                </div>
                                <a href="" class="btn btn-primary btn-lg pull-right ">Confirm Order</a>
                            </div>
                        </form>                        
                    </article>
                </div>
            </div> 
        </div>
    </section>
    <!-- ==========================
    	MY ACCOUNT - END 
    =========================== -->
        
    @endsection