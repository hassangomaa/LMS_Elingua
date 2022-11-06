<?php $__env->startSection('table'); ?>
    <?php
        $table_name='sliders';
    ?>
    <?php echo e($table_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>


    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('frontendmanage.Slider List')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('frontendmanage.Frontend CMS')); ?></a>
                    <a class="active" href="<?php echo e(route('frontend.sliders.index')); ?>"><?php echo e(__('frontendmanage.Sliders')); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex mb-0">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"> <?php if(!isset($slider)): ?> <?php echo e(__('frontendmanage.Add New Slider')); ?> <?php else: ?> <?php echo e(__('common.Update')); ?> <?php endif; ?></h3>
                                    <?php if(isset($slider)): ?>

                                            <a href="<?php echo e(route('frontend.sliders.index')); ?>"
                                               class="primary-btn small fix-gr-bg ml-3 "
                                               style="position: absolute;  right: 0;   margin-right: 15px;"
                                               title="<?php echo e(__('coupons.Add')); ?>">+ </a>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-box ">
                        <?php if(isset($slider)): ?>
                            <form action="<?php echo e(route('frontend.sliders.update')); ?>" method="POST" id="coupon-form"
                                  name="coupon-form"
                                  enctype="multipart/form-data"><?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($slider->id); ?>">
                                <?php else: ?>
                                        <form action="<?php echo e(route('frontend.sliders.store')); ?>" method="POST"
                                              id="coupon-form"
                                              name="coupon-form" enctype="multipart/form-data">

                                            <?php endif; ?>
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <?php if(!isModuleActive('Org')): ?>
                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                   for=""><?php echo e(__('common.Title')); ?></label>
                                                            <input name="title" id="title"
                                                                   class="primary_input_field name <?php echo e(@$errors->has('title') ? ' is-invalid' : ''); ?>"
                                                                   placeholder="<?php echo e(__('frontendmanage.Title')); ?>"
                                                                   type="text"
                                                                   value="<?php echo e(isset($slider)?$slider->title:old('title')); ?>" <?php echo e($errors->has('title') ? 'autofocus' : ''); ?>>
                                                            <?php if($errors->has('title')): ?>
                                                                <span class="invalid-feedback d-block mb-10"
                                                                      role="alert">
                                                            <strong><?php echo e(@$errors->first('title')); ?></strong>
                                                        </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                   for=""><?php echo e(__('common.Sub Title')); ?></label>
                                                            <input name="sub_title" id="sub_title"
                                                                   class="primary_input_field name <?php echo e(@$errors->has('sub_title') ? ' is-invalid' : ''); ?>"
                                                                   placeholder="<?php echo e(__('frontendmanage.Sub Title')); ?>"
                                                                   type="text"
                                                                   value="<?php echo e(isset($slider)?$slider->sub_title:old('sub_title')); ?>" <?php echo e($errors->has('sub_title') ? 'autofocus' : ''); ?>>
                                                            <?php if($errors->has('sub_title')): ?>
                                                                <span class="invalid-feedback d-block mb-10"
                                                                      role="alert">
                                                            <strong><?php echo e(@$errors->first('sub_title')); ?></strong>
                                                        </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-lg-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for=""><?php echo e(__('frontendmanage.Image')); ?>*
                                                            <small>(<?php echo e(__('common.Recommended Size')); ?> 1920x900)</small>
                                                        </label>
                                                        <div class="primary_file_uploader">
                                                            <input class="primary-input filePlaceholder" type="text"
                                                                   placeholder="<?php echo e(isset($slider) && $slider->image ? showPicName($slider->image) :__('virtual-class.Browse Image file')); ?>"
                                                                   readonly="" <?php echo e($errors->has('image') ? ' autofocus' : ''); ?>>
                                                            <button class="" type="button">
                                                                <label class="primary-btn small fix-gr-bg"
                                                                       for="document_file1"><?php echo e(__('common.Browse')); ?></label>
                                                                <input type="file"
                                                                       class="d-none fileUpload" name="image"
                                                                       id="document_file1">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if(!isModuleActive('Org')): ?>
                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                   for=""><?php echo e(__('frontendmanage.Button Type')); ?>

                                                                (1)</label>
                                                            <div class="row">
                                                                <div class="col-md-4 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12 "
                                                                           for="btn_type11">
                                                                        <input type="radio"
                                                                               class="common-radio "
                                                                               id="btn_type11"
                                                                               name="btn_type1"
                                                                               <?php echo e(isset($slider)?$slider->btn_type1==1?'checked':'':'checked'); ?>

                                                                               value="1">
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('common.Text')); ?>

                                                                    </label>
                                                                </div>
                                                                <div class="col-md-4 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12 "
                                                                           for="btn_type12">
                                                                        <input type="radio"
                                                                               class="common-radio"
                                                                               id="btn_type12"
                                                                               name="btn_type1"
                                                                               <?php echo e(isset($slider)?$slider->btn_type1==0?'checked':'':''); ?>

                                                                               value="0">
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('common.Image')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-12" id="btn_title1">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                   for=""><?php echo e(__('frontendmanage.Button Title')); ?>

                                                                (1)</label>
                                                            <input name="btn_title1" id="btn_title1"
                                                                   class="primary_input_field name <?php echo e(@$errors->has('btn_title1') ? ' is-invalid' : ''); ?>"
                                                                   placeholder="<?php echo e(__('frontendmanage.Button Title')); ?>"
                                                                   type="text"
                                                                   value="<?php echo e(isset($slider)?$slider->btn_title1:old('btn_title1')); ?>" <?php echo e($errors->has('btn_title1') ? 'autofocus' : ''); ?>>
                                                            <?php if($errors->has('btn_title1')): ?>
                                                                <span class="invalid-feedback d-block mb-10"
                                                                      role="alert">
                                                            <strong><?php echo e(@$errors->first('btn_title1')); ?></strong>
                                                        </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-12" id="btn_image1">
                                                        <label class="primary_input_label"
                                                               for=""><?php echo e(__('frontendmanage.Button Image')); ?>

                                                            (1)</label>
                                                        <div class="primary_file_uploader mb-25">
                                                            <input class="primary-input filePlaceholder" type="text"
                                                                   placeholder="<?php echo e(isset($slider) && $slider->btn_image1 ? showPicName($slider->btn_image1) :__('virtual-class.Browse Image file')); ?>"
                                                                   readonly="" <?php echo e($errors->has('image') ? ' autofocus' : ''); ?>>
                                                            <button class="" type="button">
                                                                <label class="primary-btn small fix-gr-bg"
                                                                       for="btn_image_1"><?php echo e(__('common.Browse')); ?></label>
                                                                <input type="file"
                                                                       class="d-none fileUpload" name="btn_image1"
                                                                       id="btn_image_1">
                                                            </button>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                   for=""><?php echo e(__('frontendmanage.Button Link')); ?>

                                                                (1)</label>
                                                            <input name="btn_link1" id="btn_link1"
                                                                   class="primary_input_field name <?php echo e(@$errors->has('btn_link1') ? ' is-invalid' : ''); ?>"
                                                                   placeholder="<?php echo e(__('frontendmanage.Button Link')); ?>"
                                                                   type="text"
                                                                   value="<?php echo e(isset($slider)?$slider->btn_link1:old('btn_link1')); ?>" <?php echo e($errors->has('btn_link1') ? 'autofocus' : ''); ?>>
                                                            <?php if($errors->has('btn_link1')): ?>
                                                                <span class="invalid-feedback d-block mb-10"
                                                                      role="alert">
                                                            <strong><?php echo e(@$errors->first('btn_link1')); ?></strong>
                                                        </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                   for=""><?php echo e(__('frontendmanage.Button Type')); ?>

                                                                (2)</label>
                                                            <div class="row">
                                                                <div class="col-md-4 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12 "
                                                                           for="btn_type21">
                                                                        <input type="radio"
                                                                               class="common-radio "
                                                                               id="btn_type21"
                                                                               name="btn_type2"
                                                                               <?php echo e(isset($slider)?$slider->btn_type2==1?'checked':'':'checked'); ?>

                                                                               value="1">
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('common.Text')); ?>

                                                                    </label>
                                                                </div>
                                                                <div class="col-md-4 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12 "
                                                                           for="btn_type22">
                                                                        <input type="radio"
                                                                               class="common-radio "
                                                                               id="btn_type22"
                                                                               name="btn_type2"
                                                                               <?php echo e(isset($slider)?$slider->btn_type2==0?'checked':'':''); ?>

                                                                               value="0">
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('common.Image')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12" id="btn_title2">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                   for=""><?php echo e(__('frontendmanage.Button Title')); ?>

                                                                (2)</label>
                                                            <input name="btn_title2" id="btn_title2"
                                                                   class="primary_input_field name <?php echo e(@$errors->has('btn_title2') ? ' is-invalid' : ''); ?>"
                                                                   placeholder="<?php echo e(__('frontendmanage.Button Title')); ?>"
                                                                   type="text"
                                                                   value="<?php echo e(isset($slider)?$slider->btn_title2:old('btn_title2')); ?>" <?php echo e($errors->has('btn_title2') ? 'autofocus' : ''); ?>>
                                                            <?php if($errors->has('btn_title2')): ?>
                                                                <span class="invalid-feedback d-block mb-10"
                                                                      role="alert">
                                                            <strong><?php echo e(@$errors->first('btn_title2')); ?></strong>
                                                        </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12" id="btn_image2">
                                                        <label class="primary_input_label"
                                                               for=""><?php echo e(__('frontendmanage.Button Image')); ?>

                                                            (2)</label>
                                                        <div class="primary_file_uploader mb-25">
                                                            <input class="primary-input filePlaceholder" type="text"
                                                                   placeholder="<?php echo e(isset($slider) && $slider->btn_image2 ? showPicName($slider->btn_image2) :__('virtual-class.Browse Image file')); ?>"
                                                                   readonly="" <?php echo e($errors->has('image') ? ' autofocus' : ''); ?>>
                                                            <button class="" type="button">
                                                                <label class="primary-btn small fix-gr-bg"
                                                                       for="btn_image_2"><?php echo e(__('common.Browse')); ?></label>
                                                                <input type="file"
                                                                       class="d-none fileUpload" name="btn_image2"
                                                                       id="btn_image_2">
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                   for=""><?php echo e(__('frontendmanage.Button Link')); ?>

                                                                (2)</label>
                                                            <input name="btn_link2" id="btn_link2"
                                                                   class="primary_input_field name <?php echo e(@$errors->has('btn_link2') ? ' is-invalid' : ''); ?>"
                                                                   placeholder="<?php echo e(__('frontendmanage.Button Link')); ?>"
                                                                   type="text"
                                                                   value="<?php echo e(isset($slider)?$slider->btn_link2:old('btn_link2')); ?>" <?php echo e($errors->has('btn_link2') ? 'autofocus' : ''); ?>>
                                                            <?php if($errors->has('btn_link2')): ?>
                                                                <span class="invalid-feedback d-block mb-10"
                                                                      role="alert">
                                                            <strong><?php echo e(@$errors->first('btn_link2')); ?></strong>
                                                        </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>


                                                <div class="col-lg-12 text-center">
                                                    <div class="d-flex justify-content-center pt_20">
                                                        <button type="submit" class="primary-btn semi_large fix-gr-bg"
                                                                id="save_button_parent">
                                                            <i class="ti-check"></i>
                                                            <?php if(!isset($slider)): ?> <?php echo e(__('common.Save')); ?> <?php else: ?> <?php echo e(__('common.Update')); ?> <?php endif; ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                    </div>
                </div>
                <div class="col-lg-9 ">
                    <div class="main-title">
                        <h3 class="mb-20"><?php echo e(__('frontendmanage.Slider List')); ?></h3>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('common.SL')); ?></th>
                                        <?php if(!isModuleActive('Org')): ?>
                                            <th scope="col"><?php echo e(__('common.Title')); ?></th>
                                            <th scope="col"><?php echo e(__('common.Sub Title')); ?></th>
                                        <?php endif; ?>
                                        <th scope="col"><?php echo e(__('common.Image')); ?></th>
                                        <?php if(!isModuleActive('Org')): ?>
                                            <th scope="col"><?php echo e(__('common.Type')); ?>(1)</th>

                                            <th scope="col"><?php echo e(__('frontendmanage.Button Title')); ?>(1)</th>
                                            <th scope="col"><?php echo e(__('frontendmanage.Button Link')); ?>(1)</th>
                                            <th scope="col"><?php echo e(__('frontendmanage.Button Image')); ?>(1)</th>

                                            <th scope="col"><?php echo e(__('common.Type')); ?>(2)</th>
                                            <th scope="col"><?php echo e(__('frontendmanage.Button Title')); ?>(2)</th>
                                            <th scope="col"><?php echo e(__('frontendmanage.Button Link')); ?>(2)</th>
                                            <th scope="col"><?php echo e(__('frontendmanage.Button Image')); ?>(2)</th>
                                        <?php endif; ?>
                                        <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><span class="m-3"><?php echo e($key+1); ?></span></th>
                                            <?php if(!isModuleActive('Org')): ?>
                                                <td><?php echo e(@$slider->title); ?></td>
                                                <td><?php echo e(@$slider->sub_title); ?></td>
                                            <?php endif; ?>
                                            <td>
                                                <div>
                                                    <img style="max-width: 100px" src="<?php echo e(asset(@$slider->image)); ?>"
                                                         alt=""
                                                         class="img img-responsive m-2">
                                                </div>
                                            </td>
                                            <?php if(!isModuleActive('Org')): ?>
                                                <td><?php echo e(@$slider->btn_type1==1?'Text':'Image'); ?></td>
                                                <td><?php echo e(@$slider->btn_title1); ?></td>
                                                <td><?php echo e(@$slider->btn_link1); ?></td>
                                                <td>
                                                    <div>
                                                        <img style="max-width: 70px"
                                                             src="<?php echo e(asset(@$slider->btn_image1)); ?>"
                                                             alt=""
                                                             class="img img-responsive m-2">
                                                    </div>
                                                </td>
                                                <td><?php echo e(@$slider->btn_type2==1?'Text':'Image'); ?></td>
                                                <td><?php echo e(@$slider->btn_title2); ?></td>
                                                <td><?php echo e(@$slider->btn_link2); ?></td>
                                                <td>
                                                    <div>
                                                        <img style="max-width: 70px"
                                                             src="<?php echo e(asset(@$slider->btn_image2)); ?>"
                                                             alt=""
                                                             class="img img-responsive m-2">
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                            <td>
                                                <label class="switch_toggle" for="active_checkbox<?php echo e(@$slider->id); ?>">
                                                    <input type="checkbox" class="status_enable_disable"
                                                           id="active_checkbox<?php echo e(@$slider->id); ?>"
                                                           <?php if(@$slider->status == 1): ?> checked
                                                           <?php endif; ?> value="<?php echo e(@$slider->id); ?>">
                                                    <i class="slider round"></i>
                                                </label>
                                            </td>
                                            <td>
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <?php echo e(__('common.Select')); ?>

                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">

                                                            <a class="dropdown-item edit_brand"
                                                               href="<?php echo e(route('frontend.sliders.edit',$slider->id)); ?>"><?php echo e(__('common.Edit')); ?></a>


                                                            <a onclick="confirm_modal('<?php echo e(route('frontend.sliders.destroy', $slider->id)); ?>');"
                                                               class="dropdown-item edit_brand"><?php echo e(__('common.Delete')); ?></a>

                                                    </div>
                                                </div>
                                                <!-- shortby  -->
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="edit_form">

    </div>
    <div id="view_details">

    </div>


    <?php echo $__env->make('backend.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>

        $("input[name='btn_type1']").change(function () {
            var type = $("input[name='btn_type1']:checked").val();
            if (type == 0) {
                $('#btn_title1').hide();
                $('#btn_image1').show();
            } else {
                $('#btn_title1').show();
                $('#btn_image1').hide();
            }
        });

        $("input[name='btn_type2']").change(function () {
            var type = $("input[name='btn_type2']:checked").val();
            if (type == 0) {
                $('#btn_title2').hide();
                $('#btn_image2').show();
            } else {
                $('#btn_title2').show();
                $('#btn_image2').hide();
            }
        });

        $(document).ready(function () {
            $("input[name='btn_type1']").trigger('change');
            $("input[name='btn_type2']").trigger('change');
        });


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/FrontendManage/Resources/views/sliders.blade.php ENDPATH**/ ?>