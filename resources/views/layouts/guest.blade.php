<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased flex items-center  gap-2 w-full bg-gray-100 h-screen">

    <div class="bg-[#fee819] w-[50%] h-full flex items-center justify-center flex-col relative text-center">
        {{-- Ilyas o Hamza kano kikharb9o chi7aja hna --}}
        {{-- <div class="absolute -top-20 -left-20 rounded-full bg-gradient-to-br from-black/75 to-50% blur to-[#fee819] w-1/2 aspect-square"></div> --}}

        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="250" height="250" viewBox="12 0 280 200"
            preserveAspectRatio="xMidYMid meet" class="animate-bounce-slow "
            >
            <g transform="translate(0.000000,302.000000) scale(0.100000,-0.100000)"
                :fill="darkmode ? '#ffffff' : '#000000'" stroke="none">
                <path
                    d="M705 3008 c-41 -120 -475 -1467 -475 -1474 1 -9 1238 -910 1257 -916 6 -2 294 203 640 454 l631 458 -84 257 c-46 142 -154 477 -241 745 l-158 488 -783 0 c-617 0 -784 -3 -787 -12z m1265 -412 c0 -3 65 -205 145 -451 80 -245 145 -448 145 -450 0 -2 -173 -130 -384 -283 l-384 -280 -384 279 c-283 207 -382 284 -380 297 5 22 283 875 289 885 4 7 953 10 953 3z" />
                <path
                    d="M1176 1661 c21 -15 101 -74 178 -130 l139 -101 31 23 c17 13 92 68 166 122 74 54 139 102 144 106 6 5 -145 9 -344 9 l-354 0 40 -29z" />
            </g>
        </svg>
        <p class="text-7xl font-semibold font-mono">LionsGeek</p>
    </div>


    <div class="flex items-center justify-center w-[50%]">
        <div class="flex flex-col sm:justify-center items-center sm:pt-0 w-full ">
            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> --}}

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
