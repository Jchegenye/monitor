<?php $__env->startComponent('mail::message'); ?>
# Hi <?php echo e($user->name); ?>,

<a href="<?php echo e($details->site_info['site_url']); ?>" target="_blank"><?php echo e(ucfirst($details->site_info['site_name'])); ?></a> is DOWN since <?php echo e($details->updated_at); ?>


Monitor robot will alert you when it's up or 

<?php $__env->startComponent('mail::button', ['url' => url('/dashboard/monitoring/uptime/websites/'.$details->id), 'color' => 'red'] ); ?>
Take Action
<?php echo $__env->renderComponent(); ?>

Sincerely,<br>
<?php echo e(CommonHelper::custom_app_name()); ?> Team
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /media/jchegenye/legibra/var/www/laravel-projects/monitor/resources/views/emails/monitoring/websites/downtime.blade.php ENDPATH**/ ?>