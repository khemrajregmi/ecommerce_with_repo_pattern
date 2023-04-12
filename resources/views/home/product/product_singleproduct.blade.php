@extends('home.layouts.homepagemaster')

@section('pageMetaData')
{{-- @section('pageMetaData') --}}
<meta charset="utf-8">
 <title>{{($product->name)}}</title>
 <meta name="keywords" content='{{($product->name)}}' />
<meta name="keywords" content="Cake Sansaar" />
<meta name="description" content="A one stop shop for all types of cakes. Nepali online store for varieties of cakes delivering to your footsteps.">
<meta name="author" content="Cake Sansaar">
{{-- @endsection --}}
    @php $url = url()->current();  @endphp
    <meta property="og:url"           content="{{ $url }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $product->name }}" />
    <meta property="og:description"   content="{{ $product->description }}" />
    <meta property="og:image"         content="{{asset($product->image)}} " />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@site_username">
    <meta name="twitter:title" content="{{ $product->name }}">
    <meta name="twitter:description" content="{{ $product->description }}">
    <meta name="twitter:creator" content="@creator_username">
    <meta name="twitter:image" content="{{ asset($product->image) }}">
    <meta name="twitter:domain" content="{{ $url }}">
@stop  
@section('pageCss')
<link href="{{asset('assets/home/css/rating.css')}}" rel="stylesheet">
<!-- PNotify -->
<link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
<!-- Datatables -->
@endsection
@section('content')
    <!-- Content section -->

    <section class="content">
      <div class="container">
        <div class="row product-info-outer">
          <div class="col-sm-4 col-md-4 col-lg-5 hidden-xs">
            <div class="product-main-image">
              <div class="product-main-image__item"><img class="product-zoom" src='{{asset($product->image)}}' data-zoom-image="{{ asset($product->image)}}" alt="{{($product->name)}}" /></div>
              <div class="product-main-image__zoom"></div>
            </div>
            <div class="product-images-carousel">
              <ul id="smallGallery">
                <li><a href="#" data-image="{{ asset('assets/home/images/products/product-big-1.jpg')}}" data-zoom-image="{{ asset('assets/home/images/products/product-big-1-zoom.jpg')}}"><img src="{{ asset('assets/home/images/products/product-small-1.jpg')}}" alt="{{($product->name)}}" /></a></li>
                <li><a href="#" data-image="{{ asset('assets/home/images/products/product-big-2.jpg')}}" data-zoom-image="{{ asset('assets/home/images/products/product-big-2-zoom.jpg')}}"><img src="{{ asset('assets/home/images/products/product-small-2.jpg')}}" alt="{{($product->name)}}" /></a></li>
                <li><a href="#" data-image="{{ asset('assets/home/images/products/product-big-3.jpg')}}" data-zoom-image="{{ asset('assets/home/images/products/product-big-3-zoom.jpg')}}"><img src="{{ asset('assets/home/images/products/product-small-3.jpg')}}" alt="{{($product->name)}}" /></a></li>
                <li><a href="#" data-image="{{ asset('assets/home/images/products/product-big-4.jpg')}}" data-zoom-image="{{ asset('assets/home/images/products/product-big-4-zoom.jpg')}}"><img src="{{ asset('assets/home/images/products/product-small-4.jpg')}}" alt="{{($product->name)}}" /></a></li>
                <li><a href="#" data-image="{{ asset('assets/home/images/products/product-big-5.jpg')}}" data-zoom-image="{{ asset('assets/home/images/products/product-big-5-zoom.jpg')}}"><img src="{{ asset('assets/home/images/products/product-small-5.jpg')}}" alt="{{($product->name)}}" /></a></li>
                <li><a href="http://www.youtube.com/watch?v=JW8M32oHTKw" class="video-link"><img src="{{ asset('assets/home/images/products/product-small-empty.png')}}" alt="{{($product->name)}}" /></a></li>
              </ul>
            </div>
          </div>
          <div class="product-info col-sm-8 col-md-4 col-lg-4">
            <div class="product-info__title">
              <h1>{{($product->name)}}</h1>
              <div class="rating product-info__rating visible-xs"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
            </div>
            <div class="product-info__sku pull-right">SKU: 00065 &nbsp;&nbsp;<span class="label label-success">IN STOCK</span></div>
            <ul id="singleGallery" class="visible-xs">
              <li><img src="{{ asset('assets/home/images/products/product-big-1.jpg')}}" alt="{{($product->name)}}" /></li>
              <li><img src="{{ asset('assets/home/images/products/product-big-2.jpg')}}" alt="{{($product->name)}}" /></li>
              <li><img src="{{ asset('assets/home/images/products/product-big-3.jpg')}}" alt="{{($product->name)}}" /></li>
              <li><img src="{{ asset('assets/home/images/products/product-big-4.jpg')}}" alt="{{($product->name)}}" /></li>
              <li><img src="{{ asset('assets/home/images/products/product-big-5.jpg')}}" alt="{{($product->name)}}" /></li>
            </ul>
            <div class="price-box product-info__price"><span class="price-box__new">Rs {{round($product->price, 2)}}</span> <span class="price-box__old">Rs {{round($product->price, 2)}}</span></div>
            <div class="rating product-info__rating hidden-xs"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
            <div class="divider divider--xs product-info__divider"></div>
            <div class="product-info__description"> {{ strip_tags($product->description)}}</div>
            <div class="divider divider--xs product-info__divider"></div>
            <div class="row">
             
              <div class="col-xs-6">
                <label>Flavour Type:</label>
                <select class="selectpicker"  data-style="select--wd"  data-width="100%">
                  
                  <option>Fruit</option>
                  <option>Basic</option>
                  <option>Special</option>
                  <option>Butterscotch</option>
                  <option>Choclate</option>
                </select>
              </div>

              <div class="col-xs-6">
                <label>Flavour Name:</label>
                <select class="selectpicker"  data-style="select--wd"  data-width="100%">
                   
                  <option>White Forest</option>
                  <option>Black Forest</option>
                  <option>Vanilla</option>
                </select>
              </div>

               <div class="col-xs-6">
                <label>No. of Pound :</label>
                <select class="selectpicker"  data-style="select--wd"  data-width="100%">
                 
                  <option>1 Pound</option>
                  <option>2 Pound</option>
                  <option>3 Pound</option>
                  <option>4 Pound</option>
                  <option>5 Pound</option>
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
                  <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href="https://www.facebook.com/sharer/sharer.php?url={{ urlencode($url) }}" onclick="return popitup(this.href)" data-placement="top" data-toggle="tooltip" data-original-title="Share on facebook"></a></li>

                  <li class="social-links__item"><a class="icon icon-twitter tooltip-link" onclick="return popitup(this.href)" href="https://twitter.com/share?url={{ urlencode($url) }}" data-placement="top" data-toggle="tooltip" data-original-title="Share on twitter"></a></li>
                  <li class="social-links__item"><a class="icon icon-google tooltip-link" onclick="return popitup(this.href)" href="https://plus.google.com/share?url={{ urlencode($url) }}" data-placement="top" data-toggle="tooltip" data-original-title="Share on google"></a></li>
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
          <div class="col-sm-12 col-md-4 col-lg-3">
            <h4>Upcomming Features</h4>
            <div class="card">
              <div class="card__row"> You can add your content here, like promotions or some additional info </div>
              <a href="#" class="card__row card__row--icon">
              <div class="card__row--icon__icon"> <span class="icon icon-shop-label"></span></div>
              <div class="card__row--icon__text">
                <div class="card__row__title">Special offer: 1+1=3</div>
                Get a gift!</div>
              </a> <a href="#" class="card__row card__row--icon">
              <div class="card__row--icon__icon"> <span class="icon icon-money"></span></div>
              <div class="card__row--icon__text">
                <div class="card__row__title">Free Reward Card</div>
                Worth $10, $50, $100. <br>
              </div>
              </a> <a href="#" class="card__row card__row--icon">
              <div class="card__row--icon__icon"> <span class="icon icon-identification-alt"></span></div>
              <div class="card__row--icon__text">
                <div class="card__row__title">Join to our Club</div>
              </div>
              </a> <a class="card__row card__row--icon">
              <div class="card__row--icon__icon"> <span class="icon icon-truck"></span></div>
              <div class="card__row--icon__text">
                <div class="card__row__title">Free shipping</div>
              </div>
              </a> </div>
          </div>
        </div>
      </div>
    </section>
    <section class="content content--fill">
      <div class="container"> 
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs--wd" role="tablist">
          <li class="active"><a href="#Tab1" aria-controls="home" role="tab" data-toggle="tab" class="text-uppercase">DESCRIPTION</a></li>
          <li><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase">Reviews</a></li>
         {{--  <li><a href="#Tab3" role="tab" data-toggle="tab" class="text-uppercase">Tags</a></li>
          <li><a href="#Tab4" role="tab" data-toggle="tab" class="text-uppercase">CUSTOM TAB</a></li>
          <li><a href="#Tab5" role="tab" data-toggle="tab" class="text-uppercase">Sizing Guide</a></li> --}}
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content tab-content--wd">
          <div role="tabpanel" class="tab-pane active" id="Tab1">
            <p>{{ strip_tags($product->description)  }} </p>
            <div class="divider divider--xs"></div>
            <table class="table table-params">
              <tbody>
                <tr>
                  <td class="text-right"><strong>NEW ARRIVAL</strong></td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>CATEGORY</strong></td>
                  <td>PDF Proof</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>MANUFACTURER</strong></td>
                  <td>Digital, Printed</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>STOCK STATUS</strong></td>
                  <td>Yes,  No</td>
                </tr>
                {{-- <tr>
                  <td class="text-right"><strong>SHRINK WRAPPING</strong></td>
                  <td>No Shrink Wrapping, Shrink in 25s, Shrink in 50s, Shrink in 100s</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>WEIGHT</strong></td>
                  <td>0.05, 0.06, 0.07ess cards</td>
                </tr> --}}
              </tbody>
            </table>
          </div>
          <div role="tabpanel" class="tab-pane" id="Tab2">
            <h6><strong>CUSTOMER REVIEWS 1 ITEM(S)</strong></h6>
            <p> GREAT!</p>
            <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, sollicitudin eu, vehicula venenatis, tempor vitae, est. Praesent vitae dui. Morbi id tellus. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. </p>
            <div class="divider divider--xs"></div>
            <p class="color-light">Review by User / (posted on 16/9/2016)</p>
            <div class="divider divider--xs"></div>
            <h6><strong>WRITE YOUR OWN REVIEW</strong></h6>
            <p>YOU'RE REVIEWING:  Lorem ipsum dolor sit amet conse ctetur</p>
            <p>HOW DO YOU RATE THIS PRODUCT?</p>
            <div class="divider divider--xs"></div>
            <div class="divider divider--xs"></div>
            <form action="#" class="contact-form">
              <label>Rating<span class="required">*</span></label>
              <span class="rating">
                  <input type="radio" class="rating-input"
                  id="rating-input-1-5" name="rating" value="5" />
                  <label for="rating-input-1-5" class="rating-star"></label>
                  <input type="radio" class="rating-input"
                          id="rating-input-1-4" name="rating" value="4" />
                  <label for="rating-input-1-4" class="rating-star"></label>
                  <input type="radio" class="rating-input"
                          id="rating-input-1-3" name="rating" value="3" />
                  <label for="rating-input-1-3" class="rating-star"></label>
                  <input type="radio" class="rating-input"
                          id="rating-input-1-2" name="rating" value="2" />
                  <label for="rating-input-1-2" class="rating-star"></label>
                  <input type="radio" class="rating-input"
                          id="rating-input-1-1" name="rating" value="1" />
                  <label for="rating-input-1-1" class="rating-star"></label>
              </span>
              <label>Nickname<span class="required">*</span></label>
              <input type="text" class="input--wd input--wd--full">
              <label>Summary of Your Review<span class="required">*</span></label>
              <input type="text" class="input--wd input--wd--full">
              <label>Review<span class="required">*</span></label>
              <textarea class="textarea--wd input--wd--full"></textarea>
              <div class="divider divider--xs"></div>
              <button type="submit" class="btn btn--wd text-uppercase wave">Submit Review</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container"> 
        
        <!-- Modal -->
        <div class="modal quick-view zoom" id="quickView"  style=" opacity: 1">
          <div class="modal-dialog">
            <div class="modal-content">
          

          
            </div>
          </div>
        </div>
        <!-- /.modal -->
        
        <h2 class="text-center text-uppercase">Upsells Products</h2>
        <div class="row product-carousel mobile-special-arrows animated-arrows product-grid four-in-row">
          <div class="product-preview-wrapper">
            <div class="product-preview">
              <div class="product-preview__image"><a href="product.html"><img src="{{ asset('assets/home/images/products/product-empty.png')}}" data-lazy="{{ asset('assets/home/images/products/product-1.jpg')}}" alt="{{($product->name)}}"/></a></div>
              <div class="product-preview__label product-preview__label--left product-preview__label--new"><span>new</span></div>
              <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span>sale<br>
                -10%</span></div>
              <div class="product-preview__info text-center">
                <div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
                <div class="product-preview__info__title">
                  <h2><a href="#">Fast Seconds Knit White</a></h2>
                </div>
                <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>

                <div class="price-box "><span class="price-box__new">$65.00</span> <span class="price-box__old">$84.00</span></div>
                <div class="product-preview__info__description">
                  <p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>
                  <p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>
                </div>
                <div class="product-preview__info__link">
                  <a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> 
                  <a href="#"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text">Add to wishlist</span></a>
                  <a href="#" class="btn btn--wd buy-link"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text">Add to cart</span></a></div>
              </div>
            </div>
          </div>
          <div class="product-preview-wrapper">
            <div class="product-preview">
              <div class="product-preview__image"><a href="product.html"><img src="{{ asset('assets/home/images/products/product-empty.png')}}" data-lazy="{{ asset('assets/home/images/products/product-2.jpg')}}"  alt="Product Empty"/></a></div>
              <div class="product-preview__info text-center">
                <div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
                <div class="product-preview__info__title">
                  <h2><a href="#">Fast Seconds Knit White</a></h2>
                </div>
                <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                
                <div class="price-box"><span class="price-box__new">$65.00</span> <span class="price-box__old">$84.00</span></div>
                <div class="product-preview__info__description">
                  <p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>
                  <p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>
                </div>
                <div class="product-preview__info__link"><a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> <a href="#"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text">Add to wishlist</span></a><a href="#" class="btn btn--wd buy-link"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text">Add to cart</span></a></div>
              </div>
            </div>
          </div>
          <div class="product-preview-wrapper">
            <div class="product-preview">
              <div class="product-preview__image"><a href="product.html"><img src="{{ asset('assets/home/images/products/product-empty.png')}}" data-lazy="{{ asset('assets/home/images/products/product-3.jpg')}}"  alt="Product 3"/></a></div>
              <div class="product-preview__info text-center">
                <div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
                <div class="product-preview__info__title">
                  <h2><a href="#">Fast Seconds Knit White</a></h2>
                </div>
                <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                <div class="price-box">$65.00</div>
                <div class="product-preview__info__description">
                  <p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>
                  <p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>
                </div>
                <div class="product-preview__info__link"><a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> <a href="#"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text">Add to wishlist</span></a><a href="#" class="btn btn--wd buy-link"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text">Add to cart</span></a></div>
              </div>
            </div>
          </div>
          <div class="product-preview-wrapper">
            <div class="product-preview">
              <div class="product-preview__image"><a href="product.html"><img src="{{ asset('assets/home/images/products/product-empty.png')}}" data-lazy="{{ asset('assets/home/images/products/product-4.jpg')}}"  alt="product 4"/></a></div>
              <div class="product-preview__info text-center">
                <div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
                <div class="product-preview__info__title">
                  <h2><a href="#">Fast Seconds Knit White</a></h2>
                </div>
                <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                <div class="price-box">$65.00</div>
                <div class="product-preview__info__description">
                  <p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>
                  <p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>
                </div>
                <div class="product-preview__info__link"><a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> <a href="#"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text">Add to wishlist</span></a><a href="#" class="btn btn--wd buy-link"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text">Add to cart</span></a></div>
              </div>
            </div>
          </div>
          <div class="product-preview-wrapper">
            <div class="product-preview">
              <div class="product-preview__image"><a href="product.html"><img src="{{ asset('assets/home/images/products/product-empty.png')}}" data-lazy="{{ asset('assets/home/images/products/product-5.jpg')}}"  alt="product 5"/></a></div>
              <div class="product-preview__info text-center">
                <div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
                <div class="product-preview__info__title">
                  <h2><a href="#">Fast Seconds Knit White</a></h2>
                </div>
                <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                <div class="price-box">$65.00</div>
                <div class="product-preview__info__description">
                  <p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>
                  <p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>
                </div>
                <div class="product-preview__info__link"><a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> <a href="#"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text">Add to wishlist</span></a><a href="#" class="btn btn--wd buy-link"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text">Add to cart</span></a></div>
              </div>
            </div>
          </div>
          <div class="product-preview-wrapper">
            <div class="product-preview">
              <div class="product-preview__image"><a href="product.html"><img src="{{ asset('assets/home/images/products/product-empty.png')}}" data-lazy="{{ asset('assets/home/images/products/product-6.jpg')}}"  alt="product 6"/></a></div>
              <div class="product-preview__info text-center">
                <div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
                <div class="product-preview__info__title">
                  <h2><a href="#">Fast Seconds Knit White</a></h2>
                </div>
                <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                <div class="price-box">$65.00</div>
                <div class="product-preview__info__description">
                  <p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>
                  <p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>
                </div>
                <div class="product-preview__info__link"><a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> <a href="#"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text">Add to wishlist</span></a><a href="#" class="btn btn--wd buy-link"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text">Add to cart</span></a></div>
              </div>
            </div>
          </div>
          <div class="product-preview-wrapper">
            <div class="product-preview">
              <div class="product-preview__image"><a href="product.html"><img src="{{ asset('assets/home/images/products/product-empty.png')}}" data-lazy="{{ asset('assets/home/images/products/product-7.jpg')}}"  alt="product 7"/></a></div>
              <div class="product-preview__info text-center">
                <div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
                <div class="product-preview__info__title">
                  <h2><a href="#">Fast Seconds Knit White</a></h2>
                </div>
                <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                <div class="price-box">$65.00</div>
                <div class="product-preview__info__description">
                  <p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>
                  <p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>
                </div>
                <div class="product-preview__info__link"><a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> <a href="#"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text">Add to wishlist</span></a><a href="#" class="btn btn--wd buy-link"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text">Add to cart</span></a></div>
              </div>
            </div>
          </div>
          <div class="product-preview-wrapper">
            <div class="product-preview">
              <div class="product-preview__image"><a href="product.html"><img src="{{ asset('assets/home/images/products/product-empty.png')}}" data-lazy="{{ asset('assets/home/images/products/product-8.jpg')}}"  alt="product 8"/></a></div>
              <div class="product-preview__info text-center">
                <div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
                <div class="product-preview__info__title">
                  <h2><a href="#">Fast Seconds Knit White</a></h2>
                </div>
                <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                <div class="price-box">$65.00</div>
                <div class="product-preview__info__description">
                  <p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>
                  <p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>
                </div>
                <div class="product-preview__info__link"><a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> <a href="#"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text">Add to wishlist</span></a><a href="#" class="btn btn--wd buy-link"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text">Add to cart</span></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Content section -->
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
<script type="text/javascript">
  function popitup($url) {
         newwindow=window.open($url,'name','height=400,width=500');
         if (window.focus) {newwindow.focus()}
         return false;
     }
  </script>
{{-- <script type="text/javascript">
    $(".compare").on("click", function(res){
        res.preventDefault();
        var productid = $(this).attr('data-productid');
        var Url = "{{route('addCompare')}}";
        var token = $(this).data('token');
        Compare(Url, token, productid);
    })
</script> --}}
<script type="text/javascript">
    

