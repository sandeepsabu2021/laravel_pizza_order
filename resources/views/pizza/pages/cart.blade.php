@extends('pizza.master')
@php
$cart = session('cart');
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".delcart").click(function() {
            console.log("Working")
            var id = $(this).attr('pid')
            console.log(id)
            $.ajax({
                url: "{{url('delcart')}}",
                method: 'delete',
                data: {
                    _token: '{{csrf_token()}}',
                    id: id,
                },
                success: function(response) {
                    console.log(response)
                    window.location.reload();
                }
            })

        })

    })
</script>
@section('content')
<section class="container my-2">
    <h2 class="mb-2 text-center">Cart</h2>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <!-- <th>Sr. No.</th> -->
                    <th class="col-sm-4">Name</th>
                    <th class="col-sm-3">Image</th>
                    <th class="col-sm-3">Price</th>
                    <th class="col-sm-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0
                @endphp
                @if($cart)
                @foreach($cart as $c)
                @foreach($menu as $m)
                @if($c == $m->id)
                <tr>
                    <td>{{$m->name}}</td>
                    <td><img src="{{$m->image}}" width="50px" height="50px"></td>
                    <td>Rs. {{$m->price}}</td>
                    <td class="text-center"><a href="javascript:void(0)" class="btn btn-danger text-white delcart" pid="{{$c}}">Remove</a></td>
                </tr>
                @php
                $total += $m->price;
                @endphp
                @endif
                @endforeach
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="4">No items added</td>
                </tr>
                @endif
                <tr class="bg-info">
                    <th colspan="2"></th>
                    <th class="text-white font_monda">Total: Rs. {{$total}}</th>
                    <th class=""><a href="payment/{{$total}}" class="btn btn-warning">Proceed to Pay</a></th>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@stop