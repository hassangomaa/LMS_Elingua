<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('coupons.Invite By Code')); ?></h1>
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
                <div class="col-lg-3" style="display: none">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"> <?php if(!isset($edit)): ?> <?php echo e(__('coupons.Add New Invite By Code')); ?> <?php else: ?> <?php echo e(__('coupons.Update Invite By Code')); ?> <?php endif; ?></h3>
                                    <?php if(isset($edit)): ?> <a href="<?php echo e(route('coupons.manage')); ?>"
                                                         class="primary-btn small fix-gr-bg">+ <?php echo e(__('coupons.Add')); ?></a> <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-box ">
                        <form action="<?php echo e(isset($edit)?route('coupons.update'): route('coupons.store')); ?>" method="POST"
                              id="coupon-form" name="coupon-form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(isset($edit)): ?> <input type="hidden" name="id" value="<?php echo e($edit->id); ?>"> <?php endif; ?>
                            <input type="hidden" name="category" value="2">
                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                               for="category_id"><?php echo e(__('coupons.Select A Category')); ?></label>
                                        <select
                                            class="primary_select mb-25  <?php echo e(@$errors->has('category_id') ? ' is-invalid' : ''); ?>"
                                            name="category_id" id="category_id" required>
                                            <option data-display="<?php echo e(__('coupons.Select A Category')); ?>"
                                                    value=""><?php echo e(__('coupons.Select A Category')); ?></option>
                                            <?php if(@$categories->count()>0): ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                        value="<?php echo e(@$category->id); ?>" <?php echo e(isset($edit)?($edit->type==$category->id?'selected':''):''); ?>><?php echo e(@$category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <?php if($errors->has('category_id')): ?>
                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                <strong><?php echo e(@$errors->first('category_id')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="col-xl-12">
                                    <div class="primary_input mb-25" id="subCategoryDiv">
                                        <label class="primary_input_label"
                                               for="subcategory_id"><?php echo e(__('coupons.Select A Subcategory')); ?></label>
                                        <select
                                            class="primary_select mb-25  <?php echo e(@$errors->has('subcategory_id') ? ' is-invalid' : ''); ?>"
                                            name="subcategory_id" id="subcategory_id" required>
                                            <option data-display="<?php echo e(__('coupons.Select A Subcategory')); ?>"
                                                    value=""><?php echo e(__('coupons.Select A Subcategory')); ?></option>
                                        </select>
                                        <?php if($errors->has('subcategory_id')): ?>
                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                <strong><?php echo e(@$errors->first('subcategory_id')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="col-xl-12">
                                    <div class="primary_input mb-25" id="CourseDiv">
                                        <label class="primary_input_label"
                                               for="course_id"><?php echo e(__('coupons.Select A Course')); ?></label>
                                        <select
                                            class="primary_select mb-25  <?php echo e(@$errors->has('course_id') ? ' is-invalid' : ''); ?>"
                                            name="course_id" id="course_id" required>
                                            <option data-display="<?php echo e(__('coupons.Select A Course')); ?>"
                                                    value=""><?php echo e(__('coupons.Select A Course')); ?></option>
                                        </select>
                                        <?php if($errors->has('course_id')): ?>
                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                            <strong><?php echo e(@$errors->first('course_id')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                               for="role_id"><?php echo e(__('coupons.Select A Role')); ?></label>
                                        <select
                                            class="primary_select mb-25  <?php echo e(@$errors->has('role_id') ? ' is-invalid' : ''); ?>"
                                            name="role_id" id="role_id" required>
                                            <option data-display="<?php echo e(__('coupons.Select A role')); ?>"
                                                    value=""><?php echo e(__('coupons.Select A role')); ?></option>
                                            <?php if(@$roles->count()>0): ?>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                        value="<?php echo e(@$role->id); ?>" <?php echo e(isset($edit)?($edit->type==$role->id?'selected':''):''); ?>><?php echo e(@$role->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <?php if($errors->has('role_id')): ?>
                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                <strong><?php echo e(@$errors->first('role_id')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                  input title   
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                               for="number"><?php echo e(__('coupons.Maximum Limit')); ?></label>
                                        <input name="max_limit" id="max_limit"
                                               class="primary_input_field name <?php echo e(@$errors->has('max_limit') ? ' is-invalid' : ''); ?>"
                                               placeholder="<?php echo e(__('coupons.Maximum Limit')); ?>" type="number" step="any"
                                               min="0" value="<?php echo e(isset($edit)?$edit->max_limit:old('max_limit')); ?>">
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
                                               for="number2"><?php echo e(__('coupons.Amount')); ?></label>
                                        <input name="amount" id="amount"
                                               class="primary_input_field name <?php echo e(@$errors->has('amount') ? ' is-invalid' : ''); ?>"
                                               placeholder="<?php echo e(__('coupons.Amount')); ?>" type="number2" step="any"
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
                                        <label class="primary_input_label" for="type"><?php echo e(__('coupons.Type')); ?></label>
                                        <select
                                            class="primary_select mb-25  <?php echo e(@$errors->has('type') ? ' is-invalid' : ''); ?>"
                                            name="type" id="type" required>
                                            <option
                                                value="1" <?php echo e(isset($edit)?($edit->type==1?'selected':''):''); ?>><?php echo e(__('Fixed')); ?></option>
                                            <option
                                                value="0" <?php echo e(isset($edit)?($edit->type==0?'selected':''):''); ?>><?php echo e(__('Percentage (%)')); ?></option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                               for="status"><?php echo e(__('coupons.Status')); ?></label>
                                        <select
                                            class="primary_select mb-25  <?php echo e(@$errors->has('status') ? ' is-invalid' : ''); ?>"
                                            name="status" id="status" required>
                                            <option
                                                value="1" <?php echo e(isset($edit)?($edit->status==1?'selected':''):''); ?>><?php echo e(__('common.Active')); ?></option>
                                            <option
                                                value="0" <?php echo e(isset($edit)?($edit->status==0?'selected':''):''); ?>><?php echo e(__('common.Inactive')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div class="d-flex justify-content-center pt_20">
                                        <button type="submit" class="primary-btn semi_large fix-gr-bg"
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
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-20"><?php echo e(__('coupons.Invite By Code')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>
                                    <tr>

                                        <th scope="col"><?php echo e(__('common.SL')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Invited By')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Invite Accept By')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Invite Code')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Category')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Subcategory')); ?></th>
                                        <th scope="col"><?php echo e(__('coupons.Course')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Date')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $user_wise_coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($key+1); ?></th>
                                            <td><?php echo e(@$s->invite_byF->name); ?></td>
                                            <td><?php echo e(@$s->invite_accept_byF->name); ?></td>
                                            <td><?php echo e(@$s->invite_code); ?></td>
                                            <td><?php echo e(@$s->category->name); ?></td>
                                            <td><?php echo e(@$s->subCategory->name); ?></td>
                                            <td><?php echo e(@$s->course->title); ?></td>
                                            <td><?php echo e(showDate($s->created_at)); ?></td>

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


    <?php echo $__env->make('backend.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(url('Modules/Coupons/Resources/assets/js/app.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Coupons/Resources/views/invitebyCode.blade.php ENDPATH**/ ?>