<?php $__env->startSection('title', 'Uptime Checks'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container" id="main-box">

        <div class="row align-items-center">
            <div class="col-md-6 d-flex justify-content-start">
                <h6 class="mb-0"><?php echo $__env->yieldContent('title'); ?></h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end">

                <div class="dropdown-ellipsed d-flex btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                </div>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="d-flex align-items-center">
                        <div class="d-flex mr-auto">
                            <button class="dropdown-item d-flex" type="button"><b>Actions</b></button>
                        </div>
                        <div class="d-flex ml-auto mr-4">
                            <i class="fas fa-info-circle"></i>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#addNewWebsite">
                            <i class="fas fa-plus-circle"></i>Add New
                        </button>
                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#importWebsite">
                            <i class="fas fa-file"></i>Import (CSV or Excel)
                        </button>
                    <div class="dropdown-divider"></div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12"><hr class="">
            
                <posts-component></posts-component>
                <add-post></add-post>

            </div>
        </div>

    </div>

    <!-- Modal (Add New) -->
    <?php echo $__env->make('dashboard.monitoring.uptime.modals.websites.import-website', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/jchegenye/legibra/var/www/laravel-projects/monitor/resources/views/dashboard/monitoring/uptime/websites.blade.php ENDPATH**/ ?>