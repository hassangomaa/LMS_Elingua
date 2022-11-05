<div>
    <div class="course_area section_spacing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section__title text-center mb_80">
                        <h3>
                            <?php echo e(@$homeContent->course_title); ?>



                        </h3>
                        <p>
                            <?php echo e(@$homeContent->course_sub_title); ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(isset($top_courses)): ?>
                    <?php $__currentLoopData = $top_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-xl-3 col-md-6">
                            <div class="couse_wizged">
                                <a href="<?php echo e(courseDetailsUrl(@$course->id,@$course->type,@$course->slug)); ?>">
                                    <div class="thumb">

                                        <div class="thumb_inner lazy"
                                             data-src="<?php echo e(getCourseImage($course->thumbnail)); ?>">
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginal584ade79a82150a936ef53728517a659b0812861 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PriceTag::class, ['price' => $course->price,'discount' => $course->discount_price]); ?>
<?php $component->withName('price-tag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal584ade79a82150a936ef53728517a659b0812861)): ?>
<?php $component = $__componentOriginal584ade79a82150a936ef53728517a659b0812861; ?>
<?php unset($__componentOriginal584ade79a82150a936ef53728517a659b0812861); ?>
<?php endif; ?>
                                    </div>
                                </a>
                                <div class="course_content">
                                    <a href="<?php echo e(courseDetailsUrl(@$course->id,@$course->type,@$course->slug)); ?>">

                                        <h4 class="noBrake" title=" <?php echo e($course->title); ?>">
                                            <?php echo e($course->title); ?>

                                        </h4>
                                    </a>

                                    <div class="rating_cart">
                                        <div class="rateing">
                                            <span><?php echo e($course->totalReview); ?>/5</span>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <?php if(auth()->guard()->check()): ?>
                                            <?php if(!$course->isLoginUserEnrolled && !$course->isLoginUserCart): ?>
                                                <a href="#" class="cart_store"
                                                   data-id="<?php echo e($course->id); ?>">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(auth()->guard()->guest()): ?>
                                            <?php if(!$course->isGuestUserCart): ?>
                                                <a href="#" class="cart_store"
                                                   data-id="<?php echo e($course->id); ?>">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </div>
                                    <div class="course_less_students">
                                        <a> <i class="ti-agenda"></i> <?php echo e(count($course->lessons)); ?>

                                            <?php echo e(__('frontend.Lessons')); ?></a>
                                        <a>
                                            <i class="ti-user"></i> <?php echo e($course->total_enrolled); ?> <?php echo e(__('frontend.Students')); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center pt_70">
                    <a href="<?php echo e(route('courses')); ?>"
                       class="theme_btn mb_30"><?php echo e(__('frontend.View All Courses')); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/home-page-course-section.blade.php ENDPATH**/ ?>