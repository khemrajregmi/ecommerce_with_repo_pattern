@extends('home.layouts.master')
	@section('content')
        <!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>My Account</h2>
                    <p>Personal Infromation</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="{{route(' ')}}">Home</a></li>
                        <li><a href="{{route('customer.dashboard')}}">My Account</a></li>
                        <li class="active">Personal Infromation</li>
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
                    	   
                            <div class="account-profile-top">
                                @if((Auth::user()->image)!=='')
                                <div>
                                    <img  src="{{asset('')}}uploads/customer_image/<?php echo Auth::user()->image ; ?>" alt="" style="height: 90px;">
                                </div>
                                @else
                                    <div>
                                    <img  src="{{asset('')}}uploads/customer_image/defaultimage.png" alt="" style="height: 90px;">
                                </div>
                                @endif
                                <div><h3>{{Auth::user()->firstname}}  {{Auth::user()->lastname}} <small>{{Auth::user()->email}}</small></h3></div>
                                
                                
                            </div>
                        
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" action="{{route('customer.changepass')}}" method="post">
                            {{csrf_field()}}
                             <input type="hidden" name="customer_id" value="{{Auth::user()->customer_id}}">

                            
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Old Password<span class="required">*</span></label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" name="old_password" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">New Password<span class="required">*</span></label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" name="password" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Confirm New Password<span class="required">*</span></label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" name="password_confirm" class="form-control" placeholder="">
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