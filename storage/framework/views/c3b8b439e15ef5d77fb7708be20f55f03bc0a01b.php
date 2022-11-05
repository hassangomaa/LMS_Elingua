<li>
    <a href="#" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small">
            <span class="fas fa-users"></span>
        </div>
        <div class="nav_title">
            <span><?php echo e(__('instructor.Instructors')); ?></span>
        </div>
    </a>
    <ul>
        <?php if(permissionCheck('allInstructor')): ?>
            <li>
                <a href="<?php echo e(route('allInstructor')); ?>"><?php echo e(__('courses.All')); ?> <?php echo e(__('instructor.Instructors')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(permissionCheck('admin.instructor.payout') && function_exists('showEcommerce') && showEcommerce()): ?>
            <li>
                <a href="<?php echo e(route('admin.instructor.payout')); ?>"><?php echo e(__('common.Instructor Payout')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(isModuleActive('OrgInstructorPolicy') && permissionCheck('org.policy')): ?>
            <li>
                <a href="<?php echo e(route('org.policy.index')); ?>"><?php echo e(__('policy.Group')); ?> <?php echo e(__('policy.Policy')); ?>

                    <?php if(env('APP_SYNC')): ?>
                        <span class="demo_addons_sub">Addon</span>
                    <?php endif; ?>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</li>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/SystemSetting/Providers/../Resources/views/menu.blade.php ENDPATH**/ ?>