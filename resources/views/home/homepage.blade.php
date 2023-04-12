@extends('home.layouts.homepagemaster')
    @section('content')
         <!-- End Header section -->
  <div id="pageContent" class="page-content">
    <section class="content" id="slider"> 

      
      <div class="tp-banner-container">
        <div class="tp-banner" >
          <ul>
            
            
          
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide"> 
            
              <img src="{{ asset('assets/home/images/slider2.gif')}}"  alt="Cakeforme"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
             
              
             
              <div class="tp-caption tp-caption--wd-4  lfb ltt" 
      data-x="center" 
      data-y="center"  
            data-voffset="-150" 
      data-speed="600" 
      data-start="800" 
      data-easing="Power4.easeOut" 
      data-endeasing="Power4.easeIn" 
      style="z-index: 10;"><h1>Cakeforme</h1></div>
       
              <div class="tp-caption tp-caption--wd-5 lfb ltt" 
      data-x="center"
      data-y="center"  
            data-voffset="-70" 
      data-speed="600" 
      data-start="900" 
      data-easing="Power4.easeOut" 
      data-endeasing="Power4.easeIn" 
      style="z-index: 10;">Checkout Most Populars Taste</div>
              
        
              <div class="tp-caption tp-caption--wd-6 lfb ltt" 
      data-x="center"
      data-y="center"  
            data-voffset="0" 
      data-speed="600" 
      data-start="1000" 
      data-easing="Power4.easeOut" 
      data-endeasing="Power4.easeIn" 
      data-captionhidden="on" 

      style="z-index: 10;">Have a greate test with us and forget Rest !!!!</div>
              
             
              <div class="tp-caption lfb ltt" 
      data-x="center" 
      data-y="center"  
            data-voffset="100" 
      data-speed="600" 
      data-start="1100" 
      data-easing="Power4.easeOut" 
      data-endeasing="Power4.easeIn" 
      style="z-index: 11;"><a href="{{ route('product.list') }}" class="btn btn--wd btn--xl">SHOP NOW</a> </div>
              
              <div class="tp-caption  lft ltt rs-parallaxlevel-1" 
      data-x="780" 
      data-y="0" 
       data-speed="900"
       data-start="1000"
       data-easing="Power4.easeOut"
      style="z-index: 5;"      ><img src="{{ asset('assets/home/images/cake1.png')}}" alt="Image1"></div>
              
              
              <div class="tp-caption  lfr ltr rs-parallaxlevel-3" 
      data-x="900" 
      data-y="130" 
       data-speed="1000"
       data-start="1200"
       data-easing="Power4.easeOut"
      style="z-index: 5;"      ><img src="{{ asset('assets/home/images/cake2.png')}}" alt="Image2"></div>
              
             
              <div class="tp-caption  lft ltt rs-parallaxlevel-2" 
      data-x="-100" 
      data-y="-10" 
       data-speed="900"
       data-start="1400"
       data-easing="Power4.easeOut"
      style="z-index: 5;"      ><img src="{{ asset('assets/home/images/cake3.png')}}" alt="Image3"></div>
              
              
              <div class="tp-caption  lfb ltb rs-parallaxlevel-2" 
      data-x="-100" 
      data-y="320" 
       data-speed="900"
       data-start="1600"
       data-easing="Power4.easeOut"
      style="z-index: 6;"      ><img src="{{ asset('assets/home/images/cake4.png')}}" alt="Image4"></div>
              
      
              <div class="tp-caption  lfr ltr rs-parallaxlevel-2" 
      data-x="800" 
      data-y="400" 
       data-speed="900"
       data-start="2400"
       data-easing="Power4.easeOut"
      style="z-index: 7;"      ><img src="{{ asset('assets/home/images/cake5.png')}}" alt="Image9"></div>
     </li>

    
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
            
              <img src="{{ asset('assets/home/images/slider1.gif')}}"  alt="slide2"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
             
              
             
              <div class="tp-caption tp-caption--wd-4  lfb ltt" 
      data-x="center" 
      data-y="center"  
            data-voffset="-150" 
      data-speed="600" 
      data-start="800" 
      data-easing="Power4.easeOut" 
      data-endeasing="Power4.easeIn" 
      style="z-index: 10;"><h1>Cakeforme</h1> </div>
       
              <div class="tp-caption tp-caption--wd-5 lfb ltt" 
      data-x="center"
      data-y="center"  
            data-voffset="-70" 
      data-speed="600" 
      data-start="900" 
      data-easing="Power4.easeOut" 
      data-endeasing="Power4.easeIn" 
      style="z-index: 10;">Checkout Most Populars Taste</div>
              
        
              <div class="tp-caption tp-caption--wd-6 lfb ltt" 
      data-x="center"
      data-y="center"  
            data-voffset="0" 
      data-speed="600" 
      data-start="1000" 
      data-easing="Power4.easeOut" 
      data-endeasing="Power4.easeIn" 
      data-captionhidden="on" 

      style="z-index: 10;">Have a greate test with us and forget Rest !!!!</div>
              
             
              <div class="tp-caption lfb ltt" 
      data-x="center" 
      data-y="center"  
            data-voffset="100" 
      data-speed="600" 
      data-start="1100" 
      data-easing="Power4.easeOut" 
      data-endeasing="Power4.easeIn" 
      style="z-index: 11;"><a href="{{ route('product.list') }}" class="btn btn--wdn">SHOP NOW</a> </div>
              
              <div class="tp-caption  lft ltt rs-parallaxlevel-1" 
      data-x="780" 
      data-y="0" 
       data-speed="900"
       data-start="1000"
       data-easing="Power4.easeOut"
      style="z-index: 5;"      ><img src="{{ asset('assets/home/images/cake6.png')}}" alt="Image1"></div>
              
              
              <div class="tp-caption  lfr ltr rs-parallaxlevel-3" 
      data-x="900" 
      data-y="130" 
       data-speed="1000"
       data-start="1200"
       data-easing="Power4.easeOut"
      style="z-index: 5;"      ><img src="{{ asset('assets/home/images/cake7.png')}}" alt="Image2"></div>
              
             
              <div class="tp-caption  lft ltt rs-parallaxlevel-2" 
      data-x="-100" 
      data-y="-10" 
       data-speed="900"
       data-start="1400"
       data-easing="Power4.easeOut"
      style="z-index: 5;"      ><img src="{{ asset('assets/home/images/cake8.png')}}" alt="Image3"></div>
              
              
              <div class="tp-caption  lfb ltb rs-parallaxlevel-2" 
      data-x="-100" 
      data-y="320" 
       data-speed="900"
       data-start="1600"
       data-easing="Power4.easeOut"
      style="z-index: 6;"      ><img src="{{ asset('assets/home/images/cake10.png')}}" alt="Image4"></div>
              
      
              <div class="tp-caption  lfr ltr rs-parallaxlevel-2" 
      data-x="800" 
      data-y="400" 
       data-speed="900"
       data-start="2400"
       data-easing="Power4.easeOut"
      style="z-index: 7;"      ><img src="{{ asset('assets/home/images/cake9.png')}}" alt="Image9"></div>
     </li>



          </ul>
        </div>
  {{--       <div class="scroll-to-content hidden-xs"> <a href="#" class="btn btn--round btn--round--lg"><span class="icon icon-arrow-down"></span></a></div> --}}
      </div>
    </section>
    
    <!-- END REVOLUTION SLIDER --> 



    <!-- Content section -->
    <section class="content">
      <div class="container">
        <div class="row hide-outer-animation">
          <div class="col-md-7 col-lg-8">
            <div class="text-center">
              <div class="banner banner--image hover-squared animation" data-animation="fadeInLeft" data-animation-delay="0s" onclick="location.href='#';"> <img src="{{ asset('assets/home/images/banner-01-new.jpg')}}" alt="The High Halter" class="img-responsive" />
                <div class="banner--image__text banner--image__text--left banner--image__text--light text-center">
                  <h5>Get Contemporary</h5>
                  <h3 id="responsive_headline"><strong>The High Halter</strong></h3>
                  <h6>Frame your face and shoulders
                    with the silhouette of season<br>
                    <strong>Up to 65% OFF</strong></h6>
                </div>
                <div class="product-category__hover caption"></div>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-lg-4">
            <div class="banner banner--icon hover-squared animation" data-animation="fadeInRight" data-animation-delay="0s" onclick="location.href='#';">
              <div class="banner--icon__icon"> <span class="icon icon-sales"></span> </div>
              <div class="banner--icon__text text-center">
                <h4 class="text-uppercase">TOTAL SALE</h4>
                <div class="banner--icon__text__divider"></div>
                <div class="text-uppercase">UP TO 70% OFF YOUR FAVOURITE BRANDS</div>
              </div>
              <div class="product-category__hover caption"></div>
            </div>
            <div class="banner banner--icon banner--last banner--light hover-squared animation" data-animation="fadeInRight" data-animation-delay="0s" onclick="location.href='#';">
              <div class="banner--icon__icon"> <span class="icon icon-box"></span> </div>
              <div class="banner--icon__text text-center">
                <h4 class="text-uppercase">Gift CERTIFICATES</h4>
                <div class="banner--icon__text__divider"></div>
                <div class="text-uppercase">Gift certificates are the simplest, speediest way to send something special! </div>
              </div>
              <div class="product-category__hover caption"></div>
            </div>
        </div>
        </div>
      </div>
    </section>    
    <section class="content">
      <div class="container"> 

       @if(!$featured_prod->isEmpty())
              @foreach($featured_prod as $product)
              
         

        <div class="modal quick-view zoom" id="quickView"  style="opacity: 1">
          <div class="modal-dialog">
            <div id="modalLoader-wrapper"><div id="modalLoader"></div></div>
            <div class="modal-content">


