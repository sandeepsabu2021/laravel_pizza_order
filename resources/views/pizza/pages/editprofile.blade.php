@extends('pizza.master')
@php
$user = $u;
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('content')
<section class="container my-2">
    <h2 class="mb-2 text-center">Edit Profile</h2>
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
        <form method="POST" method="post" action="{{url('/updatevalid')}}">
                @csrf()
                <input type="hidden" name="uid" value="{{$user->id}}">
                <div class="form-group row">
                    <label for="mail" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="mail" placeholder="Email" value="{{$user->email}}">
                        @if($errors->has('mail'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('mail')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
                        @if($errors->has('name'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mob" class="col-sm-2 col-form-label">Mobile:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="mob" placeholder="Mobile" value="{{$user->mobile}}">
                        @if($errors->has('mob'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('mob')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add" class="col-sm-2 col-form-label">Street Address:</label>
                    <div class="col-sm-10">
                        <textarea name="add" class="form-control" placeholder="Street Address" cols="30" rows="5">{{$user->address}}</textarea>
                        @if($errors->has('add'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('add')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City:</label>
                    <div class="col-sm-10">
                        <select name="city" class="form-control">
                            <option value="">Select an Option</option>
                            <option <?php if($user->city == 'mumbai'){ echo 'selected';} ?> value="mumbai">Mumbai</option>
                            <option <?php if($user->city == 'delhi'){ echo 'selected';} ?> value="delhi">Delhi</option>
                            <option <?php if($user->city == 'chennai'){ echo 'selected';} ?> value="chennai">Chennai</option>
                            <option <?php if($user->city == 'pune'){ echo 'selected';} ?> value="pune">Pune</option>
                        </select>
                        @if($errors->has('city'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('city')}}</span>
                        @endif
                    </div>
                </div>

                <input type="submit" class="btn btn-primary btn-large" name="update" value="Update Details">
            </form>
        
    </div>

</section>
@stop