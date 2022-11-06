<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('coupons.Referral Setting')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('coupons.Course')); ?></a>
                    <a class="active" href="<?php echo e(route('coupons.manage')); ?>"><?php echo e(__('coupons.Coupons')); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <?php if(isset($edit)): ?>
                    <div class="col-lg-3">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="box_header common_table_header">
                                    <div class="main-title d-md-flex">
                                        <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"> <?php if(isset($edit)): ?> <?php echo e(__('common.Update')); ?> <?php endif; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="white-box ">

                            <?php if(permissionCheck('coupons.inviteSettings.store')): ?>
                                <form action="<?php echo e(route('coupons.inviteSettingStore')); ?>" method="POST" id="coupon-form"
                                      name="coupon-form" enctype="multipart/form-data">
                                    <?php endif; ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    <?php if(isset($edit)): ?> <input type="hidden" name="id" value="<?php echo e($edit->id); ?>"> <?php endif; ?>
                                    <input type="hidden" name="category" value="2">
                                    <div class="row">


                                          input title   
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for="max_limit"><?php echo e(__('coupons.Maximum Limit')); ?> *</label>
                                                <input name="max_limit" id="max_limit"
                                                       <?php echo e($errors->has('max_limit') ? ' autofocus' : ''); ?>

                                                       class="primary_input_field name <?php echo e(@$errors->has('max_limit') ? ' is-invalid' : ''); ?>"
                                                       placeholder="<?php echo e(__('coupons.Maximum Limit')); ?>" type="number"
                                                       step="any" min="0"
                                                       value="<?php echo e(isset($edit)?$edit->max_limit:old('max_limit')); ?>">
                                                <?php if($errors->has('max_limit')): ?>
                                                    <span class="invalid-feedback d-block mb-10" role="alert">
                                            <strong><?php echo e(@$errors->first('max_limit')); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                          input title   
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for="amount"><?php echo e(__('coupons.Amount')); ?>

                                                    *</label>
                                                <input name="amount" id="amount"
                                                       <?php echo e($errors->has('amount') ? ' autofocus' : ''); ?>

                                                       class="primary_input_field name <?php echo e(@$errors->has('amount') ? ' is-invalid' : ''); ?>"
                                                       placeholder="<?php echo e(__('coupons.Amount')); ?>" type="number" step="any"
                                                       min="0" value="<?php echo e(isset($edit)?$edit->amount:old('amount')); ?>">
                                                <?php if($errors->has('amount')): ?>
                                                    <span class="invalid-feedback d-block mb-10" role="alert">
                                            <strong><?php echo e(@$errors->first('amount')); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>


                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for="type"><?php echo e(__('coupons.Type')); ?></label>
                                                <select
                                                        class="primary_select mb-25  <?php echo e(@$errors->has('type') ? ' is-invalid' : ''); ?>"
                                                        name="type" id="type">
                                                    <option
                                                            value="1" <?php echo e(isset($edit)?($edit->type==1?'selected':''):''); ?>><?php echo e(__('Fixed')); ?></option>
                                                    <option
                                                            value="0" <?php echo e(isset($edit)?($edit->type==2?'selected':''):''); ?>><?php echo e(__('Percentage (%)')); ?></option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for="status"><?php echo e(__('coupons.Status')); ?></label>
                                                <select
                                                        class="primary_select mb-25  <?php echo e(@$errors->has('status') ? ' is-invalid' : ''); ?>"
                                                        name="status" id="status">
                                                    <option value="1"
                                                            selected <?php echo e(isset($edit)?($edit->status==1?'selected':''):''); ?>><?php echo e(__('common.Active')); ?></option>
                                                    <option
                                                            value="0" <?php echo e(isset($edit)?($edit->status==0?'selected':''):''); ?>><?php echo e(__('common.Inactive')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                            $tooltip = "";
                                              if (permissionCheck('coupons.inviteSettings.store')){
                                                  $tooltip = "";
                                              }else{
                                                  $tooltip = "You have no permission to add";
                                              }
                                        ?>
                                        <div class="col-lg-12 text-center">
                                            <div class="d-flex justify-content-center pt_20">
                                                <button type="submit" class="primary-btn semi_large fix-gr-bg"
                                                        data-toggle="tooltip" title="<?php echo e($tooltip); ?>"
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
                <?php endif; ?>
                <div class="<?php if(isset($edit)): ?>col-lg-9 <?php else: ?> col-lg-12  <?php endif; ?>">
                    <div class="main-title">
                        <h3 class="mb-20"><?php echo e(__('coupons.Referral Setting')); ?></h3>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>
                                    <tr>

                                        <th scope="col"><span class="m-3"><?php echo e(__('common.SL')); ?></span></th>
                                        <th scope="col"><?php echo e(__('role.Role')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Amount')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Type')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Maximum Limit')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Date')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $inviteSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><span class="m-3"><?php echo e($key+1); ?></span></th>
                                            <td><?php echo e(@$s->role->name); ?></td>
                                            <td><?php echo e(getPriceFormat(@$s->amount)); ?></td>
                                            <td><?php echo e(@$s->type==1?'Fixed Amount':'%'); ?></td>
                                            <td><?php echo e(getPriceFormat($s->max_limit)); ?></td>
                                            <td><?php echo e(showDate($s->created_at)); ?></td>
                                            <td>
                                                <label class="switch_toggle" for="active_checkbox<?php echo e($s->id); ?>">
                                                    <input type="checkbox" id="active_checkbox<?php echo e($s->id); ?>"
                                                           <?php if(!permissionCheck('coupons.inviteSettings.status_update')): ?> disabled
                                                           <?php endif; ?>
                                                           <?php if($s->status == 1): ?> checked <?php endif; ?> value="<?php echo e($s->id); ?>"
                                                           onchange="update_active_status(this)">
                                                    <i class="slider round"></i>
                                                </label>
                                            </td>
                                            <td>
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2<?php echo e(@$s->id); ?>" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <?php echo e(__('common.Select')); ?>

                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2<?php echo e(@$s->id); ?>">
                                                        <?php if(permissionCheck('coupons.inviteSettings.edit')): ?>
                                                            <a class="dropdown-item edit_brand"
                                                               href="<?php echo e(route('coupons.inviteSettingEdit',$s->id)); ?>"><?php echo e(__('common.Edit')); ?></a>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                                <!-- shortby  -->
                                            </td>
                                        </tr>
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
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(url('Modules/Coupons/Resources/assets/js/app.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Coupons/Resources/views/inviteSettings.blade.php ENDPATH**/ ?>