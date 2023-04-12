@extends('home.layouts.homepagemaster')
  @section('pageCss')
      <link rel="stylesheet" href="{{ asset('assets/home/css/main.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/home/css/media.css')}}">

      <style>
         table tr td{
         padding:0 5px;
         vertical-align: top;
         }
         .first-td{
         padding:15px;
         }
         .first-tr{
         border-bottom:1px solid #f4f4f4;
         }
         .first-tr:last-child{
         border-bottom:none;
         }
         .total-cost-table{
         font-size: 16px;
         margin-right: 35px;
         }
         .total-cost-table td{
         padding:15px 15px 1px;
         }
      </style>
  @endsection
  @section('content')
  <div id="pageContent" class="page-content page-content--fill">
    <div id="pageContent">
      <section class="content content--parallax top-null banner-parallex" data-image="images/parallax-bg.jpg')}}" style="background-position: 50% 19px;">
        <div class="container">
         
              <div class="row">
                <div class="col-md-12">
                 <h1>How It Works</h1>

                    <!-- Breadcrumb section -->
                <div class="breadcrumbs">
                 
                        <ol class="breadcrumb">
                            <li><a href="{{route(' ')}}">Home</a></li>
                            <li class="active"><a href="">How It Works</a></li>
                        </ol>
                   
                </div>
                  
                </div>

              </div>

        </div>
      </section>

<div class="container">
<div class="row">
<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
 
<div class="how-it-works text-center">
   <img src="{{ asset('assets/home/images/how-it-works/get-started.png')}}" alt="get started" class="images"> 
<h2>Getting started with Cake Sansaar</h2>
<p>Visit our Cake Sansaar and save your time and money — Cake Sansaar delivers cakes and gift items in as little as an hour! We connect you with Personal Shoppers in your area to shop and deliver any type of cake from your favorite stores.</p>
  </div>

  <div class="how-it-works ">
<h2>Shopping with Cake Sansaar is very easy!</h2>
<div class="row layout">
<div class="col-lg-3 col-md-3 col-sm-3">
  <img src="{{ asset('assets/home/images/how-it-works/shop-store.png')}}" alt="shop store" class="images"> 
</div>

<div class="col-lg-9 col-md-9 col-sm-9 gaps">
  <h4>1. Shop your favorite local grocery stores</h4>
<p>You can shop from anywhere using your computer, iPhone, iPad or Android device.</p>
</div>
</div>

<div class="row layout">
<div class="col-lg-3 col-md-3 col-sm-3">
  <img src="{{ asset('assets/home/images/how-it-works/schedule-delivery.png')}}" alt="schedule delivery" class="images"> 
</div>

<div class="col-lg-9 col-md-9 col-sm-9 gaps">
  <h4>2. Schedule a delivery</h4>
<p>You can shop from anywhere using your computer, iPhone, iPad or Android device.</p>
</div>
</div>

<div class="row layout">
<div class="col-lg-3 col-md-3 col-sm-3">
  <img src="{{ asset('assets/home/images/how-it-works/received.png')}}" alt="received" class="images"> 
</div>

<div class="col-lg-9 col-md-9 col-sm-9 gaps">
  <h4>3. Get Cake Sansaar delivered to you</h4>
<p>Let Cake Sansaar save you time, Money and energy!</p>
</div>
</div>

  </div>

</div>

</div>
</div>

<div class="spacers"></div>
    </div>
  </div>
  @endsection
      @section('pageScript')
      <!-- jQuery Smart Wizard -->
      <script type="text/javascript" src="{{ asset('assets/home/js/jquery.smartWizard.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
    @endsection