<?php if(permissionCheck('newsletter.setting')): ?>
    <li>
        <a href="#" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small"><span class="fas fa-gift"></span></div>
            <div class="nav_title"><span><?php echo e(__('newsletter.Newsletter')); ?></span></div>
        </a>
        <ul>
            <?php if(permissionCheck('newsletter.setting')): ?>
                <li>
                    <a href="<?php echo e(route('newsletter.setting')); ?>">
                        <?php echo e(__('newsletter.Setting')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('newsletter.mailchimp.setting')): ?>
                <li>
                    <a href="<?php echo e(route('newsletter.mailchimp.setting')); ?>">
                        <?php echo e(__('newsletter.Mailchimp')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('newsletter.getresponse.setting')): ?>
                <li>
                    <a href="<?php echo e(route('newsletter.getresponse.setting')); ?>">
                        <?php echo e(__('newsletter.GetResponse')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(route('newsletter.acelle.setting')); ?>">
                    <?php echo e(__('newsletter.Acelle')); ?>

                </a>
            </li>
            <?php if(permissionCheck('newsletter.subscriber')): ?>
                <li><a href="<?php echo e(route('newsletter.subscriber')); ?>"> <?php echo e(__('frontendmanage.Subscriber')); ?></a></li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Newsletter/Resources/views/menu.blade.php ENDPATH**/ ?>