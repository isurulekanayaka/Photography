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
                style="background-image: url('{{ asset('images/camera-photos.gif') }}');">
                <!-- Dark overlay -->
                <div class="absolute inset-0 bg-black opacity-60"></div>

                <!-- Hero Text -->
                <div class="relative flex items-center justify-center w-full">
                    <h2 class="text-2xl lg:text-5xl font-bold text-center text-white">
                        About <span class="text-orange-500">Us</span>
                    </h2>
                </div>
            </div>

            <!-- Vision and Passion Section -->
            <section class="text-center py-12 px-4 w-full lg:w-[1275px] mx-auto mt-2 bgicons">
                <h2 class="text-4xl font-bold  text-orange-500">Our Vision and Passion</h2>
                <p class="mt-4 text-white max-w-2xl mx-auto">
                    At Propix Photography, we are more than just photographers—we are storytellers. Our vision is to create
                    timeless
                    images that capture the essence of your most treasured moments. Through our lens, we seek to reflect not
                    just the
                    visual beauty of a scene, but the emotions and memories that make it truly unforgettable.
                </p>
                <div class="flex justify-center space-x-8 mt-8 animate-fadeIn">
                    <div class="transition transform hover:scale-110">
                        <h3 class="text-4xl font-bold  text-orange-500">100+</h3>
                        <p class="text-white">Satisfied Clients</p>
                    </div>
                    <div class="transition transform hover:scale-110">
                        <h3 class="text-4xl font-bold  text-orange-500">15+</h3>
                        <p class="text-white">Years of Experience</p>
                    </div>
                </div>
            </section>

            <!-- Mission Section -->
            <section class="text-white pt-12 px-4 w-full lg:w-[1275px] mx-auto mt-2 ">
                <div class="bg-transparent border p-8 rounded-lg bg-gray-700 bgicons">
                    <h2 class="text-4xl font-bold text-center text-orange-500">Our Mission</h2>
                    <p class="mt-4 text-center max-w-2xl mx-auto">
                        Our mission is to craft beautiful and meaningful photography that tells your unique story. Whether
                        we're capturing
                        the joy of a wedding, the essence of a personal portrait, or the professionalism of a commercial
                        shoot, our goal is
                        to deliver images that are as memorable as they are impactful. We aim to exceed your expectations
                        with every shot,
                        ensuring that your memories are preserved in the most stunning way possible.
                    </p>
                </div>
            </section>

            <!-- New Section: Join Our Community -->
            <section class="text-center py-12 px-4 w-full lg:w-[1275px] mx-auto mt-8 bgicons">
                <h2 class="text-4xl font-bold  text-orange-500">Join Our Community</h2>
                <p class="mt-4 text-white max-w-2xl mx-auto">
                    Our platform is more than just a portfolio—it's a community. Whether you're a seasoned photographer
                    looking to expand
                    your reach or someone in search of the perfect photographer to capture your special moments, our website
                    offers the
                    tools you need. Create your profile, join our network of talented photographers, and let us help you
                    find the perfect
                    match for your unique photography needs.
                </p>
                <div class="flex flex-col lg:flex-row justify-center space-y-8 lg:space-y-0 lg:space-x-8 mt-8">
                    <div
                        class="bg-gray-700 p-6 rounded-lg hover:bg-gray-600 transition duration-300 hover:scale-110 cursor-pointer">
                        <h3 class="text-xl font-bold text-white mb-4">Create Your Profile</h3>
                        <p class="text-white">
                            Whether you're a photographer or a client, start by creating your profile. Showcase your work,
                            highlight your
                            skills, and let potential clients or photographers discover your unique talents.
                        </p>
                    </div>
                    <div
                        class="bg-gray-700 p-6 rounded-lg hover:bg-gray-600 transition duration-300 hover:scale-110 cursor-pointer">
                        <h3 class="text-xl font-bold text-white mb-4">Join as a Photographer</h3>
                        <p class="text-white">
                            Join our community of professional photographers and gain access to clients who are looking for
                            someone with
                            your expertise. Expand your reach and grow your business with our platform.
                        </p>
                    </div>
                    <div
                        class="bg-gray-700 p-6 rounded-lg hover:bg-gray-600 transition duration-300 hover:scale-110 cursor-pointer">
                        <h3 class="text-xl font-bold text-white mb-4">Find Your Perfect Match</h3>
                        <p class="text-white">
                            Searching for the right photographer? Our platform helps you find the perfect match based on
                            your preferences
                            and needs. Connect with photographers whose style and experience align with your vision.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    @endsection
</body>


</html>
