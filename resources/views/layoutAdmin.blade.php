<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/SFKT_transparent.png') }}" type="image/gif" sizes="100%">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <title>@yield('title')</title>
</head>


<body>

    <div class="wrapper">

        <aside id="sidebar">

            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="fa-solid fa-rectangle-list"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="/admin">SFKTshop</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                @if( Auth::guard('admin')->check())
                <li class="sidebar-item">
                    <a class="sidebar-link ">
                        <img src="{{Auth::guard('admin')->user()->avatar}}" alt="{{Auth::guard('admin')->user()->name}}"
                            class="img-thumbnail rounded-5" style="width: 30px; height:30px">
                        <span class="text-light">Hi, {{Auth::guard('admin')->user()->name}}</span>
                    </a>
                </li>
                @endif

                <li class="sidebar-item">
                    <a href="/admin" class="sidebar-link">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Admin Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/category" class="sidebar-link">
                        <i class="fa-solid fa-table-cells"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/products" class="sidebar-link">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Product</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/admin/orders" class="sidebar-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Orders</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-users"></i>
                        <span>User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/comments" class="sidebar-link">
                        <i class="fa-solid fa-comments"></i>
                        <span>Comment</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#!admincontact" class="sidebar-link">
                        <i class="fa-solid fa-message"></i>
                        <span>Contacts</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>Setting</span>
                    </a>
                </li>
                <div class="sidebar-footer">
                    <a href="{{url('admin/logout')}}" class="sidebar-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </ul>


        </aside>

        <div class="main">
            @yield('adminContent')
        </div>

    </div>

    <script src="https://kit.fontawesome.com/84236ec286.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
<script>
const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function() {
    document.querySelector("#sidebar").classList.toggle("expand");
});
</script>

</html>