@extends('home.layouts.homepagemaster')
    @section('pageCss')
        <link href="{{ asset('assets/home/css/account.css') }}" rel="stylesheet" type="text/css" >
    @stop
@section('content')

<section class="content content--parallax top-null banner-parallex" data-image="images/parallax-bg.jpg')}}" style="background-position: 50% 19px;">
      <div class="container">
        <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading-1">Wish List</div>

            <!-- Breadcrumb section -->
        <div class="breadcrumbs">
           
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="">My Account</a></li>
                    <li class="active"><a href="">Wish List</a></li>
                </ol>
           
        </div>
          
        </div>

      </div>

    </div>
      </div>
    </section>

    <!-- Breadcrumb section -->
    
  
    
    <!-- Content section -->
    <section class="content">
      <div class="container">
      
        <div class="card card--padding">
          <table class="table shopping-cart-table">
            <thead>
              <tr class="text-uppercase">
                <th>&nbsp;</th>
                <th class="text-left">Product Name</th>
                <th class="text-center">Unit Price </th>
                <th class="text-center">Remove</th>
                <th class="text-center">Continue</th>
              </tr>
            </thead>
            <tbody>
            @if(!$products->isEmpty())
            @foreach ($products as $product)
              <tr class="text-center">
                <td class="no-title image-col text-left"><div class="shopping-cart-table__product-image"><a href="product.html"><img src="{{asset($product->image) }}" alt=""/></a></div></td>
                <td class="text-left"><div class="th-title visible-xs">Product Name:</div>
                  <h6 class="shopping-cart-table__product-name text-left text-uppercase"><a href="product.html">{{ $product->name }} </a></h6></td>
                <td><div class="th-title visible-xs">Unit Price:</div>
                  <div class="shopping-cart-table__product-price">{{ $product->price }}</div></td>
                <td><div class="th-title visible-xs">Remove:</div>
                  <a class="icon-clear cancel" href="#" data-productid="{{ $product->product_id }}" data-customerId="{{ Auth::user()->customer_id }}"></a></td>
                <td><div class="th-title visible-xs">Continue:</div>
                  <a class="icon-verification" href="#"></a></td>
              </tr>
            @endforeach
            @else
             You have no Wishlist !!!!!!!!
            @endif
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- End Content section --> 
    @section('pageScript')
       <script type="text/javascript">


           var id = '';
           var product_id = "";

           $(".cancel").on("click", function(res) {
            res.preventDefault();
            alert('Are you sure you want to remove form wishlist');
            var id = $(this).data('productid');
            var customerId = $(this).attr('data-customerId');
            var Url = "{{route('customer.removewishlist')}}";

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
                    
                                location.reload(); 
                    });
        });
    </script>
    @endsection
@stop
    