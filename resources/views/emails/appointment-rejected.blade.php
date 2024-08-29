<!DOCTYPE html>
<html>
<head>
    <title>Appointment Rejected</title>
</head>
<body>
    <h1>Your Appointment Has Been Rejected</h1>
    <p>Dear {{ $appointment->user->name }},</p>
    <p>Your appointment has been rejected.</p>
    <p><strong>Reason:</strong> {{ $rejectionReason }}</p>
    <p><strong>Date:</strong> {{ $date }}</p>
    <p><strong>Location:</strong> {{ $location }}</p>
    <p><strong>Your Message:</strong> {{ $messageContent }}</p>
    <p>We apologize for any inconvenience this may have caused.</p>
</body>
</html>
