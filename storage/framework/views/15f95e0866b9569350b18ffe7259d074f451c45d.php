<div aria-live="polite" aria-atomic="true" style="">
    <!-- Position it -->
    <div id="main-toaster">
    
        <?php if(Session::has('success')): ?>
            <div class="toast alert alert-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <div class="awesome-icon"></div>
                    <strong class="mr-auto pr-3">Just to let you know...</strong>
                    <small class="text-muted">a few seconds ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?php echo e(Session::get('success')); ?>

                </div>
            </div>
            <?php
                Session::forget('success');
            ?>
        <?php endif; ?>

        <?php if(Session::has('info')): ?>
            <div class="toast alert alert-info" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <div class="awesome-icon"></div>
                    <strong class="mr-auto pr-3">Just to let you know...</strong>
                    <small class="text-muted">a few seconds ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?php echo e(Session::get('info')); ?>

                </div>
            </div>
            <?php
                Session::forget('info');
            ?>
        <?php endif; ?>

        <?php if(Session::has('warning')): ?>
            <div class="toast alert alert-warning" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <div class="awesome-icon"></div>
                    <strong class="mr-auto pr-3">Just to let you know...</strong>
                    <small class="text-muted">a few seconds ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?php echo e(Session::get('warning')); ?>

                </div>
            </div>
            <?php
                Session::forget('warning');
            ?>
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            <div class="toast alert alert-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <div class="awesome-icon"></div>
                    <strong class="mr-auto pr-3">Just to let you know...</strong>
                    <small class="text-muted">a few seconds ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?php echo e(Session::get('error')); ?>

                </div>
            </div>
            <?php
                Session::forget('error');
            ?>
        <?php endif; ?>
        
    </div>
</div><?php /**PATH /media/jchegenye/legibra/var/www/laravel-projects/monitor/resources/views/layouts/inner/notification.blade.php ENDPATH**/ ?>