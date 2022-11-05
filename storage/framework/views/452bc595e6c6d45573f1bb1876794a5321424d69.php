<div>
    <div class="main_content_iner main_content_padding">
        <div class="container">
            <div class="row align-items-center pt-3">
                <div class="col-lg-6 ">
                    <div class="cat_welcome_text mb_20">
                        <h3><?php echo e(@$wish_string); ?>, <?php echo e(Auth::user()->name); ?> </h3>
                        <p><?php echo e(@$date); ?></p>
                    </div>
                </div>
                <div class="<?php echo e(Settings('student_dashboard_card_view')==0?'col-lg-6':'col-lg-12'); ?> ">

                    <?php if(Settings('student_dashboard_card_view')==0): ?>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    <?php if($total_spent!=0): ?>
                                        <?php echo e(getPriceFormat($total_spent)); ?>

                                    <?php else: ?>
                                        <?php echo e(Settings('currency_symbol') ??'৳'); ?>  0
                                    <?php endif; ?>
                                </h4>
                                <p><?php echo e(__('frontend.Total Spent')); ?></p>
                            </div>
                            <div class="col-md-4">
                                <h4><?php echo e(@$total_purchase); ?></h4>
                                <p><?php echo e(__('frontend.Course Purchased')); ?></p>
                            </div>
                            <div class="col-md-4">
                                <h4>
                                    <?php if(Auth::user()->balance==0): ?>
                                        <?php echo e(Settings('currency_symbol') ??'৳'); ?> 0
                                    <?php else: ?>
                                        <?php echo e(getPriceFormat(Auth::user()->balance)); ?>

                                    <?php endif; ?>
                                </h4>
                                <p><?php echo e(__('frontend.Balance')); ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="dashboard_card d-flex justify-content-between gap_10  dashboard_card">

                            <div class="card">
                                <h4 class="pb-0 mb-0">
                                    <?php if($total_spent!=0): ?>
                                        <?php echo e(getPriceFormat($total_spent)); ?>

                                    <?php else: ?>
                                        <?php echo e(Settings('currency_symbol') ??'৳'); ?>  0
                                    <?php endif; ?>
                                </h4>
                                <p class=""><?php echo e(__('frontend.Total Spent')); ?></p>
                            </div>


                            <div class="card">
                                <h4 class="pb-0 mb-0"><?php echo e(@$total_purchase); ?></h4>
                                <p class=""><?php echo e(__('frontend.Course Purchased')); ?></p>
                            </div>

                            <div class="card">
                                <h4 class="pb-0 mb-0">
                                    <?php if(Auth::user()->balance==0): ?>
                                        <?php echo e(Settings('currency_symbol') ??'৳'); ?> 0
                                    <?php else: ?>
                                        <?php echo e(getPriceFormat(Auth::user()->balance)); ?>

                                    <?php endif; ?>
                                </h4>
                                <p><?php echo e(__('frontend.Balance')); ?></p>
                            </div>
                            <?php
                                $total =\Illuminate\Support\Facades\Auth::user()->totalStudentCourses();

                            ?>
                            <div class="card">
                                <h4 class="pb-0 mb-0">
                                    <?php echo e($total['process']); ?>


                                </h4>
                                <p><?php echo e(__('frontend.Course In Progress')); ?></p>
                            </div>


                            <div class="card">
                                <h4 class="pb-0 mb-0">
                                    <?php echo e($total['complete']); ?>

                                </h4>
                                <p><?php echo e(__('frontend.Completed Courses')); ?></p>
                            </div>

                            <div class="card">
                                <h4 class="pb-0 mb-0">
                                    <?php echo e(\Illuminate\Support\Facades\Auth::user()->totalCertificate()); ?>

                                </h4>
                                <p><?php echo e(__('frontend.Certificates')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <br>
        <div class="container">
            <div class="col-12 pl-0">
                <!-- dashboard_banner  -->
                <?php if($mycourse): ?>
                    <?php $__currentLoopData = $mycourse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$single_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key<1): ?>
                            <?php
                                $course =$single_course->course;
                            ?>
                            <div class="dashboard_banner">
                                <div class="thumb">
                                    <img class="thumb w-100" src="<?php echo e(getCourseImage($course->thumbnail)); ?>" alt="">
                                </div>
                                <div class="banner_info">
                                    <h4>
                                        <a href="<?php echo e(route('continueCourse',[$course->slug])); ?>">
                                            <?php echo e($course->title); ?>

                                        </a>
                                    </h4>
                                    <p><?php echo shortDetails($course->about,200); ?></p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                             style="width: <?php echo e(round($course->loginUserTotalPercentage)); ?>%"
                                             aria-valuenow="25"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="course_qualification">
                                        <p> <?php echo e(round($course->loginUserTotalPercentage)); ?>% <?php echo e(__('student.Complete')); ?></p>
                                        <div class="rating_star text-right pt-2">

                                            <?php
                                                $PickId=$course->id;
                                            ?>

                                            <?php if(!$course->isLoginUserReview): ?>
                                                <div
                                                    class="star_icon d-flex align-items-center justify-content-end">
                                                    <a class="rating">
                                                        <input type="radio" id="star5" name="rating"
                                                               value="5"
                                                               class="rating"/><label
                                                            class="full" for="star5" id="star5"
                                                            title="Awesome - 5 stars"
                                                            onclick="Rates(5, <?php echo e(@$PickId); ?>)"></label>

                                                        <input type="radio" id="star4" name="rating"
                                                               value="4"
                                                               class="rating"/><label
                                                            class="full" for="star4"
                                                            title="Pretty good - 4 stars"
                                                            onclick="Rates(4, <?php echo e(@$PickId); ?>)"></label>

                                                        <input type="radio" id="star3" name="rating"
                                                               value="3"
                                                               class="rating"/><label
                                                            class="full" for="star3"
                                                            title="Meh - 3 stars"
                                                            onclick="Rates(3, <?php echo e(@$PickId); ?>)"></label>

                                                        <input type="radio" id="star2" name="rating"
                                                               value="2"
                                                               class="rating"/><label
                                                            class="full" for="star2"
                                                            title="Kinda bad - 2 stars"
                                                            onclick="Rates(2, <?php echo e(@$PickId); ?>)"></label>

                                                        <input type="radio" id="star1" name="rating"
                                                               value="1"
                                                               class="rating"/><label
                                                            class="full" for="star1"
                                                            title="Bad  - 1 star"
                                                            onclick="Rates(1,<?php echo e(@$PickId); ?>)"></label>

                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <div class="rating_cart">
                                                    <div class="rateing">
                                                        <span> <?php echo e($course->totalReview); ?>/5</span>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>


            <div class="recommended_courses">
                <div class="row">
                    <div class="col-12">
                        <div class="section__title3 margin_50">
                            <h3><?php echo e(__('student.Recommended For You')); ?></h3>
                            <p><?php echo e(__('student.Are you ready for your next lesson')); ?>?</p>
                        </div>
                    </div>

                    <?php if(isset($courses)): ?>
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="couse_wizged mb_30">
                                    <a href="<?php echo e(courseDetailsUrl($course->id,$course->type,$course->slug)); ?>">
                                        <div class="thumb">
                                            <div class="thumb_inner"
                                                 style="background-image: url('<?php echo e(getCourseImage($course->thumbnail)); ?>')">
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
                                        </div>
                                    </a>
                                    <div class="course_content">
                                        <a href="<?php echo e(courseDetailsUrl($course->id,$course->type,$course->slug)); ?>">
                                            <h4 class="noBrake" title="<?php echo e(@$course->title); ?>"><?php echo e(@$course->title); ?></h4>
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
                                            <a>
                                                <i class="ti-agenda"></i> <?php echo e(count($course->lessons)); ?> <?php echo e(__('student.Lessons')); ?>

                                            </a>
                                            <a>
                                                <i class="ti-user"></i> <?php echo e($course->total_enrolled); ?> <?php echo e(__('student.Students')); ?>

                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="recommended_courses">
                <div class="row">
                    <div class="col-12">
                        <div class="section__title3 margin_50">
                            <h3><?php echo e(__('student.Quiz you might like')); ?></h3>
                            <p><?php echo e(__('student.Are you ready for your next lesson')); ?>?</p>
                        </div>
                    </div>
                    <?php if(isset($quizzes)): ?>
                        <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="quiz_wizged mb_30">

                                    <a href="<?php echo e(courseDetailsUrl($course->id,$course->type,$course->slug)); ?>">
                                        <div class="thumb">
                                            <div class="thumb_inner lazy"
                                                 data-src="<?php echo e(getCourseImage($course->thumbnail)); ?>">

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
                                            <span class="quiz_tag"><?php echo e(__('quiz.Quiz')); ?></span>
                                        </div>
                                    </a>

                                    <div class="course_content">
                                        <a href="<?php echo e(courseDetailsUrl($course->id,$course->type,$course->slug)); ?>">
                                            <h4 class="noBrake" title="<?php echo e($course->title); ?>"> <?php echo e($course->title); ?></h4>
                                        </a>
                                        <div class="rating_cart">
                                            <div class="rateing">
                                                <span>0/5</span>
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
                                            <a> <i class="ti-agenda"></i> <?php echo e(count($course->quiz->assign)); ?>

                                                <?php echo e(__('student.Question')); ?></a>
                                            <a>
                                                <i class="ti-user"></i> <?php echo e($course->total_enrolled); ?> <?php echo e(__('student.Students')); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>


            <div class="recommended_courses">
                <div class="row">
                    <div class="col-12">
                        <div class="section__title3 margin_50">
                            <h3><?php echo e(__('student.Class you might like')); ?></h3>
                            <p><?php echo e(__('student.Are you ready for your next class')); ?>?</p>
                        </div>
                    </div>
                    <?php if(isset($classes)): ?>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 col-xl-4">
                                <div class="quiz_wizged mb_30">
                                    <a href="<?php echo e(courseDetailsUrl($course->id,$course->type,$course->slug)); ?>">
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

                                            <span class="live_tag"><?php echo e(__('student.Live')); ?></span>
                                        </div>

                                    </a>

                                    <div class="course_content">
                                        <a href="<?php echo e(courseDetailsUrl($course->id,$course->type,$course->slug)); ?>">
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
                                            <a> <i
                                                    class="ti-agenda"></i> <?php echo e($course->class->total_class??0); ?>

                                                <?php echo e(__('frontend.Classes')); ?></a>
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
            </div>

        </div>


    </div>
    <div class="modal cs_modal fade admin-query" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('frontend.Review')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><i
                            class="ti-close "></i></button>
                </div>

                <form action="<?php echo e(route('submitReview')); ?>" method="Post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="course_id" id="rating_course_id"
                               value="">
                        <input type="hidden" name="rating" id="rating_value" value="">

                        <div class="text-center">
                                                                <textarea class="lms_summernote" name="review"
                                                                          id=""
                                                                          placeholder="<?php echo e(__('frontend.Write your review')); ?>"
                                                                          cols="30"
                                                                          rows="10"><?php echo e(old('review')); ?></textarea>
                            <span class="text-danger" role="alert"><?php echo e($errors->first('review')); ?></span>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="theme_line_btn mr-2"
                                    data-dismiss="modal"><?php echo e(__('common.Cancel')); ?>

                            </button>
                            <button class="theme_btn "
                                    type="submit"><?php echo e(__('common.Submit')); ?></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/my-dashboard-page-section.blade.php ENDPATH**/ ?>