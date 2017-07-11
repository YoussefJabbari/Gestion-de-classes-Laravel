<?php $__env->startSection('title', '- Demandes'); ?>

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

        <div class="content_title"><h2>Demandes des étudiants</h2></div>

        <?php $__empty_1 = true; foreach($prof->demandes as $demande): $__empty_1 = false; ?>

        <div class="clearfix single_content">
            <div class="clearfix post_date floatleft">
                <img width="100px" src="Telechargements/images/<?php echo e($demande->etudiant->user->photo); ?>" >
            </div>
            <div class="clearfix post_detail">
                <h2><a><?php echo e($demande->etudiant->user->nom); ?> <?php echo e($demande->etudiant->user->prenom); ?> </a></h2>
                <div class="clearfix post-meta">
                    <p><span><i class="fa"></i>Classe demandée:</span></p>
                </div>
                <div class="clearfix post_excerpt">
                    <p>Nom du cours         : <?php echo e($demande->classe->nom_cours); ?><br>

                        Semestre            : <?php echo e($demande->classe->semestre); ?><br>

                        Année universitaire : <?php echo e($demande->classe->annee_univ); ?><br>

                        Nom de la formation : <?php echo e($demande->classe->nom_formation); ?></p><br>
                </div>
                <span><a href="<?php echo e(action('Enseignant\demandeController@add',['id_etudiant' => $demande->etudiant->id,'id_classe' => $demande->classe->id])); ?>" >Ajouter</a></span>
                <span><a href="<?php echo e(action('Enseignant\demandeController@refuse',['id_etudiant' => $demande->etudiant->id,'id_classe' => $demande->classe->id])); ?>" >Refuser</a></span>

            </div>


        </div>


        <?php endforeach; if ($__empty_1): ?>

        <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Vous n'avez aucune demande!</h2>

        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('components.sidebarEnseignantProfile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>