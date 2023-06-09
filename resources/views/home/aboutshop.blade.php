@extends('home.layouts.master')
	@section('content')
		<!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>uMarket</h2>
                    <p>About Shop</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="{{route(' ')}}">Home</a></li>
                        <li class="active">About Shop</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
	<!-- ==========================
    	BREADCRUMB - END 
    =========================== -->
    
    <!-- ==========================
    	ESHOP - START 
    =========================== -->
    <section class="content eshop">
        <div class="container">
        	<div class="default-style about">
        		<h2>About Us</h2>
               	<div class="row">
                	<div class="col-sm-7 col-md-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex. Suspendisse aliquet imperdiet commodo. Aenean vel lacinia elit. Class aptent taciti sociosqu ad litora torquent per.</p>
                        <p>Sed eget pulvinar quam, vel feugiat enim. Aliquam erat volutpat. Phasellus eu porta ipsum. Suspendisse aliquet imperdiet commodo. Aenean vel lacinia elit. Class aptent taciti sociosqu ad litora torquent per. Vestibulum velmo.</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check"></i>Etiam sed dolor ac diam volutpat</li>
                            <li><i class="fa fa-check"></i>Erat volutpat. Phasellus eu porta ipsum suspendisse aliquet imperdiet</li>
                            <li><i class="fa fa-check"></i>Phasellus eu porta ipsum. Suspendisse aliquet imperdiet commodo</li>
                            <li><i class="fa fa-check"></i>Sed eget pulvinar quam, vel feugiat enim aliquam</li>
                        </ul>
                    </div>
                    <div class="col-sm-5 col-md-6">
                    	<img src="assets/images/slide-3.jpg" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="icon-nav row">
                    <div class="col-xs-6 col-sm-3"><a href="stores.html"><i class="fa fa-map-marker"></i> Our Stores</a></div>
                    <div class="col-xs-6 col-sm-3"><a href="privacy-policy.html"><i class="fa fa-lock"></i> Privacy Policy</a></div>
                    <div class="col-xs-6 col-sm-3"><a href="terms-conditions.html"><i class="fa fa-book"></i> Terms & Conditions</a></div>
                    <div class="col-xs-6 col-sm-3"><a href="faq.html"><i class="fa fa-question-circle"></i> FAQ</a></div>
                </div>
                
                <div class="services">
                    <h2 class="text-center">Our Services</h2>
                    <div class="row row-no-padding">
                
                        <!-- SERVICE - START -->
                        <div class="col-xs-6 col-sm-4">
                            <div class="service">
                                <i class="fa fa-star"></i>
                                <h3>FREE SHIPPING ON ALL ORDRES</h3>
                                <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
                            </div>
                        </div>
                        <!-- SERVICE - END -->
                        
                        <!-- SERVICE - START -->
                        <div class="col-xs-6 col-sm-4">
                            <div class="service">
                                <i class="fa fa-heart"></i>
                                <h3>AMAZING CUSTOMER SERVICE</h3>
                                <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
                            </div>
                        </div>
                        <!-- SERVICE - END -->
                        
                        <!-- SERVICE - START -->
                        <div class="col-xs-6 col-sm-4">
                            <div class="service">
                                <i class="fa fa-rocket"></i>
                                <h3>NO CUSTOMS OR DUTY FEES!</h3>
                                <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
                            </div>
                        </div>
                        <!-- SERVICE - END -->
                
                        <!-- SERVICE - START -->
                        <div class="col-xs-6 col-sm-4">
                            <div class="service">
                                <i class="fa fa-star"></i>
                                <h3>FREE SHIPPING ON ALL ORDRES</h3>
                                <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
                            </div>
                        </div>
                        <!-- SERVICE - END -->
                        
                        <!-- SERVICE - START -->
                        <div class="col-xs-6 col-sm-4">
                            <div class="service">
                                <i class="fa fa-heart"></i>
                                <h3>AMAZING CUSTOMER SERVICE</h3>
                                <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
                            </div>
                        </div>
                        <!-- SERVICE - END -->
                        
                        <!-- SERVICE - START -->
                        <div class="col-xs-6 col-sm-4">
                            <div class="service">
                                <i class="fa fa-rocket"></i>
                                <h3>NO CUSTOMS OR DUTY FEES!</h3>
                                <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
                            </div>
                        </div>
                        <!-- SERVICE - END -->
                        
                    </div>
                    
                </div>
                
        	</div>
        </div>
    </section>
    <!-- ==========================
    	ESHOP - END 
    =========================== -->
	@endsection