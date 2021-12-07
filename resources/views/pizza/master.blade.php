@php
$user = session('user');
$sn = 0;
@endphp
@if(empty($user))
<script>
    window.location.href = "{{url('/login')}}";
</script>
@endif

<!doctype html>
<html lang="en">

<head>
    @include('pizza.includes.head')
    <title>Pizza Bay</title>
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

        .bannerimg {
            height: 380px;
        }

        .carousel-content {
            position: absolute;
            width: 40%;
            top: 20%;
            left: 12%;
            z-index: 20;
            text-align: center;
        }

        .carousel-foot-content {
            position: absolute;
            top: 12%;
            padding-left: 50px;
            padding-right: 50px;
            z-index: 20;
            color: white;
        }
    </style>
</head>

<body>
    <nav id="nav">
        @include('pizza.includes.nav')
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="mt-5">
        @include('pizza.includes.footer')
    </footer>

    @include('pizza.includes.foot')
</body>

</html>