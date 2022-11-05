<li>
    <a href="javascript:void(0)" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small">
            <i class="fas fa-vr-cardboard"></i>
        </div>
        <div class="nav_title">
            <span><?php echo e(__('zoom.Virtual Class')); ?></span>
        </div>
    </a>
    <ul>
        <?php if(permissionCheck('virtual-class.index')): ?>
            <li><a href="<?php echo e(route('virtual-class.index')); ?>">  <?php echo e(__('virtual-class.Class List')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('virtual-class.setting')): ?>
             <li> 
                 <a href="<?php echo e(route('virtual-class.setting')); ?>">  <?php echo e(__('virtual-class.Class Setting')); ?></a> 
             </li> 
        <?php endif; ?>
    </ul>
</li>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/VirtualClass/Resources/views/menu.blade.php ENDPATH**/ ?>