<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body class="text-gray-800 font-inter bgicons">

    @extends('layout.photographer-layout')

    @section('photographer-content')
    <h1 class="text-center text-5xl text-orange-500 font-semibold mt-6">Gallery Manage</h1>
    <div class="max-w-6xl mx-auto p-6 bg-gray-100 rounded-lg mt-8 space-y-6">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf <!-- Include CSRF token for security -->
            <!-- Row 1: Image 1 - Image 5 -->
            <div class="grid grid-cols-5 gap-4">
                <!-- Image 1 -->
                <div class="image-box">
                    <label class="block text-gray-700 font-semibold mb-2" for="image1">Image 1</label>
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreview1" src="{{ asset('images/default-image.jpg') }}" alt="Image 1" class="w-full h-40 object-cover rounded">
                        <input type="file" name="image1" id="image1" class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*" onchange="previewImage(event, 'imgPreview1')">
                    </div>
                </div>
                <!-- Image 2 -->
                <div class="image-box">
                    <label class="block text-gray-700 font-semibold mb-2" for="image2">Image 2</label>
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreview2" src="{{ asset('images/default-image.jpg') }}" alt="Image 2" class="w-full h-40 object-cover rounded">
                        <input type="file" name="image2" id="image2" class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*" onchange="previewImage(event, 'imgPreview2')">
                    </div>
                </div>
                <!-- Image 3 -->
                <div class="image-box">
                    <label class="block text-gray-700 font-semibold mb-2" for="image3">Image 3</label>
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreview3" src="{{ asset('images/default-image.jpg') }}" alt="Image 3" class="w-full h-40 object-cover rounded">
                        <input type="file" name="image3" id="image3" class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*" onchange="previewImage(event, 'imgPreview3')">
                    </div>
                </div>
                <!-- Image 4 -->
                <div class="image-box">
                    <label class="block text-gray-700 font-semibold mb-2" for="image4">Image 4</label>
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreview4" src="{{ asset('images/default-image.jpg') }}" alt="Image 4" class="w-full h-40 object-cover rounded">
                        <input type="file" name="image4" id="image4" class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*" onchange="previewImage(event, 'imgPreview4')">
                    </div>
                </div>
                <!-- Image 5 -->
                <div class="image-box">
                    <label class="block text-gray-700 font-semibold mb-2" for="image5">Image 5</label>
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreview5" src="{{ asset('images/default-image.jpg') }}" alt="Image 5" class="w-full h-40 object-cover rounded">
                        <input type="file" name="image5" id="image5" class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*" onchange="previewImage(event, 'imgPreview5')">
                    </div>
                </div>
            </div>
        
            <!-- Row 2: Image 6 - Image 10 -->
            <div class="grid grid-cols-5 gap-4">
                <!-- Image 6 -->
                <div class="image-box">
                    <label class="block text-gray-700 font-semibold mb-2" for="image6">Image 6</label>
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreview6" src="{{ asset('images/default-image.jpg') }}" alt="Image 6" class="w-full h-40 object-cover rounded">
                        <input type="file" name="image6" id="image6" class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*" onchange="previewImage(event, 'imgPreview6')">
                    </div>
                </div>
                <!-- Image 7 -->
                <div class="image-box">
                    <label class="block text-gray-700 font-semibold mb-2" for="image7">Image 7</label>
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreview7" src="{{ asset('images/default-image.jpg') }}" alt="Image 7" class="w-full h-40 object-cover rounded">
                        <input type="file" name="image7" id="image7" class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*" onchange="previewImage(event, 'imgPreview7')">
                    </div>
                </div>
                <!-- Image 8 -->
                <div class="image-box">
                    <label class="block text-gray-700 font-semibold mb-2" for="image8">Image 8</label>
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreview8" src="{{ asset('images/default-image.jpg') }}" alt="Image 8" class="w-full h-40 object-cover rounded">
                        <input type="file" name="image8" id="image8" class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*" onchange="previewImage(event, 'imgPreview8')">
                    </div>
                </div>
                <!-- Image 9 -->
                <div class="image-box">
                    <label class="block text-gray-700 font-semibold mb-2" for="image9">Image 9</label>
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreview9" src="{{ asset('images/default-image.jpg') }}" alt="Image 9" class="w-full h-40 object-cover rounded">
                        <input type="file" name="image9" id="image9" class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*" onchange="previewImage(event, 'imgPreview9')">
                    </div>
                </div>
                <!-- Image 10 -->
                <div class="image-box">
                    <label class="block text-gray-700 font-semibold mb-2" for="image10">Image 10</label>
                    <div class="border border-gray-300 p-2 rounded-lg">
                        <img id="imgPreview10" src="{{ asset('images/default-image.jpg') }}" alt="Image 10" class="w-full h-40 object-cover rounded">
                        <input type="file" name="image10" id="image10" class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*" onchange="previewImage(event, 'imgPreview10')">
                    </div>
                </div>
            </div>
    
            <!-- Save Changes Button -->
            <div class="text-center mt-6">
                <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600">Save Changes</button>
            </div>
        </form>
    </div>
    
    <script>
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
