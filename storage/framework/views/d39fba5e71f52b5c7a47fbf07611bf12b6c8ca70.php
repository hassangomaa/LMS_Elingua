<?php
    $table_name='categories';
?>
<?php $__env->startSection('table'); ?>
    <?php echo e($table_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
        $LanguageList = getLanguageList();
    ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('courses.Category List')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('courses.Courses')); ?></a>
                    <a class="active" href="<?php echo e(route('course.category')); ?>"><?php echo e(__('courses.Category')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex mb-0">
                            <h3 class="mb-0"> <?php if(!isset($edit)): ?>
                                    <?php echo e(__('courses.Add New Category')); ?>

                                <?php else: ?>
                                    <?php echo e(__('courses.Update Category')); ?>

                                <?php endif; ?></h3>
                            <?php if(isset($edit)): ?>
                                <?php if(permissionCheck('course.category.store')): ?>
                                    <a href="<?php echo e(route('course.category')); ?>"
                                       class="primary-btn small fix-gr-bg ml-4" style="line-height: 25px;"
                                       title="<?php echo e(__('courses.Add New')); ?>">+</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="white-box mb_30  student-details header-menu">

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


                        <?php if(isset($edit)): ?>
                            <form action="<?php echo e(route('course.category.update')); ?>" method="POST"
                                  id="category-form"
                                  name="category-form" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                       value="<?php echo e($edit->id); ?>">
                                <?php else: ?>
                                    <?php if(permissionCheck('course.category.store')): ?>
                                        <form action="<?php echo e(route('course.category.store')); ?>" method="POST"
                                              id="category-form" name="category-form"
                                              enctype="multipart/form-data">
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php echo csrf_field(); ?>

                                            <div class="tab-content">
                                                <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div role="tabpanel"
                                                         class="tab-pane fade <?php if(auth()->user()->language_code == $language->code): ?> show active <?php endif; ?>  "
                                                         id="element<?php echo e($language->code); ?>">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="primary_input mb-25">
                                                                    <label class="primary_input_label"
                                                                           for="nameInput"><?php echo e(__('common.Name')); ?>

                                                                        <strong
                                                                            class="text-danger">*</strong></label>
                                                                    <input name="name[<?php echo e($language->code); ?>]"
                                                                           id="nameInput"
                                                                           class="primary_input_field name <?php echo e(@$errors->has('name') ? ' is-invalid' : ''); ?>"
                                                                           placeholder="<?php echo e(__('common.Name')); ?>"
                                                                           type="text"
                                                                           value="<?php echo e(isset($edit)?$edit->getTranslation('name',$language->code):old('name')); ?>" <?php echo e($errors->has('name') ? 'autofocus' : ''); ?>>
                                                                    <?php if($errors->has('name')): ?>
                                                                        <span class="invalid-feedback d-block mb-10"
                                                                              role="alert">
                                                                <strong><?php echo e(@$errors->first('name')); ?></strong>
                                                            </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="primary_input mb-25">
                                                                    <label class="primary_input_label"
                                                                           for="descriptionInput"><?php echo e(__('common.Description')); ?>  </label>
                                                                    <input name="description[<?php echo e($language->code); ?>]"
                                                                           id="descriptionInput"
                                                                           class="primary_input_field description <?php echo e(@$errors->has('description') ? ' is-invalid' : ''); ?>"
                                                                           placeholder="<?php echo e(__('common.Description')); ?>"
                                                                           type="text"
                                                                           value="<?php echo e(isset($edit)?$edit->getTranslation('description',$language->code):old('description')); ?>" <?php echo e($errors->has('description') ? 'autofocus' : ''); ?>>
                                                                    <?php if($errors->has('description')): ?>
                                                                        <span class="invalid-feedback d-block mb-10"
                                                                              role="alert">
                                                                <strong><?php echo e(@$errors->first('description')); ?></strong>
                                                            </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <div class="row">

                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="parent"><?php echo e(__('common.Parent')); ?></label>
                                                        <select class="primary_select mb-25" name="parent"
                                                                id="parent">
                                                            <option value=""><?php echo e(__('common.None')); ?></option>
                                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(isset($edit) && $category->id==$edit->id): ?>
                                                                    <?php
                                                                        continue;
                                                                    ?>
                                                                <?php endif; ?>
                                                                <option
                                                                    value="<?php echo e($category->id); ?>"
                                                                    <?php echo e(isset($edit)?($edit->parent_id==$category->id?'selected':old('parent')):old('parent')); ?>

                                                                ><?php echo e($category->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="position_order"><?php echo e(__('courses.Position Order')); ?></label>
                                                        <select class="primary_select mb-25"
                                                                name="position_order"
                                                                id="position_order">
                                                            <?php for($i=1; $i<=$max_id; $i++): ?>
                                                                <option
                                                                    value="<?php echo e($i); ?>" <?php echo e(isset($edit)?($edit->position_order==$i?'selected':old('position_order')):old('position_order')); ?> >
                                                                    <?php echo e($i); ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="status"><?php echo e(__('courses.Status')); ?></label>
                                                        <select class="primary_select mb-25" name="status"
                                                                id="status"
                                                        >
                                                            <option
                                                                value="1" <?php echo e(isset($edit)?($edit->status==1?'selected':''):''); ?>><?php echo e(__('common.Active')); ?></option>
                                                            <option
                                                                value="0" <?php echo e(isset($edit)?($edit->status==0?'selected':''):''); ?>><?php echo e(__('common.Inactive')); ?></option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 mt-10">
                                                    <div class="primary_input mb-15">
                                                        <label class="primary_input_label"
                                                               for="placeholderFileOneName"><?php echo e(__('frontendmanage.Icon')); ?>

                                                        </label>
                                                        <div class="primary_file_uploader">
                                                            <input class="primary-input filePlaceholder"
                                                                   type="text"
                                                                   value="<?php echo e(isset($edit)?$edit->image:''); ?>"

                                                                   placeholder="<?php echo e(__('student.Browse Image file')); ?>"
                                                                   readonly="" <?php echo e($errors->has('photo') ? 'autofocus' : ''); ?>>
                                                            <button class="" type="button">
                                                                <label class="primary-btn small fix-gr-bg"
                                                                       for="document_file_1"><?php echo e(__('common.Browse')); ?></label>
                                                                <input type="file" class="d-none fileUpload"
                                                                       name="photo"
                                                                       id="document_file_1">
                                                            </button>
                                                        </div>
                                                        <p class="image_size"><?php echo e(__('courses.Recommended size 200px x 200px')); ?></p>
                                                        <?php if($errors->has('photo')): ?>
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                                <strong><?php echo e(@$errors->first('photo')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="primary_input mb-15">
                                                        <label class="primary_input_label"
                                                               for=""><?php echo e(__('courses.Thumbnail Image')); ?>  </label>
                                                        <div class="primary_file_uploader">
                                                            <input class="primary-input filePlaceholder"
                                                                   type="text"
                                                                   id=" "
                                                                   value="<?php echo e(isset($edit)?$edit->thumbnail:''); ?>"
                                                                   placeholder="Browse file"
                                                                   readonly="" <?php echo e($errors->has('thumbnail') ? 'autofocus' : ''); ?>>
                                                            <button class="" type="button">
                                                                <label class="primary-btn small fix-gr-bg"
                                                                       for="document_file_2"><?php echo e(__('common.Browse')); ?></label>
                                                                <input type="file" class="d-none fileUpload"
                                                                       name="thumbnail"
                                                                       id="document_file_2">
                                                            </button>
                                                        </div>
                                                        <p class="image_size"><?php echo e(__('courses.Recommended size 1140px x 300px')); ?></p>
                                                    </div>
                                                    <?php if($errors->has('thumbnail')): ?>
                                                        <span class="invalid-feedback d-block mb-10"
                                                              role="alert">
                                                            <strong><?php echo e(@$errors->first('thumbnail')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <?php
                                                    $tooltip = "";
                                                    if(permissionCheck('course.category.store')){
                                                          $tooltip = "";
                                                      }else{
                                                          $tooltip = trans("courses.You have no permission to add");
                                                      }
                                                ?>
                                                <div class="col-lg-12 text-center">
                                                    <div class="d-flex justify-content-center pt_20">
                                                        <button type="submit"
                                                                class="primary-btn semi_large fix-gr-bg"
                                                                data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>"
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

                                        </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex mb-0">
                            <h3 class="mb-0"><?php echo e(__('courses.Category List')); ?></h3>
                        </div>
                    </div>
                    <div class="  QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('common.Name')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Parent')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Description')); ?></th>
                                        <th scope="col"><?php echo e(__('frontendmanage.Icon')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Thumbnail Image')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td> <?php echo e(checkParent($category)); ?> <?php echo e(@$category->name); ?></td>
                                            <td><?php echo e(@$category->parent->name); ?></td>
                                            <td><?php echo e(@$category->description); ?></td>
                                            <td>
                                                <div>
                                                    <img style="width: 70px !important;"
                                                         src="<?php echo e(url(@$category->image)); ?>" alt=""
                                                         class="img img-responsive m-2">
                                                </div>
                                            </td>

                                            <td>
                                                <img
                                                    src="<?php if(isset($category->thumbnail)): ?><?php echo e(url(@$category->thumbnail)); ?><?php endif; ?>"
                                                    alt=""
                                                    class="img img-responsive m-2"
                                                    style="width: 70px !important; ">
                                            </td>
                                            <td class="nowrap">
                                                <label class="switch_toggle"
                                                       for="active_checkbox<?php echo e(@$category->id); ?>">
                                                    <input type="checkbox"
                                                           class="<?php if(permissionCheck('course.category.status_update')): ?>  status_enable_disable <?php endif; ?> "
                                                           id="active_checkbox<?php echo e(@$category->id); ?>"
                                                           <?php if(@$category->status == 1): ?> checked
                                                           <?php endif; ?> value="<?php echo e(@$category->id); ?>">
                                                    <i class="slider round"></i>
                                                </label>
                                            </td>

                                            <td>
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu1<?php echo e(@$category->id); ?>"
                                                            data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <?php echo e(__('common.Select')); ?>

                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu1<?php echo e(@$category->id); ?>">
                                                        <?php if(permissionCheck('course.category.edit')): ?>
                                                            <a class="dropdown-item edit_brand"
                                                               href="<?php echo e(route('course.category.edit',$category->id)); ?>"><?php echo e(__('common.Edit')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(permissionCheck('course.category.delete')): ?>
                                                            <a onclick="confirm_modal('<?php echo e(route('course.category.delete', $category->id)); ?>');"
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


    <input type="hidden" name="status_route" class="status_route" value="<?php echo e(route('course.category.status_update')); ?>">
    <?php echo $__env->make('backend.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('public/backend/js/category.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/backend/categories/index.blade.php ENDPATH**/ ?>