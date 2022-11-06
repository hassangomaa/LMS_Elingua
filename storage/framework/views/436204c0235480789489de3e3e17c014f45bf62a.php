<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/class.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php
    $table_name='courses';
?>
<?php $__env->startSection('table'); ?>
    <?php echo e($table_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo e(__('virtual-class.Class List')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                    <a href="#"> <?php echo e(__('virtual-class.Class List')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($bank)): ?>
                <?php if(permissionCheck('virtual-class.store')): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('virtual-class')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo e(__('common.Add')); ?>

                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-20">
                                    <?php if(isset($class)): ?>
                                        <?php echo e(__('common.Edit')); ?>

                                    <?php else: ?>
                                        <?php echo e(__('common.Add')); ?>

                                    <?php endif; ?>
                                    <?php echo e(__('virtual-class.Class')); ?>

                                </h3>
                            </div>

                            <?php if(isset($class)): ?>

                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('virtual-class.update',$class->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'question_bank'])); ?>


                            <?php else: ?>
                                <?php if(permissionCheck('virtual-class.create')): ?>

                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'virtual-class.store',
                                    'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'question_bank'])); ?>


                                <?php endif; ?>
                            <?php endif; ?>
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="white-box  student-details header-menu">
                                <div class="add-visitor">
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
                                                <div class="row mt-25">
                                                    <div class="col-lg-12">
                                                        <div class="input-effect">
                                                            <label> <?php echo e(__('virtual-class.Title')); ?> *</label>
                                                            <input type="text"
                                                                   placeholder="<?php echo e(__('virtual-class.Title')); ?>"
                                                                   class="primary_input_field name<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                                                                   name="title[<?php echo e($language->code); ?>]"
                                                                   <?php echo e($errors->has('title') ? ' autofocus' : ''); ?>

                                                                   value="<?php echo e(isset($class)? $class->getTranslation('title',$language->code):''); ?>">
                                                            <span class="focus-border textarea"></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-25 ">
                                                    <div class="col-lg-12">
                                                        <div class="primary_input">
                                                            <label class="primary_input_label"
                                                                   for=""><?php echo e(__('jitsi.Description')); ?>

                                                            </label>
                                                            <textarea class="primary_input_field form-control"
                                                                      cols="0"
                                                                      rows="4"
                                                                      placeholder="<?php echo e(__('jitsi.Description')); ?>"
                                                                      name="description[<?php echo e($language->code); ?>]"
                                                                      id="address"><?php echo e(isset($class) ?$class->course->getTranslation('about',$language->code) :''); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <?php if(\Illuminate\Support\Facades\Auth::user()->role_id==1): ?>
                                        <div class="row mt-25">
                                            <div class="col-xl-12">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for="assign_instructor"><?php echo e(__('courses.Assign Instructor')); ?> </label>
                                                    <select class="primary_select category_id" name="assign_instructor"
                                                            id="assign_instructor" <?php echo e($errors->has('assign_instructor') ? 'autofocus' : ''); ?>>
                                                        <option
                                                            data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Instructor')); ?>"
                                                            value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Instructor')); ?> </option>
                                                        <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option
                                                                value="<?php echo e($instructor->id); ?>" <?php echo e(isset($class)?$instructor->id==$class->course->user_id?'selected':'':''); ?>><?php echo e(@$instructor->name); ?> </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row mt-25">
                                        <div class="col-xl-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                       for="assistant_instructors"><?php echo e(__('courses.Assistant Instructor')); ?> </label>
                                                <select name="assistant_instructors[]" id="assistant_instructors"
                                                        class="multypol_check_select active mb-15 e1"
                                                        multiple>
                                                    <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value="<?php echo e($instructor->id); ?>" <?php echo e(isset($class)&&!empty($class->course->assistantInstructorsIds) && in_array($instructor->id,$class->course->assistantInstructorsIds)?'selected':''); ?>><?php echo e(@$instructor->name); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <label> <?php echo e(__('virtual-class.Duration')); ?> <?php echo e(__('virtual-class.Per Class')); ?>

                                                    (<?php echo e(__('virtual-class.in Minute')); ?>) *</label>
                                                <input <?php echo e($errors->has('duration') ? ' autofocus' : ''); ?>

                                                       class="primary_input_field name<?php echo e($errors->has('duration') ? ' is-invalid' : ''); ?>"
                                                       type="number" name="duration" placeholder="e.g.30min"
                                                       value="<?php echo e(isset($class)? $class->duration:(old('duration')!=''?(old('duration')):'')); ?>">
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('duration')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('duration')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo e(__('quiz.Category')); ?></label>
                                            <select <?php echo e($errors->has('category') ? ' autofocus' : ''); ?>

                                                    class="primary_select <?php echo e($errors->has('category') ? ' is-invalid' : ''); ?>"
                                                    id="category_id" name="category">
                                                <option data-display=" <?php echo e(__('quiz.Category')); ?> *"
                                                        value=""> <?php echo e(__('quiz.Category')); ?> *
                                                </option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($class)): ?>
                                                        <option
                                                            value="<?php echo e($category->id); ?>" <?php echo e($class->category_id == $category->id? 'selected': ''); ?>><?php echo e($category->name); ?></option>
                                                    <?php else: ?>
                                                        <option
                                                            value="<?php echo e($category->id); ?>" <?php echo e(old('category')!=''? (old('category') == $category->id? 'selected':''):''); ?>><?php echo e($category->name); ?></option>
                                                    <?php endif; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('category')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('category')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12 mt-30-md" id="subCategoryDiv">
                                            <label class="primary_input_label"
                                                   for=""><?php echo e(__('quiz.Sub Category')); ?></label>
                                            <select <?php echo e($errors->has('sub_category') ? ' autofocus' : ''); ?>

                                                    class="primary_select<?php echo e($errors->has('sub_category') ? ' is-invalid' : ''); ?> select_section"
                                                    id="subcategory_id" name="sub_category">
                                                <option
                                                    data-display=" <?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Sub Category')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Sub Category')); ?>

                                                </option>

                                                <?php if(isset($class)): ?>
                                                    <option value="<?php echo e(@$class->sub_category_id); ?>"
                                                            selected><?php echo e(@$class->subCategory->name); ?></option>
                                                <?php endif; ?>
                                            </select>
                                            <?php if($errors->has('sub_category')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('sub_category')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if(showEcommerce()): ?>
                                        <div class="row mt-25">
                                            <div class="col-lg-12">
                                                <div class="checkbox_wrap d-flex align-items-center">
                                                    <label for="edit_course"
                                                           class="switch_toggle">
                                                        <input type="checkbox" name="free"
                                                               <?php echo e(isset($class) && $class->fees == 0 ? 'checked' : ''); ?> class="free_class"
                                                               id="edit_course"
                                                               value="0">
                                                        <i class="slider round"></i>
                                                    </label>
                                                    <label><?php echo e(__('virtual-class.This class is free')); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-25 fees"
                                             <?php if(isset($class) && $class->fees == 0): ?> style="display:none;" <?php endif; ?>>
                                            <div class="col-lg-12">
                                                <div class="input-effect">
                                                    <label> <?php echo e(__('virtual-class.Fees')); ?> *</label>
                                                    <input
                                                        class="primary_input_field name<?php echo e($errors->has('fees') ? ' is-invalid' : ''); ?>"
                                                        type="number" name="fees"
                                                        value="<?php echo e(isset($class)? $class->fees:(old('fees')!=''?(old('fees')):0)); ?>">
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('fees')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('fees')); ?></strong>
                                            </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row mt-25">
                                        <div class="col-xl-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Image')); ?></label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary-input filePlaceholder" type="text"
                                                           placeholder="<?php echo e(isset($class) && $class->image ? showPicName($class->image) :__('virtual-class.Browse Image file')); ?>"
                                                           readonly="" <?php echo e($errors->has('image') ? ' autofocus' : ''); ?>>
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                               for="document_file"><?php echo e(__('common.Browse')); ?></label>
                                                        <input type="file" class="d-none fileUpload" name="image"
                                                               id="document_file">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 mt-25">
                                            <label><?php echo e(__('courses.View Scope')); ?> </label>
                                            <select class="primary_select " name="scope"
                                                    id="">
                                                <option
                                                    value="1" <?php echo e(@$class->course->scope=="1"?'selected':''); ?>><?php echo e(__('courses.Public')); ?>

                                                </option>

                                                <option <?php echo e(@$class->course->scope=="0"?'selected':''); ?> value="0">
                                                    <?php echo e(__('courses.Private')); ?>

                                                </option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-xl-12 mt-25">
                                            <label><?php echo e(__('courses.Required Type')); ?> </label>
                                            <select class="primary_select " name="required_type"
                                                    id="">
                                                <option
                                                    value="1" <?php echo e(@$class->course->required_type=="1"?'selected':''); ?> <?php echo e(!isset($class)?'selected':''); ?> ><?php echo e(__('courses.Compulsory')); ?>

                                                </option>

                                                <option <?php echo e(@$class->course->required_type=="0"?'selected':''); ?> value="0">
                                                    <?php echo e(__('courses.Open')); ?>

                                                </option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label"
                                                   for=""><?php echo e(__('virtual-class.Language')); ?> *</label>
                                            <select class="primary_select" name="lang_id" id="">
                                                <option
                                                    data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('common.Language')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('common.Language')); ?></option>
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                        value="<?php echo e($language->id); ?>"
                                                        <?php if(!isset($class)): ?> <?php if($language->id==19): ?> selected <?php endif; ?> <?php endif; ?><?php echo e(isset($class) && $class->lang_id == $language->id ? 'selected' : ''); ?> ><?php echo e($language->native); ?></option>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('lang_id')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('lang_id')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="row mt-25    <?php if(isset($class)): ?> d-none <?php endif; ?>">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label"
                                                   for=""><?php echo e(__('virtual-class.Type')); ?></label>
                                            <select
                                                class="primary_select type <?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>"
                                                id="type" name="type">
                                                <option
                                                    value="0" <?php echo e(isset($class) && $class->type == 0 ? 'selected' : old('type')); ?>><?php echo e(__('virtual-class.Single Class')); ?></option>
                                                <option
                                                    value="1" <?php echo e(isset($class) && $class->type == 1 ? 'selected' : old('type')); ?>><?php echo e(__('virtual-class.Continuous Class')); ?></option>
                                            </select>
                                            <?php if($errors->has('type')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('type')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div <?php if(!isset($class) || $class->type == 0): ?> style="display: none"
                                         <?php endif; ?> class="row mt-25 continuous_class ">
                                        <div class="col-xl-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('coupons.Start Date')); ?></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="Start Date"
                                                                       class="primary_input_field primary-input date form-control  <?php echo e(@$errors->has('start_date') ? ' is-invalid' : ''); ?>"
                                                                       id="start_date" type="text"
                                                                       name="start_date"
                                                                       value="<?php echo e(isset($class)? date('m/d/Y', strtotime($class->start_date)) : date('m/d/Y')); ?>"
                                                                       autocomplete="off">

                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </button>
                                                    </div>
                                                    <?php if($errors->has('start_date')): ?>
                                                        <span class="invalid-feedback d-block mb-10" role="alert">
                                                <strong><?php echo e(@$errors->first('start_date')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 mt-25">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('virtual-class.End Date')); ?></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="End Date"
                                                                       class="primary_input_field primary-input date form-control  <?php echo e(@$errors->has('end_date') ? ' is-invalid' : ''); ?>"
                                                                       id="end_date" type="text"
                                                                       name="end_date"
                                                                       value="<?php echo e(isset($class)?  date('m/d/Y', strtotime($class->end_date)) : date('m/d/Y')); ?>"
                                                                       autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </button>
                                                    </div>
                                                    <?php if($errors->has('end_date')): ?>
                                                        <span class="invalid-feedback d-block mb-10" role="alert">
                                                <strong><?php echo e(@$errors->first('end_date')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div <?php if(isset($class) && $class->type == 1): ?> style="display: none"
                                         <?php endif; ?> class="row mt-25 single_class  ">
                                        <div class="col-xl-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('virtual-class.Date')); ?></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="Date" readonly
                                                                       class="primary_input_field primary-input date form-control  <?php echo e(@$errors->has('date') ? ' is-invalid' : ''); ?>"
                                                                       id="start_date" type="text"
                                                                       name="date"
                                                                       value="<?php echo e(isset($class) && $class->type == 0 ? date('m/d/Y', strtotime($class->start_date)) : date('m/d/Y')); ?>"
                                                                       autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </button>
                                                    </div>
                                                    <?php if($errors->has('start_date')): ?>
                                                        <span class="invalid-feedback d-block mb-10" role="alert">
                                                <strong><?php echo e(@$errors->first('start_date')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <label><?php echo e(__('virtual-class.Time')); ?> <span>*</span></label>
                                            <div class="primary_input">
                                                <input required
                                                       class="primary-input primary_input_field  time form-control<?php echo e(@$errors->has('time') ? ' is-invalid' : ''); ?>"
                                                       type="text" name="time"
                                                       value="<?php echo e(isset($class) ? old('time',$class->time): old('time')); ?>">

                                            </div>

                                            <?php if($errors->has('time')): ?>
                                                <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e(@$errors->first('time')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row <?php if(isset($class)): ?> d-none <?php endif; ?>">
                                        <div class="col-md-12 mt-25 ">
                                            <label class="primary_input_label"
                                                   for=""> <?php echo e(__('virtual-class.Host')); ?> </label>
                                        </div>

                                        <div class="col-md-6 mb-25">
                                            <label for="type1" class="primary_checkbox d-flex mr-12 ">
                                                <input type="radio" class="common-checkbox" id="type1" name="host"
                                                       value="Zoom"
                                                       <?php if(isset($class)): ?> <?php if($class->host=="Zoom"): ?> checked <?php endif; ?> <?php else: ?>
                                                    checked <?php endif; ?>>
                                                <span class="checkmark mr-2"></span><?php echo e(__('virtual-class.Zoom')); ?></label>
                                        </div>

                                        <?php if(isModuleActive("BBB")): ?>
                                            <div class="col-md-6 mb-25">
                                                <label for="type2" class="primary_checkbox d-flex mr-12 ">
                                                    <input type="radio" class="common-checkbox" id="type2" name="host"
                                                           value="BBB"
                                                           <?php if(isset($class)): ?> <?php if($class->host=="BBB"): ?> checked <?php endif; ?> <?php endif; ?>
                                                    >
                                                    <span class="checkmark mr-2"></span> <?php echo e(__('virtual-class.BBB')); ?>

                                                </label>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(isModuleActive("Jitsi")): ?>
                                            <div class="col-md-6 mb-25">
                                                <label for="type3" class="primary_checkbox d-flex mr-12 ">
                                                    <input type="radio" class="common-checkbox" id="type3" name="host"
                                                           value="Jitsi"
                                                           <?php if(isset($class)): ?> <?php if($class->host=="Jitsi"): ?> checked <?php endif; ?> <?php endif; ?>
                                                    >
                                                    <span class="checkmark mr-2"></span> <?php echo e(__('jitsi.Jitsi')); ?></label>
                                            </div>
                                        <?php endif; ?>
                                    </div>


                                    <div class=" mt-25 single_class zoomSetting <?php if(isset($class)): ?> d-none <?php endif; ?>"
                                         style="display: <?php echo e(isset($class) ? $class->host=="Zoom"? "block":"none": 'block'); ?>">

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                           for="password"><?php echo e(__('zoom.Password')); ?> *</label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input placeholder="Password"
                                                                           class="primary_input_field primary-input   form-control"
                                                                           id="password" type="text"
                                                                           name="password"
                                                                           value="123456"
                                                                           autocomplete="off">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <?php if($errors->has('password')): ?>
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                <strong><?php echo e(@$errors->first('password')); ?></strong>
                                                </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-xl-12  mt-25">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                           for="password"><?php echo e(__('zoom.Recurring')); ?></label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-25">
                                                                    <div class="mr-30">
                                                                        <label class="primary_checkbox d-flex mr-12 "
                                                                               for="recurring_options1">
                                                                            <input type="radio" name="is_recurring"
                                                                                   id="recurring_options1"
                                                                                   value="1"
                                                                                   class="common-radio recurring-type">
                                                                            <span
                                                                                class="checkmark mr-2"></span> <?php echo e(__('zoom.Yes')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-25">
                                                                    <div class="mr-30">
                                                                        <label class="primary_checkbox d-flex mr-12 "
                                                                               for="recurring_options2">
                                                                            <input type="radio" name="is_recurring"
                                                                                   id="recurring_options2"
                                                                                   value="0"
                                                                                   checked
                                                                                   class="common-radio recurring-type">
                                                                            <span
                                                                                class="checkmark mr-2"></span> <?php echo e(__('zoom.No')); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <?php if($errors->has('is_recurring')): ?>
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                                <strong><?php echo e(@$errors->first('is_recurring')); ?></strong>
                                                </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class=" zoom-recurrence-section-hide">
                                            <div class="row">
                                                <div class="col-xl-12  mt-25">
                                                    <select <?php echo e($errors->has('recurring_type') ? ' autofocus' : ''); ?>

                                                            class="primary_select <?php echo e($errors->has('recurring_type') ? ' is-invalid' : ''); ?>"
                                                            id="recurring_type" name="recurring_type">
                                                        <option data-display="<?php echo e(__('zoom.Recurrence type')); ?> *"
                                                                value=""><?php echo e(__('zoom.Student')); ?>

                                                            <?php echo e(__('zoom.Recurrence type')); ?> *
                                                        </option>
                                                        <option
                                                            value="1" <?php echo e(old('recurring_type') == 1  ? 'selected':''); ?> > <?php echo e(__('zoom.Daily')); ?>

                                                        </option>
                                                        <option
                                                            value="2" <?php echo e(old('recurring_type') == 2  ? 'selected':''); ?> > <?php echo e(__('zoom.Weekly')); ?>

                                                        </option>
                                                        <option
                                                            value="3" <?php echo e(old('recurring_type') == 3  ? 'selected':''); ?>>  <?php echo e(__('zoom.Monthly')); ?>

                                                        </option>
                                                    </select>
                                                    <?php if($errors->has('recurring_type')): ?>
                                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('recurring_type')); ?></strong>
                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-12  mt-25">
                                                    <select
                                                        <?php echo e($errors->has('recurring_repect_day') ? ' autofocus' : ''); ?>

                                                        class="primary_select <?php echo e($errors->has('recurring_repect_day') ? ' is-invalid' : ''); ?>"
                                                        id="recurring_repect_day" name="recurring_repect_day">
                                                        <option data-display=" Select *"
                                                                value=""><?php echo e(__('zoom.Zoom Recurring Repeat')); ?>*
                                                        </option>
                                                        <?php for($i = 1; $i <= 15; $i++): ?>
                                                            <option
                                                                value="<?php echo e($i); ?>" <?php echo e(old('recurring_repect_day') == $i ? 'selected':''); ?> ><?php echo e($i); ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                    <?php if($errors->has('recurring_type')): ?>
                                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('recurring_type')); ?></strong>
                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-xl-12  mt-25">
                                                    <div class="primary_input">
                                                        <div class="primary_datepicker_input">
                                                            <div class="no-gutters input-right-icon">
                                                                <div class="col">
                                                                    <div class="">
                                                                        <input id="recurring_end_date"
                                                                               class="primary_input_field primary-input date form-control "
                                                                               placeholder="<?php echo e(__('zoom.Recurring End')); ?>"
                                                                               type="text" name="recurring_end_date"
                                                                               value="<?php echo e(isset($class)? $class->start_date : date('m/d/Y')); ?>"
                                                                               autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <button class="" type="button">
                                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                                </button>
                                                            </div>
                                                            <?php if($errors->has('recurring_end_date')): ?>
                                                                <span class="invalid-feedback d-block mb-10"
                                                                      role="alert">
                                                <strong><?php echo e(@$errors->first('recurring_end_date')); ?></strong>
                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-25">
                                            <div class="col-xl-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('zoom.Attached File')); ?>

                                                    </label>
                                                    <div class="primary_file_uploader">
                                                        <input class="primary-input filePlaceholder" type="text"
                                                               placeholder="<?php echo e(isset($editdata->attached_file) && @$editdata->attached_file != ""? getFilePath3(@$editdata->attached_file) : trans('zoom.Attached File')); ?>"

                                                               readonly="" <?php echo e($errors->has('attached_file') ? ' autofocus' : ''); ?>>
                                                        <button class="" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                   for="attached_file"><?php echo e(__('common.Browse')); ?></label>
                                                            <input type="file" class="d-none fileUpload"
                                                                   name="attached_file"
                                                                   id="attached_file">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class=" mt-25 single_class bbbSetting <?php if(isset($class)): ?> d-none <?php endif; ?>"
                                         style="display: <?php echo e(isset($class) ? $class->host=="BBB"? "block":"none": 'none'); ?>">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('bbb.Attendee Password')); ?>

                                                    </label>
                                                    <input
                                                        class="primary_input_field form-control<?php echo e($errors->has('attendee_password') ? ' is-invalid' : ''); ?>"
                                                        type="text" name="attendee_password"
                                                        autocomplete="off"
                                                        placeholder="<?php echo e(__('bbb.Attendee Password')); ?>"
                                                        value="<?php echo e(isset($editdata) ?  old('topic',$editdata->attendee_password) : old('attendee_password','12345678')); ?>">

                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('attendee_password')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('attendee_password')); ?></strong>
                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-25">
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('bbb.Moderator Password')); ?>

                                                    </label>
                                                    <input
                                                        class="primary_input_field form-control<?php echo e($errors->has('moderator_password') ? ' is-invalid' : ''); ?>"
                                                        type="text" name="moderator_password"
                                                        placeholder="<?php echo e(__('bbb.Moderator Password')); ?>"
                                                        autocomplete="off"
                                                        value="<?php echo e(isset($editdata) ?  old('topic',$editdata->moderator_password) : old('moderator_password','123456')); ?>">

                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('moderator_password')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('moderator_password')); ?></strong>
                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" mt-25 single_class jitsiSetting <?php if(isset($class)): ?> d-none <?php endif; ?>"
                                         style="display: <?php echo e(isset($class) ? $class->host=="Jitsi"? "block":"none": 'none'); ?>">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('jitsi.Meeting ID/Room')); ?>

                                                    </label>
                                                    <input
                                                        class="primary_input_field form-control<?php echo e($errors->has('jitsi_meeting_id') ? ' is-invalid' : ''); ?>"
                                                        type="text" name="jitsi_meeting_id"
                                                        autocomplete="off"
                                                        placeholder="<?php echo e(__('jitsi.Meeting ID/Room')); ?>"
                                                        value="<?php echo e(date('ymdhmi')); ?>">

                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('jitsi_meeting_id')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('jitsi_meeting_id')); ?></strong>
                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <?php if(Settings('frontend_active_theme')=="edume"): ?>
                                        <div class="row mt-25">
                                            <div class="col-xl-12">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('courses.Key Point')); ?> (1)</label>
                                                    <input class="primary_input_field" name="what_learn1"
                                                           placeholder="-"
                                                           type="text"
                                                           value="<?php echo e(isset($class) ? old('what_learn1',$class->course->what_learn1??'') : old('what_learn1')); ?>">
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('courses.Key Point')); ?> (2) </label>
                                                    <input class="primary_input_field" name="what_learn2"
                                                           placeholder="-"
                                                           type="text"
                                                           value="<?php echo e(isset($class) ? old('what_learn2',$class->course->what_learn2??'') : old('what_learn2')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label"
                                                   for="certificate"><?php echo e(__('certificate.Certificate')); ?></label>
                                            <div class="primary_input">
                                                <select class="primary_select "
                                                        name="certificate" id="certificate">
                                                    <option
                                                        data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('certificate.Certificate')); ?>"
                                                        value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('certificate.Certificate')); ?> </option>
                                                    <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($certificate->id); ?>"
                                                            <?php echo e(isset($class) ? $certificate->id==$class->course->certificate_id?'selected':'' : ''); ?>

                                                        ><?php echo e(@$certificate->title); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="primary-btn fix-gr-bg"
                                                    data-toggle="tooltip">
                                                <span class="ti-check"></span>
                                                <?php if(isset($class)): ?>
                                                    <?php echo e(__('common.Update')); ?>

                                                <?php else: ?>
                                                    <?php echo e(__('common.Save')); ?>

                                                <?php endif; ?>
                                                <?php echo e(__('virtual-class.Class')); ?>

                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>

                <div class="col-lg-8 ">
                    <div class="main-title">
                        <h3 class="mb-20"><?php echo e(__('virtual-class.Class List')); ?></h3>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>
                                    <?php if(session()->has('message-success-delete') != "" ||
                                    session()->get('message-danger-delete') != ""): ?>
                                        <tr>
                                            <td colspan="5">
                                                <?php if(session()->has('message-success-delete')): ?>
                                                    <div class="alert alert-success">
                                                        <?php echo e(session()->get('message-success-delete')); ?>

                                                    </div>
                                                <?php elseif(session()->has('message-danger-delete')): ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo e(session()->get('message-danger-delete')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th><?php echo e(__('common.SL')); ?></th>
                                        <th><?php echo e(__('virtual-class.Title')); ?></th>
                                        <?php if(isModuleActive('Org')): ?>
                                            <th><?php echo e(__('courses.Required Type')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(__('virtual-class.Category')); ?></th>
                                        <th><?php echo e(__('virtual-class.Sub Category')); ?></th>
                                        <th><?php echo e(__('virtual-class.Language')); ?></th>
                                        <th><?php echo e(__('virtual-class.Duration')); ?></th>
                                        <?php if(showEcommerce()): ?>
                                            <th><?php echo e(__('virtual-class.Fees')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(__('virtual-class.Type')); ?></th>
                                        <th><?php echo e(__('virtual-class.Start Date')); ?></th>
                                        <th><?php echo e(__('virtual-class.End Date')); ?></th>
                                        <th><?php echo e(__('virtual-class.Time')); ?></th>
                                        <th><?php echo e(__('virtual-class.Host')); ?></th>
                                        <th><?php echo e(__('courses.View Scope')); ?></th>
                                        <th><?php echo e(__('common.Status')); ?></th>
                                        <th><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>


                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade admin-query" id="deleteClass">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('common.Delete')); ?>  </h4>
                    <button type="button" class="close" data-dismiss="modal"><i
                            class="ti-close "></i></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo e(route('virtual-class.destroy')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="text-center">

                            <h4><?php echo e(__('common.Are you sure to delete ?')); ?> </h4>
                        </div>
                        <input type="hidden" name="id" value="" id="classDeleteId">
                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>

                            <button class="primary-btn fix-gr-bg"
                                    type="submit"><?php echo e(__('common.Delete')); ?></button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

    <?php
        $url = route('getAllVirtualClassData');
    ?>

    <script>
        let table = $('#lms_table').DataTable({
            bLengthChange: false,
            "bDestroy": true,
            processing: true,
            serverSide: true,
            order: [[0, "desc"]],
            "ajax": $.fn.dataTable.pipeline({
                url: '<?php echo $url; ?>',
                pages: 5 // number of pages to cache
            }),
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'title', name: 'title'},
                    <?php if(isModuleActive('Org')): ?>
                {
                    data: 'required_type', name: 'courses.required_type'
                },
                    <?php endif; ?>
                {
                    data: 'category_name', name: 'category.name'
                },
                {data: 'subCategory', name: 'subCategory.name', orderable: false},
                {data: 'language', name: 'language.name'},
                {data: 'duration', name: 'duration'},
                    <?php if(showEcommerce()): ?>
                {
                    data: 'fees', name: 'fees'
                },
                    <?php endif; ?>
                {
                    data: 'type', name: 'type'
                },
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                {data: 'time', name: 'time'},
                {data: 'host', name: 'host'},
                {data: 'scope', name: 'scope'},
                {data: 'status', name: 'status', orderable: false},
                {data: 'action', name: 'action', orderable: false},

            ],
            language: {
                emptyTable: "<?php echo e(__("common.No data available in the table")); ?>",
                search: "<i class='ti-search'></i>",
                searchPlaceholder: '<?php echo e(__("common.Quick Search")); ?>',
                paginate: {
                    next: "<i class='ti-arrow-right'></i>",
                    previous: "<i class='ti-arrow-left'></i>"
                }
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: '<i class="far fa-copy"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '<?php echo e(__("common.Copy")); ?>',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    titleAttr: '<?php echo e(__("common.Excel")); ?>',
                    title: $("#logo_title").val(),
                    margin: [10, 10, 10, 0],
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },

                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="far fa-file-alt"></i>',
                    titleAttr: '<?php echo e(__("common.CSV")); ?>',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="far fa-file-pdf"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '<?php echo e(__("common.PDF")); ?>',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },
                    orientation: 'landscape',
                    pageSize: 'A4',
                    margin: [0, 0, 0, 12],
                    alignment: 'center',
                    header: true,
                    customize: function (doc) {
                        doc.content[1].table.widths =
                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }

                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: '<?php echo e(__("common.Print")); ?>',
                    title: $("#logo_title").val(),
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    postfixButtons: ['colvisRestore']
                }
            ],
            columnDefs: [{
                visible: false
            }, {responsivePriority: 1, targets: -1},
                {responsivePriority: 2, targets: -2},
            ],
            responsive: true,
        });


        $(document).on('click', '.deleteClass', function () {
            let id = $(this).data('id');
            $('#classDeleteId').val(id);
            $("#deleteClass").modal('show');
        });
    </script>>

    <script src="<?php echo e(asset('/')); ?>/Modules/CourseSetting/Resources/assets/js/course.js"></script>
    <script src="<?php echo e(asset('public/backend/js/zoom.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/VirtualClass/Resources/views/class/index.blade.php ENDPATH**/ ?>