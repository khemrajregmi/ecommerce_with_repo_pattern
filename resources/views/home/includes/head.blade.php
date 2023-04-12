<!DOCTYPE html>
<html>
<head>
    <!-- ==========================
    	Meta Tags
    =========================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ==========================
    	Title
    =========================== -->
    <title>Kerung - The easiest way to shop</title>

    <!-- ==========================
    	Fonts
    =========================== -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,900,800' rel='stylesheet' type='text/css'>

    <!-- ==========================
    	CSS
    =========================== -->
    <link href="{{ asset('assets/home/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/home/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/home/css/dragtable.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/home/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/home/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/home/css/color-switcher.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/home/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/home/css/color/red.css') }}" id="main-color" rel="stylesheet" type="text/css">
    @yield('pageCss')

    <!-- ==========================
    	JS
    =========================== -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65259042-7', 'auto');
        ga('require', 'ec');
    </script>
    <script>
    var SITE = {
        baseUrl : '<?php echo asset(""); ?>',
        jsPath : '<?php echo asset("assets/home/js/"); ?>',
        pluginPath : '<?php echo asset("assets/plugins/"); ?>',
        imgPath : '<?php echo asset("assets/home/images/"); ?>',
    }
    // alert(SITE.baseUrl);
    </script>


</head>
<body>