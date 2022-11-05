<div>
    <div class="cta_area" style="background-image: url('<?php echo e(asset(@$homeContent->instructor_banner)); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-1">
                    <div class="section__title white_text">
                        <h3 class="large_title">
                            <?php echo e(@$homeContent->instructor_title); ?>


                        </h3>
                        <p>

                            <?php echo e(@$homeContent->instructor_sub_title); ?>

                        </p>
                        <a href="<?php echo e(route('instructors')); ?>"
                           class="theme_btn"><?php echo e(__('frontend.Find Our Instructor')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/home-page-instructor-section.blade.php ENDPATH**/ ?>