<div class="row product-info-outer">
          <div class="col-sm-6 col-md-6 col-lg-5 hidden-xs">
            <div class="product-main-image">
              <div class="product-main-image__item"><img class="product-zoom" src='{{asset($product->feature_product->image)}}' data-zoom-image="{{ asset($product->image)}}" alt="" /></div>
              <div class="product-main-image__zoom"></div>
            </div>
            <div class="product-images-carousel">
              <ul id="smallGallery">
                <li><a href="#" data-image="{{asset($product->feature_product->image)}}" data-zoom-image="{{ asset('assets/home/images/products/product-1.jpg')}}"><img src="{{asset($product->feature_product->image)}}" alt="{{($product->name)}}" /></a></li>

                
             
              </ul>
            </div>
          </div>
          <div class="product-info col-sm-6 col-md-6 col-lg-7">
            <div class="product-info__title">
              <h1>{{$product->feature_product->name}}</h1>
              <div class="rating product-info__rating visible-xs"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
            </div>
            <div class="product-info__sku pull-right">SKU: 00065 &nbsp;&nbsp;<span class="label label-success">IN STOCK</span></div>
            <ul id="singleGallery" class="visible-xs">
              <li><img src="{{asset($product->feature_product->image)}}" alt="{{($product->name)}}" /></li>
              <li><img src="{{asset($product->feature_product->image)}}" alt="{{($product->name)}}" /></li>
              <li><img src="{{asset($product->feature_product->image)}}" alt="{{($product->name)}}" /></li>
              
            </ul>
            <div class="price-box product-info__price"><span class="price-box__new">Rs {{round($product->price, 2)}}</span> <span class="price-box__old">Rs {{round($product->price, 2)}}</span></div>
            <div class="rating product-info__rating hidden-xs"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
            <div class="divider divider--xs product-info__divider"></div>
            <div class="product-info__description"> {{ strip_tags($product->description)}}</div>
            <div class="divider divider--xs product-info__divider"></div>
            <div class="row">
              <div class="col-xs-6">
                <label>Size:</label>
                <select class="selectpicker"  data-style="select--wd"  data-width="100%">
                  <option>XS</option>
                  <option>S</option>
                  <option>M</option>
                  <option>L</option>
                  <option>XL</option>
                </select>
              </div>
              <div class="col-xs-6">
                <label>Color:</label>
                <select class="selectpicker"  data-style="select--wd"  data-width="100%">
                  <option>White</option>
                  <option>Blue</option>
                  <option>Grey</option>
                </select>
              </div>
            </div>
            <div class="divider divider--sm"></div>
            <label>Quantity:</label>
            <div class="outer">
              <div class="input-group-qty pull-left"> <span class="pull-left"> </span>
                <input type="text" name="quant[1]" class="input-number input--wd input-qty pull-left" value="1" min="1" max="100">
                <span class="pull-left btn-number-container">
                <button type="button" class="btn btn-number btn-number--plus" data-type="plus" data-field="quant[1]"> + </button>
                <button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus" data-field="quant[1]"> &#8211; </button>
                </span> </div>
              <div class="pull-left">
                <button data-productid="{{ $product->product_id }}" data-token="{{ csrf_token() }}" class="btn btn--wd text-uppercase ajax-to-cart">Add to Cart</button>
              </div>
              <div class="social-links social-links--colorize social-links--invert social-links--padding pull-right">
                <ul>
                  <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href=" " onclick="return popitup(this.href)" data-placement="top" data-toggle="tooltip" data-original-title="Share on facebook"></a></li>

                  <li class="social-links__item"><a class="icon icon-twitter tooltip-link" onclick="return popitup(this.href)" href="#" data-placement="top" data-toggle="tooltip" data-original-title="Share on twitter"></a></li>
                  <li class="social-links__item"><a class="icon icon-google tooltip-link" onclick="return popitup(this.href)" href="#" data-placement="top" data-toggle="tooltip" data-original-title="Share on google"></a></li>
                  <li class="social-links__item"><a class="icon icon-pinterest tooltip-link" href="#" data-placement="top" data-toggle="tooltip" data-original-title="Share on pinterest"></a></li>
                </ul>
              </div>
            </div>
            <div class="divider divider--xs"></div>
            <ul class="product-links product-links--inline">
              <li><a href="#"><span class="icon icon-bars"></span>Add to compare</a></li>
              <li><a href="#"><span class="icon icon-favorite"></span>Add to wishlist</a></li>
              <li><a href="#"><span class="icon icon-mail-fill"></span>Email to friend</a></li>
            </ul>
          </div>
         
        </div>



              
            </div>
          </div>
        </div>
        <!-- /.modal end-->
         @endforeach
          @endif
        
        <h2 class="text-center text-uppercase">Featured Products</h2>
        <div class="row product-carousel mobile-special-arrows animated-arrows product-grid four-in-row">
          @if(!$featured_prod->isEmpty())
              @foreach($featured_prod as $product)
              <!-- PRODUCT - START -->
              {{--start tracking the product--}}
              <div class="product-preview-wrapper">
                  <div class="product-preview">
                      <div class="product-preview__image">
                          <a href="{{ route('single.product',$product->feature_product->slug) }}"><img src="{{asset($product->feature_product->image)}}" alt="{{$product->feature_product->name}}"/></a>
                          @if($product->feature_product->newarrival==1)
                              <div class="product-preview__label product-preview__label--left product-preview__label--new"><span>new</span></div>
                          @endif
                              <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span>sale<br>
                              -10%</span>
                          </div>
                      </div>
                      <div class="product-preview__info text-center">
                          <div class="product-preview__info__btns"><a href="#" data-productid="{{ $product->feature_product->product_id }}" data-token="{{ csrf_token() }}" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></a> <a href="#" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
                          <div class="product-preview__info__title">
                              <h2><a href="{{ route('single.product',$product->feature_product->slug) }}">{{$product->feature_product->name}}</a></h2>
                          </div>
                          <div class="rating">
                              @if(round($product->feature_product->avgRating, 2)==0)
                              <span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span>
                              @elseif(round($product->feature_product->avgRating, 2)==1)
                              @elseif(round($product->feature_product->avgRating, 2)==2)
                              @elseif(round($product->feature_product->avgRating, 2)==3)
                              @elseif(round($product->feature_product->avgRating, 2)==4)
                              @elseif(round($product->feature_product->avgRating, 2)==5)
                              @endif
                          </div>
                          {{-- <ul class="options-swatch options-swatch--color">
                              <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/blue.png') }}" width="10" height="10" alt="blue"/></span></a></li>
                              <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/yellow.png') }}" width="10" height="10" alt="yellow"/></span></a></li>
                              <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/green.png') }}" width="10" height="10" alt="green"/></span></a></li>
                              <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/dark-grey.png') }}" width="10" height="10" alt="dark-grey"/></span></a></li>
                              <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/grey.png') }}" width="10" height="10" alt="grey"/></span></a></li>
                              <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/red.png') }}" width="10" height="10" alt="red"/></span></a></li>
                              <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/white.png') }}" width="10" height="10" alt="white"/></span></a></li>
                          </ul> --}}
                          <div class="price-box "><span class="price-box__new">Rs {{0.9*$product->feature_product->price}}</span> <span class="price-box__old">Rs {{round($product->feature_product->price, 2)}}</span></div>
                          <div class="product-preview__info__description">
                              <p>{{$product->feature_product->description}}</p>
                          </div>
                          <div class="product-preview__info__link"><a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> 
                          @if(Auth::check())
                          <a href="#" class="wish" data-productid="{{$product->feature_product->product_id}}" data-token="{{csrf_token()}}" data-customerid="{{ Auth::user()->customer_id }}"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text ">Add to wishlist</span></a>
                          @else
                          <a href="#" class="wish" data-productid="{{$product->feature_product->product_id}}" data-token="{{csrf_token()}}" data-customerid="login"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text ">Add to wishlist</span></a>
                          @endif

                          <a href="#" class="cart btn btn--wd buy-link ajax-to-cart" data-productid="{{$product->feature_product->product_id}}" data-token="{{csrf_token()}}"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text addcart" >Add to cart</span></a></div>
                      </div>
                  </div>
              </div>  
              @endforeach
          @endif
        </div>
      </div>
    </section>
    
    <section class="content content--fill">
      <div class="container">
        <h2 class="text-center text-uppercase">products categories</h2>
        <div class="product-category-carousel mobile-special-arrows animated-arrows slick">
        @if(!$parent_categories->isEmpty())
          @foreach($parent_categories as $pc)
            <div class="product-category hover-squared"> <a href="#"><img src="{{asset($pc->image)}}" data-lazy="{{ asset($pc->image)}}" alt="{{$pc->name}}"></a>
              <div class="product-category__hover caption"></div>
              <div class="product-category__info">
                <div class="product-category__info__ribbon">
                  <h5 class="product-category__info__ribbon__title">{{$pc->name}}</h5>
                  <div class="product-category__info__ribbon__count">32 products</div>
                </div>
              </div>
            </div>
          @endforeach
        @endif


        </div>
      </div>
    </section>
 <section class="content content--parallax top-null home-parallex-area" data-image="images/parallax-bg.jpg')}}">
      <div class="container">
        <div class="container">
      <div class="row">

        <div class="col-md-8 col-md-offset-2">
          <h1>We put a smile back on your face. </h1>
          <div class="description"><p>Our online store is a leading online shop in Kathmandu providing cakes within Kathmandu. Our expansion plan covers to be the best online cake shop in the entire Nation. We provide competitive prices, good after sales services and on-time delivery.</p>
            </div>


          <div class="homeBtn">
            <a href="{{route('about')}}" class="btnOne btn btn-primary"><i class="icofont icofont-rocket-alt-2"></i>Read More</a>

          </div>
        </div>

      </div>

    </div>
      </div>
    </section>

  


 {{--    <section class="content content--fill top-null">
      <div class="container">
        <h2 class="text-center text-uppercase">products brands</h2>
        <div class="brands brands-carousel animated-arrows mobile-special-arrows">

          @if(!$manufacturers->isEmpty())
            @foreach($manufacturers as $m) 
              <div class="brands__item"><a href="#"><img src="{{asset($pc->image)}}" data-lazy="{{asset($pc->image)}}" alt=""/></a></div>
            @endforeach
          @endif

          
        </div>
      </div>
    </section>  --}}   
    <!-- End Content section --> 
  </div>
    @endsection


