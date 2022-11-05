<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('Not Found')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message'); ?>
    <?php echo e('Opps! Page Not Found'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('details'); ?>
    <?php echo e($exception->getMessage() ?: 'Sorry, the page you are looking for could not be found.'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('errors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/errors/404.blade.php ENDPATH**/ ?>