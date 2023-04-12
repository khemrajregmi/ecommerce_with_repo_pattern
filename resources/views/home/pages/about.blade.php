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
                 <h1>Abouts</h1>

                    <!-- Breadcrumb section -->
                <div class="breadcrumbs">
                   
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><a href="">About Us</a></li>
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
  <div class="content-defult-page">
    <h2>Welcome to Cake Sansaar.</h2>

  <p> Cake Sansaar was founded by 3 young entrepreneurs who are committed to changing the country with all the digital means and resources. Nepal has been gradually shifting towards the digital world but still lacks in many aspects.
With the growth of technology, many online cake stores have evolved in recent years but are yet to provide a quality service. To serve the missing place we have started Cake Sansaar which strives to be the best cake store in Nepal. 
We now serve customers all over Kathmandu and are thrilled that we're able to turn our passion into own website.
</p>

  <p>We are your new go-to online cake shop and would like to forever remain your main priority for any urgent deliveries of cakes. Any party without a cake is considered to be a meeting so, make your parties come alive with the best cakes in town. We provide varieties of cakes from various vendors that would match your tastes and budget. Every cake is made to reflect the joys and bonds to create an everlasting memory for your family and friends. We can smoothen up your occasion with our freshly baked cakes with a high level of hygiene and uncompromising standards. We don’t only make Cakes, we celebrate your joys, accomplishments, memories and precious moments by creating masterpieces for your celebrations: Birthday cakes, wedding cakes, Anniversary cakes, Baby Shower cakes and many more. There’s always a cake for an occasion, so to brighten up your occasions do remember us.
</p>


<p>We have evolved to become one of a premium distributor and wholesaler for cakes and pastries to some well-known restaurants, cafes, supermart, hotels, and bakery.</p>

<p>Our online store is a leading online shop in Kathmandu providing cakes within Kathmandu. Our expansion plan covers to be the best online cake shop in the entire Nation. We provide competitive prices, good after sales services and on-time delivery.</p>


<p>Cake Sansaar provides same-day delivery service seven days a week, including Saturday, within Kathmandu to provide a high level of customer service.
</p>

<p>While the celebration is completely yours, we celebrate along with you and satiate your taste buds in the most scrumptious manner using fresh and high-quality ingredients. </p>

<p>Our cakes taste so good that you will not be able to content yourself with just one. </p>

<p>We  hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
</p>

<p><strong>Bon Appetit!! </strong></p>

<br><br>

</div><br><br>


</div>

</div>
</div>

    </div>
  </div>
  @endsection
      @section('pageScript')
      <!-- jQuery Smart Wizard -->
      <script type="text/javascript" src="{{ asset('assets/home/js/jquery.smartWizard.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
    @endsection