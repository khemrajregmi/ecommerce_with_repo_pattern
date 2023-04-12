@extends('admin.layouts.master')
@section('pageCss')
    <style>
        .tb-block {
            display: table;
            width: 100%;
            margin-top: 15px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User Role
                        <small>Edit User Roles</small>
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

                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" action="{{route('admin.role.update',$role->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}

                        <div class="form-group tb-block">
                            <div class="col-md-12">
                                <label class="control-label" for="first-name">Role Name <span class="required">*</span>
                                </label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12"
                                       placeholder="User Role Name" value="{{$role->name}}">
                            </div>
                        </div>

                        <div class="form-group tb-block">
                            <div class="col-md-12">
                                <label class="control-label" for="first-name">Role Permission <span class="required">*</span>
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $ajaxRoutes = Helper::getAjaxRouteArray();
                                    ?>
                                    @foreach($routeNames as $key=>$value)
                                        @if(in_array($key,$ajaxRoutes))
                                            @continue
                                        @endif
                                        <div class="panel">
                                            <div class="panel-head">
                                                {{ucfirst($key)}}
                                            </div>
                                            <div class="panel-body">
                                                @foreach($value as $permission)
                                                    <div class="col-md-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php
                                                                    $permission_value = Helper::implodeArrayByDot($permission);?>
  <?php
                                                                    $isSet=false;
                                                                    if( isset($role->permissions[$permission_value]) && $role->permissions[$permission_value] ) {
                                                                        $isSet=true;
                                                                    }
                                                                    ?>
                                                                <input type="checkbox" name="permissions[]" value="{{$permission_value}}" <?php if($isSet) {echo "checked";}?> >{{ucfirst($permission[2])}}

                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group tb-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <button type="reset" class="btn btn-primary" onclick="history.go(-1);">Cancel</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection('content')