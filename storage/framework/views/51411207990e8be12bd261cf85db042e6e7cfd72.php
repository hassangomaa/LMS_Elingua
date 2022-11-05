<div>
    <div class="quiz_area">
        <div class="container">
            <div class="white_box">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section__title text-center mb_80">
                            <h3  ><?php echo e(@$homeContent->quiz_title); ?></h3>
                            <p>
                                <?php echo e(@$homeContent->quiz_sub_title); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(isset($top_quizzes)): ?>
                        <?php $__currentLoopData = $top_quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="col-lg-4 col-xl-3 col-md-6">
                                <div class="quiz_wizged mb_30">
                                    <a href="<?php echo e(courseDetailsUrl(@$quiz->id,@$quiz->type,@$quiz->slug)); ?>">
                                        <div class="thumb">
                                            <div class="thumb_inner lazy"
                                                 data-src="<?php echo e(file_exists($quiz->thumbnail) ? asset($quiz->thumbnail) : asset('public/\uploads/course_sample.png')); ?>">
                                            </div>
                                            <?php if (isset($component)) { $__componentOriginal584ade79a82150a936ef53728517a659b0812861 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PriceTag::class, ['price' => $quiz->price,'discount' => $quiz->discount_price]); ?>
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
                                            <span class="live_quiz"><?php echo e(__('quiz.Quiz')); ?></span>
                                        </div>

                                    </a>

                                    <div class="course_content">
                                        <a href="<?php echo e(courseDetailsUrl(@$quiz->id,@$quiz->type,@$quiz->slug)); ?>">
                                            <h4 class="noBrake" title=" <?php echo e($quiz->title); ?>">
                                                <?php echo e($quiz->title); ?>

                                            </h4>
                                        </a>
                                        <div class="rating_cart">
                                            <div class="rateing">
                                                <span><?php echo e($quiz->totalReview); ?>/5</span>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(!$quiz->isLoginUserEnrolled && !$quiz->isLoginUserCart): ?>
                                                    <a href="#" class="cart_store"
                                                       data-id="<?php echo e($quiz->id); ?>">
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(auth()->guard()->guest()): ?>
                                                <?php if(!$quiz->isGuestUserCart): ?>
                                                    <a href="#" class="cart_store"
                                                       data-id="<?php echo e($quiz->id); ?>">
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="course_less_students">
                                            <a> <i class="ti-agenda"></i> <?php echo e(count($quiz->quiz->assign)); ?>

                                                <?php echo e(__('frontend.Question')); ?></a>
                                            <a>
                                                <i class="ti-user"></i> <?php echo e($quiz->total_enrolled); ?> <?php echo e(__('frontend.Students')); ?>

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
                        <a href="<?php echo e(route('quizzes')); ?>"
                           class="theme_btn mb_30"><?php echo e(__('frontend.View All Quiz')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/home-page-quiz-section.blade.php ENDPATH**/ ?>