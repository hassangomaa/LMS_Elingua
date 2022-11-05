<?php echo $__env->make(theme('partials._header'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make(theme('partials._menu'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="error_wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="error_wrapper_info text-center">
                    <div class="thumb">
                        <img src="<?php echo e(asset('public/errors/'.$exception->getStatusCode().'.png')); ?>" alt="">
                    </div>
                    <h3><?php echo $__env->yieldContent('message'); ?></h3>
                    <p><?php echo $__env->yieldContent('details'); ?></p>
                    <a href="<?php echo e(url('/')); ?>" class="theme_btn ">
                        <?php echo e(__('frontend.Back To Homepage')); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->yieldContent('mainContent'); ?>
<?php echo $__env->make(theme('partials._footer'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/errors/layout.blade.php ENDPATH**/ ?>