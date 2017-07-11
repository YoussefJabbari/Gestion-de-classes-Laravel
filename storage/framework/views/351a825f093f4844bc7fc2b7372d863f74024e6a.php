<?php $__env->startSection('title', '- Devoirs'); ?>

<?php $__env->startSection('meta'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        button{background: #222222;
            border: medium none;
            color: #FFD500;
            padding: 5px 20px;
            margin: 2px 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            cursor: pointer;
            font-size: 12px;
            width: 25%;
            height: 30px;
            font-family: oswald;}
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('espace'); ?>
    etudiant
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('components.menuEtudiantClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="clearfix content">

        <div class="content_title"><h2>Devoirs</h2></div>

        <?php $__empty_1 = true; foreach($classe->devoirs as $devoir): $__empty_1 = false; ?>

        <div class="clearfix single_content">
            <div class="clearfix post_date floatleft">
                <div class="date">
                    <h3>Dv</h3>
                </div>
            </div>
            <div class="clearfix post_detail">
                <h2><a>Titre : <?php echo e($devoir->titre_devoir); ?> </a></h2>
                <div class="clearfix post-meta">
                    <p><span><i class="fa fa-user"></i> <?php echo e($classe->nom_cours); ?></span> <span><i class="fa fa-clock-o"></i> <?php echo e($devoir->date_devoir); ?></span> </p>
                </div>
                <div class="clearfix post_excerpt">
                    <p>Enoncé : <?php echo e($devoir->enonce); ?><br>
                        Dernier delai:    <?php echo e($devoir->deadline); ?><br>
                        Formats demandées:<?php foreach($devoir->formats as $format): ?> <?php echo e(strtoupper($format->type_format)); ?> <?php endforeach; ?></p>
                </div><br/>
                <form id="fichier" action="<?php echo e(action('Etudiant\devoirController@upload', ['classe_id' => $classe->id, '$devoir_id' => $devoir->id])); ?>" method='post' enctype="multipart/form-data" >
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="classe_id" value="<?php echo e($classe->id); ?>"/>
                    <input type="hidden" name="devoir_id" value="<?php echo e($devoir->id); ?>"/>
                    <input class="style" type="file" name="fichier" required/>
                </form>
                <button class="floatright" type="submit" id="upload">ENVOYER</button>
            </div>
        </div>

        <?php endforeach; if ($__empty_1): ?>

            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucun devoir!</h2>

        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('components.sidebarClasse', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(function () {
            $('#upload').click(function () {
                var file = new FormData($('#fichier')[0]);
                $.ajax({
                    url: '/devoirs/upload',
                    type: 'POST',
                    data: file,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data==1)
                        {
                            alert('OK');
                        }
                        else
                        {
                            alert(data);
                        }
                    }
                })
            })


        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>