<div>
    <div class="blog_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section__title text-center mb_80">
                        <h3>
                            <?php echo e(@$homeContent->article_title); ?>

                        </h3>
                        <p>
                            <?php echo e(@$homeContent->article_sub_title); ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(isset($blogs)): ?>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 col-xl-3 col-md-6">

                            <div class="single_blog couse_wizged">
                                <a href="<?php echo e(route('blogDetails',[$blog->slug])); ?>">
                                    <div class="thumb">
                                        <div class="thumb_inner lazy"
                                             data-src="<?php echo e(file_exists($blog->thumbnail) ? asset($blog->thumbnail) : asset('public/\uploads/course_sample.png')); ?>">
                                        </div>
                                    </div>
                                </a>
                                <div class="blog_meta">
                                    <span><?php echo e($blog->user->name); ?> . <?php echo e($blog->authored_date); ?></span>
                                    <a href="<?php echo e(route('blogDetails',[$blog->slug])); ?>">
                                        <h4 class="noBrake" title="<?php echo e($blog->title); ?>"><?php echo e($blog->title); ?></h4>
                                    </a>
                                </div>
                            </div>


                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="row col-md-12">
                    <div class="col-12 text-center pt_70">
                        <a href="<?php echo e(route('blogs')); ?>"
                           class="theme_btn mb_30"><?php echo e(__('frontend.View All Articles & News')); ?></a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/home-page-blog-section.blade.php ENDPATH**/ ?>