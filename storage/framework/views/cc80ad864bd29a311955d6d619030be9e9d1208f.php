<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('payment.Bank Payment')); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('/dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?> </a>
                    <a href="#"><?php echo e(__('payment.Payment')); ?> </a>
                    <a href="#"><?php echo e(__('payment.Bank Payment')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="main-title">
                        <h3 class="mb-0"><?php echo e(__('payment.Payment')); ?>  </h3>
                    </div>
                </div>
                <!-- </div> -->
                <div class="col-lg-12  mt_25">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('common.SL')); ?></th>
                                        <th scope="col"><?php echo e(__('common.User')); ?></th>
                                        <th scope="col"><?php echo e(__('setting.Bank Name')); ?></th>
                                        <th scope="col"><?php echo e(__('setting.Branch Name')); ?></th>
                                        <th scope="col"><?php echo e(__('setting.Account Type')); ?></th>
                                        <th scope="col"><?php echo e(__('setting.Account Holder')); ?></th>
                                        <th scope="col"><?php echo e(__('setting.Account Number')); ?></th>
                                        <th scope="col">  <?php echo e(__('payment.Amount')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td><?php echo e(++$key); ?></td>
                                            <td><?php echo e($payment->user->name); ?></td>
                                            <td><?php echo e($payment->bank_name); ?></td>
                                            <td><?php echo e($payment->branch_name); ?></td>
                                            <td><?php echo e($payment->account_type); ?></td>
                                            <td><?php echo e($payment->account_holder); ?></td>
                                            <td><?php echo e($payment->account_number); ?></td>
                                            <td><?php echo e($payment->amount); ?></td>
                                            <td>
                                                <div class="primary-btn small fix-gr-bg">
                                                    <?php echo e($payment->status==0?'Pending':'Approved'); ?>

                                                </div>
                                            </td>

                                            <td>
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2<?php echo e($payment->id); ?>" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <?php echo e(__('common.Action')); ?>

                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2<?php echo e($payment->id); ?>">

                                                        <a  target="_blank" href="<?php echo e(asset($payment->image)); ?>"
                                                           class="dropdown-item"
                                                          >View</a>
                                                        <?php if($payment->status==0): ?>
                                                            <button  data-toggle="modal"
                                                               data-target="#approve<?php echo e(@$payment->id); ?>"
                                                               class="dropdown-item"
                                                               type="button">Approve</button>
                                                        <?php endif; ?>
                                                        <button   data-toggle="modal"
                                                           data-target="#delete<?php echo e(@$payment->id); ?>" class="dropdown-item"
                                                           type="button"><?php echo e(__('common.Delete')); ?></button>

                                                    </div>
                                                </div>

                                            </td>
                                        </tr>

                                        <div class="modal fade admin-query" id="approve<?php echo e(@$payment->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Approve <?php echo e(__('payment.Payment')); ?> </h4>
                                                        <button type="button" class="close" data-dismiss="modal"><i
                                                                class="ti-close "></i></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">

                                                            <h4>Are you sure ?</h4>
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>

                                                            <form method="post"
                                                                  action="<?php echo e(route('bankPayment.update', [$payment->id])); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('PUT'); ?>
                                                                <button class="primary-btn fix-gr-bg"
                                                                        type="submit">Approve
                                                                </button>
                                                            </form>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade admin-query" id="delete<?php echo e(@$payment->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo e(__('common.Delete')); ?> <?php echo e(__('payment.Payment')); ?> </h4>
                                                        <button type="button" class="close" data-dismiss="modal"><i
                                                                class="ti-close "></i></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">

                                                            <h4><?php echo e(__('common.Are you sure to delete ?')); ?> </h4>
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>

                                                            <form method="post"
                                                                  action="<?php echo e(route('bankPayment.destroy', [$payment->id])); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button class="primary-btn fix-gr-bg"
                                                                        type="submit"><?php echo e(__('common.Delete')); ?></button>
                                                            </form>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/BankPayment/Resources/views/index.blade.php ENDPATH**/ ?>