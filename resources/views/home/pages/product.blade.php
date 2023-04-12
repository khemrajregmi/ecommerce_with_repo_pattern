@extends('home.layouts.homepagemaster')
  @section('pageCss')
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
         
              <div class="row">
                <div class="col-md-12">
                 <h1>Products</h1>

                    <!-- Breadcrumb section -->
                <div class="breadcrumbs">
                 
                        <ol class="breadcrumb">
                            <li><a href="{{route(' ')}}">Home</a></li>
                            <li class="active"><a href="">Products</a></li>
                        </ol>
                   
                </div>
                  
                </div>

              </div>

        </div>
      </section>
<div class="product-bg">
<section class="content">
      <div class="container">
        <div class="row product-info-outer">
          <div class="col-sm-4 col-md-4 col-lg-5 hidden-xs">
            <div class="product-main-image">
              <div class="product-main-image__item"><img class="product-zoom" src="{{ asset('assets/home/images/products/Snow Kissed.jpg')}}" data-zoom-image="{{ asset('assets/home/images/products/Snow Kissed.jpg')}}" alt="Snow Kissed"></div>
              <div class="product-main-image__zoom"></div>
            </div>
          
          </div>
          <div class="product-info col-sm-8 col-md-4 col-lg-4">
            <div class="product-info__title">
              <h2>White Forest</h2>
              <div class="rating product-info__rating visible-xs"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
            </div>
            <div class="product-info__sku pull-right">SKU: 00065 &nbsp;&nbsp;<span class="label label-success">IN STOCK</span></div>

            <ul id="singleGallery" class="visible-xs slick-initialized slick-slider" style="">
              
              
              
              
              
            <ul class="slick-dots" style="display: block;"><li class="slick-active" aria-hidden="false"><button type="button" data-role="none">1</button></li><li aria-hidden="true"><button type="button" data-role="none">2</button></li><li aria-hidden="true"><button type="button" data-role="none">3</button></li><li aria-hidden="true"><button type="button" data-role="none">4</button></li><li aria-hidden="true"><button type="button" data-role="none">5</button></li></ul></ul>
            <div class="price-box product-info__price"><span class="price-box__new">$65.00</span> <span class="price-box__old">$84.00</span></div>
            <div class="rating product-info__rating hidden-xs"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
            <div class="divider divider--xs product-info__divider"></div>
          
            <div class="row">
              <div class="col-xs-12">
                <label>Choose an Occasion:</label>
                <select class="selectpicker bs-select-hidden" data-style="select--wd" data-width="100%">
                   <option>Happy Birthday</option>
                  <option>Thank You</option>
                  <option>Father's Day</option>
                  <option>Mother's Day</option>
                  <option>Friendship Day</option>
                  <option>Happy Anniversary</option>
                  <option>Thinking of You</option>
                  <option>I'm sorry</option>
                  <option>Thinking of You</option>
                </select>
              </div>

              <div class="col-xs-12 spacings">
                <label>Choose Delivery Date:</label>
              <input type="text" name="email" value="" class="input--wd input--wd--full" autocomplete="off">
              </div>
              
            </div>
            <div class="divider divider--sm"></div>
            <label>Quantity:</label>
            <div class="outer">
              <div class="input-group-qty pull-left"> <span class="pull-left"> </span>
                <input type="text" name="quant[1]" class="input-number input--wd input-qty pull-left" value="1" min="1" max="100">
                <span class="pull-left btn-number-container">
                <button type="button" class="btn btn-number btn-number--plus" data-type="plus" data-field="quant[1]"> + </button>
                <button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus" data-field="quant[1]"> – </button>
                </span> </div>
              <div class="pull-left">
                <button class="btn btn--wd text-uppercase">Add to Cart</button>
              </div>
              <div class="social-links social-links--colorize social-links--invert social-links--padding pull-right">
                <ul>
                  <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href="#" data-placement="top" data-toggle="tooltip" data-original-title="Share on facebook"></a></li>
                  <li class="social-links__item"><a class="icon icon-twitter tooltip-link" href="#" data-placement="top" data-toggle="tooltip" data-original-title="Share on twitter"></a></li>
                  <li class="social-links__item"><a class="icon icon-google tooltip-link" href="#" data-placement="top" data-toggle="tooltip" data-original-title="Share on google"></a></li>
                  <li class="social-links__item"><a class="icon icon-pinterest tooltip-link" href="#" data-placement="top" data-toggle="tooltip" data-original-title="Share on pinterest"></a></li>
                </ul>
              </div>
            </div>
            <div class="divider divider--xs"></div>
            <ul class="product-links product-links--inline">
              <li><a href="#"><span class="icon icon-bars"></span>Add to compare</a></li>
              <li><a href="#"><span class="icon icon-favorite"></span>Add to wishlist</a></li>
              <li><a href="#"><span class="icon icon-mail-fill"></span>Email to friend</a></li>
            </ul>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-3">
            <h4>Included with your gift:</h4>
            <div class="card">
              <div class="card__row">
                <img src="{{ asset('assets/home/images/greeting.jpg')}}" alt="gretting" class="img-responsive">

              </div>
              
               </div>
               <p> Free Personalized Greeting Card</p>
          </div>
        </div>
      </div>
    </section>
    </div>

    <section class=" content">
      <div class="container"> 
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs--wd" role="tablist">
          <li class="active"><a href="#Tab1" aria-controls="home" role="tab" data-toggle="tab" class="text-uppercase">DESCRIPTION</a></li>
          <li><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase">Reviews</a></li>
          
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content tab-content--wd">
          <div role="tabpanel" class="tab-pane active" id="Tab1">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, sollicitudin eu, vehicula venenatis, tempor vitae, est. Praesent vitae dui. Morbi id tellus. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi. Curabitur molestie euismod erat. Proin eros odio, mattis rutrum, pulvinar et, egestas vitae, magna. Integer semper, velit ut nisl. Nam lectus nulla, bibendum pretium, dictum a, mattis nec, dolor. Nullam id justo sed diam aliquam tincidunt. </p>
            <div class="divider divider--xs"></div>
            <table class="table table-params">
              <tbody>
                <tr>
                  <td class="text-right"><strong>PROOF</strong></td>
                  <td>PDF Proof</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>SAMPLES</strong></td>
                  <td>Digital, Printed</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>WRAPPING</strong></td>
                  <td>Yes,  No</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>UV GLOSS COATING</strong></td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>SHRINK WRAPPING</strong></td>
                  <td>No Shrink Wrapping, Shrink in 25s, Shrink in 50s, Shrink in 100s</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>WEIGHT</strong></td>
                  <td>0.05, 0.06, 0.07ess cards</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div role="tabpanel" class="tab-pane" id="Tab2">
            
            <h6><strong>WRITE YOUR OWN REVIEW</strong></h6>
           
            <div class="divider divider--xs"></div>
            <form action="#" class="contact-form">
              <label>Nickname<span class="required">*</span></label>
              <input type="text" class="input--wd input--wd--full">
              <label>Summary of Your Review<span class="required">*</span></label>
              <input type="text" class="input--wd input--wd--full">
              <label>Review<span class="required">*</span></label>
              <textarea class="textarea--wd input--wd--full"></textarea>
              <div class="divider divider--xs"></div>
              <button type="submit" class="btn btn--wd text-uppercase wave waves-effect">Submit Review</button>
            </form>
          </div>
         
     
        </div>
      </div>
    </section>

    

    </div>
  </div>
  @endsection
      @section('pageScript')
      <!-- jQuery Smart Wizard -->
      <script type="text/javascript" src="{{ asset('assets/home/js/jquery.smartWizard.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/home/js/analytics/google-analytics-helpers.js') }}"></script>
    @endsection