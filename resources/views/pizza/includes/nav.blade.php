<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF616F">
    <a class="navbar-brand ml-4" href="home">
        <img src="https://www.clipartmax.com/png/full/22-226713_pizza-delivery-logo-italian-cuisine-pizza-logo-vector-png.png" width="50" height="50" class="d-inline-block align-top" alt="">
        <a href="home" class="h3 text-dark font_arvo">Pizza Bay</a>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link mx-2" href="menu">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-2" href="cart">Cart<span class="badge badge-warning mx-1">{{session('cart_val')}}</span></a>
            </li>
            <li class="nav-item dropdown mx-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="editprofile">Edit Profile</a>
                    <a class="dropdown-item" href="changepassword">Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="order">Orders</a>
                </div>
            </li>
        </ul>
        <span class="navbar-text mr-4">
            Welcome: {{$user->name}}
        </span>
        <a class="nav-link text-dark" href="logout">Logout</a>
    </div>
</nav>