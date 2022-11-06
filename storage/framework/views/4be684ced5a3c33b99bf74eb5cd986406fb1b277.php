<div>
    <div class="main_content_iner main_content_padding">
        <div class="container">
            <div class="my_courses_wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="section__title3 margin-50">
                            <h3>
                                <?php if( routeIs('myClasses')): ?>
                                    <?php echo e(__('courses.Live Class')); ?>

                                <?php elseif( routeIs('myQuizzes')): ?>
                                    <?php echo e(__('courses.My Quizzes')); ?>

                                <?php else: ?>
                                    <?php echo e(__('courses.My Courses')); ?>

                                <?php endif; ?>
                            </h3>
                        </div>
                    </div>

                    <?php
                        if (routeIs('myClasses')){
                            $search_text = trans('frontend.Search My Classes');
                            $search_route ='';
                        }elseif (routeIs('myQuizzes')){
                            $search_text = trans('frontend.Search My Quizzes');
                            $search_route ='';
                        }else{
                            $search_text = trans('frontend.Search My Courses');
                            $search_route ='';
                        }
                    ?>
                    <div class="col-xl-6 col-md-6">
                        <div class="short_select d-flex align-items-center pt-0 pb-3">
                            <h5 class="mr_10 font_16 f_w_500 mb-0"><?php echo e(__('frontend.Filter By')); ?>:</h5>
                            <input type="hidden" id="siteUrl" value="<?php echo e(route(\Request::route()->getName())); ?>">
                            <select class="theme_select my-course-select w-50" id="categoryFilter">
                                <option value=""
                                        data-display="<?php echo e(__('frontend.All Categories')); ?>"><?php echo e(__('frontend.All Categories')); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($category->id); ?>" <?php echo e(@$category_id==$category->id?'selected':''); ?>><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class=" col-xl-6 col-md-6">
                        <form action="<?php echo e(route(\Request::route()->getName())); ?>">
                            <div class="input-group theme_search_field pt-0 pb-3 float-right w-50">
                                <div class="input-group-prepend">
                                    <button class="btn" type="button" id="button-addon1"><i
                                            class="ti-search"></i>
                                    </button>
                                </div>

                                <input type="text" class="form-control" name="search"
                                       placeholder="<?php echo e($search_text); ?>" value="<?php echo e($search); ?>"
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = '<?php echo e($search_text); ?>'">

                            </div>
                        </form>
                    </div>
                    <?php if(isset($courses)): ?>
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SingleCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $course=$SingleCourse->course;
                            ?>
                            <div class="col-xl-4 col-md-6">
                                <?php if($course->type==1): ?>
                                    <div class="couse_wizged">
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

                                        </div>
                                        <div class="course_content">
                                            <a href="<?php echo e(route('continueCourse',[$course->slug])); ?>">
                                                <h4 class="noBrake" title="<?php echo e($course->title); ?>">
                                                    <?php echo e($course->title); ?>

                                                </h4>
                                            </a>
                                            <?php if($SingleCourse->pathway_id!=null): ?>
                                                <?php if (isset($component)) { $__componentOriginalcbfc125c83e5104dbdd2f6e030689191ccd97f7a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MyCoursePathwayInfo::class, ['enrolld' => $SingleCourse]); ?>
<?php $component->withName('my-course-pathway-info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbfc125c83e5104dbdd2f6e030689191ccd97f7a)): ?>
<?php $component = $__componentOriginalcbfc125c83e5104dbdd2f6e030689191ccd97f7a; ?>
<?php unset($__componentOriginalcbfc125c83e5104dbdd2f6e030689191ccd97f7a); ?>
<?php endif; ?>
                                            <?php endif; ?>
                                            <div class="d-flex align-items-center gap_15">
                                                <div class="rating_cart">
                                                    <div class="rateing">
                                                        <span><?php echo e($course->totalReview); ?>/5</span>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>

                                                <div class="progress_percent flex-fill text-right">
                                                    <div class="progress theme_progressBar ">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: <?php echo e(round($course->loginUserTotalPercentage)); ?>%"
                                                             aria-valuenow="25"
                                                             aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="font_14 f_w_400"><?php echo e(round($course->loginUserTotalPercentage)); ?>

                                                        % <?php echo e(__('student.Complete')); ?></p>
                                                </div>
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
                                <?php elseif($course->type==2): ?>
                                    <div class="quiz_wizged">
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
                                                    <span><?php echo e($course->totalReview); ?>/5</span>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="course_less_students">

                                                <a> <i class="ti-agenda"></i><?php echo e(count($course->quiz->assign)); ?>

                                                    <?php echo e(__('student.Question')); ?></a>
                                                <a>
                                                    <i class="ti-user"></i> <?php echo e($course->total_enrolled); ?> <?php echo e(__('student.Students')); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                <?php elseif($course->type==3): ?>
                                    <div class="quiz_wizged">
                                        <div class="thumb">
                                            <a href="<?php echo e(courseDetailsUrl($course->id,$course->type,$course->slug)); ?>">
                                                <div class="thumb">
                                                    <div class="thumb_inner lazy"
                                                         data-src="<?php echo e(getCourseImage($course->thumbnail)); ?>">
                                                        <?php if (isset($component)) { $__componentOriginalfea00fb490a2443a28fe0abfb3965928cfa13c6d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ClassCloseTag::class, ['class' => $course->class]); ?>
<?php $component->withName('class-close-tag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfea00fb490a2443a28fe0abfb3965928cfa13c6d)): ?>
<?php $component = $__componentOriginalfea00fb490a2443a28fe0abfb3965928cfa13c6d; ?>
<?php unset($__componentOriginalfea00fb490a2443a28fe0abfb3965928cfa13c6d); ?>
<?php endif; ?>

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
                                                    <span class="live_tag"><?php echo e(__('student.Live')); ?></span>
                                                </div>
                                            </a>


                                        </div>
                                        <div class="course_content">
                                            <a href="<?php echo e(courseDetailsUrl($course->id,$course->type,$course->slug)); ?>">
                                                <h4 class="noBrake" title="<?php echo e($course->title); ?>"> <?php echo e($course->title); ?></h4>
                                            </a>
                                            <div class="rating_cart">
                                                <div class="rateing">
                                                    <span><?php echo e($course->totalReview); ?>/5</span>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="course_less_students">
                                                <a> <i
                                                        class="ti-agenda"></i> <?php echo e($course->class->total_class); ?>

                                                    <?php echo e(__('student.Classes')); ?></a>
                                                <a>
                                                    <i class="ti-user"></i> <?php echo e($course->total_enrolled); ?> <?php echo e(__('student.Students')); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="pt-3">
                                <?php echo e($courses->links()); ?>

                            </div>
                    <?php endif; ?>
                    <?php if(count($courses)==0): ?>
                        <div class="col-12">
                            <div class="section__title3 margin_50">
                                <?php if( routeIs('myClasses')): ?>
                                    <p class="text-center"><?php echo e(__('student.No Class Purchased Yet')); ?>!</p>
                                <?php elseif( routeIs('myQuizzes')): ?>
                                    <p class="text-center"><?php echo e(__('student.No Quiz Purchased Yet')); ?>!</p>
                                <?php else: ?>
                                    <p class="text-center"><?php echo e(__('student.No Course Purchased Yet')); ?>!</p>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/my-courses-page-section.blade.php ENDPATH**/ ?>