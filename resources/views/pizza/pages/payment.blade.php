@extends('pizza.master')
@php
$user = session('user');
$cart = session('cart');
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('content')
<section class="container my-2">
    <h2 class="mb-2 text-center">Order Details & Payment</h2>
    <div>
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
        <form method="post" action="{{url('/payvalid')}}">
            @csrf()
            <input type="hidden" name="uid" value="{{$user->id}}">
            <input type="hidden" name="total" value="{{$amt}}">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="add" class="col-sm-2 col-form-label">Address:</label>
                <div class="col-sm-10">
                    <textarea readonly class="form-control-plaintext">{{$user->address}}. {{$user->city}}</textarea>
                </div>
                <label for="mob" class="col-sm-2 col-form-label">Mobile:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$user->mobile}}">
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Items:</label>
                <div class="col-sm-10">
                    @foreach($cart as $c)
                    @foreach($menu as $m)
                    @if($c == $m->id)
                    <p>{{$m->name}} - Rs. {{$m->price}}</p>
                    @endif
                    @endforeach
                    @endforeach
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Total:</label>
                <div class="col-sm-10">
                    <p>Rs. {{$amt}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="card" class="col-sm-2 col-form-label">Credit Card:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="card" placeholder="Credit card number">
                    @if($errors->has('card'))
                    <span class="alert-danger text-danger px-1">{{$errors->first('card')}}</span>
                    @endif
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-large" name="pay" value="Place Order">

        </form>
    </div>

</section>
@stop