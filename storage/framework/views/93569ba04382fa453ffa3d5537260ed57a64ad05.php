<?php
    $table_name='checkouts';
?>
<?php $__env->startSection('table'); ?><?php echo e($table_name); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('payment.Admin Course Revenue List')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('/dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?> </a>
                    <a href="#"><?php echo e(__('report.Report')); ?> </a>
                    <a href="#"><?php echo e(__('report.Admin Revenue')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="white_box_tittle list_header">
                            <h4><?php echo e(__('courses.Advanced Filter')); ?> </h4>
                        </div>
                        <form action="<?php echo e(route('admin.sortByDiscount',[$course_id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e(@$course_id); ?>">
                            <div class="row">
                                <div class="col-lg-4 mt-30">
                                    <select class="primary_select" name="discount" id="">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('payment.Discount')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('payment.Discount')); ?></option>
                                        <option
                                            value="10" <?php echo e(isset($_POST['discount'])?$_POST['discount']==10?'selected':'':''); ?>>
                                            <?php echo e(__('report.With Discount')); ?>

                                        </option>
                                        <option
                                            value="11" <?php echo e(isset($_POST['discount'])?$_POST['discount']==11?'selected':'':''); ?>>
                                            <?php echo e(__('report.Without Discount')); ?>

                                        </option>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-md-4 col-lg-4">
                                    <div class="primary_input mb-15">
                                        <label class="primary_input_label" for=""><?php echo e(__('report.Start Date')); ?></label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input placeholder="<?php echo e(__('common.Date')); ?>"
                                                               class="primary_input_field primary-input date form-control"
                                                               id="startDate" type="text" name="start_date"
                                                               value="<?php echo e(isset($_POST['start_date'])? $_POST['start_date']:''); ?>"
                                                               autocomplete="off">
                                                    </div>
                                                </div>
                                                <button class="" type="button">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4">
                                    <div class="primary_input mb-15">
                                        <label class="primary_input_label" for=""><?php echo e(__('report.End Date')); ?></label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input placeholder="<?php echo e(__('common.Date')); ?>"
                                                               class="primary_input_field primary-input date form-control"
                                                               id="admissionDate" type="text" name="end_date"
                                                               value="<?php echo e(isset($_POST['end_date'])? $_POST['end_date']:''); ?>"
                                                               autocomplete="off">
                                                    </div>
                                                </div>
                                                <button class="" type="button">
                                                    <i class="ti-calendar" id="admission-date-icon"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-20">
                                    <div class="search_course_btn text-right">
                                        <button type="submit"
                                                class="primary-btn radius_30px mr-10 fix-gr-bg"><?php echo e(__('courses.Filter')); ?> </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="row mt-40 mb-25">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <div class="main-title">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="QA_section QA_section_heading_custom check_box_table mt-30">
                <div class="QA_table ">


                    <table id="lms_table" class="table Crm_table_active3">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('report.Purchase ID')); ?></th>
                            <th scope="col"><?php echo e(__('report.Enrolled Student')); ?></th>
                            <th scope="col"> <?php echo e(__('report.Price')); ?></th>
                            <th scope="col"><?php echo e(__('report.Revenue')); ?></th>
                            <th scope="col"><?php echo e(__('report.Discount')); ?></th>
                            <th scope="col"><?php echo e(__('report.Enrolled Date')); ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <th scope="row"><?php echo e(@$log->id+1000); ?></th>

                                <th scope="row"><?php echo e(@$log->user->name); ?></th>

                                <td>
                                    <?php echo e(getPriceFormat($log->purchase_price)); ?>

                                </td>
                                <td>   <?php echo e(getPriceFormat(@$log->purchase_price - @$log->reveune)); ?> </td>
                                <td>
                                    <?php if($log->discount_amount!=0): ?>
                                        <?php echo e(getPriceFormat(@$log->discount_amount)); ?>

                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php echo e(showDate(@$log->created_at??now())); ?>

                                </td>
                            </tr>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Payment/Providers/../Resources/views/enroll_log.blade.php ENDPATH**/ ?>