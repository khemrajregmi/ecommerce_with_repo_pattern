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
                    <h2>Customer 
                        <small>Add Customer </small>
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

                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.customer.store')}}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Group <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="customer_group_id">
                                             @foreach($customer_group as $c)
                                              <option value="{{$c->customer_group_id}}" >{{$c->name}}</option>
                                          @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="firstname" value="{{old('firstname')}}" class="form-control col-md-7 col-xs-12" placeholder="First Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="lastname" value="{{old('lastname')}}" class="form-control col-md-7 col-xs-12" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-Mail <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="email" value="{{old('email')}}" class="form-control col-md-7 col-xs-12" placeholder="E-Mail">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telephone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="telephone" value="{{old('telephone')}}" class="form-control col-md-7 col-xs-12" placeholder="Telephone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fax <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="fax" value="{{old('fax')}}" class="form-control col-md-7 col-xs-12" placeholder="Fax">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="name" name="password" value="{{old('password')}}" class="form-control col-md-7 col-xs-12" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="name" name="password_confirm" value="{{old('password_confirm')}}" class="form-control col-md-7 col-xs-12" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Newsletter <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select class="form-control" name="newsletter">
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>
                                        </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select class="form-control" name="status">
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>
                                        </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Approved <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select class="form-control" name="approved">
                                            <option value="1">Yes</option>
                                            <option value="0">NO</option>
                                        </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Safe <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select class="form-control" name="safe">
                                            <option value="1">Yes</option>
                                            <option value="0">NO</option>
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