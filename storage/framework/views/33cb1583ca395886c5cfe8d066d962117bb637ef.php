<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('common.Checkout')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('public/frontend/infixlmstheme/css/select2.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/frontend/infixlmstheme/css/checkout.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

    <?php if (isset($component)) { $__componentOriginal7eeda00f9434edac82068bc3e191032b05376c98 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CheckoutPageSection::class, ['request' => $request]); ?>
<?php $component->withName('checkout-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7eeda00f9434edac82068bc3e191032b05376c98)): ?>
<?php $component = $__componentOriginal7eeda00f9434edac82068bc3e191032b05376c98; ?>
<?php unset($__componentOriginal7eeda00f9434edac82068bc3e191032b05376c98); ?>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/checkout.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/city.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/checkout.blade.php ENDPATH**/ ?>