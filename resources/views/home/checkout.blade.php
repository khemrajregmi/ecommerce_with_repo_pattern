@extends('home.layouts.homepagemaster')
  @section('pageCss')
    <!-- Custom CSS -->
      {{-- <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/style-colors.css"> --}}
      <!-- custom css for wizard -->
      <link rel="stylesheet" href="{{ asset('assets/home/css/main.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/home/css/media.css')}}">

      <style>
         table tr td{
         padding:0 5px;
         vertical-align: top;
         }
         .first-td{
         padding:15px;
         }
         .first-tr{
         border-bottom:1px solid #f4f4f4;
         }
         .first-tr:last-child{
         border-bottom:none;
         }
         .total-cost-table{
         font-size: 16px;
         margin-right: 35px;
         }
         .total-cost-table td{
         padding:15px 15px 1px;
         }
      </style>
  @endsection
  @section('content')
  <div id="pageContent" class="page-content page-content--fill">
    <div id="pageContent">
        <section class="content content--parallax top-null banner-parallex" data-image="images/parallax-bg.jpg')}}" style="background-position: 50% 19px;">
            <div class="container">
              <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1>Checkout</h1>

                  <!-- Breadcrumb section -->
              <div class="breadcrumbs">
                  y
                      <ol class="breadcrumb">
                          <li><a href="#">Home</a></li>
                          <li class="active"><a href="">Checkout</a></li>
                      </ol>
                 
              </div>
                
              </div>

            </div>

          </div>
          </div>
        </section>
            <!-- Content section -->
            <!-- Content section -->

        
            <section class="content">

              <div class="container">
                <div class="row">
              <form id="myForm"  method="post"
                  action="{{route('order.checkout')}}">
                  {{csrf_field()}}

                      <div class="reg-wiz-wrapper">
                          <section class="reg-wiz-top-nav clearfix text-center" capsuleIdAttr='rwtTab'>
                             <div class="rwtn-capsule text-center" id="rwtTab1">
                                <div><i class="icon icon-home" aria-hidden="true"></i></div>
                                <div><span>Billing Address</span></div>
                             </div>
                             <div class="rwtn-capsule text-center" id="rwtTab2">
                                <div><i class="icon icon-money"></i></div>
                                <div><span>Payment Method</span></div>
                             </div>
                             <div class="rwtn-capsule text-center" id="rwtTab3">
                                <div><i class="icon icon-info"></i></div>
                                <div><span>Checkout Summary</span></div>
                             </div>
                          </section>
                          <section class="reg-wiz-body" style="margin-top:20px; margin-bottom:20px;">
                              <div class="reg-wiz-tab-panel  category-outer" id='rwtp1'>
                                <h6 class="panel-title row text-uppercase"> <a role="button" data-toggle="collapse" href="#collapseOne"><strong>Billing Information</strong></a> </h6>
                                
                                @if(!(Auth::check()))
                                    <h4>
                                      Returning Customer 
                                      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Click Here !!</button>
                                    </h4>
                                    @endif
                                    <div class="products-order checkout billing-information">
                                      <div class="row">
                                          @if(Auth::check())
                                            <div class="form-group col-sm-12">
                                              <label>Choose Address </label>
                                              <select class="input--wd input--wd--full" name="" id="addressSelect">
                                                @if(!empty($addresses))
                                                        <option>Select Your Address</option>
                                                  @foreach($addresses as $address)
                                                        <option value="{{$address->address_id}}">{{$address->firstname}} {{$address->lastname}}, {{$address->State->name}} , {{$address->City->name}}, {{$address->Country->name}}</option>
                                                  @endforeach
                                                @else
                                                  <option>You Have Not Add Your Address </option>
                                                @endif
                                              </select>
                                            </div>
                                          @endif

                                          @if(Auth::check())
                                            <input type="hidden"  name="customer_group_id" 
                                            value="{{Auth::user()->customer_group_id}}" class="input--wd input--wd--full col-md-7 col-xs-12">
                                            <input type="hidden"  name="customer_id" 
                                            value="{{Auth::user()->customer_id}}" class="input--wd input--wd--full col-md-7 col-xs-12">
                                            @else
                                              <input type="hidden"  name="customer_group_id" 
                                            value="1" class="input--wd input--wd--full col-md-7 col-xs-12">
                                             <input type="hidden"  name="customer_id" 
                                            value="1" class="input--wd input--wd--full col-md-7 col-xs-12">
                                          @endif

                                        <div class="products-order checkout billing-information">
                                          <div class="col-sm-6 form-group">
                                            <label>First Name <span class="required">*</span></label>
                                            <div class="firstname">
                                               <input type="text"  name="firstname" placeholder="First Name" value="{{old('firstname')}}" class="input--wd input--wd--full col-md-7 col-xs-12">
                                            </div>
                                            <input type="hidden" name="store[]" placeholder="First Name" value="1" class="input--wd input--wd--full col-md-7 col-xs-12">
                                          </div>
                                          <div class="col-sm-6 form-group">
                                            <label>Last Name <span class="required">*</span></label>
                                            <div class="lastname">
                                                  <input type="text"  name="lastname" placeholder="Last Name" value="{{old('lastname')}}" class="input--wd input--wd--full">
                                            </div>
                                          </div>
                                          <div class="col-sm-6 form-group">
                                            <label>Email address <span class="required">*</span></label>
                                            <div class="email">
                                                <input type="text"  name="email" placeholder="E-mail " value="{{old('email')}}" class="input--wd input--wd--full"></div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Company<span class="required">*</span></label>
                                            <div class="company">
                                               <input type="text"  name="company" placeholder="Company" value="{{old('company')}}" class="input--wd input--wd--full">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Country <span class="required">*</span></label>
                                            <select class="input--wd input--wd--full col-md-7 col-xs-12 country" name="country_id" id="country">
                                                    <option value="0">Select Country</option>
                                                    @foreach($countries as $c)
                                                        <option value="{{$c->country_id}}" >{{$c->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Address  <span class="required"></span></label>
                                            <div class="address_1">
                                               <input type="text"  name="address_1" value="{{old('address_1')}}" class="input--wd input--wd--full">
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6 form-group">
                                            <label>State <span class="required">*</span></label>
                                            <select name="state_id" id="state" class="input--wd input--wd--full state"></select>
                                        </div> --}}
                                        <div class="col-sm-6 form-group">
                                            <label>Address Detail<span class="required"></span></label>
                                            <div class="address_2">
                                               <input type="text"  name="address_2" value="{{old('address_2')}}" class="input--wd input--wd--full">
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6 form-group">
                                            <label>City <span class="required">*</span></label>
                                            <select class="input--wd input--wd--full col-md-7 col-xs-12 city" name="city_id" id="city">
                                            </select>       
                                        </div> --}}
                                        <div class="col-sm-6 form-group">
                                            <label>Phone <span class="required">*</span></label>
                                            <div class="telephone">
                                               <input type="text"  name="telephone" placeholder="Telephone" value="{{old('telephone')}}" class="input--wd input--wd--full">
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6 form-group">
                                          <label>Location <span class="required">*</span></label>
                                          <select class="input--wd input--wd--full col-md-7 col-xs-12 area" name="area_id" id="area">
                                          </select>  
                                        </div>
                                        <div class="col-sm-6 form-group">
                                          <label>Fax </label>
                                          <input type="text"  name="fax" placeholder="Fax" value="{{old('fax')}}" class="input--wd input--wd--full">    
                                        </div> --}}
                                      </div>
                                  
                                    </div>
                              </div>
                          </section>
                      </div>

                      <div class="reg-wiz-tab-panel  category-outer" id='rwtp2'  style='display:none;'>
                          <div class="products-order checkout payment-method">
                             <div class="row">
                                <div class="col-xs-12">
                                   <h6 class="panel-title row text-uppercase"> <a role="button" data-toggle="collapse" href="#collapseOne"><strong>Payment Method</strong></a> 
                                   </h6>
                                   <div id="payment-methods" role="tablist" aria-multiselectable="true">
                                      <div class="panel radio">
                                         <input type="radio" name="payment_method" value="Cash On Delivery" id="radio-payment-1" checked="">
                                         <label for="radio-payment-1" data-toggle="collapse" data-target="#parent-1" data-parent="#payment-methods" aria-controls="parent-1" aria-expanded="true" class="">Cash On Delivery<span>free</span></label>
                                         <label>(Pay cash at your doorstep at the time of order delivery)</label>
                                         <div id="parent-1" class="panel-collapse collapse in" role="tabpanel"></div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                      </div>
                      <div class="reg-wiz-tab-panel  category-outer" id='rwtp3'  style='display:none;'>
                        <div class="table-responsive" style="border-bottom:1px solid #e0e0e0;margin-bottom:25px">
                           <table style="width:100%">
                              <tbody>
                                @foreach(Cart::content() as $row)
                                 <tr class="first-tr">
                                    <td class="first-td">
                                       <img style="width:100px" src="{{asset($row->options->image)}}" alt=""/>
                                    </td>
                                    <td class="first-td">
                                       <table>
                                          <tr>
                                             <td>
                                                <h6 class="panel-title row text-uppercase"> <a role="button" data-toggle="collapse" href="#collapseOne"><strong>{{$row->name}}</strong></a> </h6>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                {{$row->description}}
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="clearfix">
                                                   <div class="pull-left" style="padding-top:15px;">
                                                      {{-- <button class="btn btn--wd" style="margin-right:15px;">Move to wish list</button> --}}
                                                      <button class="btn btn--wd">Remove</button>
                                                   </div>
                                                </div>
                                             </td>
                                          </tr>
                                       </table>
                                    </td>
                                    <td class="first-td">
                                       <div class="input-group-qty clearfix"> <span class="pull-left"> </span>
                                          <input type="text" name="quant[1]" class="input-number input--wd input-qty pull-left" value="1" min="1" max="100">
                                          <span class="pull-left btn-number-container">
                                          <button type="button" class="btn btn-number btn-number--plus" data-type="plus" data-field="quant[1]"> + </button>
                                          <button type="button" class="btn btn-number btn-number--minus" data-type="minus" data-field="quant[1]"> – </button>
                                          </span> 
                                       </div>
                                       <div>
                                          <h4 style="padding-top:15px;"><a><strong>Rs {{$row->price}}</strong></a></h4>
                                       </div>
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                        <div class="clearfix">
                           <table class="total-cost-table pull-right banner" style="width:400px">
                              <tr>
                                 <td>Total</td>
                                 <td class="text-right">{{Cart::subtotal()}}</td>
                              </tr>
                              <tr>
                                 <td>Discount</td>
                                 <td class="text-right">--</td>
                              </tr>
                              <tr>
                                 <td>Tax</td>
                                 <td class="text-right">--</td>
                              </tr>
                              <tr>
                                 <td>Shipping</td>
                                 <td class="text-right">--</td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="border-bottom:1px solid #e0e0e0;width:100%"></td>
                              </tr>
                              <tr>
                                 <td style="padding:15px 15px 1px;font-size:18px"><b>Net Total</b></td>
                                 <td class="text-right" style="padding:8px;font-size:18px"><b>Rs {{Cart::subtotal()}}</b></td>
                              </tr>
                              <tr>
                                 <td colspan="2">
                                    <div class="text-center" style="padding:15px;">
                                       <button class="btn btn--wd" style="margin-right:15px;height: 34px;font-size: 14px;line-height: 0px;">Continue Shopping</button>
                                       <button type="submit" class="btn btn--wd" style="height: 34px;font-size: 14px;line-height: 0px;" onclick="myFunction()">Confirm</button>
                                    </div>
                                 </td>
                              </tr>
                           </table>
                        </div>
                      </div>
                      </form>

                      <section class="reg-wiz-footer">
                        <div class="reg-wiz-navigator" style="text-align: center; margin-bottom: 40px;">
                          <button class="btn btn--wd" style="margin-right:15px;" id='nxt'>Next <i class="icon icon-arrow-right"></i></button>
                          <button class="btn btn--wd" id='prv'> <i class="icon icon-arrow-left"></i> Previous</button>

                        </div>
                        <div class="reg-wiz-footer-nav"></div>
                      </section>
                </div>
              </div>
            </section>
                        
                     
               
            <!-- End Content section --> 
            <!-- End Content section --> 
         </div>
  </div>


  
      <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                           
                          </div>
                          <div class="modal-body">
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" method="post" action="{{route('singin')}}">
                        {{csrf_field()}}
                            <h3>Sign In</h3>
                            <div class="form-group">
                                <label>Email<span class="required">*</span></label>
                                <input type="text" id="modal_email" name="email" value="{{old('email')}}" class="form-control col-md-7 col-xs-12" placeholder="E-Mail">
                            </div>
                            <div class="form-group">
                                <label>Password<span class="required">*</span></label>
                                <input type="password" id="modal_password" name="password" value="{{old('password')}}" class="form-control col-md-7 col-xs-12" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input type="checkbox" id="signin-remember">
                                    <label for="signin-remember">Remember me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block modalSubmit">Submit</button>
                        </form>
                          </div>
                        </div>

                      </div>
                    </div>
  @endsection
      @section('pageScript')
      <!-- jQuery Smart Wizard -->
      <script type="text/javascript" src="{{ asset('assets/home/js/jquery.smartWizard.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
      
      <!-- Custom for wizard -->
      <script src="{{ asset('assets/home/js/main.js') }}"></script>
      <script type="text/javascript">
        function myFunction() {
            document.getElementById("myForm").submit();
        } 
      </script>
      <script>
       //Analytics tracking
        
        
       $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
      });
    </script>

    <script type="text/javascript">
        $(".modalSubmit").on("click", function(res){
                res.preventDefault();
                var email = $('#modal_email').val();
                var password = $('#modal_password').val();
                var token = $(this).data('token');
                $.ajax({
                type: 'GET',
                url: '{{route('checkout-sigin')}}',
                data:{
                        "_token": token,
                        "email":email,
                        "password":password,
                        },
            }).done(function (response) {
                if (response == "false")
                  {
                    var error= '<div class="alert alert-danger alert-dismissible fade in" id="modalError" role="alert">'+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
                            '<strong>OOPS! You might have missed to fill some required fields. Please check the errors.  <strong>'+'<ul>'+
                                        '<li> Please Check Your Credentials</li>'+
                                '</ul>'+
                                '</div>';

                    $('#modalError').html(error);
                  }
                if(response == "true")
                {
                  window.location.reload();

                }
              });
            })
    </script>


    {{--Js to Auto Select Customer Detail to table ends--}}
    <script type="text/javascript">

        $("#addressSelect").on('click', function () {
            // alert('hello this is test');
           var addressId = $("#addressSelect option:selected").val();
           var dataString = 'addressId=' + addressId;
           $.ajax({
                type: 'GET',
                url: '{{route('customer.customerdetail.ajax')}}',
                data: dataString
            }).done(function (response) {
                var firstname='<input type="text" id="tag" name="firstname" placeholder="First Name" value="'+response.firstname+'" class="form-control col-md-6 col-xs-12">';
                var lastname='<input type="text" id="tag" name="lastname" placeholder="Last Name" value="'+response.lastname+'" class="form-control col-md-6 col-xs-12">';
                var email='<input type="text" id="tag" name="email" placeholder="Email" value="'+response.customer.email+'" class="form-control col-md-6 col-xs-12">';
                var telephone='<input type="text" id="tag" name="telephone" placeholder="Telephone" value="'+response.telephone+'" class="form-control col-md-6 col-xs-12">';
                var country='<option value="'+response.country_id+'">'+response.country.name+'</option>';
                var state='<option value="'+response.state_id+'">'+response.state.name+'</option>';
                var city='<option value="'+response.city_id+'">'+response.city.name+'</option>';
                var area='<option value="'+response.area_id+'">'+response.area.name+'</option>';
                var address_1='<input type="text" id="tag" name="address_1" placeholder="address_1" value="'+response.address_1+'" class="form-control col-md-6 col-xs-12">';
                var address_2='<input type="text" id="tag" name="address_2" placeholder="Address 2" value="'+response.address_2+'" class="form-control col-md-6 col-xs-12">';
                var company='<input type="text" id="tag" name="company" placeholder="Address 2" value="'+response.company+'" class="form-control col-md-6 col-xs-12">';

                $('.firstname').html(firstname);
                $('.lastname').html(lastname);
                $('.email').html(email);
                $('.telephone').html(telephone);
                $('.country').html(country);
                $('.state').html(state);
                $('.city').html(city);
                $('.area').html(area);                
                $('.address_1').html(address_1);
                $('.address_2').html(address_2);
                $('.company').html(company);

            });
       });


        $("#shippingAddress").on('click', function () {
           var addressId = $("#shippingAddress option:selected").val();
           var dataString = 'addressId=' + addressId;
           $.ajax({
                type: 'GET',
                url: '{{route('customer.customerdetail.ajax')}}',
                data: dataString
            }).done(function (response) {
                var firstname='<input type="text" id="tag" name="shipping_firstname" placeholder="First Name" value="'+response.firstname+'" class="form-control col-md-6 col-xs-12">';
                var lastname='<input type="text" id="tag" name="shipping_lastname" placeholder="Last Name" value="'+response.lastname+'" class="form-control col-md-6 col-xs-12">';
                var country1='<option value="'+response.country_id+'">'+response.country.name+'</option>';
                var state1='<option value="'+response.state_id+'">'+response.state.name+'</option>';
                var city1='<option value="'+response.city_id+'">'+response.city.name+'</option>';
                var area1='<option value="'+response.area_id+'">'+response.area.name+'</option>';
                var address_1='<input type="text" id="tag" name="shipping_address_1" placeholder="address_1" value="'+response.address_1+'" class="form-control col-md-6 col-xs-12">';
                var address_2='<input type="text" id="tag" name="shipping_address_2" placeholder="Address 2" value="'+response.address_2+'" class="form-control col-md-6 col-xs-12">';
                var company='<input type="text" id="tag" name="shipping_company" placeholder="Address 2" value="'+response.company+'" class="form-control col-md-6 col-xs-12">';

                $('#firstname').html(firstname);
                $('#lastname').html(lastname);
                $('#country1').html(country1);
                $('#state1').html(state1);
                $('#city1').html(city1);
                $('#area1').html(area1);                
                $('#address_1').html(address_1);
                $('#address_2').html(address_2);
                $('#company').html(company);

            });
       });


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


         $('#country1').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/states', function(cities)
            {
                var $state = $('#state1');

                $state.find('option').remove().end();

                $.each(cities, function(index, city) {
                    $state.append('<option value="' + city.state_id + '">' + city.name + '</option>');
                });
            });
        });

        $('#state1').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/cities', function(cities)
            {
                var $city = $('#city1');

                $city.find('option').remove().end();

                $.each(cities, function(index, city) {
                    $city.append('<option value="' + city.city_id + '">' + city.name + '</option>');
                });
            });
        });

        $('#city1').change(function()
        {
            $.get('{{ url('admin/information') }}/' + this.value + '/areas', function(areas)
            {
                var $area = $('#area1');

                $area.find('option').remove().end();

                $.each(areas, function(index, area) {
                    $area.append('<option value="' + area.area_id + '">' + area.name + '</option>');
                });
            });
        });
    </script>
    {{--Js to Auto Select Customer Detail to table ends--}}
    @endsection