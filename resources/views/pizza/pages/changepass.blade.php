@extends('pizza.master')
@section('content')
<section class="container my-4">
    <h2 class="mb-2 text-center">Change Password</h2>
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
    <form method="post" action="{{url('/passvalid')}}">
        @csrf()
        <div class="form-group row">
            <label for="opass_id" class="col-sm-2 col-form-label">Current Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="opass_id" name="oldpass" placeholder="Current Password">
                @if($errors->has('oldpass'))
                <span class="alert-danger text-danger px-1">{{$errors->first('oldpass')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="pass_id" class="col-sm-2 col-form-label">New Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pass_id" name="pass" placeholder="New Password">
                @if($errors->has('pass'))
                <span class="alert-danger text-danger px-1">{{$errors->first('pass')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="conpass_id" class="col-sm-2 col-form-label">Confirm Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="conpass_id" name="conpass" placeholder="Re-Enter New Password">
                @if($errors->has('conpass'))
                <span class="alert-danger text-danger px-1">{{$errors->first('conpass')}}</span>
                @endif
            </div>
        </div>
        <br />
        <input type="submit" class="btn btn-primary btn-large" name="cpass" value="Change Password">
    </form>

</section>
@stop