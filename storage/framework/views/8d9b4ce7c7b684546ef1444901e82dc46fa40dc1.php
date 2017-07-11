<?php $__env->startSection('title', '- Documents'); ?>

<?php $__env->startSection('meta'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .newsletter form select{
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
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('espace'); ?>
    enseignant
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('components.menuEnseignantClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="clearfix content">

        <div class="content_title"><h2>Documents</h2></div>

        <div class="clearfix single_content newsletter">
            <form action="<?php echo e(action('Enseignant\documentController@create', ['id' => $classe->id])); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <legend class="legende">Ajouter un document:</legend>
                <input type="text" name="titre_document" placeholder="Titre du document" required><br />
                <label for="categorie">Catégorie:</label>
                <select name="categorie">
                    <option value="1">Cours</option>
                    <option value="2">Exercice</option>
                    <option value="3">Autre</option>
                </select> <br />
                <textarea  name="description" placeholder="Description" ></textarea><br />
                <input type="file" name="fichier" required/><br /><br />
                <input type="submit" value="Ajouter"> <br /><br />
            </form>
        </div>

        <?php if(count($classe->documents) != 0): ?>

            <div class="div clearfix work_pagination">
                <ul class="tab-group">
                    <li class="tab active"><a  href="#affichageNormale">Affichage normale</a></li>
                    <li class="tab"><a  href="#affichageCategorie">Affichage par catégorie</a></li>
                </ul>

                <div class="tab-content">

                    <div id="affichageNormale">

                        <?php foreach($classe->documents as $document): ?>
                            <div class="clearfix single_content">
                                <div class="clearfix post_date floatleft">
                                    <div class="date">
                                        <h3>Dc</h3>
                                    </div>
                                </div>
                                <div class="clearfix post_detail">
                                    <h2><a href="">Titre : <?php echo e($document->titre_document); ?> </a></h2>
                                    <div class="clearfix post-meta">
                                        <p><span><i class="fa fa-user"></i> <?php echo e($classe->nom_cours); ?></span> <span><i class="fa fa-clock-o"></i> <?php echo e($document->date_document); ?></span> </p>
                                    </div>

                                    <div class="clearfix post_excerpt">
                                        <pre>Type :   <?php echo e($document->categorie->nom_categorie); ?> <br/></pre>
                                        <pre>Description: <?php echo e($document->description); ?></pre>

                                    </div>
                                    <a href="<?php echo e(action('Enseignant\versionController@index',['idClasse'=>$classe->id,'idDocument'=>$document->id])); ?>">Accéder au document</a>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>

                    <div id="affichageCategorie" style="display:none;">
                        <div class="cours">
                            <h1>Cours</h1>

                            <?php foreach($classe->documents as $document): ?>
                                <?php if($document->categorie_id == 1): ?>
                                    <div class="clearfix singlesidebar post_excerpt categoriee">
                                        <h2><?php echo e($document->titre_document); ?></h2>
                                        <ul>
                                            <li class="floatleft">

                                                <p>Type : <?php echo e($document->categorie->nom_categorie); ?></p><br>

                                                <p>Date : <?php echo e($document-> date_document); ?></p>

                                                <a href="<?php echo e(action('Enseignant\versionController@index',['idClasse'=>$classe->id,'idDocument'=>$document->id])); ?>">Accéder au document</a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>

                        <div class="cours">
                            <h1>Exercice:</h1>

                            <?php foreach($classe->documents as $document): ?>
                                <?php if($document->categorie_id == 2): ?>
                                    <div class="clearfix singlesidebar post_excerpt categoriee">
                                        <h2><?php echo e($document->titre_document); ?></h2>
                                        <ul>
                                            <li class="floatleft">

                                                <p>Type : <?php echo e($document->categorie->nom_categorie); ?></p><br>

                                                <p>Date : <?php echo e($document-> date_document); ?></p>

                                                <a href="<?php echo e(action('Enseignant\versionController@index',['idClasse'=>$classe->id,'idDocument'=>$document->id])); ?>">Accéder au document</a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>

                        <div class="cours">
                            <h1>Autre:</h1>

                            <?php foreach($classe->documents as $document): ?>
                                <?php if($document->categorie_id == 3): ?>
                                    <div class="clearfix singlesidebar post_excerpt categoriee">
                                        <h2><?php echo e($document->titre_document); ?></h2>
                                        <ul>
                                            <li class="floatleft">

                                                <p>Type : <?php echo e($document->categorie->nom_categorie); ?></p><br>

                                                <p>Date : <?php echo e($document-> date_document); ?></p>

                                                <a href="<?php echo e(action('Enseignant\versionController@index',['idClasse'=>$classe->id,'idDocument'=>$document->id])); ?>">Accéder au document</a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucun document!</h2>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>

    <?php echo $__env->make('components.sidebarClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="clearfix sidebar">
        <div class="clearfix single_sidebar">
            <div class="popular_post">
                <div class="sidebar_title"><h2>Statistiques:</h2></div>
                <ul>
                    <li><a>
                            <label>Cours: <?php echo e($cours); ?></label><br>
                            <label>Exercices: <?php echo e($exercice); ?></label><br>
                            <label>Autres catégories: <?php echo e($autre); ?></label><br>
                            <label>Total: <?php echo e($cours+$exercice+$autre); ?></label><br>
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>