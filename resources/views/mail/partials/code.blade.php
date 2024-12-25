<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div
        style="display: flex; justify-content: center; align-items: center; width: 100%; height: 40vh; margin-top: 20px">
        <img src="{{ public_path('assets/img/lg_logo.png') }}" alt="lionsgeek logo">
    </div>
    <div style="height: 280px; position: relative; border: 1px black solid; margin-top: 20px">
        <div style="width: 60%; position: absolute; left: 0%; top: 0%; margin-left: 6px">
            <h3>{{ $data['infosession'] }}</h3>
            <h5>{{ $data['full_name'] }} </h5>
            <p>
                LionsGeek, LionsGeek, 4eme étage, Ain Sebaa Center, Route de Rabat, Casablanca
                20060, Maroc
            </p>
            <p> {{ \Carbon\Carbon::parse($data['time'])->format('Y-m-d H:i') }}
            </p>
            {{-- <p>{{ $data['session_date'] }} (heure : Maroc)</p> --}}
            <p style="color: #494949">Information de commande</p>
            <p>Commandé par {{ $data['full_name'] }} le {{ $data['created_at'] }}</p>
        </div>
        <div style="width: 40%; position: absolute; right: 0%; top: 0%;">
            <img style="width: 85%" src="data:image/png;base64,{{ $image }}" alt="QR Code">
        </div>
    </div>
    <div style="height: 280px; border: 1px black solid; margin-top: 20px; padding-left: 5px; position: relative;">
        <div style="width: 50%; position: absolute; left: 10px; top: 0%">
            <h4>If you have any questions or would like more information, please reach out to us at:</h4>
            <p><strong>Email:</strong> contact@lionsgeek.ma</p>
            <p><strong>Phone:</strong> +212 522 662 660</p>
        </div>
        <div style="width: 50%; position: absolute; right: 4px; top: 60px">
            <a
                href="https://www.google.com/maps/place/LionsGeek/@33.6036273,-7.5357722,733m/data=!3m1!1e3!4m6!3m5!1s0xda7cdb2f812837f:0xbbcfc74fbc11b2d9!8m2!3d33.6037882!4d-7.5338517!16s%2Fg%2F11jy9l0d4m?authuser=0&entry=ttu&g_ep=EgoyMDI0MTEwNi4wIKXMDSoASAFQAw%3D%3D">
                <img style="width: 100%" src="{{ public_path('assets/img/lg_map.png') }}" alt="">
            </a>
        </div>
    </div>
</body>

</html>
