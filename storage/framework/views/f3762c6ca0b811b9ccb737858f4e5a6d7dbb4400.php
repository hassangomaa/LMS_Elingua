<div>


    <?php if(1): ?>
        <form action="<?php echo e(route('search')); ?>">
            <div class="banner_area"
                 <?php if(isset($homeContent->slider_banner) && !empty($homeContent->slider_banner)): ?>
                 style="background-image: url('<?php echo e(asset(@$homeContent->slider_banner)); ?>')"
                <?php endif; ?>>
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-9 offset-lg-1">
                            <div class="banner_text">
                                <h3><?php echo e(@$homeContent->slider_title); ?></h3>
                                <p><?php echo e(@$homeContent->slider_text); ?></p>
                                <?php if(@$homeContent->show_banner_search_box==1): ?>
                                    <div class="input-group theme_search_field large_search_field">
                                        <div class="input-group-prepend">
                                            <button class="btn" type="button" id="button-addon2"><i
                                                    class="ti-search"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="query" class="form-control"
                                               placeholder="<?php echo e(__('frontend.Search for course, skills and Videos')); ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php else: ?>

        <div class="owl-carousel" id="bannerSlider">
            <?php if($sliders): ?>
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="banner_area" style="background-image: url(<?php echo e(asset(@$slider->image)); ?>)">
                        <div class="container">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-9 offset-lg-1">
                                    <div class="banner_text">
                                        <h3><?php echo e(@$slider->title); ?></h3>
                                        <p><?php echo e(@$slider->sub_title); ?></p>

                                        <div class="row d-flex align-items-center">
                                            <?php if($slider->btn_type1==1): ?>
                                                <?php if(!empty($slider->btn_title1)): ?>
                                                    <div class="single_slider">
                                                        <a href="<?php echo e($slider->btn_link1); ?>"
                                                           class="slider_btn_text text-center"><?php echo e($slider->btn_title1); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <div class="single_slider">
                                                    <a href="<?php echo e($slider->btn_link1); ?>">
                                                        <img
                                                            src="<?php echo e(asset($slider->btn_image1)); ?>"
                                                            alt="">

                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($slider->btn_type2==1): ?>
                                                <?php if(!empty($slider->btn_title2)): ?>
                                                    <div class="single_slider">
                                                        <a href="<?php echo e($slider->btn_link2); ?>"
                                                           class="slider_btn_text text-center"><?php echo e($slider->btn_title2); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <div class="single_slider">
                                                    <a href="<?php echo e($slider->btn_link2); ?>">
                                                        <img
                                                            src="<?php echo e(asset($slider->btn_image2)); ?>"
                                                            alt="">

                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/home-page-banner.blade.php ENDPATH**/ ?>