<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('payment.Fund Deposit')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/deposit.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <?php if (isset($component)) { $__componentOriginal7ca8e88f16ca4cdc5743621ddf6c8a29702b767c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DepositPageSection::class, ['request' => $request]); ?>
<?php $component->withName('deposit-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7ca8e88f16ca4cdc5743621ddf6c8a29702b767c)): ?>
<?php $component = $__componentOriginal7ca8e88f16ca4cdc5743621ddf6c8a29702b767c; ?>
<?php unset($__componentOriginal7ca8e88f16ca4cdc5743621ddf6c8a29702b767c); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.dashboard_master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/deposit.blade.php ENDPATH**/ ?>