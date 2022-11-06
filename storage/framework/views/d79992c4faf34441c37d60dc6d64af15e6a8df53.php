<form enctype="multipart/form-data" id="<?php echo e($form_id); ?>">
    <div class="row">
        <input type="hidden" name="id" id="item_id">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label"
                       for=""><?php echo e(__('common.Name')); ?> *</label>
                <input name="name" class="primary_input_field name"
                       id="name" placeholder="<?php echo e(__('common.Name')); ?>"
                       type="text" required="1">
                <span class="text-danger" id="name_error"></span>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for=""><?php echo e(__('leave.Department Head')); ?> </label>
                <select class="primary_select mb-25" name="user_id" id="user_id">
                    <option value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('leave.Department Head')); ?> </option>
                    <?php $__currentLoopData = \Modules\SystemSetting\Entities\Staff::whereHas('user',function ($q){$q->where('status',1);})->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label"
                       for=""><?php echo e(__('common.Details')); ?> </label>
                <input name="details" class="primary_input_field name"
                       id="details" placeholder="<?php echo e(__('common.Details')); ?>"
                       type="text">
                <span class="text-danger" id="name_error"></span>
            </div>
        </div>

        <div class="col-lg-12 text-center">
            <div class="d-flex justify-content-center pt_20">
                <button type="submit" class="primary-btn semi_large2 fix-gr-bg"><i
                        class="ti-check"></i>
                    <?php echo e($button_level_name); ?>

                </button>
            </div>
        </div>

    </div>
</form>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/SystemSetting/Providers/../Resources/views/department/components/form.blade.php ENDPATH**/ ?>