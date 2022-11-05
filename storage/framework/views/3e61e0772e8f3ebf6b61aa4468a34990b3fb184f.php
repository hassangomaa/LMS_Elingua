<li>
    <a href="#" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small">
            <i class="fas fa-award"></i>
        </div>
        <div class="nav_title">
            <span><?php echo e(__('certificate.Certificates')); ?></span>
        </div>
    </a>

    <ul>

        <?php if(permissionCheck('certificate.index')): ?>
            <li>
                <a href="<?php echo e(route('certificate.index')); ?>"><?php echo e(__('certificate.Certificates')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(permissionCheck('certificate.create')): ?>
            <li>
                <a href="<?php echo e(route('certificate.create')); ?>"><?php echo e(__('certificate.New Certificate')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(permissionCheck('certificate.fonts')): ?>
            <li>
                <a href="<?php echo e(route('certificate.fonts')); ?>"><?php echo e(__('certificate.Fonts')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(isModuleActive('InstructorCertificate')): ?>
            <?php if(permissionCheck('instructorcertificate.list')): ?>
                <li>
                    <a href="<?php echo e(route('instructorcertificate.list')); ?>"><?php echo e(__('certificate.Student')); ?> <?php echo e(__('certificate.Certificates')); ?>

                        <?php if(env('APP_SYNC')): ?>
                            <span class="demo_addons_sub">Addon</span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
</li>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Certificate/Resources/views/menu.blade.php ENDPATH**/ ?>