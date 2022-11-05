
<div class="container-fluid no-gutters" id="main-nav-for-chat">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">

                <?php echo e($path =asset(Settings('logo') )); ?>

                <?php echo e($data = file_get_contents($path)); ?>

                <input type="hidden" id="logo_img" value="<?php echo e(base64_encode($data)); ?>">
                <input type="hidden" id="logo_title" value="<?php echo e(Settings('company_name')); ?>">
                <div class="small_logo_crm d-lg-none">
                    <a href="<?php echo e(url('/')); ?>"> <img src="<?php echo e(asset(Settings('logo'))); ?>" alt=""></a>
                </div>
                <div id="sidebarCollapse" class="sidebar_icon  d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="collaspe_icon open_miniSide">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area ml-40">
                    <div class="search_inner">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" class="form-control primary-input input-left-icon"
                                       placeholder="Search" id="search" onkeyup="showResult(this.value)">
                            </div>
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    <div id="livesearch" style="display: none;"></div>
                </div>

                <div class="header_middle d-none d-md-block">
                    <ul class="nav navbar-nav mr-auto nav-buttons flex-sm-row">

                        <li class="nav-item">
                            <a target="_blank" class="primary-btn white mr-10"
                               href="<?php echo e(url('/')); ?>"><?php echo e(__('common.Website')); ?></a>
                        </li>


                    </ul>
                </div>

                <div class="header_right d-flex justify-content-between align-items-center">












                    <ul class="header_notification_warp d-flex align-items-center">
                          Start Notification
                        <li class="scroll_notification_list">
                            <a class="pulse theme_color bell_notification_clicker show_notifications" href="#">
                                <!-- bell   -->
                                <i class="fa fa-bell"></i>

                                <!--/ bell   -->

                                <span class="pulse-ring notification_count_pulse"></span>
                            </a>
                            <!-- Menu_NOtification_Wrap  -->
                            <div class="Menu_NOtification_Wrap notifications_wrap">
                                <div class="notification_Header">
                                    <h4><?php echo e(__('common.Notifications')); ?></h4>
                                </div>
                                <div class="Notification_body">
                                    <!-- single_notify  -->


















                                </div>
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="<?php echo e(route('MyNotification')); ?>"
                                           class="primary-btn radius_30px text_white  fix-gr-bg"><?php echo e(__('common.See More')); ?></a>
                                        <a href="<?php echo e(route('NotificationMakeAllRead')); ?>" id="mark_all_as_read"
                                           class="primary-btn radius_30px text_white  fix-gr-bg"><?php echo e(__('common.Mark As Read')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <!--/ Menu_NOtification_Wrap  -->
                        </li>
                          End Notification





































                    </ul>
                    <div class="profile_info">
                        <div class="profileThumb"
                             style="background-image: url('<?php echo e(getProfileImage(Auth::user()->image)); ?>')"></div>

                        <div class="profile_info_iner">
                            <div class="use_info d-flex align-items-center">
                                <div class="thumb"
                                     style="background-image: url('<?php echo e(getProfileImage(Auth::user()->image)); ?>')">

                                </div>
                                <div class="user_text">
                                    <p><?php echo e(__('common.Welcome')); ?></p>
                                    <span><?php echo e(@Auth::user()->name); ?> </span>
                                </div>
                            </div>

                            <div class="profile_info_details">
                                <a href="<?php echo e(route('updatePassword')); ?>">
                                    <i class="ti-settings"></i> <span><?php echo e(__('common.View Profile')); ?> </span>
                                </a>

                                <?php if(isModuleActive('UserType')): ?>
                                    <?php $__currentLoopData = auth()->user()->userRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            if ($role->id==auth()->user()->role_id){
                                                continue;
                                            }
                                        ?>
                                        <a href="<?php echo e(route('usertype.changePanel',$role->id)); ?>">
                                            <i class="ti-link"></i>
                                            <span><?php echo e(__('common.Switch to')); ?> <?php echo e($role->name); ?></span>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if((isModuleActive('LmsSaas') && Auth::user()->is_saas_admin==1) || isModuleActive('LmsSaasMD') && Auth::user()->is_saas_admin==1): ?>
                                    <a href="<?php echo e(route('saas_panel')); ?>" onclick="event.preventDefault();
                                            document.getElementById('saas_panel').submit();"> <i class="ti-user"></i>
                                        <span>
                                                <?php if(Auth::user()->active_panel=='saas'): ?>
                                                <?php echo e(__('common.Lms Panel')); ?>

                                            <?php else: ?>
                                                <?php echo e(__('common.Saas Panel')); ?>

                                            <?php endif; ?>
                                                </span> </a>

                                    <form id="saas_panel" action="<?php echo e(route('saas_panel')); ?>" method="POST"
                                          class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                <?php endif; ?>

                                <?php if(isModuleActive('Affiliate') && !isAffiliateUser()): ?>
                                    <a href="<?php echo e(routeIsExist('affiliate.users.request')?route('affiliate.users.request'):''); ?>">
                                        <i class="ti-money"></i>    <span>
                                            <?php echo e(__('frontend.Join Affiliate Program')); ?>

                                        </span>
                                    </a>
                                <?php endif; ?>

                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class="ti-shift-left"></i> <span><?php echo e(__('dashboard.Logout')); ?></span>
                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/backend/partials/menu.blade.php ENDPATH**/ ?>