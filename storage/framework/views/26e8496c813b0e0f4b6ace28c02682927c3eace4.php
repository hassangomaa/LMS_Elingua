<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('communication.Your referral link')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/copy_currency.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php if (isset($component)) { $__componentOriginal40930c8fa163487627abe5ffc67daae1ed495134 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ReferalPageSection::class, []); ?>
<?php $component->withName('referal-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40930c8fa163487627abe5ffc67daae1ed495134)): ?>
<?php $component = $__componentOriginal40930c8fa163487627abe5ffc67daae1ed495134; ?>
<?php unset($__componentOriginal40930c8fa163487627abe5ffc67daae1ed495134); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.dashboard_master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/referal.blade.php ENDPATH**/ ?>