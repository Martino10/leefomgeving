<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <script defer src="{{ mix('js/app.js') }}"></script>

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
        </style>

    </head>
    <body>
        <div id="app">
            <home></home>
        </div>
    </body>
</html>
