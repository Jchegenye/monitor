<?php $__env->startSection('title', 'Main Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <h2><?php echo $__env->yieldContent('title'); ?></h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                Statistics (coming soon)

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/jchegenye/legibra/var/www/laravel-projects/monitor/resources/views/home.blade.php ENDPATH**/ ?>