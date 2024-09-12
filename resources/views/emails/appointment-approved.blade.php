<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Approved</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            font-size: 24px;
        }

        p {
            color: #666666;
            font-size: 16px;
            line-height: 1.5;
        }

        .highlight {
            color: #333333;
            font-weight: bold;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            color: white !important;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .footer {
            margin-top: 30px;
            color: #999999;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Your Appointment Has Been Approved!</h1>

        <p>Dear <span class="highlight">{{ $appointment->user->name }}</span>,</p>
        <p>We are pleased to inform you that your appointment has been approved.</p>

        <p><strong>Date:</strong> <span class="highlight">{{ $date }}</span></p>
        <p><strong>Location:</strong> <span class="highlight">{{ $location }}</span></p>
        <p><strong>Your Message:</strong> {{ $messageContent }}</p>

        <h2>Photographer Details</h2>
        <p><strong>Photographer Name:</strong> {{ $appointment->photographer->user->name }}</p>
        <p><strong>Contact:</strong> {{ $appointment->photographer->user->contact }}</p>
        <p><strong>Email:</strong> {{ $appointment->photographer->user->email }}</p>

        <p>A minimum advance of <strong>Rs. 2500/=</strong> is required. Please discuss your budget directly with your
            photographer.</p>

        <a href="{{ route('payment.view', ['id' => $appointment->id]) }}" class="cta-button">Proceed to Payment</a>

        <p>Thank you for choosing our service!</p>

        <p>Regards,</p>
        <p><strong>{{ $appointment->photographer->user->name }}</strong></p>
        <div class="footer">
            <p>If you have any questions, feel free to contact us.</p>
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
