<div class="col-xs-12 col-lg-3 col-md-3">
	<ul class="account-element-list">
	    <li><a href="{{route('customer.dashboard')}}"><i class="icon-user-circle"></i><span>User Information</span></a></li>
	    <li><a href="{{route('customer.order',Auth::user()->customer_id)}}"><i class="icon-bars"></i><span>Order History</span></a></li>
	    <li><a href="{{route('customer.address')}}"><i class="icon-home"></i><span>Address</span></a></li>
	    <li><a href="{{route('customer.wishlist',Auth::user()->customer_id)}}"><i class="icon-sweet"></i><span>Wishlist</span></a></li>                        
  </ul>
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
      </a> 
    </div>
</div>