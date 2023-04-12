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
                        <h2>Manufacturer
                            <small>Add Manufacturer</small>
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

                        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.manufacturer.store')}}">
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Manufacturer Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12" placeholder="Manufacturer Name" value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="feature_image" name="image" class="form-control col-md-7 col-xs-12" placeholder="Manufacturer Image">
                                    <a href="" class="popup_selector" data-inputid="feature_image">Browse Image</a>
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
    <script src="{{ asset('assets/admin/js/colorbox/jquery.colorbox-min.js') }}"></script>
    <script type="text/javascript" src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>
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