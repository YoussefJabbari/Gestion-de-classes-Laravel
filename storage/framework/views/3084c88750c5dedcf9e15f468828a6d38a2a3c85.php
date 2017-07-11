<?php $__env->startSection('title', '- Profile'); ?>

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
    <?php echo $__env->make('components.menuEnseignantProfile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $prof = Auth::user()->enseignant ?>
    <div class="content">
        <div class="content_title"><h2><span class="glyphicon glyphicon-home"></span> Vos classes</h2></div>

        <?php if(count($prof->classes) != 0): ?>

        <div class="clearfix table">
            <table class="table table-hover">
                <tr>
                    <th>Nom du cours</th>
                    <th>Nom de la formation</th>
                    <th>Semestre</th>
                    <th>Année scolaire</th>
                    <th>Supprimer</th>
                </tr>

                <?php foreach($prof->classes as $classe): ?>

                <tr>
                    <td><a href="<?php echo e(action('Enseignant\annonceController@index', ['id' => $classe->id])); ?>"> <?php echo e($classe->nom_cours); ?> </a></td>
                    <td><?php echo e($classe->nom_formation); ?></td>
                    <td><?php echo e($classe->semestre); ?></td>
                    <td><?php echo e($classe->annee_univ); ?></td>
                    <td><a href="<?php echo e(action('Enseignant\classeController@delete', ['id' => $classe->id])); ?>">Supprimer</a></td>
                </tr>

                <?php endforeach; ?>

            </table>
        </div>

        <?php else: ?>

        <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Vous n'avez aucune classe!</h2>

        <?php endif; ?>

        <br/>

        <div class="clearfix single_content newsletter">

            <form action="<?php echo e(action('Enseignant\classeController@create')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <legend class="legende">Créez une classe:</legend>
                <input type="text" name="nom_cours" placeholder="Nom du cours" required><br />
                <input type="text" name="semestre" placeholder="Semestre" required><br />
                <input type="text" name="annee_univ" placeholder="Année universitaire" required><br />
                <input type="text" name="nom_formation" placeholder="Nom de la formation" required><br />
                <input type="submit" value="Créer"> <br /><br />
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('components.sidebarEnseignantProfile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>