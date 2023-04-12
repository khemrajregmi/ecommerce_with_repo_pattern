<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Invoice</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<body>
<div class="container">
    <div style="page-break-after: always;">
    <h1>Invoice #{{$order->order_id}}</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td colspan="2">Order Details</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width: 50%;">
            <address>
              <strong>{{$store->store_name}}</strong>
              <br />
              {{$store->street}} 
            </address>
            <b>Telephone </b> {{$order->telephone}}<br />
            <b>E-Mail    </b> {{$order->email}}<br />
            <b>Web Site :</b> <a href="http://suvalaav.com">suvalaav.com</a></td>
          <td style="width: 50%;">
            <b>Date Added</b> {{$order->created_at}} <br />
            @if($order->invoice_no!=0)
            <b>Invoice No.:</b> {{$order->invoice_prefix}}{{$order->invoice_no}}<br />
            @endif
            <b>Order ID:</b>#{{$order->order_id}}<br />
            <b>Payment Method</b> {{$order->payment_method}}<br />
            <b>Shipping Method</b> {{$order->shipping_method}}<br />
          </td>
        </tr>
      </tbody>
    </table>
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
</body>
</html>