@extends('home.layouts.homepagemaster')
    @section('pageCss')
        <link href="{{ asset('assets/home/css/account.css') }}" rel="stylesheet" type="text/css" >
    @stop
@section('content')
<section class="content content--parallax top-null banner-parallex" data-image="images/parallax-bg.jpg')}}" style="background-position: 50% 19px;">
      <div class="container">
        <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading-1">{{Auth::user()->firstname }} Address</div>

            <!-- Breadcrumb section -->
        <div class="breadcrumbs">
           
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="">Address</a></li>
                </ol>
           
        </div>
          
        </div>

      </div>

    </div>
      </div>
    </section>
    <!-- Content section -->
        <section class="content">
           <div class="container">
             
              <div class="card card--padding row">
                {{-- customer sidebar starts --}}
                    @include('home.customer.partials.customer_sidebar')
                {{-- customer sidebar ends --}}
                 <div class="col-xs-9">
                    <div class="clearfix">
                          <div>
                             <h4 class="text-uppercase h-pad-sm clearfix">
                                <span class="pull-left">Address List</span> 
                             </h4>
                          </div>
                          <div class="text-left"><a href="#" class="btn btn--wd text-uppercase wave" data-toggle="modal" data-target="#add_address">Add New Address</a></div>
                          <div class="table-responsive border">
                             <table class="table table-bordered order-history-table">
                                <tbody>
                                   <tr>
                                      <th class="col-xs-5">Country</th>
                                      <th class="col-md-1 hidden-xs hidden-sm">State</th>
                                      <th class="col-xs-2">City</th>
                                      <th class="col-xs-2">Address</th>
                                      <th class="col-xs-1">Detail Address</th>
                                      {{-- <th class="col-xs-2">Location</th> --}}
                                   </tr>
                                   @foreach($addresses as $add)
                                   <tr>
                                      <td><a href="single-order.html">{{$add->Country->name}}</a></td>
                                      <td><a href="single-order.html">{{$add->State->name}}</a></td>
                                      <td><a href="single-order.html">{{$add->City->name}}</a></td>
                                      <td><a href="single-order.html">{{$add->address_1}}</a></td>
                                      <td><a href="single-order.html">{{$add->address_2}}</a></td>
                                      {{-- <td><a href="single-order.html">{{$add->Country->name}}</a></td> --}}
                                   </tr>
                                   @endforeach

                                </tbody>
                             </table>
                          </div>
                     
                    </div>
                 </div>
              </div>
           </div>
        </section>

        
            <!-- End Content section --> 
@stop
@section('pageScript')
        <script type="text/javascript" src="{{ asset('assets/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
        <div id="add_address" class="modal fade" role="dialog">
          <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Address</h4>
              </div>
              <div class="modal-body">
                    <form id="" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('customer.add-address')}}">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="col-md-4 text-right margin-top-5">First Name<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input id="input_add_address-firstname" class="form-control" value="{{ Auth::user()->customer_id }} " name="customer_id" placeholder="Your Full Name" type="hidden" />
                                        <input id="input_add_address-firstname" class="form-control" value="{{ Auth::user()->firstname }} " name="firstname" placeholder="Your Full Name" type="text" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 text-right margin-top-5">Last Name<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input id="input_add_address-lastname" class="form-control" value="{{ Auth::user()->lastname }} " name="lastname" placeholder="Your Full Name" type="text" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 text-right margin-top-5">Company<span class="required"></span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="input_add_address-company" name="company" value="{{old('company')}}" class="form-control " placeholder="Company">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-md-4 text-right margin-top-5">Phone Number<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="number" id="input_add_address-telephone" name="telephone" value="{{old('telephone')}}" class="form-control " placeholder="Company">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-md-4 text-right margin-top-5">Address <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="input_add_address-address_1" name="address_1" value="{{old('address_1')}}" class="form-control " placeholder="Address 2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 text-right margin-top-5">Address Detail</label>
                                    <div class="col-md-6">
                                        <input type="text" id="input_add_address-address_2" name="address_2" value="{{old('address_2')}}" class="form-control " placeholder="Address 2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 text-right margin-top-5">Country</label>
                                    <div class="col-md-6">

                                        <select class="form-control input-country_id" name="country_id" id="country">
                                                {{-- <option value="0">Select Country</option> --}}
                                                @foreach($countries as $c)
                                                    <option value="{{$c->country_id}}">{{$c->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="col-md-4 text-right margin-top-5">Region/State</label>
                                    <div class="col-md-6">
                                        <select name="state_id" id="state" class="form-control input-state_id"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 text-right margin-top-5">City</label>
                                    <div class="col-md-6">
                                        <select class="form-control input-city_id" name="city_id" id="city">
                                            </select>              
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 text-right margin-top-5">Area</label>
                                    <div class="col-md-6">
                                        <select class="form-control input-area_id" name="area_id" id="area">
                                        </select>    
                                    </div>
                                </div> --}}

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="addAddress">Save </button>
                                    {{-- <span id="address_response"><img src="{{  asset('assets/home/images/loading1.gif')  }}" title="loading"></span>   --}}
                                </div>
                    </form>
              </div>
             
            </div>

          </div>
        </div>
        <script type="text/javascript">
        $('#country').change(function()
        {
            // console.log('alert');
            $.get('{{ url('admin/information') }}/' + this.value + '/states', function(cities)
            {
                var $state = $('#state');

                $state.find('option').remove().end();

                $.each(cities, function(index, city) {
                    $state.append('<option value="' + city.state_id + '">' + city.name + '</option>');
                });
            });
        });

        $('#state').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/cities', function(cities)
            {
                var $city = $('#city');

                $city.find('option').remove().end();

                $.each(cities, function(index, city) {
                    $city.append('<option value="' + city.city_id + '">' + city.name + '</option>');
                });
            });
        });

        $('#city').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/areas', function(areas)
            {
                var $area = $('#area');

                $area.find('option').remove().end();

                $.each(areas, function(index, area) {
                    $area.append('<option value="' + area.area_id + '">' + area.name + '</option>');
                });
            });
        });
    </script>

    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#myModal').modal('show');
        @endif

        $(".editAddress").on("click", function(res){
                res.preventDefault();
                var addressID = $(this).data('addressid');
                alert(addressID);
            });

        $(".deleteAddress").on("click", function(res){
                res.preventDefault();
                var addressID = $(this).data('addressid');
                var token = $(this).data('token');
                alert(addressID);

                $.ajax({
                type: 'GET',
                url: '{{route('customer.delete-address')}}',
                data:{
                        "_token": token,
                        "addressID":addressID,
                        },
            }).done(function (response) {
                if (response == "true"){

                    setTimeout(function(){// wait for 5 secs(2)
                                new PNotify({
                                title: 'Success',
                                text: 'Address Deleted Successfully....',
                                hide: false,
                                type:'success',
                                styling: 'bootstrap3'
                                 // then reload the page.(3)
                            }, 1);
                            });
                }
            })
            });
        
    </script>
