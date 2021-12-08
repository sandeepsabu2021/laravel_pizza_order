@php
$user = session('user');
$cart = session('cart');
@endphp
<h2>Pizza Bay</h2>
<h3>Thankyou for ordering from us! Your order will be delivered soon by our delivery personnel.</h3>
<h4>Order Details</h4  >
<table border="1">
    <tbody>
        <tr>
            <td>Name:</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>Mobile:</td>
            <td>{{$user->mobile}}</td>
        </tr>
        <tr>
            <td>Address:</td>
            <td>{{$user->address}}</td>
        </tr>
        <tr>
            <td>Items:</td>

            <td>
                @foreach($cart as $c)
                @foreach($menu as $m)
                @if($c == $m->id)
                <p>{{$m->name}} - Rs. {{$m->price}}</p>
                @endif
                @endforeach
                @endforeach
            </td>
        </tr>
        <tr>
            <td>Total:</td>
            <td>Rs. {{$total}} ***Paid online***</td>
        </tr>
        <tr>
            <td>
                Card Detail:
            </td>
            <td>
                {{$card}}
            </td>
        </tr>
    </tbody>
</table>
<p>Thankyou once again!</p>
<p>Sandeep Sabu</p>
<strong>Pizza Bay, India</strong>