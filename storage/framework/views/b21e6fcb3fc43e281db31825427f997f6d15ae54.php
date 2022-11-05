<li>
    <a href="#" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small">
            <i class="fas fa-vr-cardboard"></i>
        </div>
        <div class="nav_title">
            <span><?php echo e(__('zoom.Zoom')); ?></span>
        </div>
    </a>
    <ul>

        <?php if(permissionCheck('zoom.settings')): ?>
            <li>
                <a href="<?php echo e(route('zoom.settings')); ?>">  <?php echo e(__('zoom.Zoom Settings')); ?></a>
            </li>
        <?php endif; ?>
    </ul>
</li>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Zoom/Resources/views/menu.blade.php ENDPATH**/ ?>