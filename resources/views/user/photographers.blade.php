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

<body>
    @extends('layout.layout')
    @section('content')
        <div>
            <div class="relative z-10 w-screen md:h-[60vh] h-[30vh] flex top-0 bg-cover bg-center"
                style="background-image: url('{{ asset('images/gif1.gif') }}');">
                <!-- Dark overlay -->
                <div class="absolute inset-0 bg-black opacity-60"></div>

                <!-- Content inside the div -->
                <div class="relative flex items-center justify-center w-full">
                    <h2 class="text-2xl lg:text-5xl font-bold text-center text-white">
                        Find Your <span class="text-orange-500">Perfect Photographer</span>
                    </h2>
                </div>
            </div>
            <div>
                <div class="w-full lg:w-[1275px] mx-auto mt-2">
                    <div class="w-full border md:flex p-5 gap-3 rounded-lg mx-auto">
                        <div class="flex flex-col w-full md:w-1/4 justify-center">
                            <label for="" class="text-white mb-3 text-lg">Photographer</label>
                            <input type="text" class="bg-transparent border rounded-lg p-1 text-white">
                        </div>
                        <div class="flex flex-col w-full md:w-1/4 justify-center">
                            <label for="" class="text-white mb-3 text-lg">Location</label>
                            <input type="text" class="bg-transparent border rounded-lg p-1 text-white">
                        </div>
                        
                        <div class="flex flex-col w-full md:w-1/4 justify-center">
                            <label for="" class="text-white mb-3 text-lg">Category</label>
                            <select name="" id="" class="bg-transparent border rounded-lg p-1 text-white">
                                <option value="">se</option>
                            </select>
                        </div>
                        <div class="flex flex-col w-full md:w-1/4 justify-end">
                            <button class="text-white bg-orange-500 px-2 py-1 rounded-lg  mt-3 md:mt-0">Search <i class="fas fa-search text-white ml-2"></i></button>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[1275px] mx-auto my-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
                        <div class="flex">
                            <div
                                class="bg-transparent border w-full border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/profile01.jpg') }}" alt="Photographer 2"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <h3 class="text-xl font-semibold text-white transition-colors duration-300">Jane
                                    Doe</h3>
                                <p class="text-gray-100 transition-colors duration-300">Wedding Photographer</p>
                                <p class="mt-4 transition-colors duration-300 text-orange-500">View Profile</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div
                                class="bg-transparent border w-full border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/profile01.jpg') }}" alt="Photographer 2"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <h3 class="text-xl font-semibold text-white transition-colors duration-300">Jane
                                    Doe</h3>
                                <p class="text-gray-100 transition-colors duration-300">Wedding Photographer</p>
                                <p class="mt-4 transition-colors duration-300 text-orange-500">View Profile</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div
                                class="bg-transparent border w-full border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/profile01.jpg') }}" alt="Photographer 2"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <h3 class="text-xl font-semibold text-white transition-colors duration-300">Jane
                                    Doe</h3>
                                <p class="text-gray-100 transition-colors duration-300">Wedding Photographer</p>
                                <p class="mt-4 transition-colors duration-300 text-orange-500">View Profile</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div
                                class="bg-transparent border w-full border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/profile01.jpg') }}" alt="Photographer 2"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <h3 class="text-xl font-semibold text-white transition-colors duration-300">Jane
                                    Doe</h3>
                                <p class="text-gray-100 transition-colors duration-300">Wedding Photographer</p>
                                <p class="mt-4 transition-colors duration-300 text-orange-500">View Profile</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div
                                class="bg-transparent border w-full border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/profile01.jpg') }}" alt="Photographer 2"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <h3 class="text-xl font-semibold text-white transition-colors duration-300">Jane
                                    Doe</h3>
                                <p class="text-gray-100 transition-colors duration-300">Wedding Photographer</p>
                                <p class="mt-4 transition-colors duration-300 text-orange-500">View Profile</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
