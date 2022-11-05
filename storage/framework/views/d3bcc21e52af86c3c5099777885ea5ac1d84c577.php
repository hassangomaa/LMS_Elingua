<li>
    <a href="javascript:;" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small"><span class="fas fa-gift"></span></div>
        <div class="nav_title"><span><?php echo e(__('coupons.Coupons')); ?></span></div>
    </a>
    <ul>
        <?php if(permissionCheck('coupons.manage')): ?>
            <li><a href="<?php echo e(route('coupons.manage')); ?>"><?php echo e(__('coupons.Coupons List')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('coupons.common')): ?>
            <li><a href="<?php echo e(route('coupons.common')); ?>"><?php echo e(__('coupons.Common Coupons')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('coupons.single')): ?>
            <li><a href="<?php echo e(route('coupons.single')); ?>"><?php echo e(__('coupons.Single Coupons')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('coupons.personalized')): ?>
            <li><a href="<?php echo e(route('coupons.personalized')); ?>"><?php echo e(__('coupons.Personalized Coupons')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('coupons.invite_code')): ?>
            <li><a href="<?php echo e(route('coupons.invite_code')); ?>"><?php echo e(__('coupons.Invite By Code')); ?></a></li>
        <?php endif; ?>

    </ul>
</li>


<?php if(permissionCheck('coupons.inviteSettings')): ?>
    <li>
        <a href="<?php echo e(route('coupons.inviteSettings')); ?>" aria-expanded="false">
            <div class="nav_icon_small"><span class="fas fa-gifts"></span></div>
            <div class="nav_title"><span><?php echo e(__('coupons.Referral Setting')); ?></span></div>
        </a>
    </li>
<?php endif; ?>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Coupons/Resources/views/menu.blade.php ENDPATH**/ ?>