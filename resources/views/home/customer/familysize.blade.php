@extends('home.layouts.master')
@section('pageCss')
    <!-- PNotify -->
    <link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin//vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
@endsection
	@section('content')
		    <!-- ==========================
        BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>My Account</h2>
                    <p>Family Size Wishlist</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="{{route(' ')}}">Home</a></li>
                        <li><a href="{{route('customer.dashboard')}}">My Account</a></li>
                        <li class="active">Wishlist</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========================
        BREADCRUMB - END 
    =========================== -->
    
    <!-- ==========================
        MY ACCOUNT - START 
    =========================== -->
    <section class="content account">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <aside class="sidebar">
                        
                       <!-- WIDGET:CATEGORIES - START -->
                        @include('home.includes.customernav')
                        <!-- WIDGET:CATEGORIES - END -->
                        
                    </aside>
                </div>
                <div class="col-sm-9">
                    <article class="account-content">
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
                            @if(Session::has('success'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                            @endif 

                            @if(Session::has('error'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}</p>
                            @endif 
                
                        
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" action="{{route('customer.familysize')}}" method="post">
                            {{csrf_field()}}
                             <input type="hidden" name="customer_id" value="{{Auth::user()->customer_id}}">

                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Your Family Size <span class="required">*</span></label>
                                <div class="col-md-8 col-lg-6">
                                    <select class="form-control" name="customer_family_type_id">
                                             @foreach($customerFamilySize as $familysize)
                                              <option value="{{$familysize->customer_family_type_id}}" >{{$familysize->type_name}}</option>
                                          @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Duration Subscription <span class="required">*</span></label>
                                <div class="col-md-8 col-lg-6">
                                    <select class="form-control" name="duration_id">
                                             @foreach($durations as $duration)
                                              <option value="{{$duration->duration_id}}" >{{$duration->name}}</option>
                                          @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                        
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========================
        MY ACCOUNT - END 
    =========================== -->
	@endsection

    @section('pageScript')
        <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/home/js/cart.js') }}"></script>

        <!-- PNotify -->
            <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.js')}}"></script>
            <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
            <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
            @include('laravelPnotify::notify')
          <!-- Datatables -->

        <script type="text/javascript">


             var id = '';
             var product_id = "";

             $(".cancel").on("click", function(res) {
                res.preventDefault();
                alert('Are you sure you want to remove form wishlist');
                var id = $(this).data('productid');
                var customerId = $(this).attr('data-customerId');
                var Url = "{{route('customer.removewishlist')}}";

                 /** Delete data ***/
                    $.ajax({
                        type: "GET",
                        url: Url,
                        data:{
                            "_token":"{{csrf_token()}}",
                            "id":id,
                            "customerId":customerId,
                        },
                        success: function(msg){
                            new PNotify({
                                title: 'Success',
                                text: 'Data Deleted Successfully. Loading ....',
                                hide: false,
                                type:'success',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 500);
                        }
                            
                    });
                });
        </script>
        <script type="text/javascript">
        </script>

    @endsection