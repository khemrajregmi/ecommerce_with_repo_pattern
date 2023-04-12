@extends('home.layouts.loginmaster')
@section('section')
<div id="loader-wrapper" class="loader-off">
  <div id="loader"></div>
</div>
<div class="wrapper">
  <div id="pageContent"> 

    <!-- Content section -->
    
    <section class=" top-null">
      <section class="content login--parallax top-null ">
        <div class="container">
          <h2 class="h-pad-sm  text-center">Create a New Account</h2>
          <h6 class=" text-center">It’s free and always will be.</h6>
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
              <div class="card card--form card--form_reg">
                <div class="divider divider--xs"></div>
                <form id="demo-form2" data-parsley-validate="" class="contact-form" required="required" method="post" action="{{route('signup')}}">
                  {{csrf_field()}}
                  <h4 class=" text-left">Personal Information</h4>

                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                     <input type="text" name="firstname" class="input--wd input--wd--full" placeholder="First name *">
                   </div>

                   <div class="col-md-6 col-sm-6">
                    <input type="text" name="lastname" class="input--wd input--wd--full" placeholder="Last name *">
                  </div>



                <div class="col-md-6 col-sm-6">
                  <input type="text" name="email" class="input--wd input--wd--full" placeholder="Email address *">
                </div>

                <div class="col-md-6 col-sm-6">
                 <input type="text" name="telephone" class="input--wd input--wd--full" placeholder="Telephone *">
               </div>


             </div>


             <div class="checkbox-group">
              <input type="checkbox" name="newsletter" id="checkBox1">
              <label for="checkBox1"> <span class="check"></span> <span class="box"></span>Sign Up for Newsletter</label>
            </div>
            <div class="divider divider--xs"></div>
            <h4 class="text-left">Login Information</h4>

             <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <input type="password" name="password" class="input--wd input--wd--full" placeholder="Password *">
                   </div>

                   <div class="col-md-6 col-sm-6">
 <input type="password" name="cpassword" class="input--wd input--wd--full" placeholder="Confirm password *">
                   </div>

                 </div>
         
           
            <div class="checkbox-group">
              <input type="checkbox" id="checkBox2">
              <label for="checkBox2"> <span class="check"></span> <span class="box"></span>Remember Me</label>
            </div>
            <div class="divider divider--xs"></div>
            <input type="submit" class="btn btn--wd text-uppercase wave"></button>
          </form>
          
             <div class="row">
                  <div class="col-lg-12">
                  <div class="social-login">
                  <ul>
                    <li>
                    <a href="{{ route('social.login','facebook') }}">
                        <i class="fa fa-facebook"></i>
                       
                    </a>
                  </li>

             
           <li>
                    <a href="{{ route('social.login','twitter') }}" >
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

          <div class="card--form__footer"> <a href="{{url('/')}}">Home</a> | <a href="{{url('/stores')}}">Store</a> | <a href="{{url('/privacy-notice')}}">Privacy Notice</a> | <a href="#">Terms & Conditions</a> </div>
        </div>
      </div>
    </div>
    <div class="divider divider--xl"></div>
  </div>
</section>
</section>

<!-- End Content section --> 
</div>
</div>
@stop



