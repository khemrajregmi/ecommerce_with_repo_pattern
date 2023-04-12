@extends('home.layouts.master')
	@section('content')
		<!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>Checkout</h2>
                    <p>Payment Method</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li class="active">Payment Method</li>
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
                                <div class="checkout-step">
                                	<div class="number">4</div>
                                    <div class="title">Review</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="progress checkout-progress hidden-xs"><div class="progress-bar" role="progressbar" aria-valuenow="66.6" aria-valuemin="0" aria-valuemax="100" style="width:66.6%;"></div></div>
                        
                        <form>
                            <h3>Payment Method</h3>
                            <div class="products-order checkout payment-method">
                            	<div class="row">
                                    <div class="col-lg-6 col-md-8 col-sm-10">
                                        <div id="payment-methods" role="tablist" aria-multiselectable="true">
                                            <div class="panel radio">
                                                <input type="radio" name="optionsRadios" id="radio-payment-1" checked>
                                                <label for="radio-payment-1" data-toggle="collapse" data-target="#parent-1" data-parent="#payment-methods" aria-controls="parent-1">Cash On Delivery<span>($5)</span></label>
                                                <div id="parent-1" class="panel-collapse collapse in" role="tabpanel"></div>
                                            </div>
                                            <div class="panel radio">
                                                <input type="radio" name="optionsRadios" id="radio-payment-2">
                                                <label for="radio-payment-2" class="collapsed" data-toggle="collapse" data-target="#parent-2" data-parent="#payment-methods" aria-controls="parent-2">Payment by Bank Transfer<span>IBAN: CZ00 0000 0000 0000 0000 0000</span></label>
                                                <div id="parent-2" class="panel-collapse collapse" role="tabpanel"></div>
                                            </div>
                                            <div class="panel radio">
                                                <input type="radio" name="optionsRadios" id="radio-payment-3">
                                                <label for="radio-payment-3" class="collapsed" data-toggle="collapse" data-target="#parent-3" data-parent="#payment-methods" aria-controls="parent-3">PayPal</label>
                                                <div id="parent-3" class="panel-collapse collapse" role="tabpanel"></div>
                                            </div>
                                            <div class="panel radio">
                                                <input type="radio" name="optionsRadios" id="radio-payment-4">
                                                <label for="radio-payment-4" class="collapsed" data-toggle="collapse" data-target="#parent-4" data-parent="#payment-methods" aria-controls="parent-4">Pay via Credit Card</label>
                                                <div id="parent-4" class="panel-collapse collapse" role="tabpanel">
                                                    <div class="credit-card-form">
                                                        <div class="row">
                                                            <div class="form-group col-sm-9">
                                                                <label>Credit Card Number<span class="required">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="creditcard" value="" size="16">
                                                                    <span class="input-group-addon" id="credit-card-img"><i class="fa fa-credit-card"></i></span>
                                                                </div>
                                                                <div id="credit-card-error"></div>    
                                                            </div>
                                                            <div class="form-group col-sm-3">
                                                                <label>CVV/CVC<span class="required">*</span></label>
                                                                <input type="text" class="form-control" maxlength="4">   
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-sm-7">
                                                                <label>Name on Card<span class="required">*</span></label>
                                                                <input type="text" class="form-control">   
                                                            </div>
                                                            <div class="form-group col-sm-5 expiration-date">
                                                            	<label>Expiration date<span class="required">*</span></label>
                                                                <div>
                                                                <select class="form-control">
                                                                    <option selected disabled>MM</option>
                                                                    <option>01</option>
                                                                    <option>02</option>
                                                                    <option>03</option>
                                                                    <option>04</option>
                                                                    <option>05</option>
                                                                    <option>06</option>
                                                                    <option>07</option>
                                                                    <option>08</option>
                                                                    <option>09</option>
                                                                    <option>10</option>
                                                                    <option>11</option>
                                                                    <option>12</option>
                                                                </select>
                                                                <select class="form-control">
                                                                    <option selected disabled>YY</option>
                                                                    <option>15</option>
                                                                    <option>16</option>
                                                                    <option>17</option>
                                                                    <option>18</option>
                                                                    <option>19</option>
                                                                    <option>20</option>
                                                                    <option>21</option>
                                                                    <option>22</option>
                                                                    <option>23</option>
                                                                    <option>24</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                                <a href="{{route('checkout.review')}}" class="btn btn-primary btn-lg pull-right">Continue</a>
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