<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('Server Error')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message'); ?>
    <?php echo e(__('Server Error')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('details'); ?>
    <?php echo e($exception->getMessage()?$exception->getMessage():trans('frontend.Whoops, something went wrong on our servers')); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('errors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/errors/500.blade.php ENDPATH**/ ?>