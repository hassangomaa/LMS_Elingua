<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('setting.Email Setup')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('setting.Setting')); ?></a>
                    <a href="#"><?php echo e(__('setting.Email Setup')); ?></a>
                </div>
            </div>
        </div>
    </section>
      <?php dd(saasEnv('MAIL_DRIVER')); ?>  
    <section class="admin-visitor-area student-details">
        <div class="container-fluid p-0">
            <div class="row">

                <div class="row pt-20">
                    <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active"  href="#indivitual_email_sms" role="tab"
                               data-toggle="tab"><?php echo e(__('setting.SMTP')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"   href="#file_list" role="tab"
                               data-toggle="tab"><?php echo e(__('setting.Send Grid')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#group_email_sms"   role="tab"
                               data-toggle="tab"><?php echo e(__('setting.Php Mail')); ?>  </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-12 ">
                    <div class="white_box_30px">
                        <div class="row  mt_0_sm">

                            <!-- Start Sms Details -->
                            <div class="col-lg-12">


                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <input type="hidden" name="selectTab" id="selectTab">
                                    <div role="tabpanel" class="tab-pane fade show active" id="indivitual_email_sms">
                                        <?php echo $__env->make('setting::page_components.smtp_mail_setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                    </div>
                                    <!-- End Individual Tab -->
                                    <div role="tabpanel" class="tab-pane fade" id="file_list">

                                        <?php echo $__env->make('setting::page_components.send_grid_mail_setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade " id="group_email_sms">

                                        <?php echo $__env->make('setting::page_components.send_mail_setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <br>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">

                <div class="col-md-12 ">
                    <div class="white_box_30px">
                        <div class="row  mt_0_sm">

                            <!-- Start Sms Details -->
                            <div class="col-lg-12">
                                <?php if(permissionCheck('setting.send_test_mail')): ?>
                                    <form class="" action="<?php echo e(route('sendTestMail')); ?>" method="post">
                                        <?php endif; ?>
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('setting.From Mail')); ?>*</label>
                                                    <input class="primary_input_field"
                                                           <?php echo e($errors->has('testMailAddress') ? ' autofocus' : ''); ?> placeholder=""
                                                           type="email" required
                                                           name="testMailAddress" value="<?php echo e(old('testMailAddress')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('setting.Email Engine Type')); ?></label>
                                                    <select name="type" class="primary_select mb-25">
                                                        <?php $__currentLoopData = $emailSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emailSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($emailSetting->id); ?>"
                                                                    <?php if($emailSetting->active_status == 1): ?> selected <?php endif; ?>><?php echo e($emailSetting->email_engine_type); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                        type="submit"><?php echo e(__('setting.Send Test Mail')); ?></button>
                                            </div>
                                        </div>

                                    </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Setting/Resources/views/email_setup2.blade.php ENDPATH**/ ?>