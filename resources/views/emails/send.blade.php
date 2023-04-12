@include('home.includes.head')
<h1>{{$title}}</h1>
<p>{{$content}}</p>
<table class="table table-bordered">
          <thead>
            <tr>
              <td class="text-left">Product</td>
              <td class="text-right">Quantity</td>
              <td class="text-right">Unit Price</td>
              <td class="text-right">Total</td>
            </tr>
          </thead>
          <tbody>
          @foreach($rows as $row)
            <tr>
              <td class="text-left"><a href="">{{$row->name}}</a></td>
              <td class="text-right">{{$row->qty}}</td>
              <td class="text-right">{{$row->price}}</td>
              <td class="text-right">Rs{{ ($row->total-$row->tax) }}</td>
            </tr>
          @endforeach
          <tr>
              <td colspan="4" class="text-right">Sub-Total</td>
              <td class="text-right">{{Cart::subtotal()}}</td>
            </tr>
          <tr>
              <td colspan="4" class="text-right">Flat Shipping Rate</td>
              <td class="text-right">---</td>
          </tr>
          <tr>
              <td colspan="4" class="text-right">Total</td>
              <td class="text-right">{{Cart::subtotal()}}
          </td>
            </tr>

          </tbody>
        </table>
</body>
</html>


