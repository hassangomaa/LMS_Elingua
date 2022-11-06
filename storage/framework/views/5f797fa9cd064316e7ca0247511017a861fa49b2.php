<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('coupons.My Cart')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>


<?php $__env->startSection('mainContent'); ?>
    <?php if (isset($component)) { $__componentOriginal140dfd90337067d174ebbcb2d3bcfb83a6461176 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MyCartWithLoginPageSection::class, []); ?>
<?php $component->withName('my-cart-with-login-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal140dfd90337067d174ebbcb2d3bcfb83a6461176)): ?>
<?php $component = $__componentOriginal140dfd90337067d174ebbcb2d3bcfb83a6461176; ?>
<?php unset($__componentOriginal140dfd90337067d174ebbcb2d3bcfb83a6461176); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make(theme('layouts.dashboard_master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/myCart.blade.php ENDPATH**/ ?>