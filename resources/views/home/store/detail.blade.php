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
                  <div class="heading-1">Store Business Name</div>

                    <!-- Breadcrumb section -->
                <div class="breadcrumbs">
                    
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><a href="">Store Name</a></li>
                        </ol>
                   
                </div>
                  
                </div>

              </div>

          </div>
        </div>
      </section>

      <section class="content">
<div class="container">
<div class="row">
<div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1">

<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8">
    <div class="store-detail">
      <div class="store-logo">
        <img src="{{ asset('assets/home/images/products/product-1.jpg')}}" data-lazy="{{ asset('assets/home/images/products/product-1.jpg')}}" alt=""/>

      </div>
<h2>Who we are..!</h2>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br><br>

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4">
  <div class="store-contact">
  <h2>Contact Details</h2>
  <div class="v-links-list mobile-collapse__content">
              <ul>
                <li class="icon icon-home">Basundhara, kathmandu</li>
                <li class="icon icon-telephone">+977- 9843204425</li>
                <li class="icon icon-mail"><a href="mailto:info@mycake.com">info@mycake.com</a></li>
              
              </ul>

               <a href="#" class="btn btn--wd">Quick Contact</a>
            </div>

          <div class="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14130.740028189493!2d85.33106357515928!3d27.696128874742854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sbaneshwor!5e0!3m2!1sen!2snp!4v1527403327854" width="100%" height="180" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>



</div>
</div>
</div>



</div>



</div>

</div>
</section>
<br><br><br>
    </div>
  </div>
  @endsection
      @section('pageScript')
      <!-- jQuery Smart Wizard -->
      <script type="text/javascript" src="{{ asset('assets/home/js/jquery.smartWizard.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
    @endsection