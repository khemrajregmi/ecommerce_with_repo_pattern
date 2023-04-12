<!DOCTYPE html>
<html>
<head>
<!-- Basic -->
{{-- @yield('meta') --}}

<link rel="shortcut icon" href="{{ asset('assets/home/images/favicon.png')}}">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Web Fonts  -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
<!-- Icon Fonts  -->
<link rel="stylesheet" href="{{ asset('assets/home/font/style.css')}}">
<link rel="stylesheet" href="{{ asset('assets/home/css/font-awesome.min.css')}}">
<!-- Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/home/vendor/waves/waves.css')}}">
<link rel="stylesheet" href="{{ asset('assets/home/vendor/slick/slick.css')}}">
<link rel="stylesheet" href="{{ asset('assets/home/vendor/slick/slick-theme.css')}}">
<link rel="stylesheet" href="{{ asset('assets/home/vendor/bootstrap-select/bootstrap-select.css')}}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('assets/home/css/style.css')}}">
@yield('pageMetaData')
@yield('pageCss')
<link rel="stylesheet" href="{{ asset('assets/home/css/style-colors.css')}}">
<!-- Custom Fonts -->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
{{-- Alerts Css and Js  --}}
        <link href="{{ asset('assets/home/css/iziToast.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/home/css/iziToast.css')}}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="{{ asset('assets/home/js/iziToast.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/home/js/iziToast.min.js') }}"></script>

        

       
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/home/vendor/rs-plugin/css/settings.css')}}" media="screen" />
<!-- Head Libs -->

<!--[if IE]>
        <link rel="stylesheet" href="css/ie.css')}}">
        <![endif]-->
<!--[if lte IE 8]>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
        <![endif]-->

<!-- Modernizr -->
<script src="{{ asset('assets/home/vendor/modernizr/modernizr.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142274474-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142274474-1');
</script>


</head>
<body>
<div id="loader-wrapper" class="loader-off">
    <div id="loader"></div>
</div>
<!-- Modal Search -->
	@include('home.layouts.partials.search')
<!-- / end Modal Search -->

<div class="wrapper"> 
	@include('home.layouts.partials.homepageheader')
	@yield('content')
	@include('home.layouts.partials.footer')
</div>

@include('home.layouts.partials.comparebox')
@include('home.layouts.partials.add_tocart_modal')
@include('home.layouts.partials.add_towishlist_modal')
<!-- Vendor --> 
<!-- jQuery 1.10.1--> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
<script src="{{ asset('assets/home/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/countdown/jquery.plugin.min.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/countdown/jquery.countdown.min.js')}}"></script> 
<!-- jQuery form validation --> 
<script src="{{ asset('assets/home/vendor/form/jquery.form.js')}}"></script> 
<script src="{{ asset('assets/home/vendor/form/jquery.validate.min.js')}}"></script> 
<!-- Custom --> 
<script src="{{ asset('assets/home/js/custom.js')}}"></script> 
<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{ asset('assets/home/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script> 
<script type="text/javascript" src="{{ asset('assets/home/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script> 
<script type="text/javascript">
                jQuery(document).ready(function() {
                    var windowW = window.innerWidth || $j(window).width();
                    var fullwidth;
                    var fullscreen;

                    if (windowW > 767) {
                        fullwidth = "off";
                        fullscreen = "on";  
                    } else {
                        fullwidth = "on";
                        fullscreen = "off"; 
                    }                
                    
                                
                    jQuery('.tp-banner').show().revolution(
                    {
                        dottedOverlay:"none",
                        delay:16000,
                        startwidth:1170,
                        startheight:700,
                        hideThumbs:200,
                        hideTimerBar:"on",
                        
                        thumbWidth:100,
                        thumbHeight:50,
                        thumbAmount:5,
                        
                        navigationType:"none",
                        navigationArrows:"",
                        navigationStyle:"",
                        
                        touchenabled:"on",
                        onHoverStop:"on",
                        
                        swipe_velocity: 0.7,
                        swipe_min_touches: 1,
                        swipe_max_touches: 1,
                        drag_block_vertical: false,
                                                
                        parallax:"mouse",
                        parallaxBgFreeze:"on",
                        parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
                                                
                        keyboardNavigation:"off",
                        
                        navigationHAlign:"center",
                        navigationVAlign:"bottom",
                        navigationHOffset:0,
                        navigationVOffset:20,

                        soloArrowLeftHalign:"left",
                        soloArrowLeftValign:"center",
                        soloArrowLeftHOffset:20,
                        soloArrowLeftVOffset:0,

                        soloArrowRightHalign:"right",
                        soloArrowRightValign:"center",
                        soloArrowRightHOffset:20,
                        soloArrowRightVOffset:0,
                                
                        shadow:0,
                        fullWidth: fullwidth,
                        fullScreen: fullscreen,

                        spinner:"",
                        
                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,

                        shuffle:"off",
                        
                        autoHeight:"off",                       
                        forceFullWidth:"off",                                                       
                                                                                                
                        hideThumbsOnMobile:"off",
                        hideNavDelayOnMobile:1500,                      
                        hideBulletsOnMobile:"off",
                        hideArrowsOnMobile:"off",
                        hideThumbsUnderResolution:0,
                        
                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        startWithSlide:0,
                        fullScreenOffsetContainer: ".header"    
                    });
                    
                    
                    
                                    
                }); //ready
                
            </script>


@yield('pageScript')
</body>
</html>