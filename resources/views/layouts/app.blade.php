<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestion de classes</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel='stylesheet prefetch' href="{{ asset('css/Home.css') }}">
    <link rel='stylesheet prefetch' href="{{ asset('css/home2.css') }}">
    <link rel='stylesheet prefetch' href="{{ asset('css/home3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <style>
        .has-error {
            border: 1px solid #FA5 !important;
        }

        body {
            background-image: url("{{ asset('Amphi-Ulg.jpg') }}");
        }

        .error
        {
            float: right;
            font-family: "Roboto", sans-serif;
            font-size: small;
            color: #FA5;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="info">
        <h1>Gestion de classes</h1>
    </div>
</div>
<div class="form" style=" background: rgba(255, 250, 235, 0.6)">
    <div class="thumbnail" style="background: rgba(255, 197, 0, 0.85)"><img src="{{ asset('images/hat.svg') }}"/></div>

    @yield('content')



</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/Ajax.js') }}"></script>
<script src="{{ asset('js/dynamic.js') }}"></script>
<script>

    //    var url = window.location.pathname;
    //
    //    $(document).ready(function () {
    //        if(url === '/register')
    //            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    //    });

    function uenseignant() {
        document.getElementById('ifetudiant').style.display = "none";
    }
    function uetudiant() {
        document.getElementById('ifetudiant').style.display = "block";
    }
</script>

</body>
</html>
