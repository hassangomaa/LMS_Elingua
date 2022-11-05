<div id="add_staff_modal">
    <div class="modal fade admin-query" id="staff_add">
        <div class="modal-dialog modal_800px modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('common.Add New')); ?> <?php echo e(__('common.Staff')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ti-close "></i>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo e(route('staffs.store')); ?>" method="POST" id="staff_addForm" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.Name')); ?></label>
                                    <input name="name" class="primary_input_field name" placeholder="<?php echo e(__('common.Name')); ?>" type="text" required>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.Staff Id')); ?></label>
                                    <input name="employee_id" class="primary_input_field name" placeholder="<?php echo e(__('common.Staff Id')); ?>" type="text" required>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.Email')); ?></label>
                                    <input name="email" class="primary_input_field name" placeholder="<?php echo e(__('common.Email')); ?>" type="email" required>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.Username')); ?></label>
                                    <input name="username" class="primary_input_field name" placeholder="<?php echo e(__('common.Username')); ?>" type="text" required>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.Password')); ?></label>
                                    <input name="password" class="primary_input_field name" placeholder="<?php echo e(__('common.Password')); ?>" type="password" required>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.Re-Password')); ?></label>
                                    <input name="confirm_password" class="primary_input_field name" placeholder="<?php echo e(__('common.Re-Password')); ?>" type="password" required>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('department.Department')); ?></label>
                                    <select class="primary_select mb-25" name="department_id" id="department_id" required>



                                        <option value="1">Department 1</option>
                                        <option value="2">Department 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('inventory.Warehouse')); ?></label>
                                    <select class="primary_select mb-25" name="warehouse_id" id="" >



                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('showroom.Showroom')); ?></label>
                                    <select class="primary_select mb-25" name="showroom_id" id="showroom_id" required>
                                        <option value="1">Showroom 1</option>
                                        <option value="2">Showroom 2</option>
                                        <option value="3">Showroom 3</option>
                                        <option value="4">Showroom 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('role.Role')); ?></label>
                                    <select class="primary_select mb-25" name="role_id" id="role_id" required>
                                        <?php $__currentLoopData = \Modules\RolePermission\Entities\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.Phone')); ?></label>
                                    <input name="phone" class="primary_input_field name" placeholder="<?php echo e(__('common.Phone')); ?>" type="tel" required>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="primary_input mb-15">
                                    <label class="primary_input_label" for=""><?php echo e(__('common.Avatar')); ?></label>
                                    <div class="primary_file_uploader">
                                        <input class="primary-input" type="text" id="placeholderFileOneName"
                                               placeholder="Browse file" readonly="">
                                        <button class="" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                   for="document_file_1"><?php echo e(__('common.Browse')); ?></label>
                                            <input type="file" class="d-none" name="photo" id="document_file_1">
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <div class="d-flex justify-content-center pt_20">
                                    <button type="submit" class="primary-btn semi_large2 fix-gr-bg" id="save_button_parent"><i class="ti-check"></i><?php echo e(__('common.Save')); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Coupons/Resources/views/create.blade.php ENDPATH**/ ?>