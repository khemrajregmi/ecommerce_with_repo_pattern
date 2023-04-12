@extends('login.layouts.master')
@section('content')
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
<div class="login-bg">
    <h1>Admin Login</h1>
        <div class="login_wrapper">

            <div class="animate form login_form">
                <section class="login_content">
                     <img src="{{ asset('assets/admin/images/logo.png')}}"> 
                    <form method="post" action="{{route('login')}}">
                        {{csrf_field()}}
                       
                        
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>OOPS! You might have missed something. Please check the errors.  <strong>

                                        <ul>
                                            @foreach ($errors->all() as $error)
                                               <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>

                            </div>
                        @endif
                        <div>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}"  />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password"  />
                        </div>
                        <div>
                            <input type="submit" value="login">
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div>
                                {{-- <h1><img src="{{asset('assets/home/images/kerung.png')}}" alt="kerung" width="240px" /> </a> </h1> --}}
                                <p>© {{date('Y')}} All Rights Reserved. </p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        </div>
    </div>
@endsection