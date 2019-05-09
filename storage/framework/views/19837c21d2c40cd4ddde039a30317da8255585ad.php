<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="postAdd col-lg-12 text-right" style="margin-bottom: 20px;">
           <a href="<?php echo e(url('/add-post')); ?>" class="btn btn-primary">Add Post</a>
       </div>   
   </div>

   <posts-component></posts-component>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/jchegenye/legibra/var/www/laravel-projects/monitor/resources/views/blogDashBoard.blade.php ENDPATH**/ ?>