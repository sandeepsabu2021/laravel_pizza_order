@extends('pizza.master')
@php

@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var cart = '';
        $(".cart").click(function() {
            $(this).html("Added");
            $(this).removeClass("cart")
            $(this).removeClass("btn-primary")
            $(this).addClass("btn-warning")
            var id = $(this).attr('pid')
            cart += id

            $.ajax({
                url: "{{url('addcart')}}",
                method: 'post',
                data: {
                    _token: '{{csrf_token()}}',
                    cart: cart,
                },
                success: function(response) {
                    $('#nav').load(location.href +  ' #nav');
                    console.log(response)
                    // window.location.reload();
                }
            })

        })

    })
</script>
@section('content')
<section class="container my-2">
<h2 class="mb-2 text-center">Menu</h2>
    <div class="row">
        @foreach($menu as $m)
        <div class="card col-sm-3 text-center my-2 mx-auto" style="width: 18rem;">
            <img class="card-img-top" src="{{$m->image}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$m->name}}</h5>
                <p class="card-text">{{$m->description}}</p>
            </div>
            <div>
                <h4 class="text-danger font_monda">Rs. {{$m->price}}</h4>
                <a href="javascript:void(0)" pid="{{$m->id}}" class="btn btn-primary mt-1 mb-2 cart">Add to Cart</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@stop