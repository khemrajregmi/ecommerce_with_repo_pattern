@extends('home.layouts.loginmaster')
@section('section')
 {{--  <div class="wrapper"> 
    <!-- Header section -->
    <header class="header header--only-logo header--fill">
      <div class="container"> 
        <!--  Logo  --><a class="logo" href="#">
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
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('singin')}}">
                {{csrf_field()}}
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
          <div class="text-center"><a href="{{route('signup')}}" class="btn btn--wd text-uppercase wave">create an account</a></div>
          <div class="divider divider--md"></div>
        </div>
      </section>
      
      <!-- End Content section --> 
    </div>
  </div> --}}

  <div id="loader-wrapper" class="loader-off">
<div id="loader"></div>
</div>
<div class="wrapper"> 
  <!-- Header section -->
  {{-- <header class="header header--only-logo header--fill">
    <div class="container"> 
      <!--  Logo  -->          <a class="logo" href="#">
           <img class="logo-default"  src="{{ asset('assets/home/images/logo.png') }}" alt="Cakesansaar Logo"/> 
            <img class="logo-mobile" src="{{ asset('assets/home/images/logo-mobile.png') }}" alt="Mobile Cakesansaar"/> 
            <img class="logo-transparent" src="{{ asset('assets/images/logo-transparent.png') }}" alt="Logo Transparent"/> 
          </a> 
<!-- End Logo --> 
    </div>
  </header> --}}
  <div id="pageContent"> 
    
    <!-- Content section -->
    
    <section class=" top-null">
        <section class="content login--parallax top-null ">
      <div class="container">
        <h2 class="h-pad-sm text-center">Already Registered?</h2>
        <h6 class=" text-center">If you have an account with us, please log in.</h6>

        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="card card--form"> <a href="#" class="icon card--form__icon icon-user-circle"></a>
              <form id="demo-form2" data-parsley-validate="" class="contact-form" required="required" method="post" action="{{route('singin')}}">
                {{csrf_field()}}
                <input type="text" name="email" value="{{ old('email') }}" class="input--wd input--wd--full" placeholder="Email">
                <div class="text-danger">{{ $errors->first('email') }}</div>
                <input type="password" name="password"  class="input--wd input--wd--full" placeholder="Password">
                <div class="text-danger">{{ $errors->first('password') }}</div>
                <div class="checkbox-group">
                  <input type="checkbox" id="checkBox1">
                  <label for="checkBox1"> <span class="check"></span> <span class="box"></span>Remember me</label>
                </div>
                &nbsp;| &nbsp;<a href="#">Forgot Your Password?</a>
                <div class="divider divider--xs"></div>
                <input type="submit" class="btn btn--wd text-uppercase wave waves-effect">
              </form>
              <div class="row">
                <div class="col-lg-12">
                  <div class="social-login-main">
                    
                  <div class="social-login">
                  <ul>
                    <li>
                    <a href="{{ route('social.login','facebook') }}">
                        <i class="fa fa-facebook"></i>
                        
                    </a>
                  </li>

              
                   <li>
                    <a href="{{ route('social.login','twitter') }}">
                        <i class="fa fa-twitter"></i>
                       
                    </a>
                  </li>
                
              <li>
                    <a href="{{ route('social.login','google') }}">
                        <i class="fa fa-google-plus"></i>
                     
                    </a>
                  </li>
                  </ul>
                  <div class="clearfix"></div>
                  </div>
                  </div>
                </div>  
            </div>
              <div class="card--form__footer">  <h4 class="h-pad-sm text-center">New Here?</h4>

<h6 class=" text-center">Registration is free and easy!</h6>

<h5> <a href="{{route('signup')}}">+ Create an account</a></h5>
              </div>
            </div>
          </div>
        </div>
        
       
        
    
       
        <div class="divider divider--md"></div>
      </div>
    </section>
    </section>
    
    <!-- End Content section --> 
  </div>
</div>
<!-- Vendor -->
@stop



