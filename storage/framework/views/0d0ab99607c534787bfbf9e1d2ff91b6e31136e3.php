<?php
    if (isModuleActive('Org')){
        $ignore =[
            'regular_student_import',
            'student.new_enroll',
            'student.student_field'
];
        $subMenus =$SubMenuList->where('parent_route',$Module->route)->whereNotIn('route',$ignore);

    }else{
            $subMenus =$SubMenuList->where('parent_route',$Module->route);

    }
?>

<div class="single_role_blocks">
    <div class="single_permission" id="<?php echo e($Module->id); ?>">
        <div class="permission_header d-flex align-items-center justify-content-between">
            <div>
                <input type="checkbox" name="module_id[]" value="<?php echo e($Module->id); ?>" id="Main_Module_<?php echo e($key); ?>"
                       class="common-radio permission-checkAll main_module_id_<?php echo e($Module->id); ?>" <?php echo e($role->permissions->contains('id',$Module->id) ? 'checked' : ''); ?> >
                <label for="Main_Module_<?php echo e($key); ?>"><?php echo e($Module->name); ?></label>
            </div>
            <?php if(count($subMenus)!=0): ?>
                <div class="arrow collapsed" data-toggle="collapse" data-target="#Role<?php echo e($Module->id); ?>"></div>
            <?php endif; ?>
        </div>

        <div id="Role<?php echo e($Module->id); ?>" class="collapse">
            <div class="permission_body">
                <ul>
                    <?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SubMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="submodule">
                                <input id="Sub_Module_<?php echo e($SubMenu->id); ?>" name="module_id[]" value="<?php echo e($SubMenu->id); ?>"
                                       class="infix_csk common-radio  module_id_<?php echo e($Module->id); ?> module_link"
                                       <?php echo e($role->permissions->contains('id',$SubMenu->id) ? 'checked' : ''); ?>  type="checkbox">

                                <label for="Sub_Module_<?php echo e($SubMenu->id); ?>"><?php echo e($SubMenu->name); ?></label>
                                <br>
                            </div>

                            <ul class="option">
                                <?php $__currentLoopData = $ActionList->where('parent_route',$SubMenu->route); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="module_link_option_div" id="<?php echo e($SubMenu->id); ?>">
                                            <input id="Option_<?php echo e($action->id); ?>" name="module_id[]"
                                                   value="<?php echo e($action->id); ?>"
                                                   class="infix_csk common-radio module_id_<?php echo e($Module->id); ?> module_option_<?php echo e($Module->id); ?>_<?php echo e($SubMenu->id); ?> module_link_option"
                                                   <?php echo e($role->permissions->contains('id',$action->id) ? 'checked' : ''); ?>  type="checkbox">
                                            <label for="Option_<?php echo e($action->id); ?>"><?php echo e($action->name); ?></label>
                                            <br>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/RolePermission/Resources/views/page-components/permissionModule.blade.php ENDPATH**/ ?>