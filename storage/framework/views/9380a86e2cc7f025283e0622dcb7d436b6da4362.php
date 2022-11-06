<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e(Settings('site_title')); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(getCourseImage(Settings('favicon') )); ?>">

    <?php if (isset($component)) { $__componentOriginala67d418518b630fe5034b23b29df155692a4e945 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FrontendDynamicStyleColor::class, []); ?>
<?php $component->withName('frontend-dynamic-style-color'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala67d418518b630fe5034b23b29df155692a4e945)): ?>
<?php $component = $__componentOriginala67d418518b630fe5034b23b29df155692a4e945; ?>
<?php unset($__componentOriginala67d418518b630fe5034b23b29df155692a4e945); ?>
<?php endif; ?>



    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/css/app.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/css/frontend_style.css">

    <script src="<?php echo e(asset('public/js/common.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/app.js')); ?>"></script>

    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/css/gijgo.min.css">
    <script src="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/js/gijgo.min.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/themify-icons.css')); ?>"/>
</head>

<body>
<?php echo $__env->yieldContent('content'); ?>

<?php echo \Brian2694\Toastr\Facades\Toastr::message(); ?>

<?php echo NoCaptcha::renderJs(); ?>


<script>
    if ($('.small_select').length > 0) {
        $('.small_select').niceSelect();
    }

    if ($('.datepicker').length > 0) {
        $('.datepicker').datepicker();
    }
</script>

</body>


</html>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/auth/layouts/app.blade.php ENDPATH**/ ?>