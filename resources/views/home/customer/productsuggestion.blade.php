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
                     <div class="x_title">
                        <h2><i class="fa fa-pencil">Note:</i> <small>Please suggest us about the product which are not in our store list...</small></h2>
                        <div class="clearfix"></div>
                        <hr>
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
                            @if(Session::has('success'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                            @endif  
                        
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" required="required" action="{{route('customer.product.suggestion')}}" method="post">
                            {{csrf_field()}}
                             <input type="hidden" name="customer_id" value="{{Auth::user()->customer_id}}">

                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Product Name<span class="required">*</span></label>
                                <div class="col-md-8 col-lg-6">
                                    <input type="text" name="product_name" value="{{old('product_name')}}" class="form-control col-md-7 col-xs-12" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Model<span class="required">*</span></label>
                                <div class="col-md-8 col-lg-6">
                                    <input type="text" name="model" value="{{old('model')}}" class="form-control col-md-7 col-xs-12" placeholder="Model">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Brand<span class="required">*</span></label>
                                <div class="col-md-8 col-lg-6">
                                    <input type="text" name="brand" value="{{old('brand')}}" class="form-control col-md-7 col-xs-12" placeholder="Brand Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Message<span class="required"></span></label>
                                <div class="col-md-8 col-lg-6">
                                    <textarea id="messageArea" name="message" rows="7" class="form-control ckeditor" placeholder="Write your message..">{{old('message')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9">
                                    <button type="submit" class="btn btn-primary">Add your suggestion</button>
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