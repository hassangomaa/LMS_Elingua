<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>  <?php echo e(__('setting.Social Login')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?> </a>
                    <a href="#"><?php echo e(__('setting.Setting')); ?></a>
                    <a href="#"> <?php echo e(__('setting.Social Login')); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-40 student-details">
        <div class="container-fluid p-0">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row pt-20">
                        <div class="main-title pl-3 pt-10">
                            <h3 class="mb-30"> <?php echo e(__('setting.Social Login')); ?> <?php echo e(__('setting.Setting')); ?></h3>
                        </div>
                    </div>

                    <form class="form-horizontal" action="<?php echo e(route('setting.socialLogin')); ?>" method="POST">

                        <?php echo csrf_field(); ?>
                        <div class="row white-box">
                            <div class="col-md-6 ">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <code>
                                            <a target="_blank"
                                               href="https://console.developers.google.com"><?php echo e(__('setting.Click Here to Get Keys')); ?></a></code>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-1">
                                                            <label class="primary_input_label"
                                                                   for="">  <?php echo e(__('setting.Allow Login with Google Account')); ?></label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="yes_login">
                                                                        <input type="radio"
                                                                               class="common-radio "
                                                                               id="yes_login"
                                                                               name="allow_google_login"
                                                                               <?php echo e(saasEnv('ALLOW_GOOGLE_LOGIN')=='true'?'checked':''); ?>

                                                                               value="1">

                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('common.Yes')); ?>

                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="no_login">
                                                                        <input type="radio"
                                                                               class="common-radio "
                                                                               id="no_login"
                                                                               name="allow_google_login"
                                                                               <?php echo e(saasEnv('ALLOW_GOOGLE_LOGIN')!='true'?'checked':''); ?>

                                                                               value="0">

                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('common.No')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('setting.Google client ID')); ?></label>
                                                    <input class="primary_input_field" placeholder="-" type="text"
                                                           name="google_client_id"
                                                           value="<?php echo e(saasEnv('GOOGLE_CLIENT_ID')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('setting.Google client Secret')); ?>  </label>
                                                    <input class="primary_input_field" placeholder="-" type="text"
                                                           name="google_secret_key"
                                                           value="<?php echo e(saasEnv('GOOGLE_CLIENT_SECRET')); ?>">
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-lg-12 ">
                                        <?php echo e(__('setting.Redirect URL')); ?>:
                                        <code>
                                            <?php echo e(saasEnv('APP_URL') . '/oauth/google/callback'); ?>

                                        </code>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <code>
                                            <a target="_blank"
                                               href="https://developers.facebook.com"><?php echo e(__('setting.Click Here to Get Keys')); ?></a></code>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-1">
                                                            <label class="primary_input_label"
                                                                   for="">  <?php echo e(__('setting.Allow Login with Facebook Account')); ?></label>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="allow_facebook_login_yes">
                                                                        <input type="radio"
                                                                               class="common-radio "
                                                                               id="allow_facebook_login_yes"
                                                                               name="allow_facebook_login"
                                                                               <?php echo e(saasEnv('ALLOW_FACEBOOK_LOGIN')=='true'?'checked':''); ?>

                                                                               value="1">

                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('common.Yes')); ?>

                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="allow_facebook_login_no">
                                                                        <input type="radio"
                                                                               class="common-radio "
                                                                               id="allow_facebook_login_no"
                                                                               name="allow_facebook_login"
                                                                               <?php echo e(saasEnv('ALLOW_FACEBOOK_LOGIN')!='true'?'checked':''); ?>

                                                                               value="0">

                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('common.No')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('setting.Facebook client ID')); ?></label>
                                                    <input class="primary_input_field" placeholder="-" type="text"
                                                           name="facebook_client_id"
                                                           value="<?php echo e(saasEnv('FACEBOOK_CLIENT_ID')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('setting.Facebook client Secret')); ?>  </label>
                                                    <input class="primary_input_field" placeholder="-" type="text"
                                                           name="facebook_secret_key"
                                                           value="<?php echo e(saasEnv('FACEBOOK_CLIENT_SECRET')); ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 ">
                                                <?php echo e(__('setting.Redirect URL')); ?>:
                                                <code>
                                                    <?php echo e(saasEnv('APP_URL') . '/oauth/facebook/callback'); ?>

                                                </code>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>


                            <div class="col-lg-12 ">
                                <div class="mt-40 text-center">
                                    <button class="primary-btn fix-gr-bg" data-toggle="tooltip">
                                        <span class="ti-check"></span>
                                        <?php echo e(__('common.Update')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Setting/Resources/views/socialLogin.blade.php ENDPATH**/ ?>