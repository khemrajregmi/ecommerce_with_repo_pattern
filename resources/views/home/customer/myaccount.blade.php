@extends('home.layouts.homepagemaster')
    @section('pageCss')
        <link href="{{ asset('assets/home/css/account.css') }}" rel="stylesheet" type="text/css" >
    @stop
@section('content')
    <!-- Content section -->
     <section class="content content--parallax top-null banner-parallex" data-image="images/parallax-bg.jpg')}}" style="background-position: 50% 19px;">
      <div class="container">
        <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading-1">User Information</div>

            <!-- Breadcrumb section -->
        <div class="breadcrumbs">
           
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="">My Account</a></li>
                </ol>
           
        </div>
          
        </div>

      </div>

    </div>
      </div>
    </section>
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
                            <span class="pull-left">YOUR INFORMATION</span> 
                            <span class="pull-right user-info-edit" data-toggle="modal" data-target="#editUserInfo"><i class="fa fa-edit cursor-pointer" style="font-size:20px"></i></span>                          
                        </h4>
                      </div>
                      <div class="user-info-wrapper">
                        <div class="clearfix margin-bottom-10 border-bottom">
                          <label class="pull-left">Name</label>
                          <div class="pull-left">{{Auth::user()->firstname }}  {{Auth::user()->lastname }}</div>
                        </div>
                        <div class="clearfix margin-bottom-10 border-bottom">
                          <label class="pull-left">Email</label>
                          <div class="pull-left">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="clearfix margin-bottom-10 border-bottom">
                          <label class="pull-left">Phone no.</label>
                          <div class="pull-left">{{ Auth::user()->telephone }}</div>
                        </div>
                      </div>

                    <!-- Modal -->
                    <div id="editUserInfo" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit User Information</h4>
                          </div>
                          <div class="modal-body">
                              <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" action="" method="post">
                                        {{csrf_field()}}

                                <div class="form-group">
                                    <label class="col-md-3">First Name<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input class="form-control" id="input_info-firstname" name="firstname" value="{{ Auth::user()->firstname }}" placeholder="Your First Name" type="text" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Last Name<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input class="form-control" id="input_info-lastname" name="lastname" value="{{ Auth::user()->lastname }}"  placeholder="Your Last Name" type="text" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Email<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input class="form-control" id="input_info-email" name="email"  value="{{ Auth::user()->email }}" placeholder="Your current email address" type="text" />
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="col-md-3">Gender</label>
                                    <div class="col-md-6">
                                        <label class="custom-radio margin-right-5"><input type="radio" name="gender" value="M" checked="checked" >Male</label>
                                        <label class="custom-radio"><input type="radio" name="gender" value="F">Female</label>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label class="col-md-3">Phone<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input class="form-control" id="input_info-telephone" name="telephone" value="{{ Auth::user()->telephone }}" placeholder="Your current phone number" type="text" />
                                    </div>
                                </div>  
                                {{-- <div class="form-group">
                                    <label class="col-md-3">Company</label>
                                    <div class="col-md-6">
                                        <input class="form-control" name="username" placeholder="Company" type="text" />
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">                            
                                        <button type="submit" class="btn btn--wd " id="updateInfo">Update</button>   
                                    </div>
                                </div>                      
                            </form>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- / Modal -->

                <div class="text-left"><a href="#" class="btn btn--wd text-uppercase wave" data-toggle="modal" data-target="#editUserInfo">Edit INFORMATION</a></div>

                  </div>
                </div>

              </div>
           </div>
        </section>
    <!-- End Content section --> 
@stop

@section('pageScript')

  <script type="text/javascript">
    $("#updateInfo").on("click", function (res) {
                  res.preventDefault();
                  alert('helloooo');
                  var firstname = $('#input_info-firstname').val();
                  var lastname = $('#input_info-lastname').val();
                  var email = $('#input_info-email').val();
                  var telephone =  $('#input_info-telephone').val();
                  var Url = "{{route('customer.update')}}";
                  var token ="{{csrf_token()}}";

                  // console.log(firstname);
                  // console.log(lastname);
                  // console.log(email);
                  // console.log(telephone);

                  /**Get Data ***/
                          $.ajax({
                              type: "POST",
                              url: Url,
                              data:{
                                  "_token": token,
                                  "firstname":firstname,
                                  "lastname":lastname,
                                  "email":email,
                                  "telephone":telephone,
                              },
                              beforeSend: function() { $('#response').show(); },
                              success: function(data){
                                 // console.log(data.message);
                                 if(data.message=='success') {
                                  iziToast.success({
                                      title: 'OK',
                                      message: 'Your Information Updated Sucessfully ...',
                                      position: 'topRight',
                                  });
                                  setTimeout(function(){// wait for 5 secs(2)
                                      location.reload(); // then reload the page.(3)
                                  }, 2000);
                                 }
                                 if(data.error)
                                 {
                                  for (i in data.error){
                                              $('.text-danger').hide();
                                          }
                                  // console.log(data);
                                  for (i in data.error){
                                      var element = $('#input_info-' + i);
                                      $(element).parent().addClass('has-error');
                                      $(element).after('<div class="text-danger">' + data.error[i] + '</div>');
                                  }
                                 }
                                  
                                  
                              }
                             
                          });

                          /** End Data **/
              });

  </script>
@stop
	