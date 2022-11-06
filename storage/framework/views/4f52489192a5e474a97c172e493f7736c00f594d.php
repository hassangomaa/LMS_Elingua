<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('payment.Purchase history')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <?php if (isset($component)) { $__componentOriginalc755ce5834c68fadc3aa14037deb69db7c5a10b1 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MyPurchasePageSecton::class, []); ?>
<?php $component->withName('my-purchase-page-secton'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc755ce5834c68fadc3aa14037deb69db7c5a10b1)): ?>
<?php $component = $__componentOriginalc755ce5834c68fadc3aa14037deb69db7c5a10b1; ?>
<?php unset($__componentOriginalc755ce5834c68fadc3aa14037deb69db7c5a10b1); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.dashboard_master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/myPurchases.blade.php ENDPATH**/ ?>