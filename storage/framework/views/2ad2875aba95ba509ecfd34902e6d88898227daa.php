<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo app('translator')->get('frontendmanage.Payment Method'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

    <?php if (isset($component)) { $__componentOriginal8162d4806e8c8731bf58255508134add3244558f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PaymentPageSection::class, []); ?>
<?php $component->withName('payment-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8162d4806e8c8731bf58255508134add3244558f)): ?>
<?php $component = $__componentOriginal8162d4806e8c8731bf58255508134add3244558f; ?>
<?php unset($__componentOriginal8162d4806e8c8731bf58255508134add3244558f); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/payment.blade.php ENDPATH**/ ?>