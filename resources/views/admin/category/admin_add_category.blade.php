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
        <h2><i class="fa fa-pencil"></i>  Category <small>Add Category</small></h2>
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
        <form id="myForm" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.category.store')}}">
          {{csrf_field()}}


          <div id="wizard" class="form_wizard wizard_horizontal">
            <ul class="wizard_steps">
              <li>
                <a href="#step-1">
                  <span class="step_no">1</span>
                  <span class="step_descr">
                    Step 1<br />
                    <small>General</small>
                  </span>
                </a>
              </li>
              <li>
                <a href="#step-2">
                  <span class="step_no">2</span>
                  <span class="step_descr">
                    Step 2<br />
                    <small>Data</small>
                  </span>
                </a>
              </li>

            </ul>
            <div id="step-1">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span>
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <input type="text" name="name" id="first-name" value="{{old('name')}}" class="form-control col-md-7 col-xs-12" placeholder="Category Name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Description <span class="required"></span>
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                 <textarea id="messageArea" name="description" rows="7" class="form-control ckeditor" placeholder="Write your message..">{{old('description')}}</textarea>
               </div>
             </div>


             <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Tag Title <span class="required">*</span>
              </label>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <input type="text" name="meta_title" id="first-name" value="{{old('meta_title')}}" class="form-control col-md-7 col-xs-12" placeholder="Meta Tag Title">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Tag Description <span class="required"></span>
              </label>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <textarea rows="4" cols="50" name="meta_description" id="first-name" class="form-control col-md-7 col-xs-12" placeholder="Meta Tag Description">{{old('meta_description')}}</textarea>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Tag Keyword <span class="required"></span>
              </label>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <input type="text" name="meta_keyword" id="first-name" value="{{old('meta_keyword')}}"  class="form-control col-md-7 col-xs-12" placeholder="Meta Tag Keyword">
              </div>
            </div>



          </div>
          <div id="step-2">
            <div class="form-horizontal form-label-left">

             <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Parent  <span class="required"></span>
              </label>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12" name="parent_id">
                    <option value="0">----none-----</option>
                    @foreach($categories as $c)
                        <option value="{{$c->category_id}}" >{{$c->name}}</option>
                    @endforeach
                </select>
              </div>
            </div>


             <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Top <span class="required"></span>
              </label>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <input type="checkbox" class="flat" value="1" name="top">
              </div>
            </div>


            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image
              </label>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <input type="text" id="feature_image" value="{{old('image')}}" name="image" class="form-control col-md-7 col-xs-12" placeholder="Category Image">
                <a href="" class="popup_selector" data-inputid="feature_image">Browse Image</a>
              </div>
            </div>



            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status  <span class="required"></span>
              </label>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12" name="status">
                  <option value="1">Enable</option>
                  <option value="0">Disable</option>
                </select>
              </div>
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
