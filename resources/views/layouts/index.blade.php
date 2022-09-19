<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
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
    @yield('js')
</body>

</html>
