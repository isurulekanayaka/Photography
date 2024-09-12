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
        }
    </style>
</head>

<body class="">
    <form action="{{ route('payment.confirm', ['id' => $id]) }}" method="POST">
        @csrf
        <div class="max-w-sm mx-auto md:mt-32 mt-20 bg-white rounded-md shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-900 text-white">
                <h1 class="text-lg font-bold">Credit Card</h1>
            </div>
            <div class="px-6 py-4">

                <!-- Card Number Field -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="card-number">
                        Card Number
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="card-number" type="text" placeholder="**** **** **** ****" required>
                </div>

                <!-- Expiration Date Field -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="expiration-date">
                        Expiration Date
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="expiration-date" type="text" placeholder="MM/YY" required>
                </div>

                <!-- CVV Field -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="cvv">
                        CVV
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="cvv" type="text" placeholder="***" required>
                </div>

                <!-- Cardholder Name Field -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="cardholder-name">
                        Cardholder Name
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="cardholder-name" type="text" placeholder="Full Name" required>
                </div>

                <!-- Minimum Advance Field -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="amount">
                        A minimum advance of Rs. 2500/= is required. Please discuss your budget directly with your
                        photographer.
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="amount" name="amount" type="number" value="2500" min="2500"
                        required>
                </div>

                <!-- Pay Now Button -->
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                    Pay Now
                </button>

            </div>
        </div>
    </form>

</body>

</html>
