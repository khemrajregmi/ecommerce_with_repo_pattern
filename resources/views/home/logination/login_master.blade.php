
<!DOCTYPE html>
<html>
<head>

<!-- Basic -->
<meta charset="utf-8">
<title>WellDone - Responsive HTML5 Template 1.0.4</title>
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="WellDone - Responsive HTML5 Template">
<meta name="author" content="etheme.com">
<link rel="shortcut icon" href="favicon.ico">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Web Fonts  -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
<!-- Icon Fonts  -->
<link rel="stylesheet" href="{{ asset('assets/home/font/style.css')}}">
<!-- Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/home/vendor/waves/waves.css')}}">
<link rel="stylesheet" href="{{ asset('assets/home/vendor/slick/slick.css')}}">
<link rel="stylesheet" href="{{ asset('assets/home/vendor/slick/slick-theme.css')}}">
<link rel="stylesheet" href="{{ asset('assets/home/vendor/bootstrap-select/bootstrap-select.css')}}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('assets/home/css/style.css')}}">
<link rel="stylesheet" href="{{ asset('assets/home/css/style-colors.css')}}">
<!-- Custom Fonts -->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>

<!-- Head Libs -->

<!--[if IE]>
        <link rel="stylesheet" href="css/ie.css')}}">
        <![endif]-->
<!--[if lte IE 8]>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js')}}/1.3.0/respond.js')}}"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js')}}"></script>
        <![endif]-->

<!-- Modernizr -->
<script src="{{ asset('assets/home/vendor/modernizr/modernizr.js')}}"></script>
</head>

<body>
<div id="loader-wrapper" class="loader-off">
<div id="loader"></div>
</div>


<div class="wrapper"> 
  <!-- Header section -->
  <header class="header header--only-logo header--fill">
    <div class="container"> 
      <!--  Logo  -->          <a class="logo" href="index.html">
          	<img class="logo-default"  src="{{ asset('assets/home/images/logo.png') }}" alt="Cakesansaar Logo"/> 
            <img class="logo-mobile" src="{{ asset('assets/home/images/logo-mobile.png') }}" alt="Mobile Cakesansaar"/> 
            <img class="logo-transparent" src="{{ asset('assets/images/logo-transparent.png') }}" alt="Logo Transparent"/> 
          </a> 
<!-- End Logo --> 
    </div>
  </header>
  <div id="pageContent"> 
    
    <!-- Content section -->
    
    <section class="content content--fill top-null">
      <div class="container">
        <h2 class="h-pad-sm text-uppercase text-center">Already Registered?</h2>
        <h6 class="text-uppercase text-center">If you have an account with us, please log in.</h6>
        <div class="divider divider--sm"></div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="card card--form"> <a href="#" class="icon card--form__icon icon-user-circle"></a>
              <form action="#" class="contact-form">
                <input type="text" class="input--wd input--wd--full" placeholder="Email">
                <input type="password" class="input--wd input--wd--full" placeholder="Password">
                <div class="checkbox-group">
                  <input type="checkbox" id="checkBox1">
                  <label for="checkBox1"> <span class="check"></span> <span class="box"></span>Remember me</label>
                </div>
                <div class="divider divider--xs"></div>
                <button type="submit" class="btn btn--wd text-uppercase wave waves-effect">Sign In</button>
              </form>
              <div class="card--form__footer"> <a href="#">Forgot Your Password?</a><br><a href="#">&lt;&nbsp;Back</a> </div>
            </div>
          </div>
        </div>
        <div class="divider divider--md"></div>
        <h2 class="h-pad-sm text-uppercase text-center">New Here?</h2>
        <h6 class="text-uppercase text-center">Registration is free and easy!</h6>
        <div class="divider divider--xs"></div>
        <div class="text-center"><a href="create-account.html" class="btn btn--wd text-uppercase wave">create an account</a></div>
        <div class="divider divider--md"></div>
      </div>
    </section>
    
    <!-- End Content section --> 
  </div>
</div>
<!-- Vendor --> 
<!-- jQuery 1.10.1--> 
<script src="{{ asset('assets/home/vendor/jquery/jquery.js')}}"></script> 
<!-- Bootstrap 3--> 
<script src="{{ asset('assets/home/vendor/bootstrap/bootstrap.min.js')}}"></script> 
<!-- Specific Page Vendor --> 
<script src="{{ asset('assets/home/vendor/waves/waves.min.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/slick/slick.min.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/bootstrap-select/bootstrap-select.min.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/parallax/jquery.parallax-1.1.3.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/waypoints/jquery.waypoints.min.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/waypoints/sticky.min.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/doubletaptogo/doubletaptogo.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/elevatezoom/jquery.elevatezoom.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script><script src="{{ asset('assets/home/vendor/countdown/jquery.plugin.min.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/countdown/jquery.countdown.min.js')}}"></script> 
<!-- jQuery form validation --> 
<script src="{{ asset('assets/home/vendor/form/jquery.form.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/form/jquery.validate.min.js')}}"></script> 
<!-- Custom --> 
<script src="{{ asset('assets/home/js/custom.js')}}"></script> 
</body>
</html>