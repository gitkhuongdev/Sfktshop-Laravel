@extends('layout')
@section('title')
Shop
@endsection
@section('content')
<div class="minibanner pt-4 pb-3 justify-content-center">
    <h6 class="text-center minibanner_text">⚡️ HAPPY HOLIDAY DEALS ON EVERYTHING ⚡️</h6>
</div>
<!-- SECTION PRODUCT -->
<section class="py-5">
    <div class="container">
        <div class="row">

            <!-- Filter -->
            <div class="col-12 col-md-4 col-lg-3">
                <ul class="list-group">
                    <!-- ----------------------------------CATEGORY------------------------------------ -->
                    @foreach ($categoryList as $item)
                    <li class="sidebar-item list-unstyled">
                        <a href="{{ url('/category', [$item->id]) }}" class="sidebar-link">
                            <span class="submenu_title">{{ $item->name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-12 col-md-8 col-lg-9">

                <!-- BANNER -->
                <!-- (Keep the carousel code as it is) -->
                <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active c-item">
                            <img src="{{asset('assets/image/fashion-background (1).png')}}" class="d-block w-100 c-img"
                                alt="Slide 1">
                            <div class="carousel-caption top-0 mt-4">
                                <p class="mt-5 fs-3 text-uppercase">Spring Season</p>
                                <h1 class="display-1 fw-bolder text-capitalize">Sale of 50%</h1>
                                <a href="#!products"><button type="button"
                                        class="btn btn-info btn btn-primary px-4 py-2 fs-5 mt-4">Shop Now <i
                                            class="fa-solid fa-arrow-right-long fa-beat"></i></button>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item c-item">
                            <img src="{{asset('assets/image/something (6).jpg')}}" class="d-block w-100 c-img"
                                alt="Slide 2">
                            <div class="carousel-caption top-0 mt-4">
                                <p class="text-uppercase fs-3 mt-5">Summer Season</p>
                                <p class="display-1 fw-bolder text-capitalize">Sale off 60%</p>
                                <a href="#!products"><button type="button"
                                        class="btn btn-info btn btn-primary px-4 py-2 fs-5 mt-4">Shop Now <i
                                            class="fa-solid fa-arrow-right-long fa-beat"></i></button>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item c-item">
                            <img src="{{asset('assets/image/something (7).jpg')}}" class="d-block w-100 c-img"
                                alt="Slide 3">
                            <div class="carousel-caption top-0 mt-4">
                                <p class="text-uppercase fs-3 mt-5">Fall season</p>
                                <p class="display-1 fw-bolder text-capitalize">Sale off 30%</p>
                                <a href="#!products"><button type="button"
                                        class="btn btn-info btn btn-primary px-4 py-2 fs-5 mt-4">Shop Now <i
                                            class="fa-solid fa-arrow-right-long fa-beat"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- FILTER LIST -->
                <div class="row align-items-center mb-5 mt-5">
                    <div class="col-12 col-md">
                        @if(isset($category))
                        <nav class="mt-1 filter_fz" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-gray-500 link_page" href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                            </ol>
                        </nav>
                        @endif
                    </div>
                </div>

                <!-- PRODUCT -->
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-6 col-md-4">
                        <div class="card mb-3">
                            @if($product->sale)
                            <div class="badge bg-dark card-badge card-badge-start text-uppercase">{{ $product->sale }}%
                            </div>
                            @endif
                            <a href="{{ url('/detail', [$product->id]) }}" class="product-link">
                                <div class="card-img rounded-0 w-100">
                                    <div class="card-img-hover">
                                        <img class="card-img-back" src="{{ $product->image_1 }}" alt="">
                                        <div class="hover-icons">
                                            <i class="fas fa-heart"></i> <!-- Icon yêu thích -->
                                            <a href="/addtocart/{{$product->id}}">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body px-0">
                                <div class="fz">
                                    <a href="#"
                                        class="text-opacity-50 text-black-50">{{ $categories[$product->idCategory] }}</a>
                                </div>
                                <div class="fw-bolder">
                                    <a href="/detail/{{ $product->id }}"
                                        class="text-black fw-medium line-clamp-2 height_50">{{ $product->name }}</a>
                                </div>
                                <div class="fw-medium text-gray-400">
                                    @if($product->sale)
                                    <span
                                        class="fz text-gray-400 text-decoration-line-through">${{ number_format($product->price) }}</span>
                                    <span
                                        class="text-primary">${{ number_format($product->price - ($product->price * ($product->sale / 100))) }}</span>
                                    @else
                                    <span class="text-primary">${{ $product->price }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- PAGINATION -->
                <div class="container d-flex justify-content-center">
                    <div class="">{{$products->onEachSide(12)->links()}}</div>
                </div>


            </div>
        </div>
    </div>
</section>

@endsection