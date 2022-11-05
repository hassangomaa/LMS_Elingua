<div>
    <?php if(isset($social_links)): ?>
        <?php $__currentLoopData = $social_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a target="_blank" href="<?php echo e($social->link); ?>" class=""
                   title="<?php echo e($social->name); ?>"><i
                        class="<?php echo e($social->icon); ?>"></i></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/footer-social-links.blade.php ENDPATH**/ ?>