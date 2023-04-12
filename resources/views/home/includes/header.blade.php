<!-- ==========================
    	SCROLL TOP - START
    =========================== -->
    <div id="scrolltop" class="hidden-xs"><i class="fa fa-angle-up"></i></div>
    <!-- ==========================
    	SCROLL TOP - END
    =========================== -->


    <div id="page-wrapper"> <!-- PAGE - START -->

	<!-- ==========================
    	HEADER - START
    =========================== -->
	<div class="top-header hidden-xs">
    	<div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <ul class="list-inline contacts">
                        <li><i class="fa fa-envelope"></i> help@kerung.com</li>
                        <li><i class="fa fa-phone"></i>  01-4445765</li>
                    </ul>
                </div>
                <div class="col-sm-7 text-right">
                    <ul class="list-inline links">
                        @if(Auth::check())
                            <li><a href="{{route('customer.dashboard')}}">My account</a></li>
                            <li><a href="{{route('checkout')}}">Checkout</a></li>
                            <li><a href="{{route('customer.wishlist',Auth::user()->customer_id)}}" class="wishlist">Wishlist ({{$count}})</a></li>
                            <li><a href="{{route('compare')}}"  class="compare_product">Compare ({{$totalcompare}})</a></li>
                            <li><a href="{{route('customer.logout')}}">Logout</a></li>
                        @else
                            <li><a href="{{route('singin')}}">Login</a></li>
                            <li><a href="{{route('checkout')}}">Checkout</a></li>
                            <li><a href="{{route(' ')}}" class="emptywishlist">Wishlist (0)</a></li>
                            <li><a href="{{route('compare')}}"  class="compare_product">Compare ({{$totalcompare}}) </a></li>
                        @endif
                    </ul>
                    <!-- <ul class="list-inline languages hidden-sm">
                    	<li><a href="#"><img src="{{ asset('assets/home/images/flags/cz.png')}}" alt="cs_CZ"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/home/images/flags/us.png')}}" alt="en_US"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/home/images/flags/de.png')}}" alt="de_DE"></a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    <header class="navbar navbar-default navbar-static-top">
    	<div class="container">
            <div class="navbar-header">
                <a href="{{route(' ')}}" class="navbar-brand"><img src="{{asset('assets/home/images/kerung.png')}}" alt="kerung" width="220px" /></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
            </div>
            <div class="navbar-collapse collapse">
            	<p class="navbar-text hidden-xs hidden-sm">The easiest way to shop</p>
            	<ul class="nav navbar-nav navbar-right">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{route(' ')}}">Home</a></li>
                        <li><a href="{{route('product.list')}}">Products</a></li>
                        <li class="dropdown navbar-cart hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true"><i class="fa fa-shopping-cart"></i> <span class="total">({{$totalCartItem}}) NRS  {{$totalAmount}}</span></a>
                        <ul class="dropdown-menu returnMessage">

                            <!-- CART ITEM - START -->
                                @if(!$getCartItems->isEmpty())
                                    <?php foreach($getCartItems as $row) :?>
                                    <li>
                                         <div class="row" id="{{$row->id}}">
                                            <div class="col-sm-3">
                                                <img src="{{asset($row->options->image)}}" class="img-responsive" alt="">
                                            </div>
                                            <div class="col-sm-9">
                                                <h4><a href="#">{{$row->name}}</a></h4>
                                                <p><span class='counter'>{{$row->qty}}</span>x - Rs {{$row->price}}</p>
                                                <a href="{{route('order.cancel',$row->rowId)}}" class="remove"><i class="fa fa-times-circle"></i></a>
                                            </div>
                                        </div>
                                    </li>

                                   <?php endforeach;?>


                            <!-- CART ITEM - END -->
                            <!-- CART ITEM - START -->
                            <li>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{route('cart')}}" class="btn btn-primary btn-block">View Cart</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{route('checkout')}}" class="btn btn-primary btn-block">Checkout</a>
                                    </div>
                                </div>
                            </li>
                            @else
                                <li class="footercart">Your Cart is Empty..!!!</li>
                             @endif
                            <!-- CART ITEM - END -->

                        </ul>
                    </li>
                    <li class="dropdown navbar-search hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                
                                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="POST" action="{{route('search')}}">
                                    {{csrf_field()}}

                                    <div class="input-group input-group-lg">
                                        <input type="text" name="search" class="form-control" placeholder="Search ...">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary" value="submit" type="button">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                    </ul>
                </ul>
            </div>
        </div>
    </header>
    <!-- ==========================
    	HEADER - END
    =========================== -->

