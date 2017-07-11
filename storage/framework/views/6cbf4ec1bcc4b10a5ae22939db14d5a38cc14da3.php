<?php $__env->startSection('title', '- Etudiants'); ?>

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

        <div class="content_title"><h2>Etudiants</h2></div>

        <div class="clearfix table">

            <?php if(count($classe->etudiants) != 0): ?>

            <table>

                <tr>
                    <th>CNE</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>N°h d'absence</th>
                    <th>Email</th>
                    <th>Date de naissance</th>
                </tr>

                <?php foreach($classe->etudiants as $etudiant): ?>
                    <tr class="div">
                        <td><?php echo e($etudiant->user_id); ?></td>
                        <td><?php echo e($etudiant->user->nom); ?></td>
                        <td><?php echo e($etudiant->user->prenom); ?></td>
                        <td><?php echo e($etudiant->evaluation($classe->id)->nbr_absence); ?></td>
                        <td><?php echo e($etudiant->user->email); ?></td>
                        <td><?php echo e($etudiant->user->date_naissance); ?></td>
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
                    <div class="sidebar_title" style="margin-bottom: 0px;"><h2>Ajouter un étudiant</h2></div>
                    <ul>
                        <li>
                            <form action="<?php echo e(route('add',['id' => $classe->id])); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input class="floatright" style="width: 280px; height: 25px;" type="number" name="acne" placeholder="CNE" required><br>
                                <input type="submit" name="ajouter_etudiant" class="floatright wpcf7__submit" value="Ajouter">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-contentt">
        <div class="clearfix">
            <div class="clearfix single_sidebar">
                <div class="popular_post contact_us">
                    <div class="sidebar_title" style="margin-bottom: 0px;"><h2>Supprimer un étudiant</h2></div>
                    <ul>
                        <li>
                            <form class="floatright" action="<?php echo e(route('remove',['id' => $classe->id])); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input style="width: 280px; height: 25px;" type="number" name="scne" placeholder="CNE" required><br>
                                <input type="submit" name="supprimer_etudiant" class="floatright wpcf7__submit" value="Supprimer">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>