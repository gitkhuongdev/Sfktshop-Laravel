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
    <title>@yield('title', 'Verify')</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100 flex-column">
        <div class="rounded-1">
            @if(session()->has('success'))
            <div class="alert alert-success fz-sm p-2 text-center rounded-1">
                {!! session('success') !!}
            </div>
            @endif
        </div>
        <h3 class="alert alert-warning p-2 text-center rounded-1 fz-sm">
            You have not verified your email.
            Please check your email and click the email verification button to complete your account registration.
        </h3>
        <form action="{{route('verification.send')}}" method="post" class="w-75 text-center"> @csrf
            <button type="submit" class="btn btn-sm btn-danger p-2">Resend the verification email!</button>
        </form>
    </div>
</body>

</html>