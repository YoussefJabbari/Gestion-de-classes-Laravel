<div class="clearfix sidebar">
    <div class="clearfix single_sidebar">
        <div class="popular_post">
            <div class="content_title"><h2><span class="glyphicon glyphicon-user"></span> Profile:</h2></div>
            <img src="/Telechargements/images/<?php echo e(Auth::user()->photo); ?>" class="img-thumbnail img-responsive" style="width:270px;height:255px;" />
            <ul>
                <li><a>
                        <label>CNE: <?php echo e(Auth::user()->id); ?></label><br>
                        <label>Nom: <?php echo e(Auth::user()->nom); ?></label><br>
                        <label>Prénom: <?php echo e(Auth::user()->prenom); ?></label><br>
                        <label>Date de naissance: <?php echo e(Auth::user()->date_naissance); ?></label><br>
                        <label>Email: <?php echo e(Auth::user()->email); ?></label><br>
                    </a></li>
            </ul>
        </div>
    </div>
</div>