<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('common.Dashboard')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('public/frontend/infixlmstheme/css/class_details.css')); ?>" rel="stylesheet"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <?php if (isset($component)) { $__componentOriginal6c3ee4e02c1559e42e0e0e70d4c64930afeb5043 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MyDashboardPageSection::class, []); ?>
<?php $component->withName('my-dashboard-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c3ee4e02c1559e42e0e0e70d4c64930afeb5043)): ?>
<?php $component = $__componentOriginal6c3ee4e02c1559e42e0e0e70d4c64930afeb5043; ?>
<?php unset($__componentOriginal6c3ee4e02c1559e42e0e0e70d4c64930afeb5043); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/class_details.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.dashboard_master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/myDashboard.blade.php ENDPATH**/ ?>