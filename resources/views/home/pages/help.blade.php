
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
                 <h1>Cake Sansaar Help Center</h1>

                    <!-- Breadcrumb section -->
                <div class="breadcrumbs">
                 
                        <ol class="breadcrumb">
                            <li><a href="{{route(' ')}}">Home</a></li>
                            <li class="active"><a href="">Help</a></li>
                        </ol>
                   
                </div>
                  
                </div>

              </div>

        </div>
      </section>

<div class="container">
<div class="row">
<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
 

<div class="row">
<!-- Block Starts -->
<div class="col-lg-4 col-md-4 col-sm-6 box">
<div class="block">
<div class="icon">
<a href=""><img src="{{ asset('assets/home/images/help/how-it-work.png')}}" alt="How it Works"></a>
</div>
<h1><a href="">How Cake Sansaar works</a></h1>
<div class="description">
<p>
What we do, areas and stores we serve, communicating with us</p>
</div>

</div>
</div>
<!-- Block Ends -->
<!-- Block Starts -->
<div class="col-lg-4 col-md-4 col-sm-6 box">
<div class="block">
<div class="icon"><a href=""><img src="{{ asset('assets/home/images/help/ordering.png')}}" alt="ordering"></a></div>
<h1><a href="">Ordering</a></h1>
<div class="description">
<p>
Placing an order, finding items, updating your order</p>
</div>

</div>
</div>
<!-- Block Ends -->
<!-- Block Starts -->
<div class="col-lg-4 col-md-4 col-sm-6 box">
<div class="block">
<div class="icon"><a href=""><img src="{{ asset('assets/home/images/help/delivery.png')}}" alt="delivery"></a></div>
<h1><a href="">Delivery</a></h1>
<div class="description">
<p>
Tracking your order, approving changes, receiving your delivery</p>
</div>

</div>
</div>
<!-- Block Ends -->
<!-- Block Starts -->
<div class="col-lg-4 col-md-4 col-sm-6 box">
<div class="block">
<div class="icon"><img src="{{ asset('assets/home/images/help/pricing.png')}}" alt="pricing"></div>
<h1><a href="">Pricing</a></h1>
<div class="description">
<p>
Delivery, item pricing, taxes and fees</p>
</div>

</div>
</div>
<!-- Block Ends -->
<!-- Block Starts -->
<div class="col-lg-4 col-md-4 col-sm-6 box">
<div class="block">
<div class="icon"><a href=""><img src="{{ asset('assets/home/images/help/payment.png')}}" alt="payment"></a></div>
<h1><a href="">Payment</a></h1>
<div class="description">
<p>
Coupons, gift cards, receipt overview</p>
</div>

</div>
</div>
<!-- Block Ends -->
<!-- Block Starts -->
<div class="col-lg-4 col-md-4 col-sm-6 box">
<div class="block">
<div class="icon"><a href=""><img src="{{ asset('assets/home/images/help/setting.png')}}" alt="setting"></a></div>
<h1><a href="">Account Setting</a></h1>
<div class="description">
<p>
Personal settings, notifications, login issues</p>
</div>

</div>
</div>
<!-- Block Ends -->
</div>


</div>

  </div>

</div>

<div class="bottom-box-bar">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-6 box">
<div class="block">
<div class="icon"><i class="icon icon-info"></i></div>
<h1>Problem with an order?</h1>
<div class="description">
<p>Tell us what went wrong with a previous order and request a refund or redelivery.</p>
<a href="#" class="btn btn--btms btn--xl">Report a Problem</a>
</div>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 box">
<div class="block">
<div class="icon"><i class="icon icon-mail"></i></div>
<h1>Email us</h1>
<div class="description">
<p>We're here to help. Email a Community Support member.</p>
<a href="#" class="btn btn--btms btn--xl">Email Us</a>
</div>
</div>
</div>


<div class="col-lg-4 col-md-4 col-sm-6 box">
<div class="block">
	<div class="icon"><i class="icon icon-telephone"></i></div>
<h1>Call us</h1>
<div class="description">
<p>We are available 24/7.</p>
<a href="#" class="btn btn--btms btn--xl">+977- 9849376288</a>
</div>
</div>
</div>


</div>
<div class="spacers"></div>
</div>


    </div>
  </div>
  @endsection
      @section('pageScript')
      <!-- jQuery Smart Wizard -->
      <script type="text/javascript" src="{{ asset('assets/home/js/jquery.smartWizard.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
    @endsection