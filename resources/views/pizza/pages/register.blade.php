<!doctype html>
<html lang="en">

<head>
    @include('pizza.includes.head')
    <title>Register User</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Meie+Script|Shadows+Into+Light|Arvo|Monda');

        .font_arvo {
            font-family: 'Arvo', serif;
            font-style: italic;
            font-weight: 400;
        }

        .font_monda {
            font-family: 'Monda', sans-serif;
        }
    </style>
</head>

<body>
    <main>
        <div class="jumbotron" style="background-image: url(https://thumbs.dreamstime.com/b/ad-banner-pizzeria-realistic-pizza-slices-ingredients-place-text-white-background-promotion-template-italian-food-215405931.jpg); background-repeat: no-repeat; background-size: 100% 100%;">
            <h2 class="text-center font_arvo"><br>Welcome to Pizza Bay</h2>
            <p class="text-center">India's favourite pizza house</p>
        </div>
        <section class="container">
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
            <h4 class="text-center mb-3 font_monda text-info">Register</h4>
            <form method="POST" method="post" action="{{url('/regvalid')}}">
                @csrf()
                <div class="form-group row">
                    <label for="mail" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="mail" placeholder="Email">
                        @if($errors->has('mail'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('mail')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                        @if($errors->has('name'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mob" class="col-sm-2 col-form-label">Mobile:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="mob" placeholder="Mobile">
                        @if($errors->has('mob'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('mob')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add" class="col-sm-2 col-form-label">Street Address:</label>
                    <div class="col-sm-10">
                        <textarea name="add" class="form-control" placeholder="Street Address" cols="30" rows="5"></textarea>
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
                            <option value="mumbai">Mumbai</option>
                            <option value="delhi">Delhi</option>
                            <option value="chennai">Chennai</option>
                            <option value="pune">Pune</option>
                        </select>
                        @if($errors->has('city'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('city')}}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="pass_id" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pass_id" name="pass" placeholder="Password">
                        @if($errors->has('pass'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('pass')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Confirm Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="conpass" placeholder="Re-enter Password">
                        @if($errors->has('conpass'))
                        <span class="alert-danger text-danger px-1">{{$errors->first('conpass')}}</span>
                        @endif
                    </div>
                </div>

                <input type="submit" class="btn btn-primary btn-large" name="reg" value="Register">
                <a href="login" class="pull-right btn btn-default">Login</a>
            </form>
        </section>
        @include('pizza.includes.footer')
    </main>
    <footer class="mt-5">
    @include('pizza.includes.foot')
    </footer>
</body>

</html>