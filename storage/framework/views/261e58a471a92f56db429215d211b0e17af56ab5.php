<?php
    $table_name='coupons';
?>

<?php $__env->startSection('table'); ?><?php echo e($table_name); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('coupons.Common Coupons List')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('coupons.Course')); ?></a>
                    <a class="active"
                       href="<?php echo e(route('coupons.manage')); ?>"><?php echo e(__('coupons.Common')); ?> <?php echo e(__('coupons.Coupons')); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"> <?php if(!isset($edit)): ?> <?php echo e(__('coupons.Add New Coupons')); ?> <?php else: ?> <?php echo e(__('coupons.Update Coupons')); ?> <?php endif; ?></h3>
                                    <?php if(isset($edit)): ?>
                                        <?php if(permissionCheck('coupons.common.store')): ?>
                                            <a href="<?php echo e(route('coupons.manage')); ?>"
                                               class="primary-btn small fix-gr-bg">+ <?php echo e(__('coupons.Add')); ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-box ">
                        <?php if(isset($edit)): ?>
                            <form action="<?php echo e(route('coupons.update')); ?>" method="POST" id="coupon-form" name="coupon-form"
                                  enctype="multipart/form-data">
                                <?php else: ?>
                                    <?php if(permissionCheck('coupons.common.store')): ?>
                                        <form action="<?php echo e(route('coupons.store')); ?>" method="POST" id="coupon-form"
                                              name="coupon-form" enctype="multipart/form-data">
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php echo csrf_field(); ?>
                                            <?php if(isset($edit)): ?> <input type="hidden" name="id"
                                                                     value="<?php echo e($edit->id); ?>"> <?php endif; ?>
                                            <input type="hidden" name="category" value="1">
                                            <div class="row">

                                                  input title   
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="title"><?php echo e(__('coupons.Coupon Title')); ?> <strong
                                                                class="text-danger">*</strong></label>
                                                        <input name="title" id="title"
                                                               <?php echo e($errors->has('title') ? ' autofocus' : ''); ?>

                                                               class="primary_input_field name <?php echo e(@$errors->has('title') ? ' is-invalid' : ''); ?>"
                                                               placeholder="<?php echo e(__('coupons.Coupon Title')); ?>"
                                                               type="text"
                                                               value="<?php echo e(isset($edit)?$edit->title:old('title')); ?>">
                                                        <?php if($errors->has('title')): ?>
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                            <strong><?php echo e(@$errors->first('title')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                  input Code   
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="code"><?php echo e(__('coupons.Coupon Code')); ?> <strong
                                                                class="text-danger">*</strong></label>
                                                        <input name="code" id="code"
                                                               <?php echo e($errors->has('code') ? ' autofocus' : ''); ?>

                                                               class="primary_input_field name <?php echo e($errors->has('code') ? ' is-invalid' : ''); ?>"
                                                               placeholder="<?php echo e(__('coupons.Coupon Code')); ?>" type="text"
                                                               value="<?php echo e(isset($edit)?$edit->code:old('code')); ?>">
                                                        <?php if($errors->has('code')): ?>
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                            <strong><?php echo e(@$errors->first('code')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>


                                                  input min_purchase   
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="number"><?php echo e(__('coupons.Minimum Purchase')); ?> <strong
                                                                class="text-danger">*</strong></label>
                                                        <input name="min_purchase"
                                                               <?php echo e($errors->has('min_purchase') ? ' autofocus' : ''); ?>

                                                               class="primary_input_field name <?php echo e(@$errors->has('min_purchase') ? ' is-invalid' : ''); ?>"
                                                               placeholder="<?php echo e(__('coupons.Minimum Purchase')); ?>"
                                                               type="number" id="number" min="0" step="any"
                                                               value="<?php echo e(isset($edit)?$edit->min_purchase:old('min_purchase')); ?>">
                                                        <?php if($errors->has('min_purchase')): ?>
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                            <strong><?php echo e(@$errors->first('min_purchase')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                  input Amount   
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="number2"><?php echo e(__('coupons.Maximum Discount')); ?>

                                                            <strong
                                                                class="text-danger">*</strong></label>
                                                        <input name="max_discount"
                                                               <?php echo e($errors->has('max_discount') ? ' autofocus' : ''); ?>

                                                               class="primary_input_field name <?php echo e(@$errors->has('code') ? ' is-invalid' : ''); ?>"
                                                               placeholder="<?php echo e(__('coupons.Maximum Discount')); ?>"
                                                               type="number" id="number2" min="0" step="any"
                                                               value="<?php echo e(isset($edit)?$edit->max_discount:old('max_discount')); ?>">
                                                        <?php if($errors->has('max_discount')): ?>
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                            <strong><?php echo e(@$errors->first('max_discount')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>


                                                  input Amount   
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="number3"><?php echo e(__('coupons.Amount')); ?> <strong
                                                                class="text-danger">*</strong></label>
                                                        <input name="value"
                                                               <?php echo e($errors->has('value') ? ' autofocus' : ''); ?>

                                                               class="primary_input_field name <?php echo e(@$errors->has('code') ? ' is-invalid' : ''); ?>"
                                                               placeholder="<?php echo e(__('coupons.Amount')); ?>" type="number"
                                                               id="number3" min="0" step="any"
                                                               value="<?php echo e(isset($edit)?$edit->value:old('value')); ?>">
                                                        <?php if($errors->has('value')): ?>
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                            <strong><?php echo e(@$errors->first('value')); ?></strong>
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
                                                                value="0" <?php echo e(isset($edit)?($edit->type==0?'selected':''):''); ?>><?php echo e(__('Percentage (%)')); ?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-15">
                                                        <label class="primary_input_label"
                                                               for="start_date"><?php echo e(__('coupons.Start Date')); ?></label>
                                                        <div class="primary_datepicker_input">
                                                            <div class="no-gutters input-right-icon">
                                                                <div class="col">
                                                                    <div class="">
                                                                        <input placeholder="Date"
                                                                               class="primary_input_field primary-input date form-control  <?php echo e(@$errors->has('start_date') ? ' is-invalid' : ''); ?>"
                                                                               id="start_date" type="text"
                                                                               name="start_date"
                                                                               value="<?php echo e(isset($edit)?  date('m/d/Y', strtotime(@$edit->start_date)) : date('m/d/Y')); ?>"
                                                                               autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <button class="" type="button">
                                                                    <i class="ti-calendar"></i>
                                                                </button>
                                                            </div>
                                                            <?php if($errors->has('start_date')): ?>
                                                                <span class="invalid-feedback d-block mb-10"
                                                                      role="alert">
                                                <strong><?php echo e(@$errors->first('start_date')); ?></strong>
                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                  End Date Input  
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-15">
                                                        <label class="primary_input_label"
                                                               for="end_date"><?php echo e(__('coupons.End Date')); ?></label>
                                                        <div class="primary_datepicker_input">
                                                            <div class="no-gutters input-right-icon">
                                                                <div class="col">
                                                                    <div class="">
                                                                        <input placeholder="Date"
                                                                               class="primary_input_field primary-input date form-control  <?php echo e(@$errors->has('end_date') ? ' is-invalid' : ''); ?>"
                                                                               id="end_date"
                                                                               type="text" name="end_date"
                                                                               value="<?php echo e(isset($edit)?  date('m/d/Y', strtotime(@$edit->end_date)) : date('m/d/Y')); ?>"
                                                                               autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <button class="" type="button">
                                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                                </button>
                                                            </div>
                                                            <?php if($errors->has('end_date')): ?>
                                                                <span class="invalid-feedback d-block mb-10"
                                                                      role="alert">
                                                                <strong><?php echo e(@$errors->first('end_date')); ?></strong>
                                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>


                                            <!--
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="status"><?php echo e(__('coupons.Status')); ?></label>
                                                        <select
                                                            class="primary_select mb-25  <?php echo e(@$errors->has('status') ? ' is-invalid' : ''); ?>"
                                                            name="status" id="status">
                                                            <option
                                                                value="1" <?php echo e(isset($edit)?($edit->status==1?'selected':''):''); ?>><?php echo e(__('common.Active')); ?></option>
                                                            <option
                                                                value="0" <?php echo e(isset($edit)?($edit->status==0?'selected':''):''); ?>><?php echo e(__('common.Inactive')); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
-->

                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="number4"><?php echo e(__('coupons.Limit')); ?> <strong
                                                                class="text-danger">*</strong>
                                                            <small>(<?php echo e(__('coupons.0 means unlimited')); ?>

                                                                )</small></label>
                                                        <input name="limit" required
                                                               <?php echo e($errors->has('limit') ? ' autofocus' : ''); ?>

                                                               class="primary_input_field name <?php echo e(@$errors->has('limit') ? ' is-invalid' : ''); ?>"
                                                               placeholder="<?php echo e(__('coupons.Limit')); ?>" type="number"
                                                               id="number4" min="0" step="any"
                                                               value="<?php echo e(isset($edit)?$edit->limit:old('limit',0)); ?>">
                                                        <?php if($errors->has('limit')): ?>
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                            <strong><?php echo e(@$errors->first('limit')); ?></strong>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <?php
                                                    $tooltip = "";
                                                      if (permissionCheck('coupons.common.store')){
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
                <div class="col-lg-9 ">
                    <div class="main-title">
                        <h3 class="mb-20"><?php echo e(__('coupons.Common Coupons List')); ?></h3>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col"><span class="m-3"><?php echo e(__('common.SL')); ?></span></th>
                                        <th scope="col"><?php echo e(__('coupons.Title')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Code')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Amount')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Type')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Minimum Purchase')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Maximum Discount')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Start Date')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.End Date')); ?></th>

                                        <th scope="col"><?php echo e(__('common.Used')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Limit')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><span class="m-3"><?php echo e($key+1); ?></span></th>

                                            <td><?php echo e(@$coupon->title); ?></td>
                                            <td><?php echo e(@$coupon->code); ?></td>
                                            <td><?php echo e(getPriceFormat($coupon->value)); ?></td>
                                            <td><?php echo e(@$coupon->type==1?'Fixed Amount':'%'); ?></td>
                                            <td>
                                                <label class="switch_toggle" for="active_checkbox<?php echo e(@$coupon->id); ?>">
                                                    <input type="checkbox" class="status_enable_disable"
                                                           id="active_checkbox<?php echo e(@$coupon->id); ?>"
                                                           <?php if(@$coupon->status == 1): ?> checked
                                                           <?php endif; ?> value="<?php echo e(@$coupon->id); ?>">
                                                    <i class="slider round"></i>
                                                </label>
                                            </td>
                                            <td><?php echo e(getPriceFormat($coupon->min_purchase)); ?></td>
                                            <td><?php echo e(getPriceFormat($coupon->max_discount)); ?></td>
                                            <td><?php echo e(showDate($coupon->start_date)); ?></td>
                                            <td><?php echo e(showDate($coupon->end_date)); ?></td>

                                            <td><?php echo e(@$coupon->totalUsed->count()); ?></td>
                                            <td><?php echo e(@$coupon->limit); ?></td>
                                            <td>
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2<?php echo e(@$coupon->id); ?>" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <?php echo e(__('common.Select')); ?>

                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2<?php echo e(@$coupon->id); ?>">
                                                        <?php if(permissionCheck('coupons.common.edit')): ?>
                                                            <a class="dropdown-item edit_brand"
                                                               href="<?php echo e(route('coupons.edit',$coupon->id)); ?>"><?php echo e(__('common.Edit')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(permissionCheck('coupons.common.delete')): ?>
                                                            <a onclick="confirm_modal('<?php echo e(route('coupons.delete', $coupon->id)); ?>');"
                                                               class="dropdown-item edit_brand"><?php echo e(__('common.Delete')); ?></a>
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
    <div id="edit_form">

    </div>
    <div id="view_details">

    </div>
    <input type="hidden" name="status_route" class="status_route" value="<?php echo e(route('coupons.status_update')); ?>">


    <?php echo $__env->make('backend.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('public/backend/js/category.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Coupons/Resources/views/common_coupons.blade.php ENDPATH**/ ?>