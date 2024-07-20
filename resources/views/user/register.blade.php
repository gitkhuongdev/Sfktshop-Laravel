<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/SFKT_transparent.png" type="image/gif" sizes="100%" border-radius="50%">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ asset('assets/SFKT_transparent.png') }}" type="image/gif" sizes="100%" <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Sign in</title>
</head>

<body>
    <section class="vh-100 d-flex align-items-center">
        <div class="container shadow-lg  overflow-hidden p-0  d-flex  align-items-center">
            <div class="row p-0">
                <div class="col-12 col-md-6 col-xl-6">
                    <img src="{{ asset('assets/image/something (6).jpg')}}"
                        class="img-fluid border-0 p-0 rounded-0 h-100" alt="">
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <div class="row ">
                        <div class="row px-5 py-5">
                            <h2 class="mb-3">Sign in</h2>
                            <form action="{{url('register')}}" method="post">
                                @csrf
                                <div class="row mb-2">
                                    <!-- First name -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Full Name
                                                *</label>
                                            <input type="text" class="form-control form-control-sm p-2 rounded-2"
                                                placeholder="First Name" name="name" value="{{old('name')}}">
                                            <div class="text-danger fz-sm">
                                                @error('name') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Email *</label>
                                            <input type="email" class="form-control form-control-sm p-2 rounded-2"
                                                placeholder="Email" name="email" value="{{old('email')}}">
                                            <div class="text-danger fz-sm">
                                                @error('email') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Address *</label>
                                            <input type="text" class="form-control form-control-sm p-2 rounded-2"
                                                placeholder="Address" name="address" value="{{old('address')}}">
                                            <div class="text-danger fz-sm">
                                                @error('address') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CITY -->
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Password *</label>
                                            <input type="password" class="form-control form-control-sm p-2 rounded-2"
                                                placeholder="Password" name="password_1" value="{{old('password_1')}}">
                                            <div class="text-danger fz-sm">
                                                @error('password_1') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ZIP / Code -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password
                                                *</label>
                                            <input type="password" class="form-control form-control-sm p-2 rounded-2"
                                                placeholder="Confirm Password" name="password_2">
                                            <div class="text-danger fz-sm">
                                                @error('password_2') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Mobile Phone
                                                *</label>
                                            <input type="tel" class="form-control form-control-sm p-2 rounded-2"
                                                placeholder="Mobile Phone" name="phone" value="{{old('phone')}}">
                                            <div class="text-danger fz-sm">
                                                @error('phone') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn p-2 border-0 rounded-0 btn-dark ms-auto w-100">Sign
                                        in</button>
                                </div>

                                <div class="mt-5 d-flex justify-content-center fz-sm">
                                    <span class="text-gray-400">Already have an account? <a href="/login"
                                            class="text-warning">Log in</a></span>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
</body>

</html>