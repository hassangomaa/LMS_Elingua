<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('frontend.Logged In Devices')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <?php if (isset($component)) { $__componentOriginalf410c9278c90ad10cbfb573344bc9e8b1023e6c4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\LoginDevicePageSection::class, []); ?>
<?php $component->withName('login-device-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf410c9278c90ad10cbfb573344bc9e8b1023e6c4)): ?>
<?php $component = $__componentOriginalf410c9278c90ad10cbfb573344bc9e8b1023e6c4; ?>
<?php unset($__componentOriginalf410c9278c90ad10cbfb573344bc9e8b1023e6c4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.dashboard_master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/log_in_devices.blade.php ENDPATH**/ ?>