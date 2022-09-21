<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.3/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tournoi de Volleyball</title>
</head>

<body>
    <header>
        @include('partial.header')
    </header>

    <main class='w-8/12 mx-auto'>
        @yield('content')
    </main>

    <hr class="h-px my-3 bg-gray-200 border-none dark:bg-gray-700">

    <footer>
        @include('partial.footer')
    </footer>

    {{-- Script JS --}}
    <script src="/assets/js/main.js"></script>
    @yield('js')
</body>

</html>
