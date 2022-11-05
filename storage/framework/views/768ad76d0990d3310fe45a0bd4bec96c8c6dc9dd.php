<div>
    <style>
        .nice-select-search-box {
            display: none !important;
        }

        .nice-select.open .list {
            padding: 0 !important;
        }
    </style>
    <div class="course_category_chose  mt_10">
        <div class="course_title mb_30 d-flex align-items-center">
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="13" viewBox="0 0 19.5 13">
                    <g id="filter-icon" transform="translate(28)">
                        <rect id="Rectangle_1" data-name="Rectangle 1" width="19.5" height="2" rx="1"
                              transform="translate(-28)" fill="var(--system_primery_color)"/>
                        <rect id="Rectangle_2" data-name="Rectangle 2" width="15.5" height="2" rx="1"
                              transform="translate(-26 5.5)" fill="var(--system_primery_color)"/>
                        <rect id="Rectangle_3" data-name="Rectangle 3" width="5" height="2" rx="1"
                              transform="translate(-20.75 11)" fill="var(--system_primery_color)"/>
                    </g>
                </svg>
                <h5 class="font_16 f_w_500 mb-0"><?php echo e(__('frontend.Filter Category')); ?></h5>
            </div>
            <div class="popupClose"><i class="ti-close"></i></div>
        </div>

        <div class="course_category_inner">
            <div class="single_course_categry">
                <h4 class="font_18 f_w_700">
                    <?php echo e(__('frontend.Class Category')); ?>

                </h4>
                <ul class="Check_sidebar">
                    <?php if(isset($categories )): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <label class="primary_checkbox d-flex">
                                    <input type="checkbox" value="<?php echo e($cat->id); ?>"
                                           class="category" <?php echo e(in_array($cat->id,explode(',',$category))?'checked':''); ?>>
                                    <span class="checkmark mr_15"></span>
                                    <span class="label_name"><?php echo e($cat->name); ?></span>
                                </label>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>


                </ul>
            </div>
            <div class="single_course_categry">
                <h4 class="font_18 f_w_700">
                    <?php echo e(__('frontend.Level')); ?>

                </h4>
                <ul class="Check_sidebar">

                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <label class="primary_checkbox d-flex">
                                <input name="level" type="checkbox" value="<?php echo e($l->id); ?>"
                                       class="level" <?php echo e(in_array($l->id,explode(',',$level))?'checked':''); ?>>
                                <span class="checkmark mr_15"></span>
                                <span class="label_name"><?php echo e($l->title); ?></span>
                            </label>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </ul>
            </div>
            <div class="single_course_categry">
                <h4 class="font_18 f_w_700">
                    <?php echo e(__('frontend.Class Price')); ?>

                </h4>
                <ul class="Check_sidebar">
                    <li>
                        <label class="primary_checkbox d-flex">
                            <input type="checkbox" class="type"
                                   value="paid" <?php echo e(in_array("paid",explode(',',$type))?'checked':''); ?>>
                            <span class="checkmark mr_15"></span>
                            <span class="label_name"><?php echo e(__('frontend.Paid Class')); ?></span>
                        </label>
                    </li>
                    <li>
                        <label class="primary_checkbox d-flex">
                            <input type="checkbox" class="type"
                                   value="free" <?php echo e(in_array("free",explode(',',$type))?'checked':''); ?>>
                            <span class="checkmark mr_15"></span>
                            <span class="label_name"><?php echo e(__('frontend.Free Class')); ?></span>
                        </label>
                    </li>
                </ul>
            </div>

            <div class="single_course_categry">
                <h4 class="font_18 f_w_700">
                    <?php echo e(__('frontend.Language')); ?>

                </h4>
                <ul class="Check_sidebar">
                    <?php if(isset($languages)): ?>
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>
                                <label class="primary_checkbox d-flex">
                                    <input type="checkbox" class="language"
                                           value="<?php echo e($lang->code); ?>" <?php echo e(in_array($lang->code,explode(',',$language))?'checked':''); ?>>
                                    <span class="checkmark mr_15"></span>
                                    <span class="label_name"><?php echo e($lang->name); ?></span>
                                </label>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/class-page-section-sidebar.blade.php ENDPATH**/ ?>