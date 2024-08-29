<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

        .bgicons {
            background-image:
                /* url('{{ asset('images/camera1.png') }}'),
                url('{{ asset('images/camera2.png') }}'); */
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

<body class="text-gray-800 font-inter bgicons">

    @extends('layout.admin-layout')

    @section('admin-content')
    <h1 class="text-center text-5xl text-orange-500 font-semibold mt-6">Admin Dashboard</h1>
    <div class="mx-5 mt-20">
        <div class="my-5">
            <h1 class="text-4xl border-b border-b-black">System Users</h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full min-w-0">
            <!-- Photographer Card -->
            <div class="flex flex-col px-8 py-6 bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:scale-105 hover:shadow-2xl">
                <div class="flex flex-col items-center space-y-2">
                    <div class="text-6xl font-extrabold tracking-tight leading-none text-blue-500">{{$photographerCount}}</div>
                    <div class="text-xl font-medium text-blue-500">Photographers</div>
                </div>
            </div>
            <!-- User Card -->
            <div class="flex flex-col px-8 py-6 bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:scale-105 hover:shadow-2xl">
                <div class="flex flex-col items-center space-y-2">
                    <div class="text-6xl font-extrabold tracking-tight leading-none text-amber-500">{{$userCount}}</div>
                    <div class="text-xl font-medium text-amber-600">Users</div>
                </div>
            </div>
            <!-- Admin Card -->
            <div class="flex flex-col px-8 py-6 bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:scale-105 hover:shadow-2xl">
                <div class="flex flex-col items-center space-y-2">
                    <div class="text-6xl font-extrabold tracking-tight leading-none text-red-500">{{$adminCount}}</div>
                    <div class="text-xl font-medium text-red-600">Admins</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mx-5 mt-20">
        <div class="my-5">
            <h1 class="text-4xl border-b border-b-black">System Categories</h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full min-w-0">
            <!-- Categories Card -->
            <div class="flex flex-col px-8 py-6 bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:scale-105 hover:shadow-2xl">
                <div class="flex flex-col items-center space-y-2">
                    <div class="text-6xl font-extrabold tracking-tight leading-none text-blue-500">{{$categoryCount}}</div>
                    <div class="text-xl font-medium text-blue-500">Categories</div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection

</body>

</html>
