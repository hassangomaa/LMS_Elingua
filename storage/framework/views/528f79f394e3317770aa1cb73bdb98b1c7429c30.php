<?php $__env->startSection('mainContent'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box_header common_table_header">
                <div class="main-title d-md-flex">
                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('setting.Color Theme')); ?></h3>

                    <ul class="d-flex">
                        <li><a class="primary-btn radius_30px mr-10 fix-gr-bg"
                               href="<?php echo e(route('appearance.themes-customize.index')); ?>"><i
                                    class="ti-list"></i><?php echo e(__('setting.Color Theme List')); ?></a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="white_box_50px box_shadow_white">
                <?php echo Form::open(['route' => ['appearance.themes-customize.update',$editData->id], 'method' => 'put','files' => true]); ?>


                <div class="row form">
                    <div class="col-lg-3">
                        <div class="primary_input mb-15">
                            <label class="primary_input_label" for="title"><?php echo e(__('setting.Theme Title')); ?> *</label>
                            <input type="text" name="title" class="primary_input_field" id="title" required
                                   maxlength="191" autofocus value="<?php echo e($editData->name); ?>">
                            <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo e(__('setting.Themes')); ?> *</label>
                            <select class="primary_select mb-15 theme" name="theme" id="theme">
                                <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($theme->theme_name); ?>" <?php echo e($theme->theme_name==$editData->theme_name?'selected':''); ?>><?php echo e($theme->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="text-danger"><?php echo e($errors->first('theme')); ?></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="primary_input mb-15">
                            <label class="primary_input_label"
                                   for=" "><?php echo e(__('setting.Primary Color')); ?></label>
                            <input type="color" name="p_color" value="<?php echo e($editData->primary_color); ?>"
                                   class="primary_input_field color_field"
                                   required
                            >
                            <span class="text-danger"><?php echo e($errors->first('p_color')); ?></span>
                        </div>
                    </div>


                    <div class="col-lg-3">
                        <div class="primary_input mb-15">
                            <label class="primary_input_label"
                                   for=" "><?php echo e(__('setting.Secondary Color')); ?></label>
                            <input type="color" name="s_color" value="<?php echo e($editData->secondary_color); ?>"
                                   class="primary_input_field color_field"
                                   required>
                            <span class="text-danger"><?php echo e($errors->first('s_color')); ?></span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <hr>
                    </div>
                    <div class="col-lg-3">
                        <div class="primary_input mb-15">
                            <label class="primary_input_label"
                                   for=" "><?php echo e(__('setting.Footer Background Color')); ?></label>
                            <input type="color" name="footer_background_color"
                                   value="<?php echo e($editData->footer_background_color); ?>"
                                   class="primary_input_field color_field"
                                   required>
                            <span class="text-danger"><?php echo e($errors->first('footer_background_color')); ?></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="primary_input mb-15">
                            <label class="primary_input_label"
                                   for=" "><?php echo e(__('setting.Footer Headline Color')); ?></label>
                            <input type="color" name="footer_headline_color"
                                   value="<?php echo e($editData->footer_headline_color); ?>"
                                   class="primary_input_field color_field"
                                   required>
                            <span class="text-danger"><?php echo e($errors->first('footer_headline_color')); ?></span>
                        </div>
                    </div>


                    <div class="col-lg-3">
                        <div class="primary_input mb-15">
                            <label class="primary_input_label"
                                   for=" "><?php echo e(__('setting.Footer Text Color')); ?></label>
                            <input type="color" name="footer_text_color" value="<?php echo e($editData->footer_text_color); ?>"
                                   class="primary_input_field color_field"
                                   required>
                            <span class="text-danger"><?php echo e($errors->first('footer_text_color')); ?></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="primary_input mb-15">
                            <label class="primary_input_label"
                                   for=" "><?php echo e(__('setting.Footer Text Hover Color')); ?></label>
                            <input type="color" name="footer_text_hover_color"
                                   value="<?php echo e($editData->footer_text_hover_color); ?>"
                                   class="primary_input_field color_field"
                                   required>
                            <span class="text-danger"><?php echo e($errors->first('footer_text_hover_color')); ?></span>
                        </div>
                    </div>
                </div>


                <div class="row form">


                    <div class="col-12">
                        <div class="submit_btn text-center ">
                            <button class="primary-btn semi_large2 fix-gr-bg" id="reset_to_default" type="button"><i
                                    class="ti-check"></i><?php echo e(__('setting.Reset To Default')); ?>

                            </button>
                            <button class="primary-btn semi_large2 fix-gr-bg" type="submit"><i
                                    class="ti-check"></i><?php echo e(__('common.Save')); ?>

                            </button>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Appearance/Resources/views/customize/edit.blade.php ENDPATH**/ ?>