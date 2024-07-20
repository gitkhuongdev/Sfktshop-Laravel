@extends('layout')

@section('title', 'Home')

@section('content')
<!-- Banner__header -->
<div class="back-ground mb-5">
    <div class="container banner-height">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-7 col-md-12 pb-4 pl-2 pr-4">
                    <h1 class="intro-head mb-5">Welcome to <span class="strong__text">"Glamorous Finds"</span> - Your
                        Ultimate Shopping Destination!</h1>
                    <h5 class="intro-content pb-4">Discover a world of style and convenience at Glamorous Finds, your
                        go-to online shopping haven. Immerse yourself in a curated collection of fashion-forward
                        clothing, accessories, and lifestyle essentials that redefine your wardrobe and elevate your
                        everyday life.</h5>
                    <a href="shop.html"><button type="button" class="btn btn-info">Shop Now!</button></a>
                </div>
                <div class="col-lg-5 col-md-12">
                    <img class="img-fluid banner-img" src="{{ asset('assets/banner.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hot -->
<div class="container mt-5 mb-5">
    <div class="row justify-content-center mb-5 pt-5">
        <div class="col-12 col-md-10 col-lg-8 col-xl-3 w-50 text-center">
            <h2 class="mb-4">Outstanding Product</h2>
        </div>

    </div>

    <div class="row justify-content-start">
        <!--HOT PRODUCT -->
        @foreach ($hotProduct as $product)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-7">
                @if ($product->sale > 0)
                <div class="badge bg-dark card-badge card-badge-start text-uppercase">{{ $product->sale }}%</div>
                @endif
                <div class="product-link">
                    <div class="card-img rounded-0 w-100">
                        <div class="card-img-hover">
                            <a href="/detail/{{ $product->id }}">
                                <img class="card-img-back" src="{{ $product->image_1 }}" alt="">
                            </a>
                            <div class="hover-icons">
                                <i class="fas fa-heart"></i>
                                <a href="/addtocart/{{$product->id}}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="fz">
                        <a href="#" class="text-opacity-50 text-black-50">{{ $categories[$product->idCategory] }}</a>
                    </div>
                    <div class="fw-bolder">
                        <a href="/detail/{{ $product->id }}"
                            class="text-black fw-medium line-clamp-2">{{ $product->name }}</a>
                    </div>
                    <div class="fw-medium text-gray-400">
                        <span
                            class="fz text-gray-400 text-decoration-line-through">${{ number_format($product->price) }}</span>
                        <span
                            class="text-primary">${{ number_format($product->price - ($product->price * ($product->sale / 100))) }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>

<!-- See more -->
<div class="container mt-5 mb-5">
    <div class="row justify-content-center mb-5 pt-5">
        <div class="col-12 col-md-10 col-lg-8 col-xl-3 w-50 text-center">
            <h2 class="mb-4">Popular Product</h2>
        </div>

    </div>

    <div class="row justify-content-start">
        <!--POPULAR PRODUCT -->
        @foreach ($popularProduct as $product)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-7">
                @if ($product->sale > 0)
                <div class="badge bg-dark card-badge card-badge-start text-uppercase">{{ $product->sale }}%</div>
                @endif
                <div class="product-link">
                    <div class="card-img rounded-0 w-100">
                        <div class="card-img-hover">
                            <a href="/detail/{{ $product->id }}">
                                <img class="card-img-back" src="{{ $product->image_1 }}" alt="">
                            </a>
                            <div class="hover-icons">
                                <i class="fas fa-heart"></i>
                                <a href="/addtocart/{{$product->id}}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="fz">
                        <a href="#" class="text-opacity-50 text-black-50">{{ $categories[$product->idCategory] }}</a>
                    </div>
                    <div class="fw-bolder">
                        <a href="/detail/{{ $product->id }}"
                            class="text-black fw-medium line-clamp-2">{{ $product->name }}</a>
                    </div>
                    <div class="fw-medium text-gray-400">
                        <span
                            class="fz text-gray-400 text-decoration-line-through">${{ number_format($product->price) }}</span>
                        <span
                            class="text-primary">${{ number_format($product->price - ($product->price * ($product->sale / 100))) }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>


<!-- New -->
<div class="container mt-5 mb-5">
    <div class="row justify-content-center mb-5 pt-5">
        <div class="col-12 col-md-10 col-lg-8 col-xl-3 w-50 text-center">
            <h2 class="mb-4">New Product</h2>
        </div>

    </div>

    <div class="row justify-content-start">
        <!--POPULAR PRODUCT -->
        @foreach ($newProduct as $product)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-7">
                @if ($product->sale > 0)
                <div class="badge bg-dark card-badge card-badge-start text-uppercase">{{ $product->sale }}%</div>
                @endif
                <div class="product-link">
                    <div class="card-img rounded-0 w-100">
                        <div class="card-img-hover">
                            <a href="/detail/{{ $product->id }}">
                                <img class="card-img-back" src="{{ $product->image_1 }}" alt="">
                            </a>
                            <div class="hover-icons">
                                <i class="fas fa-heart"></i>
                                <a href="/addtocart/{{$product->id}}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="fz">
                        <a href="#" class="text-opacity-50 text-black-50">{{ $categories[$product->idCategory] }}</a>
                    </div>
                    <div class="fw-bolder">
                        <a href="/detail/{{ $product->id }}"
                            class="text-black fw-medium line-clamp-2 height_50">{{ $product->name }}</a>
                    </div>
                    <div class="fw-medium text-gray-400">
                        <span
                            class="fz text-gray-400 text-decoration-line-through">${{ number_format($product->price) }}</span>
                        <span
                            class="text-primary">${{ number_format($product->price - ($product->price * ($product->sale / 100))) }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>
<!-- Discover  -->
<div class="container mt-5 mb-5">
    <div class="row text-center mb-5">
        <a href="#">
            <h5 class="discover_title">Discover more product</h5>
        </a>
    </div>
</div>

<section class="background-image mb-5">
    <div class="row justify-content-end">
        <div class=" col-12 col-md-8 col-lg-6">
            <h3 class="mb-5 background-image-title">Get 40% from <br> Spring Collection</h3>
            <div class="datetime-container" id="datetime-container">
                <div class="datetime-container" id="datetime-container">
                    <p id="countdown" class="countdown"></p>
                </div>
            </div>

            <a href="shop.html"><button type="button" class="btn btn-info btn-img">Shop now <i
                        class="fa-solid fa-arrow-right-long"></i></button></a>
        </div>
    </div>
</section>



<!-- REVIEW -->
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-12 col-md-10 col-lg-8 col-xl-3 w-50 text-center">
            <h6 class="mb-3 text-gray-400">WHAT CUSTOMER SAYS</h6>
            <h2 class="mb-4">Lastest Customers Revivews</h2>
        </div>
    </div>
    <div class="row mb-5 justify-content-between">
        <div class="col-12 col-md-4 col-lg-4 mt-3">
            <div class="card-lg card border">
                <div class="card-body">
                    <div class="row align-items-center mb-5">
                        <div class="col-4">
                            <img src="assets/image/product-12.jpg" class="img-fluid" alt="...">
                        </div>
                        <div class="col-8 ml-2">
                            <a href="#" class="fz text-opacity-50 text-black-50">Dresses</a>
                            <a href="#" class="d-block fw-bolder text-black mt-2">Cropped cotton Top</a>
                            <div class="rating mt-2">
                                <i class="icon-star fa-solid fa-star"></i>
                                <i class="icon-star fa-solid fa-star"></i>
                                <i class="icon-star fa-solid fa-star"></i>
                                <i class="icon-star fa-solid fa-star-half-stroke"></i>
                                <i class="icon-star fa-regular fa-star"></i>
                            </div>

                        </div>
                        <div class="mb-0 mt-3">
                            <div class="text-black-50">
                                <p class="h6 writing">
                                    Fill his waters wherein signs likeness waters. Second light gathered appear
                                    sixth fourth, seasons behold creeping female.
                                    Fill his waters wherein signs likeness waters. Second light gathered appear
                                    sixth fourth, seasons behold creeping female.

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="text-black-50">
                        <p class="h6 writing">
                            Giônxina, 16 May 2019
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-4 mt-3">
            <div class="card-lg card border">
                <div class="card-body">
                    <div class="row align-items-center mb-5">
                        <div class="col-4">
                            <img src="assets/image/product-12.jpg" class="img-fluid" alt="...">
                        </div>
                        <div class="col-8 ml-2">
                            <a href="#" class="fz text-opacity-50 text-black-50">Dresses</a>
                            <a href="#" class="d-block fw-bolder text-black mt-2">Cropped cotton Top</a>
                            <div class="rating mt-2">
                                <i class="icon-star fa-solid fa-star"></i>
                                <i class="icon-star fa-solid fa-star"></i>
                                <i class="icon-star fa-solid fa-star"></i>
                                <i class="icon-star fa-solid fa-star-half-stroke"></i>
                                <i class="icon-star fa-regular fa-star"></i>
                            </div>

                        </div>
                        <div class="mb-0 mt-3">
                            <div class="text-black-50">
                                <p class="h6 writing">
                                    Fill his waters wherein signs likeness waters. Second light gathered appear
                                    sixth fourth, seasons behold creeping female.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="text-black-50">
                        <p class="h6 writing">
                            Giônxina, 16 May 2019
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-4 mt-3">
            <div class="card-lg card border">
                <div class="card-body">
                    <div class="row align-items-center mb-5">
                        <div class="col-4">
                            <img src="assets/image/product-12.jpg" class="img-fluid" alt="...">
                        </div>
                        <div class="col-8 ml-2">
                            <a href="#" class="fz text-opacity-50 text-black-50">Dresses</a>
                            <a href="#" class="d-block fw-bolder text-black mt-2">Cropped cotton Top</a>
                            <div class="rating mt-2">
                                <i class="icon-star fa-solid fa-star"></i>
                                <i class="icon-star fa-solid fa-star"></i>
                                <i class="icon-star fa-solid fa-star"></i>
                                <i class="icon-star fa-solid fa-star-half-stroke"></i>
                                <i class="icon-star fa-regular fa-star"></i>
                            </div>

                        </div>
                        <div class="mb-0 mt-3">
                            <div class="text-black-50">
                                <p class="h6 writing">
                                    Fill his waters wherein signs likeness waters. Second light gathered appear
                                    sixth fourth, seasons behold creeping female.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="text-black-50">
                        <p class="h6 writing">
                            Giônxina, 16 May 2019
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mb-5">
        <div class="col-12 text-center">
            <i class="dot_icon fa-solid fa-circle"></i>
            <i class="dot_icon_active fa-solid fa-circle"></i>
            <i class="dot_icon fa-solid fa-circle"></i>
        </div>
    </div>
</div>

<!-- BRAND -->

<div class="background_brand">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-3 w-50 text-center mt-5">
                <h2 class="mb-4">@SFKTshop</h2>
                <p class="mb-10 text-gray-500">
                    Appear, dry there darkness they're seas, dry waters.
                </p>
            </div>

        </div>
        <div class="row pb-5">
            <div class="col-4 col-xl-2 col-md-4 d-flex flex-column mt-4">
                <img src="assets/image/something (1).jpg" class="img-fluid hover_opacity" alt="...">
            </div>
            <div class="col-4 col-xl-2 col-md-4 d-flex flex-column mt-4">
                <img src="assets/image/something (7).jpg" class="img-fluid hover_opacity" alt="...">
            </div>
            <div class="col-4 col-xl-2 col-md-4 d-flex flex-column mt-4">
                <img src="assets/image/something (2).jpg" class="img-fluid hover_opacity" alt="...">
            </div>
            <div class="col-4 col-xl-2 col-md-4 d-flex flex-column mt-4">
                <img src="assets/image/something (6).jpg" class="img-fluid hover_opacity" alt="...">
            </div>
            <div class="col-4 col-xl-2 col-md-4 d-flex flex-column mt-4">
                <img src="assets/image/something (3).jpg" class="img-fluid hover_opacity" alt="...">
            </div>
            <div class="col-4 col-xl-2 col-md-4 d-flex flex-column mt-4">
                <img src="assets/image/something (5).jpg" class="img-fluid hover_opacity" alt="...">
            </div>
        </div>

        <div class="row pb-5">
            <div class="col-4 col-xl-2 col-md-4  d-flex flex-column mt-4">
                <img src="assets/image/adidas.svg" class="img-fluid w-75 h-75" alt="...">
            </div>
            <div class="col-4 col-xl-2 col-md-4  d-flex flex-column mt-4">
                <img src="assets/image/zara.svg" class="img-fluid w-75 h-75" alt="...">
            </div>
            <div class="col-4 col-xl-2 col-md-4  d-flex flex-column mt-4">
                <img src="assets/image/bershka.svg" class="img-fluid w-75 h-75" alt="...">
            </div>
            <div class="col-4 col-xl-2 col-md-4  d-flex flex-column mt-4">
                <img src="assets/image/mango.svg" class="img-fluid w-75 h-75" alt="...">
            </div>
            <div class="col-4 col-xl-2 col-md-4  d-flex flex-column mt-4">
                <img src="assets/image/reebok.svg" class="img-fluid w-75 h-75" alt="...">
            </div>
            <div class="col-4 col-xl-2 col-md-4  d-flex flex-column mt-4">
                <img src="assets/image/stradivarius.svg" class="img-fluid w-75 h-75" alt="...">
            </div>

        </div>
    </div>
</div>
@endsection