<div>
    <div class="blog_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section__title text-center mb_80">
                        <h3>
                            <?php echo e(@$homeContent->home_page_faq_title); ?>

                        </h3>
                        <p>
                            <?php echo e(@$homeContent->home_page_faq_sub_title); ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="theme_according mb_100" id="accordion1">
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-header pink_bg" id="headingFour<?php echo e($key); ?>">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link text_white collapsed"
                                                data-toggle="collapse"
                                                data-target="#collapseFour<?php echo e($key); ?>"
                                                aria-expanded="false"
                                                aria-controls="collapseFour<?php echo e($key); ?>">
                                            <?php echo e($faq->question); ?>

                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseFour<?php echo e($key); ?>"
                                     aria-labelledby="headingFour<?php echo e($key); ?>"
                                     data-parent="#accordion1">
                                    <div class="card-body">
                                        <div class="curriculam_list">

                                            <div class="curriculam_single">
                                                <div class="curriculam_left">

                                                    <span><?php echo $faq->answer; ?></span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/home-page-faq.blade.php ENDPATH**/ ?>