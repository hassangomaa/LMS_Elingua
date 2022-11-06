<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('payment.Offline Payment')); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('/dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?> </a>
                    <a href="#"><?php echo e(__('payment.Payment')); ?> </a>
                    <a href="#"><?php echo e(__('payment.Fund History')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row mt-40 mb-25">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo e(@$user->name); ?></h3>
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
                            <th width="10%"><?php echo e(__('payment.F-ID')); ?></th>
                            <th width="15%"><?php echo e(__('payment.Amount')); ?></th>
                            <th width="15%"><?php echo e(__('common.Type')); ?></th>
                            <th width="15%"><?php echo e(__('common.Date')); ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(@$value->id); ?></td>
                                <td> <?php echo e($value->amount==0?0:getPriceFormat($value->amount)); ?>    </td>
                                <td> <?php echo e(@$value->type); ?> <?php echo e(__('payment.Fund')); ?>  </td>
                                <td><?php echo e(date('jS M, Y', strtotime(@$value->updated_at))); ?></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/OfflinePayment/Resources/views/fund/funding_history.blade.php ENDPATH**/ ?>