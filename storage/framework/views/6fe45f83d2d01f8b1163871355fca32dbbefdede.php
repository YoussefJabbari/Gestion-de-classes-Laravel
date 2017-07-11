<?php $__env->startSection('title', '- Assiduité'); ?>

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
    <form action="<?php echo e(action('Enseignant\absenceController@create', ['id' => $classe->id])); ?>" method="post" >
        <?php echo e(csrf_field()); ?>

    <div class="clearfix content">
        <div class="content_title"><h2>Assiduité</h2></div>
        <div class="clearfix table">
            <?php if(count($classe->etudiants) != 0): ?>
            <table class="">
                <tr>
                    <th>CNE</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>N°h d'absence</th>
                    <th>Assiduité</th>
                </tr>
                <?php foreach($classe->etudiants as $etudiant): ?>
                    <tr class="div">
                        <td><?php echo e($etudiant->user_id); ?></td>
                        <td><?php echo e($etudiant->user->nom); ?></td>
                        <td><?php echo e($etudiant->user->prenom); ?></td>
                        <td><?php echo e($etudiant->evaluation($classe->id)->nbr_absence); ?></td>
                        <td><input type="checkbox" name=absence['<?php echo e($etudiant->id); ?>'] value="<?php echo e($etudiant->id); ?>" /></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php else: ?>
                <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucun étudiant!</h2>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>

    <?php echo $__env->make('components.sidebarClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="tab-contentt">
        <div class="clearfix">
            <div class="clearfix single_sidebar">
                <div class="popular_post contact_us">
                    <div class="sidebar_title"><h2>Date de séance :</h2></div>
                    <input type="date" name="date_seance" class="wpcf7date" required>
                    <input type="submit" name="valider_assiduite" class="wpcf7__submit" value="Valider">
                </div>
            </div>
        </div>
    </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>