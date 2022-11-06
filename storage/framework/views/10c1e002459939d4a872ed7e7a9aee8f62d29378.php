<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('payment.Offline Payment')); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('/dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?> </a>
                    <a href="#"><?php echo e(__('payment.Payment')); ?> </a>
                    <a href="#"><?php echo e(__('common.Add')); ?> <?php echo e(__('payment.Fund')); ?> </a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-between">
                <div class="col-md-12">

                    <div class="row student-details student-details_tab mt_0_sm m-0">

                        <!-- Start Sms Details -->
                        <div class="col-lg-12 p-0">
                            <ul class="nav nav-tabs no-bottom-border mt_0_sm mb-20 m-0 justify-content-start"
                                role="tablist">
                                <li class="nav-item mb-0">
                                    <a class="nav-link
                                    <?php if(Session::has('isStudent')): ?>
                                    <?php if(!Session::get('isStudent')): ?>
                                        active
                                        <?php endif; ?>
                                    <?php else: ?>
                                        active
                                    <?php endif; ?>
                                        " href="#group_email_sms" selectTab="G" role="tab"
                                       data-toggle="tab"><?php echo e(__('quiz.Instructor')); ?>  </a>
                                </li>
                                <li class="nav-item mb-0">
                                    <a class="nav-link
 <?php if(Session::has('isStudent')): ?>
                                    <?php if(Session::get('isStudent')): ?>
                                        active
                                        <?php endif; ?>
                                    <?php endif; ?>
                                        " selectTab="I" href="#indivitual_email_sms" role="tab"
                                       data-toggle="tab"><?php echo e(__('quiz.Student')); ?></a>
                                </li>


                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <input type="hidden" name="selectTab" id="selectTab">
                                <div role="tabpanel" class="tab-pane fade   <?php if(Session::has('isStudent')): ?>
                                <?php if(!Session::get('isStudent')): ?>
                                    show    active
<?php endif; ?>
                                <?php else: ?>
                                    show   active
<?php endif; ?>" id="group_email_sms">

                                    <div class="QA_section QA_section_heading_custom check_box_table mt-20">
                                        <div class="QA_table ">
                                            <table id="lms_table" class="table Crm_table_active3">
                                                <thead>
                                                <tr>
                                                    <th><?php echo e(__('common.Name')); ?></th>
                                                    <th><?php echo e(__('common.Email')); ?></th>
                                                    <th><?php echo e(__('payment.Wallet')); ?></th>
                                                    <th><?php echo e(__('common.Image')); ?></th>
                                                    <th><?php echo e(__('common.Action')); ?></th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php $__currentLoopData = $instructor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr id="<?php echo e(@$value->id); ?>">
                                                        <td><?php echo e(@$value->name); ?></td>
                                                        <td><?php echo e(@$value->email); ?></td>
                                                        <td><?php echo e($value->balance==0?0:getPriceFormat($value->balance)); ?></td>

                                                        <td valign="top">
                                                            <div class="profile_info">

                                                                <img
                                                                    alt="<?php echo e(@$value->name); ?>"
                                                                    src="<?php echo e(@$value->image ? asset(@$value->image) :asset('public/frontend/img/client_img.png')); ?>"

                                                                    class="add_fund_profile_img">
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div class="dropdown CRM_dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle"
                                                                        type="button" id="dropdownMenu2<?php echo e(@$value->id); ?>"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                    <?php echo e(__('common.Action')); ?>

                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <?php if(permissionCheck('offlinePayment.add')): ?>
                                                                        <a class="dropdown-item" data-toggle="modal"
                                                                           data-target="#AddFund<?php echo e(@$value->id); ?>"
                                                                           href="#"><?php echo e(__('common.Add')); ?>  <?php echo e(__('payment.Fund')); ?></a>
                                                                    <?php endif; ?>
                                                                    <?php if(permissionCheck('offlinePayment.deduct')): ?>
                                                                        <a class="dropdown-item" data-toggle="modal"
                                                                           data-target="#DeductFund<?php echo e(@$value->id); ?>"
                                                                           href="#"><?php echo e(__('payment.Deduct')); ?> <?php echo e(__('payment.Fund')); ?></a>
                                                                    <?php endif; ?>
                                                                    <?php if(permissionCheck('offlinePayment.fund-history')): ?>
                                                                        <a class="dropdown-item"
                                                                           href="<?php echo e(route('fundHistory',@$value->id)); ?>"> <?php echo e(__('payment.Fund History')); ?> </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                    <div class="modal fade admin-query" id="AddFund<?php echo e(@$value->id); ?>">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><?php echo e(__('common.Add')); ?> <?php echo e(__('payment.Fund')); ?></h4>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"><i
                                                                            class="ti-close "></i></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form action="<?php echo e(route('addBalance')); ?>"
                                                                          method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="row no-gutters input-right-icon">
                                                                            <div class="col">
                                                                                <div class="input-effect">
                                                                                    <label><?php echo e(__('payment.Amount')); ?>

                                                                                        <span>*</span></label>
                                                                                    <input class="primary_input_field"
                                                                                           id="fund_amount" min="0"
                                                                                           type="number"
                                                                                           placeholder="<?php echo e(__('payment.Amount')); ?> <?php echo e(Settings('currency_symbol')); ?> "
                                                                                           name="amount" value="">
                                                                                    <span class="focus-border"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" name="user_id"
                                                                               value="<?php echo e(@$value->id); ?>">


                                                                        <div
                                                                            class="mt-40 d-flex justify-content-between">
                                                                            <button type="button"
                                                                                    class="primary-btn tr-bg"
                                                                                    data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>
                                                                            <button class="primary-btn fix-gr-bg"
                                                                                    type="submit"><?php echo e(__('common.Add')); ?></button>
                                                                        </div>

                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="modal fade admin-query" id="DeductFund<?php echo e(@$value->id); ?>">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><?php echo e(__('payment.Deduct')); ?> <?php echo e(__('payment.Fund')); ?></h4>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"><i
                                                                            class="ti-close "></i></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form action="<?php echo e(route('deductBalance')); ?>"
                                                                          method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="row no-gutters input-right-icon">
                                                                            <div class="col">
                                                                                <div class="input-effect">
                                                                                    <label><?php echo e(__('payment.Amount')); ?>

                                                                                        <span>*</span></label>
                                                                                    <input class="primary_input_field"
                                                                                           id="fund_amount" min="0"
                                                                                           type="number"
                                                                                           placeholder="<?php echo e(__('payment.Amount')); ?> <?php echo e(Settings('currency_symbol')); ?> "
                                                                                           name="amount" value="">
                                                                                    <span class="focus-border"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" name="user_id"
                                                                               value="<?php echo e(@$value->id); ?>">


                                                                        <div
                                                                            class="mt-40 d-flex justify-content-between">
                                                                            <button type="button"
                                                                                    class="primary-btn tr-bg"
                                                                                    data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>
                                                                            <button class="primary-btn fix-gr-bg"
                                                                                    type="submit"><?php echo e(__('payment.Deduct')); ?></button>
                                                                        </div>

                                                                    </form>
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

                                <div role="tabpanel" class="tab-pane fade
 <?php if(Session::has('isStudent')): ?>
                                <?php if(Session::get('isStudent')): ?>
                                    show   active
<?php endif; ?>
                                <?php endif; ?>
                                    " id="indivitual_email_sms">

                                    <div class="QA_section QA_section_heading_custom check_box_table mt-20">
                                        <div class="QA_table ">
                                            <!-- table-responsive -->
                                            <table id="lms_table" class="table Crm_table_active3">
                                                <thead>
                                                <tr>
                                                    <th><?php echo e(__('common.Name')); ?></th>
                                                    <th><?php echo e(__('common.Email')); ?></th>
                                                    <th><?php echo e(__('payment.Wallet')); ?></th>
                                                    <th><?php echo e(__('common.Image')); ?></th>
                                                    <th><?php echo e(__('common.Action')); ?></th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr id="<?php echo e(@$value->id); ?>">
                                                        <td><?php echo e(@$value->name); ?></td>
                                                        <td><?php echo e(@$value->email); ?></td>
                                                        <td><?php echo e($value->balance==0?0:getPriceFormat($value->balance)); ?></td>

                                                        <td valign="top">
                                                            <div class="profile_info">

                                                                <img
                                                                    src="<?php echo e(@$value->image ? asset(@$value->image) :asset('public/frontend/img/client_img.png')); ?>"
                                                                    class="add_fund_profile_img">
                                                            </div>
                                                        </td>

                                                        <td>

                                                            <div class="dropdown CRM_dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle"
                                                                        type="button" id="dropdownMenu2<?php echo e(@$value->id); ?>"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                    <?php echo e(__('common.Action')); ?>

                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <?php if(permissionCheck('offlinePayment.add')): ?>
                                                                        <a class="dropdown-item" data-toggle="modal"
                                                                           data-target="#AddFund<?php echo e(@$value->id); ?>"
                                                                           href="#"><?php echo e(__('common.Add')); ?>  <?php echo e(__('payment.Fund')); ?></a>
                                                                    <?php endif; ?>
                                                                    <?php if(permissionCheck('offlinePayment.deduct')): ?>
                                                                        <a class="dropdown-item" data-toggle="modal"
                                                                           data-target="#DeductFund<?php echo e(@$value->id); ?>"
                                                                           href="#"><?php echo e(__('payment.Deduct')); ?> <?php echo e(__('payment.Fund')); ?></a>
                                                                    <?php endif; ?>
                                                                    <?php if(permissionCheck('offlinePayment.fund-history')): ?>
                                                                        <a class="dropdown-item"
                                                                           href="<?php echo e(route('fundHistory',@$value->id)); ?>"> <?php echo e(__('payment.Fund History')); ?> </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                    <div class="modal fade admin-query" id="AddFund<?php echo e(@$value->id); ?>">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><?php echo e(__('common.Add')); ?> <?php echo e(__('payment.Fund')); ?></h4>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"><i
                                                                            class="ti-close "></i></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form action="<?php echo e(route('addBalance')); ?>"
                                                                          method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="row no-gutters input-right-icon">
                                                                            <div class="col">
                                                                                <div class="input-effect">
                                                                                    <label><?php echo e(__('payment.Amount')); ?>

                                                                                        <span>*</span></label>
                                                                                    <input class="primary_input_field"
                                                                                           id="fund_amount" min="0"
                                                                                           type="number"
                                                                                           placeholder="<?php echo e(__('payment.Amount')); ?> <?php echo e(Settings('currency_code')); ?> "
                                                                                           name="amount" value="">
                                                                                    <span class="focus-border"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" name="user_id"
                                                                               value="<?php echo e(@$value->id); ?>">
                                                                        <div
                                                                            class="mt-40 d-flex justify-content-between">
                                                                            <button type="button"
                                                                                    class="primary-btn tr-bg"
                                                                                    data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>
                                                                            <button class="primary-btn fix-gr-bg"
                                                                                    type="submit"><?php echo e(__('common.Add')); ?></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade admin-query" id="DeductFund<?php echo e(@$value->id); ?>">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><?php echo e(__('payment.Deduct')); ?> <?php echo e(__('payment.Fund')); ?></h4>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"><i
                                                                            class="ti-close "></i></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form action="<?php echo e(route('deductBalance')); ?>"
                                                                          method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="row no-gutters input-right-icon">
                                                                            <div class="col">
                                                                                <div class="input-effect">
                                                                                    <label><?php echo e(__('payment.Amount')); ?>

                                                                                        <span>*</span></label>
                                                                                    <input class="primary_input_field"
                                                                                           id="fund_amount" min="0"
                                                                                           type="number"
                                                                                           placeholder="<?php echo e(__('payment.Amount')); ?> <?php echo e(Settings('currency_symbol')); ?> "
                                                                                           name="amount" value="">
                                                                                    <span class="focus-border"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" name="user_id"
                                                                               value="<?php echo e(@$value->id); ?>">


                                                                        <div
                                                                            class="mt-40 d-flex justify-content-between">
                                                                            <button type="button"
                                                                                    class="primary-btn tr-bg"
                                                                                    data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>
                                                                            <button class="primary-btn fix-gr-bg"
                                                                                    type="submit"><?php echo e(__('payment.Deduct')); ?></button>
                                                                        </div>

                                                                    </form>
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
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/OfflinePayment/Resources/views/fund/add_fund.blade.php ENDPATH**/ ?>