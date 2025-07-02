<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/nav.js'])
    
</head>

<body class="m-0  md:pt-[90px] md:pl-[240px] bg-secondary min-h-screen flex flex-col">

    <div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 z-40 hidden bg-black bg-opacity-50 md:hidden"></div>
    
        @include('admin.includes.header')
        @include('admin.includes.sidebar')

        <main class="bg-secondary">

            @yield('content')

        </main>

 <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
