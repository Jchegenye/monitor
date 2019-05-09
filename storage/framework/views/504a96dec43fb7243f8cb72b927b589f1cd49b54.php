<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    
    <title><?php echo e(CommonHelper::custom_app_name()); ?> | <?php echo $__env->yieldContent('title'); ?></title>
    
    <meta charset="UTF-8">
    <meta name="robots" content="nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex,nofollow"/> 
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <?php echo $__env->make('layouts.inner.js-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

    <body class="wrapper">
            
        
        <?php $__env->startSection('sidebar'); ?>
            <?php echo $__env->make('layouts.inner.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldSection(); ?>

        <div id="dashboard">

            
            <?php $__env->startSection('top-menu'); ?>
                <?php echo $__env->make('layouts.inner.top-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldSection(); ?>
            
            <?php echo $__env->make('myflashalert::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.inner.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div id="app">
                <?php echo $__env->yieldContent('content'); ?>
            </div>

        </div>
        
        <script type="text/javascript" src="<?php echo e(asset('/js/app.js')); ?>"></script>
    </body>
</html><?php /**PATH /media/jchegenye/legibra/var/www/laravel-projects/monitor/resources/views/layouts/master.blade.php ENDPATH**/ ?>