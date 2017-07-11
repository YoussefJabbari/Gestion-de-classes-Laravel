<?php $__env->startSection('content'); ?>
        <!-- formulaire d'authentification -->
        <form action="<?php echo e(url('login')); ?>" method="post" class="login-form">
    <?php echo e(csrf_field()); ?>

    <?php if($errors->has('email')): ?>
        <span>
              <strong class="error"><?php echo e($errors->first('email')); ?></strong>
            </span>
    <?php endif; ?>
    <input name="email" type="text" class="<?php echo e($errors->has('email') ? 'has-error' : ''); ?>"
           placeholder="Adresse mail"  value="<?php echo e(old('email')); ?>"/>


    <?php if($errors->has('password')): ?>
        <span>
                <strong class="error"><?php echo e($errors->first('password')); ?></strong>
            </span>
    <?php endif; ?>
    <input name="password" type="password" class="<?php echo e($errors->has('password') ? 'has-error' : ''); ?>" placeholder="Mot de passe" />

    <button type="submit">login</button>
    <p class="message">Vous n'êtes pas inscrits? <a href="/register">Créez un compte</a></p>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>