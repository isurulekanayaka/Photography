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
        <h1 class="text-center text-5xl text-orange-500 font-semibold mt-6">Admin Dashboard</h1>
        
    @endsection

</body>

</html>
