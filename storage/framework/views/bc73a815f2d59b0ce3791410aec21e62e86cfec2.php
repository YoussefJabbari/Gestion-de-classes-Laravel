<?php $__env->startSection('title', '- Devoirs'); ?>

<?php $__env->startSection('meta'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .newsletter form input[type=date]{
            width: 680px;
            height: 30px;
            margin-bottom: 15px;
            box-shadow: inset 0px 0px 50px 0px #CCCCCC;
            -webkit-box-shadow: inset 0px 0px 50px 0px #CCCCCC;
            -moz-box-shadow: inset 0px 0px 50px 0px #CCCCCC;
            -o-box-shadow: inset 0px 0px 50px 0px #CCCCCC;
            font-family: sans-serif;
            font-style: bold;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('espace'); ?>
    enseignant
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('components.menuEnseignantClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="clearfix content">
        <div class="content_title"><h2>Devoirs</h2></div>
        <div class="clearfix single_content newsletter">


            <form action="<?php echo e(action('Enseignant\devoirController@create',['id' => $classe->id])); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <legend class="legende">Ajouter un devoir:</legend>
                <input type="text" name="titre_devoir" placeholder="Titre du devoir " required><br />
                <input type="text" name="format_demandee" placeholder="Format demandée" ><br />
                <label for="deadline">Dernier délai:</label><br>
                <input type="date" name="deadline"  required><br /><br>
                <textarea  name="enonce" placeholder="Enoncé" required></textarea><br />
                <input type="submit" value="Ajouter"> <br /><br />
            </form>

        </div>

        <?php $__empty_1 = true; foreach($classe->devoirs as $devoir): $__empty_1 = false; ?>

        <div class="clearfix single_content">
            <div class="clearfix post_date floatleft">
                <div class="date">
                    <h3>Dv</h3>
                </div>
            </div>
            <div class="clearfix post_detail">
                <h2><a href="">Titre : <?php echo e($devoir->titre_devoir); ?> </a></h2>
                <div class="clearfix post-meta">
                    <p><span><i class="fa fa-user"></i> <?php echo e($classe->nom_cours); ?></span> <span><i class="fa fa-clock-o"></i> <?php echo e($devoir->date_devoir); ?></span> </p>
                </div>
                <div class="clearfix post_excerpt">
                    <p>Enoncé : <?php echo e($devoir->enonce); ?><br>
                        Dernier delai:    <?php echo e($devoir->deadline); ?><br>
                        Formats demandées:<?php foreach($devoir->formats as $format): ?> <?php echo e(strtoupper($format->type_format)); ?> <?php endforeach; ?></p>
                </div>
                <a href="<?php echo e(action('Enseignant\travailController@index', ['idClasse' => $classe->id, 'idDevoir' => $devoir->id])); ?>">Accéder aux devoirs rendus</a>
            </div>
        </div>

        <?php endforeach; if ($__empty_1): ?>

        <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucun devoir!</h2>

        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('components.sidebarClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>