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

    @extends('layout.photographer-layout')

    @section('photographer-content')
        <h1 class="text-center text-5xl text-orange-500 font-semibold mt-6">Customer Contact</h1>
        <div class="mt-8 mx-5 ">
            <table class="min-w-full bg-gray-700 bg-opacity-30 border border-gray-800">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-white">#</th>
                        <th class="py-2 px-4 border-b border-white">Name</th>
                        <th class="py-2 px-4 border-b border-white">Mail</th>
                        <th class="py-2 px-4 border-b border-white">Contact Number</th>
                        <th class="py-2 px-4 border-b border-white">Message</th>
                        <th class="py-2 px-4 border-b border-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-white text-center">1</td>
                        <td class="py-2 px-4 border-b border-white text-center">John</td>
                        <td class="py-2 px-4 border-b border-white text-center">john@mail.com</td>
                        <td class="py-2 px-4 border-b border-white text-center">1156</td>
                        <td class="py-2 px-4 border-b border-white text-center">Pls CL me</td>
                        <td class="py-2 px-4 border-b border-gray-400 text-center">
                            <button class="bg-red-500 text-white py-1 px-3 rounded">Delete</button>
                            <button class="bg-blue-500 text-white py-1 px-3 rounded ml-2"
                                onclick="openPopup()">Reply</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Popup -->
        <div id="popup" class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded shadow-lg  w-1/2">
                <h2 class="text-xl font-semibold mb-4">Reply to Message</h2>
                <textarea class="w-full p-2 border border-gray-300 rounded mb-4" rows="4" placeholder="Write your reply here..."></textarea>
                <div class="flex justify-end">
                    <button class="bg-red-500 text-white py-1 px-3 rounded mr-2" onclick="closePopup()">Cancel</button>
                    <button class="bg-blue-500 text-white py-1 px-3 rounded">Send</button>
                </div>
            </div>
        </div>

        <script>
            function openPopup() {
                document.getElementById("popup").classList.remove("hidden");
            }

            function closePopup() {
                document.getElementById("popup").classList.add("hidden");
            }
        </script>
    @endsection

</body>

</html>
