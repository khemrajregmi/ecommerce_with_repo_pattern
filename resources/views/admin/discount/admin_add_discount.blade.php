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
                    <h2>Discount 
                        <small>Add Discount </small>
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

                   
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.discount.store')}}">
                        {{csrf_field()}}
                       

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Store Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select class="select2_multiple form-control" multiple="multiple" name="store[]">
                                            <option>Choose Stores</option>
                                            @foreach($stores as $s)
                                                <option value="{{$s->store_id}}">{{$s->store_name}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12" placeholder="Discount Name " value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Description
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="messageArea" name="description" rows="7"
                                                  class="form-control ckeditor"
                                                  placeholder="Write Description..">{{old('description')}}</textarea>  
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-name">Discount Type<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="discount-selector" class="form-control" name="discount_type_id">
                                    <option value="" >-----Select Type-----</option>
                                    @foreach($discount_type as $discount)
                                              <option value="{{$discount->discount_type_id}}" >{{$discount->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="ds-frm-1">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Category Select <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <select class="form-control category" name="category1[]" id="category">
                                            <option value="0">--Select category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->category_id}}" >{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product">Product<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="product_id[]" id="product" class="select2_multiple form-control product" multiple="multiple"></select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">% Discount
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="discount" name="product_per_percentage" class="form-control col-md-7 col-xs-12" placeholder="eg. 20% " value="{{old('discount')}}">
                                </div>
                            </div>
                        </div>

                        <div id="ds-frm-2">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Category Select <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <select class="form-control category" name="category_fixprice[]" id="category">
                                            <option value="">--Select category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->category_id}}" >{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product">Product<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="product_id[]" id="product" class="select2_multiple form-control product" multiple="multiple"></select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Amount Off Rs:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="amount" name="fixed_price_amount" class="form-control col-md-7 col-xs-12" placeholder="Amount" value="{{old('amount')}}">
                                </div>
                            </div>
                        </div>

                         <div id="ds-frm-3">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Total Bill
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12"  name="discount_total_bill_amount">
                                        <option value="">Select Option</option>
                                        <option value="3000" >--Above 3000---</option>
                                        <option value="5000" >--Above 5000---</option>
                                        <option value="8000" >--Above 8000---</option>
                                        <option value="10000" >--Above 10000---</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">% Discount
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="bill_discount" name="discount_total_bill_percent" class="form-control col-md-7 col-xs-12" placeholder="eg. 20 " value="{{old('bill_discount')}}">
                                </div>
                            </div>
                        </div>


                        <div id="ds-frm-4">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Category Select <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <select class="form-control category" name="category_priceoff[]" id="category">
                                            <option value="">--Select category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->category_id}}" >{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product">Product<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="product_id[]" id="product" class="select2_multiple form-control product" multiple="multiple"></select>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Price Off Amount</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="off_amount" name="priceoff_bundel_amount" class="form-control col-md-7 col-xs-12" placeholder=" Amount" value="{{old('e.g. 200')}}">
                                </div>
                            </div>
                        </div>

                         <div id="ds-frm-5">
                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount List</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="off_amount" name="off_amount" class="form-control col-md-7 col-xs-12" placeholder="off_amount Amount" value="{{old('e.g. 200')}}">
                                </div>
                            </div> -->

                            

                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="status">
                                        <option value="1" selected>Enable</option>
                                        <option value="o">Disable</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>

                         <div id="ds-frm-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-total">Category Discount
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="select2_multiple form-control" multiple="multiple" name="categorywise[]">
                                        @foreach($categories as $category)
                                                  <option value="{{$category->category_id}}" >{{$category->name}}</option>
                                        @endforeach
                                </select>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Type</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                   <select class="form-control" name="category_discount_type" id="type-selector">
                                         <option value="">Select Option</option>
                                        <option value="1">Percent Wise</option>
                                        <option value="2">Amount Wise</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" id="size">
                                <div id="ts-frm-1">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Percent</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="category_percent" name="category_discount_percent" class="form-control col-md-7 col-xs-12" placeholder="1 %" value="{{old('category_discount_percent')}}">
                                    </div>
                                </div>

                                <div id="ts-frm-2">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount Rs</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="category_amount" name="category_discount_amount" class="form-control col-md-7 col-xs-12" placeholder="122" value="{{old('category_discount_amount')}}">
                                    </div>
                                </div>
                            </div>
                        
                        </div>

                        <div id="ds-frm-7">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Category Select <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <select class="form-control category" name="category_bulkorder[]" id="category">
                                            <option value="">--Select category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->category_id}}" >{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product">Product<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="product_id[]" id="product" class="select2_multiple form-control product" multiple="multiple"></select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                   <select class="form-control" name="bulk_order_type" id="bulk_order_type">
                                        <option value="">Select Option</option>
                                        <option value="1">Value</option>
                                        <option value="2">Quantity</option>
                                    </select>
                                </div>
                            </div>

                            
                            <div id="bo-frm-1">
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Type </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                   <select class="form-control" name="bulk_order_value_type" id="bo_dis_type">
                                         <option value="">Select Option</option>
                                        <option value="1">Fixed Price Discount</option>
                                        <option value="2">% Discount</option>
                                    </select>
                                </div>
                                </div>

                                <div id="bo-dis-frm-1">
                                    <div class="form-group" >
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Discount Amount(Rs)</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                           <input type="text" id="dis_amount" name="bulk_order_value_amount" class="form-control col-md-7 col-xs-12" placeholder="2000" value="{{old('bulk_order_value_amount')}}">
                                        </div>
                                    </div>
                                </div>

                                <div id="bo-dis-frm-2">
                                    <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Discount(%)</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="dis_percent" name="bulk_order_value_percent" class="form-control col-md-7 col-xs-12" placeholder="1" value="{{old('bulk_order_value_percent')}}">
                                    </div>
                                    </div>
                                </div>
                            </div>


                            

                            <div id="bo-frm-2">
                                <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Total Qunantity</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="total_qty" name="bulk_order_total_qty" class="form-control col-md-7 col-xs-12" placeholder="30" value="{{old('bulk_order_total_qty')}}">
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Additional Qunantity</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="additional_qty" name="bulk_order_add_qty" class="form-control col-md-7 col-xs-12" placeholder="1" value="{{old('bulk_order_add_qty')}}">
                                    </div>
                                </div>
                            </div>

                                
                            
                        </div>

                        <div id="ds-frm-8">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Category Select <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <select class="form-control category" name="category_buy_getoffer[]" id="category">
                                            <option value="">--Select category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->category_id}}" >{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product">Product<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="product_id[]" id="product" class="select2_multiple form-control product" multiple="multiple"></select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="buy_qty">Buy Quantity
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="buy_qty" name="buy_quantity" class="form-control col-md-7 col-xs-12" placeholder="Buy Min. Qty" value="{{old('buy_qty')}}">
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="buy_qty">Get Quantity
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="get_qty" name="get_product" class="form-control col-md-7 col-xs-12" placeholder="Get Qty" value="{{old('get_product')}}">
                                </div>
                            </div>
                        </div>


                        <div id="ds-frm-9">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Category Select <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <select class="form-control category" name="category_free[]" id="category">
                                            <option value="">--Select category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->category_id}}" >{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product">Product<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="product_id[]" id="product" class="select2_multiple form-control product" multiple="multiple"></select>
                                </div>
                            </div>
                        </div>


                        <div id="ds-frm-10">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Category Select <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <select class="form-control category" name="category[]" id="category">
                                            <option value="">--Select category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->category_id}}" >{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product">Product<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="product_id[]" id="product" class="select2_multiple form-control product" multiple="multiple"></select>
                                </div>
                            </div>

                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="buy_qty">Start Date
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="get_qty" name="start_date" class="form-control col-md-7 col-xs-12" placeholder="Get Qty" value="{{old('start_date')}}">
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="buy_qty">End Date
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="get_qty" name="end_date" class="form-control col-md-7 col-xs-12" placeholder="Get Qty" value="{{old('end_date')}}">
                                </div>
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


