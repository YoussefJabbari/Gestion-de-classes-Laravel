<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestion de classes</title>

    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">
    <link rel='stylesheet prefetch' href="<?php echo e(asset('css/Home.css')); ?>">
    <link rel='stylesheet prefetch' href="<?php echo e(asset('css/home2.css')); ?>">
    <link rel='stylesheet prefetch' href="<?php echo e(asset('css/home3.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/test.css')); ?>">
    <style>
        .has-error {
            border: 1px solid #FA5 !important;
        }

        body {
            background-image: url("<?php echo e(asset('Amphi-Ulg.jpg')); ?>");
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
    <div class="thumbnail" style="background: rgba(255, 197, 0, 0.85)"><img src="<?php echo e(asset('images/hat.svg')); ?>"/></div>

    <?php echo $__env->yieldContent('content'); ?>



</div>

<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/Ajax.js')); ?>"></script>
<script src="<?php echo e(asset('js/dynamic.js')); ?>"></script>
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
