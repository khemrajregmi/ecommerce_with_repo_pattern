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
                  <h1>Online Support</h1>

                    <!-- Breadcrumb section -->
                <div class="breadcrumbs">
                     <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><a href="">Online Support</a></li>
                        </ol>
                   
                </div>
                  
                </div>

              </div>

          </div>
        </div>
      </section>
    </div>
  </div>
  @endsection
      @section('pageScript')
      <!-- jQuery Smart Wizard -->
      <script type="text/javascript" src="{{ asset('assets/home/js/jquery.smartWizard.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
    @endsection