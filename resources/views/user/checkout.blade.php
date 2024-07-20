@extends('layout')
@section('title', 'Checkout')

@section('content')
<div class="minibanner pt-4 pb-3 justify-content-center">
    <h6 class="text-center minibanner_text">⚡️ HAPPY HOLIDAY DEALS ON EVERYTHING ⚡️</h6>
</div>

<!-- LINK  -->
<section class="mt-1 ">
    <div class="container">
        <div class="row">
            <!-- FILTER LIST -->
            <div class="row align-items-center mb-2 mt-4">
                <div class="col-12 col-md">

                    <nav class="mt-1 filter_fz fz-sm" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-gray-500 link_page " href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a class="text-gray-500 link_page" href="cart.html">Shopping Cart</a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">
                                <a class="text-gray-500 link_page" href="checkout.html">Checkout</a>
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
        <div class="row">
            <div class="col">
                <h3 class="mb-4 text-center">Checkout</h3>
                <div class="text-center fz-sm">Already have an account?<a class="fw-semibold text-reset"
                        href="login.html">
                        Click here to login</a></div>
            </div>
        </div>

        <!-- CHECKOUT FORM -->

        <form action="/checkout" method="POST" class="row mt-4">
            @csrf
            <div class="col-12 col-md-7">
                <!-- input -->
                <h5 class="mb-4">Billing Details</h5>
                <div class="row mb-5">
                    <!-- Last Name -->
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Full Name"
                                value="{{ $user->name }}" name="user_fullname">
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label class="form-label">Email *</label>
                            <input type="email" class="form-control form-control-sm" placeholder="Email"
                                value="{{ $user->email }}" name="user_email">
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="col-12 col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label">Address *</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Address"
                                value="{{ $user->address }}" name="user_address">
                        </div>
                    </div>
                    <!-- Mobilephone -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Mobile Phone *</label>
                            <input type="tel" class="form-control form-control-sm" placeholder="Mobile Phone"
                                value="{{ $user->phone }}" name="user_phone">
                        </div>
                    </div>
                </div>

                <!-- Ship table -->
                <h5 class="fw-medium">Shipping Details</h5>
                <div class="table-responsive mb-5">
                    <table class="table table-bordered table-hover mb-0 text-center fz-sm text-gray-500 mb-3">
                        <tbody>
                            <tr>
                                <td class="p-3">
                                    <div class="form-check custom-radio">
                                        <input type="radio" name="shippingOption" class="form-check-input">
                                        <label for="" class="form-check-label text-body text-nowrap">Standard
                                            Shipping</label>
                                    </div>
                                </td>
                                <td class="p-3">Delivery in 5 - 7 working days</td>
                                <td class="p-3">$8.00</td>
                            </tr>
                            <tr>
                                <td class="p-3">
                                    <div class="form-check custom-radio">
                                        <input type="radio" name="shippingOption" class="form-check-input">
                                        <label for="" class="form-check-label text-body text-nowrap">Express
                                            Shipping</label>
                                    </div>
                                </td>
                                <td class="p-3">Delivery in 3 - 5 working days</td>
                                <td class="p-3">$12.00</td>
                            </tr>
                            <tr>
                                <td class="p-3">
                                    <div class="form-check custom-radio">
                                        <input type="radio" name="shippingOption" class="form-check-input">
                                        <label for="" class="form-check-label text-body text-nowrap">1 - 2
                                            Shipping</label>
                                    </div>
                                </td>
                                <td class="p-3">Delivery in 1 - 2 working days</td>
                                <td class="p-3">$18.00</td>
                            </tr>
                            <tr>
                                <td class="p-3">
                                    <div class="form-check custom-radio">
                                        <input type="radio" name="shippingOption" class="form-check-input">
                                        <label for="" class="form-check-label text-body text-nowrap">Free
                                            Shipping</label>
                                    </div>
                                </td>
                                <td class="p-3">Living won't the He one every subdue meat replenish face was you
                                    morning firmament darkness.</td>
                                <td class="p-3">$0.00</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label fz-sm text-gray-500" for="flexCheckDefault">
                            Ship to a different address?
                        </label>
                    </div>
                </div>

                <!-- payment -->
                <h5 class="fw-medium m-3">Payments</h5>
                <div class="list-group list-group-sm mb-4 ">
                    <div class="list-group-item button rounded-0">
                        <div class="form-check custom-radio button_2">
                            <input type="radio" name="paymentOption" class="form-check-input ">
                            <label for="" class="form-check-label text-gray-500 text-nowrap">Credit Card <img
                                    src="assets/creditcard.svg" alt="" class="img-fluid"></label>
                        </div>
                    </div>
                    <div class="list-group-item button rounded-0 mb-3">
                        <div class="form-check custom-radio button_2">
                            <input type="radio" name="paymentOption" class="form-check-input">
                            <label for="" class="form-check-label text-gray-500 text-nowrap"><img
                                    src="assets/paypal.svg" alt="" class="img-fluid"></label>
                        </div>
                    </div>
                    <textarea class="form-control form-control-sm mb-4 mb-md-0 fz-sm text-gray-500 button" rows="5"
                        placeholder="Order Notes (optional)" name="user_note"></textarea>
                </div>
            </div>

            <div class="col-12 col-md-5 col-lg-4 offset-lg-1">
                <h5 class="fw-medium">Order Items</h5>
                <ul class="list-group list-group-lg list-group-flush-x mb-4">
                    @foreach ($cart as $item)
                    <li class="list-group-item button_2 border-0">
                        <hr class="my-4">
                        <div class="row align-items-center button_2 border-0">
                            <div class="col-4">
                                <a href="detail.html"><img src="{{ $item['image_1'] }}" class="img-fluid" alt=""></a>
                            </div>
                            <div class="col">
                                <p class="mb-4 fz fw-medium">
                                    <a href="detail.html" class="text-body">{{ $item['name'] }}</a>
                                </p>
                                <span class="text-body-secondary fw-medium">${{ number_format($item['price']) }}</span>
                                <div class="fz-sm text-body-secondary">
                                    Quantity: {{ $item['quantity'] }}
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <!-- Total -->
                <div class="card mb-4 bg-light button fz-sm">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex bg-light text-black mt-3">
                                <span>Subtotal</span>
                                <span
                                    class="ms-auto mb-3">${{ number_format(array_sum(array_column($cart, 'price'))) }}</span>
                            </li>
                            <li class="list-group-item d-flex bg-light text-black mt-3">
                                <span>Tax</span>
                                <span class="ms-auto mb-3">$00.00</span>
                            </li>
                            <li class="list-group-item d-flex bg-light text-black mt-3">
                                <span>Shipping</span>
                                <span class="ms-auto mb-3">$10.00</span>
                            </li>
                            <li class="list-group-item d-flex bg-light text-black mt-3">
                                <span class="fw-semibold">Total</span>
                                <span
                                    class="ms-auto mb-3">${{ number_format(array_sum(array_column($cart, 'price')) + 10) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Description -->
                <div class="mb-4 fz-sm text-gray-500 d-flex align-items-start justify-content-center gap-2">
                    <input type="checkbox" class="mt-1" required>
                    <label for="">
                        <span>
                            Your personal data will be used to process your order, support your experience throughout
                            this
                            website, and for other purposes described in our privacy policy.
                        </span>
                    </label>
                </div>
                <!-- Button -->
                <button type="submit" class="btn button mt-4 p-3 w-100 btn-dark mb-2">
                    Place Order
                </button>
            </div>
        </form>

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
@endsection