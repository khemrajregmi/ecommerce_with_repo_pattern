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
                 <h1>Store</h1>

                    <!-- Breadcrumb section -->
                <div class="breadcrumbs">
                   
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><a href="">Faq</a></li>
                        </ol>
                   
                </div>
                  
                </div>

              </div>

          </div>
        </div>
      </section>

    <div class="headerstore" id="storeheader">
      <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4">
aDADA
                  </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#store" data-toggle="tab">Profile</a></li>
      <li><a href="#profile" data-toggle="tab">Profile</a></li>
    </ul>
  </div>
 </div>
</div>
</div>


</div>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        assadsa <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda<br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda
      </div>
      <div class="tab-pane fade" id="profile">
      <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda<br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda <br>aDAdaDAda
      </div>
  </div>
    </div>
  </div>
 




  <script type="text/javascript">// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the header
var headerstore = document.getElementById("storeheader");

// Get the offset position of the navbar
var sticky = headerstore.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    headerstore.classList.add("sticky");
  } else {
    headerstore.classList.remove("sticky");
  }
}</script>
  @endsection
      @section('pageScript')
      <!-- jQuery Smart Wizard -->
      <script type="text/javascript" src="{{ asset('assets/home/js/jquery.smartWizard.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
    @endsection