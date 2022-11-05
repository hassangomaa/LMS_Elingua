<li>
    <a href="javascript:;" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small">
            <span class="fas fa-graduation-cap"></span>
        </div>
        <div class="nav_title">
            <span><?php echo e(__('student.Students')); ?></span>
        </div>
    </a>
    <ul>

        <?php if(permissionCheck('student.student_list')): ?>
            <li>
                <a href="<?php echo e(route('student.student_list')); ?>"><?php echo e(__('student.Students List')); ?></a>
            </li>
        <?php endif; ?>

        <?php if(permissionCheck('regular_student_import') && !isModuleActive('Org')): ?>
            <li>
                <a href="<?php echo e(route('regular_student_import')); ?>"><?php echo e(__('student.Regular Student Import')); ?></a>
            </li>
        <?php endif; ?>

        <?php if(isModuleActive('Org') && permissionCheck('org.branch')): ?>
            <li>
                <a href="<?php echo e(route('org.branch')); ?>"><?php echo e(__('org.Branch')); ?>

                    <?php if(env('APP_SYNC')): ?>
                        <span class="demo_addons_sub">Addon</span>
                    <?php endif; ?>
                </a>
            </li>
        <?php endif; ?>
        <?php if(isModuleActive('Org') && permissionCheck('org.position')): ?>
            <li>
                <a href="<?php echo e(route('org.position')); ?>"><?php echo e(__('org.Position')); ?>

                    <?php if(env('APP_SYNC')): ?>
                        <span class="demo_addons_sub">Addon</span>
                    <?php endif; ?>
                </a>
            </li>
        <?php endif; ?>
        <?php if(permissionCheck('student.new_enroll') && !isModuleActive('Org')): ?>
            <li>
                <a href="<?php echo e(route('student.new_enroll')); ?>"><?php echo e(__('student.New Enroll')); ?></a>
            </li>
        <?php endif; ?>


        <?php if(permissionCheck('student.student_field')): ?>
            <li>
                <a href="<?php echo e(route('student.student_field')); ?>"><?php echo e(__('student.Settings')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(isModuleActive('TeachOffline')): ?>
            <li>
                <a href="<?php echo e(route('offline.student_list')); ?>"><?php echo e(__('student.Offline Student')); ?>

                    <?php if(env('APP_SYNC')): ?>
                        <span class="demo_addons_sub">Addon</span>
                    <?php endif; ?>
                </a>
            </li>
        <?php endif; ?>

        <?php if(permissionCheck('admin.enrollLogs')  && !isModuleActive('Org')): ?>
            <li>
                <a href="<?php echo e(route('admin.enrollLogs')); ?>"><?php echo e(__('student.Enrolled Student')); ?></a>
            </li>
        <?php endif; ?>


    </ul>
</li>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/StudentSetting/Providers/../Resources/views/menu.blade.php ENDPATH**/ ?>