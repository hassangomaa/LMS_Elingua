<?php $__env->startSection('content'); ?>
    <div class="login_wrapper">
        <div class="login_wrapper_left">
            <div class="logo">
                <a href="<?php echo e(url('/')); ?>">
                    <img style="width: 190px" src="public/uploads/settings/logo1.png" alt="">
                </a>
            </div>
            <div class="login_wrapper_content">
                <h4><?php echo e(__('frontend.Welcome back. Please login')); ?> <br><?php echo e(__('frontend.to your account')); ?> </h4>

                <div class="socail_links">


                    <?php if(saasEnv('ALLOW_FACEBOOK_LOGIN')=='true'): ?>

                        <a href="<?php echo e(route('social.oauth', 'facebook')); ?>"
                           class="theme_btn small_btn2 text-center facebookLoginBtn">
                            <i class="fab fa-facebook-f"></i>
                            <?php echo e(__('frontend.Login with Facebook')); ?></a>
                    <?php endif; ?>

                    <?php if(saasEnv('ALLOW_GOOGLE_LOGIN')=='true'): ?>
                        <a href="<?php echo e(route('social.oauth', 'google')); ?>"
                           class="theme_btn small_btn2 text-center googleLoginBtn">
                            <i class="fab fa-google"></i>
                            <?php echo e(__('frontend.Login with Google')); ?></a>
                    <?php endif; ?>
                </div>
                <?php if(saasEnv('ALLOW_FACEBOOK_LOGIN')=='true' || saasEnv('ALLOW_GOOGLE_LOGIN')=='true'): ?>
                    <p class="login_text"><?php echo e(__('frontend.Or')); ?> <?php echo e(__('frontend.login with Email Address')); ?></p>
                <?php endif; ?>

                <form action="<?php echo e(route('login')); ?>" method="POST" id="loginForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group custom_group_field">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">
                                        <!-- svg -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13.328" height="10.662"
                                             viewBox="0 0 13.328 10.662">
                                            <path id="Path_44" data-name="Path 44"
                                                  d="M13.995,4H3.333A1.331,1.331,0,0,0,2.007,5.333l-.007,8a1.337,1.337,0,0,0,1.333,1.333H13.995a1.337,1.337,0,0,0,1.333-1.333v-8A1.337,1.337,0,0,0,13.995,4Zm0,9.329H3.333V6.666L8.664,10l5.331-3.332ZM8.664,8.665,3.333,5.333H13.995Z"
                                                  transform="translate(-2 -4)" fill="#687083"/>
                                        </svg>
                                        <!-- svg -->
                                    </span>
                                </div>
                                <input type="email" value="<?php echo e(old('email')); ?>"
                                       class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                       placeholder="<?php echo e(__('common.Enter Email')); ?>" name="email" aria-label="Username"
                                       aria-describedby="basic-addon3">
                            </div>
                            <?php if($errors->first('email')): ?>
                                <span class="text-danger" role="alert"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="col-12 mt_20">
                            <div class="input-group custom_group_field">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon4">
                                        <!-- svg -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.697" height="14.039"
                                             viewBox="0 0 10.697 14.039">
                                        <path id="Path_46" data-name="Path 46"
                                              d="M9.348,11.7A1.337,1.337,0,1,0,8.011,10.36,1.341,1.341,0,0,0,9.348,11.7ZM13.36,5.68h-.669V4.343a3.343,3.343,0,0,0-6.685,0h1.27a2.072,2.072,0,0,1,4.145,0V5.68H5.337A1.341,1.341,0,0,0,4,7.017V13.7a1.341,1.341,0,0,0,1.337,1.337H13.36A1.341,1.341,0,0,0,14.7,13.7V7.017A1.341,1.341,0,0,0,13.36,5.68Zm0,8.022H5.337V7.017H13.36Z"
                                              transform="translate(-4 -1)" fill="#687083"/>
                                        </svg>
                                        <!-- svg -->
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control"
                                       placeholder="<?php echo e(__('common.Enter Password')); ?>" aria-label="password"
                                       aria-describedby="basic-addon4">
                            </div>
                            <?php if($errors->first('password')): ?>
                                <span class="text-danger" role="alert"><?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 mt_20">
                            <?php if(saasEnv('NOCAPTCHA_FOR_LOGIN')=='true'): ?>
                                <?php if(saasEnv('NOCAPTCHA_IS_INVISIBLE')=="true"): ?>
                                    <?php echo NoCaptcha::display(["data-size"=>"invisible"]); ?>

                                <?php else: ?>
                                    <?php echo NoCaptcha::display(); ?>

                                <?php endif; ?>

                                <?php if($errors->has('g-recaptcha-response')): ?>
                                    <span class="text-danger"
                                          role="alert"><?php echo e($errors->first('g-recaptcha-response')); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 mt_20">
                            <div class="remember_forgot_pass d-flex justify-content-between">
                                <label class="primary_checkbox d-flex">
                                    <input type="checkbox" name="remember"
                                           <?php echo e(old('remember') ? 'checked' : ''); ?> value="1">
                                    <span class="checkmark mr_15"></span>
                                    <span class="label_name"><?php echo e(__('common.Remember Me')); ?></span>
                                </label>
                                <a href="<?php echo e(route('SendPasswordResetLink')); ?>"
                                   class="forgot_pass"><?php echo e(__('common.Forgot Password ?')); ?></a>
                            </div>
                        </div>
                        <div class="col-12">

                                <?php if(saasEnv('NOCAPTCHA_FOR_LOGIN')=='true' && saasEnv('NOCAPTCHA_IS_INVISIBLE')=="true"): ?>

                                    <button type="button" class="g-recaptcha theme_btn text-center w-100"
                                            data-sitekey="<?php echo e(saasEnv('NOCAPTCHA_SITEKEY')); ?>" data-size="invisible"
                                            data-callback="onSubmit"
                                            class="theme_btn text-center w-100"> <?php echo e(__('common.Login')); ?></button>
                                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                    <script>
                                        function onSubmit(token) {
                                            document.getElementById("loginForm").submit();
                                        }
                                    </script>
                                <?php else: ?>
                                    <button type="submit"
                                            class="theme_btn text-center w-100"> <?php echo e(__('common.Login')); ?></button>
                                <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
            <?php if(Settings('student_reg')==1 && saasPlanCheck('student')==false): ?>
                <h5 class="shitch_text"><?php echo e(__("frontend.Don’t have an account")); ?>? <a href="<?php echo e(route('register')); ?>">
                        <?php echo e(__('common.Register')); ?>

                    </a></h5>
            <?php endif; ?>
            <?php if(appMode()): ?>
                <div class="row mt-4">
                    <div class="col-md-4 mb_10">

                        <a class="theme_btn small_btn2 text-center w-100"
                           href="<?php echo e(route('auto.login','admin')); ?>">Admin</a>

                    </div>

                    <div class="col-md-4 mb_10">
                        <a class="theme_btn small_btn2 text-center w-100"
                           href="<?php echo e(route('auto.login','teacher')); ?>">Instructor</a>
                    </div>
                    <div class="col-md-4 mb_10">
                        <a class="theme_btn small_btn2 text-center w-100"
                           href="<?php echo e(route('auto.login','student')); ?>">Student</a>

                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php echo $__env->make('frontend.infixlmstheme.auth.login_wrapper_right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <?php echo Toastr::message(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('auth.layouts.app'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/auth/login.blade.php ENDPATH**/ ?>