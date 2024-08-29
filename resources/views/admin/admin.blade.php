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
        <h1 class="text-center text-5xl text-orange-500 font-semibold mt-6">{{ $name }} Manage</h1>
        <div class="max-w-5xl mx-auto">
            <div class=" flex justify-end mt-5 ">
                <button class="bg-orange-300 hover:bg-orange-400 text-3xl flex gap-5 py-3 px-5 rounded-full hover:scale-110"
                    onclick="openPopup()"><img src="{{ asset('images/add (1).png') }}" alt=""
                        class="w-10 h-10"></button>
            </div>
            <div class="mt-8">
                <table class="min-w-full bg-gray-700 bg-opacity-30 border border-gray-800">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-white">#</th>
                            <th class="py-2 px-4 border-b border-white">Name</th>
                            <th class="py-2 px-4 border-b border-white">Email</th>
                            <th class="py-2 px-4 border-b border-white">Contact</th>
                            <th class="py-2 px-4 border-b border-white">Role</th>
                            <th class="py-2 px-4 border-b border-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td class="py-2 px-4 border-b border-white text-center">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border-b border-white text-center">{{ $user->name }}</td>
                                <td class="py-2 px-4 border-b border-white text-center">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-b border-white text-center">{{ $user->contact }}</td>
                                <td class="py-2 px-4 border-b border-white text-center">{{ $user->role }}</td>
                                <td class="py-2 px-4 border-b border-white text-center">
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white py-1 px-3 rounded">Delete</button>
                                    </form>
                                    {{-- <a href="javascript:void(0)"
                                        onclick="openEditPopup({{ $category->id }}, '{{ $category->name }}', '{{ asset('storage/' . $category->image) }}')"
                                        class="bg-blue-500 text-white py-1 px-3 rounded">Edit</a> --}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Popup -->
        <div id="popup" class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded shadow-lg w-1/2">
                <h2 id="popupTitle" class="text-xl font-semibold mb-4">Add new Admin</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="name" name="name" placeholder="John Doe" type="text" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <!-- Contact Number Field -->
                    <div class="mt-6">
                        <label for="contact" class="block text-sm font-medium leading-5 text-gray-700">Contact
                            Number</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="contact" name="contact" placeholder="07X XXX XXXX" type="text" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email
                            address</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="email" name="email" placeholder="user@example.com" type="email" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <!-- Hidden Role Field -->
                    <input type="hidden" name="role" value="admin">

                    <!-- Password Field -->
                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">Password</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password" name="password" type="password" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mt-6">
                        <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">Confirm
                            Password</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class="hover:shadow-form w-full rounded-md bg-orange-500 hover:bg-orange-600 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                Register
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openPopup() {
                document.getElementById("popup").classList.remove("hidden");
            }

            function closePopup() {
                document.getElementById("popup").classList.add("hidden");
            }

            function previewImage(event, previewId) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById(previewId);
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    @endsection

</body>

</html>
