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
            margin: 0;
            height: 100vh;
            background-color: black;
            /* overflow: hidden; Prevent scrollbars */
            transition: background-color 0.2s;
            /* Smooth transition */
        }
    </style>
    <script>
        document.addEventListener('mousemove', function(e) {
            // Get mouse position
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            // Normalize mouse position to a value between 0 and 1
            const normX = mouseX / window.innerWidth;
            const normY = mouseY / window.innerHeight;

            // Calculate color intensity based on mouse position
            // Keep the color close to black by limiting the range
            const intensity = 0 + (normX + normY) * 30; // Adjust the range to control darkness

            // Calculate RGB values
            const red = Math.min(intensity, 255);
            const green = Math.min(intensity, 255);
            const blue = Math.min(intensity, 255);

            // Set the background color
            document.body.style.backgroundColor = `rgb(${red}, ${green}, ${blue})`;
        });
    </script>
</head>

<body>
    @extends('layout.layout')
    @section('content')
        
        @endsection
</body>

</html>
