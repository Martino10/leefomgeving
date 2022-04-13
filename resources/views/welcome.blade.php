<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VisiRoom</title>

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.12/vue.js"></script>

        <!-- Style -->
        <style>
            *, *::before, *::after {
            padding: 0;
            margin: 0; 
            box-sizing: border-box;
            }

            html {
                font-size: 62.5%;
            }

            body {
                font-family: 'SF Pro Display', sans-serif;
                background-color: black;
            }

            .container {
                position: fixed;
                display: flex;
                flex-direction: column;
                padding-top: 3vh;
                align-items: center;
                text-align: center;
                justify-content: center;
                margin: auto;
                height: 100vh;
                width: 100vw;
            }

            .title h1 {
                font-size: 5.4rem;
                font-weight: 500;

                background-color: white;
                background-image: linear-gradient(90deg, #099F2A 0%, #2EF242 100%);
                background-clip: text;
                background-size: 100%;
                background-repeat: repeat;

                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; 
                -moz-background-clip: text;
                -moz-text-fill-color: transparent;
            }

            .title h2 {
                font-size: 2.5rem;
                font-weight: 400;
                color: white;
            }

            .container img {
                padding-top: 2rem;
            }

            .loginBtn {
                margin-top: 3rem;
                width: 32rem;
                height: 3.1rem;
                border-radius: 5px;
                border: none;
                color: black;
                background-color: white;
                font-size: 1.8rem;
                font-weight: 500;
            }

            .loginBtn:hover {
                cursor: pointer;
            }

            .login p {
                color: white;
                font-size: 1.5rem;
                font-weight: 200;
                padding: 2rem;
            }

            .login a {
                font-weight: bold;
                color: #0C9600;
                text-decoration: none;
            }
        </style>

    </head>
    <body>
    <div class="container">
        <div class="title">
            <h1>VisiRoom</h1>
            <h2>Quality of tomorrow</h2>
        </div>
        <img src="/img/background1.svg" alt="Background vector"/>
        <div class="login">
            <button class="loginBtn" onclick="window.location.href='/login';">Inloggen</button>
            <p>Nog geen account? <a href="#">Maak een account aan</a></p>
        </div>
    </div>
        <script defer src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
