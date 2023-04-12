@extends('admin.layouts.master')
@section('pageCss')
<link href="{{ asset('assets/admin/js/colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css" />
<style>
  .form_wizard .stepContainer {
    height: auto !important;
  }
</style>
@endsection('pageCss')
@section('content')
<div class="clearfix"></div>
<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-pencil"></i>  Customer Product Suggestion <small>Add Customer Product Suggestion</small></h2>
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
        <form id="myForm" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.customerproductsuggestion.store')}}">
          {{csrf_field()}}

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">
              <input type="hidden" name="customer_id" value="1" class="form-control col-md-7 col-xs-12">
              <input type="text" name="product_name" value="{{old('product_name')}}" class="form-control col-md-7 col-xs-12" placeholder="Product Name">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">
              <input type="text" name="model" value="{{old('model')}}" class="form-control col-md-7 col-xs-12" placeholder="Model">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Brand Name<span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">
              <input type="text" name="brand" value="{{old('brand')}}" class="form-control col-md-7 col-xs-12" placeholder="Brand Name">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Suggestion <span class="required"></span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">
             <textarea id="messageArea" name="message" rows="7" class="form-control ckeditor" placeholder="Write your message..">{{old('message')}}</textarea>
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
<script src="{{asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/admin/js/colorbox/jquery.colorbox-min.js') }}"></script>
<script type="text/javascript" src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
<script src="{{asset('assets/admin/vendors/google-code-prettify/src/prettify.js')}}"></script>

<script type="text/javascript">
 CKEDITOR.replace( 'messageArea',
 {
  customConfig : 'config.js',
  toolbar : 'simple'
})
</script> 
<script>
 $(document).ready(function() {
              // alert('hello');

              $('#wizard').smartWizard();

              $('#wizard_verticle').smartWizard({
                transitionEffect: 'slide'
              });

              $('.buttonNext').addClass('btn btn-success');
              $('.buttonPrevious').addClass('btn btn-primary');
              $('.buttonFinish').addClass('btn btn-default');
              $(".buttonFinish").click(function(){
                $('#myForm').submit();
              });
            });
          </script>




          @endsection