@section('pageScript')
<!-- Datatables -->

<script src="{{ asset('assets/home/vendor/elevatezoom/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset('assets/home/vendor/isotope/isotope.pkgd.min.js') }}"></script> 
<script src="{{ asset('assets/home/vendor/nouislider/nouislider.min.js') }}"></script>   
<script type="text/javascript" src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/home/js/cart.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/home/js/wishlist.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/home/js/compare.js') }}"></script>
{{-- <script type="text/javascript">
    $(".compare").on("click", function(res){
        res.preventDefault();
        var productid = $(this).attr('data-productid');
        var Url = "{{route('addCompare')}}";
        var token = $(this).data('token');
        Compare(Url, token, productid);
    })
</script>
<script type="text/javascript">
    @foreach($products as $product )
    {{$product->description=""}}
    {{$product->meta_description=""}}
    {{$product->meta_keywords=""}}
    @endforeach

$(window).ready(function(){
   
    var productsJson = JSON.parse('{!!  $products->toJson()  !!}');
    var analytic = new Analytics();

    $('.addcart').each(function (i, el) {
        $(el).click(function (e) {
            return;
            var productid = $(el).data('productid');
            var token = $(el).data('token');
            var Url = "{{route('addcart')}}";
            var cartUrl= "{{route('cart')}}";
            var checkoutUrl="{{route('checkout')}}";
            var order_CancelUrl="{{route(' ')}}";
            CartClick(productid, productsJson, analytic, token, Url, cartUrl, checkoutUrl,order_CancelUrl);
            e.preventDefault();
            e.stopPropagation();
        });
    });
});



    
</script> --}}

