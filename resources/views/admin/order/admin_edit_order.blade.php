@extends('admin.layouts.master')
@section('pageCss')
    <link href="{{ asset('assets/admin/js/colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Select2 -->
    <link href="{{asset('assets/admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <style>
        .form_wizard .stepContainer {
            height: 600px !important;
        }
    </style>
     <!-- PNotify -->
    <link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin//vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
@endsection('pageCss')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Order 
                        <small>Edit Order </small>
                    </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>OOPS! You might have missed to fill some required fields. Please check the errors.  <strong>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                    </div>
                    @endif

                   
                   <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" action="{{route('admin.order.update',$order->order_id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                            <span class="step_descr">
                                              Customer Detail<br/>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                            <span class="step_descr">
                                              Products<br/>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                            <span class="step_descr">
                                              Payment Details<br/>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4">
                                        <span class="step_no">4</span>
                            <span class="step_descr">
                                              Shiping Detail<br/>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-5">
                                        <span class="step_no">5</span>
                            <span class="step_descr">
                                             Totals<br/>
                                          </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="step-1">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                    Store
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-6 col-xs-12" name="store_id">
                                                <option value="1">Default</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Currency
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-6 col-xs-12" name="currency_id">
                                                <option value="1">Neplease</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag">Customer
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select class="form-control col-md-6 col-xs-12" name="customer_id">
                                            @foreach($customers as $c)
                                                <option value="{{$c->customer_id}}" <?php echo ($order->customer_id==$c->customer_id)?'selected':''; ?>>{{$c->firstname}} {{$c->lastname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag_description">Customer Group
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-6 col-xs-12" name="customer_group_id">
                                            @foreach($customers_group as $cg)
                                                <option value="{{$cg->customer_group_id}}" <?php echo ($order->customer_group_id==$cg->customer_group_id)?'selected':''; ?>>{{$cg->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag_keywords">First Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="firstname" placeholder="First Name"
                                               value="{{$order->firstname}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Last Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="lastname" placeholder="Last Name"
                                               value="{{$order->lastname}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">E-Mail<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="email" placeholder="E-mail Name"
                                               value="{{$order->email}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Telephone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="telephone" placeholder="Telephone"
                                               value="{{$order->telephone}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Fax
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="fax" placeholder="Fax"
                                               value="{{$order->fax}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h2>Products</h2>
                                </div>
                                <div class="x_content">
                                    <table class="table table-bordered product-table">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Model</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!$cartItems->isEmpty())
                                            @foreach($cartItems as $ci)
                                                <tr class="products-{{$ci->id}}" data-product-Id="{{$ci->id}}"
                                                    data-row-id="{{$ci->rowId}}">
                                                    <td>{{$ci->name}}</td>
                                                    <td>{{$ci->options->model}}</td>
                                                    <td><input type="text" class="input-product-quantity_{{$ci->id}}"
                                                               value="{{$ci->qty}}" name="quantity" disabled>
                                                        <input type="hidden" name="old_cart_qty[]" value="{{$ci->qty}}">       </td>
                                                    <td>{{$ci->price}}</td>
                                                    <td>{{$ci->subtotal}}</td>
                                                    <td>
                                                        <button type="button" data-toggle="tooltip" title="Remove"
                                                                class="btn btn-danger btn-md product-remove-button"
                                                                value="{{$ci->id}}"><i
                                                                    class="glyphicon glyphicon-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        @else
                                            <tr id="no-results">
                                                <td colspan="6" class="text-center"> No results!</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <h4>Add Product(s)</h4>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="model">Choose Product
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="select2_group form-control select-product">
                                            @foreach($products as $product)
                                                <option value="{{$product->product_id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sku">Quantity
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="sku" value="1"
                                               placeholder="Quantity"
                                               class="form-control col-md-6 col-xs-12 product-quantity">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-success add-product" data-token="{{csrf_token()}}">Add Product</button>
                                </div>
                            </div>
                            <div id="step-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag_keywords">First Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="payment_firstname" placeholder="First Name"
                                               value="{{$order->payment_firstname}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Last Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="payment_lastname" placeholder="Last Name"
                                               value="{{$order->payment_lastname}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Company
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="payment_company" placeholder="Company"
                                               value="{{$order->payment_company}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Address 1 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="payment_address_1" placeholder="Address 1"
                                               value="{{$order->payment_address_1}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Address 2 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="payment_address_2" placeholder="Address 2 "
                                               value="{{$order->payment_address_2}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country_id">Payment Country <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <select class="form-control" name="payment_country_id" id="country">
                                                <option value="">--Select Country--</option>
                                                @foreach($countries as $c)
                                                    <option value="{{$c->country_id}}" <?php echo ($order->payment_country_id == $c->country_id) ? 'selected' : ''; ?> >{{$c->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state"> Payment State <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-6 col-xs-12" name="payment_state_id" id="state">
                                            <option value="0">Select State</option>
                                            @foreach($states as $s)
                                                <option value="{{$s->state_id}}" <?php echo ($order->payment_state_id == $s->state_id) ? 'selected' : ''; ?>>{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">Payment City
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-6 col-xs-12" name="payment_city_id" id="city">
                                            <option value="0">Select City</option>
                                            @foreach($cities as  $c)
                                                <option value="{{$c->city_id}}" <?php echo ($order->payment_city_id == $c->city_id) ? 'selected' : ''; ?>>{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">Payment Location
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-6 col-xs-12" name="payment_area_id" id="area">  <option value="0">Select Location</option>
                                            @foreach($areas as $a)
                                                <option value="{{$a->area_id}}" <?php echo ($order->payment_area_id == $a->area_id) ? 'selected' : ''; ?>>{{$a->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div id="step-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag_keywords">First Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="shipping_firstname" placeholder="First Name"
                                               value="{{$order->shipping_firstname}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Last Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="shipping_lastname" placeholder="Last Name"
                                               value="{{$order->shipping_lastname}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Company
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="shipping_company" placeholder="Company"
                                               value="{{$order->shipping_company}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Address 1 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="shipping_address_1" placeholder="Address 1"
                                               value="{{$order->shipping_address_1}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Address 2 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="shipping_address_2" placeholder="Address 2 "
                                               value="{{$order->shipping_address_2}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country_id">Shipping Country<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <select class="form-control" name="shipping_country_id" id="country1">
                                                <option value="">--Select Country--</option>
                                                @foreach($countries as $c)
                                                    <option value="{{$c->country_id}}" <?php echo ($order->shipping_country_id == $c->country_id) ? 'selected' : ''; ?>>{{$c->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">Shipping State <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-6 col-xs-12" name="shipping_state_id" id="state1">
                                            <option value="0">Select State</option>
                                            @foreach($states as $s)
                                                <option value="{{$s->state_id}}" <?php echo ($order->shipping_state_id == $s->state_id) ? 'selected' : ''; ?>>{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city"> Shipping City
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-6 col-xs-12" name="shipping_city_id" id="city1">
                                            <option value="0">Select City</option>
                                            @foreach($cities as  $c)
                                                <option value="{{$c->city_id}}" <?php echo ($order->shipping_city_id == $c->city_id) ? 'selected' : ''; ?>>{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">Shipping Location
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-6 col-xs-12" name="shipping_area_id" id="area1">  <option value="0">Select Location</option>
                                            @foreach($areas as $a)
                                                <option value="{{$a->area_id}}" <?php echo ($order->shipping_area_id == $a->area_id) ? 'selected' : ''; ?>>{{$a->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step-5">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h2>Products</h2>
                                </div>
                                <div class="x_content">
                                    <table class="table table-bordered product-table">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Model</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!$cartItems->isEmpty())
                                            @foreach($cartItems as $ci)
                                                <tr class="products-{{$ci->id}}" data-product-Id="{{$ci->id}}"
                                                    data-row-id="{{$ci->rowId}}">
                                                    <td>{{$ci->name}}</td>
                                                    <td>{{$ci->options->model}}</td>
                                                    <td><input type="text" class="input-product-quantity_{{$ci->id}}"
                                                               value="{{$ci->qty}}" name="quantity" disabled></td>
                                                    <td>{{$ci->price}}</td>
                                                    <td>{{$ci->subtotal}}</td>

                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="4" class="text-right">Sub-Total</td>
                                                <td class="text-center">{{$cartSubtotal}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Total</td>
                                                <td class="text-center">{{$cartTotal}}</td>
                                                <input type="hidden" id="tag" name="total" placeholder="Coupon"
                                               value="{{$cartTotal}}" class="form-control col-md-6 col-xs-12">
                                            </tr>


                                        @else
                                            <tr id="no-results">
                                                <td colspan="6" class="text-center"> No results!</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Shipping Method<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <select class="form-control col-md-5 col-xs-12" name="shipping_method">
                                                <option value="">--- please select ---</option>
                                                <option value="Free Shipping" <?php echo ($order->shipping_method=='Free Shipping')?'selected':''; ?>>Free Shipping</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Payment Method<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <select class="form-control col-md-6 col-xs-12" name="payment_method">
                                                <option value="0">--- please select ---</option>
                                                <option value="Cash on Delivery" <?php echo ($order->payment_method=='Cash on Delivery')?'selected':''; ?>>Cash on Delivery</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag_keywords">Coupon<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="" placeholder="Coupon"
                                               value="" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag_keywords">Voucher<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="" placeholder="Voucher"
                                               value="" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag_keywords">Reward<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="tag" name="commission" placeholder="First Name"
                                               value="{{$order->commission}}" class="form-control col-md-6 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Order Status<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <select class="form-control col-md-6 col-xs-12" name="order_status_id">
                                                @foreach($orderstatus as $os)
                                                <option value="{{$os->order_status_id}}" <?php echo ($order->order_status_id==$os->order_status_id)?'selected':''; ?>>{{$os->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag_keywords">Comment<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <textarea class="resizable_textarea form-control" name="comment"
                                                  placeholder="Comment">{{$order->comment}}</textarea>
                                    </div>
                                </div>
                            </div>
                         </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
@section('pageScript')
    <script type="text/javascript" src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('assets/admin/js/colorbox/jquery.colorbox-min.js') }}"></script>
    <script type="text/javascript"
            src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/common_function.js')}}"></script>
    <!-- Select2 -->
    <script type="text/javascript"
            src="{{asset('assets/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>
     <!-- PNotify -->
    <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
    @include('laravelPnotify::notify')
    <script>
        $(document).ready(function () {
            $(".select2_group").select2({});
            $('#wizard').smartWizard();

            $('#wizard_verticle').smartWizard({
                transitionEffect: 'slide'
            });

            $('.buttonNext').addClass('btn btn-success');
            $('.buttonPrevious').addClass('btn btn-primary');
            $('.buttonFinish').addClass('btn btn-default');
        });
    </script>
    <script src="{{ asset('assets/admin/js/jquery.crs.min.js') }}"></script>

    
    <script type="text/javascript">
        $(".select2_multiple").select2({
            maximumSelectionLength: 10,
            allowClear: true
        });

        $('#country').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/states', function(cities)
            {
                var $state = $('#state');

                $state.find('option').remove().end();

                $.each(cities, function(index, city) {
                    $state.append('<option value="' + city.state_id + '">' + city.name + '</option>');
                });
            });
        });

        $('#state').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/cities', function(cities)
            {
                var $city = $('#city');

                $city.find('option').remove().end();

                $.each(cities, function(index, city) {
                    $city.append('<option value="' + city.city_id + '">' + city.name + '</option>');
                });
            });
        });

        $('#city').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/areas', function(areas)
            {
                var $area = $('#area');

                $area.find('option').remove().end();

                $.each(areas, function(index, area) {
                    $area.append('<option value="' + area.area_id + '">' + area.name + '</option>');
                });
            });
        });




        $('#country1').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/states', function(cities)
            {
                var $state = $('#state1');

                $state.find('option').remove().end();

                $.each(cities, function(index, city) {
                    $state.append('<option value="' + city.state_id + '">' + city.name + '</option>');
                });
            });
        });

        $('#state1').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/cities', function(cities)
            {
                var $city = $('#city1');

                $city.find('option').remove().end();

                $.each(cities, function(index, city) {
                    $city.append('<option value="' + city.city_id + '">' + city.name + '</option>');
                });
            });
        });

        $('#city1').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/areas', function(areas)
            {
                var $area = $('#area1');

                $area.find('option').remove().end();

                $.each(areas, function(index, area) {
                    $area.append('<option value="' + area.area_id + '">' + area.name + '</option>');
                });
            });
        });
        
    </script>


    {{--Js to add product to table--}}
    <script type="text/javascript">
        $(".add-product").on('click', function () {
            var productId = $('.select-product option:selected').val();
            var quantity = $('.product-quantity').val();
            var token = $(this).data('token');
            $.ajax({
                type: 'GET',
                url: '{{route('admin.getProducts.ajax')}}',
                data:{
                            "_token": token,
                            "productId":productId,
                            "quantity":quantity,
                        },
            }).done(function (response) {
                        if (response.response == 'error'){
                                    new PNotify({
                                    title: 'Success',
                                    text: 'Expected Quantity is more than stock !!! ....',
                                    hide: false,
                                    type:'success',
                                    styling: 'bootstrap3'
                                });
                                setTimeout(function(){// wait for 5 secs(2)
                                    location.hide(); // then reload the page.(3)
                                }, 2000);

                                }
                        if (response.response == 'success') {
                            $('#no-results').hide();
                            var dataString = 'product_id=' + response.message.product_id + '&name=' + response.message.name + '&model=' + response.message.model + '&quantity=' + quantity + '&price=' + response.message.price + '&total=' + quantity * response.message.price;


                            $.ajax({
                                type: 'GET',
                                url: '{{route('admin.addToCart.ajax')}}',
                                data: dataString
                            }).done(function (response) {
                                if (response.response == 'success') {
                                    $.ajax({
                                        type: 'GET',
                                        url: '{{route('admin.getCartItems.ajax')}}',
                                        dataType: 'json'
                                    }).done(function (result) {
                                        $.each(result.message, function (key, value) {
                                            var trProductId = $('.products-' + value.id).attr('data-product-Id');
                                            if (value.id == trProductId) {
                                                $('.input-product-quantity_' + value.id).val(value.qty)
                                                jQuery('.product-table > tbody >.products-' + value.id).find('td:eq(4)').text(value.subtotal);
                                            }
                                            else {
                                                $('.product-table tbody').append(
                                                        '<tr class="products-' + value.id + '" data-product-Id="' + value.id + '"data-row-id="' + value.rowId + '"><td>' + value.name + '</td>' +
                                                        '<td>' + value.options.model + '</td> <input type="hidden" name="model" value="' + value.options.model + '">'
                                                        +
                                                        '<td><input type="text" class="input-product-quantity_' + value.id + '" value="' + value.qty + '" name="quantity" disabled> <input type="hidden" name="old_cart_qty" value="0">  </td>' +
                                                        '<td>' + value.price + '</td>' +
                                                        '<td>' + value.subtotal + '</td>' +
                                                        '<td><button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger btn-md product-remove-button" value="' + value.id + '"><i class="glyphicon glyphicon-trash"></i></button></td>' +
                                                        '</tr>'
                                                );
                                            }
                                        });
                                    });
                                }
                            });


                        }
                    }
                );

        });

        //Remove Products From Table
        $('.product-table').on('click', '.product-remove-button', function (e) {
            e.preventDefault();
            var productId = $(this).attr("value");
            var cartRowId = $('.products-' + productId).attr('data-row-id');
            var dataString = 'rowId=' + cartRowId;
            $.ajax({
                type: 'GET',
                url: '{{route('admin.removeFromCart.ajax')}}',
                data: dataString
            }).done(function (response) {
                if (response.response == 'success') {
                    $('.products-' + productId).remove();
                }
            });
            var trCount = $('.product-table > tbody').children('tr').length;
            if (trCount == 2) {
                $('#no-results').show();
            }
        });
        //Remove Products From Table Ends
    </script>
    {{--Js to add product to table ends--}}

@endsection