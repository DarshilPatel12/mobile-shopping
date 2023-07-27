<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{!! asset('img/icon.png') !!}" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/about.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="navbar navbar-expand-lg">
            <div class="navbar-brand logo">
                <a href="home.php"><img src="{{ asset('img/Picsart_22-07-10_07-02-45-447.png') }}" width="120px"></a>
            </div>
            <nav id="navbar">
                <ul class="navbar-nav ml-5">
                    <li class="nav-item"><a href="{{ route('admin.home') }}">HOME</a></li>
                    <li class="nav-item"><a href="{{ route('admin.product') }}">PRODUCT</a></li>
                    <li class="nav-item"><a href="{{ route('admin.about') }}">ABOUT</a></li>
                    <li class="nav-item"><a href="{{ route('admin.contact') }}">CONTACT</a></li>
                    <li class="nav-item"><a href="{{ route('admin.order') }}">ORDER</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            PROFILE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <ul>
                                <li class="nav-item"><a class="dropdown-item" href="{{ url('admin/change_password_form') }}"><i class="fa-solid fa-key"></i> Change Password</a></li>
                                <li class="nav-item"><a class="dropdown-item" href="{{ url('admin/add_admin_form') }}"><i class="fa-regular fa-address-book"></i> Add Admin</a></li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item"><a onclick="return confirm('Are you sure want to logout?');" class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>


    @section('content');
    @show


    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 link">
                        <h3 class="ml-5">Links</h3>
                        <ul class="text-decoration-none">
                            <li><a href="{{ route('admin.home') }}">Home</a></li>
                            <li><a href="{{ route('admin.product') }}">Product</a></li>
                            <li><a href="{{ route('admin.about') }}">About</a></li>
                            <li><a href="{{ route('admin.contact') }}">Contact</a></li>
                            <li><a href="{{ route('admin.order') }}">Order</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 aboutus">
                        <h3>About</h3>
                        <p>Launched in {{ date('Y') }}, mobile.com is the largest gadget discovery site in India,
                            focused on smartphones. It provides information and interactive tools to help people decide
                            which phone to buy and where to buy it from.</p>
                    </div>
                </div>
                <p class="text-center">Mobile.com © {{ date('Y') }} </p>
                <p class="text-center opacity-50"><small>Developed by Darshil Bhut</small></p>
            </div>
        </div>
    </footer>

    <script type="text/javascript">
        const currentLocation = location.href;
        const navbar = document.getElementById('navbar');
        const menuItem = navbar.querySelectorAll('a');
        const menuLength = menuItem.length
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].className = "active"
            }
        }
    </script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
