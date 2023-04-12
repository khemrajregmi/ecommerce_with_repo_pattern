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
@endsection('pageCss')
@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-pencil"></i> Product
                        <small>Add Product</small>
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
                    <form id="myForm" class="form-horizontal form-label-left" method="post"
                          action="{{route('admin.product.store')}}">
                        {{csrf_field()}}
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br/>
                                              <small>General</small>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br/>
                                              <small>Data</small>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br/>
                                              <small>Links</small>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4">
                                        <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4<br/>
                                              <small>Attribute</small>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-5">
                                        <span class="step_no">5</span>
                            <span class="step_descr">
                                              Step 5<br/>
                                              <small>Discount</small>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-6">
                                        <span class="step_no">6</span>
                            <span class="step_descr">
                                              Step 6<br/>
                                              <small>Image</small>
                                          </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="step-1">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product
                                        Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" id="tag" name="name" placeholder="Product Name"
                                               value="{{old('name')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <textarea id="messageArea" name="description" rows="7"
                                                  class="form-control ckeditor"
                                                  placeholder="Write your message..">{{old('description')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag">Meta Tag
                                        Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" id="meta_title" value="{{old('meta_title')}}"
                                               name="meta_title" placeholder="Meta Tag Title"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag_description">Meta
                                        Tag Description
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <textarea class="resizable_textarea form-control" name="meta_description"
                                                  placeholder="Meta Tag Description">{{old('meta_description')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_tag_keywords">Meta
                                        Tag Keywords
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <textarea class="resizable_textarea form-control" name="meta_keywords"
                                                  placeholder="Meta Tag Keywords">{{old('meta_keywords')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Product Tags">Product
                                        Tags
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" id="tag" name="tag" placeholder="Product Tags"
                                               value="{{old('tag')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="model">Model<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" id="name" name="model" placeholder="Model"
                                               value="{{old('model')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sku">SKU
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" id="sku" name="sku" value="{{old('sku')}}" placeholder="SKU"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" id="price" name="price" value="{{old('price')}}"
                                               placeholder="Price" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Quantity
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" id="quantity" name="quantity" placeholder="Quantity"
                                               value="{{old('quantity')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="minimum_quantity">Minimum
                                        Quantity
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" id="minimum" name="minimum" value="{{old('minimum')}}"
                                               placeholder="Minimum Quantity"
                                               value="1" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Subtract Stock</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control" name="subtract">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Out of Stock</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control" name="stock_status_id">
                                            @foreach($stockStatus as $ss)
                                                <option value="{{$ss->stock_status_id}}">{{$ss->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dimensions">Dimensions(L
                                        x W x H)
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <input type="text" id="length" name="length" value="{{old('length')}}"
                                               placeholder="Length"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-2">
                                        <input type="text" id="width" name="width" value="{{old('width')}}"
                                               placeholder="Width"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <input type="text" id="minimum" name="height" value="{{old('height')}}"
                                               placeholder="Height"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Length Class</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control" name="length_class_id">
                                            @foreach($lengthClass as $lc)
                                                <option value="{{$lc->length_class_id}}">{{$lc->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Weight
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <input type="text" id="weight" name="weight" value="{{old('meta_title')}}"
                                               placeholder="Weight"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Weight Class</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control" name="weight_class_id">
                                            @foreach($weightClass as $wc)
                                                <option value="{{$wc->weight_class_id}}">{{$wc->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control" name="status">
                                            <option value="1">Enabled</option>
                                            <option value="0">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="model">Manufacturer <span
                                                class="required"></span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" name="manufacturer_id">
                                            @foreach($manufacturers as $m)
                                                <option value="{{$m->manufacturer_id}}">{{$m->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sku">Catogories<span class="required">*</span>
                                    </label>
                                        <div class="col-md-7 col-sm-6 col-xs-12">
                                            <select class="select2_multiple form-control" multiple="multiple" name="category[]">
                                                <option>Choose Category</option>
                                               @foreach($categories as $c)
                                                  @foreach ($c->children as $children)
                                                  <option value="{{$children->category_id}}" >{{$children->name}}</option>
                                                  @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sku">Stores<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="select2_multiple form-control" multiple="multiple" name="store[]">
                                            <option>Choose Stores</option>
                                            @foreach($stores as $s)
                                                <option value="{{$s->store_id}}">{{$s->store_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Related
                                        Product
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" name="related_id">
                                            @foreach($userProducts as $up)
                                                @foreach($up->products as $p)
                                                <option value="{{$p->product_id}}">{{$p->name}}</option>
                                                    @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                       New Arrival
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="1" class="flat"  name="newarrival"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" value="0" class="flat" checked name="newarrival"> No
                                        </label>
                                       
                                    </div>
                                </div>
                            </div>
                            <div id="step-4">
                                <div class="tab-pane" id="tab-attribute">
                                    <div class="table-responsive">
                                        <table id="attribute" class=" table table-striped table-bordered table-hover"
                                               data-attributes= {{$attributes}}>
                                            <thead>
                                            <tr>
                                                <td class="text-left">Attribute</td>
                                                <td class="text-left">Text</td>
                                                <td></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td class="text-left">
                                                    <a href="#" title="" class="btn btn-info btn-md attribute"><span
                                                                class="glyphicon glyphicon-plus add-author"></span> </a>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="step-5">
                                <div class="tab-pane" id="tab-discount">
                                    <div class="table-responsive">
                                        <table id="discount" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                {{-- <td class="text-left">Customer Group</td> --}}
                                                <td class="text-right">Quantity</td>
                                                <td class="text-right">Priority</td>
                                                <td class="text-right">Percent</td>
                                                <td class="text-left">Date Start</td>
                                                <td class="text-left">Date End</td>
                                                <td></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="5"></td>
                                                <td class="text-left">
                                                    <a href="#" class="add-author btn btn-info btn-md discount "><span
                                                                class="glyphicon glyphicon-plus "></span></a>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="step-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image<span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="feature_image" name="image"
                                               class="form-control col-md-7 col-xs-12" placeholder="Product Image">
                                        <a href="" class="popup_selector" data-inputid="feature_image">Browse Image</a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-discount">
                                    <div class="table-responsive">
                                        <table id="image" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <td class="text-right">Additional Image</td>
                                                <td></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <a href="#" class="add-author btn btn-info btn-md image "><span
                                                                class="glyphicon glyphicon-plus "></span></a>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <!-- End SmartWizard Content -->
            </div>
        </div>
        @endsection

        @section('pageScript')
            <script type="text/javascript" src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>
            <script src="{{asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
            <script src="{{ asset('assets/admin/js/colorbox/jquery.colorbox-min.js') }}"></script>
            <script type="text/javascript"
                    src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/admin/js/common_function.js')}}"></script>
            <!-- Select2 -->
            <script type="text/javascript"
                    src="{{asset('assets/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>
            <script>
                $(document).ready(function () {
                    $(".select2_single").select2({
                        placeholder: "Select a state",
                        allowClear: true
                    });
                    $(".select2_multiple").select2({
                        maximumSelectionLength: 4,
                        allowClear: true
                    });
                    $('#wizard').smartWizard();

                    $('#wizard_verticle').smartWizard({
                        transitionEffect: 'slide'
                    });

                    $('.buttonNext').addClass('btn btn-success');
                    $('.buttonPrevious').addClass('btn btn-primary');
                    $('.buttonFinish').addClass('btn btn-default');
                });
            </script>


            <script type="text/javascript">
                var counter = 1;
                $('#attribute, #discount,#image').on('click','.btn-danger',function(e){
                    e.preventDefault();
                    var row = $(this).data('parent');
                    $('#'+row).remove();
                });
                jQuery('a.attribute').click(function (event) {
                    event.preventDefault();
                    counter++;
                    var selectBox = '<select style="width: 100%" class="select2_single form-control select2_single--'+ counter +'" name="product_attribute[' + counter + '][attribute_id]" tabindex="-1">' +
                            '<option></option>'
                            + counter +
                            @foreach($attributes as $a)
                                    '<option value="{{$a->attribute_id}}">{{$a->name}}</option>' +
                            @endforeach
                                    '</select>';
                    var newRow = jQuery('<tr id="attribute-row' + counter + '"><td>' + selectBox + '</td><td><textarea id="messageArea" name="product_attribute[' + counter + '][text]" rows="2" class="form-control ckeditor" placeholder="Text"' +
                            counter + '"></textarea></td><td><button type="button" data-parent="attribute-row' + counter + '" data-toggle="tooltip" title="Remove" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-trash"></i>' + +'</button></td></tr>');
                    jQuery('table#attribute').append(newRow);
                    $('.select2_single--'+counter).select2();
                });
                jQuery('a.discount').click(function (event) {
                    event.preventDefault();
                    counter++;
                   


                    var newRow = jQuery('<tr id="discount-row' + counter + '"><td><input type="text" id="quantity" placeholder="Quantity" value=""  name="product_discount[' + counter + '][quantity]" class="form-control col-md-3 col-xs-12' +
                            counter + '"/></td><td><input type="text" id="priority" placeholder="Priority" value=""  name="product_discount[' + counter + '][priority]" class="form-control col-md-3 col-xs-12' +
                            counter + '"/></td><td><input type="text" id="name" placeholder="%" value=""  name="product_discount[' + counter + '][percent]" class="form-control col-md-3 col-xs-12' +
                            counter + '"/></td><td><input type="date" id="name" placeholder="Date Start" value=""  name="product_discount[' + counter + '][date_start]" class="form-control col-md-3 col-xs-12' +
                            counter + '"/></td><td><input type="date" id="name" placeholder="Date End" value=""  name="product_discount[' + counter + '][date_end]" class="form-control col-md-3 col-xs-12' +
                            counter + '"></td><td><button type="button" data-parent="discount-row' + counter + '" data-toggle="tooltip" title="Remove" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-trash"></i>' + +'</button>' + +'</td></tr>');
                    jQuery('table#discount').append(newRow);
                    $('.select2_single--'+counter).select2();
                });

                jQuery('a.image').click(function (event) {
                    event.preventDefault();
                    counter++;
                    var newRow = jQuery('<tr id="image-row'+ counter + '"><td><input type="text" id="feature_image_' + counter + '" name="product_image[' + counter + '][image]" class="form-control col-md-6 col-xs-12" placeholder="Product Image"' +
                            counter + '"/> <a href="" class="popup_selector" data-inputid="feature_image_' + counter + '">Browse Image</a></td><td><button type="button" data-parent="image-row' + counter + '" data-toggle="tooltip" title="Remove" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-trash"></i>' + +'</button>' + +'</td></tr>');
                    jQuery('table#image').append(newRow);
                });
            </script>


@endsection
