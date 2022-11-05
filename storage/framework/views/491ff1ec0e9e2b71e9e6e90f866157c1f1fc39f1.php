<div>
    <div class="testmonial_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section__title text-center mb_80">
                        <h3><?php echo e(@$homeContent->testimonial_title); ?></h3>
                        <p>
                            <?php echo e(@$homeContent->testimonial_sub_title); ?>


                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testmonail_active owl-carousel">
                        <?php if(@$testimonials != ""): ?>
                            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single_testmonial">
                                    <div class="testmonial_header d-flex align-items-center">
                                        <div class="thumb profile_info ">
                                            <div class="profile_img">
                                                <div class="testimonialImage"
                                                     style="background-image: url('<?php echo e(getTestimonialImage($testimonial->image)); ?>')"></div>
                                            </div>

                                        </div>
                                        <div class="reviewer_name">
                                            <h4><?php echo e(@$testimonial->author); ?></h4>
                                            <h6><?php echo e(@$testimonial->profession); ?></h6>
                                            <div class="rate d-flex align-items-center">

                                                <?php for($i=1;$i<=$testimonial->star;$i++): ?>
                                                    <i class="fas fa-star"></i>
                                                <?php endfor; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <p> “<?php echo e(@$testimonial->body); ?>”</p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/home-page-testimonial-section.blade.php ENDPATH**/ ?>