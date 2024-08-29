<!DOCTYPE html>
<html>
<head>
    <title>Appointment Approved</title>
</head>
<body>
    <h1>Your Appointment Has Been Approved</h1>
    <p>Dear {{ $appointment->user->name }},</p>
    <p>Your appointment has been approved.</p>
    <p><strong>Date:</strong> {{ $date }}</p>
    <p><strong>Location:</strong> {{ $location }}</p>
    <p><strong>Your Message:</strong> {{ $messageContent }}</p>
    {{-- <p><strong>id:</strong> {{ $appointment->id }}</p> --}}
    <p><strong>Advance Payment:</strong> Rs.5000/=</p>

    <a href="{{ route('payment.view', ['id' => $appointment->id]) }}">
        <button>Payment</button>
    </a>    

    <p>Thank you for choosing our service.</p>
</body>
</html>
