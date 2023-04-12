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
                    <h2>Category <small>show Category</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div >

                   <form id="myForm" data-parsley-validate="" class="form-horizontal form-label-left" >
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">
                            {{$category->name}}
                            </div>
                          </div>

                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Description <span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">{{$category->description}}
                            </div>
                          </div>
                         
                          

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Tag Title <span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">
                             {{$category->meta_title}}
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Tag Description <span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">{{$category->meta_description}}
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Tag Keyword <span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">{{$category->meta_keyword}}
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Parent <span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">
                                  @foreach($categories as $c)
                                                <?php 
                                                if($c->category_id==$category->parent_id)
                                                    echo $c->name
                                                  ?>
                                   @endforeach  
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button type="reset" class="btn btn-primary" onclick="history.go(-1);">Back</button>
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

<!-- <script type="text/javascript">
 CKEDITOR.replace( 'messageArea',
 {
  customConfig : 'config.js',
  toolbar : 'simple'
})
</script>  -->
@endsection
