@extends('home.layouts.master')
@section('pageCss')
    <!-- PNotify -->
    <link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin//vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
@endsection
	@section('content')
		    <!-- ==========================
        BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>My Account</h2>
                    <p>Family Size Wishlist</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="{{route(' ')}}">Home</a></li>
                        <li><a href="{{route('customer.dashboard')}}">My Account</a></li>
                        <li class="active">Wishlist</li>
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
                <div class="col-sm-3">
                    <aside class="sidebar">
                        
                        <!-- WIDGET:CATEGORIES - START -->
                        @include('home.includes.customernav')
                        <!-- WIDGET:CATEGORIES - END -->
                        
                    </aside>
                </div>
                <div class="col-sm-9">
                    @if(!$products->isEmpty())
                    <article class="account-content">
                        @if(Session::has('success'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                        @endif 
                        <h3>Family Wishlist</h3>
                        <div class="table-responsive">
                        <form id="myForm" data-parsley-validate="" class="form-horizontal form-label-left" action="{{route('customer.familywishlist.update')}}" method="post">
                        {{csrf_field()}}
                            <table class="table table-products">
                                <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                <tbody>
                                   <?php $counter = 1;?>
                                    @foreach($products as $product)
                                        <tr id="image-row<?php echo $counter;?>">
                                            <td class="col-xs-4 col-md-5"><h4>{{$product->name}}<small></small></h4></td>
                                           <td class="col-xs-2 col-md-1">
                                            <div class="form-group">
                                                <input type="hidden" name="product[<?php echo $counter;?>][familywish_product_id]" value="{{$product->familywish_product_id}}">
                                                <input type="text" class="form-control" name="product[<?php echo $counter;?>][quantity]" value="{{$product->quantity}}">

                                            </div>
                                            </td>
                                             <td class="col-xs-2 text-center"><span><b>Rs   {{(round($product->price, 2))}}</b></span></td>
                                            <td class="col-xs-2 text-center"><span><b>Rs   {{(round($product->price, 2)*$product->quantity)}}</b></span></td>
                                            <td class="col-xs-2 text-center"><a href="#"  class="btn btn-primary cart" data-productid="{{$product->product_id}}" data-token="{{csrf_token()}}"><i class="fa fa-shopping-cart cart"></i></a><a href="" class="btn btn-primary cancel"  data-wishlistproductId="{{$product->familywish_product_id}}" data-token="{{csrf_token()}}" data-customerId="{{Auth::user()->customer_id}}"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                        <?php $counter++;?>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </form>
                        </div>
                        <a href="#" id="submitTheForm" class="btn btn-primary">Update Quantity</a>
                    </article>
                    @else
                        <h3>Family Wishlist</h3>
                        <div class="table-responsive">
                            <table class="table table-products">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="no-results">
                                        <td colspan="4" class="text-center"> No results !!!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('product.list')}}" id="submitTheForm" class="btn btn-primary">create family wishlist</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ==========================
        MY ACCOUNT - END 
    =========================== -->
	@endsection

    @section('pageScript')
        <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/home/js/cart.js') }}"></script>

        <!-- PNotify -->
            <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.js')}}"></script>
            <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
            <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>

            @include('laravelPnotify::notify')
          <!-- Datatables -->

        <script type="text/javascript">


             var id = '';
             var product_id = "";

             $(".cancel").on("click", function(res) {
                res.preventDefault();
                alert('Are you sure you want to remove form wishlist');
                var id = $(this).attr('data-wishlistproductId');
                var customerId = $(this).attr('data-customerId');
                var Url = "{{route('customer.removefamilywishlist')}}";

                 /** Delete data ***/
                    $.ajax({
                        type: "GET",
                        url: Url,
                        data:{
                            "_token":"{{csrf_token()}}",
                            "id":id,
                            "customerId":customerId,
                        },
                        success: function(msg){
                            new PNotify({
                                title: 'Success',
                                text: 'Wishlist Item Deleted Successfully. Loading ....',
                                hide: false,
                                type:'success',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 500);
                        }
                            
                    });
                });
        </script>
        <script>
                $('#submitTheForm').on('click', function() {
                        $('#myForm').submit();
                    });
        </script>
        @if($products!= null)
        <script type="text/javascript">
        @foreach($products as $product )
             {{$product->description=""}}
             {{$product->meta_description=""}}
             {{$product->meta_keywords=""}}
         @endforeach

            var productsJson= JSON.parse('{!!  $products->toJson()  !!}');
            console.log(productsJson);
            var analytic =new Analytics();

        $(".cart").on("click", function(res){
                    res.preventDefault();
                    var productid = $(this).data('productid');
                    var Url = "{{route('addcart')}}";
                    var token = $(this).data('token');
                    var cartUrl= "{{route('cart')}}";
                    var checkoutUrl="{{route('checkout')}}";
                    var orderCancleUrl="{{route('order.cancel',':id')}}";
                    var order_CancelUrl = orderCancleUrl.replace(":id",productid);
                    CartClick(productid, productsJson, analytic, token, Url, cartUrl, checkoutUrl,order_CancelUrl);
                });

     
        </script>
       @endif
    @endsection