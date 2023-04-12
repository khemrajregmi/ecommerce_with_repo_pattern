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
                    <h2>Banner
                        <small>Edit Banner</small>
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

                   
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                          action="{{route('admin.banner.update',$banner->banner_id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}
                        

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banner Name <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12" placeholder="Banner Name" value="{{$banner->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status<span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-6 col-xs-12">
                                        <select class="form-control" name="status">
                                            <option value="1" <?php echo ($banner->status == 1) ? 'selected' : ''; ?> >Enable</option>
                                            <option value="0" <?php echo ($banner->status == 0) ? 'selected' : ''; ?> >Disable</option>
                                        </select>
                            </div>
                        </div>

                        <hr>
                        <div class="tab-pane" id="tab-image">
                            <div class="table-responsive">
                                <table id="image" class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <td class="text-left">Title</td>
                                        <td class="text-left">Link</td>
                                        <td class="text-center">Image</td>
                                        <td class="text-right">Sort Order</td>
                                        <td></td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php $counter = 1;?>
                                            @foreach($bannerimage as $bi)
                                            <tr id="image-row<?php echo $counter;?>">
                                                <td><input type="text"  name="banner_image[<?php echo $counter;?>][title]"  value="{{$bi->title}}" class="form-control col-md-6 col-xs-12" placeholder="Title"/> </td>
                                                <td><input type="text"  name="banner_image[<?php echo $counter;?>][link]"  value="{{$bi->link}}" class="form-control col-md-6 col-xs-12" placeholder="Link"/> </td>
                                                <td><input type="text" id="feature_image_<?php echo $counter;?>" name="banner_image[<?php echo $counter;?>][image]"  value="{{$bi->image}}" class="form-control col-md-6 col-xs-12" placeholder="Product Image"/> <a href="" class="popup_selector" data-inputid="feature_image_<?php echo $counter;?>">Browse Image</a></td>
                                                <td><input type="text" name="banner_image[<?php echo $counter;?>][sort_order]"  value="{{$bi->sort_order}}" class="form-control col-md-6 col-xs-12" placeholder="Sort Order"/> </td>
                                                <td><button type="button" data-parent="image-row<?php echo $counter;?>" data-toggle="tooltip" title="Remove" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-trash"></i></button></td>
                                            </tr>
                                                <?php $counter++;?>
                                                @endforeach
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td colspan="4"></td>
                                        <td class="text-left"><a href="#" class="add-author btn btn-info btn-md image "><span class="glyphicon glyphicon-plus "></span></a></td>
                                      </tr>
                                    </tfoot>
                                </table>
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
@endsection('content')


@section('pageScript')
           
        <script type="text/javascript" src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>

        <script src="{{ asset('assets/admin/js/colorbox/jquery.colorbox-min.js') }}"></script>
        <script type="text/javascript" src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/admin/js/common_function.js')}}"></script>
        <!-- Select2 -->
        <script type="text/javascript" src="{{asset('assets/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    


            <script type="text/javascript">
                var counter = 1;
                $('#image').on('click','.btn-danger',function(e){
                    e.preventDefault();
                    var row = $(this).data('parent');
                    $('#'+row).remove();
                });

               jQuery('a.image').click(function (event) {
                    event.preventDefault();
                    counter++;
                    var newRow = jQuery('<tr id="image-row'+ counter + '"><td><input type="text" id="quantity" placeholder="Title" value=""  name="banner_image[' + counter + '][title]" class="form-control col-md-1 col-xs-12' +
                            counter + 
                            '"/></td><td><input type="text" id="quantity" placeholder="Link" value=""  name="banner_image[' + counter + '][link]" class="form-control col-md-1 col-xs-12' +
                            counter + 
                            '"/></td><td><input type="text" id="feature_image_' + counter + '" name="banner_image[' + counter + '][image]" class="form-control col-md-6 col-xs-12" placeholder="Banner Image"' +
                            counter + '"/> <a href="" class="popup_selector" data-inputid="feature_image_' + counter + '">Browse Image</a></td><td><input type="text" id="quantity" placeholder="Sort Order" value=""  name="banner_image[' + counter + '][sort_order]" class="form-control col-md-1 col-xs-12' +
                            counter + 
                            '"/></td><td><button type="button" data-parent="image-row' + counter + '" data-toggle="tooltip" title="Remove" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-trash"></i>' + +'</button>' + +'</td></tr>');
                    jQuery('table#image').append(newRow);
                });
                
                
            </script>


@endsection
