<?php $__env->startSection('title', '- Profile'); ?>

<?php $__env->startSection('meta'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('espace'); ?>
    etudiant
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('components.menuEtudiantProfile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $etd = Auth::user()->etudiant ?>
    <div class="clearfix content">

        <div class="content_title"><h2><span class="glyphicon glyphicon-home"></span> Vos classes</h2></div>

        <?php if(count($etd->classes) != 0): ?>

        <div class="clearfix table">
            <table>
                <tr>
                    <th>Nom du cours</th>
                    <th>Nom de la formation</th>
                    <th>Semestre</th>
                    <th>Année scolaire</th>
                </tr>

                <?php foreach($etd->classes as $classe): ?>

                    <tr>
                        <td><a href="<?php echo e(action('Etudiant\annonceController@index', ['id' => $classe->id])); ?>"> <?php echo e($classe->nom_cours); ?> </a></td>
                        <td><?php echo e($classe->nom_formation); ?></td>
                        <td><?php echo e($classe->semestre); ?></td>
                        <td><?php echo e($classe->annee_univ); ?></td>
                    </tr>

                <?php endforeach; ?>

            </table>
        </div>

        <?php else: ?>
            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Vous n'êtes inscrit dans aucune classe!</h2>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>

    <?php echo $__env->make('components.sidebarEtudiantProfile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="clearfix sidebar bottom"  id="travail">
        <div class="clearfix single_sidebar">
            <div class="popular_post contact_us">
                <div class="sidebar_title"><h2><span class="glyphicon glyphicon-search"></span> Rechercher une classe :</h2></div>
                <ul>
                    <li>
                        <form action="<?php echo e(action('Etudiant\classeController@search')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="nom_cours" class="wpcf7__number" placeholder="Nom du cours">
                            <input type="text" name="semestre" class="wpcf7__number" placeholder="Semestre">
                            <input type="text" name="annee_univ" class="wpcf7__number" placeholder="Année universitaire">
                            <input type="text" name="nom_formation" class="wpcf7__number" placeholder="Nom de la formation"><br>
                            <input type="submit" name="rechercher" class="floatright wpcf7__submit" value="Rechercher">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>