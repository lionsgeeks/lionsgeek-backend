<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lionsgeek</title>
</head>

<body>
    <h1>Hello {{ $data['full_name'] }}</h1>
    <p>Thank you for your interest in our upcoming info session with LionsGeek! We’re thrilled to help you explore our
        {{ $data['formation'] }} programs and learn how LionsGeek can support your growth.
    </p>
    <p>Here’s What You’ll Discover:</p>
    <ul>
        <li>A personalized overview of our {{ $data['formation'] }} courses</li>
        <li>Insight into our experienced instructors, who bring real-world expertise in {{ $data['formation'] }}</li>
        <li>Information about the benefits and career opportunities that come with joining our community</li>
    </ul>
    <p>Event Details:</p>
    <ul>
        <li>Date: {{ \Carbon\Carbon::parse($data['time'])->format('Y-m-d H:i') }}</li>
        <li>Location: LionsGeek, LionsGeek, 4eme étage, Ain Sebaa Center, Route de Rabat, Casablanca
            20060, Maroc</li>
    </ul>
    <p style="font-weight: 600">We've attached a PDF document with all the event details, a QR code for quick access, and
        a map to help you find us. Be sure to bring a copy (digital or printed) of this PDF to make check-in quick and
        easy.
    </p>
    <p>Bring any questions you might have about our programs or career guidance – we’ll be happy to help!
        If you have any questions before the event, reach out at contact@lionsgeek.com or call +212 522 662 660.</p>
    <p>We can’t wait to see you there and help you kickstart your journey with LionsGeek!</p>
    <h5>Warm regards,</h5>
    <p>Lionsgeek</p>
</body>

</html>
