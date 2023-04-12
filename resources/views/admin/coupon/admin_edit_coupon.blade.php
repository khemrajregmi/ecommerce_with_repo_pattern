@extends('admin.layouts.master')
@section('pageCss')
    <link href="{{ asset('assets/admin/js/colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Select2 -->
    <link href="{{asset('assets/admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    
@endsection('pageCss')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Coupon
                        <small>Edit Coupon</small>
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
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" action="{{route('admin.coupon.update',$coupon->coupon_id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-name">Coupon Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12" placeholder="Coupon Name" value="{{$coupon->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-code"><span data-toggle="tooltip" title="" data-original-title="The code the customer enters to get the discount.">Code</span><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="code" name="code" class="form-control col-md-7 col-xs-12" placeholder="Code" value="{{$coupon->code}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span data-toggle="tooltip" title="" data-original-title="Percentage or Fixed Amount.">Type</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="type">
                                    <option value="P" @if($coupon->type == 'P') selected @endif>Percentage</option>
                                    <option value="F" @if($coupon->type == 'F') selected @endif>Fixed</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Discount
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="discount" name="discount" class="form-control col-md-7 col-xs-12" placeholder="Discount" value="{{$coupon->discount}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-total"><span data-toggle="tooltip" title="" data-original-title="The total amount that must be reached before the coupon is valid.">Total Amount</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="total" name="total" class="form-control col-md-7 col-xs-12" placeholder="Total Amount" value="{{$coupon->total}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label"><span data-toggle="tooltip" title="" data-original-title="Customer must be logged in to use the coupon.">Customer Login</span>
                            </label>
                            <div class="radio">
                                <label>
                                    <input type="radio" value="1" @if($coupon->logged == 1) checked @endif  class="flat" name="logged"> Yes
                                </label>
                                <label>
                                    <input type="radio" value="0" @if($coupon->logged == 0) checked @endif class="flat"  name="logged"> No
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Free Shipping
                            </label>
                            <div class="radio">
                                <label>
                                    <input type="radio" value="1" @if($coupon->shipping == 1) checked @endif class="flat" name="shipping"> Yes
                                </label>
                                <label>
                                    <input type="radio" @if($coupon->shipping == 0) checked @endif value="0" class="flat"  name="shipping"> No
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span data-toggle="tooltip" title="" data-original-title="Choose specific products the coupon will apply to. Select no products to apply coupon to entire cart.">Products</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_multiple form-control" multiple="multiple" name="product_id[]">
                                    @foreach($products as $product)
                                              <option value="{{$product->product_id}}" <?php echo (Helper::in_array_r($product->product_id,$coupon->product->toArray(),true)) ? 'selected' : ''; ?> >{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span data-toggle="tooltip" title="" data-original-title="Choose all products under selected category.">Category</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_multiple form-control" multiple="multiple" name="category_id[]">
                                    @foreach($categories as $c)
                                                <option value="{{$c->category_id}}" <?php echo (Helper::in_array_r($c->category_id,$coupon->category->toArray(),true)) ? 'selected' : ''; ?> >{{$c->name}}</option>
                                            @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Start</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" class="form-control has-feedback-left" id="date_start" placeholder="Start Date" aria-describedby="inputSuccess2Status3" name="date_start" value="{{$coupon->date_start}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date End</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" class="form-control has-feedback-left" id="date_end" placeholder="End Date" aria-describedby="inputSuccess2Status3" name="date_end" value="{{$coupon->date_end}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-uses"><span data-toggle="tooltip" title="" data-original-title="The maximum number of times the coupon can be used by any customer. Leave blank for unlimited">Uses Per Coupon</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="uses_total" name="uses_total" class="form-control col-md-7 col-xs-12" value="{{$coupon->uses_total}}" placeholder="Uses Per Coupon">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-uses"><span data-toggle="tooltip" title="" data-original-title="The maximum number of times the coupon can be used by a single customer. Leave blank for unlimited">Uses Per Customer</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="uses_customer" name="uses_customer" class="form-control col-md-7 col-xs-12" value="{{$coupon->uses_customer}}" placeholder="Uses Per Customer" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="status">
                                    <option value="1" @if($coupon->status == 1) selected @endif >Enable</option>
                                    <option value="0" @if($coupon->status == 0) selected @endif>Disable</option>
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary" onclick="history.go(-1);">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
@section('pageScript')
        <!-- iCheck -->
    <script src="{{asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
     <script type="text/javascript" src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('assets/admin/js/colorbox/jquery.colorbox-min.js') }}"></script>
    <script type="text/javascript"
            src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/common_function.js')}}"></script>
    <!-- Select2 -->
    <script type="text/javascript"
                    src="{{asset('assets/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>

    <script type="text/javascript">
         $(".select2_multiple").select2({
                        maximumSelectionLength: 10,
                        allowClear: true
                    });
    </script>



@endsection('pageScript')