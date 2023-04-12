@extends('home.layouts.homepagemaster')
  @section('pageCss')
    <!-- Custom CSS -->
      {{-- <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/style-colors.css"> --}}
      <!-- custom css for wizard -->
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
          <div class="container">
              <div class="row">
                <div class="col-md-12">
                 <h1>Faq</h1>

                    <!-- Breadcrumb section -->
                <div class="breadcrumbs">
                  
                        <ol class="breadcrumb">
                            <li><a href="{{route(' ')}}">Home</a></li>
                            <li class="active"><a href="">Faq</a></li>
                        </ol>
                   
                </div>
                  
                </div>

              </div>

          </div>
        </div>
      </section>


<div class="container">
<div class="row">
<div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
 
<div class="content-info">
<h3>1. Who are the Cake Sansaar?</h3>
<p>WWe are a group of crazy cake loving entrepreneurs based in Kathmandu. We are striving to be the best online cake store in Nepal. We want to be a one-stop shop for all the varieties of cakes in Nepal focusing on easier navigation and easier online purchase.
</p>
  </div>

<div class="content-info">
<h3>2. What areas does the Cake Sansaar Deliver?</h3>
<p>Currently we deliver all over kathmandu and will soon be expanding to other parts of the country. Our ultimate goal is to deliver cakes all over Nepal. </p>
  </div>

<div class="content-info">
<h3>3. How much does it cost for delivery?</h3>
<p>There is no delivery cost involved. You can simply order a cake of your choice and we will deliver it to your doorstep.</p>
  </div>


  <div class="content-info">
<h3>4. How many cakes can I have delivered?</h3>
<p>There is no any limitations set in the delivery. You can order as many cakes as you want and we will be happy to deliver it right at your door steps. 
</p>
  </div>

<div class="content-info">
<h3>5. How do I pay?</h3>
<p>The payment medium is Cash on Delivery. We will soon be adding other online payment gateways to our system. </p>
  </div>

<div class="content-info">
<h3>6. Can we cancel the orders?</h3>
<p>Yes, you can cancel your order and there is no any cancellation fees. However, we do not encourage our customers for cancellation as most of the work are already committed. In case of cancellation, we would like to request you to cancel your order 2 hours before the delivery.</p>
  </div>

  <div class="content-info">
<h3>7. Do you deliver on weekends?</h3>
<p>Yes we deliver on weekends as well. We generally operate from Sunday to Friday but we are committed to make your celebrations more joyous with our cakes. This makes us motivated to make deliveries on Saturdays. However, there is an extra delivery charge of Rs.100 for deliveries made on Saturday and free for other days. </p>
  </div>

   <div class="content-info">
<h3>8. Can I order gifts along with the cake?</h3>
<p>We are focusing only on cakes right now. We will soon be launching bundle gifts for your loved ones. You can then choose the perfect gift for your loved ones along with the best cakes. We will be having a wide range of varieties of gifts in our store. 
</p>
  </div>

     <div class="content-info">
<h3>9. Do you make cakes for special events or corporate programs?</h3>
<p>Yes, we take orders for any types of special events and corporate programs. A special occasion can be made more special with our cakes, we provide birthday cakes, anniversary cakes, wedding cakes and any other types of cakes. We do have a huge list of categories and if you don't find your required cakes in our categories, you can contact us via phone call or emails and we will customise your cakes with all your requirements. A party without a cake is just a meeting so make your parties come alive with the best online cake store in Nepal, Cake Sansaar. </p>
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