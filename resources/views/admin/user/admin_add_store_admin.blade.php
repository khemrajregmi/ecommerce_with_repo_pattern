@extends('admin.layouts.master')
@section('pageCss')
    <link href="{{ asset('assets/admin/js/colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
@endsection('pageCss')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User
                        <small>Give Access To Store</small>
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

                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.make_or_remove_user_as_store_admin.ajax')}}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="fullName" class="form-control col-md-7 col-xs-12" placeholder="User FullName" value="{{$userFullName}}">
                                <input type="hidden" name="user_id" value="{{$userId}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sku">Stores
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_multiple form-control" multiple="multiple" name="store[]">
                                    <option value="0">Choose Stores</option>

                                    @foreach($stores as $s)
                                        <option value="{{$s->store_id}}"  <?php echo (Helper::in_array_r($s->store_id,$user->store->toArray(),true)) ? 'selected' : ''; ?> >{{$s->store_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success" id="make" name="make" >Access</button>
                                <button type="submit" class="btn btn-danger" id="remove" name="remove" >Denied</button>
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
    <!-- Select2 -->
    <script type="text/javascript" src="{{asset('assets/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".select2_multiple").select2({
                maximumSelectionLength: 4,
                allowClear: true
            });


        });
    </script>
@endsection('pageScript')