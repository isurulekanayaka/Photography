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
        .bgicons{
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

<body class="bgicons">
    @extends('layout.layout')
    @section('content')
    <div class="bgicons">
        <!-- Hero Section -->
        <div class="relative z-10 w-screen md:h-[60vh] h-[30vh] flex top-0 bg-cover bg-center bgicons"
            style="background-image: url('{{ asset('images/contact.webp') }}');">
            <!-- Dark overlay -->
            <div class="absolute inset-0 bg-black opacity-60"></div>
    
            <!-- Hero Text -->
            <div class="relative flex items-center justify-center w-full">
                <h2 class="text-2xl lg:text-5xl font-bold text-center text-white">
                    Contact <span class="text-orange-500">Us</span>
                </h2>
            </div>
        </div>
    
        <!-- Contact Content Section -->
        <section class="text-center py-12 px-4 w-full lg:w-[1275px] mx-auto mt-2 ">
            <h2 class="text-4xl font-bold text-orange-500 mb-4">Get in Touch</h2>
            <p class="text-gray-300 mb-8">We'd love to hear from you! Whether you have a question about our services, pricing, or anything else, our team is ready to answer all your questions.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-lg bgicons">
                    <h3 class="text-xl text-white font-semibold mb-4">Send Us a Message</h3>
                    <form action="" class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm text-gray-300 mb-2 flex justify-start">Your Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name"
                                class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm text-gray-300 mb-2 flex justify-start">Your Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email"
                                class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label for="message" class="block text-sm text-gray-300 mb-2 flex justify-start">Your Message</label>
                            <textarea id="message" name="message" placeholder="Type your message here"
                                class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-orange-500 h-32"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full py-3 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition duration-300 ease-in-out">
                            Send
                        </button>
                    </form>
                </div>
    
                <!-- Contact Details -->
                <div class="flex flex-col justify-center bgicons">
                    <div class="mb-6">
                        <h4 class="text-xl text-white font-semibold mb-2">Our Address</h4>
                        <p class="text-gray-300">123 Photography St, City, Country</p>
                    </div>
                    <div class="mb-6">
                        <h4 class="text-xl text-white font-semibold mb-2">Call Us</h4>
                        <p class="text-gray-300">+123 456 7890</p>
                    </div>
                    <div class="mb-6">
                        <h4 class="text-xl text-white font-semibold mb-2">Email Us</h4>
                        <p class="text-gray-300">contact@photography.com</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    @endsection
</body>


</html>
