
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Shipping</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div style="page-break-after: always;">
    <h1>Dispatch Note #{{$order->order_id}}</h1>
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
            <strong>{{$store->store_name}}</strong><br />
            {{$order->payment_address_1}} </address>
            <b>Telephone</b> {{$order->telephone}}<br />
            <b>E-Mail</b> {{$order->email}}<br />
            <b>Web Site:</b> <a href="http://suvalaav.com">suvalaav.com</a></td>
          <td style="width: 50%;"><b>Date Added</b> {{$order->created_at}} <br />
            @if($order->invoice_no!=0)
            <b>Invoice No.:</b> {{$order->invoice_prefix}}{{$order->invoice_no}}<br />
            @endif
            <b>Order ID:</b>#{{$order->order_id}}<br />
            <b>Shipping Method</b> {{$order->shipping_method}}<br />
          </td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td style="width: 50%;"><b>Shipping Address</b></td>
          <td style="width: 50%;"><b>Contact</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
              {{$order->shipping_firstname  }}{{$order->shipping_lastname}}
              <br />{{$order->shippingArea->name}}
              <br />{{$order->shippingCity->name}}
              <br />{{$order->shippingState->name}}
              <br />{{$order->shippingCountry->name}}
          </td>
          <td>{{$order->email}}
          <br/>{{$order->telephone}}</td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td><b>Location</b></td>
          <td><b>Reference</b></td>
          <td><b>Product</b></td>
          <td><b>Model</b></td>
          <td class="text-right"><b>Quantity</b></td>
        </tr>
      </thead>
      <tbody>
      @if(!$cartItems->isEmpty())
            @foreach($cartItems as $ci)
          <tr>
            <td></td>
            <td></td>
            <td>{{$ci->name}}</td>
            <td>{{$ci->options->model}}</td>
            <td class="text-right">{{$ci->qty}}</td>
          </tr>
      @endforeach

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
