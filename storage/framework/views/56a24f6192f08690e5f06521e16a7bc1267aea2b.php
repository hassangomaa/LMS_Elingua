<?php $__env->startSection('table'); ?><?php echo e(__('social_links')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('setting.Instructor Setup')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('setting.Settings')); ?></a>
                    <a class="active"
                       href="<?php echo e(route('settings.instructor_setup')); ?>"><?php echo e(__('setting.Instructor Setup')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="white-box mb_30 ">
                            <form action="<?php echo e(route('settings.instructor_setup_update')); ?>" method="post" id="coupon-form" name="coupon-form" enctype="multipart/form-data">

                                            <?php echo csrf_field(); ?>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                        <div class="mb_25">
                                                            <label class="switch_toggle "
                                                                   for="show_instructor_page_banner">
                                                                <input type="checkbox" class="status_enable_disable"
                                                                       name="show_instructor_page_banner"
                                                                       id="show_instructor_page_banner"
                                                                       <?php if(@$data->show_instructor_page_banner == 1): ?> checked
                                                                       <?php endif; ?> value="1">
                                                                <i class="slider round"></i>


                                                            </label>
                                                            <?php echo e(__('frontendmanage.Instructor Page Banner')); ?>


                                                        </div>
                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-lg-12 text-center">
                                                    <div class="d-flex justify-content-center pt_20">
                                                        <button type="submit" class="primary-btn semi_large fix-gr-bg"
                                                                data-toggle="tooltip"
                                                                id="save_button_parent">
                                                            <i class="ti-check"></i>
                                                            <?php if(!isset($edit)): ?> <?php echo e(__('common.Save')); ?> <?php else: ?> <?php echo e(__('common.Update')); ?> <?php endif; ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php echo $__env->make('backend.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Setting/Resources/views/instructorSetup.blade.php ENDPATH**/ ?>