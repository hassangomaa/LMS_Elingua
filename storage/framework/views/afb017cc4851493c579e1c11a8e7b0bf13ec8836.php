<?php $__env->startSection('table'); ?>
    <?php
        $table_name='checkouts';
    ?>
    <?php echo e($table_name); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>


    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('payment.Payment Received Online')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('/dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?> </a>
                    <a href="#"><?php echo e(__('payment.Payment')); ?> </a>
                    <a href="#"><?php echo e(__('payment.Payment Received Online')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="white_box_tittle list_header">
                            <h4><?php echo e(__('courses.Advanced Filter')); ?> </h4>
                        </div>
                        <form action="<?php echo e(route('filterSearch')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <div class="col-lg-4 mt-30">
                                    <select class="primary_select" name="methods">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('payment.Method')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('payment.Method')); ?></option>
                                        <option value="all" selected><?php echo e(__('payment.All')); ?></option>
                                        <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($gateway->method!='Bank Payment'): ?>
                                                <option value="<?php echo e($gateway->method); ?>"
                                                        <?php if(isset($_POST['methods']) && $_POST['methods']==$gateway->method): ?>selected <?php endif; ?>>
                                                    <?php echo e($gateway->method); ?>

                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                                <div class="col-xl-4 col-md-4 col-lg-4">
                                    <div class="primary_input mb-15">
                                        <label class="primary_input_label"
                                               for="startDate"><?php echo e(__('common.Start Date')); ?></label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input placeholder="Date"
                                                               class="primary_input_field primary-input date form-control"
                                                               id="startDate" type="text" name="start_date"
                                                               value="<?php if(isset($_POST['start_date'])): ?><?php echo e($_POST['start_date']); ?> <?php else: ?><?php echo e(date('m/d/Y')); ?><?php endif; ?>"
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
                                        <label class="primary_input_label"
                                               for="admissionDate"><?php echo e(__('common.End Date')); ?></label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input placeholder="Date"
                                                               class="primary_input_field primary-input date form-control"
                                                               id="admissionDate" type="text" name="end_date"
                                                               value="<?php if(isset($_POST['end_date'])): ?><?php echo e($_POST['end_date']); ?> <?php else: ?><?php echo e(date('m/d/Y')); ?><?php endif; ?>"
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
                                <h3 class="mb-0"><?php echo e(__('payment.Payment Received Online')); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <div class="QA_section QA_section_heading_custom check_box_table mt-30">
                <div class="QA_table ">

                    <table id="lms_table" class="table Crm_table_active3">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('payment.Transaction')); ?></th>
                            <th scope="col"><?php echo e(__('common.User')); ?></th>
                            <th scope="col"><?php echo e(__('payment.Request Date')); ?></th>
                            <th scope="col"><?php echo e(__('payment.Total')); ?> <?php echo e(__('payment.Amount')); ?></th>
                            <th scope="col"><?php echo e(__('common.Paid')); ?> <?php echo e(__('payment.Amount')); ?></th>
                            <th scope="col">  <?php echo e(__('tax.TAX')); ?></th>
                            <th scope="col"><?php echo e(__('payment.Payment')); ?> <?php echo e(__('payment.Method')); ?></th>
                                                         <th scope="col"><?php echo e(__('common.Status')); ?></th> 
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $onlineLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row">
                                    <?php echo e(@$log->tracking); ?>

                                </th>
                                <td><?php echo e(@$log->user->name); ?></td>
                                <td><?php echo e(@$log->dateFormat); ?></td>
                                <td> <?php echo e(getPriceFormat($log->price)); ?></td>
                                <td><?php echo e(getPriceFormat($log->purchase_price)); ?></td>
                                <td><?php echo e(getPriceFormat($log->tax)); ?></td>
                                <td> <?php echo e(@$log->payment_method); ?></td>

                            </tr>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                        <tr>
                            <td><?php echo e(__('common.Total')); ?></td>
                            <td></td>
                            <td></td>
                            <td> <?php echo e(getPriceFormat($onlineLogs->sum('price'))); ?></td>
                            <td> <?php echo e(getPriceFormat($onlineLogs->sum('purchase_price'))); ?></td>
                            <td> <?php echo e(getPriceFormat($onlineLogs->sum('tax'))); ?></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </section>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Payment/Providers/../Resources/views/fund/online_log.blade.php ENDPATH**/ ?>