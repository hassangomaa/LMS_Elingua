<?php echo $__env->make(theme('partials._header'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make(theme('partials._menu'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<input type="hidden" name="base_url" class="base_url" value="<?php echo e(url('/')); ?>">
<input type="hidden" name="csrf_token" class="csrf_token" value="<?php echo e(csrf_token()); ?>">
<?php if(auth()->check()): ?>
    <input type="hidden" name="balance" class="user_balance" value="<?php echo e(auth()->user()->balance); ?>">
<?php endif; ?>
<input type="hidden" name="currency_symbol" class="currency_symbol" value="<?php echo e(Settings('currency_symbol')); ?>">
<input type="hidden" name="app_debug" class="app_debug" value="<?php echo e(env('APP_DEBUG')); ?>">
<?php echo $__env->make('preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('mainContent'); ?>
<?php echo $__env->make(theme('partials._footer'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/layouts/master.blade.php ENDPATH**/ ?>