<?php $__env->startSection('title', '- Exams&Controles'); ?>

<?php $__env->startSection('meta'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function loadDoc(id) {

            $.get("/get_info_etudiant",{id:id})
                    .done(function (data) {
                        //console.log(data);
                        $('#etudiant').html(data);
                    })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('espace'); ?>
    enseignant
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('components.menuEnseignantClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="clearfix content">
        <div class="content_title"><h2>Examens & Contrôles</h2></div>
        <div class="clearfix table">
            <?php if(count($classe->etudiants) != 0): ?>
            <table>
                <tr>
                    <th>CNE</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Devoirs</th>
                    <th>Contrôles</th>
                    <th>Session normale</th>
                    <th>Session rattrapage</th>
                </tr>
                <?php foreach($classe->etudiants as $etudiant): ?>
                <tr data-id="<?php echo e($etudiant->id); ?>">
                    <td><a href="#etudiant" onclick="loadDoc(<?php echo e($etudiant->user_id); ?>)"><?php echo e($etudiant->user_id); ?></a></td>
                    <td><?php echo e($etudiant->user->nom); ?></td>
                    <td><?php echo e($etudiant->user->prenom); ?></td>
                    <td class="note_devoir"><?php echo e($etudiant->evaluation($classe->id)->note_devoir); ?></td>
                    <td class="note_controle"><?php echo e($etudiant->evaluation($classe->id)->note_controle); ?></td>
                    <td class="note_normale"><?php echo e($etudiant->evaluation($classe->id)->note_normale); ?></td>
                    <td class="note_rattrapage"><?php echo e($etudiant->evaluation($classe->id)->note_rattrapage); ?></td>
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

    <div id="etudiant" class="clearfix sidebar bottom">

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>