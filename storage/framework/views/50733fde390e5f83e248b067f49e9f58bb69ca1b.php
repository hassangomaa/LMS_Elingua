<div>
    <input type="hidden" class="class_route" name="class_route" value="<?php echo e(route('courses')); ?>">
    <div class="courses_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <?php if (isset($component)) { $__componentOriginalb11c5301749bfd2b342fe09cc4ee0b72e89e26ec = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ClassPageSectionSidebar::class, ['level' => $level,'type' => $type,'categories' => $categories,'category' => $category,'languages' => $languages,'language' => $language,'mode' => $mode]); ?>
<?php $component->withName('class-page-section-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb11c5301749bfd2b342fe09cc4ee0b72e89e26ec)): ?>
<?php $component = $__componentOriginalb11c5301749bfd2b342fe09cc4ee0b72e89e26ec; ?>
<?php unset($__componentOriginalb11c5301749bfd2b342fe09cc4ee0b72e89e26ec); ?>
<?php endif; ?>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="box_header d-flex flex-wrap align-items-center justify-content-between">
                                <h5 class="font_16 f_w_500 mb_30"><?php echo e($total); ?> <?php echo e(__('frontend.Course are found')); ?></h5>
                                <div class="box_header_right mb_30">
                                    <div class="short_select d-flex align-items-center">
                                        <div class="mobile_filter mr_10">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="13" viewBox="0 0 19.5 13">
                                                <g   transform="translate(28)">
                                                    <rect id="Rectangle_1" data-name="Rectangle 1" width="19.5" height="2" rx="1"
                                                          transform="translate(-28)" fill="var(--system_primery_color)"/>
                                                    <rect id="Rectangle_2" data-name="Rectangle 2" width="15.5" height="2" rx="1"
                                                          transform="translate(-26 5.5)" fill="var(--system_primery_color)"/>
                                                    <rect id="Rectangle_3" data-name="Rectangle 3" width="5" height="2" rx="1"
                                                          transform="translate(-20.75 11)" fill="var(--system_primery_color)"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <h5 class="mr_10 font_16 f_w_500 mb-0"><?php echo e(__('frontend.Order By')); ?>:</h5>
                                        <select class="small_select" id="order">
                                            <option data-display="None"><?php echo e(__('frontend.None')); ?></option>
                                            <option
                                                value="price" <?php echo e($order=="price"?'selected':''); ?>><?php echo e(__('frontend.Price')); ?></option>
                                            <option
                                                value="date" <?php echo e($order=="date"?'selected':''); ?>><?php echo e(__('frontend.Date')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($courses)): ?>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 col-xl-4">
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
                        <?php if(count($courses)==0): ?>
                            <div class="col-lg-12">
                                <div
                                    class="Nocouse_wizged text-center d-flex align-items-center justify-content-center">
                                    <div class="thumb">
                                        <img style="width: 50px"
                                             src="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/img/not-found.png"
                                             alt="">
                                    </div>
                                    <h1>
                                        <?php echo e(__('frontend.No Course Found')); ?>

                                    </h1>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                    <?php echo e($courses->appends(Request::all())->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/course-page-section.blade.php ENDPATH**/ ?>