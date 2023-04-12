@extends('home.layouts.homepagemaster')
	@section('content')
     @if(Session::has('flash_message'))
            <script>
                iziToast.info({
                    title: '',
                    message: '{!! session('flash_message') !!}',
                    position: 'topRight'
                });
            </script>
           {{--  <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div> --}}
        @endif
		<div id="pageContent"> 
    
    <!-- Breadcrumb section -->
      <section class="content content--parallax top-null banner-parallex" data-image="images/parallax-bg.jpg')}}" style="background-position: 50% 19px;">
          <div class="container">
            <div class="container">
          <div class="row">
            <div class="col-md-12">
             <h1>Shopping cart</h1>

                <!-- Breadcrumb section -->
            <div class="breadcrumbs">
               
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active"><a href="">Shopping cart</a></li>
                    </ol>
               
            </div>
              
            </div>

          </div>

        </div>
          </div>
      </section>
        
        <!-- Content section -->
        <section class="content">
          <div class="container">
            <div class="row">
              <div class="col-md-9 aside-column">
               
                <div class="card card--padding bottom-margin">
                <form id="myForm" data-parsley-validate="" class="form-horizontal form-label-left" action="{{route('order.update')}}" method="post">
                                                {{csrf_field()}}
                  <table class="table shopping-cart-table text-center">
                    <thead>
                      <tr>
                        <th>&nbsp;</th>
                        <th>Product Name</th>
                        <th>&nbsp;</th>
                        <th>Unit Price </th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php $counter = 1;@endphp
                    <?php foreach(Cart::content() as $row) :?>
                    <tr id="image-row<?php echo $counter;?>">
                    <td><div class="th-title visible-xs">Remove From Cart:</div>
                      <a class="icon-clear shopping-cart-table__delete" href="{{route('order.cancel',$row->rowId)}}"></a></td>
                    <td class="no-title"><div class="shopping-cart-table__product-image"><a href="product.html"><img src="{{asset($row->options->image)}}" alt=""/></a></div></td>
                    <td><div class="th-title visible-xs">Product Name:</div>
                      <h6 class="shopping-cart-table__product-name text-left text-uppercase"><a href="product.html">{{$row->name}}</a></h6>
                      <div class="shopping-cart-table__product-color text-left">
                        <ul class="options-swatch options-swatch--color">
                          <li><a href="#"><span class="swatch-label"><img src="images/colors/red.png" width="10" height="10" alt=""/></span></a></li>
                        </ul>
                      </div></td>
                    <td><div class="th-title visible-xs">Unit Price:</div>
                      <div class="shopping-cart-table__product-price">{{$row->price}}</div></td>
                    <td><div class="th-title visible-xs">QTY:</div>
                      <div class="input-group-qty"> <span class="pull-left"> </span>
                        <input type="hidden" name="rowId[<?php echo $counter;?>][rowId]" value="{{$row->rowId}}">
                        <input type="hidden" name="rowId[<?php echo $counter;?>][image]" value="{{$row->options->image}}">
                        <input type="text" name="rowId[<?php echo $counter;?>][qty]" class="input-number input--wd input-qty pull-left" value="{{$row->qty}}" min="1" max="100">
                        <span class="pull-left btn-number-container">
                        <button type="button" class="btn btn-number btn-number--plus" data-type="plus"> + </button>
                        <button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus"> – </button>
                        </span> </div>
                      <a class="icon-pencil shopping-cart-table__delete" href="#"></a></td>
                    <td><div class="th-title visible-xs">Subtotal:</div>
                      <div class="shopping-cart-table__product-price">Rs <?php echo (($row->price)*$row->qty); ?></div></td>
                    </tr>             
                    <?php $counter++;?>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                </form>
                  <div class="hr"></div>
                  <div class="divider divider--xs"></div>
                  <div class="row shopping-cart-btns">
                    <div class="col-sm-12 col-md-4"><a href="{{route('product.list')}}" class="btn btn--wd pull-left">Continue Shopping</a></div>
                    <div class="divider divider--xs visible-sm visible-xs"></div>
                    <div class="col-sm-12 col-md-8"><a href="#" class="btn btn--wd btn--light pull-right">Clear Shopping Cart</a>
                      <div class="divider divider--xs visible-sm visible-xs"></div>
                      <a href="#" id="submitTheForm" class="btn btn--wd pull-right">Update Shopping Cart</a></div>
                  </div>
                  <div class="divider divider--xxs"></div>
                </div>
              </div>
              <div class="col-md-3 aside-column">
                <div class="card card--collapse">
                  <h4 class="h-pad-sm card-title">DISCOUNT CODES</h4>
                  <div class="card-content">
                    <p>Enter your coupon code if you have one.</p>
                    <input type="text" class="input--wd input--wd--full">
                    <div class="divider divider--xs"></div>
                    <button type="submit" class="btn btn--wd text-uppercase wave waves-effect">Apply Coupon</button>
                  </div>
                </div>
                <div class="divider divider--xs"></div>
                <div class="divider divider--xs"></div>
                <h4 class="h-pad-sm">CART TOTALS</h4>
                <table class="table table-total">
                  <tbody>
                    <tr>
                      <th class="text-left"> Subtotal </th>
                      <th class="text-right"> <?php echo Cart::subtotal(); ?> </th>
                    </tr>
                    <tr>
                      <td class="text-left"><h2>Grand Total</h2></td>
                      <td class="text-right"><h2><?php echo Cart::subtotal(); ?></h2></td>
                    </tr>
                  </tbody>
                </table>
                <div class="divider divider--xs"></div>
                <div class="text-center"> <a href="{{route('checkout')}}" class="btn btn--wd btn--xl">Proceed to checkout</a>
                <div class="divider divider--xxs"></div>
                  <p>Checkout with Multiple Addresses</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Content section --> 
    </div>   
	@endsection
    @section('pageScript')
    <script type="text/javascript"
                    src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>

    <script>
        //Analytics tracking
        function removeFromCart(item) {
                var analytics = new Analytics();
                analytics.removeProductFromCart(item);
            }
            $('#submitTheForm').on('click', function() {
                    $('#myForm').submit();
                });
    </script>
    @endsection