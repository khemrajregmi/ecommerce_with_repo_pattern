<!-- WIDGET:CATEGORIES - START -->
    <div class="widget widget-navigation">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="{{route('customer.dashboard')}}">Account Dashboard</a></li>
            <li><a href="{{route('customer.profile')}}">Personal Infromation</a></li>
            <li><a href="{{route('customer.changepass')}}">Password Update</a></li>
            <li><a href="{{route('customer.address')}}">My Address</a></li>
            <li><a href="{{route('customer.order',Auth::user()->customer_id)}}">My Orders</a></li>
        	<li><a href="{{route('customer.wishlist',Auth::user()->customer_id)}}">Personal Wishlist</a></li>
            <li><a href="{{route('customer.familywishlist',Auth::user()->customer_id)}}">Family Wishlist</a></li>
            <li><a href="{{route('customer.product.suggestion')}}">Give Product Suggestion</a></li>
            <li><a href="{{route('product.list')}}">Back to Shop</a></li>
        </ul>
    </div>
<!-- WIDGET:CATEGORIES - END -->