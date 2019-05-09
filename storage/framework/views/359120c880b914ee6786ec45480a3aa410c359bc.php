<?php
   $data = json_decode(json_encode(session('myflashalert_session')), true);
   //dd($data)
?>

<?php if(session()->has('myflashalert_session')): ?>
    <div class="alert alert-<?php echo e($data['level']); ?> <?php echo e($data['important'] ? 'alert-important' : ''); ?>" role="alert">
        <?php if($data['important']): ?>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
            >&times;</button>
        <?php endif; ?>

        <?php echo $data['message']; ?>

    </div>
<?php endif; ?>

<?php echo e(session()->forget('myflashalert_session')); ?>

<?php /**PATH /media/jchegenye/legibra/var/www/laravel-projects/monitor/vendor/jchegenye/myflashalert/src/resources/views/message.blade.php ENDPATH**/ ?>