<?php $__env->startSection('title', '- Annonces'); ?>

<?php $__env->startSection('meta'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
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
        <div class="content_title"><h2>Annonces</h2></div>
        <div class="clearfix single_content newsletter">
            <form action="<?php echo e(action('Enseignant\annonceController@create', ['id' => $classe->id])); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <legend class="legende">Publier une annonce:</legend>
                <input type="text" name="titre_annonce" placeholder="Titre de l'annonce" required><br />
                <textarea  name="annonce" placeholder="Annonce" required></textarea><br />
                <input type="submit" value="Publier"> <br /><br />
            </form>
        </div>

        <?php $__empty_1 = true; foreach($classe->annonces as $annonce): $__empty_1 = false; ?>

        <div class="clearfix single_content">
            <div class="clearfix post_date floatleft">
                <div class="date">
                    <h3>A</h3>
                </div>
            </div>
            <div class="clearfix post_detail">
                <h2><a><?php echo e($annonce->nom_annonce); ?></a></h2>
                <div class="clearfix post-meta">
                    <p><span><i class="fa fa-user"></i> <?php echo e($classe->nom_cours); ?></span> <span><i class="fa fa-clock-o"></i> <?php echo e($annonce->date_annonce); ?></span> </p>
                </div>
                <div class="clearfix post_excerpt">
                    <p><b><?php echo e($annonce->annonce); ?></b></p><br>
                </div>
            </div>
        </div>

        <?php endforeach; if ($__empty_1): ?>

        <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucune annonce!</h2>

        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('components.sidebarClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>