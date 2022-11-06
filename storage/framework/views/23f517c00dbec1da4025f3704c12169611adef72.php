<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo e(__('quiz.Quiz')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('quiz.Quiz')); ?></a>
                    <a href="#"> <?php echo e(__('quiz.Online Quiz')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3 mb_20">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-20"><?php if(isset($online_exam)): ?>
                                        <?php echo e(__('common.Edit')); ?>


                                    <?php else: ?>
                                        <?php echo e(__('common.Add')); ?>

                                    <?php endif; ?>
                                    <?php echo e(__('quiz.Online Quiz')); ?>

                                </h3>
                            </div>
                            <?php if(isset($online_exam)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('online-exam-update',$online_exam->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php if(permissionCheck('set-quiz.store')): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'online-exam',
                                    'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

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
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <div class="input-effect">
                                                            <label> <?php echo e(__('quiz.Quiz Title')); ?> <span>*</span></label>
                                                            <input <?php echo e($errors->has('title') ? ' autofocus' : ''); ?>

                                                                   class="primary_input_field name<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                                                                   type="text" name="title[<?php echo e($language->code); ?>]"
                                                                   autocomplete="off"
                                                                   value="<?php echo e(isset($online_exam)? $online_exam->getTranslation('title',$language->code): ''); ?>">
                                                            <input type="hidden" name="id"
                                                                   value="<?php echo e(isset($online_exam)? $online_exam->id: ''); ?>">
                                                            <span class="focus-border"></span>
                                                            <?php if($errors->has('title')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('title')); ?></strong>
                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-25">
                                                    <div class="col-lg-12">
                                                        <div class="input-effect">
                                                            <label><?php echo e(__('quiz.Instruction')); ?> <span>*</span></label>
                                                            <textarea
                                                                <?php echo e($errors->has('instruction') ? ' autofocus' : ''); ?>

                                                                class="primary_input_field name<?php echo e($errors->has('instruction') ? ' is-invalid' : ''); ?>"
                                                                cols="0" rows="4"
                                                                name="instruction[<?php echo e($language->code); ?>]"><?php echo e(isset($online_exam)? $online_exam->getTranslation('instruction',$language->code): ''); ?></textarea>
                                                            <span class="focus-border textarea"></span>
                                                            <?php if($errors->has('instruction')): ?>
                                                                <span
                                                                    class="error text-danger"><strong><?php echo e($errors->first('instruction')); ?></strong></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label"
                                                   for="category_id"><?php echo e(__('quiz.Category')); ?></label>
                                            <select <?php echo e($errors->has('class') ? ' autofocus' : ''); ?>

                                                    class="primary_select <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                    id="category_id" name="category">
                                                <option data-display="<?php echo e(__('quiz.Category')); ?> *"
                                                        value=""><?php echo e(__('quiz.Category')); ?> *
                                                </option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($online_exam)): ?>
                                                        <option value="<?php echo e($category->id); ?>"
                                                                <?php if($category->id==$online_exam->category_id): ?> selected <?php endif; ?> ><?php echo e($category->name); ?></option>

                                                    <?php else: ?>

                                                        <option
                                                            value="<?php echo e($category->id); ?>" <?php echo e(old('category')!=''? (old('category') == $category->id? 'selected':''):''); ?>><?php echo e($category->name); ?></option>
                                                    <?php endif; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('class')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('class')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12 mt-30-md" id="subCategoryDiv">
                                            <label class="primary_input_label"
                                                   for="subcategory_id  "><?php echo e(__('quiz.Sub Category')); ?></label>
                                            <select <?php echo e($errors->has('sub_category') ? ' autofocus' : ''); ?>

                                                    class="primary_select<?php echo e($errors->has('sub_category') ? ' is-invalid' : ''); ?> select_section"
                                                    id="subcategory_id" name="sub_category">
                                                <option
                                                    data-display=" <?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Sub Category')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Sub Category')); ?>

                                                </option>

                                                <?php if(isset($online_exam)): ?>
                                                    <option value="<?php echo e(@$online_exam->sub_category_id); ?>"
                                                            selected><?php echo e(@$online_exam->subCategory->name); ?></option>
                                                <?php endif; ?>
                                            </select>
                                            <?php if($errors->has('sub_category')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('sub_category')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-12 mt-30-md">
                                            <label class="primary_input_label"
                                                   for="group_id"><?php echo e(__('quiz.Group')); ?></label>
                                            <select <?php echo e($errors->has('group_id') ? ' autofocus' : ''); ?>

                                                    class="primary_select<?php echo e($errors->has('group_id') ? ' is-invalid' : ''); ?> select_section"
                                                    id="group_id" name="group_id">
                                                <option
                                                    data-display=" <?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Group')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Group')); ?>

                                                </option>

                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"
                                                        <?php echo e(isset($online_exam)? $online_exam->group_id==$key?'selected':'':''); ?>

                                                    ><?php echo e($group); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('group_id')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('group_id')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <label><?php echo e(__('quiz.Minimum Percentage')); ?> *</label>
                                                <input <?php echo e($errors->has('title') ? ' percentage' : ''); ?>

                                                       class="primary_input_field name<?php echo e($errors->has('percentage') ? ' is-invalid' : ''); ?>"
                                                       type="number" name="percentage" autocomplete="off"
                                                       value="<?php echo e(isset($online_exam)? $online_exam->percentage: old('percentage')); ?>">
                                                                                                 <input type="hidden" name="id" 
                                                                                                        value="<?php echo e(isset($group)? $group->id: ''); ?>"> 
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('percentage')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('percentage')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>


                                    <?php if(!isset($online_exam)): ?>
                                        <div class="row mt-25">
                                            <div class="col-lg-12">
                                                <label><?php echo e(__('quiz.Set Random Question')); ?> <span>*</span></label>
                                            </div>
                                            <div class="col-lg-12 ">
                                                <div class="d-flex radio-btn-flex">
                                                    <div class="mr-30 row mb-25">
                                                        <div class="col-md-12">
                                                            <label for="set_random_question"
                                                                   class="primary_checkbox d-flex mr-12">
                                                                <input type="radio" name="set_random_question"
                                                                       id="set_random_question" value="1"
                                                                       class="common-radio set_random_question relationButton">
                                                                <span class="checkmark mr-2"></span> <?php echo e(__('quiz.Yes')); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mr-30 row mb-25">
                                                        <div class="col-md-12">
                                                            <label for="set_random_question2"
                                                                   class="primary_checkbox d-flex mr-12">
                                                                <input type="radio" name="set_random_question"
                                                                       id="set_random_question2" value="0" checked
                                                                       class="common-radio set_random_question relationButton">

                                                                <span class="checkmark mr-2"></span> <?php echo e(__('quiz.No')); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12   set_random_question_box d-none">
                                                <div class="input-effect">
                                                    <label> <?php echo e(__('quiz.Number Of Question')); ?>

                                                        <small>(<?php echo e(__('quiz.Total Questions')); ?> <span
                                                                id="TotalQuiz">0</span>)</small><span>*</span></label>
                                                    <input
                                                        class="primary_input_field name<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                                                        id="random_question_number" type="number" name="random_question"
                                                        autocomplete="off" min="0"
                                                        max="0"
                                                        value="0">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <label><?php echo e(__('quiz.Change Default Settings')); ?></label>
                                        </div>
                                        <div class="col-lg-12 ">

                                            <div class="d-flex radio-btn-flex  ">
                                                <div class="mr-30  mb-25 ">

                                                    <label class="primary_checkbox d-flex mr-12"
                                                           for="change_default_settings">
                                                        <input type="radio" name="change_default_settings"
                                                               id="change_default_settings" value="1"
                                                               <?php if(isset($online_exam)): ?> checked
                                                               <?php endif; ?> class="common-radio change-default-settings relationButton">
                                                        <span class="checkmark mr-2"></span> <?php echo e(__('quiz.Yes')); ?>

                                                    </label>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mr-30  mb-25 ">
                                                        <label class="primary_checkbox d-flex mr-12"
                                                               for="change_default_settings2">
                                                            <input type="radio" name="change_default_settings"
                                                                   id="change_default_settings2" value="0"
                                                                   <?php if(!isset($online_exam)): ?> checked
                                                                   <?php endif; ?>  class="common-radio change-default-settings relationButton">
                                                            <span class="checkmark mr-2"></span> <?php echo e(__('quiz.No')); ?>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        if (isset($online_exam)){
                            $type=$online_exam->question_time_type;
                            $question_time=$online_exam->question_time;
                            $question_review=$online_exam->question_review;
                            $show_result_each_submit=$online_exam->show_result_each_submit;
                            $random_question=$online_exam->random_question;
                            $multiple_attend=$online_exam->multiple_attend;
                            $show_ans_with_explanation=$online_exam->show_ans_with_explanation;
                                        }else{
                            $type=$quiz_setup->set_per_question_time == 1 ? 0 : 1;
                            $question_time=$quiz_setup->set_per_question_time == 1 ? $quiz_setup->time_per_question : $quiz_setup->time_total_question;
                            $question_review=$quiz_setup->question_review;
                            $show_result_each_submit=$quiz_setup->show_result_each_submit;
                            $random_question=$quiz_setup->random_question;
                            $multiple_attend=$quiz_setup->multiple_attend;
                            $show_ans_with_explanation=$quiz_setup->show_ans_with_explanation;
                                        }
                                    ?>

                                    <div class="row mb-25 mt-25 default-settings"
                                         style=" <?php if(!isset($online_exam)): ?>display:  none <?php endif; ?>">

                                        <div class="col-lg-12 mb-25">

                                            <div class="form-group" id="per_question_time">
                                                <label
                                                    for="question_time_type"><?php echo e(trans('quiz.Question Time Type')); ?></label>
                                                <select <?php echo e($errors->has('class') ? ' autofocus' : ''); ?>

                                                        class="primary_select <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                        id="question_time_type" name="type">
                                                    <option
                                                        value="0" <?php echo e($type==0?'selected':''); ?>><?php echo e(__('quiz.Per Question Time')); ?></option>
                                                    <option
                                                        value="1" <?php echo e($type==1?'selected':''); ?>><?php echo e(__('quiz.Total Question Time')); ?></option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-lg-12 mb-25">
                                            <div class="input-effect">
                                                <label><?php echo e(__('quiz.Time')); ?> (<?php echo e(__('quiz.In Min')); ?>)
                                                    <span>*</span></label>
                                                <input
                                                    class="primary_input_field name<?php echo e($errors->has('question_time') ? ' is-invalid' : ''); ?>"
                                                    type="number" name="question_time" autocomplete="off"
                                                    min="0"
                                                    step="any"
                                                    value="<?php echo e($question_time); ?>">

                                                <?php if($errors->has('question_time')): ?>
                                                    <span
                                                        class="error text-danger"><strong><?php echo e($errors->first('question_time')); ?></strong></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-12  ">
                                            <ul class="permission_list">
                                                <li class="mb-0">
                                                    <label class="primary_checkbox d-flex mr-12 "
                                                           for="questionReview">
                                                        <input name="question_review"
                                                               <?php if(@$question_review==1): ?> checked
                                                               <?php endif; ?> value="1" id="questionReview"
                                                               onChange="changeQuestionReview()"
                                                               type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="mb-0"
                                                           for="#set_question_time"><?php echo e(trans('quiz.Question Review')); ?> </label>
                                                </li>
                                                <small id="helpId"
                                                       class="form-text text-muted"><?php echo e(trans('quiz.Note')); ?>

                                                    : <?php echo e(trans('quiz.If you enable this option, show result: after each submit will disabled')); ?></small>
                                            </ul>
                                        </div>
                                        <?php
                                            if($question_review!=1){
                                                    $show_result_each='';
                                            }else{
                                                $show_result_each='style=display:none';
                                            }
                                        ?>
                                        <div class="col-lg-12 " <?php echo e(@$show_result_each); ?> id="showResultDiv">
                                            <ul class="permission_list">
                                                <li>
                                                    <label class="primary_checkbox d-flex mr-12 ">
                                                        <input name="show_result_each_submit"
                                                               <?php if(@$show_result_each_submit==1): ?> checked
                                                               <?php endif; ?> value="1" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="mb-0"
                                                           for="#set_question_time"><?php echo e(trans('quiz.Show Results After Each Submit')); ?> </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12   ">
                                            <ul class="permission_list">
                                                <li>
                                                    <label class="primary_checkbox d-flex mr-12 ">
                                                        <input name="random_question"
                                                               <?php if(@$random_question==1): ?> checked
                                                               <?php endif; ?> value="1" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="mb-0"
                                                           for="#set_question_time"><?php echo e(trans('quiz.Random Question')); ?> </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12   ">
                                            <ul class="permission_list">
                                                <li>
                                                    <label class="primary_checkbox d-flex mr-12 ">
                                                        <input name="multiple_attend"
                                                               <?php if(@$multiple_attend==1): ?> checked
                                                               <?php endif; ?> value="1" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="mb-0"
                                                           for="#set_question_time"><?php echo e(trans('quiz.Multiple Attend')); ?> </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12   ">
                                            <ul class="permission_list">
                                                <li>
                                                    <label class="primary_checkbox d-flex mr-12 ">
                                                        <input name="show_ans_with_explanation"
                                                               <?php if(@$show_ans_with_explanation==1): ?> checked
                                                               <?php endif; ?> value="1" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="mb-0"
                                                           for="#set_question_time"><?php echo e(trans('quiz.Same Page Show Question & Explanation')); ?> </label>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>


                                    <?php
                                        $tooltip = "";
                                          if (permissionCheck('set-quiz.store')){
                                              $tooltip = "";
                                          }else{
                                              $tooltip = "You have no permission to add";
                                          }
                                    ?>

                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                    title="<?php echo e($tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($online_exam)): ?>
                                                    <?php echo e(__('common.Update')); ?>

                                                <?php else: ?>
                                                    <?php echo e(__('common.Save')); ?>

                                                <?php endif; ?>
                                                <?php echo e(__('quiz.Online Quiz')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="url" value="<?php echo e(Request::url()); ?>">
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="main-title">
                        <h3 class="mb-20"><?php echo e(__('quiz.Online Quiz List')); ?></h3>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">

                            <table id="lms_table" class="table Crm_table_active3">

                                <thead>
                                <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                    <tr>
                                        <td colspan="6">
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
                                    <th><?php echo e(__('coupons.Title')); ?> </th>
                                    <th><?php echo e(__('quiz.Group')); ?> </th>
                                    <th><?php echo e(__('quiz.Category')); ?> </th>
                                    <th><?php echo e(__('common.Status')); ?> </th>
                                    <th><?php echo e(__('common.Action')); ?> </th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php $__currentLoopData = $online_exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $online_exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($online_exam->title); ?></td>
                                        <td><?php echo e($online_exam->group->title); ?></td>
                                        <td>

                                            <?php echo e(@$online_exam->category->name); ?>

                                            /<?php echo e(@$online_exam->subCategory->name); ?>

                                        </td>
                                        <td>
                                            <?php if($online_exam->status == 0): ?>
                                                <button
                                                    class="primary-btn small bg-warning text-white border-0"><?php echo e(__('quiz.Pending')); ?> </button>
                                            <?php else: ?>
                                                <button
                                                    class="primary-btn small bg-success text-white border-0"><?php echo e(__('quiz.Published')); ?></button>
                                            <?php endif; ?>
                                        </td>
                                        <td style="width: 30%">
                                            <div class="dropdown CRM_dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenu2<?php echo e($online_exam->id); ?>"
                                                        data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <?php echo e(__('common.Select')); ?>

                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <?php
                                                        $is_set_online_exam_questions = DB::table('online_exam_question_assigns')->where('online_exam_id', $online_exam->id)->first();
                                                    ?>
                                                    <?php if(!empty($is_set_online_exam_questions)): ?>
                                                        <?php if(permissionCheck('set-quiz.manage-question')): ?>
                                                            <a class="dropdown-item"
                                                               href="<?php echo e(route("manage_online_exam_question", [$online_exam->id])); ?>"><?php echo e(__('quiz.Manage Question')); ?></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($online_exam->status == 1): ?>
                                                        <a class="dropdown-item"
                                                           href="<?php echo e(route("enrolledStudent", [$online_exam->id])); ?>"><?php echo e(__('quiz.Mark Register')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(permissionCheck('set-quiz.edit')): ?>

                                                        <a class="dropdown-item"
                                                           href="<?php echo e(route("online-exam-edit",$online_exam->id)); ?>"> <?php echo e(__('common.Edit')); ?> </a>

                                                    <?php endif; ?>
                                                    <?php if(permissionCheck('set-quiz.delete')): ?>

                                                        <a class="dropdown-item deleteOnlineExam"
                                                           data-toggle="modal"
                                                           href="#" data-id="<?php echo e($online_exam->id); ?>"
                                                           data-target="#deleteOnlineExam"><?php echo e(__('common.Delete')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(empty($is_set_online_exam_questions)): ?>
                                                        <?php if(permissionCheck('set-quiz.set-question')): ?>
                                                            <a class="dropdown-item"
                                                               href="<?php echo e(route("manage_online_exam_question", [$online_exam->id])); ?>">
                                                                <?php echo e(__('Set')); ?>  <?php echo e(__('quiz.Question')); ?>

                                                            </a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if($online_exam->status == 0): ?>
                                                            <?php if(permissionCheck('set-quiz.publish-now')): ?>
                                                                <a class="dropdown-item"
                                                                   href="<?php echo e(route('online_exam_publish', [$online_exam->id])); ?>">
                                                                    <?php echo e(__('quiz.Published Now')); ?>

                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                </div>

                                            </div>

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
    </section>

    <div class="modal fade admin-query" id="deleteOnlineExam">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> <?php echo e(__('common.Delete')); ?>  <?php echo e(__('quiz.Quiz')); ?>  </h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="ti-close "></i></button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo e(__('common.Are you sure to delete ?')); ?></h4>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>
                        <?php echo e(Form::open(['route' => 'online-exam-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" id="online_exam_id">
                        <button class="primary-btn fix-gr-bg" type="submit">  <?php echo e(__('common.Delete')); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('/')); ?>/Modules/Quiz/Resources/assets/js/quiz.js<?php echo e(assetVersion()); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Quiz/Resources/views/online_quiz.blade.php ENDPATH**/ ?>