<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        /* Ensure the map takes a specific height
        #map {
            height: 400px;
            width: 100%;
        } */
    </style>
    <style>
        @layer utilities {
            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }
        }

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

        .category-label::before {
            content: "• ";
            color: white;
            /* Optional: Change the dot color */
            margin-right: 5px;
            /* Optional: Add some space after the dot */
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
                    <img src="{{ $photographer->cover_image ? asset('storage/' . $photographer->cover_image) : asset('images/default-image.jpg') }}"
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
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-auto {{ $rating >= $i ? 'text-yellow-500' : 'text-gray-300' }} fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path
                                        d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" />
                                </svg>
                            @endfor
                            {{-- <span class="ml-2">{{ 4 }} out of 5 stars</span> --}}
                        </div>

                        <h1 class="text-center text-orange-500 dark:text-white text-4xl">{{ $photographer->user->name }}
                        </h1>
                        <!-- About -->
                        <p class="w-full text-white text-md text-pretty sm:text-center xs:text-justify">
                            {{ $photographer->description }}</p>

                        <!-- Detail -->
                        <div class="w-full my-auto py-6 flex flex-col justify-center gap-2">
                            <div class="w-full flex sm:flex-row xs:flex-col gap-2 justify-center mx-auto">
                                <div class="w-2/4 ">
                                    <div class="flex gap-5 border-b mb-2">
                                        <div class="w-2/4">
                                            <dl class="text-gray-900 divide-y divide-gray-200 ">
                                                <div class="flex flex-col py-3">
                                                    <dt class="mb-1 text-white md:text-lg">Full Name</dt>
                                                    <dd class="text-lg font-semibold text-gray-300">
                                                        {{ $photographer->user->name }}
                                                    </dd>
                                                </div>
                                                <div class="flex flex-col py-3">
                                                    <dt class="mb-1 text-white md:text-lg">Email</dt>
                                                    <dd class="text-lg font-semibold text-gray-300">
                                                        {{ $photographer->user->email }}
                                                    </dd>
                                                </div>
                                                <div class="flex flex-col py-3">
                                                    <dt class="mb-1 text-white md:text-lg">Availability</dt>
                                                    <dd class="text-lg font-semibold text-gray-300">Available</dd>
                                                </div>
                                            </dl>
                                        </div>
                                        <div class="w-2/4">
                                            <dl class="text-gray-900 divide-y divide-gray-200 ">
                                                <div class="flex flex-col py-3">
                                                    <dt class="mb-1 text-white md:text-lg">Phone Number</dt>
                                                    <dd class="text-lg font-semibold text-gray-300">
                                                        {{ $photographer->user->contact }}</dd>
                                                </div>
                                                <div class="flex flex-col py-3">
                                                    <dt class="mb-1 text-white md:text-lg">Location</dt>
                                                    <dd class="text-lg font-semibold text-gray-300">
                                                        {{ $photographer->area }}
                                                        {{ $photographer->city }} </dd>
                                                </div>


                                                <div class="flex flex-col py-3">
                                                    <dt class="mb-1 text-white md:text-lg">Website</dt>
                                                    <dd class="text-lg font-semibold text-gray-300">
                                                        {{ $photographer->website }}
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="" class="mb-1 text-white md:text-lg">All Categories</label>
                                        <div class="flex">
                                            @foreach ($photographer->photographers_category as $category)
                                                <label for=""
                                                    class="mb-1 text-white md:text-lg mr-5 category-label">{{ $category->name }}</label><br>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                                <div class="w-2/4">
                                    <div
                                        class="p-8 rounded-lg shadow-lg max-w-md mx-auto border border-gray-700 mb-10 bg-gray-800">
                                        <h3 class="text-2xl text-white font-semibold mb-4">Send Your Message Quickly</h3>
                                        <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
                                            @csrf
                                            <input type="hidden" value="{{ $photographer->id }}" name="photographer_id"
                                                id="photographer_id">
                                            <div class="flex gap-2 w-full">
                                                <!-- Date Input -->
                                                <div class="relative w-1/2">
                                                    <label for="date" class="block text-sm text-white mb-2">Date</label>
                                                    <input id="date" name="date" type="date"
                                                        placeholder="Select date"
                                                        class="w-full p-1 rounded-lg bg-transparent text-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                                </div>

                                                <!-- Location Input -->
                                                <div class="w-1/2">
                                                    <label for="location"
                                                        class="block text-sm text-white mb-2">Location</label>
                                                    <input id="location" name="location" type="text"
                                                        placeholder="Enter location"
                                                        class="w-full p-1 rounded-lg bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-orange-500 placeholder:text-white">
                                                </div>
                                            </div>

                                            <div class="flex gap-2 w-full">
                                                <!-- starttime Input -->
                                                <div class="relative w-1/2">
                                                    <label for="starttime" class="block text-sm text-white mb-2">Start
                                                        Time</label>
                                                    <input id="starttime" name="starttime" type="time"
                                                        placeholder="Select Strat Time"
                                                        class="w-full p-1 rounded-lg bg-transparent text-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                                </div>

                                                <!-- endtime Input -->
                                                <div class="w-1/2">
                                                    <label for="endtime" class="block text-sm text-white mb-2">End
                                                        Time</label>
                                                    <input id="endtime" name="endtime" type="time"
                                                        placeholder="Enter End Time"
                                                        class="w-full p-1 rounded-lg bg-transparent text-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                                </div>
                                            </div>

                                            <!-- Message Textarea -->
                                            <div>
                                                <label for="message" class="block text-sm text-white mb-2">Your
                                                    Message</label>
                                                <textarea id="message" name="message" placeholder="Type your message here"
                                                    class="placeholder:text-white w-full p-1 rounded-lg bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none h-16"></textarea>
                                            </div>

                                            <!-- Submit Button -->
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
                                        @forelse($images as $key => $image)
                                            @if ($image)
                                                <li class="group relative">
                                                    <img onclick="imageGalleryOpen(event)"
                                                        src="{{ asset('storage/' . $image) }}" alt="Gallery Image"
                                                        class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg transform transition duration-300 group-hover:scale-105 group-hover:shadow-xl cursor-pointer aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"
                                                        loading="lazy" />
                                                </li>
                                            @else
                                                <li class="group relative">
                                                    <img src="{{ asset('images/default-image.jpg') }}"
                                                        alt="Default Image"
                                                        class="object-cover w-full h-auto bg-gray-200 rounded-lg shadow-lg"
                                                        loading="lazy" />
                                                </li>
                                            @endif
                                        @empty
                                            <li class="col-span-full text-center w-full border py-5 px-10">
                                                <p class="text-gray-100">No images available.</p>
                                            </li>
                                        @endforelse
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


                        <form action="{{ route('rating.store') }}" class="w-full" method="POST">
                            @csrf
                            <div class=" border-gray-700 bg-gray-800 p-8 shadow-lg rounded-lg w-full flex">
                                <div class="w-1/2">
                                    <!-- Rating Description -->
                                    <p class="text-white text-lg font-semibold mb-4">Add rating description for
                                        photographer
                                    </p>
                                    <textarea class="w-full bg-gray-700 p-4 rounded-lg text-white resize-none" rows="4" name="description"
                                        id="description" placeholder="Write your review here..."></textarea>
                                </div>
                                <div class="w-1/2">
                                    <!-- Rating Stars -->
                                    <div class="flex justify-center space-x-2 mb-4">
                                        <button onclick="setRating(1)" type="button">
                                            <svg id="star1"
                                                class="w-6 h-6 text-gray-400 hover:text-yellow-500 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" />
                                            </svg>
                                        </button>
                                        <button onclick="setRating(2)" type="button">
                                            <svg id="star2"
                                                class="w-6 h-6  text-gray-400 hover:text-yellow-500 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" />
                                            </svg>
                                        </button>
                                        <button onclick="setRating(3)" type="button">
                                            <svg id="star3"
                                                class="w-6 h-6 text-gray-400 hover:text-yellow-500 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" />
                                            </svg>
                                        </button>
                                        <button onclick="setRating(4)" type="button">
                                            <svg id="star4"
                                                class="w-6 h-6 text-gray-400 hover:text-yellow-500 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" />
                                            </svg>
                                        </button>
                                        <button onclick="setRating(5)" type="button">
                                            <svg id="star5"
                                                class="w-6 h-6 text-gray-400 hover:text-yellow-500 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Rating Display -->
                                    <div class="text-center text-white mb-4">
                                        <p>Rating: <span id="ratingValue">0</span>/5</p>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="flex justify-center space-x-2 mb-4">
                                        <input type="hidden" name="rating" id="rating" value="">
                                        <input type="hidden" value="{{ $photographer->id }}" name="photographer_id"
                                            id="photographer_id">
                                        <button
                                            class="w-32 py-3 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition duration-300 ease-in-out">
                                            Submit Rating
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </form>

                        <div class="mt-10 w-full flex justify-center gap-10">
                            @forelse ($latest as $latest)
                                <div class="w-1/3 bg-gray-800 p-5 rounded-md h-fit">
                                    <div>
                                        <div class="flex justify-between">
                                            <h4 class="text-white text-lg">{{ $latest->user->name }}</h4>
                                            <h4 class="text-white text-lg">{{ $latest->updated_at->format('Y-m-d') }}</h4>
                                        </div>

                                        <hr>
                                        <p class=" text-gray-300 text-base h-36 overflow-y-scroll scrollbar-hide">
                                            {{ $latest->description }} </p>
                                    </div>
                                    <div class="flex items-center justify-center mt-5">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-5 h-auto {{ $latest->rating_value >= $i ? 'text-yellow-500' : 'text-gray-300' }} fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" />
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>


                        {{-- map --}}

                        <div class="relative z-50 mt-20">
                            @if ($photographer->latitude && $photographer->longitude)
                                <div class="w-[1275px] px-2">
                                    <div id="map" class="w-full h-[400px]  rounded-lg"></div>
                                </div>
                                <input type="hidden" id="latitude" name="latitude"
                                    value="{{ $photographer->latitude }}">
                                <input type="hidden" id="longitude" name="longitude"
                                    value="{{ $photographer->longitude }}">
                            @else
                                <p>No location data available for this photographer.</p>
                            @endif
                        </div>

                    </div>
                </div>
            </section>
        </div>

        {{-- map script --}}

        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script>
            // Check if the latitude and longitude are present
            var latitude = document.getElementById('latitude').value;
            var longitude = document.getElementById('longitude').value;

            if (latitude && longitude) {
                // Initialize the map centered at the photographer's location
                var map = L.map('map').setView([latitude, longitude], 12);

                // Add the tile layer to the map (using OpenStreetMap)
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map);

                // Create a marker for the photographer's location
                var marker = L.marker([latitude, longitude]).addTo(map)
                    .bindPopup("Photographer's Location")
                    .openPopup();
            }
        </script>

        {{-- map script end --}}

        {{-- rating script --}}
        <script>
            let rating = 0;

            function setRating(value) {
                rating = value;
                document.getElementById('ratingValue').innerText = rating;
                document.getElementById('rating').value = rating;

                // Highlight the stars based on the rating
                for (let i = 1; i <= 5; i++) {
                    document.getElementById('star' + i).classList.remove('text-yellow-500');
                    document.getElementById('star' + i).classList.add('text-gray-400');
                    if (i <= rating) {
                        document.getElementById('star' + i).classList.remove('text-gray-400');
                        document.getElementById('star' + i).classList.add('text-yellow-500');
                    }
                }
            }

            function submitRating() {
                // Handle rating submission, for example by sending the rating to your server
                alert('You submitted a rating of: ' + rating);
            }
        </script>
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
