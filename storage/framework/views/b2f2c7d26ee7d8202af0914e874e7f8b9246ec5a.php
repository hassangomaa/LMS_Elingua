<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('student.Account Settings')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php if (isset($component)) { $__componentOriginalc1172499db41813139b9fe97605049a7630467f2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MyAccountPageSection::class, []); ?>
<?php $component->withName('my-account-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1172499db41813139b9fe97605049a7630467f2)): ?>
<?php $component = $__componentOriginalc1172499db41813139b9fe97605049a7630467f2; ?>
<?php unset($__componentOriginalc1172499db41813139b9fe97605049a7630467f2); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.dashboard_master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/myAccount.blade.php ENDPATH**/ ?>