<style>
    .header_area .main_menu ul li ul.leftcontrol_submenu {
        left: auto !important;
        right: 100% !important;
    }
</style>
<!-- HEADER::START -->

<header>
                        <!-- header__left__start  -->

















                        <!-- header__left__start  -->

                            <!-- Navbar Start -->
                            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
                                <a href="" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                                    <h2 class="m-0 text-primary">
                                        <i class="fa fa-book me-3"></i>Lingua
                                    </h2>
                                </a>
                                <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarCollapse">
                                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                                        <a href="#" class="nav-item nav-link active">Home</a>
                                        <a href="#" class="nav-item nav-link">About</a>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Courses</a>
                                            <div class="dropdown-menu fade-down m-0">
                                                <a href="#" class="dropdown-item">General Translation Program (GoPro)</a>
                                                <a href="#" class="dropdown-item">Interpretation Diploma</a>
                                                <a href="#" class="dropdown-item">Legal Translation Program</a>
                                                <a href="#" class="dropdown-item">Financial Translation Program</a>
                                                <a href="#" class="dropdown-item">Medical Translation Program</a>
                                            </div>
                                        </div>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Workshops</a>
                                            <div class="dropdown-menu fade-down m-0">
                                                <a href="#" class="dropdown-item">CAT Tools</a>
                                                <a href="#" class="dropdown-item">Audio-Visual</a>
                                                <a href="#" class="dropdown-item">Localization</a>
                                                <a href="#" class="dropdown-item">Games Translation</a>
                                                <a href="#" class="dropdown-item">Content Writing</a>
                                                <a href="#" class="dropdown-item">Voiceover Workshop</a>
                                            </div>
                                        </div>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Webinars</a>
                                            <div class="dropdown-menu fade-down m-0">
                                                <a href="#" class="dropdown-item">One</a>
                                                <a href="#" class="dropdown-item">Two</a>
                                            </div>
                                        </div>
                                        <a href="#" class="nav-item nav-link">News</a>
                                        <a href="<?php echo e(route('courses')); ?>" class="nav-item nav-link">Enroll Course</a>
                                    </div>
                                    <!-- header__right_start  -->
                                    <?php if(auth()->guard()->check()): ?>
                                        <div class="header__right login_user">
                                            <div class="profile_info collaps_part">
                                                <div class="profile_img collaps_icon     d-flex align-items-center">
                                                    <div class="studentProfileThumb"
                                                         style="background-image: url('<?php echo e(getProfileImage(Auth::user()->image)); ?>')"></div>

                                                    <span class=""><?php echo e(Auth::user()->name); ?>

                                                        <br style="display: block">
                                                      <small>
                                                          <?php if(showEcommerce()): ?>
                                                              <?php if(Auth::user()->role_id==3): ?>
                                                                  <?php if(Auth::user()->balance==0): ?>
                                                                      <?php echo e(Settings('currency_symbol') ??'৳'); ?> 0
                                                                  <?php else: ?>
                                                                      <?php echo e(getPriceFormat(Auth::user()->balance)); ?>

                                                                  <?php endif; ?>
                                                              <?php endif; ?>
                                                          <?php endif; ?>
                                                      </small>

                                                    </span>

                                                    </div>
                                                <div class="profile_info_iner collaps_part_content">
                                                    <?php if(Auth::user()->role_id==3): ?>
                                                        <a href="<?php echo e(route('studentDashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                                                        <a href="<?php echo e(route('myProfile')); ?>"><?php echo e(__('frontendmanage.My Profile')); ?></a>
                                                        <a href="<?php echo e(route('myAccount')); ?>"><?php echo e(__('frontend.Account Settings')); ?></a>
                                                        <?php if(isModuleActive('Affiliate') && auth()->user()->affiliate_request!=1): ?>
                                                            <a href="<?php echo e(routeIsExist('affiliate.users.request')?route('affiliate.users.request'):''); ?>"><?php echo e(__('frontend.Join Affiliate Program')); ?></a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                                                        <a href="<?php echo e(route('changePassword')); ?>"><?php echo e(__('frontendmanage.My Profile')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(isModuleActive('UserType')): ?>
                                                        <?php $__currentLoopData = auth()->user()->userRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                if ($role->id==auth()->user()->role_id){
                                                                    continue;
                                                                }
                                                            ?>
                                                            <a href="<?php echo e(route('usertype.changePanel',$role->id)); ?>">
                                                                <?php echo e(__('common.Switch to')); ?> <?php echo e($role->name); ?>

                                                            </a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('logout')); ?>"><?php echo e(__('frontend.Log Out')); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(auth()->guard()->guest()): ?>
                                        <a href="<?php echo e(url('login')); ?>" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i
                                                class="fa fa-arrow-right ms-3"></i> </a>
                                    <?php endif; ?>

                                </div>
                            </nav>
                            <!-- Navbar End -->


                        <!-- header__right_end  -->
</header>

<?php if(Settings('show_cart')==1): ?>
    <a href="#" class="float notification_wrapper">
        <div class="notify_icon cart_store" style="padding-top: 7px">
            <img style="max-width: 30px;" src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/cart_white.svg"
                 alt="">
        </div>
        <span class="notify_count"><?php echo e(@cartItem()); ?></span>
    </a>
<?php endif; ?>
<!--/ HEADER::END -->

<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/partials/_menu.blade.php ENDPATH**/ ?>