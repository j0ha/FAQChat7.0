<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Live FAQ') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <livewire:styles>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            .fade-in {
                opacity: 1;
                animation-name: fadeInOpacity;
                animation-iteration-count: 1;
                animation-timing-function: ease-in;
                animation-duration: 0.3s;
            }

            @keyframes fadeInOpacity {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }
            .fade-out {
                opacity: 0;
                animation-name: fadeOutOpacity;
                animation-iteration-count: 1;
                animation-timing-function: ease-in;
                animation-duration: 0.3s;
            }

            @keyframes fadeOutOpacity {
                0% {
                    opacity: 1;
                }
                100% {
                    opacity: 0;
                }
            }
        </style>
</head>
<body style="height: 100vh; width: 100vw; margin: 0 auto; background-color: #00ff00">
@livewire('bauchbinde')
</body>
<livewire:scripts>
</html>
