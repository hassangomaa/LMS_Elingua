<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('payment.Admin Course Revenue List')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('/dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?> </a>
                    <a href="#"><?php echo e(__('quiz.Report')); ?> </a>
                    <a href="#"><?php echo e(__('payment.Admin Course Revenue List')); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="col-lg-12 mt-60">
                <div class="box_header">
                    <div class="main-title d-md-flex mb-0">
                        <h3 class="mb-0"><?php echo e(__('payment.Admin Course Revenue List')); ?></h3>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <div class="QA_section QA_section_heading_custom check_box_table">
                <div class="QA_table ">
                    <!-- table-responsive -->
                    <div class="">
                        <table id="lms_table" class="table Crm_table_active3">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo e(__('courses.Course Title')); ?></th>
                                <th scope="col"><?php echo e(__('courses.Instructor')); ?></th>
                                <th scope="col"><?php echo e(__('courses.Price')); ?></th>
                                <th scope="col"><?php echo e(__('courses.Publish')); ?></th>
                                <th scope="col"><?php echo e(__('payment.Total')); ?> <?php echo e(__('courses.Enrolled')); ?></th>
                                <th scope="col"><?php echo e(__('courses.Revenue')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td scope="row">
                                        <?php echo e(@$course->title); ?>

                                    </td>
                                    <td><?php echo e(@$course->user->name); ?></td>

                                    <td>

                                        <?php echo e(getPriceFormat($course->purchasePrice)); ?>

                                    </td>
                                    <td>

                                        <?php echo e(showDate(@$course->created_at??now())); ?>

                                    </td>
                                    <td><?php echo e(@$course->enrolls_count); ?> </td>


                                    <td>
                                        <a href="<?php echo e(route('admin.enrollLog',[@$course->id])); ?>" class="btn_1 light">
                                            <?php echo e(getPriceFormat(@$course->reveune ?  (@$course->purchasePrice - @$course->sumRev) : 0)); ?>

                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Payment/Providers/../Resources/views/admin_revenue.blade.php ENDPATH**/ ?>