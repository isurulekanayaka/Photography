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
            <section class="w-full overflow-hidden dark:bg-gray-900">
                <div class="w-full mx-auto">
                    <!-- User Cover IMAGE -->
                    <img src="https://images.unsplash.com/photo-1560697529-7236591c0066?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMHx8Y292ZXJ8ZW58MHwwfHx8MTcxMDQ4MTEwNnww&ixlib=rb-4.0.3&q=80&w=1080"
                        alt="User Cover" class="w-full xl:h-[20rem] lg:h-[22rem] md:h-[16rem] sm:h-[13rem] xs:h-[9.5rem]" />

                    <!-- User Profile Image -->
                    <div class="md:w-full w-1/2 mx-auto flex justify-center">
                        <img src="{{ $photographer->profile_picture ? asset('storage/' . $photographer->profile_picture) : asset('images/default-image.jpg') }}"
                            alt="User Profile"
                            class="rounded-full object-cover xl:w-[16rem] xl:h-[16rem] lg:w-[16rem] lg:h-[16rem] md:w-[12rem] md:h-[12rem] sm:w-[10rem] sm:h-[10rem] xs:w-[8rem] xs:h-[8rem] outline outline-2 outline-offset-2 outline-orange-500 shadow-xl relative xl:bottom-[7rem] lg:bottom-[8rem] md:bottom-[6rem] sm:bottom-[5rem] xs:bottom-[4.3rem]" />
                    </div>

                    <div
                        class="xl:w-[1275px] lg:w-[1275px] md:w-[94%] sm:w-[96%] xs:w-[92%] mx-auto flex flex-col gap-4 justify-center items-center relative xl:-top-[6rem] lg:-top-[6rem] md:-top-[4rem] sm:-top-[3rem] xs:-top-[2.2rem]  px-2">
                        <!-- FullName -->
                        <h1 class="text-center text-orange-500 dark:text-white text-4xl">{{ $photographer->user->name }}
                        </h1>
                        <!-- About -->
                        <p class="w-full text-white text-md text-pretty sm:text-center xs:text-justify">
                            {{ $photographer->description }}</p>

                        <!-- Detail -->
                        <div class="w-full my-auto py-6 flex flex-col justify-center gap-2">
                            <div class="w-full flex sm:flex-row xs:flex-col gap-2 justify-center mx-auto">
                                <div class="w-1/4">
                                    <dl class="text-gray-900 divide-y divide-gray-200 ">
                                        <div class="flex flex-col py-3">
                                            <dt class="mb-1 text-white md:text-lg">Full Name</dt>
                                            <dd class="text-lg font-semibold text-gray-300">{{ $photographer->user->name }}
                                            </dd>
                                        </div>
                                        <div class="flex flex-col py-3">
                                            <dt class="mb-1 text-white md:text-lg">Email</dt>
                                            <dd class="text-lg font-semibold text-gray-300">{{ $photographer->user->email }}
                                            </dd>
                                        </div>
                                        <div class="flex flex-col py-3">
                                            <dt class="mb-1 text-white md:text-lg">Availability</dt>
                                            <dd class="text-lg font-semibold text-gray-300">Available</dd>
                                        </div>
                                    </dl>
                                </div>
                                <div class="w-1/4">
                                    <dl class="text-gray-900 divide-y divide-gray-200 ">
                                        <div class="flex flex-col py-3">
                                            <dt class="mb-1 text-white md:text-lg">Phone Number</dt>
                                            <dd class="text-lg font-semibold text-gray-300">
                                                {{ $photographer->user->contact }}</dd>
                                        </div>
                                        <div class="flex flex-col py-3">
                                            <dt class="mb-1 text-white md:text-lg">Location</dt>
                                            <dd class="text-lg font-semibold text-gray-300">{{ $photographer->area }}
                                                {{ $photographer->city }} </dd>
                                        </div>


                                        <div class="flex flex-col py-3">
                                            <dt class="mb-1 text-white md:text-lg">Website</dt>
                                            <dd class="text-lg font-semibold text-gray-300">{{ $photographer->website }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                                <div class="w-2/4">
                                    <div
                                        class="p-8 rounded-lg shadow-lg max-w-md mx-auto border border-gray-700 mb-10 bg-transparent">
                                        <h3 class="text-2xl text-white font-semibold mb-4">Send Your Message Quickly</h3>
                                        <form action="" class="space-y-4">
                                            <div>
                                                <label for="message" class="block text-sm text-gray-300 mb-2">Your
                                                    Message</label>
                                                <textarea id="message" name="message" placeholder="Type your message here"
                                                    class="w-full p-3 rounded-lg bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none h-32"></textarea>
                                            </div>
                                            <button type="submit"
                                                class="w-full py-3 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition duration-300 ease-in-out">
                                                Send
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Cards -->
                        <section>
                            <div id="imageGallery" class="w-full h-full select-none">
                                <div class="max-w-6xl mx-auto py-8">
                                    <ul id="gallery" class="grid grid-cols-2 gap-8 lg:grid-cols-5">
                                        <li class="group relative">
                                            <img onclick="imageGalleryOpen(event)"
                                                src="https://images.pexels.com/photos/2356059/pexels-photo-2356059.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                alt="Scenic view of a mountain during sunrise"
                                                class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                loading="lazy" />
                                        </li>
                                        <li class="group relative">
                                            <img onclick="imageGalleryOpen(event)"
                                                src="https://images.pexels.com/photos/3618162/pexels-photo-3618162.jpeg"
                                                alt="Beautiful sunset over the ocean"
                                                class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                loading="lazy" />
                                        </li>
                                        <li class="group relative">
                                            <img onclick="imageGalleryOpen(event)"
                                                src="https://images.unsplash.com/photo-1689217634234-38efb49cb664?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80"
                                                alt="Forest with sunlight filtering through trees"
                                                class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                loading="lazy" />
                                        </li>
                                        <li class="group relative">
                                            <img onclick="imageGalleryOpen(event)"
                                                src="https://images.unsplash.com/photo-1520350094754-f0fdcac35c1c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80"
                                                alt="Snow-covered mountain peak"
                                                class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                loading="lazy" />
                                        </li>
                                        <li class="group relative">
                                            <img onclick="imageGalleryOpen(event)"
                                                src="https://cdn.devdojo.com/images/june2023/mountains-10.jpeg"
                                                alt="Mountain range with cloudy sky"
                                                class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                loading="lazy" />
                                        </li>
                                        <li class="group relative">
                                            <img onclick="imageGalleryOpen(event)"
                                                src="https://cdn.devdojo.com/images/june2023/mountains-06.jpeg"
                                                alt="Serene lake with mountains in the background"
                                                class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                loading="lazy" />
                                        </li>
                                        <li class="group relative">
                                            <img onclick="imageGalleryOpen(event)"
                                                src="https://images.pexels.com/photos/1891234/pexels-photo-1891234.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                alt="Calm ocean waves under a pink sky"
                                                class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                loading="lazy" />
                                        </li>
                                        <li class="group relative">
                                            <img onclick="imageGalleryOpen(event)"
                                                src="https://images.unsplash.com/photo-1529655683826-aba9b3e77383?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1965&q=80"
                                                alt="Sunset over a grassy field"
                                                class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                loading="lazy" />
                                        </li>
                                        <li class="group relative">
                                            <img onclick="imageGalleryOpen(event)"
                                                src="https://images.pexels.com/photos/4256852/pexels-photo-4256852.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                alt="Rocky shore with a lighthouse in the distance"
                                                class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                loading="lazy" />
                                        </li>
                                        <li class="group relative">
                                            <img onclick="imageGalleryOpen(event)"
                                                src="https://images.unsplash.com/photo-1541795083-1b160cf4f3d7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80"
                                                alt="Desert landscape under a clear blue sky"
                                                class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                loading="lazy" />
                                        </li>
                                    </ul>
                                </div>

                                <div id="imageGalleryModal"
                                    class="fixed inset-0 z-[99] flex items-center justify-center bg-black bg-opacity-50 select-none cursor-zoom-out hidden">
                                    <div
                                        class="relative flex flex-col items-center justify-center w-11/12 xl:w-4/5 h-11/12">
                                        <div onclick="imageGalleryPrev(event)"
                                            class="absolute left-0 flex items-center justify-center text-white translate-x-10 rounded-full cursor-pointer xl:-translate-x-24 2xl:-translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 19.5L8.25 12l7.5-7.5" />
                                            </svg>
                                        </div>
                                        <img id="imageGalleryActiveImage"
                                            class="object-contain object-center w-full h-full select-none cursor-zoom-out"
                                            src="" alt="">
                                        <div onclick="imageGalleryNext(event)"
                                            class="absolute right-0 flex items-center justify-center text-white -translate-x-10 rounded-full cursor-pointer xl:translate-x-24 2xl:translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </section>
        </div>
        <script>
            let imageGalleryOpened = false;
            let imageGalleryActiveUrl = null;
            let imageGalleryImageIndex = null;
            const imageGalleryModal = document.getElementById('imageGalleryModal');
            const imageGalleryActiveImage = document.getElementById('imageGalleryActiveImage');
            const gallery = document.getElementById('gallery').querySelectorAll('img');

            gallery.forEach((img, index) => {
                img.setAttribute('data-index', index + 1);
            });

            function imageGalleryOpen(event) {
                imageGalleryImageIndex = event.target.dataset.index;
                imageGalleryActiveUrl = event.target.src;
                imageGalleryActiveImage.src = imageGalleryActiveUrl;
                imageGalleryModal.classList.remove('hidden');
                imageGalleryOpened = true;
            }

            function imageGalleryClose() {
                imageGalleryOpened = false;
                setTimeout(() => {
                    imageGalleryModal.classList.add('hidden');
                    imageGalleryActiveImage.src = '';
                }, 300);
            }

            function imageGalleryNext(event) {
                event.stopPropagation(); // Prevent click from propagating to the modal background
                if (imageGalleryImageIndex == gallery.length) {
                    imageGalleryImageIndex = 1;
                } else {
                    imageGalleryImageIndex = parseInt(imageGalleryImageIndex) + 1;
                }
                imageGalleryActiveImage.src = gallery[imageGalleryImageIndex - 1].src;
            }

            function imageGalleryPrev(event) {
                event.stopPropagation(); // Prevent click from propagating to the modal background
                if (imageGalleryImageIndex == 1) {
                    imageGalleryImageIndex = gallery.length;
                } else {
                    imageGalleryImageIndex = parseInt(imageGalleryImageIndex) - 1;
                }
                imageGalleryActiveImage.src = gallery[imageGalleryImageIndex - 1].src;
            }

            window.addEventListener('keydown', function(e) {
                if (!imageGalleryOpened) {
                    return;
                }
                if (e.key === 'Escape') {
                    imageGalleryClose();
                }
                if (e.key === 'ArrowRight') {
                    imageGalleryNext(e);
                }
                if (e.key === 'ArrowLeft') {
                    imageGalleryPrev(e);
                }
            });

            imageGalleryModal.addEventListener('click', imageGalleryClose);

            // Prevent the close function when clicking on the image or navigation buttons
            imageGalleryActiveImage.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        </script>
    @endsection
</body>


</html>
