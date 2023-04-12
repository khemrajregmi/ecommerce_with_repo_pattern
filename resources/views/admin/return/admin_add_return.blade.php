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
                    <h2>Return
                        <small>Add Return</small>
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


                   
                    <form  data-parsley-validate="" class="form-horizontal form-label-left" method="post" action="{{route('admin.return.store')}}">
                        {{csrf_field()}}
                      <div>
                        <hr>
                        <h4>Ordered Information</h4>
                        <hr>
                      </div>

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Order ID <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="order_id" value="{{old('order_id')}}" class="form-control col-md-6 col-xs-12" placeholder="Order ID">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Order Date  <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" name="date_ordered" value="{{old('date_ordered')}}" class="form-control col-md-6 col-xs-12" placeholder="Product Id">
                            </div>
                          </div>


                             <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control col-md-6 col-xs-12" name="customer_id">
                              @foreach($customers as $customer)
                                  <option value="{{$customer->customer_id}}">{{$customer->firstname}} {{$customer->lastname}}</option>
                              @endforeach
                             </select>
                            </div>
                          </div>


                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="firstname" value="{{old('firstname')}}" class="form-control col-md-6 col-xs-12" placeholder="First Name ">
                            </div>
                          </div>


                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="lastname" value="{{old('lastname')}}" class="form-control col-md-6 col-xs-12" placeholder="Last Name">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-Mail <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="email" value="{{old('email')}}" class="form-control col-md-6 col-xs-12" placeholder="E-Mail">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telephone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="telephone" value="{{old('telephone')}}" class="form-control col-md-6 col-xs-12" placeholder="Telephone">
                            </div>
                          </div>


                          <div>
                            <hr>
                            <h4>Product Information & Reason for Return</h4>
                            <hr>

                          </div>



                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control col-md-6 col-xs-12" name="product_id">
                              @foreach($products as $product)
                                  <option value="{{$product->product_id}}">{{$product->name}}</option>
                              @endforeach
                             </select>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="model" value="{{old('model')}}" class="form-control col-md-6 col-xs-12" placeholder="Model">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Quantity <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control col-md-6 col-xs-12" placeholder="Quantity">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Return Reason <span class="required"></span>
                            </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <select class="form-control col-md-6 col-xs-12" name="product_return_reason_id">
                                  @foreach($returnreason as $rr)
                                      <option value="{{$rr->product_return_reason_id}}">{{$rr->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Opened <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control col-md-6 col-xs-12" name="opened">
                                  <option value="0">Opended</option>
                                  <option value="1">Unopened</option>
                                </select>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Comment <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="4" cols="50" name="comment" id="first-name" class="form-control col-md-6 col-xs-12" placeholder="Comment">{{old('comment')}}</textarea>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Return Action <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control col-md-6 col-xs-12" name="product_return_action_id">
                              @foreach($returnaction as $ra)
                                  <option value="{{$ra->product_return_action_id}}">{{$ra->name}}</option>
                              @endforeach
                                </select>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Return Status <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control col-md-6 col-xs-12" name="product_return_status_id">
                                @foreach($returnstatus as $rs)
                                  <option value="{{$rs->product_return_status_id}}">{{$rs->name}}</option>
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
        </div>
    </div>
@endsection('content')
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

