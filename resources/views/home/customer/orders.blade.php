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
          <div class="heading-1">Order History</div>

            <!-- Breadcrumb section -->
        <div class="breadcrumbs">
           
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="">My Account</a></li>
                    <li class="active"><a href="">Order History</a></li>
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
             
              <div class="card card--padding row">
                {{-- customer sidebar starts --}}
                    @include('home.customer.partials.customer_sidebar')
                {{-- customer sidebar ends --}}
                 <div class="col-xs-9">
                    <div class="clearfix">
                          <div>
                             <h4 class="text-uppercase h-pad-sm clearfix">
                                <span class="pull-left">ORDER HISTORY</span> 
                             </h4>
                          </div>
                          {{dd($orders)}}
                          <div class="table-responsive border">
                             <table class="table table-bordered order-history-table">
                                <tbody>
                                   <tr>
                                      <th class="col-xs-1">Order ID</th>
                                      <th class="col-xs-5" colspan="2">Item Details</th>
                                      <th class="col-md-1 hidden-xs hidden-sm">Quantity</th>
                                      <th class="col-xs-2">Total Price</th>
                                      <th class="col-xs-2">Status</th>
                                      <th class="col-xs-1">View</th>
                                   </tr>
                                   @foreach($orders as $key => $order)
                                   <tr>
                                   <td><a href="single-order.html">#{{$key+1}}</a></td>
                                      <td class="order-list-img">
                                         <img src="http://staging.suvalaav.com/assets/home/images/product-list.png" alt="Product">
                                      </td>
                                      <td>
                                         <span>
                                            <h5>Chivas Regal</h5>
                                            <p class="order-summary-desc">
                                               order description
                                            </p>
                                         </span>
                                      </td>
                                      <td class="hidden-xs hidden-sm">3</td>
                                      <td>0.0000</td>
                                      <td><span class="label label-info">Pending (Default)</span>
                                      </td>
                                      <td><a href="#" class="btn btn-custom">View</a></td>
                                   </tr>
                                   @endforeach
                                   
                                </tbody>
                             </table>
                          </div>
                     
                    </div>
                 </div>
              </div>
           </div>
        </section>
    <!-- End Content section -->  
@stop