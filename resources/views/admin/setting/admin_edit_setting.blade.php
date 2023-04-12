  @extends('admin.layouts.master')
  @section('pageCss')
  <link href="{{ asset('assets/admin/js/colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css" />
  @endsection('pageCss')
  @section('content')
  <div class="clearfix"></div>
  <div class="row">
   @foreach ($errors->all() as $error)
   <p class="error">{{ $error }}</p>
   @endforeach

   <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Setting <small>Edit Site Settings</small></h2>
        <div class="clearfix"></div>
      </div>
      <div >
        <form id="myForm" data-parsley-validate="" class="form-horizontal form-label-left"
        required="required" method="post" action="{{route('admin.setting.update','config')}}">
        <input type="hidden" name="_method" value="PUT">
        {{csrf_field()}}
        <div id="wizard" class="form_wizard wizard_horizontal">
          <ul class="wizard_steps">
            <li>
              <a href="#step-1">
                <span class="step_no">1</span>
                <span class="step_descr">
                  Step 1<br/>
                  <small>General</small>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-2">
                <span class="step_no">2</span>
                <span class="step_descr">
                  Step 2<br/>
                  <small>Data</small>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-3">
                <span class="step_no">3</span>
                <span class="step_descr">
                  Step 3<br/>
                  <small>Option</small>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-4">
                <span class="step_no">4</span>
                <span class="step_descr">
                  Step 4<br/>
                  <small>Extra</small>
                </span>
              </a>
            </li>
          </ul>
          <div id="step-1">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store-name">Site
                Name<span class="required">*</span>
              </label>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <input type="text" name="config_name" id="config_name"
                value="{{$setting['config_name']}}"
                class="form-control col-md-7 col-xs-12" placeholder="Site Name">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                Logo</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="feature_image" name="config_logo"
                class="form-control col-md-7 col-xs-12"
                value="{{$setting['config_logo']}}" placeholder="Site Logo">
                <a href="" class="popup_selector" data-inputid="feature_image">Browse
                  Image</a>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address
                  <span class="required"></span>
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <textarea rows="4" cols="50" name="config_address" id='meta-tag-description'
                  class="form-control col-md-7 col-xs-12"
                  placeholder="Address">{{$setting['config_address']}}</textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email">Email<span
                  class="required">*</span>
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <input type="text" name="config_email" id="config_email"
                  value="{{$setting['config_email']}}"
                  class="form-control col-md-7 col-xs-12" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone<span
                  class="required">*</span>
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <input type="text" name="config_telephone" id="config_telephone"
                  value="{{$setting['config_telephone']}}"
                  class="form-control col-md-7 col-xs-12" placeholder="Telephone">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Fax">Fax
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <input type="text" name="config_fax" id="config_fax"
                  value="{{$setting['config_fax']}}" class="form-control col-md-7 col-xs-12"
                  placeholder="Fax">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta-tag-title">Meta
                  Title <span class="required">*</span>
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <input type="text" name="config_meta_title" id="first-name"
                  value="{{$setting['config_meta_title']}}"
                  class="form-control col-md-7 col-xs-12" placeholder="Meta Title">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta-tag-description">Meta
                  Tag Description <span class="required"></span>
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <textarea rows="4" cols="50" name="config_meta_description"
                  id='meta-tag-description' class="form-control col-md-7 col-xs-12"
                  placeholder="Meta Tag Description">{{$setting['config_meta_description']}}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta-keywords">Meta
                  Tag Keyword <span class="required"></span>
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <input type="text" name="config_meta_keyword" id="first-name"
                  value="{{$setting['config_meta_keyword']}}"
                  class="form-control col-md-7 col-xs-12" placeholder="Meta Tag Keyword">
                </div>
              </div>

            </div>
            <div id="step-2">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                for="first-name">Cateory Image Size<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="config_category_image_height"
                  class="form-control col-md-7 col-xs-12"
                  value="{{$setting['config_category_image_height']}}" placeholder="Category Image height">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="config_category_image_width"
                  class="form-control col-md-7 col-xs-12"
                  value="{{$setting['config_category_image_width']}}" placeholder="Category Image width">
                </div>
              </div>
            </div>
            <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12"
             for="first-name">Product Image Size<span class="required">*</span>
           </label>
           <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"  name="config_product_image_height"
              class="form-control col-md-7 col-xs-12"
              value="{{$setting['config_product_image_height']}}" placeholder="Product Image height">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"  name="config_product_image_width"
              class="form-control col-md-7 col-xs-12"
              value="{{$setting['config_product_image_width']}}" placeholder="Product Image width">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12"
          for="first-name">Product Image Thumb Size<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text"  name="config_product_thumb_image_height"
            class="form-control col-md-7 col-xs-12"
            value="{{$setting['config_product_thumb_image_height']}}" placeholder="Product Image Thumb height">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text"  name="config_product_thumb_image_width"
            class="form-control col-md-7 col-xs-12"
            value="{{$setting['config_product_thumb_image_width']}}" placeholder="Product Image Thumb width">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"
        for="first-name">Product List Image Size<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text"  name="config_product_list_image_height"
          class="form-control col-md-7 col-xs-12"
          value="{{$setting['config_product_list_image_height']}}" placeholder="Product List Image height">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text"  name="config_product_list_image_width"
          class="form-control col-md-7 col-xs-12"
          value="{{$setting['config_product_list_image_width']}}" placeholder="Product List Image width">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"
      for="first-name">Related Product Image Size<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text"  name="config_related_product_image_height"
        class="form-control col-md-7 col-xs-12"
        value="{{$setting['config_related_product_image_height']}}" placeholder="Related Product Image height">
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text"  name="config_related_product_image_width"
        class="form-control col-md-7 col-xs-12"
        value="{{$setting['config_related_product_image_width']}}" placeholder="Related Product Image width">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"
    for="first-name">Compare Image Size<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text"  name="config_compare_image_height"
      class="form-control col-md-7 col-xs-12"
      value="{{$setting['config_compare_image_height']}}" placeholder="Compare Image height">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text"  name="config_compare_image_width"
      class="form-control col-md-7 col-xs-12"
      value="{{$setting['config_compare_image_width']}}" placeholder="Compare Image width">
    </div>
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"
    for="first-name">Wish List Image Size<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text"  name="config_wish_list_image_height"
      class="form-control col-md-7 col-xs-12"
      value="{{$setting['config_wish_list_image_height']}}" placeholder="Wish List Image height">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text"  name="config_wish_list_image_width"
      class="form-control col-md-7 col-xs-12"
      value="{{$setting['config_wish_list_image_width']}}" placeholder="Wish List  Image width">
    </div>
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"
    for="first-name">Cart Image Size<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text"  name="config_cart_image_height"
      class="form-control col-md-7 col-xs-12"
      value="{{$setting['config_cart_image_height']}}" placeholder="Cart Image height">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text"  name="config_cart_image_width"
      class="form-control col-md-7 col-xs-12"
      value="{{$setting['config_cart_image_width']}}" placeholder="Cart  Image width">
    </div>
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"
    for="first-name">Store Image Size<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text"  name="config_store_image_height"
      class="form-control col-md-7 col-xs-12"
      value="{{$setting['config_store_image_height']}}" placeholder="Store Image height">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text"  name="config_store_image_width"
      class="form-control col-md-7 col-xs-12"
      value="{{$setting['config_store_image_width']}}" placeholder="Store Image width">
    </div>
  </div>
  </div>
  </div>
  <div id="step-3">
    <legend>Captcha</legend>
    <?php
    $pages=array('register'=>'Register','guest'=>'Guest Checkout','reviews' =>'Reviews','returns' =>'Returns','contact' =>'Contact');
    ?>
    <!-- <div class="form-group">
      <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="Captcha to use for registration, login, contact and reviews.">Captcha</span></label>
      <div class="col-sm-10">
        <select name="config_captcha" id="input-captcha" class="form-control">
          <option value=""> - None - </option>
        </select>
      </div>
    </div> -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Captcha Page</label>
      <div class="col-sm-10">
        <div class="well well-sm" style="height: 150px; overflow: auto;">
          @foreach($pages as $key => $value)
          <div class="checkbox">
            <label>
              <input type="checkbox" name="config_captcha_page[]" value="{{$key}}" 
              <?php
              if (array_key_exists('config_captcha_page', $setting))
              {
                echo in_array($key,$setting['config_captcha_page']) ? 'checked' : ''; 
              }
              ?> /> {{$value}}</label>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div id="step-4">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">About
              <span class="required"></span>
          </label>
          <div class="col-md-7 col-sm-6 col-xs-12">
          <textarea id="messageArea" name="about" rows="7"
                        class="form-control ckeditor"
                        placeholder="Write your message..">{{$setting['config_about']}}</textarea>
          </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Privacy Policy
              <span class="required"></span>
          </label>
          <div class="col-md-7 col-sm-6 col-xs-12">
          <textarea id="messageArea" name="description" rows="7"
                        class="form-control ckeditor"
                        placeholder="Write your message..">{{$setting['config_privacy_policy']}}</textarea>
          </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Terms and Condition
              <span class="required"></span>
          </label>
          <div class="col-md-7 col-sm-6 col-xs-12">
          <textarea id="messageArea" name="description" rows="7"
                        class="form-control ckeditor"
                        placeholder="Write your message..">{{$setting['config_terms_condition']}}</textarea>
          </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Extra
              <span class="required"></span>
          </label>
          <div class="col-md-7 col-sm-6 col-xs-12">
          <textarea id="messageArea" name="description" rows="7"
                        class="form-control ckeditor"
                        placeholder="Write your message..">{{$setting['config_extra']}}</textarea>
          </div>
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