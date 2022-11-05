<?php $__env->startSection('content'); ?>


    <div class="login_wrapper">
        <div class="login_wrapper_left">
            <div class="logo">
                <a href="<?php echo e(url('/')); ?>">
                    <img style="width: 190px" src="<?php echo e(asset(Settings('logo') )); ?> " alt="">
                </a>
            </div>
            <div class="login_wrapper_content">
                <h4><?php echo e(__('common.Reset Password')); ?></h4>

                <?php if(session('status')): ?>

                    <span class="text-success text-center p-3 d-block" role="alert">
                                                <strong> <?php echo e(session('status')); ?></strong>
                                            </span>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="invalid-feedback text-center p-3 d-block" role="alert">
                                                <strong><?php echo e($error); ?></strong>
                                            </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <form action="<?php echo e(route('password.email')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group custom_group_field mb_37">
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

                        </div>

                        <div class="col-12">
                            <button type="submit" class="theme_btn text-center w-100">
                                <?php echo e(__('common.Send Reset Link')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>


            <h5 class="shitch_text">
                <a href="<?php echo e(route('register')); ?>"><?php echo e(__('common.Need an account?')); ?></a>

            </h5>
        </div>
        <?php echo $__env->make('frontend.infixlmstheme.auth.login_wrapper_right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.infixlmstheme.auth.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/auth/passwords/email.blade.php ENDPATH**/ ?>