<link rel="stylesheet" href="<?php echo e(asset('public/backend/css/jquery-ui.css')); ?>"/>

<link rel="stylesheet" href="<?php echo e(asset('public/backend/vendors/font_awesome/css/all.min.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('public/backend/css/themify-icons.css')); ?>"/>




<link rel="stylesheet" href="<?php echo e(asset('public/chat/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/css/preloader.css')); ?>"/>
<?php if(isModuleActive("WhatsappSupport")): ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/whatsapp-support/style.css')); ?>"/>
<?php endif; ?>

<link rel="stylesheet" href="<?php echo e(asset('public/backend/css/fullcalendar.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('public/backend/css/app.css')); ?>">


<?php if(isRtl()): ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/backend_style_rtl.css')); ?>"/>
<?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/backend_style.css')); ?>"/>
<?php endif; ?>

<?php echo $__env->yieldPushContent('styles'); ?>




<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/backend/partials/style.blade.php ENDPATH**/ ?>