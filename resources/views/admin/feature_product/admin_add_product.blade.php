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
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Feature Products
                        <small>Add Feature Products</small>
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

                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.feature.store')}}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Select Product Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select class="select2_multiple form-control" multiple="multiple" name="product[]">
                                            <option>Choose Products</option>
                                            @foreach($products as $p)
                                                <option value="{{$p->product_id}}">{{$p->name}}</option>
                                            @endforeach
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
                        maximumSelectionLength: 20,
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


            


@endsection
