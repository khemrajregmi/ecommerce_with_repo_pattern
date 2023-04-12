@extends('admin.layouts.master')
	@section('content')
		<div class="clearfix"></div>
     <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-pencil"></i> Attribute <small>Add</small></h2>
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
                    
                        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.attribute.store')}}">
                        {{csrf_field()}}
                          


                         

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Attribute Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">
                              <input type="text" name="name" value="{{old('name')}}" class="form-control col-md-7 col-xs-12" placeholder="Attribute Name">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Attribute Group <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">
                            <select name="attribute_group_id" id="input-attribute-group" class="form-control col-md-7 col-xs-12">
                                @foreach ($attribute_group as $ag)
                                  <option value="{{$ag->attribute_group_id}}" >{{$ag->name}}</option>
                                @endforeach
                              </select>

                              
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary" onclick="history.go(-1);">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        </form>

                      </div>
                      
                    </div>
                    <!-- End SmartWizard Content -->

                    
                  </div>
                </div>
              </div>
            </div>
	@endsection

	