@extends('admin.layouts.master')
@section('pageCss')
    <link href="{{ asset('assets/admin/js/colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css"/>
        <!-- Select2 -->
    <link href="{{asset('assets/admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Combo Offer
                        <small>Edit Combo Offer</small>
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


                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.combooffer.update',$comboOffer->combo_offer_id)}}">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}

                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Store Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select class="select2_multiple form-control" multiple="multiple" name="store[]">
                                            <option>Choose Stores</option>
                                            @foreach($stores as $s)
                                                <option value="{{$s->store_id}}" <?php echo (Helper::in_array_r($s->store_id,$comboOffer->store->toArray())) ? 'selected' : ''; ?> >{{$s->store_name}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Combo Offer Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="combo_name" class="form-control col-md-7 col-xs-12" placeholder="Combo Offer Name" value="{{$comboOffer->combo_name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Combo Type  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="combo_type_id">
                                    <option value="0">Select Combo Type</option>
                                    @foreach($comboTypes as $t)
                                        <option value="{{$t->combo_type_id}}" <?php echo ($comboOffer->combo_type_id == $t->combo_type_id) ? 'selected' : ''; ?>>{{$t->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Combo Image</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="feature_image" name="image" value="{{$comboOffer->image}}" class="form-control col-md-7 col-xs-12" placeholder="ComboOffer Image">
                                <a href="" class="popup_selector" data-inputid="feature_image">Browse Image</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="category_id" id="category">
                                    <option value="0">Select Categories</option>
                                    @foreach($categories as $c)
                                        <option value="{{$c->category_id}}" <?php echo ($comboOffer->category_id == $c->category_id) ? 'selected' : ''; ?>>{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
{{--                        {{dd($comboOffer->products->toArray())}}--}}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_multiple form-control" multiple="multiple" name="product_id[]" id="products">
                                    <option>Choose Products</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->product_id}}" <?php echo (Helper::in_array_r($product->product_id,$comboOffer->products->toArray(),true)) ? 'selected' : ''; ?> >{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Combo Price<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="combo_price" class="form-control col-md-7 col-xs-12" placeholder="Combo Offer Price" value="{{$comboOffer->combo_price}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                Show Price ?
                            </label>
                            <div class="radio">
                                <label>
                                    <input type="checkbox" value="1" class="flat" @if($comboOffer->show_mrp == 1) checked @endif name="show_mrp"> Maximum Retail Price(MRP)
                                </label>
                                <label>
                                    <input type="checkbox" value="1" class="flat" @if($comboOffer->show_sp == 1) checked @endif  name="show_sp"> Selling Price(SP)
                                </label>
                                <label>
                                    <input type="checkbox" value="1" class="flat"   @if($comboOffer->show_cp == 1) checked @endif name="show_cp"> Combo Price(CP)
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-7 col-sm-6 col-xs-12">
                                <select class="form-control" name="status">
                                    <option value="1" <?php echo ($comboOffer->status == 1) ? 'selected' : ''; ?>>
                                        Enabled
                                    </option>
                                    <option value="0" <?php echo ($comboOffer->status == 0) ? 'selected' : ''; ?>>
                                        Disabled
                                    </option>
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
    <script src="{{ asset('assets/admin/js/colorbox/jquery.colorbox-min.js') }}"></script>
    <script type="text/javascript" src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('assets/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
    <script type="text/javascript">
        $(".select2_multiple").select2({
            maximumSelectionLength: 10,
            allowClear: true
        });
        $("#category").on('change',function () {
            var categoryId = $(this).val();
            $.ajax({
                type:'GET',
                url:'{{route('admin.categoryProducts.ajax')}}',
                data:'category_id='+categoryId

            }).done(function (response) {
                var options = '';
                for (var i = 0; i < response.length; i++) {
                    options += '<option value="' + response[i].product_id + '">' + response[i].name + '</option>';
                }
                $("#products").html(options);
            });
        });
    </script>
@endsection