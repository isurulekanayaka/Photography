<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
                url('{{ asset('images/camera1.png') }}'),
                url('{{ asset('images/camera2.png') }}');
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
    <script>
        document.addEventListener('mousemove', function(e) {
            // Get mouse position
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            // Normalize mouse position to a value between 0 and 1
            const normX = mouseX / window.innerWidth;
            const normY = mouseY / window.innerHeight;

            // Calculate color intensity based on mouse position
            // Keep the color close to black by limiting the range
            const intensity = 0 + (normX + normY) * 30; // Adjust the range to control darkness

            // Calculate RGB values
            const red = Math.min(intensity, 255);
            const green = Math.min(intensity, 255);
            const blue = Math.min(intensity, 255);

            // Set the background color
            document.body.style.backgroundColor = `rgb(${red}, ${green}, ${blue})`;
        });
    </script>
</head>

<body class="">
    @extends('layout.layout')
    @section('content')
        <div class="">
            <div class="bg-cover bg-center bg-fixed" style="background-image: url('{{ asset('images/login.webp') }}')">
                <div class="h-screen flex justify-center items-center">
                    <div class="bg-white p-8 w-full md:max-w-[525px] rounded-xl mx-auto">
                        <h1 class="text-3xl font-bold mb-8 text-center">Login</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf <!-- CSRF token for security -->
                            <div class="mb-4">
                                <label class="block font-semibold text-gray-700 mb-2" for="email">
                                    Email Address
                                </label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="email" name="email" type="email" placeholder="Enter your email address" value="{{ old('email') }}" />
                                @error('email')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block font-semibold text-gray-700 mb-2" for="password">
                                    Password
                                </label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                    id="password" name="password" type="password" placeholder="Enter your password" />
                                @error('password')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                                <a class="text-black hover:text-black" href="#">Forgot your password?</a>
                            </div>
                            <div class="mb-6">
                                <button
                                    class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                                    type="submit">
                                    Login
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>


</html>
