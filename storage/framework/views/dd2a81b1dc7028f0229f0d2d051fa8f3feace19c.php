<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/student_list.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php
    $table_name='users';
?>
<?php $__env->startSection('table'); ?><?php echo e($table_name); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('student.New Enroll')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('student.Student')); ?></a>
                    <a href="#"><?php echo e(__('student.New Enroll')); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('student.New Enroll')); ?></h3>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <form class="form-horizontal" action="<?php echo e(route('student.new_enroll_submit')); ?>"
                                      method="POST"
                                      enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>
                                    <div class="white-box">

                                        <div class="col-md-12 p-0">

                                            <div class="row mb-30">
                                                <div class="col-md-12">

                                                    <div class="row">
                                                        <div class="col-xl-6">


                                                            <label class="primary_input_label" for="staticPagesInput"> <?php echo e(__('student.Student')); ?>

                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="primary_input mb-15">
                                                            <select name="student[]" id="staticPagesInput" class="primary_multiselect mb-15 e1" multiple >

                                                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option
                                                                        value="<?php echo e($student->id); ?>"><?php echo e($student->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6">

                                                            <label class="primary_input_label" for="staticPagesInput"> <?php echo e(__('courses.Course')); ?>

                                                                <span class="text-danger">*</span>
                                                            </label>

                                                            <select class="primary_select" name="course"
                                                                    id="">

                                                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        if ($course->type==1){
    $type =trans('courses.Courses');

    }elseif($course->type==2){
    $type =trans('quiz.Quiz');

    } elseif($course->type==3){
    $type =trans('virtual-class.Class');

    }else{
    $type ='';
    }

                                                                    ?>
                                                                    <option
                                                                        value="<?php echo e($course->id); ?>"><?php echo e($course->title); ?> (<?php echo e($type); ?>)
                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="row mt-40">
                                            <div class="col-lg-12 text-center">
                                                <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                >
                                                    <span class="ti-check"></span>
                                                    <?php echo e(__('student.Enroll Now')); ?>

                                                </button>
                                            </div>
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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/StudentSetting/Providers/../Resources/views/new_enroll.blade.php ENDPATH**/ ?>