<?php
    $route =Route::currentRouteName();

    if($route=="register"){
        $title =$page->reg_title;
        $banner =$page->reg_banner;
        $slogans1 =$page->reg_slogans1;
        $slogans2 =$page->reg_slogans2;
        $slogans3 =$page->reg_slogans3;
    }elseif($route=="login"){
        $title =$page->title;
                $banner =$page->banner;
        $slogans1 =$page->slogans1;
        $slogans2 =$page->slogans2;
        $slogans3 =$page->slogans3;

    }else{
        $title =$page->forget_title;
                $banner =$page->forget_banner;
        $slogans1 =$page->forget_slogans1;
        $slogans2 =$page->forget_slogans2;
        $slogans3 =$page->forget_slogans3;

    }
?>

<div class="login_wrapper_right">
    <div class="login_main_info">
        <h4>

            <?php echo e($title??'Welcome to Infix Learning Management System'); ?>

        </h4>
        <div class="thumb">
            <img src="<?php echo e(asset($banner??'public/frontend/infixlmstheme/img/banner/global.png')); ?>" alt="">
        </div>
        <div class="other_links">
            <span><?php echo e($slogans1?? 'Excellence.'); ?> </span>
            <span><?php echo e($slogans2?? 'Community.'); ?> </span>
            <span><?php echo e($slogans3?? 'Diversity.'); ?> </span>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/auth/login_wrapper_right.blade.php ENDPATH**/ ?>