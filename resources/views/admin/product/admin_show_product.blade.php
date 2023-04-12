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
    <div class="x_panel ">
      <div class="x_title">
          <h2>Product <small>Show Product</small></h2>
          <div class="pull-right">
               <button type="reset" class="btn btn-primary" onclick="history.go(-1);">Back</button>
            </div>
            <div class="clearfix"></div>
          <div class="clearfix"></div>
      </div>
      <div class="col-md-6">
        <form id="myForm" data-parsley-validate="" class="form-horizontal form-label-left" >
          <input type="hidden" name="_method" value="PUT">
          {{csrf_field()}}

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">
              {{$product->name}}
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Description <span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">{{$product->description}}
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Title <span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">
             {{$product->meta_title}}
           </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model <span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">
             {{$product->model}}
           </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Quantity in Stock <span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">{{$product->quantity}}
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Price/Quantity<span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">{{$product->price}}
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Manufacturer<span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">{{$product->manufacturer->name}}
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Weight Class<span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">{{$product->weightClass->title}}
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Length Class<span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">{{$product->lengthClass->title}}
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Arrival<span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12">
              <?php
              if ($product->newarrival==1)
                echo "Yes";
              else
                echo "No";
              ?>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status<span class="required">:</span>
            </label>
            <div class="col-md-7 col-sm-6 col-xs-12"><?php
              if ($product->status==0)
                echo "Disable";
              else
                echo "Enable";
              ?>
            </div>
          </div>


          <!-- <div class="ln_solid"></div> -->
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              
            </div>
          </div>
        
        </form> 
      </div>
      <div class="col-md-6">
        <img src="{{asset($product->image)}}" />
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

<!-- <script type="text/javascript">
 CKEDITOR.replace( 'messageArea',
 {
  customConfig : 'config.js',
  toolbar : 'simple'
})
</script>  -->
@endsection
