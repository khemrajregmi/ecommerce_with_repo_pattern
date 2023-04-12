  <!-- Header section -->
  <header class="header header--sticky">
    <div class="header-line hidden-xs">
      <div class="container">
        <div class="pull-left">
          <div class="social-links social-links--colorize">
            <ul>
              <li class="social-links__item"><a class="icon icon-facebook" href="https://www.facebook.com/CakeSansaar/" target="_blank"></a></li>
                <li class="social-links__item"><a class="icon icon-instagram" href="https://www.instagram.com/cakesansaar/" target="_blank"></a></li>
              <li class="social-links__item"><a class="icon icon-twitter" href="https://twitter.com/CakeSansaar" target="_blank"></a></li>
              <li class="social-links__item"><a class="icon icon-pinterest" href="#"></a></li>
            
            </ul>
          </div>
        </div>
        <div class="pull-right">
          <div class="user-links">
            <ul>
            @if(Auth::check())
              <li class="user-links__item"><a href="{{route('customer.dashboard')}}">My Account</a></li>
              <li  class="user-links__item user-links__item--separate"><a href="{{ route('customer.logout') }}">LOGOUT</a> </li>
            @else
              <li class="user-links__item"><a href="{{route('singin')}}">Sign In</a></li>
              <li class="user-links__item"><a href="{{route('signup')}}">Register</a></li>
              {{-- <li  class="user-links__item user-links__item--separate"><a href="{{ route('social.login','twitter') }}" class="color-twitter">TWITTER</a> / <a href="{{ route('social.login','facebook') }}" class="color-facebook">FACEBOOK</a> LOGIN</li> --}}

              <li  class="user-links__item user-links__item--separate"><a href="" class="color-twitter">TWITTER</a> / <a href="" class="color-facebook">FACEBOOK</a> LOGIN</li>
            @endif

              <li class="user-links__item version-control"><a href="#">BETA VERSION: 1.9</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header__dropdowns-container">
      <div class="header__dropdowns">
        <div class="header__search pull-left"> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button search-open">
        <span class="icon icon-search"></span></a> </div>
        <div class="header__cart pull-left"><span class="header__cart__indicator hidden-xs total">NRS  {{$totalAmount}}</span>
          <div class="dropdown pull-right"><a href="#" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" data-toggle="dropdown"><span class="icon icon-bag-alt"></span><span class="badge badge--menu totalitem">{{$totalCartItem}}</span></a>
            <div class="dropdown-menu animated slideInLeft shopping-cart" role="menu">
              <div class="shopping-cart__settings"><a href="#" class="icon icon-gear"></a></div>
              <div class="shopping-cart__top text-uppercase ">Your Cart({{count($getCartItems)}})</div>
              <ul class="returnMessage">

                @if(!$getCartItems->isEmpty())
                  @foreach($getCartItems as $row)
                    <li class="shopping-cart__item" >
                      <div class="shopping-cart__item__image pull-left" ><a href="#"><img src="{{asset($row->options->image)}}" alt=""/></a></div>
                      <div class="shopping-cart__item__info" id="{{$row->id}}">
                        <div class="shopping-cart__item__info__title">
                          <h2 class="text-uppercase"><a href="#">{{$row->name}}</a></h2>
                        </div>
                        <div class="shopping-cart__item__info__option">Color: Blue</div>
                        <div class="shopping-cart__item__info__option">Size: Small</div>
                        <div class="shopping-cart__item__info__price">Rs {{$row->price}}</div>
                        <div class="shopping-cart__item__info__qty counter">Qty:<span>{{$row->qty}}</span></div>
                        <div class="shopping-cart__item__info__delete"><a href="#" class="icon icon-clear"></a></div>
                      </div>
                    </li>
                  @endforeach  


              </ul>
              <div class="shopping-cart__bottom">
                <div class="pull-left">Subtotal: <span class="shopping-cart__total">NRS  {{$totalAmount}}  </span></div>
                <div class="pull-right">
                  <a href="{{route('cart')}}" class="btn btn--wd text-uppercase">View Cart</a>
                  <a href="{{route('checkout')}}" class="btn btn--wd text-uppercase">Checkout</a>
                </div>
              </div>
              @else
                <li class="footercart">Your Cart is Empty..!!!</li>
              @endif
            </div>
          </div>
        </div>

        <div class="dropdown pull-right"> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button" data-toggle="dropdown"><span class="icon icon-dots"></span></a>
          <ul class="dropdown-menu ul-row animated fadeIn" role="menu">
           
            <li class='li-col list-user-menu'>
              <h4>My Account</h4>
              <ul>
              
             
              <li class="kerung-account"><a href="{{route('singin')}}">Sign In</a></li>
              <li class="kerung-wishlist"><a href="{{route('signup')}}">Register</a></li>
    
          

                
              </ul>
            </li>
          </ul>
        </div>
       
      </div>
    </div>
    <nav class="navbar navbar-wd" id="navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" id="slide-nav"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <!--  Logo  --> 
          <a class="logo" href="{{route(' ')}}"> <img class="logo-default" src="{{ asset('assets/home/images/logo.png') }}" alt="Cake Sansaar"/> <img class="logo-mobile" src="{{ asset('assets/home/images/logo-mobile.png') }}" alt="Cake Sansaar"/> <img class="logo-transparent" src="{{ asset('assets/home/images/logo-transparent.png') }}" alt="Cake Sansaar"/> </a> 
          <!-- End Logo --> 
        </div>
        <div class="pull-left search-focus-fade" id="slidemenu">
          <div class="slidemenu-close visible-xs">✕</div>
          <ul class="nav navbar-nav">     
            <li> <a href="{{route(' ')}}" class="dropdown-toggle"><span class="link-name">Home</span><span class="caret caret--dots"></span></a>
            </li>
              <li><a href="{{ route('about') }}" class="wave"><span class="link-name">About Us</span></a></li>
            <li class="menu-large"><a href="#" class="dropdown-toggle"><span class="link-name">CATEGORY</span><span class="caret caret--dots"></span></a>
              <div class="dropdown-menu megamenu animated fadeIn">
                <div class="container">
                  <ul class="megamenu__columns">
                    <li class="megamenu__columns__top-block text-uppercase">
                      <ul>
                        <li><span class="icon icon-box icon--lg"></span><a href="#">GIFTS EXCLUSIVE</a></li>
                        <li><span class="icon icon-sales-alt icon--lg"></span><a href="#">OFFERS</a></li>
                      </ul>
                    </li>

                    @if(!empty($parent_categories))
                    @foreach($parent_categories as $category)

                    <li class="level-menu level1">
                      <ul>
                      	 <div class="row">
                        <li class="title"><a href="#  ">{{$category->name}}</a><span class="badge badge--squared">NEW</span> </li>
                    </div>

                        <div class="row">
                        @foreach ($category->children as $children)
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-space">
                        <li class="level2"><a href="{{route('category.product',['category'=>$category->slug,'product'=>$children->slug])}}">{{$children->name}}</a></li>

                        </div>
                        @foreach ($children->allChildren as $chid)
                        </div>
                        <li class="level2"><a href="{{route('category.product',['category'=>$category->slug,'product'=>$children->slug])}}">{{$chid->name}}<</a></li>
                        @endforeach
                        @endforeach
                         
                      </ul>


                    </li>

                    @endforeach
                    @endif
                    <li class="megamenu__columns__bottom-block text-uppercase">
                      <ul>
                        <li><span class="icon icon-bag icon--lg"></span><a href="#">SPECIAL OFFER</a></li>
                        <li><span class="icon icon-shop-label icon--lg"></span><a href="#">UP TO 50% OFF DISCOUNTS</a></li>
                      </ul>
                    </li>
                    <li class="megamenu__columns__side-image"><img src="{{ asset('assets/home/images/cake1.png')}}" alt="Megamenu Image"> </li>
                  </ul>
                </div>
              </div>
            </li>

            <li><a href="{{route('product.list')}}" class="wave"><span class="link-name">Products </span></a></li>
            <li><a href="{{ route('howitworks') }}" class="wave"><span class="link-name">How it Works</span></a></li>
            <li><a href="{{ route('help') }}" class="wave"><span class="link-name">Help</span></a></li>
          
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- End Header section -->