<script type="text/javascript">
    jQuery(function($j) {
    
    "use strict";
    $('.ajax-to-cart').each(function (i, el) {
        $(el).click(function (e) {
            var productid = $(el).data('productid');

            // alert(productid);
            var token = $(el).data('token');
            var Url = "{{route('addcart')}}";
            var cartUrl= "{{route('cart')}}";
            var checkoutUrl="{{route('checkout')}}";
            var order_CancelUrl="{{route(' ')}}";
            console.log(productid);
            console.log(token);
            CartClick(productid, token, Url, cartUrl, checkoutUrl,order_CancelUrl);
            e.preventDefault();
            e.stopPropagation();
        });
    });

     $j('.ajax-to-wishlist').click(function(e){
        e.preventDefault();
        $j('#modalAddToWishlist').modal("toggle");      
        $j('#modalAddToWishlist .loading').show();
        $j('#modalAddToWishlist .success').hide();      
        $j.ajax({url: "ajax.php", success: function(result){
            $j('#modalAddToWishlist .loading').hide();
            $j('#modalAddToWishlist .success').show();

            }});
    });
});
</script>

{{-- <script type="text/javascript">
    $(".product-permalink").on("click", function (res) {
        var id = $(this).data('id');
        onProductClick(id);
    });
    function onProductClick(id) {
        console.log("PRoduct Click " + id);
        analytic.trackProductClick(productsJson, id);
    }
</script> --}}

<script type="text/javascript">
    $(".wish").on("click", function (res) {
        res.preventDefault();
        console.log('hello');
        var productid = $(this).attr('data-productid');
        var customerId = $(this).attr('data-customerid');
        if(customerId=='login')
        {
            alert('please login to add the product in wishlist.....');
            return;
        }
        var Url = "{{route('customer.addwishlist')}}";
        var token = $(this).data('token');
        WishListClick(Url, token, productid, customerId);
    });
</script>

{{-- <script type="text/javascript">
    $(".familysizewish").on("click", function (res) {
        res.preventDefault();
        var productid = $(this).attr('data-productid');
        var customerId = $(this).attr('data-customerid');
        var Url = "{{route('customer.addfamilywishlist')}}";
        var url = '{{ route("customer.familysizewishlist", ":id") }}';
        url = url.replace(':id', customerId);
        var token = $(this).data('token');
        FamilyWishListClick(Url, token, productid, customerId,url);
    });
    analytic.addImpression(productsJson);
</script> --}}
@endsection
