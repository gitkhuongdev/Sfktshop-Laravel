@extends('layout')
@section('title')
{{$product->name}}
@endsection
@section('content')
<div class="minibanner pt-4 pb-3 justify-content-center">
    <h6 class="text-center minibanner_text">⚡️ HAPPY HOLIDAY DEALS ON EVERYTHING ⚡️</h6>
</div>


<!-- LINK  -->
<section class="py-1">
    <div class="container">

        <!-- LINK -->
        <div class="row">
            <!-- FILTER LIST -->
            <div class="row align-items-center mb-2 mt-4">
                <div class="col-12 col-md">

                    <nav class="mt-1 filter_fz fz-sm" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-gray-500 link_page" href="/">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-gray-500 link_page"
                                    href="#">{{ $categoryName }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a class="text-gray-500 link_page"
                                    href="#">{{ $product->name }}</a></li>
                        </ol>
                    </nav>

                </div>

            </div>
        </div>



    </div>
</section>

<!-- IMAGE DETAIL -->
<section class="mb-5">
    <div class="container">


        <div class="col-12">
            <div class="row">
                <!-- IMAGE -->
                <div class="col-12 col-md-6 mb-5">

                    <div class=" tab-content mt-2">
                        <!-- Content for Image 1 -->
                        <div class="tab-pane fade object-fit-contain show active" id="image1">
                            <img src="{{ $product->image_1 }}" alt="Image 1" class="img-fluid"
                                style="width: 580px;height: 600px;">
                        </div>
                        <!-- Content for Image 2 -->
                        <div class="tab-pane fade object-fit-contain" id="image2">
                            <img src="{{ $product->image_2 }}" alt="Image 2" class="img-fluid"
                                style="width: 580px;height: 600px;">
                        </div>
                        <!-- Content for Image 3 -->
                        <div class="tab-pane fade object-fit-contain" id="image3">
                            <img src="{{ $product->image_3 }}" alt="Image 3" class="img-fluid"
                                style="width: 580px;height: 600px;">
                        </div>


                    </div>



                    <div class="nav nav-tabs gap-3 mt-3" id="imageTabs">

                        <a class="active " id="tab1" data-bs-toggle="tab" href="#image1" role="presentation">
                            <img style="width: 100px; height: 120px" src="{{ $product->image_1 }}" alt="Image 1"
                                class="img-fluid object-fit-contain border-0 p-0 rounded-0 presentation">
                        </a>


                        <a class="" id="tab2" data-bs-toggle="tab" href="#image2" role="presentation">
                            <img style="width: 100px; height: 120px" src="{{ $product->image_2 }}" alt="Image 2"
                                class="img-fluid object-fit-contain border-0 p-0 rounded-0 presentation">
                        </a>


                        <a class="" id="tab3" data-bs-toggle="tab" href="#image3" role="presentation">
                            <img style="width: 100px; height: 120px" src="{{ $product->image_3 }}" alt="Image 3"
                                class="img-fluid object-fit-contain border-0 p-0 rounded-0 presentation">
                        </a>

                    </div>

                </div>


                <!-- CHOOSE -->
                <div class="col-12 col-md-6 ps-lg-5">
                    <form action="/addtocart/{{$product->id}}" method="post">
                        @csrf

                        <input type="hidden" name="idProduct" value="{{ $product->id }}">

                        <div class="row mb-1">
                            <div class="col">
                                <a href="shop.html" class="text-gray-400 link_page fz">{{$categoryName}}</a>
                            </div>
                            <div class="col-auto">
                                <div class="rating fz-sm text-black-50">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <a href="" class="fz-sm text-reset ms-2">Reviews (7)</a>
                            </div>
                        </div>

                        <h3 class="mt-3 text-black mb-5">{{$product->name}}</h3>

                        <div class="mb-5">
                            <span
                                class="fw-medium text-gray-400 text-decoration-line-through fz">${{ number_format($product->price) }}</span>
                            <span
                                class="ms-1 fw-semibold text-primary fz-lg">${{ number_format($product->price - ($product->price * ($product->sale / 100))) }}</span>
                            @if ($product-> quantity > 0)
                            <span class="fs-sm ms-1 fz-sm">(In Stock)</span>
                            @endif
                        </div>


                        <!--CHOOSE COLOR -->
                        <div class="form-group">
                            <div class="col-12 col-md-6 mb-5">
                                <div style="width: 120px;" class="d-inline-flex justify-content-between">Color:
                                    <div class=" tab-content">
                                        <div class="tab-pane fade show active fw-semibold" id="color1">
                                            Black
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="color2">
                                            White
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="color3">
                                            Red
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="color4">
                                            Blue
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="color5">
                                            Yellow
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="color6">
                                            Green
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="color7">
                                            Brown
                                        </div>
                                    </div>
                                </div>

                                <div class="nav nav-tabs gap-3 mt-3 col-xl-6 col-md-6 col-sm-4" id="imageTabs">
                                    <a class="active " id="tab1" data-bs-toggle="tab" href="#color1"
                                        role="presentation">
                                        <div class="color color_black"></div>
                                    </a>
                                    <a class="" id="tab2" data-bs-toggle="tab" href="#color2" role="presentation">
                                        <div class="color color_white"></div>
                                    </a>
                                    <a class="" id="tab2" data-bs-toggle="tab" href="#color3" role="presentation">
                                        <div class="color color_red"></div>
                                    </a>
                                    <a class="" id="tab2" data-bs-toggle="tab" href="#color4" role="presentation">
                                        <div class="color color_blue"></div>
                                    </a>
                                    <a class="" id="tab2" data-bs-toggle="tab" href="#color5" role="presentation">
                                        <div class="color color_yellow"></div>
                                    </a>
                                    <a class="" id="tab2" data-bs-toggle="tab" href="#color6" role="presentation">
                                        <div class="color color_green"></div>
                                    </a>
                                    <a class="" id="tab2" data-bs-toggle="tab" href="#color7" role="presentation">
                                        <div class="color color_brown"></div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- CHOOSE SIZE -->
                        <div class="form-group mb-5">
                            <div class="col-12 col-md-12 mb-5">
                                <div class="d-inline-flex justify-content-between gap-2">Size:
                                    <div class=" tab-content">
                                        <div class="tab-pane fade show active fw-semibold" id="size1">
                                            6
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size2">
                                            6.5
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size3">
                                            7
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size4">
                                            7.5
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size5">
                                            8
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size6">
                                            8.5
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size7">
                                            9
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size8">
                                            9.5
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size9">
                                            10
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size10">
                                            10.5
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size11">
                                            11
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size12">
                                            11.5
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size13">
                                            12
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size14">
                                            12.5
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size15">
                                            13
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size16">
                                            13.5
                                        </div>
                                        <div class="tab-pane fade fw-semibold" id="size17">
                                            14
                                        </div>
                                    </div>
                                    <span class="fw-semibold">US</span>
                                </div>

                                <div class="nav nav-tabs gap-3 mt-3 col-xl-12 col-md-12 col-sm-12" id="imageTabs">
                                    <a class="active " id="tab1" data-bs-toggle="tab" href="#size1" role="presentation">
                                        <div class="size text-gray-400 fz">6</div>
                                    </a>
                                    <a class="disabled " id="tab2" data-bs-toggle="tab" href="#size2"
                                        role="presentation">
                                        <div class="size size_over text-gray-400 fz text-decoration-line-through ">
                                            6.5</div>
                                    </a>
                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size3" role="presentation">
                                        <div class="size text-gray-400 fz">7</div>
                                    </a>
                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size4" role="presentation">
                                        <div class="size text-gray-400 fz">7.5</div>
                                    </a>
                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size5" role="presentation">
                                        <div class="size text-gray-400 fz">8</div>
                                    </a>
                                    <a class="disabled" id="tab2" data-bs-toggle="tab" href="#size6"
                                        role="presentation">
                                        <div class=" size size_over text-gray-400 fz text-decoration-line-through  ">
                                            8.5</div>
                                    </a>
                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size7" role="presentation">
                                        <div class="size text-gray-400 fz">9</div>
                                    </a>

                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size8" role="presentation">
                                        <div class="size text-gray-400 fz">9.5</div>
                                    </a>

                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size9" role="presentation">
                                        <div class="size text-gray-400 fz">10</div>
                                    </a>

                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size10" role="presentation">
                                        <div class="size text-gray-400 fz">10.5</div>
                                    </a>

                                    <a class="disabled" id="tab2" data-bs-toggle="tab" href="#size11"
                                        role="presentation">
                                        <div class=" size size_over text-gray-400 fz text-decoration-line-through  ">
                                            11</div>
                                    </a>

                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size12" role="presentation">
                                        <div class="size text-gray-400 fz">11.5</div>
                                    </a>

                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size13" role="presentation">
                                        <div class="size text-gray-400 fz">12</div>
                                    </a>

                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size14" role="presentation">
                                        <div class="size text-gray-400 fz">12.5</div>
                                    </a>

                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size15" role="presentation">
                                        <div class="size text-gray-400 fz">13</div>
                                    </a>

                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size16" role="presentation">
                                        <div class="size text-gray-400 fz">13.5</div>
                                    </a>

                                    <a class="" id="tab2" data-bs-toggle="tab" href="#size17" role="presentation">
                                        <div class="size text-gray-400 fz">14</div>
                                    </a>
                                </div>
                            </div>

                            <!-- Button trigger modal -->

                            <button type="button" class="btn text-black size_chart text-decoration-underline"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="assets/icon-ruler.svg" alt=""> Size chart
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 " id="exampleModalLabel">Size chart</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-5">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 550px;">ASIA</th>
                                                        <th style="width: 550px;">US</th>
                                                        <th style="width: 550px;">UK</th>
                                                        <th style="width: 550px;">(cm)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Add rows for sizes 5 to 14 -->
                                                    <tr>
                                                        <td>36</td>
                                                        <td>5.5</td>
                                                        <td>3.5</td>
                                                        <td>22.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>37</td>
                                                        <td>6.5</td>
                                                        <td>4.5</td>
                                                        <td>23.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>38</td>
                                                        <td>7.5</td>
                                                        <td>5.5</td>
                                                        <td>24.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>39</td>
                                                        <td>8.5</td>
                                                        <td>6.5</td>
                                                        <td>25.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>40</td>
                                                        <td>9.5</td>
                                                        <td>7.5</td>
                                                        <td>26.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>41</td>
                                                        <td>10.5</td>
                                                        <td>8.5</td>
                                                        <td>27.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>42</td>
                                                        <td>11.5</td>
                                                        <td>9.5</td>
                                                        <td>28.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>43</td>
                                                        <td>12.5</td>
                                                        <td>10.5</td>
                                                        <td>29.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>44</td>
                                                        <td>13.5</td>
                                                        <td>11.5</td>
                                                        <td>30.5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>45</td>
                                                        <td>14.5</td>
                                                        <td>12.5</td>
                                                        <td>31.5</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- ADD CART -->
                        <div class="row gx-5 mb-3">
                            <div class="col-12 col-lg-auto">
                                <input type="number" aria-label="quantity" name="quantity" value="1" min="1" max="100"
                                    class="form-control p-3 w-100">
                            </div>

                            <div class="col-12 col-lg-auto">
                                <button class="button btn w-100 btn-dark mb-2 p-3">
                                    Add to Cart <i class="fa-solid fa-cart-shopping fa-bounce"></i>
                                </button>
                            </div>
                            <div class="col-12 col-lg-auto">
                                <button type="submit" class="button btn btn-light w-100 mb-2 p-3" type="submit"
                                    data-bs-toggle="button">
                                    Wishlist <i class="fa-regular fa-heart "></i>
                                </button>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>


<!-- DESCRIPTION -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="nav nav-pills mb-3 nav-overflow justify-content-center justify-content-md-center border-bottom"
                    id="pills-tab" role="tablist">
                    <div class="nav-item" role="presentation">
                        <button class="nav-link button_2 fw-semibold fz-sm active" id="description-tab"
                            data-bs-toggle="pill" data-bs-target="#description" type="button" role="tab"
                            aria-controls="description" aria-selected="true">Description</button>
                    </div>
                    <div class="nav-item" role="presentation">
                        <button class="nav-link button_2 fw-semibold fz-sm" id="sizeandfit-tab" data-bs-toggle="pill"
                            data-bs-target="#sizeandfit" type="button" role="tab" aria-controls="sizeandfit"
                            aria-selected="false">Size and Fit</button>
                    </div>
                    <div class="nav-item" role="presentation">
                        <button class="nav-link button_2 fw-semibold fz-sm" id="shipping-tab" data-bs-toggle="pill"
                            data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping"
                            aria-selected="false">Shipping</button>
                    </div>

                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-tab" tabindex="0">
                        <div class="row justify-content-center py-2">
                            <div class="col-12 col-lg-10 col-xl-8">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-gray-500 fz-sm">
                                            {!! $product->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sizeandfit" role="tabpanel" aria-labelledby="sizeandfit-tab"
                        tabindex="0">
                        <div class="row justify-content-center py-2">
                            <div class="col-12 col-lg-10 col-xl-8">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <h6>Fitting Information</h6>
                                        <ul class="fz-sm text-gray-500">
                                            <li>Upon seas hath every years have whose subdue creeping they're it
                                                were.</li>
                                            <li>Make great day bearing.</li>
                                            <li>For the moveth is days don't said days.</li>
                                        </ul>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <h6>Model measurements:</h6>
                                        <ul class="fz-sm text-gray-500">
                                            <li>Height: 1.80 m</li>
                                            <li>Bust/Chest: 89 cm</li>
                                            <li>Hips: 91 cm</li>
                                            <li>Waist: 65 cm</li>
                                            <li>Model size: M</li>
                                        </ul>
                                        <!-- Button trigger modal -->

                                        <button type="button"
                                            class="btn text-black size_chart text-decoration-underline"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="assets/icon-ruler.svg" alt=""> Size chart
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 " id="exampleModalLabel">Size
                                                            chart</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-5">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 550px;">ASIA</th>
                                                                    <th style="width: 550px;">US</th>
                                                                    <th style="width: 550px;">UK</th>
                                                                    <th style="width: 550px;">(cm)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- Add rows for sizes 5 to 14 -->
                                                                <tr>
                                                                    <td>36</td>
                                                                    <td>5.5</td>
                                                                    <td>3.5</td>
                                                                    <td>22.5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>37</td>
                                                                    <td>6.5</td>
                                                                    <td>4.5</td>
                                                                    <td>23.5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>38</td>
                                                                    <td>7.5</td>
                                                                    <td>5.5</td>
                                                                    <td>24.5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>39</td>
                                                                    <td>8.5</td>
                                                                    <td>6.5</td>
                                                                    <td>25.5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>40</td>
                                                                    <td>9.5</td>
                                                                    <td>7.5</td>
                                                                    <td>26.5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>41</td>
                                                                    <td>10.5</td>
                                                                    <td>8.5</td>
                                                                    <td>27.5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>42</td>
                                                                    <td>11.5</td>
                                                                    <td>9.5</td>
                                                                    <td>28.5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>43</td>
                                                                    <td>12.5</td>
                                                                    <td>10.5</td>
                                                                    <td>29.5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>44</td>
                                                                    <td>13.5</td>
                                                                    <td>11.5</td>
                                                                    <td>30.5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>45</td>
                                                                    <td>14.5</td>
                                                                    <td>12.5</td>
                                                                    <td>31.5</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab"
                        tabindex="0">
                        <div class="row justify-content-center py-2">
                            <div class="col-12 col-lg-10 col-xl-8">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table fz-sm text-gray-500">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Region</th>
                                                    <th scope="col">Shipping Method</th>
                                                    <th scope="col">Weight Range (kg)</th>
                                                    <th scope="col">Shipping Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">North America</th>
                                                    <td>Standard Shipping</td>
                                                    <td>0 - 5</td>
                                                    <td>$10.00</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">North America</th>
                                                    <td>Express Shipping</td>
                                                    <td>0 - 5</td>
                                                    <td>$20.00</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Europe</th>
                                                    <td>Standard Shipping</td>
                                                    <td>0 - 5</td>
                                                    <td>$15.00</td>
                                                </tr>
                                                <!-- Add more rows for different regions, shipping methods, and price ranges as needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>

<section class="py-5">
    <div class="container  mb-5">
        <div class="row">
            <div class="col-12 mb-5">
                <h4 class="text-center fz-lg">You might also like</h4>
            </div>

            <!-- PRODUCT -->
            @foreach ($relatedProducts as $product)

            <div class="col-6 col-md-4 col-lg-3">
                <div class="card mb-7">
                    <div class="badge bg-dark card-badge card-badge-start text-uppercase">{{ $product -> sale}}%</div>
                    <a href="{{ url('/detail', [$product->id]) }}" class="product-link">
                        <div class="card-img rounded-0 w-100">
                            <div class="card-img-hover">
                                <img class="card-img-back" src="{{$product -> image_1}}" alt="">
                                <div class="hover-icons">
                                    <i class="fas fa-heart"></i> <!-- Icon yêu thích -->
                                    <i class="fas fa-shopping-cart"></i> <!-- Icon giỏ hàng -->
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
                            <a href="{{ url('/detail', [$product->id]) }}"
                                class="text-black fw-medium line-clamp-2 height_50">{{$product -> name}}</a>
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
    </div>
</section>


<!-- COMMENT -->
<section class="py-5">

    <!-- TITLE comment -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center fz-lg">Customer Reviews</h4>
            </div>
        </div>

        <!-- STAR -->
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-auto">
                <div class="dropdown">
                    <a class="btn dropdown-toggle button_2 border-0 text-black fz" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Sort By: Newest <i class="fa-solid fa-angle-down"></i>
                    </a>

                    <div class="dropdown-menu button">
                        <div><a class="dropdown-item" href="#">Newest</a></div>
                        <div><a class="dropdown-item" href="#">Oldest</a></div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-md text-md-center">
                <div class="rating text-dark fz-lg mb-4 mb-md-0 gap-2">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>

                <strong class="fz-sm fw-medium text-gray-500">Reviews(3)</strong>
            </div>

            <div class="col-12 col-md-auto">

                <!-- Button -->
                <a class="btn btn-sm btn-dark button p-lg-3" data-bs-toggle="collapse" href="#reviewForm">
                    Write Review
                </a>

            </div>
        </div>

        <!-- New Review -->
        <div class="collapse" id="reviewForm">

            <!-- Divider -->
            <hr class="my-8">

            <!-- Form -->
            <form action="/comments" method="post">
                @csrf

                <input type="hidden" name="idProduct" value="{{ $productId }}">

                <input type="hidden" name="idUser" value="{{ auth()->check() ? auth()->user()->id : '' }}">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <input class="form-control fz" id="reviewName" type="text" placeholder="Your Name *"
                                required value="{{ auth()->check() ? auth()->user()->name : '' }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <input class="form-control fz" id="reviewEmail" type="email" placeholder="Your Email *"
                                required value="{{ auth()->check() ? auth()->user()->email : '' }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <input class="form-control fz" id="reviewTitle" type="text" placeholder="Review Title *"
                                required name="title">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <textarea class="form-control fz" id="reviewText" rows="5" placeholder="Review *" required
                                name="content"></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-outline-dark button p-3" type="submit">Post Review</button>
                    </div>

            </form>
        </div>

    </div>
    </div>

    <!-- Content Comment -->
    <div class="container mb-5">
        @foreach($listComment as $comment)
        <div class="card mb-3">
            <div class="card-body button">
                <div class="row">
                    <div class="col-12 col-md-auto">
                        <img style="width: 80px;" src="/{{ $comment->user_avatar }}"
                            class="img-thumbnail rounded-circle border-0" alt="...">
                    </div>
                    <!-- <div class="col-9"> -->
                    <div class="col-12 col-md">
                        <div class="row">
                            <!-- rate star -->
                            <div class="row justify-content-start mb-2">
                                <div class="rating text-dark fz-sm mb-4 mb-md-0 gap-1">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <!-- user -->
                            <h6 class="fz-sm text-gray-500 fw-normal">{{ $comment->user_name }},
                                {{ $comment->created_at }}</h6>
                        </div>

                        <div class="row mt-2 mb-3">
                            <h4 class="text-black fz">{{ $comment->title }}</h4>
                            <p class="fz-sm text-gray-500">{{ $comment->content }}</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        @endforeach

        <!-- PAGINATION -->
        <nav class="d-flex justify-content-center">
            <ul class="pagination pagination-sm text-gray-400 ">
                <li class="page-item">
                    <a class="page-link page-link-arrow" href="#">
                        <i class="fa fa-caret-left"></i>
                    </a>
                </li>

                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>

                <li class="page-item">
                    <a class="page-link page-link-arrow" href="#">
                        <i class="fa fa-caret-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>

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