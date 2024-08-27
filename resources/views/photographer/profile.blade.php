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
        <h1 class="text-center text-5xl text-orange-500 font-semibold mt-6">Profile Manage</h1>
        <div class="max-w-3xl mx-auto p-6 bg-gray-100 rounded-lg mt-8 space-y-6">

            <!-- Row 1: Profile Image -->
            <div class="flex flex-col">
                <label class="block text-gray-700 font-semibold mb-2" for="profile_image">Profile Image</label>
                <input type="file" id="profile_image" class="w-full p-2 border border-gray-300 rounded" accept="image/*">
            </div>

            <!-- Row 2: Full Name -->
            <div class="flex flex-col">
                <label class="block text-gray-700 font-semibold mb-2" for="full_name">Full Name</label>
                <input type="text" id="full_name" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Enter your full name">
            </div>

            <!-- Row 3: Description -->
            <div class="flex flex-col">
                <label class="block text-gray-700 font-semibold mb-2" for="description">Description</label>
                <textarea id="description" class="w-full p-2 border border-gray-300 rounded" rows="4"
                    placeholder="Describe yourself"></textarea>
            </div>

            <!-- Row 4: Contact Number, Emails -->
            <div class="flex gap-5">
                <div class="w-1/2">
                    <label class="block text-gray-700 font-semibold mb-2" for="contact_number">Contact Number</label>
                    <input type="text" id="contact_number" class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your contact number">
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700 font-semibold mb-2" for="contact_email">Email</label>
                    <input type="email" id="contact_email" class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your email">
                </div>
            </div>

            <!-- Row 5: Experience -->
            <div class="flex flex-col">
                <label class="block text-gray-700 font-semibold mb-2" for="experience">Experience</label>
                <input type="text" id="experience" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Enter your experience">
            </div>

            <!-- Row 6: Address Area, Address City -->
            <div class="flex gap-5">
                <div class="w-1/2">
                    <label class="block text-gray-700 font-semibold mb-2" for="address_area">Address Area</label>
                    <input type="text" id="address_area" class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your address area">
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700 font-semibold mb-2" for="address_city">Address City</label>
                    <input type="text" id="address_city" class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your address city">
                </div>
            </div>

            <!-- Row 7: Photography Categories -->
            <div class="flex flex-col">
                <label class="block text-gray-700 font-semibold mb-2" for="categories">Photography Categories</label>
                <select id="categories" class="w-full p-2 border border-gray-300 rounded">
                    <option value="wedding">Wedding</option>
                    <option value="sport">Sport</option>
                    <option value="portrait">Portrait</option>
                </select>
            </div>

            <!-- Row 8: Website -->
            <div class="flex flex-col">
                <label class="block text-gray-700 font-semibold mb-2" for="website">Website</label>
                <input type="url" id="website" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Enter your website URL">
            </div>

            <!-- Row 9: Old Password, New Password -->
            <div class="flex gap-5">
                <div class="w-1/2">
                    <label class="block text-gray-700 font-semibold mb-2" for="old_password">Old Password</label>
                    <input type="password" id="old_password" class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your old password">
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700 font-semibold mb-2" for="new_password">New Password</label>
                    <input type="password" id="new_password" class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your new password">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button class="bg-orange-500 text-white py-2 px-6 rounded font-semibold hover:bg-orange-600">Save
                    Changes</button>
            </div>
        </div>
    @endsection

</body>

</html>
