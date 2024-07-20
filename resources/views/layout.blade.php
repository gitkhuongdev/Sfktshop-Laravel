<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/SFKT_transparent.png') }}" type="image/gif" sizes="100%"
        border-radius="50%">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>@yield('title', 'Home')</title>
</head>

<body>

    <!-- HEADER -->
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <nav class="navbar">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('assets/SFKT_transparent.png') }}" alt="Bootstrap" width="60" height="60">
                    </a>
                </nav>

                <button class="navbar-toggler button-menu" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item px-2">
                            <a class="nav-link nav-hover fz fw-medium  " aria-current="page" href="contact.html"><i
                                    class="fa-solid fa-envelope-open-text"></i> Contact</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link nav-hover fz fw-medium  " aria-current="page" href="faq.html"><i
                                    class="fa-solid fa-circle-question"></i> FAQ</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link nav-hover fz fw-medium  " aria-current="page" href="blog.html"><i
                                    class="fa-solid fa-book-open"></i> Blog</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link nav-hover fz fw-medium  " aria-current="page" href="/shop"><i
                                    class="fa-solid fa-store"></i> Shop</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item px-2">
                            <div class="search-icon">
                                <a class="nav-link nav-hover  " aria-current="page" href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                                <input type="search" class="form-control search-input" placeholder="Search...">
                            </div>
                        </li>

                        <li class="nav-item px-2">
                            <a class="nav-link nav-hover  " aria-current="page" href="wishlist.html"><i
                                    class="fa-solid fa-heart"></i></a>
                        </li>

                        <li class="nav-item px-2">
                            <a class="nav-link nav-hover  " aria-current="page" href="/cart">
                                <i class="fa-solid fa-cart-shopping position-relative cart-icon">
                                    <span class="position-absolute  badge ms-auto badge_content">
                                        {{ $cartItemCount }}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </i>
                            </a>
                        </li>
                        <li class="nav-item px-2 dropdown">

                            <a class="nav-link nav-hover dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"> <i class="fa-solid fa-user"></i>
                            </a>

                            <div class="dropdown-menu login_box">

                                @if (Auth::check())
                                <a class="dropdown-item login_box-item d-flex align-items-center justify-content-between"
                                    href="#!infor">
                                    <img src="{{Auth::user()->avatar}}" alt="user"
                                        class="img-fluid rounded-circle user_image">
                                </a>

                                <a class="dropdown-item login_box-item" href="#!infor">Hi, {{Auth::user()->name}}</a>
                                <a class="dropdown-item login_box-item" href="/logout">Log out</a>

                                @else
                                <a class="dropdown-item login_box-item" href="/register">Sign in</a>
                                <a class="dropdown-item login_box-item" href="/login">Log in</a>

                                @endif


                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- MAIN CONTENT -->

    <section>
        @yield('content')
    </section>

    <!-- FOOTER -->
    <footer class="footer_background bg-dark bg-cover pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                    <h5 class="mb-5 text-center text-white">Want style Ideas and Treats?</h5>
                    <form action="" class="mb-5">
                        <div class="row gx-5 align-items-start">
                            <div class="col w-50">
                                <input type="email" class="form-control form-control-gray-700 form-control-lg"
                                    placeholder="Enter Email">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-gray-500 btn-lg">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-3 text-center">
                    <h4 class="mb-5 text-white">SKFTshop.</h4>
                    <ul class="list-inline mb-3 mb-md-0 footer_icon">
                        <li class="list-inline-item ml-1">
                            <a href="#" class="text-gray-400"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item ml-1">
                            <a href="#" class="text-gray-400"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item ml-1">
                            <a href="#" class="text-gray-400"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                        <li class="list-inline-item ml-1">
                            <a href="#" class="text-gray-400"><i class="fa-brands fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item ml-1">
                            <a href="#" class="text-gray-400"><i class="fa-brands fa-facebook-messenger"></i></a>
                        </li>

                    </ul>
                </div>

                <div class="col-6 col-sm text-start">
                    <ul class="mb-4 mb-sm-0">
                        <h6 class="mb-3 text-white">SUPPORT</h6>
                        <li>
                            <a href="#" class="text-gray-400 footer_text">Contact US</a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-400 footer_text">FAQs</a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-400 footer_text">Size Guide</a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-400 footer_text">Shipping & Return</a>
                        </li>

                    </ul>
                </div>

                <div class="col-6 col-sm text-start">
                    <ul class="mb-4 mb-sm-0">
                        <h6 class="mb-3 text-white">SHOP</h6>
                        <li>
                            <a href="shop.html" class="text-gray-400 footer_text">Men's</a>
                        </li>

                        <li>
                            <a href="shop.html" class="text-gray-400 footer_text">Shopping Women's</a>
                        </li>

                        <li>
                            <a href="shop.html" class="text-gray-400 footer_text">Shopping Kid's</a>
                        </li>

                        <li>
                            <a href="shop.html" class="text-gray-400 footer_text">Shopping Discounts</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-sm text-start">
                    <ul class="mb-4 mb-sm-0">
                        <h6 class="mb-3 text-white">COMPANY</h6>
                        <li>
                            <a href="#" class="text-gray-400 footer_text">Our Story</a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-400 footer_text">Careers</a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-400 footer_text">Terms & Conditions</a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-400 footer_text">Privacy & Cookie policy</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-sm text-start">
                    <ul class="mb-4 mb-sm-0">
                        <h6 class="mb-3 text-white">CONTACT</h6>
                        <li>
                            <a href="#" class="text-gray-400 footer_text">1-22222-3333</a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-400 footer_text">2-3333-44444</a>
                        </li>

                        <li>
                            <a href="#" class="text-gray-400 footer_text">help@sfktshop.com</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="footer_line mt-5 mb-3">
            <div class="line mb-3"></div>
            <div class="row justify-content-center align-items-center">
                <p class="text-center footer_text-end">© 2024 All rights reserved. Designed by Sofk.</p>
            </div>
        </div>
    </footer>


    <script src="https://kit.fontawesome.com/84236ec286.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/javascript/script.js') }}"></script>
</body>

</html>