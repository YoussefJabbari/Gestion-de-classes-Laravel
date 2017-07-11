<?php $__env->startSection('title', '- Notes'); ?>

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
        <div class="clearfix single_content newsletter">
            <form action="<?php echo e(action('Enseignant\notesController@calcul', ['id' => $classe->id])); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <legend class="legende">Calculer les notes:</legend><br>
                <input type="number" name="pourcentage_examen" placeholder="Pourcentage de l'examen final"><br />
                <input type="number" name="pourcentage_controle" placeholder="Pourcentage des contrôles"><br />
                <input type="number" name="pourcentage_devoir" placeholder="Pourcentage des devoirs"><br />
                <input type="number" name="pourcentage_assiduite"  placeholder="Pourcentage de l'assiduité"><br />
                <input type="number" name="note_reference"  placeholder="Note de référence de l'assiduité"><br />
                <input type="number" name="nbr_seance"  placeholder="Nombre de séances"><br />

                <input type="submit" class="floatright" value="Calculer"> <br /><br />
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('components.sidebarClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>