<!-- sidebar part here -->
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="<?php echo e(url('/')); ?>"><img style="width: 200px" src="public/uploads/settings/logo1.png"
                                    alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar_iner">
        <ul class="list-unstyled">
            <?php if(permissionCheck('studentDashboard')): ?>
                <li>
                    <a href="<?php echo e(route('studentDashboard')); ?>"
                       class="  d-flex align-items-center <?php echo e(routeIs('studentDashboard')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/dashboard.svg" alt="">
                        </div>
                        <span><?php echo e(__('common.Dashboard')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('deposit') && showEcommerce()): ?>
                <li>
                    <a href="<?php echo e(route('deposit')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('deposit')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/account_setting.svg" alt="">
                        </div>
                        <span><?php echo e(__('common.Pay Now')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('myCourses')): ?>

                <li>
                    <a href="<?php echo e(route('myCourses')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('myCourses')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/my_course.svg" alt="">
                        </div>
                        <span><?php echo e(__('common.My Courses')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('myQuizzes')): ?>
                <li>
                    <a href="<?php echo e(route('myQuizzes')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('myQuizzes')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/my_course.svg" alt="">
                        </div>
                        <span><?php echo e(__('common.My Quizzes')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('myClasses')): ?>

                <li>
                    <a href="<?php echo e(route('myClasses')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('myClasses')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/my_quiz.svg" alt="">
                        </div>
                        <span><?php echo e(__('common.Live Classes')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

                <?php if(isModuleActive('Appointment')): ?>
                      <?php if(permissionCheck('myAppointment')): ?>  
                    <li>
                        <a href="<?php echo e(route('myAppointment')); ?>"
                           class=" d-flex align-items-center <?php echo e(routeIs('myAppointment')  ? 'active' : ''); ?>">
                            <div class="menu_icon">
                                <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/my_course.svg" alt="">
                            </div>
                            <span><?php echo e(__('appointment.My Appointment')); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('myWishlists')); ?>"
                           class=" d-flex align-items-center <?php echo e(routeIs('myWishlists')  ? 'active' : ''); ?>">
                            <div class="menu_icon">
                                <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/my_course.svg" alt="">
                            </div>
                            <span><?php echo e(__('appointment.My WishList')); ?></span>
                        </a>
                    </li>
                      <?php endif; ?>  
                <?php endif; ?>
            <?php if(isModuleActive('Org')): ?>
                <li>
                    <a href="<?php echo e(route('myReports')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('myReports')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/my_report.svg" alt="">
                        </div>
                        <span><?php echo e(__('common.Reports')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(isModuleActive('OrgSubscription')): ?>
                <li>
                    <a href="<?php echo e(route('orgSubscriptionCourses')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('orgSubscriptionCourses')  ? 'active' : ''); ?>">
                        <span><?php echo e(__('org-subscription.My Plan')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(isModuleActive('Homework')): ?>
                <li>
                    <a href="<?php echo e(route('myHomework')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('myHomework')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/my_quiz.svg" alt="">
                        </div>
                        <span><?php echo e(__('homework.Study Material')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(isModuleActive('Survey')): ?>
                <li>
                    <a href="<?php echo e(route('survey.student_survey')); ?>"
                       class=" d-flex align-items-center  <?php echo e(routeIs('survey.student_survey')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/compact/')); ?>/img/svg/purchase_history.svg" alt="">
                        </div>
                        <span><?php echo e(__('survey.Survey')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(isModuleActive('Chat')): ?>
                <li>
                    <a class=" d-flex justify-content-between <?php echo e(routeIs('chat.index')  ? 'active' : ''); ?>"
                       data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                       aria-controls="collapseExample">

                        <span><?php echo app('translator')->get('chat.chat'); ?> </span>
                        <i class="fa fa-chevron-down text-black"></i>
                    </a>
                    <ul class="collapse chat-menu-ul" id="collapseExample">
                        <li>
                            <a class="chat-submenu" href="<?php echo e(route('chat.index')); ?>"><?php echo e(__('chat.chat_box')); ?></a>
                        </li>

                        <li>
                            <a class="chat-submenu"
                               href="<?php echo e(route('chat.invitation')); ?>"><?php echo e(__('chat.invitation')); ?></a>
                        </li>

                        <li>
                            <a class="chat-submenu"
                               href="<?php echo e(route('chat.blocked.users')); ?>"><?php echo e(__('chat.blocked_user')); ?></a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <li>
                <a href="<?php echo e(route('myNotificationSetup')); ?>"
                   class=" d-flex align-items-center  <?php echo e(routeIs('myNotificationSetup')  ? 'active' : ''); ?>">
                    <div class="menu_icon">
                        <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/purchase_history.svg" alt="">
                    </div>
                    <span><?php echo e(__('setting.Notification Setup')); ?></span>
                </a>
            </li>
            <?php if(isModuleActive('BundleSubscription')): ?>
            <?php endif; ?>
            <?php if(permissionCheck('myCertificate')): ?>
                <li>
                    <a href="<?php echo e(route('myCertificate')); ?>"
                       class=" d-flex align-items-center  <?php echo e(routeIs('myCertificate')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/purchase_history.svg" alt="">
                        </div>
                        <span><?php echo e(__('certificate.Certificate')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(isModuleActive('Assignment')): ?>

                <li>
                    <a href="<?php echo e(route('myAssignment')); ?>"
                       class=" d-flex align-items-center  <?php echo e(routeIs('myAssignment')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/purchase_history.svg" alt="">
                        </div>
                        <span><?php echo e(__('assignment.Assignment')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('myPurchases')): ?>
                <li>
                    <a href="<?php echo e(route('myPurchases')); ?>"
                       class=" d-flex align-items-center  <?php echo e(routeIs('myPurchases')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/purchase_history.svg" alt="">
                        </div>
                        <span><?php echo e(__('common.Purchase History')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('myProfile')): ?>
                <li>
                    <a href="<?php echo e(route('myProfile')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('myProfile')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/edit_pro.svg" alt="">
                        </div>
                        <span><?php echo e(__('frontendmanage.My Profile')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('myAccount')): ?>
                <li>
                    <a href="<?php echo e(route('myAccount')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('myAccount')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/account_setting.svg" alt="">
                        </div>
                        <span><?php echo e(__('frontend.Account Settings')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('logged.in.devices')): ?>
                <li>
                    <a href="<?php echo e(route('logged.in.devices')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('logged.in.devices')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/account_setting.svg" alt="">
                        </div>
                        <span><?php echo e(__('common.Logged In Devices')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('referral') && showEcommerce()): ?>
                <li>
                    <a href="<?php echo e(route('referral')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('referral')  ? 'active' : ''); ?>">
                        <div class="menu_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/account_setting.svg" alt="">
                        </div>
                        <span><?php echo e(__('common.Referral')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(isModuleActive('Subscription')): ?>
                <?php if(isSubscribe()): ?>
                    <li>
                        <a href="<?php echo e(route('subscriptionCourses')); ?>"
                           class=" d-flex align-items-center <?php echo e(routeIs('subscriptionCourses')  ? 'active' : ''); ?>">

                            <span><?php echo e(__('subscription.Subscription')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(isModuleActive('Affiliate') && hasAffiliateAccess() ): ?>
                <li>
                    <a href="<?php echo e(route('affiliate.my_affiliate.index')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('affiliate.my_affiliate.index')  ? 'active' : ''); ?>">
                        <span><?php echo e(__('affiliate.My Affiliate')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(isModuleActive('SupportTicket') && permissionCheck('student.support-ticket.index')): ?>
                <li>
                    <a href="<?php echo e(route('student.support-ticket.index')); ?>"
                       class=" d-flex align-items-center <?php echo e(routeIs('student.support-ticket.index')  ? 'active' : ''); ?>">
                        <span><?php echo e(__('ticket.support_ticket')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </div>
</nav>
<!-- sidebar part end -->
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/partials/_sidebar.blade.php ENDPATH**/ ?>