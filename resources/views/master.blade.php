<!DOCTYPE html>
<html lang="en">
<head>
    <title>GDC @yield('title')</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    @yield('meta')

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}"/>
    <link href="{{ asset('css/Annonce.css') }}" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css') }}" href="{{ asset('css/tooltipster.css') }}"/>
    <link href="{{ asset('css/pgwslider.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    @yield('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="screen">

    <style>
        th {
            background-color: #222222;
            color: white;
            font-family: monospace;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

    </style>

</head>

<body>

<section id="header_area">

    <div class="wrapper header">
        <div class="clearfix header_top">
            <div class="clearfix logo floatleft">
                <a href=""><h1><span>Gestion</span> DE Classes</h1><h2>espace @yield('espace')</h2></a>
            </div>
        </div>
        @yield('menu')
    </div>

</section>

<section id="content_area">
    <div class="clearfix wrapper main_content_area">

        <div class="clearfix main_content floatleft">

            @yield('content')

        </div>

        <div class="clearfix sidebar_container floatright">

            @yield('sidebar')

        </div>

    </div>
</section>

<section id="footer_top_area">
    <div class="clearfix wrapper footer_top">
        <div class="clearfix footer_top_container">
            <div class="clearfix single_footer_top floatleft">
                <h2>Objectif:</h2>
                <p>C'est une application Web permettant aux enseignants de gérer ses classes.</p>
            </div>
            <div class="clearfix single_footer_top floatleft">
                <h2>A propos</h2>
                <p>Ce site a ete concu dans le cadre des projects asigner aux etudiants par leur professeurs Mr.R.chbihi.</p>
            </div>
            <div class="clearfix single_footer_top floatleft">
                <h2>Ce site est créé par:</h2>
                <ul>
                    <li><a>Faraby Youssef</a></li>
                    <li><a>Bouhaddioui Manar</a></li>
                    <li><a>Jabbari Youssef</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="footer_bottom_area">
    <div class="clearfix wrapper footer_bottom">
        <div class="clearfix copyright floatleft">
            <p> Copyright &copy; All rights reserved by <span>DRAAAAVEENNN!!!</span></p>
        </div>
        <div class="clearfix social floatright">
            <ul>
                <li><a class="tooltip" title="Facebook" href=""><i class="fa fa-facebook-square"></i></a></li>
                <li><a class="tooltip" title="Twitter" href=""><i class="fa fa-twitter-square"></i></a></li>
                <li><a class="tooltip" title="Google+" href=""><i class="fa fa-google-plus-square"></i></a></li>
                <li><a class="tooltip" title="LinkedIn" href=""><i class="fa fa-linkedin-square"></i></a></li>
                <li><a class="tooltip" title="tumblr" href=""><i class="fa fa-tumblr-square"></i></a></li>
            </ul>
        </div>
    </div>
</section>

<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.tooltipster.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.tooltip').tooltipster();
    });
</script>
<script type="text/javascript" src="{{ asset('js/selectnav.min.js') }}"></script>
<script type="text/javascript">
    selectnav('nav', {
        label: '-Navigation-',
        nested: true,
        indent: '-'
    });
</script>
<script src="{{ asset('js/pgwslider.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.pgwSlider').pgwSlider({

            intervalDuration: 5000

        });
    });
</script>
<script type="text/javascript" src="{{ asset('js/placeholder_support_IE.js') }}"></script>
@yield('js')


</body>
</html>
