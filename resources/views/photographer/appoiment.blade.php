
<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>

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

    @extends('layout.photographer-layout')

    @section('photographer-content')
        <h1 class="text-center text-5xl text-orange-500 font-semibold mt-6">Booking Days</h1>
        <div class="py-2 px-4 border-b border-white text-center flex w-full h-full justify-center mt-10">
            <div id='calendar' class="w-1/2 h-1/2"></div>
        </div>
        <div class="mt-8 mx-5 ">
            <table class="min-w-full bg-gray-700 bg-opacity-30 border border-gray-800">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-white">#</th>
                        <th class="py-2 px-4 border-b border-white">Name</th>
                        <th class="py-2 px-4 border-b border-white">Mail</th>
                        <th class="py-2 px-4 border-b border-white">Contact Number</th>
                        <th class="py-2 px-4 border-b border-white">Date</th>
                        <th class="py-2 px-4 border-b border-white">Start Time</th>
                        <th class="py-2 px-4 border-b border-white">End Time</th>
                        <th class="py-2 px-4 border-b border-white">Location</th>
                        <th class="py-2 px-4 border-b border-white">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $index => $appointment)
                        <tr>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $appointment->user->name }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $appointment->user->email }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $appointment->user->contact }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $appointment->date }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $appointment->starttime }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $appointment->endtime }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $appointment->location }}</td>
                            <td class="py-2 px-4 border-b border-white text-center">{{ $appointment->message }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-2 px-4 border-b border-white text-center">No appointments found.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [
                        @foreach ($appointments as $appointment)
                            {
                                title: '{{ $appointment->message }}',
                                start: '{{ \Carbon\Carbon::parse($appointment->date)->format('Y-m-d') }}',
                                color: 'orange' // Customize the color
                            },
                        @endforeach
                    ]
                });
                calendar.render();
            });
        </script>
    @endsection



</body>

</html>
