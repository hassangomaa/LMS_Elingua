<!-- sidebar part here -->
<nav id="sidebar" class="sidebar ">

    <div class="sidebar-header update_sidebar">
        <a class="large_logo" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(getLogoImage(Settings('logo') )); ?>" alt="">
        </a>
        <a class="mini_logo" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(getLogoImage(Settings('logo') )); ?>" alt="">
        </a>
        <a id="close_sidebar" class="d-lg-none">
            <i class="ti-close"></i>
        </a>
    </div>
    <ul id="sidebar_menu">

        <?php if((isModuleActive('LmsSaas') || isModuleActive('LmsSaasMD')) && SaasDomain()!='main' && !hasActiveSaasPlan() ): ?>
            <li>
                <a href="#" class="has-arrow" aria-expanded="false">
                    <div class="nav_icon_small">
                        <span class="fas fa-university"></span>
                    </div>
                    <div class="nav_title">
                        <span><?php echo e(__('saas.Saas Management')); ?></span>
                    </div>
                </a>

                <ul>
                    <li>
                        <a href="<?php echo e(route('saas.myPlan')); ?>"><?php echo e(__('saas.My Plan')); ?></a>
                    </li>
                </ul>
            </li>
        <?php else: ?>
            <?php if(permissionCheck('dashboard')): ?>
                <li>
                    <a class="active" href="<?php echo e(url('/dashboard')); ?>" aria-expanded="false">
                        <div class="nav_icon_small">
                            <span class="fas fa-th"></span>
                        </div>
                        <div class="nav_title">
                            <span><?php echo e(__('common.Dashboard')); ?></span>
                        </div>
                    </a>
                </li>
            <?php endif; ?>


            <?php if(isModuleActive('LmsSaasMD')): ?>
                <?php if(!saasPlanCheck('student')): ?>
                    <?php if(permissionCheck('students')): ?>
                        <?php echo $__env->make('studentsetting::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if(permissionCheck('students')): ?>
                    <?php echo $__env->make('studentsetting::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>


            <?php if(isModuleActive('LmsSaasMD')): ?>
                <?php if(!saasPlanCheck('instructor')): ?>
                    <?php if(permissionCheck('instructors')): ?>
                        <?php echo $__env->make('systemsetting::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if(permissionCheck('instructors')): ?>
                    <?php echo $__env->make('systemsetting::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(isModuleActive('Appointment')): ?>
                <?php if(permissionCheck('appointment')): ?>
                    <?php echo $__env->make('appointment::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(isModuleActive("Chat")): ?>
                <?php echo $__env->make('chat::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isModuleActive("WhatsappSupport")): ?>
                <?php echo $__env->make('whatsappsupport::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isModuleActive("SupportTicket")): ?>

                <?php echo $__env->make('supportticket::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isModuleActive("HumanResource")): ?>
                <?php echo $__env->make('humanresource::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(isModuleActive("SkillAndPathway")): ?>
                <?php echo $__env->make('skillandpathway::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>


            <?php if(isModuleActive('LmsSaasMD')): ?>
                <?php if(!saasPlanCheck('course')): ?>
                    <?php if(permissionCheck('courses')): ?>
                        <li>
                            <a href="#" class="has-arrow" aria-expanded="false">
                                <div class="nav_icon_small">
                                    <span class="fas fa-cubes"></span>
                                </div>
                                <div class="nav_title">
                                    <span> <?php echo e(__('courses.Courses')); ?></span>
                                </div>
                            </a>
                            <ul>
                                <?php if(permissionCheck('course.category')): ?>
                                    <li><a href="<?php echo e(route('course.category')); ?>"><?php echo e(__('courses.Categories')); ?></a></li>
                                <?php endif; ?>

                                <?php if(isModuleActive('Org') && permissionCheck('org.material')): ?>
                                    <li><a href="<?php echo e(route('org.material')); ?>"><?php echo e(__('org.Material Source')); ?>

                                            <?php if(env('APP_SYNC')): ?>
                                                <span class="demo_addons_sub">Addon</span>
                                            <?php endif; ?>
                                        </a></li>
                                <?php endif; ?>

                                <?php if(permissionCheck('course-level.index')): ?>
                                    <li><a href="<?php echo e(route('course-level.index')); ?>"><?php echo e(__('courses.Course Level')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(permissionCheck('getAllCourse')): ?>
                                    <li>
                                        <a href="<?php echo e(route('getAllCourse')); ?>"><?php echo e(__('courses.All')); ?> <?php echo e(__('courses.Courses')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!isModuleActive('Org')): ?>
                                    <?php if(permissionCheck('getActiveCourse')): ?>
                                        <li>
                                            <a href="<?php echo e(route('getActiveCourse')); ?>"><?php echo e(__('courses.Active')); ?> <?php echo e(__('courses.Courses')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(permissionCheck('getPendingCourse')): ?>
                                        <li>
                                            <a href="<?php echo e(route('getPendingCourse')); ?>"><?php echo e(__('courses.Pending')); ?> <?php echo e(__('courses.Courses')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(isModuleActive('Assignment')): ?>
                                    <li>
                                        <a href="<?php echo e(route('courseAssignmentList')); ?>">
                                    <span>
                                    <?php echo e(__('assignment.Assignment')); ?>


                                    </span>

                                            <?php if(env('APP_SYNC')): ?>
                                                <span class="demo_addons_sub">Addon</span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if(isModuleActive('CourseOffer') &&  permissionCheck('CourseOffer')): ?>
                                    <li>
                                        <a href="<?php echo e(route('courseOffer')); ?>"><?php echo e(__('frontendmanage.Course Offer')); ?>

                                            <?php if(env('APP_SYNC')): ?>
                                                <span class="demo_addons_sub">Addon</span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Settings('frontend_active_theme')=='compact'): ?>
                                    <li>
                                        <a href="<?php echo e(route('frontend.showCourseSettings')); ?>"> <?php echo e(__('frontendmanage.Course Setting')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if(permissionCheck('courses')): ?>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <div class="nav_icon_small">
                                <span class="fas fa-cubes"></span>
                            </div>
                            <div class="nav_title">
                                <span> <?php echo e(__('courses.Courses')); ?></span>
                            </div>
                        </a>
                        <ul>
                            <?php if(permissionCheck('course.category')): ?>
                                <li><a href="<?php echo e(route('course.category')); ?>"><?php echo e(__('courses.Categories')); ?></a></li>
                            <?php endif; ?>

                            <?php if(isModuleActive('Org') && permissionCheck('org.material')): ?>
                                <li><a href="<?php echo e(route('org.material')); ?>"><?php echo e(__('org.Material Source')); ?>

                                        <?php if(env('APP_SYNC')): ?>
                                            <span class="demo_addons_sub">Addon</span>
                                        <?php endif; ?>
                                    </a></li>
                            <?php endif; ?>

                            <?php if(permissionCheck('course-level.index')): ?>
                                <li><a href="<?php echo e(route('course-level.index')); ?>"><?php echo e(__('courses.Course Level')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(permissionCheck('getAllCourse')): ?>
                                <li>
                                    <a href="<?php echo e(route('getAllCourse')); ?>"><?php echo e(__('courses.All')); ?> <?php echo e(__('courses.Courses')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(!isModuleActive('Org')): ?>
                                <?php if(permissionCheck('getActiveCourse')): ?>
                                    <li>
                                        <a href="<?php echo e(route('getActiveCourse')); ?>"><?php echo e(__('courses.Active')); ?> <?php echo e(__('courses.Courses')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(permissionCheck('getPendingCourse')): ?>
                                    <li>
                                        <a href="<?php echo e(route('getPendingCourse')); ?>"><?php echo e(__('courses.Pending')); ?> <?php echo e(__('courses.Courses')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(isModuleActive('Assignment')): ?>
                                <li>
                                    <a href="<?php echo e(route('courseAssignmentList')); ?>">
                                    <span>
                                    <?php echo e(__('assignment.Assignment')); ?>


                                    </span>

                                        <?php if(env('APP_SYNC')): ?>
                                            <span class="demo_addons_sub">Addon</span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(isModuleActive('CourseOffer') &&  permissionCheck('CourseOffer')): ?>
                                <li>
                                    <a href="<?php echo e(route('courseOffer')); ?>"><?php echo e(__('frontendmanage.Course Offer')); ?>

                                        <?php if(env('APP_SYNC')): ?>
                                            <span class="demo_addons_sub">Addon</span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(Settings('frontend_active_theme')=='compact'): ?>
                                <li>
                                    <a href="<?php echo e(route('frontend.showCourseSettings')); ?>"> <?php echo e(__('frontendmanage.Course Setting')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endif; ?>


            <?php if(isModuleActive('OrgSubscription') && permissionCheck('Orgsubscription')): ?>
                <?php echo $__env->make('orgsubscription::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>


            <?php if(isModuleActive('LmsSaasMD')): ?>
                <?php if(!saasPlanCheck('quiz')): ?>
                    <?php if(permissionCheck('quiz')): ?>
                        <?php echo $__env->make('quiz::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if(permissionCheck('quiz')): ?>
                    <?php echo $__env->make('quiz::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(permissionCheck('coupons') && function_exists('showEcommerce') && showEcommerce()): ?>
                <?php echo $__env->make('coupons::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isModuleActive("Homework") && permissionCheck('homework_list')): ?>
                <?php echo $__env->make('homework::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isModuleActive("Affiliate")  && hasAffiliateAccess() ): ?>
                <?php echo $__env->make('affiliate::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isModuleActive("Survey") && permissionCheck('survey')): ?>
                <?php echo $__env->make('survey::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(permissionCheck('communications')): ?>
                <li>
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <div class="nav_icon_small">
                            <span class="fas fa-comments"></span>
                        </div>
                        <div class="nav_title">
                            <span><?php echo e(__('communication.Communication')); ?></span>
                        </div>
                    </a>
                    <ul>
                        <?php if(permissionCheck('communication.PrivateMessage')): ?>
                            <li>
                                <a href="<?php echo e(route('communication.PrivateMessage')); ?>"><?php echo e(__('communication.Private Messages')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('payments')  && function_exists('showEcommerce') && showEcommerce()): ?>
                <?php echo $__env->make('payment::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(permissionCheck('reports')): ?>
                <li>
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <div class="nav_icon_small">
                            <span class="fas fa-calculator"></span>
                        </div>
                        <div class="nav_title">
                            <span><?php echo e(__('setting.Reports')); ?></span>
                        </div>
                    </a>
                    <ul>
                        <?php if(function_exists('showEcommerce') && showEcommerce()): ?>
                            <?php if(permissionCheck('admin.reveuneList')): ?>
                                <li>
                                    <a href="<?php echo e(route('admin.reveuneList')); ?>"><?php echo e(__('courses.Admin Revenue')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(permissionCheck('admin.reveuneListInstructor')): ?>
                                <li>
                                    <a href="<?php echo e(route('admin.reveuneListInstructor')); ?>"><?php echo e(__('instructor.Instructors')); ?> <?php echo e(__('payment.Revenue')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(permissionCheck('course.courseStatistics')): ?>
                            <li>
                                <a href="<?php echo e(route('course.courseStatistics')); ?>"> <?php echo e(__('courses.Course Statistics')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('quizResult')): ?>
                            <li><a href="<?php echo e(route('quizResult')); ?>"> <?php echo e(__('quiz.Quiz Report')); ?></a></li>
                        <?php endif; ?>
                        <?php if(isModuleActive('OrgSubscription')): ?>
                            <?php if(permissionCheck('orgSubscriptionReport') && Route::has('orgSubscriptionReport')): ?>
                                <li>
                                    <a href="<?php echo e(route('orgSubscriptionReport')); ?>"> <?php echo e(__('org-subscription.Learning Progress Details')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(isModuleActive('SCORM') && isModuleActive('SkillAndPathway')): ?>
                            <?php if(permissionCheck('scorm.report.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('scorm.report.index')); ?>"> <?php echo e(__('report.Scorm Report')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(isModuleActive('XAPI') && isModuleActive('SkillAndPathway')): ?>
                            <?php if(permissionCheck('xapi.report.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('xapi.report.index')); ?>"> <?php echo e(__('report.XAPI Report')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('certificate.index')): ?>
                <?php echo $__env->make('certificate::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>




            <?php if(permissionCheck('frontend_CMS')): ?>
                <?php echo $__env->make('frontendmanage::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>


            <?php if(permissionCheck('zoom')): ?>
                <?php echo $__env->make('zoom::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>


            <?php if(isModuleActive("BBB")): ?>
                <?php if(permissionCheck('bbb')): ?>
                    <?php echo $__env->make('bbb::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(isModuleActive("Jitsi")): ?>
                <?php if(permissionCheck('Jitsi')): ?>
                    <?php echo $__env->make('jitsi::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>


            <?php if(isModuleActive('LmsSaasMD')): ?>
                <?php if(!saasPlanCheck('meeting')): ?>
                    <?php if(permissionCheck('virtual-class')): ?>
                        <?php echo $__env->make('virtualclass::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if(permissionCheck('virtual-class')): ?>
                    <?php echo $__env->make('virtualclass::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>


            <?php if(isModuleActive('LmsSaasMD')): ?>
                <?php if(!saasPlanCheck('blog_post')): ?>
                    <?php if(permissionCheck('blog')): ?>
                        <?php echo $__env->make('blog::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if(permissionCheck('blog')): ?>
                    <?php echo $__env->make('blog::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>



            <?php if(isModuleActive("Group") && permissionCheck('groups')): ?>
                <?php echo $__env->make('group::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isModuleActive("Catalogue") && permissionCheck('catalog')): ?>
                <?php echo $__env->make('catalogue::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isModuleActive('Subscription') && permissionCheck('Subscription')): ?>
                <?php echo $__env->make('subscription::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>



            <?php if(isModuleActive('BundleSubscription')): ?>
                <?php if(permissionCheck('bundle.subscription')): ?>
                    <?php echo $__env->make('bundlesubscription::backend.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(isModuleActive("Communicate") && permissionCheck('communicate')): ?>
                <?php echo $__env->make('communicate::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isModuleActive("Calendar")): ?>
                <li>
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <div class="nav_icon_small">
                            <span class="fas fa-th"></span>
                        </div>
                        <div class="nav_title">
                            <span>Calendar</span>
                            <?php if(env('APP_SYNC')): ?>
                                <span class="demo_addons">Addon</span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="<?php echo e(route('calendar_show')); ?>">Calendar</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php echo $__env->make('newsletter::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if(permissionCheck('appearance.themes.index')): ?>
                <li>
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <div class="nav_icon_small">
                            <span class="fas fa-cogs"></span>
                        </div>
                        <div class="nav_title">
                            <span><?php echo e(__('setting.Appearance')); ?></span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="<?php echo e(route('appearance.themes.index')); ?>"><?php echo e(__('setting.Themes')); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('appearance.themes.demo')); ?>"><?php echo e(__('setting.Import Demo Data')); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('appearance.themes-customize.index')); ?>"><?php echo e(__('setting.Theme Color')); ?></a>
                        </li>


                    </ul>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('notification_setup_list')): ?>
                <li>
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <div class="nav_icon_small">
                            <span class="fa fa-bell"></span>
                        </div>
                        <div class="nav_title">
                            <span><?php echo e(__('setting.Notification')); ?></span>
                        </div>
                    </a>
                    <ul>
                        <?php if(permissionCheck('notification_setup_list')): ?>
                            <li>
                                <a href="<?php echo e(route('notification_setup_list')); ?>"><?php echo e(__('setting.Notification Setup')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('UserNotificationControll')): ?>
                            <li>
                                <a href="<?php echo e(route('UserNotificationControll')); ?>"><?php echo e(__('common.User')); ?> <?php echo e(__('setting.Notification')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(isModuleActive("Tax")): ?>
                <?php echo $__env->make('tax::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(isModuleActive("AmazonS3") && permissionCheck('AwsS3Setting')): ?>
                <li>
                    <a href="<?php echo e(route('AwsS3Setting')); ?>" aria-expanded="false">
                        <div class="nav_icon_small">
                            <span class="fas fa-cogs"></span>
                        </div>
                        <div class="nav_title">
                            <span><?php echo e(__('common.Aws S3 Setting')); ?></span>
                            <?php if(env('APP_SYNC')): ?>
                                <span class="demo_addons">Addon</span>
                            <?php endif; ?>
                        </div>
                    </a>
                </li>
            <?php endif; ?>


            <?php if(permissionCheck('setting.pushNotification')): ?>
                <li>
                    <a href="<?php echo e(route('setting.pushNotification')); ?>" aria-expanded="false">
                        <div class="nav_icon_small">
                            <i class="far fa-bell"></i>
                        </div>
                        <div class="nav_title">
                        <span>
                            <?php echo e(__('setting.Push Notification')); ?>

                        </span>

                        </div>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(!isModuleActive('LmsSaas') && permissionCheck('setting.utility')): ?>
                <li>
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <div class="nav_icon_small">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="nav_title">
                            <span><?php echo e(__('setting.Utility')); ?></span>
                        </div>
                    </a>

                    <ul>
                        <?php if(permissionCheck('setting.maintenance')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.maintenance')); ?>"><?php echo e(__('setting.Maintenance')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('setting.utilities')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.utilities')); ?>"><?php echo e(__('setting.Utilities')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(permissionCheck('ipBlock.index')): ?>
                            <li>
                                <a href="<?php echo e(route('ipBlock.index')); ?>"><?php echo e(__('setting.IP Block')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(permissionCheck('setting.geoLocation')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.geoLocation')); ?>"><?php echo e(__('setting.Geo Location')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('setting.preloader')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.preloader')); ?>"><?php echo e(__('setting.Preloader')); ?> <?php echo e(__('setting.Setting')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('setting.error_log')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.error_log')); ?>"><?php echo e(__('setting.Error Log')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(!isModuleActive("HumanResource")): ?>
                <?php if(permissionCheck('user.manager') ): ?>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <div class="nav_icon_small">
                                <span class="fas fa-cogs"></span>
                            </div>
                            <div class="nav_title">
                                <span><?php echo e(__('setting.User Manage')); ?></span>
                            </div>
                        </a>

                        <ul>
                            <?php if(!isModuleActive('Org') && permissionCheck('staffs.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('staffs.index')); ?>"
                                       class="<?php echo e(request()->is('hr/staffs') || request()->is('hr/staffs/*') ? 'active' : ''); ?>"><?php echo e(__('common.Staff')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(!isModuleActive('Org') && permissionCheck('hr.department.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('hr.department.index')); ?>"
                                       class="<?php echo e(request()->is('hr/department') || request()->is('hr/department/*') ? 'active' : ''); ?>"><?php echo e(__('leave.Department')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(permissionCheck('permission.roles.index') && !isModuleActive('OrgInstructorPolicy')): ?>
                                <li>
                                    <a href="<?php echo e(route('permission.roles.index')); ?>"
                                       class="<?php echo e(request()->is('hr/role-permission/*') ? 'active' : '/*'); ?>"><?php echo e(__('role.Role')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(permissionCheck('permission.roles.index') && isModuleActive('OrgInstructorPolicy')): ?>
                                <li>
                                    <a href="<?php echo e(route('permission.student-roles')); ?>"><?php echo e(__('role.Student Role')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(!isModuleActive('Org') && permissionCheck('staffs.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('staffs.settings')); ?>"
                                       class="<?php echo e(request()->is('hr/settings/*') ? 'active' : ''); ?>"><?php echo e(__('common.Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(isModuleActive("UserType") && permissionCheck('usertype') && !isModuleActive('Org') ): ?>
                <?php echo $__env->make('usertype::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(permissionCheck('settings')): ?>
                <li>
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <div class="nav_icon_small">
                            <span class="fas fa-cogs"></span>
                        </div>
                        <div class="nav_title">
                            <span><?php echo e(__('setting.System Setting')); ?></span>
                        </div>
                    </a>

                    <ul>
                        <?php if(permissionCheck('setting.activation')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.activation')); ?>"><?php echo e(__('setting.Activation')); ?></a>
                            </li>
                        <?php endif; ?>



                        <?php if(permissionCheck('setting.general_settings')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.general_settings')); ?>"><?php echo e(__('setting.General Settings')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('setting.setCommission')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.setCommission')); ?>"><?php echo e(__('setting.Commission')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('settings.student_setup')): ?>
                            <?php if(Settings('frontend_active_theme')=='compact'): ?>

                                <li>
                                    <a href="<?php echo e(route('settings.student_setup')); ?>"><?php echo e(__('setting.Student Setup')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>


                        <?php if(isModuleActive('UserType') && permissionCheck('usertype.list')): ?>
                            <li>
                                <a href="<?php echo e(route('usertype.list')); ?>"><?php echo e(__('common.User')); ?> <?php echo e(__('common.Type')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(permissionCheck('settings.instructor_setup')): ?>
                            <li>
                                <a href="<?php echo e(route('settings.instructor_setup')); ?>"><?php echo e(__('setting.Instructor Setup')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('setting.email_setup')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.email_setup')); ?>"><?php echo e(__('setting.Email Setup')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('paymentmethodsetting.payment_method_setting') && function_exists('showEcommerce') && showEcommerce()): ?>
                            <li>
                                <a href="<?php echo e(route('paymentmethodsetting.payment_method_setting')); ?>"><?php echo e(__('setting.Payment Method Settings')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('api.setting')): ?>
                            <li>
                                <a href="<?php echo e(route('api.setting')); ?>"><?php echo e(__('setting.Api Settings')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('vimeosetting.index')): ?>
                            <li>
                                <a href="<?php echo e(route('vimeosetting.index')); ?>"><?php echo e(__('setting.Vimeo Configuration')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('vdocipher.setting')): ?>
                            <li>
                                <a href="<?php echo e(route('vdocipher.setting')); ?>"><?php echo e(__('setting.VdoCipher Configuration')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('gdrive.setting')): ?>
                            <li>
                                <a href="<?php echo e(route('gdrive.setting')); ?>"><?php echo e(__('setting.GDrive Configuration')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('setting.seo_setting')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.seo_setting')); ?>"><?php echo e(__('setting.Homepage SEO Setup')); ?></a>
                            </li>
                        <?php endif; ?>


                         <?php if(!isModuleActive("HumanResource")): ?>
                              <?php if(permissionCheck('permission.roles.index')): ?>
                                  <li>
                                      <a href="<?php echo e(route('permission.roles.index')); ?>"><?php echo e(__('role.Instructor Role')); ?></a>
                                  </li>
                              <?php endif; ?>

                              <?php if(permissionCheck('permission.roles.index')): ?>
                                  <li>
                                      <a href="<?php echo e(route('permission.student-roles')); ?>"><?php echo e(__('role.Student Role')); ?></a>
                                  </li>
                              <?php endif; ?>
                          <?php endif; ?>

                        <?php if(permissionCheck('EmailTemp')): ?>
                            <li>
                                <a href="<?php echo e(route('EmailTemp')); ?>"><?php echo e(__('setting.Email Template')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('languages.index')): ?>
                            <li>
                                <a href="<?php echo e(route('languages.index')); ?>"><?php echo e(__('common.Language')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(permissionCheck('currencies.index')): ?>
                            <li>
                                <a href="<?php echo e(route('currencies.index')); ?>"><?php echo e(__('common.Currency')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(permissionCheck('timezone.index')): ?>
                            <li>
                                <a href="<?php echo e(route('timezone.index')); ?>"><?php echo e(__('common.TimeZone')); ?></a>
                            </li>
                        <?php endif; ?>


                        <?php if(!isModuleActive('LmsSaas')): ?>






                            <?php if(permissionCheck('setting.updateSystem')): ?>
                                <li>
                                    <a href="<?php echo e(route('setting.updateSystem')); ?>"><?php echo e(__('setting.About')); ?> <?php echo e(__('common.&')); ?> <?php echo e(__('setting.Update')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(permissionCheck('city.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('city.index')); ?>"><?php echo e(__('common.City')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(permissionCheck('setting.cookieSetting')): ?>
                                <li>
                                    <a href="<?php echo e(route('setting.cookieSetting')); ?>"><?php echo e(__('setting.Cookies settings')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(permissionCheck('setting.cacheSetting')): ?>
                                <li>
                                    <a href="<?php echo e(route('setting.cacheSetting')); ?>"><?php echo e(__('setting.Cache settings')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(permissionCheck('setting.queueSetting')): ?>
                                <li>
                                    <a href="<?php echo e(route('setting.queueSetting')); ?>"><?php echo e(__('setting.Queue settings')); ?></a>
                                </li>
                            <?php endif; ?>


                            <?php if(permissionCheck('cronJob.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('setting.cronJob')); ?>"><?php echo e(__('setting.Cron Job')); ?></a>
                                </li>
                            <?php endif; ?>

                        <?php endif; ?>

                        <?php if(permissionCheck('setting.captcha')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.captcha')); ?>"><?php echo e(__('setting.Google Captcha')); ?></a>
                            </li>
                        <?php endif; ?>





                        <?php if(permissionCheck('setting.socialLogin')): ?>
                            <li>
                                <a href="<?php echo e(route('setting.socialLogin')); ?>"><?php echo e(__('setting.Social Login')); ?></a>
                            </li>
                        <?php endif; ?>


                    </ul>
                </li>
            <?php endif; ?>
            <?php if((isModuleActive('LmsSaas') || isModuleActive('LmsSaasMD')) && SaasDomain()!='main'): ?>
                <li>
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <div class="nav_icon_small">
                            <span class="fas fa-university"></span>
                        </div>
                        <div class="nav_title">
                            <span><?php echo e(__('saas.Saas Management')); ?></span>
                        </div>
                    </a>

                    <ul>
                        <li>
                            <a href="<?php echo e(route('saas.myPlan')); ?>"><?php echo e(__('saas.My Plan')); ?></a>
                        </li>
                    </ul>
                </li>

                <?php if(isModuleActive('SaasBranch') && permissionCheck('saasbranch.index')): ?>
                    <?php echo $__env->make('saasbranch::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(!isModuleActive('LmsSaas') && permissionCheck('backup.index')): ?>
                <?php echo $__env->make('backup::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>


    </ul>

</nav>

<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/backend/partials/sidebar.blade.php ENDPATH**/ ?>