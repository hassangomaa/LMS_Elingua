<div>
    <div class="package_area"
         style="background-image: url('<?php echo e(asset(@$homeContent->best_category_banner)); ?>')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="section__title text-center mb_80">
                        <h3>
                            <?php echo e(@$homeContent->best_category_title); ?>

                        </h3>
                        <p>
                            <?php echo e(@$homeContent->best_category_sub_title); ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="package_carousel_active owl-carousel">
                        <?php if(isset($categories )): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="single_package">
                                    <div class="icon">
                                        <img src="<?php echo e(asset($category->image)); ?>" alt="">
                                    </div>
                                    <a href="<?php echo e(route('courses')); ?>?category=<?php echo e($category->id); ?>">
                                        <h4><?php echo e($category->name); ?></h4>
                                    </a>
                                    <p><?php echo e($category->courses_count); ?> <?php echo e(__('frontend.Courses')); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/home-page-best-category-section.blade.php ENDPATH**/ ?>