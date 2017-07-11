<?php $__env->startSection('title', '- Travails'); ?>

<?php $__env->startSection('meta'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function loadDoc(id) {

            $.get("/get_travail_etudiant/<?php echo e($devoir->id); ?>",{id:id})
                    .done(function (data) {
                        //console.log(data);
                        $('#travails').html(data);
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

        <h1>Titre: <?php echo e($devoir->titre_document); ?> </h1>
        <div class="clearfix post-meta">
            <p><span><i class="fa fa-user"></i> <?php echo e($classe->nom_cours); ?></span> <span><i class="fa fa-clock-o"></i> <?php echo e($devoir->date_devoir); ?></span> </p>
        </div>

        <div class="clearfix post_excerpt categoriee">

            <p>Enoncé : <?php echo e($devoir->enonce); ?></p><br>

            <p>Dernier delai:    <?php echo e($devoir->deadline); ?></p><br>

            <p>Formats demandées: <?php foreach($devoir->formats as $format): ?> <?php echo e(strtoupper($format->type_format)); ?> <?php endforeach; ?></p>

        </div>

    </div><br><br>
    <div class="clearfix table">
        <?php if(count($classe->etudiants) != 0): ?>
        <table>
            <tr>
                <th>CNE</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Travail</th>
                <th>Note</th>
            </tr>

            <?php foreach($classe->etudiants as $etudiant): ?>
                <tr data-id="<?php echo e($etudiant->id); ?>">
                    <td><?php echo e($etudiant->user_id); ?></td>
                    <td><?php echo e($etudiant->user->nom); ?></td>
                    <td><?php echo e($etudiant->user->prenom); ?></td>
                    <td><a href="#travails" onclick="loadDoc(<?php echo e($etudiant->user_id); ?>)">Travail</a></td>
                    <td class="note_devoir">
                        <?php if(count($etudiant->travail($devoir->id)) != 0): ?>
                            <?php echo e($etudiant->travail($devoir->id)->note_devoir); ?>

                        <?php else: ?>
                            0
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucun étudiant!</h2>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>

    <?php echo $__env->make('components.sidebarClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div id="travails" class="clearfix sidebar bottom">

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>