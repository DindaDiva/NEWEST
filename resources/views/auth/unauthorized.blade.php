<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Unauthorized</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #1c1e21;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 8rem;
            margin: 0;
        }

        h2 {
            font-size: 2rem;
            color: #b3b3b3;
        }

        p {
            font-size: 1.2rem;
            color: #b3b3b3;
            margin-bottom: 30px;
        }

        a {
            padding: 15px 30px;
            font-size: 1rem;
            background-color: #ff6b6b;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #ff4b4b;
        }

        .glitch {
            position: relative;
            color: white;
            font-size: 6rem;
            animation: glitch 1s infinite;
        }

        .glitch::before, .glitch::after {
            content: '404';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            overflow: hidden;
        }

        .glitch::before {
            left: 2px;
            text-shadow: -2px 0 red;
            clip: rect(44px, 450px, 56px, 0);
            animation: glitch 2s infinite linear alternate-reverse;
        }

        .glitch::after {
            left: -2px;
            text-shadow: -2px 0 blue;
            clip: rect(10px, 450px, 130px, 0);
            animation: glitch 1.5s infinite linear alternate-reverse;
        }

        @keyframes glitch {
            0% { clip: rect(42px, 9999px, 44px, 0); transform: skew(0.3deg); }
            5% { clip: rect(10px, 9999px, 130px, 0); transform: skew(0.5deg); }
            10% { clip: rect(130px, 9999px, 140px, 0); transform: skew(0.7deg); }
            15% { clip: rect(44px, 9999px, 56px, 0); transform: skew(0.2deg); }
            20% { clip: rect(20px, 9999px, 90px, 0); transform: skew(0.4deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="glitch">404</h1>
        <h2>Oops! Page not found.</h2>
        <p>It seems that the page you're looking for is no longer available or doesn't exist.</p>
        <a href="{{ url('/home') }}">Go back to Homepage</a>
    </div>
</body>
</html>
