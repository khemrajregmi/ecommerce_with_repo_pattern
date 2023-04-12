<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar naadmin.dashboard.indexv_title" style="border: 0;">
                    <a href="{{route('admin.dashboard.index')}}" class="site_title"><i class="fa fa-paw"></i> <span>Cakify</span></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{ asset(Sentinel::getUser()->image)}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{Sentinel::getUser()->first_name}} {{Sentinel::getUser()->last_name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br/>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="{{route('admin.dashboard.index')}}"><i class="fa fa-dashboard fw"></i> Dashboard </a>
                            </li>
                            <li><a><i class="fa fa-tags fw"></i> Catalog <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.category.index')}}">Categories</a></li>
                                    <li><a href="{{route('admin.product.index')}}">Products</a></li>
                                    <li><a href="{{route('admin.feature.index')}}">Feature Products</a></li>
                                    <li><a>Attributes <span class="fa fa-chevron-down"></span> </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('admin.attribute.index')}}">Attributes </a>
                                            <li><a href="{{route('admin.attributegroup.index')}}">Attribute Groups</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('admin.manufacturer.index')}}">Manufacturers</a></li>
                                    <li><a href="{{route('admin.review.index')}}">Reviews</a></li>
                                </ul>
                            </li>
                        </ul><!--  -->
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-television fw"></i> Design <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.banner.index')}}">Banners</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-shopping-cart fw"></i> Sales <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.order.index')}}">orders</a></li>
                                    <li><a href="{{route('admin.return.index')}}">Returns</a></li>
                                    <li><a>Gift Vouchers <span class="fa fa-chevron-down"></span> </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('admin.voucher.index')}}">Vouchers </a>
                                            <li><a href="{{route('admin.vouchertheme.index')}}">Vocuher Themes</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-user fw"></i> Customers <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.customer.index')}}">Customers</a></li>
                                    <li><a href="{{route('admin.customergroup.index')}}">Customer Groups</a></li>
                                    <li><a href="{{route('admin.customerproductsuggestion.index')}}">Customer Product Suggestion</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-share-alt fw"></i> Marketing <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    {{--                      <li><a href="{{route('admin.affiliates.index')}}">Affiliate</a></li>--}}
                                    <li><a href="{{route('admin.coupon.index')}}">Coupons</a></li>
                                    <li><a>Discounts<span class="fa fa-chevron-down"></span> </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('admin.discounttype.index')}}">Discount Type </a>
                                            <li><a href="{{route('admin.discount.index')}}">Discounts</a></li>
                                        </ul>
                                    </li>

                                    <li><a>Combo Offers<span class="fa fa-chevron-down"></span> </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('admin.combotype.index')}}">Combo Offer Type </a>
                                            <li><a href="{{route('admin.combooffer.index')}}">Combo Offers</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                       @if(Sentinel::hasAccess('admin'))
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-cog fw"></i> System <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.setting.index')}}">Site Settings </a></li>
                                    <li><a>Localization <span class="fa fa-chevron-down"></span> </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('admin.orderstatus.index')}}">Order Statuses </a></li>
                                            <li><a href="{{route('admin.stockstatus.index')}}">Stock Statuses </a></li>
                                            <li><a href="{{route('admin.lengthclass.index')}}">LengthClasses</a></li>
                                            <li><a href="{{route('admin.weightclass.index')}}">WeightClasses</a></li>
                                            <li><a>Returns <span class="fa fa-chevron-down"></span> </a>
                                                <ul class="nav child_menu">
                                                    <li><a href="{{route('admin.returnstatus.index')}}">Return Statuses</a>
                                                    <li><a href="{{route('admin.returnaction.index')}}">Returns Actions</a></li>
                                                    <li><a href="{{route('admin.returnreason.index')}}">Returns Reasons</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a>Users <span class="fa fa-chevron-down"></span> </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('admin.user.index')}}">Users </a></li>
                                            <li><a href="{{route('admin.role.index')}}">User Roles </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @endif
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-map-marker"></i> Location <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.country.index')}}">Country</a></li>
                                    <li><a href="{{route('admin.state.index')}}">State</a></li>
                                    <li><a href="{{route('admin.city.index')}}">City</a></li>
                                    <li><a href="{{route('admin.area.index')}}">Area/Zipcode</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-bar-chart fw"></i> Reports <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    {{--                      <li><a href="{{route('admin.affiliates.index')}}">Affiliate</a></li>--}}
                                    <li><a>Sales <span class="fa fa-chevron-down"></span> </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('admin.salesreport.orders')}}">Orders</a>
                                            <!-- <li><a href="{{route('admin.returnaction.index')}}">Tax</a></li> -->
                                            <li><a href="{{route('admin.salesreport.shipping')}}">Shipping</a></li>
                                            <li><a href="{{route('admin.salesreport.return')}}">Returns</a></li>
                                            <li><a href="{{route('admin.salesreport.coupon')}}">Coupons</a></li>
                                        </ul>
                                    </li>
                                    <li><a>Products <span class="fa fa-chevron-down"></span> </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('admin.salesreport.product-view')}}">Viewed</a>
                                            <li><a href="{{route('admin.salesreport.product-purchased')}}">Purchased</a></li>
                                             <li><a href="{{route('admin.salesreport.inventory-filter')}}">Inventory</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a href="{{route('logout')}}" data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>