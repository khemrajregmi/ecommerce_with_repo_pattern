@extends('admin.layouts.master')
@section('pageCss')
<!-- Datatables -->
<link href="{{asset('assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet')}}">
<link href="{{asset('assets/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/admin/js/colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css"/>
<!-- Select2 -->
<link href="{{asset('assets/admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">

<!-- PNotify -->
<link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin//vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
@endsection('pageCss')
@section('content')
<div id="content">
  @if (Session::has('notifier.notice'))
                <script>
                    new PNotify({!! Session::get('notifier.notice') !!});
                </script>
            @endif
  <div class="x_title">
    <h2>Orders <small> Invoice</small></h2>
    <div class="pull-right">
      <a href="{{route('admin.order.printinvoice',$order->order_id)}}" target="_blank" data-toggle="tooltip" title="Print Invoice" class="btn btn-info"><i class="fa fa-print"></i></a>
      <a href="{{route('admin.order.printshippinglist',$order->order_id)}}" target="_blank" data-toggle="tooltip" title="Print Shipping List" class="btn btn-info"><i class="fa fa-truck"></i></a> 
      <a href="{{route('admin.order.edit',$order->order_id)}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a> 
      <a href="{{route('admin.order.index')}}" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
    </div>
    <div class="clearfix"></div>
  </div> 
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Order Details</h3>
          </div>
          <table class="table">
            <tbody>
              <tr>
                <td style="width: 1%;"><button data-toggle="tooltip" title="Store" class="btn btn-info btn-xs"><i class="fa fa-shopping-cart fa-fw"></i></button></td>
                <td><a href="#" target="_blank">{{$store->store_name}}</a></td>
              </tr>
              <tr>
                <td><button data-toggle="tooltip" title="Date Added" class="btn btn-info btn-xs"><i class="fa fa-calendar fa-fw"></i></button></td>
                <td>{{$order->created_at}}</td>
              </tr>
              <tr>
                <td><button data-toggle="tooltip" title="Payment Method" class="btn btn-info btn-xs"><i class="fa fa-credit-card fa-fw"></i></button></td>
                <td>{{$order->payment_method}}</td>
              </tr>
              <tr>
                <td><button data-toggle="tooltip" title="Shipping Method" class="btn btn-info btn-xs"><i class="fa fa-truck fa-fw"></i></button></td>
                <td>{{$order->shipping_method}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"></i> Customer Details</h3>
          </div>
          <table class="table">
            <tr>
              <td style="width: 1%;"><button data-toggle="tooltip" title="Customer" class="btn btn-info btn-xs"><i class="fa fa-user fa-fw"></i></button></td>
              <td>                <a href="" target="_blank">{{$order->customer->firstname  }}    {{$order->customer->lastname}}</a>
              </td>
            </tr>
            <tr>
              <td><button data-toggle="tooltip" title="Customer Group" class="btn btn-info btn-xs"><i class="fa fa-group fa-fw"></i></button></td>
              <td>{{$order->customerGroup->name}}</td>
            </tr>
            <tr>
              <td><button data-toggle="tooltip" title="E-Mail" class="btn btn-info btn-xs"><i class="fa fa-envelope-o fa-fw"></i></button></td>
              <td><a href="mailto:{{$order->email}}">{{$order->email}}</a></td>
            </tr>
            <tr>
              <td><button data-toggle="tooltip" title="Telephone" class="btn btn-info btn-xs"><i class="fa fa-phone fa-fw"></i></button></td>
              <td>{{$order->telephone}}</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-cog"></i> Options</h3>
          </div>
          <table class="table">
            <tbody>
              <tr class="invoice">
                @if($order->invoice_no==0)
                <td>Invoice</td>
                <td id="invoice" class="text-right"></td>
                <td style="width: 1%;" class="text-center"><button id="button-invoice" data-loading-text="Loading..." data-orderID="{{$order->order_id}}" data-token="{{csrf_token()}}" data-toggle="tooltip" title="Generate" class="btn btn-success btn-xs"><i class="fa fa-cog"></i></button>
                </td>
                @else
                <td>Invoice</td>
                <td id="invoice" class="text-right">{{$order->invoice_prefix}}{{$order->invoice_no}}</td>
                <td style="width: 1%;" class="text-center"><button disabled="disabled" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i></button>
                </td>

                @endif
              </tr>
              <tr>
                <td>Reward Points</td>
                <td class="text-right">0</td>
                <td class="text-center">                  <button disabled="disabled" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></button>
                </td>
              </tr>
              <tr>
                <td>Affiliate                  </td>
                <td class="text-right">£0.00</td>
                <td class="text-center">                  <button disabled="disabled" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-info-circle"></i> Order (#{{$order->order_id}})</h3>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <td style="width: 50%;" class="text-left">Payment Address</td>
              <td style="width: 50%;" class="text-left">Shipping Address</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-left">{{$order->payment_firstname  }}{{$order->payment_lastname}}
                <br />{{$order->paymentArea->name}}
                <br />{{$order->paymentCity->name}}
                <br />{{$order->paymentState->name}}
                <br />{{$order->paymentCountry->name}}
              </td>
              <td class="text-left">
                {{$order->shipping_firstname  }}{{$order->shipping_lastname}}
                <br />{{$order->shippingArea->name}}
                <br />{{$order->shippingCity->name}}
                <br />{{$order->shippingState->name}}
                <br />{{$order->shippingCountry->name}}
              </td>
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered product-table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Model</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @if(!$cartItems->isEmpty())
            @foreach($cartItems as $ci)
            <tr class="products-{{$ci->id}}" data-product-Id="{{$ci->id}}"
              data-row-id="{{$ci->rowId}}">
              <td>{{$ci->name}}</td>
              <td>{{$ci->options->model}}</td>
              <td>{{$ci->qty}}</td>
              <td>{{$ci->price}}</td>
              <td>{{$ci->subtotal}}</td>

            </tr>
            @endforeach
            <tr>
              <td colspan="4" class="text-right">Sub-Total</td>
              <td class="text-center">{{$cartSubtotal}}</td>
            </tr>
            <tr>
              <td colspan="4" class="text-right">Total</td>
              <td class="text-center">{{$cartTotal}}</td>
              <input type="hidden" id="tag" name="total" placeholder="Coupon"
              value="{{$cartTotal}}" class="form-control col-md-6 col-xs-12">
            </tr>


            @else
            <tr id="no-results">
              <td colspan="6" class="text-center"> No results!</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-comment-o"></i> Order History</h3>
      </div>
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-history" data-toggle="tab">History</a></li>
          <li><a href="#tab-additional" data-toggle="tab">Additional</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-history">
            <div id="history"></div>
            <br />
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
              <thead>
                <tr>
                  <th>Date Added</th>
                  <th>Comment</th>
                  <th>Status</th>
                  <th>Customer Notified</th>

                </tr>
              </thead>
              <tbody>
                @foreach($orderhistory as $oh)
                <tr>
                  <td>{{$oh->updated_at}}</td>
                  <td> {{$oh->comment}} </td>
                  <td>{{$oh->orderStatus}} </td>
                  <td>
                    <?php
                    if($oh->notify==1)
                      echo "Yes";
                    else
                      echo "No";
                    ?> 
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <fieldset>
              <legend>Add Order History</legend>
              <form id="myForm" class="form-horizontal form-label-left" method="post" action="{{route('admin.order.history')}}">
                {{csrf_field()}}
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-order-status">Order Status</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="order_id" value="{{$order->order_id}}">
                    <select class="form-control col-md-6 col-xs-12" name="order_status_id">
                      @foreach($orderstatus as $os)
                      <option value="{{$os->order_status_id}}">{{$os->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-override"><span data-toggle="tooltip" title="If the customers order is being blocked from changing the order status due to an anti-fraud extension enable override.">Override</span></label>
                  <div class="col-sm-10">
                    <input type="checkbox" name="override" value="1" id="input-override" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-notify">Notify Customer</label>
                  <div class="col-sm-10">
                    <input type="checkbox" name="notify" value="1" id="input-notify" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-comment">Comment</label>
                  <div class="col-sm-10">
                    <textarea name="comment" rows="8" id="input-comment" class="form-control"></textarea>
                  </div>
                </div>
              </form>
            </fieldset>
            <div class="text-right">
              <button id="history_add" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add History</button>
            </div>
          </div>
          <div class="tab-pane" id="tab-additional">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td colspan="2">Browser</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>IP Address</td>
                    <td>{{$order->ip}}</td>
                  </tr>
                  <tr>
                    <td>User Agent</td>
                    <td>{{$order->user_agent}}</td>
                  </tr>
                  <tr>
                    <td>Accept Language</td>
                    <td>en-US</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection('content')

  @section('pageScript')
  <!-- iCheck -->
  <script src="{{asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Datatables -->
  <script src="{{asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"></script>
  <!-- Datatables -->

   <!-- PNotify -->
    <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
    @include('laravelPnotify::notify')
  <script>
    $(document).ready(function() {


      $('#datatable').dataTable();

      $('#datatable-keytable').DataTable({
        keys: true
      });

      $('#datatable-responsive').DataTable();

      $('#datatable-fixed-header').DataTable({
        fixedHeader: true
      });

      var $datatable = $('.datatable');

      $datatable.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
        { orderable: false, targets: [0] }
        ]
      });
      $datatable.on('draw.dt', function() {
        $('input').iCheck({
          checkboxClass: 'icheckbox_flat-green'
        });
      });

    });
  </script>

  <script type="text/javascript">
  $("#history_add").click(function () {
       $('form#myForm').submit();
  });

  $("#button-invoice").click(function () {
      var orderId = $(this).data('orderid');
      var Url = "{{route('admin.createinvoice.ajax')}}";
      var token = $(this).data('token');

      /**Get Data ***/
                    $.ajax({
                        type: "GET",
                        url: Url,
                        data:{
                            "_token": token,
                            "orderId":orderId,
                        },
                        success: function(data){
                            var invoice_item="";
                                invoice_item +="<td>Invoice</td>"
                                invoice_item += "<td id='invoice' class='text-right'>"+data.invoice_prefix+data.invoice_no+"</td>";
                                invoice_item += "  <td style='width: 1%;' class='text-center'><button disabled='disabled' class='btn btn-success btn-xs'><i class='fa fa-refresh'></i></button></td>";
                            $(".invoice").html(invoice_item);                            
                        }
                       
                    });

                    /** End Data **/
  });
  </script>
  @endsection('pageScript')