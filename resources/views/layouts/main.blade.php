<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <link id="proper" rel="icon" href="{{ asset('assets/images/') }}/image 2.png">
        <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Urbanist&display=swap" rel="stylesheet" />
        {!! ToastMagic::styles() !!}
        @yield('other_css')

    </head>


<body class="main-body">

    @include('layouts.includes.navigation')

    {{ $slot }}


    @include('layouts.includes.footer')
    

    {!! ToastMagic::scripts() !!}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    
</body>

</html>
