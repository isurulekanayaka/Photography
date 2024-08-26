<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
    
</head>

<body>
    @include('components.nav-bar')
    <div class="w-screen min-h-screen">
        <div class="">
            <div class="">
                @yield('content')
            </div>
        </div>
    </div>
    @include('components.footer')
</body>