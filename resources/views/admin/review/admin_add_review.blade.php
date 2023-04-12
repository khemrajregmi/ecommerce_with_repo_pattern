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
                    <h2>Review
                        <small>Add Review</small>
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

                   
                    <form  data-parsley-validate="" class="form-horizontal form-label-left" method="post" action="{{route('admin.review.store')}}">
                    {{csrf_field()}}

                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Store Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select class="select2_multiple form-control" multiple="multiple" name="store[]">
                                            @foreach($stores as $s)
                                                <option value="{{$s->store_id}}">{{$s->store_name}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                        

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Author <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="author" value="{{old('author')}}" class="form-control col-md-6 col-xs-12" placeholder="Author">
                            </div>
                          </div>

                          <input type="hidden" name="customer_id" value="1" class="form-control col-md-6 col-xs-12" placeholder="Author">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control col-md-6 col-xs-12" name="product_id" id="products">
                             <option>Choose Products</option>
                             </select>
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Text <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="4" cols="50" name="text" id="first-name" class="form-control col-md-6 col-xs-12" placeholder="Meta Tag Description">{{old('text')}}</textarea>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rating <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="radio" class="flat"  name="rating" id="genderM" value="1" />1
                                <input type="radio" class="flat"  name="rating" id="genderM" value="2" />2
                                <input type="radio" class="flat"  name="rating" id="genderM" value="3" />3
                                <input type="radio" class="flat"  name="rating" id="genderM" value="4"  />4
                                <input type="radio" class="flat"  name="rating" id="genderM" value="5"  />5
                            </div>
                          </div>

                          

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control col-md-6 col-xs-12" name="status">
                                  <option value="1">Enable</option>
                                  <option value="0">Disable</option>
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
    <script type="text/javascript">
      var id = [];
      var route = "{{route('admin.storewiseproduct.ajax')}}";

       $(".select2_multiple").on("select2:select select2:unselect", function (e) {
        
        $(".select2_multiple").each(function()
        {
           id = $(this).select2("val");
        });
    
        // console.log(id);
        // *Get Data **
          $.ajax({
          type: "GET",
          url: route,  
          data: 'store_id='+id,
          success: function(data) {
              var options = '';
                for (var i = 0; i < data.length; i++) {
                  for (var j = 0; j< data[i].length; j++){
                    options += '<option value="' + data[i][j].product_id + '">' + data[i][j].name + '</option>';
                  }
                }
                $("#products").html(options);
          }

          });

      /** End Data **/
    });
       
         
    </script>




@endsection('pageScript')

