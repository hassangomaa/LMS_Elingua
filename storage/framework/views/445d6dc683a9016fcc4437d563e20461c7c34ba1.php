<li>
    <a href="#" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small">
            <i class="fas fa-money-bill-alt"></i>
        </div>
        <div class="nav_title">
            <span><?php echo e(__('payment.Payment')); ?></span>
        </div>
    </a>
    <ul>
        <?php if(permissionCheck('onlineLog')): ?>
            <li>
                <a href="<?php echo e(route('onlineLog')); ?>"><?php echo e(__('payment.Received Online')); ?></a>
            </li>
        <?php endif; ?>

        <?php if(permissionCheck('offlinePayment')): ?>
            <li>
                <a href="<?php echo e(route('offlinePayment')); ?>"><?php echo e(__('payment.Offline Payment')); ?></a>
            </li>
        <?php endif; ?>

        <?php if(permissionCheck('bankPayment.index')): ?>
            <li>
                <a href="<?php echo e(route('bankPayment.index')); ?>"><?php echo e(__('payment.Bank Payment')); ?></a>
            </li>
        <?php endif; ?>
    </ul>
</li>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Payment/Providers/../Resources/views/menu.blade.php ENDPATH**/ ?>