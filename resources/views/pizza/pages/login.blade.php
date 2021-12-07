<!doctype html>
<html lang="en">

<head>
    @include('pizza.includes.head')
    <title>User Login</title>
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
        <div class="jumbotron" style="background-image: url(https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-delicious-pizza-small-fresh-and-simple-black-banner-image_178789.jpg); background-repeat: no-repeat; background-size: 100% 100%;">
            <h1 class="text-center text-white font_arvo">Pizza Bay</h1>
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
            <h4 class="text-center mb-3 font_monda text-info">Login</h4>
            <form method="post" action="{{url('/logvalid')}}">
                @csrf()
                <div class="form-group row">
                    <label for="mail" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="mail" placeholder="Email">
                        @if($errors->has('mail'))
                        <span class="text-danger px-1">{{$errors->first('mail')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pass" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="pass" placeholder="Password">
                        @if($errors->has('pass'))
                        <span class="text-danger px-1">{{$errors->first('pass')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remuser" name="remuser">
                    <label class="form-check-label" for="remuser">Remember Me</label>
                </div><br />
                <input type="submit" class="btn btn-primary btn-large" name="log" value="Login">
                <a href="register" class="pull-right btn btn-default">New User?</a>
            </form>
        </section>
        @include('pizza.includes.footer')
    </main>
    @include('pizza.includes.foot')
</body>

</html>