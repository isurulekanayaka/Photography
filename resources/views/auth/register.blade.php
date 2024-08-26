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
        <div id="user-registration">
            <div class="bg-cover bg-center bg-fixed" style="background-image: url('{{ asset('images/register.webp') }}')">
                <div class="h-screen flex justify-center items-center">
                    <div class="bg-white p-8 w-full md:max-w-[525px] rounded-xl mx-auto my-20">
                        <h1 class="text-3xl font-bold mb-8 text-center">User Registration</h1>
                        <!-- Link to Login Form -->
                        <div class="text-center my-4">
                            <p class="text-sm text-gray-600">Already have an account?
                                <a class="text-blue-500 hover:text-blue-700" href="#">Login</a>
                            </p>
                        </div>

                        <form method="POST" action="#">
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium leading-5  text-gray-700">Name</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input id="name" name="name" placeholder="John Doe" type="text"
                                        required=""
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    <div
                                        class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="contact"
                                    class="block text-sm font-medium leading-5 text-gray-700">Contact Number</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input id="contact" name="contact" placeholder="07X XXX XXXX" type="contact"
                                            required=""
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    </div>
                            </div>

                            <div class="mt-6">
                                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                                    Email address
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input id="email" name="email" placeholder="user@example.com" type="email"
                                        required=""
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                                    Password
                                </label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input id="password" name="password" type="password" required=""
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="password_confirmation"
                                    class="block text-sm font-medium leading-5 text-gray-700">
                                    Confirm Password
                                </label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        required=""
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>
                            </div>

                            <div class="mt-6">
                                <span class="block w-full rounded-md shadow-sm">
                                    <button type="submit"
                                        class="hover:shadow-form w-full rounded-md bg-orange-500 hover:bg-orange-600 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                        Register
                                    </button>
                                </span>
                            </div>
                        </form>
                        <!-- Switch to Photographer Registration -->
                        <div class="text-center mt-5">
                            <p class="text-sm text-gray-600">Are you a photographer? <a
                                    class="text-orange-500 hover:text-orange-700" href="#"
                                    onclick="switchToPhotographerForm()">Register as Photographer</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Photographer Registration Form -->
        <div id="photographer-registration" class="hidden">
            <div class="bg-cover bg-center bg-fixed" style="background-image: url('{{ asset('images/register.webp') }}')">
                <div class="flex justify-center items-center">
                    <div class="bg-white p-8 w-full md:max-w-[800px] rounded-xl mx-auto my-20">
                        <h1 class="text-3xl font-bold mb-8 text-center">Photographer Registration</h1>
                        <!-- Link to Login Form -->
                        <div class="text-center my-2">
                            <p class="text-sm text-gray-600">Already have an account?
                                <a class="text-blue-500 hover:text-blue-700" href="#">Login</a>
                            </p>
                        </div>

                        <form>
                            <!-- Profile Photo -->
                            <div class="mb-1">
                                <label for="profile-photo" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Profile Photo
                                </label>
                                <input type="file" name="profile-photo" id="profile-photo"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>

                            <!-- Full Name -->
                            <div class="mb-1">
                                <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Full Name
                                </label>
                                <input type="text" name="name" id="name" placeholder="Full Name"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>

                            <!-- Description -->
                            <div class="mb-1">
                                <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Description
                                </label>
                                <textarea name="description" id="description" rows="4" placeholder="Briefly describe yourself"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                            </div>

                            <!-- Contact Details -->
                            <div class="-mx-3 flex">
                                <div class="w-full px-3 md:w-1/2 mb-1">
                                    <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Phone Number
                                    </label>
                                    <input type="text" name="phone" id="phone"
                                        placeholder="Enter your phone number"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                <div class="w-full px-3 md:w-1/2 mb-1">
                                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Email Address
                                    </label>
                                    <input type="email" name="email" id="email" placeholder="Enter your email"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>

                            <!-- Experience -->
                            <div class="mb-1">
                                <label for="experience" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Experience
                                </label>
                                <input type="text" name="experience" id="experience"
                                    placeholder="Enter your years of experience"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>

                            <!-- Photography Categories -->
                            <div class="mb-5">
                                <label for="categories" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Photography Categories
                                </label>
                                <select id="categories" name="category"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                    <option value="wedding">Wedding</option>
                                    <option value="sports">Sports</option>
                                    <option value="portrait">Portrait</option>
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>


                            <!-- Address Details -->
                            <div class="mb-1 pt-3">
                                <label class="mb-1 block text-base font-semibold text-[#07074D] md:text-xl">
                                    Address Details
                                </label>
                                <div class="-mx-3 flex">
                                    <div class="w-full px-3 md:w-1/2 mb-1">
                                        <input type="text" name="area" id="area" placeholder="Enter area"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    <div class="w-full px-3 md:w-1/2 mb-1">
                                        <input type="text" name="city" id="city" placeholder="Enter city"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>
                            </div>

                            <!-- Password Fields -->
                            <div class="mb-5 pt-3">
                                <div class="-mx-3 flex">
                                    <div class="w-full px-3 md:w-1/2 mb-5">
                                        <label for="password"
                                            class="mb-1 block text-base font-semibold text-[#07074D] md:text-xl">
                                            Password
                                        </label>
                                        <input type="password" name="password" id="password"
                                            placeholder="Enter password"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    <div class="w-full px-3 md:w-1/2 mb-5">
                                        <label for="confirm-password"
                                            class="mb-1 block text-base font-semibold text-[#07074D] md:text-xl">
                                            Confirm Password
                                        </label>
                                        <input type="password" name="confirm_password" id="confirm-password"
                                            placeholder="Confirm password"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                </div>
                            </div>



                            <!-- Submit Button -->
                            <div>
                                <button
                                    class="hover:shadow-form w-full rounded-md bg-orange-500 hover:bg-orange-600 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                    Register
                                </button>
                            </div>
                        </form>
                        <!-- Switch to User Registration -->
                        <div class="text-center mt-5">
                            <p class="text-sm text-gray-600">Already a member? <a
                                    class="text-orange-500 hover:text-orange-700" href="#"
                                    onclick="switchToUserForm()">Register as User</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            function switchToPhotographerForm() {
                document.getElementById('photographer-registration').classList.remove('hidden');
                document.getElementById('user-registration').classList.add('hidden');
            }

            function switchToUserForm() {
                document.getElementById('photographer-registration').classList.add('hidden');
                document.getElementById('user-registration').classList.remove('hidden');
            }
        </script>
    @endsection
</body>


</html>
