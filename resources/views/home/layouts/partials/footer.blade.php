
  <footer class="footer">
 
    <div class="footer__column-links">
     <div class="footer-logo">
       <img src="{{ asset('assets/home/images/logo-cake.png') }}" alt="Logo"/>

     </div>
      <div class="back-to-top">
      <a href="#" class="show"><i class="fa fa-arrow-up"></i></a></div>
      <div class="container">
        <div class="row">
        
          <div class="col-sm-3 col-md-2 mobile-collapse">
            <h5 class="title text-uppercase mobile-collapse__title">Information </h5>
            <div class="v-links-list mobile-collapse__content">
              <ul>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('shipping.return') }}">Shipping & Returns</a></li>
                <li><a href="{{ route('privacy.policy') }}">Privacy Notice</a></li>
                 <li><a href="{{ route('howitworks') }}">How it Works</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3 col-md-2 mobile-collapse">
            <h5 class="title text-uppercase mobile-collapse__title">Service</h5>
            <div class="v-links-list mobile-collapse__content">
              <ul>
                <li><a href="{{ route('online.support') }}">Online support</a></li>
                <li><a href="{{ route('help') }}">Help</a></li>
                <li><a href="{{ route('faq') }}">FAQs</a></li>
                <li><a href="{{ route('call.centre') }}">Call Center</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3 col-md-2 mobile-collapse">
            <h5 class="title text-uppercase mobile-collapse__title">My account</h5>
            <div class="v-links-list mobile-collapse__content">
              <ul>
              @if(Auth::check())
                <li><a href="{{route('customer.dashboard')}}">My Account</a></li>
                <li><a href="{{route('customer.order',Auth::user()->customer_id)}}">Order history</a></li>
                <li><a href="{{route('customer.address')}}">My Addresses</a></li>
              @else
                <li><a href="{{route('singin')}}">Login</a></li>
                <li><a href="{{route('checkout')}}">Checkout</a></li>
                <li><a href="{{route(' ')}}" class="emptywishlist">Wishlist (0)</a></li>
                <li><a href="{{route('compare')}}"  class="compare_product">Compare (0) </a></li>
              @endif
              </ul>
            </div>
          </div>
          <div class="col-sm-3 col-md-3 mobile-collapse mobile-collapse--last">
            <h5 class="title text-uppercase mobile-collapse__title">Company Info</h5>
            <div class="v-links-list mobile-collapse__content">
              <ul>
                <li class="icon icon-home">New Baneshwor, kathmandu</li>
                <li class="icon icon-telephone">+977- 9849376288</li>
                <li class="icon icon-mail"><a href="mailto:order@cakesansaar.com">order@cakesansaar.com</a></li>
                <li class="icon icon-skype"><a href="#">cakesansaar</a></li>
              </ul>
            </div>
            
          

          </div>

            <div class="col-md-3 col-sm-3"> 

          <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=471878799813109";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

            <div class="fb-page" data-href="https://www.facebook.com/CakeSansaar/" {{-- data-tabs="timeline" data-small-header="false" --}} data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/CakeSansaar/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/CakeSansaar/">Kerung.com</a></blockquote></div> 
          </div>


        </div>
      </div>
    </div>
    <div class="footer__subscribe">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 col-md-6">
              <div id="subscribeSuccess">
                <p>Your email was added successfully!</p>
              </div>
              <div id="subscribeError">
                <p>Something went wrong, try refreshing and submitting the form again.</p>
              </div>                
            <form id="subscribe-form" class="subscribe-form" method="post" novalidate>
              <label class="subscribe-form__label text-uppercase pull-left">Subscribe</label>
              <input type="text" class="subscribe-form__input input--wd" placeholder="Your e-mail address" name="subscribemail">
              <button type="submit" class="btn btn--wd text-uppercase wave"><span class="hidden-xs">Subscribe</span><span class="icon icon-mail-fill visible-xs"></span></button>
            </form>
          </div>
          <div class="col-sm-5 col-md-6">
            <div class="social-links social-links--colorize social-links--large">
              <ul>
               <li class="social-links__item"><a class="icon icon-facebook" href="https://www.facebook.com/CakeSansaar/" target="_blank"></a></li>
                <li class="social-links__item"><a class="icon icon-instagram" href="https://www.instagram.com/cakesansaar/" target="_blank"></a></li>
                <li class="social-links__item"><a class="icon icon-twitter" href="https://twitter.com/CakeSansaar/" target="_blank"></a></li>
                <li class="social-links__item"><a class="icon icon-pinterest" href="http://www.pinterest.com/"></a></li>
                <li class="social-links__item"><a class="icon icon-mail" href="mailto:order@cakesansaar.com"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__settings visible-xs">
      <div class="container text-center">
     
      
        <div class="dropdown pull-left"> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button" data-toggle="dropdown" aria-expanded="false">Account</a>
          <ul class="dropdown-menu animated fadeIn" role="menu">
          @if(Auth::check())
            <li><a href="{{route('customer.dashboard')}}">Account</a></li>
            <li><a href="{{route('customer.wishlist',Auth::user()->customer_id)}}">Wishlist</a></li>
            <li><a href="{{route('compare')}}">Compare</a></li>
            <li><a href="{{route('checkout')}}">Checkout</a></li>
          @else
            <li><a href="{{route('customer.dashboard')}}">Account</a></li>
            <li><a href="{{route(' ')}}" class="emptywishlist">Wishlist (0)</a></li>
            <li><a href="{{route('compare')}}">Compare</a></li>
            <li><a href="{{route('checkout')}}">Checkout</a></li>
          @endif
          </ul>
        </div>
      </div>
    </div>
    <div class="footer__bottom">      
      <div class="container">
        <div class="pull-left text-uppercase">© {{date('Y')}} <a href="{{route(' ')}}">Cake Sansaar</a>. All Rights Reserved. </div>
        <!-- <div class="pull-right text-uppercase text-right">with love <span class="icon-favorite color-heart"></span> from <a href="http://themeforest.net/user/etheme">etheme</a></div> -->
      </div>
     </div>
  </footer>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mahesh">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade popup-layout" id="mahesh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      
      </div>
      <div class="modal-body">
      <div class="main-heading">WE ARE COMING SOON</div>
      <div class="small-heading">to deliver you the best cakes to your doorstep</div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">
          
          <p>Subscribe to our newsletter and don’t 
miss  the special offers and  latest
updates  about Cake Sansaar</p>

       <form action="#">
       <input type="text" class="form-control" placeholder="Your Name" name="yourname" autocomplete="off">
       <input type="text" class="form-control" placeholder="Your Email" name="youremail" autocomplete="off">
       <button type="submit" class="btn btn--wd text-uppercase wave waves-effect">Subscribe</button>

       </form>

        </div>


      </div>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
  $(‘#mahesh).modal(‘show’);
  });
</script>