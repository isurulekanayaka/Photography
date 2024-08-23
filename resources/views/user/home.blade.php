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
            <div id="carousel" class="relative w-full overflow-hidden">
                <!-- slides -->
                <div class="relative lg:min-h-[95svh] min-h-[75svh] w-full">
                    <div class="slide absolute inset-0 hidden">
                        <div
                            class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-slate-900/85 to-transparent px-16 py-12 text-center">
                            <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white">
                                Wedding Photographers
                            </h3>
                            <p class="lg:w-1/2 w-full text-pretty text-sm text-slate-300">
                                Capture your special day with beautiful, timeless photography that tells your love story.
                            </p>
                        </div>
                        <img class="absolute w-full h-full inset-0 object-cover text-slate-700 dark:text-slate-300"
                            src="{{ asset('images/wedding.jpg') }}"
                            alt="A bride and groom embracing under a sunset, captured by a wedding photographer." />
                    </div>

                    <div class="slide absolute inset-0 hidden">
                        <div
                            class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-slate-900/85 to-transparent px-16 py-12 text-center">
                            <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white">
                                Portrait Photographers
                            </h3>
                            <p class="lg:w-1/2 w-full text-pretty text-sm text-slate-300">
                                Professional portrait photographers for capturing the essence of your personality in every
                                shot.
                            </p>
                        </div>
                        <img class="absolute w-full h-full inset-0 object-cover text-slate-700 dark:text-slate-300"
                            src="{{ asset('images/portrait1.jpg') }}"
                            alt="A close-up portrait of a smiling individual, captured by a portrait photographer." />
                    </div>

                    <div class="slide absolute inset-0 hidden">
                        <div
                            class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-slate-900/85 to-transparent px-16 py-12 text-center">
                            <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white">
                                Event Photographers
                            </h3>
                            <p class="lg:w-1/2 w-full text-pretty text-sm text-slate-300">
                                Make your events unforgettable with expert photography that captures every moment.
                            </p>
                        </div>
                        <img class="absolute w-full h-full inset-0 object-cover text-slate-700 dark:text-slate-300"
                            src="{{ asset('images/event.jpg') }}"
                            alt="A lively event scene with people dancing and laughing, captured by an event photographer." />
                    </div>
                </div>

                <!-- indicators -->
                <div id="indicators"
                    class="absolute rounded-xl bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2"
                    role="group" aria-label="slides">
                    <button class="indicator size-2 cursor-pointer rounded-full transition bg-slate-300/50"></button>
                    <button class="indicator size-2 cursor-pointer rounded-full transition bg-slate-300/50"></button>
                    <button class="indicator size-2 cursor-pointer rounded-full transition bg-slate-300/50"></button>
                </div>
            </div>

            <div class="lg:w-[1275px] lg:mt-20 my-10 lg:mx-auto">
                <section class="py-12 ">
                    <div class="container mx-auto px-4">
                        <h2 class="text-2xl lg:text-5xl font-bold text-center text-white mb-10">Find Your <span
                                class="text-orange-500">Perfect
                                Photographer</span></h2>
                        <form class="flex flex-row justify-center items-center gap-4 border-b">
                            <input type="text" placeholder="Search by name or keyword"
                                class="w-full  px-4 py-2  placeholder:text-white bg-transparent outline-none text-white">
                            <button type="submit">
                                <i class="fas fa-search text-white mr-4"></i>
                            </button>
                        </form>
                    </div>
                </section>
                <div class="lg:mt-10">
                    <div class="border-b-2 lg:w-1/2 border-orange-500 mb-10">
                        <h2 class=" text-white  text-3xl mb-1">Featured Photographers</h2>
                    </div>
                    <div class="flex items-center justify-center w-full h-full">
                        <div class="w-full relative flex items-center justify-center">
                            <button aria-label="slide backward"
                                class="absolute bg-orange-500 rounded-xl p-3 z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer"
                                id="prev">
                                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                                <div id="slider"
                                    class="h-full flex gap-8 items-center justify-start transition ease-out duration-700">
                                    <div class="flex flex-shrink-0 relative w-1/5 sm:w-1/5">
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
                                    <div class="flex flex-shrink-0 relative w-1/5 sm:w-1/5">
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
                                    <div class="flex flex-shrink-0 relative w-1/5 sm:w-1/5">
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
                                    <div class="flex flex-shrink-0 relative w-1/5 sm:w-1/5">
                                        <div
                                            class="bg-transparent border w-full border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                            <img src="{{ asset('images/profile01.jpg') }}" alt="Photographer 2"
                                                class="w-full h-48 object-cover rounded-lg mb-4">
                                            <h3 class="text-xl font-semibold text-white transition-colors duration-300">Jane
                                                Doe</h3>
                                            <p class="text-gray-100 transition-colors duration-300">Wedding Photographer
                                            </p>
                                            <p class="mt-4 transition-colors duration-300 text-orange-500">View Profile</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-shrink-0 relative w-1/5 sm:w-1/5">
                                        <div
                                            class="bg-transparent border w-full border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                            <img src="{{ asset('images/profile01.jpg') }}" alt="Photographer 2"
                                                class="w-full h-48 object-cover rounded-lg mb-4">
                                            <h3 class="text-xl font-semibold text-white transition-colors duration-300">
                                                Jane
                                                Doe</h3>
                                            <p class="text-gray-100 transition-colors duration-300">Wedding Photographer
                                            </p>
                                            <p class="mt-4 transition-colors duration-300 text-orange-500">View Profile</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-shrink-0 relative w-1/5 sm:w-1/5">
                                        <div
                                            class="bg-transparent border w-full border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                            <img src="{{ asset('images/profile01.jpg') }}" alt="Photographer 2"
                                                class="w-full h-48 object-cover rounded-lg mb-4">
                                            <h3 class="text-xl font-semibold text-white transition-colors duration-300">
                                                Jane
                                                Doe</h3>
                                            <p class="text-gray-100 transition-colors duration-300">Wedding Photographer
                                            </p>
                                            <p class="mt-4 transition-colors duration-300 text-orange-500">View Profile</p>
                                        </div>
                                    </div>
                                    <!-- Add more image containers as needed -->
                                </div>
                            </div>
                            <button aria-label="slide forward"
                                class="absolute bg-orange-500 p-3 rounded-xl z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400"
                                id="next">
                                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="lg:mt-10">
                    <div class="border-b-2 lg:w-1/2 border-orange-500 mb-10">
                        <h2 class="text-white text-3xl mb-1">Photographers Category</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
                        <!-- Wedding Photographer -->
                        <a href="#" class="text-orange-500 font-semibold inline-block">
                            <div
                                class="bg-transparent border border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/weddingcat.jpg') }}" alt="Wedding Photographer"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <p class="text-gray-100 transition-colors duration-300">Wedding Photographer</p>
                                <p class="mt-4 transition-colors duration-300"></p>
                            </div>
                        </a>

                        <!-- Portrait Photographer -->
                        <a href="#" class="text-orange-500 font-semibold inline-block">
                            <div
                                class="bg-transparent border border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/portraitcat.jpg') }}" alt="Portrait Photographer"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <p class="text-gray-100 transition-colors duration-300">Portrait Photographer</p>
                                <p class="mt-4 transition-colors duration-300"></p>
                            </div>
                        </a>

                        <!-- Event Photographer -->
                        <a href="#" class="text-orange-500 font-semibold inline-block">
                            <div
                                class="bg-transparent border border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/eventcat.jpg') }}" alt="Event Photographer"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <p class="text-gray-100 transition-colors duration-300">Event Photographer</p>
                                <p class="mt-4 transition-colors duration-300"></p>
                            </div>
                        </a>

                        <!-- Fashion Photographer -->
                        <a href="#" class="text-orange-500 font-semibold inline-block">
                            <div
                                class="bg-transparent border border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/fashioncat.jpg') }}" alt="Fashion Photographer"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <p class="text-gray-100 transition-colors duration-300">Fashion Photographer</p>
                                <p class="mt-4 transition-colors duration-300"></p>
                            </div>
                        </a>

                        <!-- Nature Photographer -->
                        <a href="#" class="text-orange-500 font-semibold inline-block">
                            <div
                                class="bg-transparent border border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/naturecat.jpg') }}" alt="Nature Photographer"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <p class="text-gray-100 transition-colors duration-300">Nature Photographer</p>
                                <p class="mt-4 transition-colors duration-300"></p>
                            </div>
                        </a>

                        <!-- Sports Photographer -->
                        <a href="#" class="text-orange-500 font-semibold inline-block">
                            <div
                                class="bg-transparent border border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/sportscat.jpg') }}" alt="Sports Photographer"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <p class="text-gray-100 transition-colors duration-300">Sports Photographer</p>
                                <p class="mt-4 transition-colors duration-300"></p>
                            </div>
                        </a>

                        <!-- Product Photographer -->
                        <a href="#" class="text-orange-500 font-semibold inline-block">
                            <div
                                class="bg-transparent border border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/productcat.jpg') }}" alt="Product Photographer"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <p class="text-gray-100 transition-colors duration-300">Product Photographer</p>
                                <p class="mt-4 transition-colors duration-300"></p>
                            </div>
                        </a>

                        <!-- Travel Photographer -->
                        <a href="#" class="text-orange-500 font-semibold inline-block">
                            <div
                                class="bg-transparent border border-white p-2 group hover:bg-[#252525] cursor-pointer hover:border-orange-500 rounded-lg shadow-lg transition-colors duration-300">
                                <img src="{{ asset('images/travelcat.jpg') }}" alt="Travel Photographer"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                                <p class="text-gray-100 transition-colors duration-300">Travel Photographer</p>
                                <p class="mt-4 transition-colors duration-300"></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="lg:w-[1275px] lg:mt-20 my-10 lg:mx-auto">
                <section class="py-12">
                    <div class="container mx-auto px-4 text-center">
                        <h2 class="text-2xl lg:text-5xl font-bold text-center text-white mb-10">How <span
                                class="text-orange-500">It Works</span></h2>
                        <div class="flex flex-col lg:flex-row justify-between items-start md:items-center gap-8">
                            <div class="flex-1">
                                <p
                                    class="text-9xl [text-shadow:5px_1px_0px_white,-5px_-1px_0px_white,5px_-1px_0px_white,-5px_1px_1px_white]">
                                    1</p>
                                <h3 class="text-xl font-semibold text-white">Search Photographers</h3>
                                <p class="text-gray-100">Use our search and filter tools to find photographers that match
                                    your
                                    needs.</p>
                            </div>
                            <div class="flex-1">
                                <p
                                    class="text-9xl [text-shadow:5px_1px_0px_white,-5px_-1px_0px_white,5px_-1px_0px_white,-5px_1px_1px_white]">
                                    2</p>
                                <h3 class="text-xl font-semibold text-white">Select and Book</h3>
                                <p class="text-gray-100">View profiles, compare photographers, and book the one that’s
                                    right
                                    for
                                    you.</p>
                            </div>
                            <div class="flex-1">
                                <p
                                    class="text-9xl [text-shadow:5px_1px_0px_white,-5px_-1px_0px_white,5px_-1px_0px_white,-5px_1px_1px_white]">
                                    3</p>
                                <h3 class="text-xl font-semibold text-white">Capture Your Moments</h3>
                                <p class="text-gray-100">Enjoy your event or session while your photographer captures
                                    stunning
                                    images.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <section class="py-12 bg-white text-white text-center">
                <div class="container mx-auto px-4">
                    <h2 class="text-2xl lg:text-3xl font-bold mb-4 text-black">Ready to Capture Your Moments?</h2>
                    <p class="mb-6 text-black">Sign up today and start finding the perfect photographer for your event.</p>
                    <a href="#" class="bg-black text-white px-6 py-2 rounded-lg font-semibold">Get
                        Started</a>
                </div>
            </section>
            <div class="lg:w-[1275px] lg:mt-10 my-20 lg:mx-auto">
                <section class=" ">
                    <div class="container mx-auto px-4 text-center">
                        <h2 class="text-2xl lg:text-5xl font-bold text-center text-white mb-10">What Our <span
                                class="text-orange-500">Customers Say</span></h2>
                        <div class="flex flex-col lg:flex-row justify-center items-start lg:items-center gap-8">
                            <div class="p-6 rounded-lg shadow-lg max-w-md mx-auto border">
                                <p class="text-white">“I found the perfect photographer for my wedding through this
                                    site.
                                    The process was so easy and the photos turned out amazing!”</p>
                                <h3 class="text-xl font-semibold text-gray-300 mt-4">Emily R.</h3>
                                <p class="text-sm text-gray-200">Bride</p>
                            </div>
                            <div class="p-6 rounded-lg shadow-lg max-w-md mx-auto border">
                                <p class="text-white">“Great experience! I loved the variety of photographers available
                                    and
                                    the booking process was seamless.”</p>
                                <h3 class="text-xl font-semibold text-gray-300 mt-4">Michael S.</h3>
                                <p class="text-sm text-gray-200">Event Organizer</p>
                            </div>
                            <!-- Add more testimonials as needed -->
                        </div>
                    </div>
                </section>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const slides = document.querySelectorAll('.slide');
                    const indicators = document.querySelectorAll('.indicator');
                    let currentSlideIndex = 0;
                    let autoplayIntervalTime = 3500;
                    let autoplayInterval;

                    function showSlide(index) {
                        slides.forEach((slide, i) => {
                            slide.classList.toggle('hidden', i !== index);
                        });
                        indicators.forEach((indicator, i) => {
                            indicator.classList.toggle('bg-slate-300', i === index);
                            indicator.classList.toggle('bg-slate-300/50', i !== index);
                        });
                    }

                    function nextSlide() {
                        currentSlideIndex = (currentSlideIndex + 1) % slides.length;
                        showSlide(currentSlideIndex);
                    }

                    function startAutoplay() {
                        autoplayInterval = setInterval(nextSlide, autoplayIntervalTime);
                    }

                    function stopAutoplay() {
                        clearInterval(autoplayInterval);
                    }

                    indicators.forEach((indicator, index) => {
                        indicator.addEventListener('click', function() {
                            stopAutoplay();
                            currentSlideIndex = index;
                            showSlide(currentSlideIndex);
                            startAutoplay();
                        });
                    });

                    showSlide(currentSlideIndex);
                    startAutoplay();
                });




                let defaultTransform = 0;

                function goNext() {
                    defaultTransform = defaultTransform - 398;
                    var slider = document.getElementById("slider");
                    if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7)
                        defaultTransform = 0;
                    slider.style.transform = "translateX(" + defaultTransform + "px)";
                }
                next.addEventListener("click", goNext);

                function goPrev() {
                    var slider = document.getElementById("slider");
                    if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
                    else defaultTransform = defaultTransform + 398;
                    slider.style.transform = "translateX(" + defaultTransform + "px)";
                }
                prev.addEventListener("click", goPrev);
            </script>
        </div>
        @endsection
</body>

</html>
