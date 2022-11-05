<div>
    <div class="brand_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="barnd_wrapper brand_active owl-carousel">
                        <?php $__currentLoopData = $sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single_brand">
                                <img src="<?php echo e(asset($sponsor->image)); ?>" alt="<?php echo e($sponsor->title); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/home-page-brand-section.blade.php ENDPATH**/ ?>