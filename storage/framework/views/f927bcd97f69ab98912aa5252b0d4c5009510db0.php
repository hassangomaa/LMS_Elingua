<div>
    <input type="hidden" value="<?php echo e(asset('/')); ?>" id="baseUrl">
    <!-- course_details::start  -->
    <div class="course__details">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-xl-10">
                    <div class="course__details_title">
                        <div class="single__details">
                            <div class="thumb"
                                 style="background-image: url('<?php echo e(getInstructorImage(@$course->user->image)); ?>')"></div>
                            <div class="details_content">
                                <span><?php echo e(__('frontend.Instructor Name')); ?></span>
                                <a href="<?php echo e(route('instructorDetails',[$course->user->id,$course->user->name])); ?>">
                                    <h4 class="f_w_700"><?php echo e(@$course->user->name); ?></h4>
                                </a>
                            </div>
                        </div>
                        <div class="single__details">
                            <div class="details_content">
                                <span><?php echo e(__('frontend.Category')); ?></span>
                                <h4 class="f_w_700"><?php echo e(@$course->category->name); ?></h4>
                            </div>
                        </div>
                        <div class="single__details">
                            <div class="details_content">
                                <span><?php echo e(__('frontend.Reviews')); ?></span>


                                <div class="rating_star">


                                    <div class="stars">
                                        <?php

                                            $main_stars= @$userRating['rating'] ;

                                            $stars=intval($userRating['rating']);

                                        ?>
                                        <?php for($i = 0; $i <  $stars; $i++): ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                        <?php if($main_stars>$stars): ?>
                                            <i class="fas fa-star-half"></i>
                                        <?php endif; ?>
                                        <?php if($main_stars==0): ?>
                                            <?php for($i = 0; $i <  5; $i++): ?>
                                                <i class="far fa-star"></i>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    </div>
                                    <p><?php echo e(@$userRating['rating']); ?>

                                        (<?php echo e(@$userRating['total']); ?> <?php echo e(__('frontend.Rating')); ?>)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="video_screen  <?php if($course->host!='ImagePreview' && $course->host!=''): ?> theme__overlay <?php endif; ?> mb_60">
                        <?php if($course->host!='ImagePreview' && $course->host!=''): ?>
                            <div class="video_play text-center">
                                <?php if($course->host=="Self" || $course->host=="AmazonS3"): ?>
                                    <div id="vidBox">
                                        <div id="videCont">
                                            <video id="videoPlayer" loop controls  controlsList="nodownload">
                                                <source src="<?php echo e(asset($course->trailer_link)); ?>" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                    <a href="<?php echo e(youtubeVideo($course->trailer_link)); ?>" id="SelfVideoPlayer"></a>

                                <?php endif; ?>
                                <a id="playTrailer"
                                   <?php if($course->host=="Vimeo"): ?>
                                   video-url="https://vimeo.com/<?php echo e(getVideoId(showPicName(@$course->trailer_link))); ?>?autoplay=1"

                                   <?php else: ?>
                                   video-url="<?php echo e($course->trailer_link); ?>"
                                   <?php endif; ?>

                                   data-host="<?php echo e($course->host); ?>"
                                   class="play_button ">
                                    <i class="ti-control-play"></i>
                                </a>
                                <p><?php echo e(__('frontend.Preview this course')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-xl-8 col-lg-8">
                            <div class="course_tabs text-center">
                                <ul class="w-100 nav lms_tabmenu justify-content-between  mb_55" id="myTab"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Overview-tab" data-toggle="tab" href="#Overview"
                                           role="tab" aria-controls="Overview"
                                           aria-selected="true"><?php echo e(__('frontend.Overview')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Curriculum-tab" data-toggle="tab" href="#Curriculum"
                                           role="tab" aria-controls="Curriculum"
                                           aria-selected="false"><?php echo e(__('frontend.Curriculum')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Instructor-tab" data-toggle="tab" href="#Instructor"
                                           role="tab" aria-controls="Instructor"
                                           aria-selected="false"><?php echo e(__('frontend.Instructor')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews"
                                           role="tab" aria-controls="Instructor"
                                           aria-selected="false"><?php echo e(__('frontend.Reviews')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="QA-tab" data-toggle="tab" href="#QASection"
                                           role="tab" aria-controls="Instructor"
                                           aria-selected="false"><?php echo e(__('frontend.QA')); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content lms_tab_content" id="myTabContent">
                                <div class="tab-pane fade show active " id="Overview" role="tabpanel"
                                     aria-labelledby="Overview-tab">
                                    <!-- content  -->
                                    <div class="course_overview_description">

                                        <div class="single_overview">

                                            <?php if(!empty($course->requirements)): ?>
                                                <h4 class="font_22 f_w_700 mb_20"><?php echo e(__('frontend.Course Requirements')); ?></h4>
                                                <div class="theme_border"></div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <?php echo $course->requirements; ?>

                                                        </div>
                                                    </div>

                                                </div>
                                                <p class="mb_20">
                                                </p>
                                            <?php endif; ?>

                                            <?php if(!empty($course->about)): ?>
                                                <h4 class="font_22 f_w_700 mb_20"><?php echo e(__('frontend.Course Description')); ?></h4>
                                                <div class="theme_border"></div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <?php echo $course->about; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mb_20">
                                                </p>
                                            <?php endif; ?>


                                            <?php if(!empty($course->outcomes)): ?>
                                                <h4 class="font_22 f_w_700 mb_20"><?php echo e(__('frontend.Course Outcomes')); ?></h4>
                                                <div class="theme_border"></div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <?php echo $course->outcomes; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mb_20">
                                                </p>
                                            <?php endif; ?>
                                            <div class="social_btns">
                                                <a target="_blank"
                                                   href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(URL::current()); ?>"
                                                   class="social_btn fb_bg"> <i class="fab fa-facebook-f"></i>
                                                    <?php echo e(__('frontend.Facebook')); ?>   </a>
                                                <a target="_blank"
                                                   href="https://twitter.com/intent/tweet?text=<?php echo e($course->title); ?>&amp;url=<?php echo e(URL::current()); ?>"
                                                   class="social_btn Twitter_bg"> <i
                                                        class="fab fa-twitter"></i> <?php echo e(__('frontend.Twitter')); ?></a>
                                                <a target="_blank"
                                                   href="https://pinterest.com/pin/create/link/?url=<?php echo e(URL::current()); ?>&amp;description=<?php echo e($course->title); ?>"
                                                   class="social_btn Pinterest_bg"> <i
                                                        class="fab fa-pinterest-p"></i> <?php echo e(__('frontend.Pinterest')); ?></a>
                                                <a target="_blank"
                                                   href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(URL::current()); ?>&amp;title=<?php echo e($course->title); ?>&amp;summary=<?php echo e($course->title); ?>"
                                                   class="social_btn Linkedin_bg"> <i
                                                        class="fab fa-linkedin-in"></i> <?php echo e(__('frontend.Linkedin')); ?></a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--/ content  -->
                                </div>
                                <div class="tab-pane fade " id="Curriculum" role="tabpanel"
                                     aria-labelledby="Curriculum-tab">
                                    <!-- content  -->
                                    <h4 class="font_22 f_w_700 mb_20"><?php echo e(__('frontend.Course Curriculum')); ?></h4>
                                    <div class="theme_according mb_30" id="accordion1">
                                        <?php if(isset($course->chapters)): ?>
                                            <?php $__currentLoopData = $course->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="card">

                                                    <div class="card-header pink_bg" id="heading<?php echo e($chapter->id); ?>">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link text_white collapsed"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse<?php echo e($chapter->id); ?>"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse<?php echo e($chapter->id); ?>">
                                                                <?php echo e($chapter->name); ?>

                                                                <span
                                                                    class="course_length"> <?php echo e(count($chapter->lessons)); ?> <?php echo e(__('frontend.Lectures')); ?></span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div class="collapse" id="collapse<?php echo e($chapter->id); ?>"
                                                         aria-labelledby="heading<?php echo e($chapter->id); ?>"
                                                         data-parent="#accordion1">
                                                        <div class="card-body">
                                                            <div class="curriculam_list">
                                                                <!-- curriculam_single  -->
                                                                <?php $__currentLoopData = $chapter->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                    <div class="curriculam_single">
                                                                        <div class="curriculam_left">
                                                                            <?php if($lesson->is_lock==1): ?>
                                                                                <?php if(Auth::check()): ?>
                                                                                    <?php if($isEnrolled): ?>
                                                                                        <?php if($lesson->is_quiz==1): ?>

                                                                                            <?php $__currentLoopData = $lesson->quiz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <span
                                                                                                    onclick="goFullScreen(<?php echo e($course->id); ?>,<?php echo e($lesson->id); ?>)"
                                                                                                    class="quizLink active"
                                                                                                     data-url="<?php echo e(route('quizStart',[$course->id,$quiz->id,$quiz->title])); ?>" 
                                                                                                >
                                                                    <i class="ti-check-box"></i>
                                                                    <span
                                                                        class="quiz_name"><?php echo e(@$key+1); ?> <?php echo e(@$quiz->title); ?></span>
                                                                </span>

                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php else: ?>

                                                                                            <i class="ti-control-play"></i>
                                                                                            <span
                                                                                                onclick="goFullScreen(<?php echo e($course->id); ?>,<?php echo e($lesson->id); ?>)"><?php echo e(@$key+1); ?> <?php echo e(@$lesson->name); ?></span>
                                                                                        <?php endif; ?>
                                                                                    <?php else: ?>
                                                                                        <i class="ti-lock"></i>
                                                                                        <?php if($lesson->is_quiz==1): ?>
                                                                                            <?php $__currentLoopData = $lesson->quiz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <span
                                                                                                    class="quiz_name"><?php echo e(@$key+1); ?> <?php echo e(@$quiz->title); ?> [Quiz]</span>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php else: ?>
                                                                                            <span
                                                                                                data-host="<?php echo e($lesson->host); ?>"
                                                                                                data-url="<?php echo e(youtubeVideo($lesson->video_url)); ?>"><?php echo e(@$key+1); ?> <?php echo e(@$lesson->name); ?></span>
                                                                                        <?php endif; ?>
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <i class="ti-lock"></i>
                                                                                    <?php if($lesson->is_quiz==1): ?>
                                                                                        <?php $__currentLoopData = $lesson->quiz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <span
                                                                                                class="quiz_name"><?php echo e(@$key+1); ?> <?php echo e(@$quiz->title); ?> [Quiz]</span>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php else: ?>
                                                                                        <span
                                                                                            data-host="<?php echo e($lesson->host); ?>"
                                                                                            data-url="<?php echo e(youtubeVideo($lesson->video_url)); ?>"><?php echo e(@$key+1); ?> <?php echo e(@$lesson->name); ?></span>
                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>
                                                                            <?php else: ?>
                                                                                <?php if($lesson->is_quiz==1): ?>
                                                                                    <?php $__currentLoopData = $lesson->quiz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php if(Auth::check() && $isEnrolled): ?>
                                                                                            <span
                                                                                                onclick="goFullScreen(<?php echo e($course->id); ?>,<?php echo e($lesson->id); ?>)"
                                                                                                class="quizLink active"
                                                                                                 data-url="<?php echo e(route('quizStart',[$course->id,$quiz->id,$quiz->title])); ?>" 
                                                                                            >
                                                                  <i class="ti-check-box"></i>
                                                        <span
                                                            class="quiz_name"><?php echo e(@$key+1); ?> <?php echo e(@$quiz->title); ?> [Quiz]</span>
                                                        </span>
                                                                                                                                                     <span class="quiz_name"><?php echo e(@$key+1); ?> <?php echo e(@$quiz->title); ?> [Quiz]</span> 
                                                                                        <?php else: ?>
                                                                                            <i class="ti-check-box"></i>
                                                                                            <span
                                                                                                class="quiz_name"><?php echo e(@$key+1); ?> <?php echo e(@$quiz->title); ?> [Quiz]</span>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php else: ?>
                                                                                    <?php if($lesson->host=='Youtube'): ?>
                                                                                        <i class="ti-control-play"></i>
                                                                                        <span class="lesson_name"
                                                                                              data-host="<?php echo e($lesson->host); ?>"
                                                                                              data-url="<?php echo e(youtubeVideo($lesson->video_url)); ?>"><?php echo e(@$key+1); ?> <?php echo e(@$lesson->name); ?></span>

                                                                                    <?php elseif($lesson->host=='Self'|| $lesson->host=="AmazonS3"): ?>
                                                                                        <i class="ti-control-play"></i>

                                                                                        <span class="lesson_name"
                                                                                              data-host="<?php echo e($lesson->host); ?>"
                                                                                              data-url="<?php echo e(asset($lesson->video_url)); ?>"><?php echo e(@$key+1); ?> <?php echo e(@$lesson->name); ?></span>

                                                                                    <?php else: ?>

                                                                                        <i class="ti-control-play"></i>
                                                                                        <span class="lesson_name"
                                                                                              data-host="<?php echo e($lesson->host); ?>"
                                                                                              data-url="<?php echo e($lesson->video_url); ?>"><?php echo e(@$key+1); ?> <?php echo e(@$lesson->name); ?></span>
                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>

                                                                            <?php endif; ?>

                                                                        </div>
                                                                        <div class="curriculam_right">
                                                                            <?php if($lesson->is_lock==0): ?>
                                                                                <?php if($lesson->is_quiz==0): ?>
                                                                                    <a href="#"
                                                                                                                                                                           class="theme_btn_lite course_play_name" 
                                                                                       data-course="<?php echo e($course->id); ?>"
                                                                                       data-lesson="<?php echo e($lesson->id); ?>"
                                                                                       class="theme_btn_lite goFullScreen"
                                                                                    ><?php echo e(__('frontend.Preview')); ?></a>
                                                                                <?php else: ?>
                                                                                    <a href="#"
                                                                                       class="theme_btn_lite quizLink"
                                                                                       onclick="goFullScreen(<?php echo e($course->id); ?>,<?php echo e($lesson->id); ?>)"
                                                                                                                                                                                data-url="<?php echo e(route('quizStart',[$course->id,$quiz->id,$quiz->title])); ?>" 
                                                                                    ><?php echo e(__('frontend.Start')); ?></a>
                                                                                <?php endif; ?>

                                                                            <?php else: ?>
                                                                                <?php if(Auth::check() && $isEnrolled): ?>
                                                                                    <?php if($lesson->is_quiz==0): ?>
                                                                                        <a href="#"
                                                                                           data-course="<?php echo e($course->id); ?>"
                                                                                           data-lesson="<?php echo e($lesson->id); ?>"
                                                                                           class="theme_btn_lite goFullScreen"
                                                                                        ><?php echo e(__('common.View')); ?></a>
                                                                                    <?php else: ?>
                                                                                        <a href="#"
                                                                                           onclick="goFullScreen(<?php echo e($course->id); ?>,<?php echo e($lesson->id); ?>)"
                                                                                           class="theme_btn_lite quizLink"
                                                                                                                                                                                        data-url="<?php echo e(route('quizStart',[$course->id,$quiz->id,$quiz->title])); ?>" 
                                                                                        ><?php echo e(__('frontend.Start')); ?></a>
                                                                                    <?php endif; ?>

                                                                                <?php endif; ?>

                                                                            <?php endif; ?>

                                                                            <?php
                                                                                $duration =0;
                                                                                 if ($lesson->is_quiz==0 || count($lesson->quiz)==0){
                                                                                    $duration= $lesson->duration;
                                                                                }else{
                                                                                    $quiz =$lesson->quiz[0];
                                                                                    $type =$quiz->question_time_type;
                                                                                    if ($type==0){
                                                                                        $duration = $quiz->question_time*count($quiz->assign);
                                                                                    }else{
                                                                                        $duration = $quiz->question_time;

                                                                                    }

                                                                                }
                                                                            ?>
                                                                            <span
                                                                                class="nowrap"><?php echo e(MinuteFormat($duration)); ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        <?php echo e($lesson->description); ?>

                                                                    </p>
                                                                    <hr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if(isset($course_exercises)): ?>
                                        <?php if(count($course_exercises)!=0): ?>
                                            <div class="theme_according mb_30" id="accordion0">

                                                <div class="card">

                                                    <div class="card-header pink_bg" id="heading">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link text_white"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse">
                                                                <?php echo e(__('courses.Exercise')); ?> <?php echo e(__('common.Files')); ?>


                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div class="collapse show" id="collapse"
                                                         aria-labelledby="heading"
                                                         data-parent="#accordion1">
                                                        <div class="card-body">
                                                            <div class="curriculam_list">

                                                                <!-- curriculam_single  -->
                                                                <?php if(isset($course_exercises)): ?>
                                                                    <?php $__currentLoopData = $course_exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2=>$file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                        <div class="curriculam_single">
                                                                            <div class="curriculam_left">
                                                                                <?php if($file->lock==0): ?>
                                                                                    <i class="ti-unlock"></i>
                                                                                <?php else: ?>
                                                                                    <?php if(Auth::check() && $isEnrolled): ?>
                                                                                        <i class="ti-unlock"></i>
                                                                                    <?php else: ?>
                                                                                        <i class="ti-lock"></i>
                                                                                    <?php endif; ?>

                                                                                <?php endif; ?>

                                                                                <span><?php echo e(@$key2+1); ?>. <?php echo e(@$file->fileName); ?></span>
                                                                            </div>

                                                                            <div class="curriculam_right">

                                                                                <?php if($file->lock==0): ?>
                                                                                    <a href="<?php echo e(asset($file->file)); ?>"
                                                                                       class="theme_btn_lite  mr-0"
                                                                                       download>Download</a>
                                                                                <?php else: ?>
                                                                                    <?php if(Auth::check() && $isEnrolled): ?>
                                                                                        <a href="<?php echo e(asset($file->file)); ?>"
                                                                                           class="theme_btn_lite  mr-0"
                                                                                           download>Download</a>
                                                                                    <?php endif; ?>

                                                                                <?php endif; ?>


                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </div>
                                <div class="tab-pane fade " id="Instructor" role="tabpanel"
                                     aria-labelledby="Instructor-tab">
                                    <div class="instractor_details_wrapper">
                                        <div class="instractor_title">
                                            <h4 class="font_22 f_w_700"><?php echo e(__('frontend.Instructor')); ?></h4>
                                            <p class="font_16 f_w_400"><?php echo e(@$course->user->headline); ?></p>
                                        </div>
                                        <div class="instractor_details_inner">
                                            <div class="thumb">
                                                <img class="w-100" src="<?php echo e(getInstructorImage(@$course->user->image)); ?>"
                                                     alt="">
                                            </div>
                                            <div class="instractor_details_info">
                                                <a href="<?php echo e(route('instructorDetails',[$course->user->id,$course->user->name])); ?>">
                                                    <h4 class="font_22 f_w_700"><?php echo e(@$course->user->name); ?></h4>
                                                </a>
                                                <h5>  <?php echo e(@$course->user->headline); ?></h5>
                                                <div class="ins_details">
                                                    <p> <?php echo e(@$course->user->short_details); ?></p>
                                                </div>
                                                <div class="intractor_qualification">
                                                    <div class="single_qualification">
                                                        <i class="ti-star"></i> <?php echo e(@$userRating['rating']); ?>

                                                        <?php echo e(__('frontend.Rating')); ?>

                                                    </div>
                                                    <div class="single_qualification">
                                                        <i class="ti-comments"></i> <?php echo e(@$userRating['total']); ?>

                                                        <?php echo e(__('frontend.Reviews')); ?>

                                                    </div>
                                                    <div class="single_qualification">
                                                        <i class="ti-user"></i> <?php echo e(@$course->user->totalEnrolled()); ?>

                                                        <?php echo e(__('frontend.Students')); ?>

                                                    </div>
                                                    <div class="single_qualification">
                                                        <i class="ti-layout-media-center-alt"></i> <?php echo e(@$course->user->totalCourses()); ?>

                                                        <?php echo e(__('frontend.Courses')); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <?php echo @$course->user->about; ?>

                                        </p>
                                    </div>
                                    <div class="author_courses">
                                        <div class="section__title mb_80">
                                            <h3><?php echo e(__('frontend.More Courses by Author')); ?></h3>
                                        </div>
                                        <div class="row">
                                            <?php $__currentLoopData = @$course->user->courses->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xl-6">
                                                    <div class="couse_wizged mb_30">
                                                        <div class="thumb">
                                                            <a href="<?php echo e(courseDetailsUrl(@$c->id,@$c->type,@$c->slug)); ?>">
                                                                <img class="w-100"
                                                                     src="<?php echo e(file_exists($c->thumbnail) ? asset($c->thumbnail) : asset('public/\uploads/course_sample.png')); ?>"
                                                                     alt="">
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
                                                            </a>
                                                        </div>
                                                        <div class="course_content">
                                                            <a href="<?php echo e(courseDetailsUrl(@$c->id,@$c->type,@$c->slug)); ?>">
                                                                <h4><?php echo e(@$c->title); ?></h4>
                                                            </a>
                                                            <div class="rating_cart">
                                                                <div class="rateing">
                                                                    <span><?php echo e($c->totalReview); ?>/5</span>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                                <?php if(auth()->guard()->check()): ?>
                                                                    <?php if(!$c->isLoginUserEnrolled && !$c->isLoginUserCart): ?>
                                                                        <a href="#" class="cart_store"
                                                                           data-id="<?php echo e($c->id); ?>">
                                                                            <i class="fas fa-shopping-cart"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                <?php if(auth()->guard()->guest()): ?>
                                                                    <?php if(!$c->isGuestUserCart): ?>
                                                                        <a href="#" class="cart_store"
                                                                           data-id="<?php echo e($c->id); ?>">
                                                                            <i class="fas fa-shopping-cart"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="course_less_students">
                                                                <a href="#"> <i
                                                                        class="ti-agenda"></i> <?php echo e(count($c->lessons)); ?>

                                                                    <?php echo e(__('frontend.Lessons')); ?></a>
                                                                <a href="#"> <i
                                                                        class="ti-user"></i> <?php echo e($c->total_enrolled); ?>

                                                                    <?php echo e(__('frontend.Students')); ?> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                    <!-- content  -->
                                    <div class="course_review_wrapper">
                                        <div class="details_title">
                                            <h4 class="font_22 f_w_700"><?php echo e(__('frontend.Student Feedback')); ?></h4>
                                            <p class="font_16 f_w_400"><?php echo e($course->title); ?></p>
                                        </div>
                                        <div class="course_feedback">
                                            <div class="course_feedback_left">
                                                <h2><?php echo e($course->totalReview); ?></h2>
                                                <div class="feedmak_stars">
                                                    <?php

                                                        $main_stars=$course->totalReview;

                                                        $stars=intval($course->totalReview);

                                                    ?>
                                                    <?php for($i = 0; $i <  $stars; $i++): ?>
                                                        <i class="fas fa-star"></i>
                                                    <?php endfor; ?>
                                                    <?php if($main_stars>$stars): ?>
                                                        <i class="fas fa-star-half"></i>
                                                    <?php endif; ?>
                                                    <?php if($main_stars==0): ?>
                                                        <?php for($i = 0; $i <  5; $i++): ?>
                                                            <i class="far fa-star"></i>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <span><?php echo e(__('frontend.Course Rating')); ?></span>
                                            </div>
                                            <div class="feedbark_progressbar">
                                                <div class="single_progrssbar">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: <?php echo e(getPercentageRating($course->starWiseReview,5)); ?>%"
                                                             aria-valuenow="<?php echo e(getPercentageRating($course->starWiseReview,5)); ?>"
                                                             aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="rating_percent d-flex align-items-center">
                                                        <div class="feedmak_stars d-flex align-items-center">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <span><?php echo e(getPercentageRating($course->starWiseReview,5)); ?>%</span>
                                                    </div>
                                                </div>
                                                <div class="single_progrssbar">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: <?php echo e(getPercentageRating($course->starWiseReview,4)); ?>%"
                                                             aria-valuenow="<?php echo e(getPercentageRating($course->starWiseReview,4)); ?>"
                                                             aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="rating_percent d-flex align-items-center">
                                                        <div class="feedmak_stars d-flex align-items-center">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <span><?php echo e(getPercentageRating($course->starWiseReview,4)); ?>%</span>
                                                    </div>
                                                </div>
                                                <div class="single_progrssbar">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: <?php echo e(getPercentageRating($course->starWiseReview,3)); ?>%"
                                                             aria-valuenow="<?php echo e(getPercentageRating($course->starWiseReview,3)); ?>"
                                                             aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="rating_percent d-flex align-items-center">
                                                        <div class="feedmak_stars d-flex align-items-center">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>

                                                        </div>
                                                        <span><?php echo e(getPercentageRating($course->starWiseReview,3)); ?>%</span>
                                                    </div>
                                                </div>
                                                <div class="single_progrssbar">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: <?php echo e(getPercentageRating($course->starWiseReview,2)); ?>%"
                                                             aria-valuenow="<?php echo e(getPercentageRating($course->starWiseReview,2)); ?>"
                                                             aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="rating_percent d-flex align-items-center">
                                                        <div class="feedmak_stars d-flex align-items-center">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <span><?php echo e(getPercentageRating($course->starWiseReview,2)); ?>%</span>
                                                    </div>
                                                </div>
                                                <div class="single_progrssbar">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: <?php echo e(getPercentageRating($course->starWiseReview,1)); ?>%"
                                                             aria-valuenow="<?php echo e(getPercentageRating($course->starWiseReview,1)); ?>"
                                                             aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="rating_percent d-flex align-items-center">
                                                        <div class="feedmak_stars d-flex align-items-center">
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <span><?php echo e(getPercentageRating($course->starWiseReview,1)); ?>%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="course_review_header mb_20">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <div class="review_poients">
                                                        <?php if($course->reviews->count()<1): ?>
                                                            <?php if(Auth::check() && $isEnrolled): ?>
                                                                <p class="theme_color font_16 mb-0"><?php echo e(__('frontend.Be the first reviewer')); ?></p>
                                                            <?php else: ?>

                                                                <p class="theme_color font_16 mb-0"><?php echo e(__('frontend.No Review found')); ?></p>
                                                            <?php endif; ?>

                                                        <?php else: ?>


                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="rating_star text-right">

                                                        <?php
                                                            $PickId=$course->id;
                                                        ?>
                                                        <?php if(Auth::check() && Auth::user()->role_id==3): ?>
                                                            <?php if(!in_array(Auth::user()->id,$reviewer_user_ids) && $isEnrolled): ?>


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
                                                            <?php endif; ?>
                                                        <?php else: ?>

                                                            <p class="font_14 f_w_400 mt-0"><a href="<?php echo e(url('login')); ?>"
                                                                                               class="theme_color2"><?php echo e(__('frontend.Sign In')); ?></a>
                                                                <?php echo e(__('frontend.or')); ?> <a
                                                                    class="theme_color2"
                                                                    href="<?php echo e(url('register')); ?>"><?php echo e(__('frontend.Sign Up')); ?></a>
                                                                <?php echo e(__('frontend.as student to post a review')); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="course_cutomer_reviews">
                                            <div class="details_title">
                                                <h4 class="font_22 f_w_700"><?php echo e(__('frontend.Reviews')); ?></h4>

                                            </div>
                                            <div class="customers_reviews" id="customers_reviews">


                                            </div>
                                        </div>

                                        <div class="author_courses">
                                            <div class="section__title mb_80">
                                                <h3><?php echo e(__('frontend.Course you might like')); ?></h3>
                                            </div>
                                            <div class="row">
                                                <?php $__currentLoopData = @$related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xl-6">
                                                        <div class="couse_wizged mb_30">
                                                            <div class="thumb">
                                                                <a href="<?php echo e(courseDetailsUrl(@$r->id,@$r->type,@$r->slug)); ?>">
                                                                    <img class="w-100"
                                                                         src="<?php echo e(file_exists($r->thumbnail) ? asset($r->thumbnail) : asset('public/\uploads/course_sample.png')); ?>"
                                                                         alt="">
                                                                    <?php if (isset($component)) { $__componentOriginal584ade79a82150a936ef53728517a659b0812861 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PriceTag::class, ['price' => $r->price,'discount' => $r->discount_price]); ?>
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
                                                                </a>
                                                            </div>
                                                            <div class="course_content">
                                                                <a href="<?php echo e(courseDetailsUrl(@$r->id,@$r->type,@$r->slug)); ?>">
                                                                    <h4><?php echo e(@$r->title); ?></h4>
                                                                </a>
                                                                <div class="rating_cart">
                                                                    <div class="rateing">
                                                                        <span><?php echo e($r->totalReview); ?>/5</span>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                    <?php if(auth()->guard()->check()): ?>
                                                                        <?php if(!$r->isLoginUserEnrolled && !$r->isLoginUserCart): ?>
                                                                            <a href="#" class="cart_store"
                                                                               data-id="<?php echo e($r->id); ?>">
                                                                                <i class="fas fa-shopping-cart"></i>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(auth()->guard()->guest()): ?>
                                                                        <?php if(!$r->isGuestUserCart): ?>
                                                                            <a href="#" class="cart_store"
                                                                               data-id="<?php echo e($r->id); ?>">
                                                                                <i class="fas fa-shopping-cart"></i>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="course_less_students">
                                                                    <a href="#"> <i
                                                                            class="ti-agenda"></i> <?php echo e(count($r->lessons)); ?>

                                                                        <?php echo e(__('frontend.Lessons')); ?></a>
                                                                    <a href="#"> <i
                                                                            class="ti-user"></i> <?php echo e($r->total_enrolled); ?>

                                                                        <?php echo e(__('frontend.Students')); ?> </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- content  -->
                                </div>
                                <div class="tab-pane fade " id="QASection" role="tabpanel" aria-labelledby="QA-tab">
                                    <!-- content  -->

                                    <div class="conversition_box">

                                        <div id="conversition_box"></div>

                                        <div class="row">
                                            <?php if($isEnrolled): ?>
                                                <div class="col-lg-12 " id="mainComment">
                                                    <form action="<?php echo e(route('saveComment')); ?>" method="post" class="">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="course_id" value="<?php echo e(@$course->id); ?>">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="section_title3 mb_20">
                                                                    <h3><?php echo e(__('frontend.Leave a question/comment')); ?></h3>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="single_input mb_25">
                                                                                        <textarea
                                                                                            placeholder="<?php echo e(__('frontend.Leave a question/comment')); ?>"
                                                                                            name="comment"
                                                                                            class="primary_textarea gray_input"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb_30">

                                                                <button type="submit"
                                                                        class="theme_btn height_50">
                                                                    <i class="fas fa-comments"></i>
                                                                    <?php echo e(__('frontend.Question')); ?>/
                                                                    <?php echo e(__('frontend.comment')); ?>

                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="sidebar__widget mb_30">
                                <div class="sidebar__title">
                                    <h3>
                                        <?php if(@$course->discount_price!=null): ?>

                                            <?php echo e(getPriceFormat($course->discount_price)); ?>

                                        <?php else: ?>
                                            <?php echo e(getPriceFormat($course->price)); ?>

                                        <?php endif; ?>
                                    </h3>
                                    <p>
                                        <?php if(Auth::check() && $isBookmarked ): ?>
                                            <i class="fas fa-heart"></i>
                                            <a href="<?php echo e(route('bookmarkSave',[$course->id])); ?>"
                                               class=""><?php echo e(__('frontend.Already Bookmarked')); ?>

                                            </a>
                                        <?php elseif(Auth::check() && !$isBookmarked ): ?>
                                            <a href="<?php echo e(route('bookmarkSave',[$course->id])); ?>"
                                               class="">
                                                <i class="far fa-heart"></i>
                                                <?php echo e(__('frontend.Add To Bookmark')); ?>  </a>
                                        <?php endif; ?>
                                    </p>
                                </div>


                                <?php if(Auth::check()): ?>
                                    <?php if($isEnrolled): ?>
                                        <a href="<?php echo e(route('continueCourse',[$course->slug])); ?>"
                                           class="theme_btn d-block text-center height_50 mb_10"><?php echo e(__('common.Continue Watch')); ?></a>
                                    <?php else: ?>
                                        <?php if($isFree): ?>

                                            <?php if($is_cart == 1): ?>
                                                <a href="javascript:void(0)"
                                                   class="theme_btn d-block text-center height_50 mb_10"><?php echo e(__('common.Added To Cart')); ?></a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('addToCart',[@$course->id])); ?>"
                                                   class="theme_btn d-block text-center height_50 mb_10"><?php echo e(__('common.Add To Cart')); ?></a>
                                            <?php endif; ?>
                                        <?php else: ?>

                                            <?php if($is_cart == 1): ?>
                                                <a href="javascript:void(0)"
                                                   class="theme_btn d-block text-center height_50 mb_10"><?php echo e(__('common.Added To Cart')); ?></a>
                                            <?php else: ?>
                                                <a href=" <?php echo e(route('addToCart',[@$course->id])); ?>"
                                                   class="theme_btn d-block text-center height_50 mb_10"><?php echo e(__('common.Add To Cart')); ?></a>
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('buyNow',[@$course->id])); ?>"
                                               class="theme_line_btn d-block text-center height_50 mb_20"><?php echo e(__('common.Buy Now')); ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                <?php else: ?>
                                    <?php if($isFree): ?>
                                        <?php if($is_cart == 1): ?>
                                            <a href="javascript:void(0)"
                                               class="theme_btn d-block text-center height_50 mb_10"><?php echo e(__('common.Added To Cart')); ?></a>
                                        <?php else: ?>
                                            <a href=" <?php echo e(route('addToCart',[@$course->id])); ?> "
                                               class="theme_btn d-block text-center height_50 mb_10"><?php echo e(__('common.Add To Cart')); ?></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if($is_cart == 1): ?>
                                            <a href="javascript:void(0)"
                                               class="theme_btn d-block text-center height_50 mb_10"><?php echo e(__('common.Added To Cart')); ?></a>
                                        <?php else: ?>
                                            <a href=" <?php echo e(route('addToCart',[@$course->id])); ?> "
                                               class="theme_btn d-block text-center height_50 mb_10"><?php echo e(__('common.Add To Cart')); ?></a>
                                            <a href="<?php echo e(route('buyNow',[@$course->id])); ?>"
                                               class="theme_line_btn d-block text-center height_50 mb_20"><?php echo e(__('common.Buy Now')); ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <p class="font_14 f_w_500 text-center mb_30"></p>
                                <h4 class="f_w_700 mb_10"><?php echo e(__('frontend.This course includes')); ?>:</h4>
                                <ul class="course_includes">
                                    <li><i class="ti-alarm-clock"></i>
                                        <p class="nowrap"> <?php echo e(__('frontend.Duration')); ?> <?php echo e(MinuteFormat($course->duration)); ?>


                                        </p></li>
                                    <li><i class="ti-thumb-up"></i>
                                        <p><?php echo e(__('frontend.Skill Level')); ?>

                                            <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(@$course->level==$level->id): ?>
                                                    <?php echo e($level->title); ?>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </p></li>
                                    <li><i class="ti-agenda"></i>
                                        <p><?php echo e(__('frontend.Lectures')); ?> <?php echo e(count($course->lessons)); ?> <?php echo e(__('frontend.lessons')); ?></p>
                                    </li>
                                    <li><i class="ti-user"></i>
                                        <p><?php echo e(__('frontend.Enrolled')); ?> <?php echo e($course->total_enrolled); ?> <?php echo e(__('frontend.students')); ?></p>
                                    </li>
                                    <li><i class="ti-user"></i>
                                        <p><?php echo e(__('frontend.Certificate of Completion')); ?></p></li>
                                    <li><i class="ti-blackboard"></i>
                                        <p><?php echo e(__('frontend.Full lifetime access')); ?></p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                                                                <textarea class="lms_summernote" name="review" name=""
                                                                          id=""
                                                                          placeholder="<?php echo e(__('frontend.Write your review')); ?>"
                                                                          cols="30"
                                                                          rows="10"><?php echo e(old('review')); ?></textarea>
                            <span class="text-danger" role="alert"><?php echo e($errors->first('review')); ?></span>
                        </div>


                    </div>
                    <div class="modal-footer justify-content-center">
                        <div class="mt-40">
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
    <?php echo $__env->make(theme('partials._delete_model'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/course-details-page-section.blade.php ENDPATH**/ ?>