<footer class="footer">
    <div class="footer__links hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="h-links-list">
              <ul>
                <li><a href="#">Site Map</a></li>
                <li><a href="#">Search Terms</a></li>
                <li><a href="#">Orders and Returns</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">RSS</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="h-links-list text-right">
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Customer Service</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__column-links">
      <div class="back-to-top"> <a href="#top" class="btn btn--round btn--round--lg"><span class="icon-arrow-up"></span></a></div>
      <div class="container">
        <div class="row">
          <div class="col-md-3 hidden-xs hidden-sm"> 
            <!--  Logo  --> 
            <a class="logo logo--footer" href="{{route('product.list')}}"> <img src="{{ asset('assets/home/images/logo.png')}}" alt="Logo"/> </a> 
            <!-- End Logo --> 
            <p>Kerung is still here because of love Fate and Attachment ,because of this of this we are expanding day by day  <strong><em>- Kerung Family</em></strong></p>
          </div>
          <div class="col-sm-3 col-md-2 mobile-collapse">
            <h5 class="title text-uppercase mobile-collapse__title">Information </h5>
            <div class="v-links-list mobile-collapse__content">
              <ul>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Shipping & Returns</a></li>
                <li><a href="about.html">Privacy Notice</a></li>
                <li><a href="about.html">Conditions of Use</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3 col-md-2 mobile-collapse">
            <h5 class="title text-uppercase mobile-collapse__title">Service</h5>
            <div class="v-links-list mobile-collapse__content">
              <ul>
                <li><a href="contact.html">Online support</a></li>
                <li><a href="faq.html">Help & FAQs</a></li>
                <li><a href="contact.html">Call Center</a></li>
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
                <li class="icon icon-home">7563 St. Vincent Place, Glasgow</li>
                <li class="icon icon-telephone">321321321, 321321321</li>
                <li class="icon icon-mail"><a href="mailto:info@mydomain.com">info@kerung.com</a></li>
                <li class="icon icon-skype"><a href="#">shop.test</a></li>
              </ul>
            </div>
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
        <div class="dropdown pull-left"> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button" data-toggle="dropdown" aria-expanded="false"><span class="header__dropdowns__button__symbol">$</span></a>
          <ul class="dropdown-menu animated fadeIn" role="menu">
            <li class="currency__item currency__item--active"><a href="#">$ USA Dollar</a></li>
            <li class="currency__item"><a href="#">€ Euro</a></li>
            <li class="currency__item"><a href="#">£ British Pound</a></li>
          </ul>
        </div>
        <div class="dropdown pull-left"> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button" data-toggle="dropdown" aria-expanded="false"><span class="flag"><img src="{{ asset('assets/home/images/flags/gb.png')}}" alt=""></span></a>
          <ul class="dropdown-menu animated fadeIn languages languages--flag" role="menu">
            <li class="languages__item languages__item--active"><a href="#"><span class="languages__item__flag flag"><img src="{{ asset('assets/home/images/flags/gb.png')}}" alt=""></span><span class="languages__item__label">En</span></a></li>
            <li class="languages__item"><a href="#"><span class="languages__item__flag flag"><img src="{{ asset('assets/home/images/flags/de.png')}}" alt=""></span><span class="languages__item__label">De</span></a></li>
            <li class="languages__item"><a href="#"><span class="languages__item__flag flag"><img src="{{ asset('assets/home/images/flags/fr.png')}}" alt=""></span><span class="languages__item__label">Fr</span></a></li>
          </ul>
        </div>
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
        <div class="pull-left text-uppercase">© {{date('Y')}} <a href="{{route(' ')}}">Kerung.com</a>. All Rights Reserved. </div>
        <!-- <div class="pull-right text-uppercase text-right">with love <span class="icon-favorite color-heart"></span> from <a href="http://themeforest.net/user/etheme">etheme</a></div> -->
      </div>
</div>
  </footer>
</div>
<div class="compare-box" id="compareBox">
  <div class="container">
    <div class="compare-box__header">
      <h3 class="compare-box__header__title">Compare</h3>
      <div class="compare-box__header__toggle"><span class="compare-box__header__toggle__hide hide-compare">Hide<span class="icon icon-arrow-down"></span></span><span class="compare-box__header__toggle__show show-compare">Show<span class="icon icon-arrow-up"></span></span><span class="compare-box__header__toggle__close close-compare"><span class="icon icon-clear"></span></span></div>
    </div>
    <div class="compare-box__items">
      <ul class="compare-box__items__list compare-carousel nav-top">
        <li class="compare-box__items__list__item">
          <div class="compare-box__items__list__item__delete"><a href="#" class="icon icon-clear"></a></div>
          <a href="#"><img src="{{ asset('assets/home/images/products/product-2.jpg')}}" alt=""></a></li>
        <li class="compare-box__items__list__item empty">
          <div class="compare-box__items__list__item__num">1</div>
          <img src="{{ asset('assets/home/images/products/product-empty.png') }}" alt=""/></li>
        <li class="compare-box__items__list__item empty">
          <div class="compare-box__items__list__item__num">2</div>
          <img src="{{ asset('assets/home/images/products/product-empty.png')}}" alt=""/></li>
        <li class="compare-box__items__list__item empty">
          <div class="compare-box__items__list__item__num">3</div>
          <img src="{{ asset('assets/home/images/products/product-empty.png')}}" alt=""/></li>
        <li class="compare-box__items__list__item empty">
          <div class="compare-box__items__list__item__num">4</div>
          <img src="{{ asset('assets/home/images/products/product-empty.png')}}" alt=""/></li>
        <li class="compare-box__items__list__item empty">
          <div class="compare-box__items__list__item__num">5</div>
          <img src="{{ asset('assets/home/images/products/product-empty.png')}}" alt=""/></li>
        <li class="compare-box__items__list__item empty">
          <div class="compare-box__items__list__item__num">6</div>
          <img src="{{ asset('assets/home/images/products/product-empty.png')}}" alt=""/></li>
      </ul>
      <div class="compare-box__actions">
        <div class="compare-box__actions__btns"> <a href="#" class="btn btn--wd btn--lg text-uppercase">Compare</a> <a href="#" class="btn btn--wd btn--lg btn--light text-uppercase" id="removeAllCompare">Clear All</a> </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-sm" role="dialog" id="modalAddToCart">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <button type="button" class="close icon-clear" data-dismiss="modal"></button>
      <div class="text-center">
        <div class="divider divider--xs"></div>
        <p>Product added to cart successfully! </p>
        <div class="divider divider--xs"></div>
        <a href="#" class="btn btn--wd">Go to Cart</a>
        <div class="divider divider--xs"></div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-sm" role="dialog" id="modalAddToWishlist">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <button type="button" class="close icon-clear" data-dismiss="modal"></button>
      <div class="text-center">
        <div class="divider divider--xs"></div>
        <div class="loading">
          <div class="divider divider--sm"></div>
          <div class="loader">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>
        </div>
        <p class="success">Product added to wishlist successfully! </p>
        <div class="divider divider--xs"> </div>
      </div>
    </div>
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
</body>
</html>