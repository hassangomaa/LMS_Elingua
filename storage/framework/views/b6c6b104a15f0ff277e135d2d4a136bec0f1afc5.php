<?php
    $table_name='course_levels';
?>
<?php $__env->startSection('table'); ?>
    <?php echo e($table_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('courses.Level List')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('courses.Course')); ?></a>
                    <a class="active" href="<?php echo e(route('course-level.index')); ?>"><?php echo e(__('courses.Level')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"> <?php if(!isset($edit)): ?>
                                    <?php echo e(__('courses.Add New Level')); ?>

                                <?php else: ?>
                                    <?php echo e(__('courses.Update Level')); ?>

                                <?php endif; ?></h3>
                        </div>
                    </div>
                    <div class="white-box mb_30  student-details header-menu">
                        <?php if(isset($edit)): ?>
                            <?php if(permissionCheck('course-level.update')): ?>
                                <form action="<?php echo e(route('course-level.update',$edit->id)); ?>" method="POST"
                                      id="category-form"
                                      name="category-form" enctype="multipart/form-data">
                                    <?php endif; ?>
                                    <input type="hidden" name="id"
                                           value="<?php echo e(@$edit->id); ?>">
                                    <?php echo method_field('PATCH'); ?>
                                    <?php else: ?>
                                        <?php if(permissionCheck('course-level.store')): ?>
                                            <form action="<?php echo e(route('course-level.store')); ?>" method="POST"
                                                  id="category-form" name="category-form" enctype="multipart/form-data">
                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php echo csrf_field(); ?>
                                                <?php
                                                    $LanguageList = getLanguageList();
                                                ?>
                                                <div class="row pt-0">
                                                    <?php if(isModuleActive('FrontendMultiLang')): ?>
                                                        <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                                                            role="tablist">
                                                            <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link  <?php if(auth()->user()->language_code == $language->code): ?> active <?php endif; ?>"
                                                                       href="#element<?php echo e($language->code); ?>"
                                                                       role="tab"
                                                                       data-toggle="tab"><?php echo e($language->native); ?>  </a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="tab-content">
                                                    <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div role="tabpanel"
                                                             class="tab-pane fade <?php if(auth()->user()->language_code == $language->code): ?> show active <?php endif; ?>  "
                                                             id="element<?php echo e($language->code); ?>">
                                                            <div class="row">


                                                                <div class="col-xl-12">
                                                                    <div class="primary_input mb-25">
                                                                        <label class="primary_input_label"
                                                                               for="nameInput"><?php echo e(__('common.Title')); ?>

                                                                            <strong
                                                                                class="text-danger">*</strong></label>
                                                                        <input name="title[<?php echo e($language->code); ?>]"
                                                                               id="nameInput"
                                                                               class="primary_input_field title <?php echo e(@$errors->has('title') ? ' is-invalid' : ''); ?>"
                                                                               placeholder="<?php echo e(__('common.Title')); ?>"
                                                                               type="text"
                                                                               value="<?php echo e(isset($edit)?@$edit->title:old('title')); ?>">
                                                                        <?php if($errors->has('title')): ?>
                                                                            <span class="invalid-feedback d-block mb-10"
                                                                                  role="alert">
                                            <strong><?php echo e(@$errors->first('title')); ?></strong>
                                        </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>


                                                                <?php
                                                                    $tooltip = "";
                                                                    if(permissionCheck('course-level.store')){
                                                                          $tooltip = "";
                                                                      }else{
                                                                          $tooltip = trans('courses.You have no permission to add');
                                                                      }
                                                                ?>
                                                                <div class="col-lg-12 text-center">
                                                                    <div class="d-flex justify-content-center pt_20">
                                                                        <button type="submit"
                                                                                class="primary-btn semi_large fix-gr-bg"
                                                                                data-toggle="tooltip"
                                                                                title="<?php echo e(@$tooltip); ?>"
                                                                                id="save_button_parent">
                                                                            <i class="ti-check"></i>
                                                                            <?php if(!isset($edit)): ?>
                                                                                <?php echo e(__('common.Save')); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(__('common.Update')); ?>

                                                                            <?php endif; ?>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>

                                            </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0"><?php echo e(__('courses.Level List')); ?></h3>
                        </div>
                    </div>
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('common.SL')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Title')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="m-2"><?php echo e($key+1); ?></th>
                                            <td><?php echo e(@$level->title); ?></td>


                                            <td class="nowrap">
                                                <label class="switch_toggle" for="active_checkbox<?php echo e(@$level->id); ?>">
                                                    <input type="checkbox"
                                                           class="   status_enable_disable  "
                                                           id="active_checkbox<?php echo e(@$level->id); ?>"
                                                           <?php if(@$level->status == 1): ?> checked
                                                           <?php endif; ?> value="<?php echo e(@$level->id); ?>">
                                                    <i class="slider round"></i>
                                                </label>
                                            </td>

                                            <td>
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu1<?php echo e(@$level->id); ?>"
                                                            data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <?php echo e(__('common.Select')); ?>

                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu1<?php echo e(@$level->id); ?>">
                                                        <?php if(permissionCheck('course-level.update')): ?>
                                                            <a class="dropdown-item edit_brand"
                                                               href="<?php echo e(route('course-level.edit',@$level->id)); ?>"><?php echo e(__('common.Edit')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(permissionCheck('course-level.destroy')): ?>
                                                            <a onclick="confirm_modal('<?php echo e(route('course-level.destroy', @$level->id)); ?>');"
                                                               class="dropdown-item edit_brand"><?php echo e(__('common.Delete')); ?></a>
                                                        <?php endif; ?>
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
         <script src="<?php echo e(asset('public/backend/js/category.js')); ?>"></script> 
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/CourseSetting/Providers/../Resources/views/level.blade.php ENDPATH**/ ?>