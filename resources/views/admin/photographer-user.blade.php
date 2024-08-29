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
</head>

<body class="text-gray-800 font-inter bgicons">

    @extends('layout.admin-layout')

    @section('admin-content')
        <h1 class="text-center text-5xl text-orange-500 font-semibold mt-6">{{$name}} Manage</h1>
        <div class="max-w-5xl mx-auto">
            {{-- <div class=" flex justify-end mt-5 ">
                <button class="bg-orange-300 hover:bg-orange-400 text-3xl flex gap-5 py-3 px-5 rounded-full hover:scale-110"
                    onclick="openPopup()"><img src="{{ asset('images/add (1).png') }}" alt=""
                        class="w-10 h-10"></button>
            </div> --}}
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
        {{-- <div id="popup" class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded shadow-lg w-1/2">
                <h2 id="popupTitle" class="text-xl font-semibold mb-4">Add new Category</h2>
                <form id="categoryForm" action="{{ route('categories.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="category_id">
                    <!-- Hidden input to override method for PUT requests -->
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreviewCategory" src="{{ asset('images/default-image.jpg') }}" alt="Category Image"
                            class="w-auto h-56 object-cover rounded">
                        <input type="file" name="category_image" id="category_image"
                            class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*"
                            onchange="previewImage(event, 'imgPreviewCategory')">
                    </div>
                    <div class="flex w-full my-5 justify-center items-center">
                        <label for="category_name" class="text-black md:whitespace-nowrap mr-4">Category Name</label>
                        <input type="text" name="category_name" id="category_name"
                            class="w-full border border-black p-2 focus:border-orange-500 focus:outline-none rounded-md">
                    </div>
                    <div class="flex justify-end">
                        <button class="bg-red-500 text-white py-1 px-3 rounded mr-2" onclick="closePopup()"
                            type="button">Cancel</button>
                        <button class="bg-blue-500 text-white py-1 px-3 rounded" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div> --}}

        <script>
            function openPopup() {
                document.getElementById("popupTitle").textContent = "Add New Category";
                document.getElementById("category_id").value = '';
                document.getElementById("category_name").value = '';
                document.getElementById("imgPreviewCategory").src = "{{ asset('images/default-image.jpg') }}";
                document.getElementById("formMethod").value = "POST"; // Set the method to POST
                document.getElementById("popup").classList.remove("hidden");
            }

            function openEditPopup(id, name, image) {
                document.getElementById("popupTitle").textContent = "Edit Category";
                document.getElementById("category_id").value = id;
                document.getElementById("category_name").value = name;
                document.getElementById("imgPreviewCategory").src = image;
                document.getElementById("formMethod").value = "PUT"; // Change method to PUT for editing
                document.getElementById("categoryForm").action = "{{ url('categories') }}/" + id;
                document.getElementById("popup").classList.remove("hidden");
            }

            function closePopup() {
                document.getElementById("popup").classList.add("hidden");
                document.getElementById("categoryForm").reset();
                document.getElementById("categoryForm").action = "{{ route('categories.store') }}";
                document.getElementById("formMethod").value = "POST"; // Reset method to POST
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
