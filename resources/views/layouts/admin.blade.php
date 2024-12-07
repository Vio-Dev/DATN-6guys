<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resource/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>
    <header>
        header - here
    </header>
    <div class="container">
        <div class="sidebar">
            sidebar
        </div>
        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>

</body>

</html>