<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body class="text-gray-800 font-inter bgicons">

    @extends('layout.photographer-layout')

    @section('photographer-content')
        <h1 class="text-center text-5xl text-orange-500 font-semibold mt-6">Profile Manage</h1>

        <form action="{{ route('photographer.update-profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Main Container -->
            <div class="md:mx-20 lg:mx-36 mx-5 p-6 bg-gray-100 rounded-lg mt-8 space-y-6">

                <!-- Cover Image Section -->
                <div class="w-full mb-16">
                    <label class="block text-gray-700 font-semibold mb-2" for="cover_image">Cover Image</label>
                    <div class="border border-gray-300 p-2 rounded-lg h-80">
                        <!-- Cover Image Preview -->
                        <div class="h-full w-full flex justify-center">
                            <img id="coverImgPreview"
                                src="{{ $user->photographer->cover_image ? asset('storage/' . $user->photographer->cover_image) : asset('images/default-image.jpg') }}"
                                alt="Cover Image" class="h-full w-auto object-cover rounded">
                        </div>
                        <!-- File Input for Cover Image -->
                        <input type="file" id="cover_image" name="cover_image"
                            class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*"
                            onchange="previewImage(event, 'coverImgPreview')">
                    </div>
                </div>

                <!-- Profile and Additional Information Section -->
                <div class="flex">
                    <!-- Profile Image Section -->
                    <div class="image-box w-1/4">
                        <label class="block text-gray-700 font-semibold mb-2" for="profile_image">Profile Image</label>
                        <div class="border border-gray-300 p-2 rounded-lg h-40">
                            <!-- Profile Image Preview -->
                            <div class="h-full w-full flex justify-center">
                                <img id="profileImgPreview"
                                    src="{{ $user->photographer->profile_picture ? asset('storage/' . $user->photographer->profile_picture) : asset('images/default-image.jpg') }}"
                                    alt="Profile Image" class="w-auto h-full object-cover rounded">
                            </div>
                            <!-- File Input for Profile Image -->
                            <input type="file" id="profile_image" name="profile_image"
                                class="mt-2 w-full p-1 border border-gray-300 rounded" accept="image/*"
                                onchange="previewImage(event, 'profileImgPreview')">
                        </div>
                    </div>

                    <!-- Additional Information Section -->
                    <div class="pl-4 w-full">
                        <!-- Full Name Input -->
                        <div class="flex flex-col mb-4">
                            <label class="block text-gray-700 font-semibold mb-2" for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name"
                                class="w-full p-2 border border-gray-300 rounded"
                                value="{{ $user->name ? $user->name : '' }}" placeholder="Enter your full name">
                        </div>

                        <!-- Description Input -->
                        <div class="flex flex-col mb-4">
                            <label class="block text-gray-700 font-semibold mb-2" for="description">Description</label>
                            <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded" rows="4"
                                placeholder="Describe yourself">{{ $user->photographer->description ? $user->photographer->description : '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Contact and Website Information -->
                <div class="flex gap-5 mb-4">
                    <!-- Contact Number Input -->
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-semibold mb-2" for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ $user->contact ? $user->contact : '' }}" placeholder="Enter your contact number">
                    </div>
                    <!-- Email Input -->
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-semibold mb-2" for="contact_email">Email</label>
                        <input type="email" id="contact_email" name="contact_email"
                            class="w-full p-2 border border-gray-300 rounded" value="{{ $user->email ? $user->email : '' }}"
                            placeholder="Enter your email">
                    </div>
                </div>

                <!-- Experience and Website Information -->
                <div class="flex gap-5 mb-4">
                    <!-- Experience Input -->
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-semibold mb-2" for="experience">Experience</label>
                        <input type="text" id="experience" name="experience"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ $user->photographer->experience ? $user->photographer->experience : '' }}"
                            placeholder="Enter your experience">
                    </div>
                    <!-- Website URL Input -->
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-semibold mb-2" for="website">Website</label>
                        <input type="url" id="website" name="website"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ $user->photographer->website ? $user->photographer->website : '' }}"
                            placeholder="Enter your website URL">
                    </div>
                </div>

                <!-- Address Information -->
                <div class="flex gap-5 mb-4">
                    <!-- Address Area Input -->
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-semibold mb-2" for="address_area">Address Area</label>
                        <input type="text" id="address_area" name="address_area"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ $user->photographer->area ? $user->photographer->area : '' }}"
                            placeholder="Enter your address area">
                    </div>
                    <!-- Address City Input -->
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-semibold mb-2" for="address_city">Address City</label>
                        <input type="text" id="address_city" name="address_city"
                            class="w-full p-2 border border-gray-300 rounded"
                            value="{{ $user->photographer->city ? $user->photographer->city : '' }}"
                            placeholder="Enter your address city">
                    </div>
                </div>

                <!-- Photography Categories and Availability -->
                <div class="flex gap-5 mb-4">
                    <!-- Photography Categories Input -->
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-semibold mb-2" for="categories">Photography
                            Categories</label>
                        <select id="categories" name="categories" class="w-full p-2 border border-gray-300 rounded">
                            <option value="{{ $user->photographer->category_id }}" selected>
                                {{ $user->photographer->category->name }}</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                                <option value="" disabled>-- No categories available --</option>
                            @endforelse
                        </select>
                    </div>

                    <!-- Availability Input -->
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-semibold mb-2" for="availability">Availability</label>
                        <select id="availability" name="availability" class="w-full p-2 border border-gray-300 rounded">
                            <option value="" selected>-- Select Availability --</option>
                            <option value="available"
                                {{ $user->photographer->availability === 'available' ? 'selected' : '' }}>Available
                            </option>
                            <option value="not available"
                                {{ $user->photographer->availability === 'not available' ? 'selected' : '' }}>Not Available
                            </option>
                        </select>
                    </div>
                </div>

                <!-- Password Update -->
                <div class="flex gap-5 mb-4">
                    <!-- Old Password Input -->
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-semibold mb-2" for="old_password">Old Password</label>
                        <input type="password" id="old_password" name="old_password"
                            class="w-full p-2 border border-gray-300 rounded" placeholder="Enter your old password">
                    </div>
                    <!-- New Password Input -->
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-semibold mb-2" for="new_password">New Password</label>
                        <input type="password" id="new_password" name="new_password"
                            class="w-full p-2 border border-gray-300 rounded" placeholder="Enter your new password">
                    </div>
                </div>

                <div id="map" style="height: 400px;"></div>
                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">

                <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
                <script>
                    // Assuming you have the photographer's data available in your Blade template
                    // For example:
                    var photographerLatitude = {{ $user->photographer->latitude ?? 'null' }};
                    var photographerLongitude = {{ $user->photographer->longitude ?? 'null' }};

                    // Initialize the map with a default view
                    var map = L.map('map').setView([7.873054, 80.771797], 8);

                    // Add the tile layer to the map (using OpenStreetMap)
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                    }).addTo(map);

                    var marker;

                    // Check if latitude and longitude are not null
                    if (photographerLatitude !== null && photographerLongitude !== null) {
                        // Create a marker for the photographer's location
                        var photographerLocation = L.marker([photographerLatitude, photographerLongitude]).addTo(map);
                        photographerLocation.bindPopup("Photographer's Location").openPopup();

                        // Center the map on the photographer's location
                        map.setView([photographerLatitude, photographerLongitude], 13);

                        // Store the lat and long values in hidden input fields
                        document.getElementById('latitude').value = photographerLatitude;
                        document.getElementById('longitude').value = photographerLongitude;
                    }

                    // Event to get latitude and longitude when clicking on the map
                    function onMapClick(e) {
                        var lat = e.latlng.lat;
                        var lng = e.latlng.lng;
                        console.log("Latitude: " + lat + ", Longitude: " + lng);

                        // Set the marker on click
                        if (marker) {
                            marker.setLatLng(e.latlng);
                        } else {
                            marker = L.marker(e.latlng).addTo(map);
                        }

                        // Store the lat and long values in hidden input fields
                        document.getElementById('latitude').value = lat;
                        document.getElementById('longitude').value = lng;
                    }

                    // Add the click event listener to the map
                    map.on('click', onMapClick);
                </script>


                <!-- Submit Button -->
                <div class="text-center">
                    <button class="bg-orange-500 text-white py-2 px-6 rounded font-semibold hover:bg-orange-600"
                        type="submit">Save Changes
                    </button>
                </div>
            </div>
        </form>


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
