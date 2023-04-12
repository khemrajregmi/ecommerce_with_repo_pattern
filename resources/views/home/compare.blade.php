@extends('home.layouts.master')
	@section('content')
		 <!-- ==========================
        BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                   <h1>Compare</h21>
                    <p>Compare Products</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="{{route(' ')}}">Home</a></li>
                        <li class="active">Compare Products</li>
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
            
            <div class="account-content compare">
                

                <div class="table-responsive">
                    <table id="table-compare" class="table">
                        <thead>
                        <tr>
                            <th></th>

                            @foreach($products as $product)
                                 <th class="accept"><i class="fa fa-arrows btn btn-primary hidden-xs"></i><i class="fa fa-times btn btn-primary cancel" data-productid="{{$product->product_id}}" data-token="{{csrf_token()}}" ></i></th>
                            @endforeach
                               
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td class="title">Product</td>
                                 @foreach($products as $product)
                                <td><img src="{{ asset($product->image)}}" class="img-responsive center-block" alt=""><a href="single-product.html"></a></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="title">Brand</td>
                            @foreach($products as $product)
                            <td>Esprit</td>
                            @endforeach
                        </tr>
                        <!-- <tr>
                            <td class="title">Weight</td>
                            <td>0.60kg</td>
                        </tr> -->
                        <tr>
                            <td class="title">Model</td>
                            @foreach($products as $product)
                            <td>{{$product->model}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="title">Price</td>
                            @foreach($products as $product)
                            <td>Rs {{round($product->price, 2)}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="title">Rating</td>
                            @foreach($products as $product)
                            <td>
                                <div class="product-rating">
                                    @if(round($product->avgRating, 2)==0)
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    @elseif(round($product->avgRating, 2)==1)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    @elseif(round($product->avgRating, 2)==2)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    @elseif(round($product->avgRating, 2)==3)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    @elseif(round($product->avgRating, 2)==4)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    @elseif(round($product->avgRating, 2)==5)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    @endif
                                </div>
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="title"></td>
                            @foreach($products as $product)
                            <td><a class="btn btn-primary cart" data-productid="{{$product->product_id}}" data-token="{{csrf_token()}}" >Add to Cart</a></td>
                            @endforeach
                        </tr>
                       
                        </tbody>
                    </table>
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

        <script type="text/javascript">
             $(".cancel").on("click", function(res){
                res.preventDefault();
                product_id=$(this);
                id =product_id.attr('data-productid');

                    /**Get Data ***/
                    $.ajax({
                        type: "GET",
                        url: "deletecompare",
                        data:{
                            "_token":"{{csrf_token()}}",
                            "id":id,
                        },
                        success: function(data){
                            setTimeout(function(){// wait for 1 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 500);
                        }
                       
                    });

                    /** End Data **/
            });
        </script>

        <script type="text/javascript">
            
        </script>
    @endsection