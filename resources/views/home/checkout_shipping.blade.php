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
                    <p>Shipping Method</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li class="active">Shipping Method</li>
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
                                <div class="checkout-step">
                                	<div class="number">3</div>
                                    <div class="title">Payment Method</div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="checkout-step">
                                	<div class="number">4</div>
                                    <div class="title">Review</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="progress checkout-progress hidden-xs"><div class="progress-bar" role="progressbar" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100" style="width:33.3%;"></div></div>
                        
                        <form>
                            <h3>Shipping Method</h3>
                            <div class="products-order checkout shipping-method">
                            	<div class="row">
                                    <div class="col-sm-6">
                                        <div id="shipping-methods" role="tablist" aria-multiselectable="true">
                                            <div class="panel radio">
                                                <input type="radio" name="optionsRadios" id="radio-shipping-1" checked>
                                                <label for="radio-shipping-1" data-toggle="collapse" data-target="#parent-1" data-parent="#shipping-methods" aria-controls="parent-1">Personal Pickup</label>
                                                <div id="parent-1" class="panel-collapse collapse in" role="tabpanel">
                                                    <div class="radio">
                                                        <input type="radio" name="radio-shipping-1-options" id="radio-shipping-1-1" checked>
                                                        <label for="radio-shipping-1-1">California, USA <span>Tomorrow</span></label>
                                                        <div class="shipping-method-description">
                                                        	<p>1443 E Washington Blvd, Pasadena, CA 91104</p>
                                                            <ul class="list-unstyled">
                                                            	<li><span>Mon, Tue</span> 8:00 - 20:00</li>
                                                                <li><span>Wed - Fri</span> 12:00 - 20:00</li>
                                                                <li><span>Sat, Sun</span> Closed</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="radio-shipping-1-options" id="radio-shipping-1-2">
                                                        <label for="radio-shipping-1-2">California, USA <span>Tomorrow</span></label>
                                                        <div class="shipping-method-description">
                                                        	<p>1443 E Washington Blvd, Pasadena, CA 91104</p>
                                                            <ul class="list-unstyled">
                                                            	<li><span>Mon, Tue</span> 8:00 - 20:00</li>
                                                                <li><span>Wed - Fri</span> 12:00 - 20:00</li>
                                                                <li><span>Sat, Sun</span> Closed</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel radio">
                                                <input type="radio" name="optionsRadios" id="radio-shipping-2">
                                                <label for="radio-shipping-2" class="collapsed" data-toggle="collapse" data-target="#parent-2" data-parent="#shipping-methods" aria-controls="parent-2">Delivery to your address</label>
                                                <div id="parent-2" class="panel-collapse collapse" role="tabpanel">
                                                    <div class="radio">
                                                        <input type="radio" name="radio-shipping-2-options" id="radio-shipping-2-1" checked>
                                                        <label for="radio-shipping-2-1">Post Air Mail<span>$15.00</span></label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="radio-shipping-2-options" id="radio-shipping-2-2">
                                                        <label for="radio-shipping-2-2">FedEx<span>$7.00</span></label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="radio-shipping-2-options" id="radio-shipping-2-3">
                                                        <label for="radio-shipping-2-3">UPS<span>$9.00</span></label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="radio-shipping-2-options" id="radio-shipping-2-4">
                                                        <label for="radio-shipping-2-4">DHL<span>$8.50</span></label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                                <a href="{{route('checkout.payment')}}" class="btn btn-primary btn-lg pull-right ">Continue</a>
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