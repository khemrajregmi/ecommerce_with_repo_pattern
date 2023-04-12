@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>City 
                        <small>Add City </small>
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

                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('admin.city.store')}}">
                        {{csrf_field()}}

                       

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country_id">Country Select <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select class="form-control" name="country_id" id="country">
                                        <option value="">--Select Country--</option>
                                        @foreach($countries as $c)
                                            <option value="{{$c->country_id}}" >{{$c->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">State Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="state_id" id="state" class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control col-md-7 col-xs-12" placeholder="City Name">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="status">
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>
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
@endsection('content')
@section('pageScript')
        <!-- iCheck -->
<script src="{{asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript">
    $('#country').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/states', function(cities)
            {
                var $state = $('#state');

                $state.find('option').remove().end();

                $.each(cities, function(index, city) {
                    $state.append('<option value="' + city.state_id + '">' + city.name + '</option>');
                });
            });
        });
</script>


@endsection('pageScript')