<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">    <script src="{{ asset('js/app.js') }}"></script>
    <title>Tirage</title>
</head>
<body>
    <div class="relative h-full bg-gray-50">
        @include('shared.topbar')
        <div class="pt-12 w-full lg:w-2/3 px-4 lg:mx-auto">
            @yield('content')
        </div>
    </div>
    
</body>
</html>