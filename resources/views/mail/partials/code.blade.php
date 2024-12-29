<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-top: 20px;
        }

        .header img {
            width: 150px;
        }

        .content {
            border: 1px solid #ddd;
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
        }

        .content h3,
        .content h5 {
            margin: 10px 0 ;
        }

        .content p {
            margin: 5px 0;
        }

        .qr-section {
            text-align: center;
            margin-top: 10px;
        }

        .qr-section img {
            width: 250px;
        }

        .qr-section p {
            margin-top: 5px;
            font-size: 0.9em;
            color: #555;
        }

        .footer {
            position: relative;
            border: 1px solid #ddd;
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            height: 250px;
        }
        .footer .contact {
            width: 45%;
        }
        .footer .contact h4 {
            margin-bottom: 10px;
            color: #0056b3;
        }
        .footer .map {
            width: 45%;
            text-align: center;
            position: absolute;
            right: 20px;
            top: 50px
        }
        .footer .map img {
            width: 100%;
            border-radius: 8px;
        }
        .map-remarque {
            margin-top: 5px;
            font-size: 0.9em;
            color: #555;
        }

        
        
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('assets/img/lg_logo.png') }}" alt="LionsGeek Logo">
    </div>

    <div class="content">
        <h3>Invitation to {{ $data['formation'] }}'s info session - {{ $data['infosession'] }}</h3>
        <h5>Name: {{ $data['full_name'] }}</h5>
        <p>
            Welcome to the LionsGeek Info Session! This email serves as your ticket to the event please keep it safe and bring it with you (either digitally or printed) to gain entry. We look forward to seeing you.
        </p>
        <p style="margin: 8px 0;">Time: {{ \Carbon\Carbon::parse($data['time'])->format('Y-m-d H:i') }}</p>
        <p><strong>Order Information:</strong></p>
        <p>Ordered by {{ $data['full_name'] }} on {{ $data['created_at'] }}</p>

        <div class="qr-section">
            <h4>For Event Organizers</h4>
            <img src="data:image/png;base64,{{ $image }}" alt="QR Code">
        </div>
    </div>

    <div class="footer">
        <div class="contact">
            <h4>Contact Us</h4>
            <p><strong>Email:</strong> contact@lionsgeek.ma</p>
            <p><strong>Phone:</strong> +212 522 662 660</p>
            <p><strong>Address:</strong> LionsGeek, 4th Floor, Ain Sebaa Center, Route de Rabat, Casablanca 20060, Morocco</p>
        </div>
        <div class="map">
            <a href="https://www.google.com/maps/place/LionsGeek/@33.6036273,-7.5357722,733m/data=!3m1!1e3!4m6!3m5!1s0xda7cdb2f812837f:0xbbcfc74fbc11b2d9!8m2!3d33.6037882!4d-7.5338517!16s%2Fg%2F11jy9l0d4m?authuser=0&entry=ttu&g_ep=EgoyMDI0MTEwNi4wIKXMDSoASAFQAw%3D%3D">
                <img src="{{ public_path('assets/img/lg_map.png') }}" alt="LionsGeek Location">
            </a>
            <p class="map-remarque">Click the map to open in Google Maps</p>
        </div>
    </div>
</body>

</html>
