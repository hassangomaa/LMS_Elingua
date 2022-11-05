<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('frontendmanage.My Profile')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('public/frontend/infixlmstheme/css/select2.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/frontend/infixlmstheme/css/checkout.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/frontend/infixlmstheme/css/myProfile.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/my_profile.js')); ?>"></script>

    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/city.js')); ?>"></script>


    <script src="<?php echo e(asset('public/backend/js/summernote-bs4.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.primary_textarea4 ').summernote({
                codeviewFilter: true,
                codeviewIframeFilter: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen']],
                ],
                placeholder: 'Write here',
                tabsize: 2,
                height: 188,
                tooltip: true
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>

    <?php if (isset($component)) { $__componentOriginal34fffc9a5e5d175d737e378d9a74df4c3b86c232 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MyProfilePageSection::class, []); ?>
<?php $component->withName('my-profile-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal34fffc9a5e5d175d737e378d9a74df4c3b86c232)): ?>
<?php $component = $__componentOriginal34fffc9a5e5d175d737e378d9a74df4c3b86c232; ?>
<?php unset($__componentOriginal34fffc9a5e5d175d737e378d9a74df4c3b86c232); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.dashboard_master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/myProfile.blade.php ENDPATH**/ ?>