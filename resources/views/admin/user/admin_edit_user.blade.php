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
                    <h2>Users
                        <small>Edit User</small>
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

                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" action="{{route('admin.user.update',$user->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="email" class="form-control col-md-7 col-xs-12" placeholder="User Email" value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sku">Roles
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_multiple form-control" multiple="multiple" name="role_id[]">
                                    <option value="0">Choose Roles</option>

                                    @foreach($roles as $r)
                                        <option value="{{$r->id}}" <?php echo (Helper::in_array_r($r->id,$user->roles->toArray(),true)) ? 'selected' : ''; ?> >{{$r->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="first_name" class="form-control col-md-7 col-xs-12" placeholder="First Name" value="{{$user->first_name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="last_name" class="form-control col-md-7 col-xs-12" placeholder="Last Name" value="{{$user->last_name}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="feature_image" name="image" class="form-control col-md-7 col-xs-12" placeholder="User Image" value="{{$user->image}}">
                                <a href="" class="popup_selector" data-inputid="feature_image">Browse Image</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12" placeholder="Password" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="password" name="confirm" class="form-control col-md-7 col-xs-12" placeholder="Password">
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