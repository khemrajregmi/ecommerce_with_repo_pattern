@extends('admin.layouts.master')
	@section('content')
		<div class="clearfix"></div>
     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>State <small>Edit State</small></h2>
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
                      <form id="myForm" data-parsley-validate="" class="form-horizontal form-label-left" action="{{route('admin.state.update',$state->state_id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}
                       

                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="country_id">
                                             @foreach($countries as $c)
                                              <option value="{{$c->country_id}}" <?php echo ($state->country_id==$c->country_id)?'selected':''; ?> >{{$c->name}}</option>
                                          @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="iso" name="name" value="{{$state->name}}" class="form-control col-md-7 col-xs-12" placeholder="State Name ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="status">
                                            <option value="1" <?php echo ($state->status == 1) ? 'selected' : ''; ?>>Enable</option>
                                            <option value="0" <?php echo ($state->status == 0) ? 'selected' : ''; ?>>Disable</option>
                                        </select>
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
