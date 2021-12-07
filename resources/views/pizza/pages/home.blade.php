@extends('pizza.master')
@section('content')
<section>
    @if(Session::has('Success'))
    <div class="alert alert-success">
        {{Session::get('Success')}}
    </div>
    @endif
    @if(Session::has('Error'))
    <div class="alert alert-danger">
        {{Session::get('Error')}}
    </div>
    @endif
</section>
<section class="text-center">
    <img src="https://media.istockphoto.com/vectors/horizontal-pizza-banner-with-mozzarella-slices-ketchup-tomato-vector-id1253087090"
    width="100%" height="400px">   
    <a href="menu" class="btn btn-primary text-white m-2">Order Now</a>
</section>
@stop