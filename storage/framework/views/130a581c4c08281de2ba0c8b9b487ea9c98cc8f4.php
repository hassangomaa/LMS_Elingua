<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/student_list.css')); ?>"/>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('student.Students')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('student.Students')); ?></a>
                    <a href="#"><?php echo e(__('student.Import Student')); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-title">
                        <h3><?php echo e(__('student.Import Student')); ?></h3>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-4 text-right mb-20">

                    <a href="<?php echo e(route('regular_student_excel_download')); ?>">
                        <button class="primary-btn tr-bg text-uppercase bord-rad">
                            <?php echo e(__('common.Download')); ?>

                            <span class="pl ti-download"></span>
                        </button>
                    </a>
                </div>

            </div>

            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'regular_student_import_save',
                                'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'student_form'])); ?>

            <div class="row">
                <div class="col-lg-12">


                    <div class="white-box">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-title">

                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="row mb-40 mt-30">




                                <div class="col-lg-12">
                                    <div class="primary_input mb-35">
                                        <label class="primary_input_label"
                                               for=""><?php echo e(__('common.Browse')); ?> Excel File<strong
                                                class="text-danger">*</strong> </label>
                                        <div class="primary_file_uploader">
                                            <input class="primary-input" type="text" id="placeholderFileOneName"
                                                   placeholder="<?php echo e(__('common.Browse')); ?>  Excel File" readonly="">
                                            <button class="primary_btn_2" type="button">
                                                <label class="primary_btn_2"
                                                       for="document_file_1"><?php echo e(__('common.Browse')); ?> </label>
                                                <input type="file" class="d-none" name="file" id="document_file_1">
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg">
                                        <span class="ti-check"></span>
                                        <?php echo e(__('student.Import Student')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/StudentSetting/Providers/../Resources/views/regular_student_import.blade.php ENDPATH**/ ?>