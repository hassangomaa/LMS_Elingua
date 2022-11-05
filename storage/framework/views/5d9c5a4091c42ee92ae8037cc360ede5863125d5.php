<?php echo $__env->make(theme('partials._header'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="dashboard_main_wrapper">
    <?php echo $__env->make(theme('partials._sidebar'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="main_content dashboard_part">
        <?php echo $__env->make(theme('partials._dashboard_menu'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('mainContent'); ?>
    </section>
</div>
<?php echo $__env->make('preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<input type="hidden" name="app_debug" class="app_debug" value="<?php echo e(env('APP_DEBUG')); ?>">
<?php echo $__env->make(theme('partials._footer'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/layouts/dashboard_master.blade.php ENDPATH**/ ?>