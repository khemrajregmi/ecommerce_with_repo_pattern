@extends('home.layouts.homepagemaster')
@section('pageMetaData')
<meta charset="utf-8">
 <title>Cakesansaar: Nepali Online Cake Store</title>
<meta name="keywords" content="Cake Sansaar" />
<meta name="description" content="A one stop shop for all types of cakes. Nepali online store for varieties of cakes delivering to your footsteps.">
<meta name="author" content="Cake Sansaar">
@endsection
@section('content')
   
     @if(Session::has('flash_message'))
            <script>
                iziToast.info({
                    title: '',
                    message: '{!! session('flash_message') !!}',
                    position: 'topRight'
                });
            </script>
           {{--  <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div> --}}
        @endif
    <div id="pageContent" class="page-content page-content--fill">

        <section class="content content--parallax top-null banner-parallex" data-image="images/parallax-bg.jpg')}}" style="background-position: 50% 19px;">
      <div class="container">
        <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>A special cake for a special day </h1>

            <!-- Breadcrumb section -->
        <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="">Product List</a></li>
                </ol>
           
        </div>
          
        </div>

      </div>

    </div>
      </div>
    </section>
        <section class="content">
            <div class="container">
                <div class="filters-row row">
                    <div class="col-sm-4 col-md-5 col-lg-3 col-1"> <a class="filters-row__view active link-grid-view icon icon-keyboard"></a> <a class="filters-row__view link-row-view icon icon-list"></a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilter"><span class="icon icon-filter"></span>Filter</a> <a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"></span>Filter</a> </div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-2">
                        <div class="filters-row__items">68 Item(s)</div>
                        <div class="filters-row__select">
                            <label>Per Page: </label>
                            <div class="select-wrapper">
                                <select class="select--wd select--wd--sm">
                                    <option>12</option>
                                    <option>36</option>
                                    <option>100</option>
                                </select>
                            </div>
                        </div>
                        <div class="filters-row__select">
                            <label>Sort: </label>
                            <div class="select-wrapper">
                                <select class="select--wd select--wd--sm">
                                    <option>Position</option>
                                    <option>Price</option>
                                    <option>Rating</option>
                                </select>
                            </div>
                        </div>
                        <a href="#" class="icon icon-arrow-down active"></a><a href="#" class="icon icon-arrow-up"></a> 
                    </div>
                    <div class="col-lg-3 visible-lg col-3">
                        <ul class="pagination pull-right">
                            <!-- <li><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li> -->

                             <li class="{{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
                                <a href="{{ $products->url(1) }}">«</a>
                            </li>
                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="{{ ($products->currentPage() == $i) ? ' active' : '' }}">
                                <a href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor
                            <li class="{{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                                <a href="{{ $products->url($products->currentPage()+1) }}"> »</i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="outer">
                    <div id="leftCol">
                        <div id="filtersCol" class="filters-col">
                            <div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear"></a></div>
                            <div class="filters-col__select visible-xs">
                                <label>Per Page: </label>
                                <div class="select-wrapper">
                                    <select class="select--wd select--wd--sm">
                                        <option>12</option>
                                        <option>36</option>
                                        <option>100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="filters-col__select visible-xs">
                                <label>Sort: </label>
                                <div class="select-wrapper">
                                    <select class="select--wd select--wd--sm">
                                        <option>Position</option>
                                        <option>Price</option>
                                        <option>Rating</option>
                                    </select>
                                </div>
                            </div>
                            <div class="filters-col__collapse open">
                                <h4 class="filters-col__collapse__title text-uppercase">SHOPPING BY:</h4>
                                <div class="filters-col__collapse__content">
                                    <ul class="filter-list">
                                        <li>
                                            <a href="#" class="icon icon-clear"></a> Price: <strong>$0.00 - $10,000.00</strong>
                                        </li>
                                        <li>
                                            <a href="#" class="icon icon-clear"></a> Color: <strong>Black</strong>
                                        </li>
                                        <li>
                                            <a href="#" class="icon icon-clear"></a> Size: <strong>10 (M)</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filters-col__collapse open">
                                <h4 class="filters-col__collapse__title text-uppercase">Category</h4>
                                <div class="filters-col__collapse__content">
                                    <ul class="filter-list">
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox1">
                                            <label for="checkBox1"> <span class="check"></span> <span class="box"></span> Party Dresses  (2) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox2">
                                            <label for="checkBox2"> <span class="check"></span> <span class="box"></span> Playsuit  (8) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox3">
                                            <label for="checkBox3"> <span class="check"></span> <span class="box"></span> Fun in the Sun  (11) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox4">
                                            <label for="checkBox4"> <span class="check"></span> <span class="box"></span> Flirty Florals  (6) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox5">
                                            <label for="checkBox5"> <span class="check"></span> <span class="box"></span> Maxis  (12) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox6">
                                            <label for="checkBox6"> <span class="check"></span> <span class="box"></span> L.B.D  (2) </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filters-col__collapse open">
                                <h4 class="filters-col__collapse__title text-uppercase">Price</h4>
                                <div class="filters-col__collapse__content">
                                    <ul class="filter-list">
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox7">
                                            <label for="checkBox7"> <span class="check"></span> <span class="box"></span> $0.00 - $10,000.00  (26) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox8">
                                            <label for="checkBox8"> <span class="check"></span> <span class="box"></span> $10,000.00 - $20,000.00  (2) </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filters-col__collapse open">
                                <h4 class="filters-col__collapse__title text-uppercase">COLOR</h4>
                                <div class="filters-col__collapse__content">
                                    <ul class="filter-list">
                                        <li> <a href="#"><span class="color-icon"><img src="{{asset('assets/home/images/colors/blue.png') }}" alt=""/></span>Blue  (9)</a> </li>
                                        <li> <a href="#"><span class="color-icon"><img src="{{asset('assets/home/images/colors/red.png') }}" alt=""/></span>Red  (2)</a> </li>
                                        <li> <a href="#"><span class="color-icon"><img src="{{asset('assets/home/images/colors/yellow.png') }}" alt=""/></span>Yellow  (7)</a> </li>
                                        <li> <a href="#"><span class="color-icon"><img src="{{asset('assets/home/images/colors/grey.png') }}" alt=""/></span>Grey  (1)</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filters-col__collapse open">
                                <h4 class="filters-col__collapse__title text-uppercase">Size</h4>
                                <div class="filters-col__collapse__content">
                                    <ul class="filter-list">
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox13">
                                            <label for="checkBox13"> <span class="check"></span> <span class="box"></span> 6 (XS)  (1) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox14">
                                            <label for="checkBox14"> <span class="check"></span> <span class="box"></span> 8 (S)  (4) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox15">
                                            <label for="checkBox15"> <span class="check"></span> <span class="box"></span> 10 (M)  (6) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox16">
                                            <label for="checkBox16"> <span class="check"></span> <span class="box"></span> 12 (L)  (3) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox17">
                                            <label for="checkBox17"> <span class="check"></span> <span class="box"></span> 14 (XL)  (5) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox18">
                                            <label for="checkBox18"> <span class="check"></span> <span class="box"></span> S/M  (0) </label>
                                        </li>
                                        <li class="checkbox-group">
                                            <input type="checkbox" id="checkBox19">
                                            <label for="checkBox19"> <span class="check"></span> <span class="box"></span> M/L  (0) </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filters-col__collapse open">
                                <h4 class="filters-col__collapse__title text-uppercase">Price Slider</h4>
                                <div class="filters-col__collapse__content">
                                    <div id="priceSlider" class="price-slider"></div>
                                </div>
                            </div>
                            <div class="filters-col__collapse open">
                                <h4 class="filters-col__collapse__title text-uppercase">Popular tags</h4>
                                <div class="filters-col__collapse__content">
                                    <ul class="tags-list">
                                        <li><a href="#">Apparel</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Models</a></li>
                                        <li><a href="#">Clothing</a></li>
                                        <li><a href="#">Fashion industry</a></li>
                                        <li><a href="#">Underwear</a></li>
                                        <li><a href="#">Evening dresses</a></li>
                                        <li><a href="#">Outerwear</a></li>
                                        <li><a href="#">Handbags</a></li>
                                        <li><a href="#">beauty</a></li>
                                        <li><a href="#">swimwear</a></li>
                                        <li><a href="#">New collections</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filters-col__collapse hidden-xs">
                                <h4 class="filters-col__collapse__title text-uppercase">Sale Products</h4>
                                <div class="filters-col__collapse__content">
                                    <div class="products-widget">
                                        <div class="products-widget-carousel nav-dot">
                                            <div class="products-widget__item">
                                                <div class="products-widget__item__image pull-left"><a href="#"><img src="{{asset('assets/home/images/products/product-10.jpg')}}" alt=""/></a></div>
                                                <div class="products-widget__item__info">
                                                    <div class="products-widget__item__info__title">
                                                        <h2 class="text-uppercase"><a href="#">Fast Seconds Knit White</a></h2>
                                                    </div>
                                                    <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                                                    <div class="price-box"><span class="price-box__new">$65.00</span> <span class="price-box__old">$84.00</span></div>
                                                </div>
                                            </div>
                                            <div class="products-widget__item">
                                                <div class="products-widget__item__image pull-left"><a href="#"><img src="{{asset('assets/home/images/products/product-7.jpg')}}" alt=""/></a></div>
                                                <div class="products-widget__item__info">
                                                    <div class="products-widget__item__info__title">
                                                        <h2 class="text-uppercase"><a href="#">Fast Seconds Knit White</a></h2>
                                                    </div>
                                                    <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                                                    <div class="price-box"><span class="price-box__new">$65.00</span> <span class="price-box__old">$84.00</span></div>
                                                </div>
                                            </div>
                                            <div class="products-widget__item">
                                                <div class="products-widget__item__image pull-left"><a href="#"><img src="{{asset('assets/home/images/products/product-6.jpg')}}" alt=""/></a></div>
                                                <div class="products-widget__item__info">
                                                    <div class="products-widget__item__info__title">
                                                        <h2 class="text-uppercase"><a href="#">Fast Seconds Knit White</a></h2>
                                                    </div>
                                                    <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                                                    <div class="price-box"><span class="price-box__new">$65.00</span> <span class="price-box__old">$84.00</span></div>
                                                </div>
                                            </div>
                                            <div class="products-widget__item">
                                                <div class="products-widget__item__image pull-left"><a href="#"><img src="{{asset('assets/home/images/products/product-11.jpg')}}" alt=""/></a></div>
                                                <div class="products-widget__item__info">
                                                    <div class="products-widget__item__info__title">
                                                        <h2 class="text-uppercase"><a href="#">Fast Seconds Knit White</a></h2>
                                                    </div>
                                                    <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                                                    <div class="price-box"><span class="price-box__new">$65.00</span> <span class="price-box__old">$84.00</span></div>
                                                </div>
                                            </div>
                                            <div class="products-widget__item">
                                                <div class="products-widget__item__image pull-left"><a href="#"><img src="{{asset('assets/home/images/products/product-3.jpg')}}" alt=""/></a></div>
                                                <div class="products-widget__item__info">
                                                    <div class="products-widget__item__info__title">
                                                        <h2 class="text-uppercase"><a href="#">Fast Seconds Knit White</a></h2>
                                                    </div>
                                                    <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
                                                    <div class="price-box"><span class="price-box__new">$65.00</span> <span class="price-box__old">$84.00</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filters-col__collapse hidden-xs">
                                <h4 class="filters-col__collapse__title text-uppercase">Community Polls</h4>
                                <div class="filters-col__collapse__content">
                                    <p class="text-uppercase"><strong>What is your favorite Magento feature?</strong></p>
                                    <form id="pollForm" action="#">
                                        <ul class="filter-list">
                                            <li>
                                                <label class="radio">
                                                <input id="radio1" type="radio" name="radios" checked>
                                                <span class="outer"><span class="inner"></span></span>Layered Navigation</label>
                                            </li>
                                            <li>
                                                <label class="radio">
                                                <input id="radio2" type="radio" name="radios">
                                                <span class="outer"><span class="inner"></span></span>Price Rules</label>
                                            </li>
                                            <li>
                                                <label class="radio">
                                                <input id="radio3" type="radio" name="radios">
                                                <span class="outer"><span class="inner"></span></span>Category Management</label>
                                            </li>
                                            <li>
                                                <label class="radio">
                                                <input id="radio4" type="radio" name="radios">
                                                <span class="outer"><span class="inner"></span></span>Compare Products</label>
                                            </li>
                                        </ul>
                                        <button type="submit" class="btn btn--wd btn--sm text-uppercase">Vote</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="centerCol">
                        <!-- Modal -->
                        <div class="modal quick-view zoom" id="quickView"  style="opacity: 1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                                    <div class="product-preview__image"><a href="{{route('product.list')}}"><img src="{{ asset('assets/home/images/products/product-2.jpg')}}" data-lazy="{{ asset('assets/home/images/products/product-2.jpg')}}"  alt=""/></a></div>

                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                        <div class="products-grid products-listing products-col products-isotope four-in-row">
                            @if(!$products->isEmpty())
                            @foreach($products as $product)
                            <!-- PRODUCT - START -->
                            {{--start tracking the product--}}
                            <div class="product-preview-wrapper">
                                <div class="product-preview">
                                    <div class="product-preview__image">
                                        <a href="{{ route('single.product',$product->slug) }}"><img src="{{asset($product->image)}}" alt=""/></a>
                                        @if($product->newarrival==1)
                                            <div class="product-preview__label product-preview__label--left product-preview__label--new"><span>new</span></div>
                                        @endif
                                        @if($product->Discount)
                                            <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span>sale<br>
                                                {{$product->Discount->percent}}%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product-preview__info text-center">
                                        <div class="product-preview__info__btns"><a href="#" data-productid="{{ $product->product_id }}" data-token="{{ csrf_token() }}" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
                                        <div class="product-preview__info__title">
                                            <h2><a href="#">{{$product->name}}</a></h2>
                                        </div>
                                        <div class="rating">
                                            @if(round($product->avgRating, 2)==0)
                                            <span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span>
                                            @elseif(round($product->avgRating, 2)==1)
                                            @elseif(round($product->avgRating, 2)==2)
                                            @elseif(round($product->avgRating, 2)==3)
                                            @elseif(round($product->avgRating, 2)==4)
                                            @elseif(round($product->avgRating, 2)==5)
                                            @endif
                                        </div>
                                        {{-- <ul class="options-swatch options-swatch--color">
                                            <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/blue.png') }}" width="10" height="10" alt=""/></span></a></li>
                                            <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/yellow.png') }}" width="10" height="10" alt=""/></span></a></li>
                                            <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/green.png') }}" width="10" height="10" alt=""/></span></a></li>
                                            <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/dark-grey.png') }}" width="10" height="10" alt=""/></span></a></li>
                                            <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/grey.png') }}" width="10" height="10" alt=""/></span></a></li>
                                            <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/red.png') }}" width="10" height="10" alt=""/></span></a></li>
                                            <li><a href="#"><span class="swatch-label"><img src="{{asset('assets/home/images/colors/white.png') }}" width="10" height="10" alt=""/></span></a></li>
                                        </ul> --}}
                                        <div class="price-box ">
                                            @if($product->Discount)
                                            <span class="price-box__new">Rs {{($product->price-($product->Discount->percent/100)*$product->price)}}</span>
                                            <span class="price-box__old">Rs {{round($product->price, 2)}}</span>
                                            
                                            @else
                                                 <span class="price-box__new">Rs {{round($product->price, 2)}}</span>
                                            @endif
                                        </div>
                                        <div class="product-preview__info__description">
                                            <p>{{$product->description}}</p>
                                        </div>
                                        <div class="product-preview__info__link"><a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> 
                                        @if(Auth::check())
                                        <a href="#" class="wish" data-productid="{{$product->product_id}}" data-token="{{csrf_token()}}" data-customerid="{{ Auth::user()->customer_id }}"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text ">Add to wishlist</span></a>
                                        @else
                                        <a href="#" class="wish" data-productid="{{$product->product_id}}" data-token="{{csrf_token()}}" data-customerid="login"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text ">Add to wishlist</span></a>
                                        @endif

                                        <a href="#" class="cart btn btn--wd buy-link ajax-to-cart" data-productid="{{$product->product_id}}" data-token="{{csrf_token()}}"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text addcart" >Add to cart</span></a></div>
                                    </div>
                                </div>
                            </div>  
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="hidden-lg text-center">
                    <div class="divider divider--sm"></div>
                    <ul class="pagination">
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
@endsection
@if(Session::has('success'))
    <script>
        iziToast.info({
            title: '',
            message: '{!! session('success') !!}',
            position: 'topRight'
        });
    </script>
    {{--  <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div> --}}
@endif
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
    
    //  $j('.ajax-to-cart').click(function(e){
    //     e.preventDefault();
    //      alert('shishir muji badi karauxas');
    // });
    $('.ajax-to-cart').each(function (i, el) {
        $(el).click(function (e) {
            var productid = $(el).data('productid');
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



