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
                    <h2>Attribute
                        <small>Edit Attribute</small>
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

                  
                     <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.review.update',$review->product_review_id)}}">
                     <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Store Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select class="select2_multiple form-control" multiple="multiple" name="store[]">
                                            <option>Choose Stores</option>
                                            @foreach($stores as $s)
                                                <option value="{{$s->store_id}}" <?php echo (Helper::in_array_r($s->store_id,$review->store->toArray())) ? 'selected' : ''; ?> >{{$s->store_name}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                        
                        

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Author <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="author" value="{{$review->author}}" class="form-control col-md-6 col-xs-12" placeholder="Author">

                              <input type="hidden" name="customer_id" value="1" class="form-control col-md-6 col-xs-12" placeholder="Author">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control col-md-6 col-xs-12" name="product_id">
                              @foreach($products as $product)
                                  <option value="{{$product->product_id}}" <?php echo ($product->product_id==$review->product_id)?'selected':''; ?>>{{$product->name}}</option>
                              @endforeach
                              </select>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Text <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="4" cols="50" name="text" id="first-name" class="form-control col-md-6 col-xs-12" placeholder="Meta Tag Description">{{$review->text}}</textarea>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rating <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="radio" class="flat"  name="rating" id="genderM" value="1" <?php echo ($review->rating==1)?'checked':''; ?> />1
                                <input type="radio" class="flat"  name="rating" id="genderM" value="2" <?php echo ($review->rating==2)?'checked':''; ?> />2
                                <input type="radio" class="flat"  name="rating" id="genderM" value="3" <?php echo ($review->rating==3)?'checked':''; ?> />3
                                <input type="radio" class="flat"  name="rating" id="genderM" value="4" <?php echo ($review->rating==4)?'checked':''; ?> />4
                                <input type="radio" class="flat"  name="rating" id="genderM" value="5" <?php echo ($review->rating==5)?'checked':''; ?> />5
                            </div>
                          </div> 

                          

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control col-md-6 col-xs-12" name="status">
                                  <option value="1" <?php echo ($review->status==1)?'selected':''; ?>>Enable</option>
                                  <option value="0" <?php echo ($review->status==0)?'selected':''; ?>>Disable</option>
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
        <!-- iCheck -->
  <script src="{{asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>

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