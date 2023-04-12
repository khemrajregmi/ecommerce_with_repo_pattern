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
                  <div class="heading-1">Our Store</div>

                    <!-- Breadcrumb section -->
                <div class="breadcrumbs">
                    
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><a href="">Store</a></li>
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

 <div class="main">
      
        <ul class="store-grid">
           <li>
            <div class="store-item store-img-1">
              <div class="store-info-wrap">
                <div class="store-info">
                  <div class="store-info-front store-img-1"></div>
                  <div class="store-info-back">
                    <h3>kathmandu</h3>
                  <p>Owned & Operated by Siddhi Technologies <a href="#">View Store</a></p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="store-item store-img-2">
              <div class="store-info-wrap">
                <div class="store-info">
                  <div class="store-info-front store-img-2"></div>
                  <div class="store-info-back">
                    <h3>Lalitpur</h3>
                  <p>Owned & Operated by Siddhi Technologies <a href="#">View Store</a></p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="store-item store-img-3">
              <div class="store-info-wrap">
                <div class="store-info">
                  <div class="store-info-front store-img-3"></div>
                  <div class="store-info-back">
                    <h3>Bhaktapur</h3>
                    <p>Owned & Operated by Siddhi Technologies <a href="#">View Store</a></p>
                  </div>
                </div>
              </div>
            </div>
          </li>


        </ul>
        
      </div> 
        


     
</div>
</div>
</section>


<br><br>
<br><br>



    </div>
  </div>
  @endsection
      @section('pageScript')
      <!-- jQuery Smart Wizard -->
      <script type="text/javascript" src="{{ asset('assets/home/js/jquery.smartWizard.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
    @endsection