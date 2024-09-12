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
        <h1 class="text-center text-5xl text-orange-500 font-semibold mt-6">Payment</h1>
        <div class="mt-8 mx-5">
            <table class="min-w-full bg-gray-700 bg-opacity-30 border border-gray-800">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-white">#</th>
                        <th class="py-2 px-4 border-b border-white">Date</th>
                        <th class="py-2 px-4 border-b border-white">Client Name</th>
                        <th class="py-2 px-4 border-b border-white">Price (Rs)</th>
                        <th class="py-2 px-4 border-b border-white">Status</th>
                        <th class="py-2 px-4 border-b border-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $index => $payment)
                        <tr>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $payment->created_at->format('Y-m-d') }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $payment->user->name }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ number_format($payment->amount, 2) }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $payment->status }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">
                                <button 
                                    class="bg-blue-500 text-white py-1 px-3 rounded"
                                    onclick="openPopup('{{ $payment->id }}', '{{ $payment->amount }}', '{{ $payment->status }}')">
                                    Update
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-2 px-4 border-b border-white text-center">No payments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Popup -->
        <div id="popup" class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded shadow-lg w-1/4">
                <h2 class="text-xl font-semibold mb-4">Update Price</h2>
                <form action="{{ route('payment.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="selectid">
                    <input type="number" name="amount" id="amount" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Amount">
                    <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded mb-4">
                        <option value="advance">Advance</option>
                        <option value="completed">Completed</option>
                    </select>
                    <div class="flex justify-end">
                        <button class="bg-red-500 text-white py-1 px-3 rounded mr-2" type="button" onclick="closePopup()">Cancel</button>
                        <button id="send-button" class="bg-blue-500 text-white py-1 px-3 rounded" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
        
        <script>
            function openPopup(id, amount, status) {
                document.getElementById('selectid').value = id;
                document.getElementById('amount').value = amount;
                document.getElementById('status').value = status;
                document.getElementById('popup').classList.remove('hidden');
            }
        
            function closePopup() {
                document.getElementById('popup').classList.add('hidden');
            }
        </script>        
        
    @endsection

</body>

</html>
