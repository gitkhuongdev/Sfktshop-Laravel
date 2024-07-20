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
    <title>Login</title>
</head>

<body>

    <section class="container">
        @if(session()->has('warn'))
        <div class="alert alert-warning p-2 text-center rounded-0">
            {!! session('warn') !!}
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger p-2 text-center rounded-0">
            {!! session('error') !!}
        </div>
        @endif

        @if(session()->has('success'))
        <div class="alert alert-success p-2 text-center rounded-0">
            {!! session('success') !!}
        </div>
        @endif
    </section>
    <section class="vh-100 d-flex align-items-center">
        <div class="container shadow-lg  overflow-hidden p-0  d-flex  align-items-center">
            <div class="row p-0">
                <div class="col-12 col-md-6 col-xl-6">
                    <img src="{{ asset('assets/image/something (7).jpg') }}"
                        class="img-fluid border-0 p-0 rounded-0 h-100" alt="">
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <div class="row ">


                        <div class="row px-5 mt-3">
                            <h2 class="mb-3">Login</h2>
                            <form action="{{url('login')}}" method="post">

                                @csrf
                                <div class="col-12 mb-3">
                                    <label class="form-label ">Email *</label>
                                    <input type="email" class="form-control form-control-sm rounded-1"
                                        placeholder="Email" name="email">
                                </div>
                                <div class="text-danger fz-sm">
                                    @error('email') {{ $message }} @enderror
                                </div>


                                <!-- Email -->
                                <div class="col-12 mb-3">
                                    <label class="form-label ">Password
                                        *</label>
                                    <input type="password" class="form-control form-control-sm rounded-1"
                                        placeholder="Password" name="password">

                                    <div class="text-danger fz-sm">
                                        @error('password') {{ $message }} @enderror
                                    </div>


                                </div>
                                <div class="col-12 mb-3">
                                    <button type="submit"
                                        class="btn p-2 border-0 rounded-0 btn-dark ms-auto w-100">Login</button>
                                </div>

                                <div class="d-flex align-item-center">
                                    <div class="fz-sm">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <span class="pl-3 text-gray-500"> Remember your password ?</span>
                                    </div>

                                    <a class="ms-auto fz-sm text-reset " href="forgot.html">Forgot Password</a>
                                </div>
                                <div class="mt-5 d-flex justify-content-center fz-sm">
                                    <span class="text-gray-400">Don't have an account? <a href="/register"
                                            class="text-warning">Sign in</a></span>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <script src="https://kit.fontawesome.com/84236ec286.js" crossorigin="anonymous"></script>

</body>

</html>