@extends('admin.layouts.master')
@section('pageCss')
    <link href="{{ asset('assets/admin/js/colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .form_wizard .stepContainer {
            height: auto !important;
        }
    </style>
@endsection('pageCss')
@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-pencil"></i> Store
                        <small>Edit Store </small>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                            </button>
                            <strong>OOPS! You might have missed to fill some required fields. Please check the errors.
                                <strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                        </div>
                    @endif
                    <form id="myForm" data-parsley-validate="" class="form-horizontal form-label-left"
                          required="required" method="post" action="{{route('admin.store.update',$store->store_id)}}">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                  <span class="step_descr">
                    Step 1<br/>
                    <small>Contact Info</small>
                  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                  <span class="step_descr">
                    Step 2<br/>
                    <small>Store Info</small>
                  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                  <span class="step_descr">
                    Step 3<br/>
                    <small>Order Info</small>
                  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4">
                                        <span class="step_no">4</span>
                  <span class="step_descr">
                    Step 4<br/>
                    <small>Commission</small>
                  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-5">
                                        <span class="step_no">5</span>
                  <span class="step_descr">
                    Step 5<br/>
                    <small>Invoice Period</small>
                  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-6">
                                        <span class="step_no">6</span>
                  <span class="step_descr">
                    Step 6<br/>
                    <small>Meta Tags</small>
                  </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="step-1">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><span
                                                data-toggle="tooltip" data-html="true" title=""
                                                data-original-title="Contact Name">Contact Name</span><span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" name="contact_name" id="contact_name"
                                               value="{{$store->contact_name}}" class="form-control col-md-7 col-xs-12"
                                               placeholder="Contact Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Contact Phone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" name="contact_phone" id="contact_phone"
                                               value="{{$store->contact_phone}}" class="form-control col-md-7 col-xs-12"
                                               placeholder="Contact Phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta-tag-title">Contact
                                        Email
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" name="contact_email" id="first-name"
                                               value="{{$store->contact_email}}"
                                               class="form-control col-md-7 col-xs-12" placeholder="Contact Email">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="street">Street <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" name="street" id="street"
                                               value="{{$store->street}}"
                                               class="form-control col-md-7 col-xs-12" placeholder="Street">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">State <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" name="state_id" id="state">
                                            <option value="0">Select State</option>
                                            @foreach($states as $s)
                                                <option value="{{$s->state_id}}" <?php echo ($store->state_id == $s->state_id) ? 'selected' : ''; ?>>{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" name="city_id" id="city">
                                            <option value="0">Select City</option>
                                            @foreach($cities as  $c)
                                                <option value="{{$c->city_id}}" <?php echo ($store->city_id == $c->city_id) ? 'selected' : ''; ?>>{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">Location
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" name="location_id" id="area">
                                             <option value="0">Select Location</option>
                                            @foreach($areas as $a)
                                                <option value="{{$a->area_id}}" <?php echo ($store->location_id == $a->area_id) ? 'selected' : ''; ?>>{{$a->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <div class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-name">Store
                                            Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-7 col-sm-6 col-xs-12">
                                            <input type="text" name="store_name" id="store_name"
                                                   value="{{$store->store_name}}"
                                                   class="form-control col-md-7 col-xs-12" placeholder="Store Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-owner">Store
                                            Phone<span class="required">*</span>
                                        </label>
                                        <div class="col-md-7 col-sm-6 col-xs-12">
                                            <input type="text" name="store_phone" id="store_phone"
                                                   value="{{$store->store_phone}}"
                                                   class="form-control col-md-7 col-xs-12" placeholder="Store Phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Store
                                            Logo</span>
                                        </label>
                                        <div class="col-md-7 col-sm-6 col-xs-12">
                                            <input type="text" id="feature_image" name="store_logo"
                                                   class="form-control col-md-7 col-xs-12"
                                                   value="{{$store->store_logo}}" placeholder="Store Logo">
                                            <a href="" class="popup_selector" data-inputid="feature_image">Browse
                                                Image</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                            Do you Wanna Dispatch ?
                                        </label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="1" class="flat" checked name="dispatch"> Yes
                                            </label>
                                            <label>
                                                <input type="radio" value="0" class="flat"  name="dispatch"> No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                            Collection
                                        </label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="1" class="flat" checked name="collection"> Yes
                                            </label>
                                            <label>
                                                <input type="radio" value="0" class="flat"  name="collection"> No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                            Delivery
                                        </label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="1" class="flat" checked name="delivery"> Yes
                                            </label>
                                            <label>
                                                <input type="radio" value="0" class="flat"  name="delivery"> No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-name">About Store
                                        </label>
                                        <div class="col-md-7 col-sm-6 col-xs-12">
                                            <textarea id="about_store" name="about_store" rows="7" class="form-control" placeholder="Write your message..">{{$store->about_store}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-name">Status
                                        </label>
                                        <div class="col-md-7 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" name="status" id="status">
                                                <option value ="1"  <?php echo ($store->status == 1) ? 'selected' : ''; ?>>Enabled</option>
                                                <option value ="0" <?php echo ($store->status == 0) ? 'selected' : ''; ?>>Disabled</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-3">
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                        Email Order <span class="required">*</span>
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="1" class="flat" @if($store->email_order == 1 ) checked @endif name="email_order"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" value="0" class="flat"  name="email_order" @if($store->email_order == 0 )checked @endif> No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" id="emailOption">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-owner">Order
                                        Email<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" name="order_email" id="order_email"
                                               value="{{$store->order_email}}"
                                               class="form-control col-md-7 col-xs-12" placeholder="Order Email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                        Sms Option <span class="required">*</span>
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="1" class="flat" checked name="sms_option" @if($store->sms_option == 1 )checked @endif> Yes
                                        </label>
                                        <label>
                                            <input type="radio" value="0" class="flat"  name="sms_option" @if($store->sms_option == 0 )checked @endif> No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" id="smsOption">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-owner">Phone
                                        Number<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" name="phone" id="phone"
                                               value="{{$store->phone}}"
                                               class="form-control col-md-7 col-xs-12" placeholder="phone number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                        Automatic Order Assign
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="1" class="flat"  name="automatic_order_assign"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" value="0" class="flat" checked  name="automatic_order_assign"> No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="step-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-owner">Store Commission
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" name="commission" id="commission"
                                               value="{{$store->commission}}"
                                               class="form-control col-md-7 col-xs-12" placeholder="Store Commission">
                                    </div>
                                </div>
                            </div>
                            <div id="step-5">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-owner">Invoice Period
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" name="invoice_period" id="invoice_period">
                                            <option value ="15day">15day</option>
                                            <option value ="30day">30day</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-owner">Meta Titles
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <textarea id="meta_titles" name="meta_titles" rows="7" class="form-control" >{{$store->meta_titles}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-owner">Meta Keywords
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <textarea id="meta_keywords" name="meta_keywords" rows="7" class="form-control">{{$store->meta_keywords}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-owner">Meta Description
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <textarea id="meta_description" name="meta_description" rows="7" class="form-control">{{$store->meta_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <!-- End SmartWizard Content -->
            </div>
        </div>
    </div>
    </div>
@endsection

@section('pageScript')
    <script src="{{asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/admin/js/colorbox/jquery.colorbox-min.js') }}"></script>
    <script type="text/javascript" src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>

    <script src="{{asset('assets/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/google-code-prettify/src/prettify.js')}}"></script>


    <script>
        $(document).ready(function () {
            // alert('hello');

            $('#wizard').smartWizard();

            $('#wizard_verticle').smartWizard({
                transitionEffect: 'slide'
            });

            $('.buttonNext').addClass('btn btn-success');
            $('.buttonPrevious').addClass('btn btn-primary');
            $('.buttonFinish').addClass('btn btn-default');
            $(".buttonFinish").click(function () {
                $('#myForm').submit();
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


        $(document).ready(function(){
            var $myForm = $('#myForm');
            var email_order = '{{$store->email_order}}';
            var sms_option = '{{$store->sms_option}}';
            if(sms_option == 1){
                $('#smsOption').show();
            }
            else {
                $('#smsOption').hide();
            }
            if(email_order == 1){
                $('#emailOption').show();
            }
            else {
                $('#emailOption').hide();
            }
            $myForm.on('ifChecked','input[name="email_order"]',function(){
                if($('input[name="email_order"]:checked').val()==1){
                    $('#emailOption').show();
                }
                else {
                    $('#emailOption').hide();
                }
            });

            $myForm.on('ifChecked','input[name="sms_option"]',function(){
                if($('input[name="sms_option"]:checked').val()==1){
                    $('#smsOption').show();
                }
                else {
                    $('#smsOption').hide();
                }
            });

        });





    </script>




@endsection