$(window).ready(function(){
    // $('#test').on('click',function(){
    //     alert(23232);
    // });
    // var productsJson = JSON.parse('{!!  $product->toJson()  !!}');
    // var analytic = new Analytics();

    $('.ajax-to-cart').each(function (i, el) {
        $(el).click(function (e) {
            // return;
            var productid = $(el).data('productid');
            var token = $(el).data('token');
            var Url = "{{route('addcart')}}";
            var cartUrl= "{{route('cart')}}";
            var checkoutUrl="{{route('checkout')}}";
            var order_CancelUrl="{{route(' ')}}";
            // CartClick(productid, productsJson, analytic, token, Url, cartUrl, checkoutUrl,order_CancelUrl);
            CartClick(productid,  token, Url, cartUrl, checkoutUrl,order_CancelUrl);

            e.preventDefault();
            e.stopPropagation();
        });
    });
});
    
</script>

{{-- <script type="text/javascript">
    $("#test").on("click", function (res) {
        res.preventDefault();
        alert('hello');
    });
</script>

<script type="text/javascript">
    $(".product-permalink").on("click", function (res) {
        var id = $(this).data('id');
        onProductClick(id);
    });
    function onProductClick(id) {
        console.log("PRoduct Click " + id);
        analytic.trackProductClick(productsJson, id);
    }
</script> --}}

{{-- <script type="text/javascript">
    $("#cart").on("click", function (res) {
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
    analytic.addImpression(productsJson);
</script> --}}

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



