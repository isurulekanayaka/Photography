<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Rejected</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
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
            color: #d9534f;
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
        <h1>Your Appointment Has Been Rejected</h1>

        <p>Dear <span class="highlight">{{ $appointment->user->name }}</span>,</p>
        <p>We regret to inform you that your appointment has been rejected. Please see the details below:</p>

        <p><strong>Reason for Rejection:</strong> <span class="highlight">{{ $rejectionReason }}</span></p>
        <p><strong>Date of Appointment:</strong> <span class="highlight">{{ $date }}</span></p>
        <p><strong>Location:</strong> <span class="highlight">{{ $location }}</span></p>
        <p><strong>Your Message:</strong> {{ $messageContent }}</p>

        <p>We sincerely apologize for any inconvenience this may have caused. If you have any questions or need further
            assistance, please feel free to contact us.</p>

        <p>Regards,</p>
        <p><strong>{{ $appointment->photographer->user->name }}</strong></p>
        <p></p>
        <div class="footer">
            <p>Thank you for your understanding.</p>
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
