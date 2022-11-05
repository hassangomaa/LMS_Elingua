<li>
    <a href="#" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small"><span class="fa fa-desktop"></span></div>
        <div class="nav_title"><span><?php echo e(__('frontendmanage.Frontend CMS')); ?></span></div>
    </a>
    <ul>
        <?php if(Settings('frontend_active_theme')=='compact'): ?>
            <li>
                <a href="<?php echo e(route('frontend.showTopBarSettings')); ?>"><?php echo e(__('frontendmanage.Top Bar Setting')); ?></a>
            </li>
        <?php endif; ?>

        <?php if(permissionCheck('frontend.headermenu')): ?>
            <li>
                <a href="<?php echo e(route('frontend.headermenu')); ?>"><?php echo e(__('setting.Header Menu')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(permissionCheck('frontend.menusetting')): ?>
            <li>
                <a href="<?php echo e(route('frontend.menusetting')); ?>"><?php echo e(__('setting.Menu Setting')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(permissionCheck('frontend.sliders.index')): ?>
            <li><a href="<?php echo e(route('frontend.sliders.index')); ?>"> <?php echo e(__('frontendmanage.Slider')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('frontend.sliders.setting')): ?>
            <li>
                <a href="<?php echo e(Route::has('frontend.sliders.setting')?route('frontend.sliders.setting'):''); ?>"> <?php echo e(__('frontendmanage.Slider Setting')); ?></a>
            </li>
        <?php endif; ?>

        <?php if(permissionCheck('frontend.homeContent')): ?>
            <li><a href="<?php echo e(route('frontend.homeContent')); ?>"> <?php echo e(__('frontendmanage.Home Content')); ?></a></li>
        <?php endif; ?>

        <?php if(permissionCheck('frontend.pageContent')): ?>
            <li><a href="<?php echo e(route('frontend.pageContent')); ?>"> <?php echo e(__('frontendmanage.Page Content')); ?></a></li>
        <?php endif; ?>

        <?php if(permissionCheck('frontend.privacy_policy')): ?>
            <li><a href="<?php echo e(route('frontend.privacy_policy')); ?>"> <?php echo e(__('frontendmanage.Privacy Policy')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('frontend.testimonials')): ?>
            <li><a href="<?php echo e(route('frontend.testimonials')); ?>"> <?php echo e(__('frontendmanage.Testimonials')); ?></a></li>
        <?php endif; ?>
        
        
        
        <?php if(permissionCheck('frontend.socialSetting')): ?>
            <li><a href="<?php echo e(route('frontend.socialSetting')); ?>"> <?php echo e(__('frontendmanage.Social Setting')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('frontend.AboutPage')): ?>
            <li><a href="<?php echo e(route('frontend.AboutPage')); ?>"> <?php echo e(__('frontendmanage.About')); ?></a></li>
        <?php endif; ?>


        <?php if(permissionCheck('frontend.ContactPageContent')): ?>
            <li><a href="<?php echo e(route('frontend.ContactPageContent')); ?>"> <?php echo e(__('frontendmanage.Contact Us')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('frontend.page.index')): ?>
            <li><a href="<?php echo e(route('frontend.page.index')); ?>"> <?php echo e(__('frontendmanage.Pages')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('frontend.becomeInstructor')): ?>
            <li><a href="<?php echo e(route('frontend.becomeInstructor')); ?>"> <?php echo e(__('frontendmanage.Become Instructor')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(permissionCheck('frontend.sponsors.index')): ?>
            <li><a href="<?php echo e(route('frontend.sponsors.index')); ?>"> <?php echo e(__('sponsor.Sponsors')); ?></a></li>
        <?php endif; ?>


        <?php if(permissionCheck('popup-content.index')): ?>
            <li>
                <a href="<?php echo e(route('popup-content.index')); ?>"><?php echo e(__('frontendmanage.Popup Content')); ?></a>
            </li>
        <?php endif; ?>








        <?php if(permissionCheck('frontend.loginpage.index')): ?>
            <li>
                <a href="<?php echo e(route('frontend.loginpage.index')); ?>"><?php echo e(__('frontendmanage.Login & Registration')); ?></a>
            </li>
        <?php endif; ?>

        <?php if(permissionCheck('frontend.faq.index')): ?>
            <li><a href="<?php echo e(route('frontend.faq.index')); ?>">   <?php echo e(__('subscription.FAQ')); ?></a></li>
        <?php endif; ?>
    </ul>
</li>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/FrontendManage/Resources/views/menu.blade.php ENDPATH**/ ?>