<script>
    $('[id^="ds-frm-"]').hide();
    $('#discount-selector').on('change', function(e){
        var target = $(this).val();
        $('[id^="ds-frm-"]').hide();
        $('#ds-frm-'+target).show();
        
    });

</script>

<script>
    $('[id^="ts-frm-"]').hide();
    $('#type-selector').on('change', function(e){
        var target = $(this).val();
        $('[id^="ts-frm-"]').hide();
        $('#ts-frm-'+target).show();
        
    });

</script>

<script>
    $('[id^="bo-frm-"]').hide();
    $('#bulk_order').on('change', function(e){
        var target = $(this).val();
        $('[id^="bo-frm-"]').hide();
        $('#bo-frm-'+target).show();
        
    });

</script>

<script>
    $('[id^="bo-dis-frm-"]').hide();
    $('#bo_dis_type').on('change', function(e){
        var target = $(this).val();
        $('[id^="bo-dis-frm-"]').hide();
        $('#bo-dis-frm-'+target).show();
        
    });

</script>


<script>
    $('[id^="bo-frm-"]').hide();
    $('#bulk_order_type').on('change', function(e){
        var target = $(this).val();
        $('[id^="bo-frm-"]').hide();
        $('#bo-frm-'+target).show();
        
    });

</script>

<script type="text/javascript">
    $('.category').change(function()
        {
            $.get('{{ url('admin/productdiscount') }}/' + this.value + '/products', function(discounts)
            {
                var $product = $('.product');

                $product.find('option').remove().end();

                $.each(discounts, function(index, discount) {
                    $product.append('<option value="' + discount.product_id + '">' + discount.name + '</option>');
                });
            });
        });
</script>


    @endsection('pageScript')