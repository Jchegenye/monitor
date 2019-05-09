<?php $__env->startComponent('mail::layout'); ?>
    
    <?php $__env->slot('header'); ?>
        <?php $__env->startComponent('mail::header', ['url' => config('app.url')]); ?>
            <?php echo e(CommonHelper::custom_app_name()); ?>

        <?php echo $__env->renderComponent(); ?>
    <?php $__env->endSlot(); ?>

    
    <?php echo e($slot); ?>


    
    <?php if(isset($subcopy)): ?>
        <?php $__env->slot('subcopy'); ?>
            <?php $__env->startComponent('mail::subcopy'); ?>
                <?php echo e($subcopy); ?>

            <?php echo $__env->renderComponent(); ?>
        <?php $__env->endSlot(); ?>
    <?php endif; ?>

    
    <?php $__env->slot('footer'); ?>
        <?php $__env->startComponent('mail::footer'); ?>
            © <?php echo e(date('Y')); ?> <?php echo e(CommonHelper::custom_app_name()); ?>. <?php echo app('translator')->getFromJson('All rights reserved.'); ?>
        <?php echo $__env->renderComponent(); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /media/jchegenye/legibra/var/www/laravel-projects/monitor/resources/views/vendor/mail/text/message.blade.php ENDPATH**/ ?>