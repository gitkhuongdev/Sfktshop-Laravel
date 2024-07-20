@extends('layout')
@section('title', 'Cart')

@section('content')
<div class="minibanner pt-4 pb-3 justify-content-center">
    <h6 class="text-center minibanner_text">⚡️ HAPPY HOLIDAY DEALS ON EVERYTHING ⚡️</h6>
</div>
<section class="mt-1 ">
    <div class="container">
        <div class="row">
            <!-- FILTER LIST -->
            <div class="row align-items-center mb-2 mt-4">
                <div class="col-12 col-md">

                    <nav class="mt-1 filter_fz fz-sm" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-gray-500 link_page " href="#!">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a class="text-gray-500 link_page" href="#!cart">Shopping Cart</a>
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <!-- Title -->
        <div class="row py-5">
            <div class="col">
                <h3 class="mb-4 text-center">Shopping Cart</h3>
            </div>
        </div>
        @if (Auth::check())
        <!-- Cart -->
        <div class="row">

            @if(count($cart)>0)
            <div class="">
                <a href="/clearcart" class="fs-xs text-gray-400 ms-auto link_hover fz-sm remove">
                    <i class="fa-solid fa-xmark"></i> Remove All
                </a>
            </div>
            @endif
            <div class="col-12 col-md-7">
                @foreach ($cart as $item)
                <div class="list-group list-group-flush list-group-lg  mb-3">
                    <div class="list-group-item my-4 mb-3">
                        <div>
                            <div class="row align-items-center mb-5">
                                <div class="col-3">
                                    <a href="">
                                        <img src="{{$item['image_1']}}" style="width: 160px; height: 160px;"
                                            class="img-fluid object-fit-cover" alt="">
                                    </a>
                                </div>

                                <div class="col">
                                    <div class="d-flex mb-2 fw-normal">
                                        <a href="DETAILSP" class="text-body w-75">{{$item['name']}}</a>
                                        <span class="ms-auto text-gray-500 fw-normal">
                                        </span>
                                    </div>
                                    <p class="mb-3 text-body-secondary">
                                        Price: <span
                                            class="text-black fw-medium">${{number_format($item['price'])}}</span>
                                        <br>
                                        Sale: <span class="text-black fw-medium">{{$item['sale']}}%</span>
                                    </p>

                                    <div class="d-flex align-items-center">
                                        <form action="{{ route('cart.update', $item['id']) }}" method="POST"
                                            class="update-cart-form">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantity" min="1" max="100"
                                                class="button p-2 quantity-input" value="{{$item['quantity']}}">
                                        </form>


                                        <a href="/deletecart/{{$item['id']}}"
                                            class="fs-xs text-gray-400 ms-auto link_hover fz-sm remove"> <i
                                                class="fa-solid fa-xmark"></i> Remove
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach

                @if(count($cart) == 0)
                <div class="d-flex justify-content-center">
                    <p>Your shopping cart is empty ready to <a href="/shop" class="text-danger">Buy now</a>
                    </p>
                </div>
                @endif
            </div>

            <div class="col-12 col-md-5 col-lg-4 offset-lg-1">

                <div class="card mb-4 bg-light button">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex bg-light text-black mt-3">
                                <span>Total Quantity</span>
                                <span class="ms-auto fz mb-3">{{$totalQuantity}}</span>
                            </li>
                            <li class="list-group-item d-flex bg-light text-black mt-3">
                                <span>Tax</span>
                                <span class="ms-auto fz mb-3">$00.00</span>
                            </li>

                            <li class="list-group-item d-flex bg-light text-black mt-3">
                                <span class="fz fw-semibold ">Total</span>
                                <span class="ms-auto fz mb-3">${{number_format($totalPrice,0)}}</span>
                            </li>
                            <li class="list-group-item d-flex bg-light text-black mt-3 text-center">
                                <span class="fz-sm text-gray-500 ">Shipping cost calculated at Checkout *</span>

                            </li>
                        </ul>
                    </div>
                </div>


                <a href="/checkout" class="btn button mt-4 p-3 w-100 btn-dark mb-2">
                    Checkout
                </a>

                <a href="/shop" class="btn btn-sm px-2 fw-medium  text-body link_hover"><i
                        class="fa-solid fa-arrow-left-long"></i> Continue Shopping </a>
            </div>
        </div>
        @else

        <!-- Check Login -->
        <div ng-show="!user" class="d-flex justify-content-center py-5 fz-lg fw-semibold">
            <p><i class="fa-solid fa-cart-shopping"></i> You need to <a href="/login" class="text-danger">Login</a> to
                shopping </p>
        </div>
        @endif

    </div>
</section>

<!-- Near Footer -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="d-flex mb-6 mb-lg-0 gap-2">
                    <i class="fa-solid fa-truck text-danger"></i>
                    <div class="ms-6">
                        <h6 class="heading-xxs mb-1 text-black fz-sm">FREE SHIPPING</h6>
                        <p class="mb-0 fs-sm text-body-secondary fz-sm">From all orders over $100</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="d-flex mb-6 mb-lg-0 gap-2">
                    <i class="fa-solid fa-retweet text-danger"></i>
                    <div class="ms-6">
                        <h6 class="heading-xxs mb-1 text-black fz-sm">FREE RETURN</h6>
                        <p class="mb-0 fs-sm text-body-secondary fz-sm">Return money within 30 days</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="d-flex mb-6 mb-lg-0 gap-2">
                    <i class="fa-solid fa-lock text-danger"></i>
                    <div class="ms-6">
                        <h6 class="heading-xxs mb-1 text-black fz-sm">SECURE SHOPPING</h6>
                        <p class="mb-0 fs-sm text-body-secondary fz-sm">You're in safe hands</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="d-flex mb-6 mb-lg-0 gap-2">
                    <i class="fa-solid fa-tags text-danger"></i>
                    <div class="ms-6">
                        <h6 class="heading-xxs mb-1 text-black fz-sm">OVER 10,000 STYLES</h6>
                        <p class="mb-0 fs-sm text-body-secondary fz-sm">We have everything you need</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityInputs = document.querySelectorAll('.quantity-input');
    quantityInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            this.closest('form').submit();
        });
    });
});
</script>

@endsection