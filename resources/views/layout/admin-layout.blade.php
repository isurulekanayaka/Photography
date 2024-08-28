<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    <title>Admin Panel</title>
    <style>
        body {
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
            margin: 0;
            height: 100vh;
            background-color: black;
            /* overflow: hidden; Prevent scrollbars */
            transition: background-color 0.2s;
            /* Smooth transition */
        }
        .bgicons{
            background-image: 
            url('{{ asset('images/camera1.png') }}'), 
            url('{{ asset('images/camera1.png') }}');
        background-size: 32px 32px;
        background-position: 
            10% 20%, 
            80% 40%, 
            50% 60%, 
            30% 10%, 
            70% 80%;
        background-repeat: no-repeat;
        }
    </style>

</head>

<body class="text-gray-800 font-inter">
    <!--sidenav -->
    @include('components.admin-sidenav')
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main bgicons">
        <!-- navbar -->
        @include('components.admin-navbar')
        <!-- end navbar -->

        <!-- Content -->
        @yield('admin-content')
        <!-- End Content -->
    </main>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/admin-style.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>

</body>

</html>
