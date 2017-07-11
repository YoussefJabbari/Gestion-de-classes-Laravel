<?php $__env->startSection('content'); ?>
        <!-- formulaire d'inscription  -->
<form action="<?php echo e(url('register')); ?>" method="POST" class="register-form" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <?php if($errors->has('nom')): ?>
        <span>
              <strong class="error"><?php echo e($errors->first('nom')); ?></strong>
            </span>
    <?php endif; ?>
    <input name="nom" type="text" placeholder="Nom" class="<?php echo e($errors->has('nom') ? 'has-error' : ''); ?>" value="<?php echo e(old('nom')); ?>" />

    <?php if($errors->has('prenom')): ?>
        <span>
              <strong class="error"><?php echo e($errors->first('prenom')); ?></strong>
            </span>
    <?php endif; ?>
    <input name="prenom" type="text" placeholder="Prénom" class="<?php echo e($errors->has('prenom') ? 'has-error' : ''); ?>" value="<?php echo e(old('prenom')); ?>" />

    <?php if($errors->has('dateNaissance')): ?>
        <span>
              <strong class="error"><?php echo e($errors->first('dateNaissance')); ?></strong>
            </span>
    <?php endif; ?>
    <input name="dateNaissance" type="date" placeholder="Date de naissance" class="<?php echo e($errors->has('dateNaissance') ? 'has-error' : ''); ?>" value="<?php echo e(old('dateNaissance')); ?>" />

    <?php if($errors->has('user')): ?>
        <span>
              <strong class="error"><?php echo e($errors->first('user')); ?></strong>
            </span>
    <?php endif; ?>
    <input name="user" type="radio" onclick="uenseignant()" id="tenseignant" value="0" class="<?php echo e($errors->has('user') ? 'has-error' : ''); ?>" />Enseignant
    <input name="user" type="radio" onclick="uetudiant()" id="tetudiant" value="1" class="<?php echo e($errors->has('user') ? 'has-error' : ''); ?>" />Etudiant

    <?php if($errors->has('cne')): ?>
        <span>
              <strong class="error"><?php echo e($errors->first('cne')); ?></strong>
            </span>
    <?php endif; ?>
    <div id="ifetudiant" style="display: none;"><input name="cne" type="text" placeholder="CNE" class="<?php echo e($errors->has('cne') ? 'has-error' : ''); ?>" value="<?php echo e(old('cne')); ?>"/></div>

    <?php if($errors->has('email')): ?>
        <span>
              <strong class="error"><?php echo e($errors->first('email')); ?></strong>
            </span>
    <?php endif; ?>
    <input name="email" type="text" placeholder="Adresse mail" class="<?php echo e($errors->has('email') ? 'has-error' : ''); ?>" value="<?php echo e(old('email')); ?>" />

    <?php if($errors->has('password')): ?>
        <span>
              <strong class="error"><?php echo e($errors->first('password')); ?></strong>
            </span>
    <?php endif; ?>
    <input name="password" type="password" placeholder="Mot de passe" class="<?php echo e($errors->has('password') ? 'has-error' : ''); ?>" />
    <input name="password_confirmation" type="password" placeholder="Confirmer votre mot de passe" class="<?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>" />
    <label for="photo" style="float: left;">Photo d'identité:</label>

    <?php if($errors->has('photo')): ?>
        <span>
              <strong class="error"><?php echo e($errors->first('photo')); ?></strong>
            </span>
    <?php endif; ?>
    <input name="photo" type="file" accept="image/*" class="<?php echo e($errors->has('photo') ? 'has-error' : ''); ?>" />
    <button type="submit">create</button>
    <p class="message">Déjà inscrit? <a href="/login">S'authentifier</a></p>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>