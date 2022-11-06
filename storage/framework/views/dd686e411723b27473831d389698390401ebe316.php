<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo e(__('quiz.Quiz')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                    <a href="#"> <?php echo e(__('quiz.Quiz')); ?></a>
                    <a href="#"> <?php echo e(__('quiz.Question Bank')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($bank)): ?>
                <?php if(permissionCheck('question-bank.store')): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">

                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-20">
                                    <?php if(isset($bank)): ?>
                                        <?php echo e(__('common.Edit')); ?>


                                    <?php else: ?>
                                        <?php echo e(__('common.Add')); ?>

                                    <?php endif; ?>
                                    <?php echo e(__('quiz.Question Bank')); ?>

                                </h3>
                            </div>

                            <?php if(isset($bank)): ?>

                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('question-bank-update',$bank->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'question_bank'])); ?>


                            <?php else: ?>
                                <?php if(permissionCheck('question-bank.store')): ?>

                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'question-bank.store',
                                    'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'question_bank'])); ?>


                                <?php endif; ?>
                            <?php endif; ?>
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <?php if(session()->has('message-success')): ?>
                                                <div class="alert alert-success">
                                                    <?php echo e(session()->get('message-success')); ?>

                                                </div>
                                            <?php elseif(session()->has('message-danger')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(session()->get('message-danger')); ?>

                                                </div>
                                            <?php endif; ?>
                                            <label class="primary_input_label"
                                                   for="groupInput"><?php echo e(__('quiz.Group')); ?> *</label>
                                            <select <?php echo e($errors->has('group') ? ' autofocus' : ''); ?>

                                                    class="primary_select<?php echo e($errors->has('group') ? ' is-invalid' : ''); ?>"
                                                    name="group" id="groupInput">
                                                <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Group')); ?> *"
                                                        value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Group')); ?>

                                                </option>
                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($bank)): ?>
                                                        <option
                                                            value="<?php echo e($group->id); ?>" <?php echo e($group->id == $bank->q_group_id? 'selected': ''); ?>><?php echo e($group->title); ?></option>
                                                    <?php else: ?>
                                                        <option
                                                            value="<?php echo e($group->id); ?>" <?php echo e(old('group')!=''? (old('group') == $group->id? 'selected':''):''); ?> ><?php echo e($group->title); ?></option>
                                                    <?php endif; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('group')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('group')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="primary_input_label"
                                                   for="category_id"><?php echo e(__('quiz.Category')); ?> *</label>
                                            <select <?php echo e($errors->has('category') ? ' autofocus' : ''); ?>

                                                    class="primary_select <?php echo e($errors->has('category') ? ' is-invalid' : ''); ?>"
                                                    id="category_id" name="category">
                                                <option data-display=" <?php echo e(__('quiz.Category')); ?> *"
                                                        value=""> <?php echo e(__('quiz.Category')); ?>

                                                </option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($bank)): ?>
                                                        <option
                                                            value="<?php echo e($category->id); ?>" <?php echo e($bank->category_id == $category->id? 'selected': ''); ?>><?php echo e($category->name); ?></option>
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
                                        <div class="col-lg-4 mt-30-md" id="subCategoryDiv">
                                            <label class="primary_input_label"
                                                   for="subcategory_id"><?php echo e(__('quiz.Sub Category')); ?></label>
                                            <select <?php echo e($errors->has('sub_category') ? ' autofocus' : ''); ?>

                                                    class="primary_select<?php echo e($errors->has('sub_category') ? ' is-invalid' : ''); ?> select_section"
                                                    id="subcategory_id" name="sub_category">
                                                <option
                                                    data-display=" <?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Sub Category')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Sub Category')); ?>

                                                </option>

                                                <?php if(isset($bank)): ?>
                                                    <option value="<?php echo e(@$bank->subcategory_id); ?>"
                                                            selected><?php echo e(@$bank->subCategory->name); ?></option>
                                                <?php endif; ?>
                                            </select>
                                            <?php if($errors->has('sub_category')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('sub_category')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                      <input type="hidden" name="question_type" value="M">
                                    <div class="row mt-25">
                                        <div class="col-lg-4">
                                            <label class="primary_input_label"
                                                   for="question-type"><?php echo e(__('quiz.Question Type')); ?></label>
                                            <select <?php echo e($errors->has('question_type') ? ' autofocus' : ''); ?>

                                                    class="primary_select<?php echo e($errors->has('question_type') ? ' is-invalid' : ''); ?>"
                                                    name="question_type" id="question-type">
                                                <option data-display="<?php echo e(__('quiz.Question Type')); ?> *"
                                                        value=""><?php echo e(__('quiz.Question Type')); ?> *
                                                </option>

                                                <option
                                                    value="M" <?php echo e(isset($bank)? $bank->type == "M"? 'selected': '' : ''); ?>> <?php echo e(__('quiz.Multiple Choice')); ?></option>
                                                <option
                                                    value="S" <?php echo e(isset($bank)? $bank->type == "S"? 'selected': '' : ''); ?>> <?php echo e(__('quiz.Short Answer')); ?> </option>
                                                <option
                                                    value="L" <?php echo e(isset($bank)? $bank->type == "L"? 'selected': '' : ''); ?>> <?php echo e(__('quiz.Long Answer')); ?> </option>
                                            </select>
                                            <?php if($errors->has('question_type')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('question_type')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-effect">
                                                <label> <?php echo e(__('quiz.Marks')); ?> <span id="marks_required">*</span> </label>
                                                <input <?php echo e($errors->has('marks') ? ' autofocus' : ''); ?>

                                                       class="primary_input_field name<?php echo e($errors->has('marks') ? ' is-invalid' : ''); ?>"
                                                       type="number" name="marks"
                                                       value="<?php echo e(isset($bank)? $bank->marks:(old('marks')!=''?(old('marks')):'')); ?>">
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('marks')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('marks')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-4">
                                            <div class="input-effect">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('quiz.Image')); ?>

                                                    (<?php echo e(__('common.Optional')); ?>)</label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary-input filePlaceholder" type="text"
                                                           id=""
                                                           value="<?php echo e(showPicName(@$bank->image)); ?>"
                                                           <?php echo e($errors->has('image') ? 'autofocus' : ''); ?>

                                                           placeholder="<?php echo e(__('courses.Browse Image file')); ?>"
                                                           readonly="">
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                               for="document_file_thumb_2"><?php echo e(__('common.Browse')); ?></label>
                                                        <input type="file" class="d-none fileUpload" name="image"
                                                               id="document_file_thumb_2">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <label> <?php echo e(__('quiz.Question')); ?> *</label>
                                                <textarea
                                                    class="textArea lms_summernote <?php echo e(@$errors->has('details') ? ' is-invalid' : ''); ?>"
                                                    cols="30" rows="10"
                                                    name="question"><?php echo e(isset($bank)? $bank->question:(old('question')!=''?(old('question')):'')); ?></textarea>

                                                <span class="focus-border textarea"></span>
                                                <?php if($errors->has('question')): ?>
                                                    <span
                                                        class="error text-danger"><strong><?php echo e($errors->first('question')); ?></strong></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                        if(!isset($bank)){
                                            if(old('question_type') == "M"){
                                                $multiple_choice = "";
                                            }
                                        }else{
                                            if($bank->type == "M" || old('question_type') == "M"){
                                                $multiple_choice = "";
                                            }
                                        }
                                    ?>
                                    <div class="multiple-choice"
                                         id="<?php echo e(isset($multiple_choice)? $multiple_choice: 'multiple-choice'); ?>">
                                        <div class="row  mt-25">
                                            <div class="col-lg-8">
                                                <div class="input-effect">
                                                    <label> <?php echo e(__('quiz.Number Of Options')); ?>*</label>
                                                    <input <?php echo e($errors->has('number_of_option') ? ' autofocus' : ''); ?>

                                                           class="primary_input_field name<?php echo e($errors->has('number_of_option') ? ' is-invalid' : ''); ?>"
                                                           type="number" name="number_of_option" autocomplete="off"
                                                           id="number_of_option"
                                                           value="<?php echo e(isset($bank)? $bank->number_of_option: ''); ?>">
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('number_of_option')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('number_of_option')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 mt-40">
                                                <button type="button" class="primary-btn small fix-gr-bg"
                                                        id="create-option"><?php echo e(__('quiz.Create')); ?> </button>
                                            </div>
                                        </div>


                                    </div>
                                    <?php
                                        if(!isset($bank)){
                                            if(old('question_type') == "M"){
                                                $multiple_options = "";
                                            }
                                        }else{
                                            if($bank->type == "M" || old('question_type') == "M"){
                                                $multiple_options = "";
                                            }
                                        }
                                    ?>
                                    <div class="multiple-options"
                                         id="<?php echo e(isset($multiple_options)? "": 'multiple-options'); ?>">
                                        <?php
                                            $i=0;
                                            $multiple_options = [];

                                            if(isset($bank)){
                                                if($bank->type == "M"){
                                                    $multiple_options = $bank->questionMu;
                                                }
                                            }
                                        ?>
                                        <?php $__currentLoopData = $multiple_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multiple_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php $i++; ?>
                                            <div class='row  mt-25'>
                                                <div class='col-lg-10'>
                                                    <div class='input-effect'>
                                                        <label> <?php echo e(__('quiz.Option')); ?> <?php echo e($i); ?></label>
                                                        <input class='primary_input_field name' type='text'
                                                               name='option[]' autocomplete='off' required
                                                               value="<?php echo e($multiple_option->title); ?>">
                                                        <span class='focus-border'></span>
                                                    </div>
                                                </div>
                                                <div class='col-lg-2 mt-40'>
                                                    <label class="primary_checkbox d-flex mr-12 "
                                                           for="option_check_<?php echo e($i); ?>" <?php echo e(__('quiz.Yes')); ?>>
                                                        <input type="checkbox" <?php if($multiple_option->status==1): ?> checked
                                                               <?php endif; ?> id="option_check_<?php echo e($i); ?>"
                                                               name="option_check_<?php echo e($i); ?>" value="1">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php
                                        if(!isset($bank)){
                                            if(old('question_type') == "T"){
                                                $true_false = "";
                                            }
                                        }else{
                                            if($bank->type == "T" || old('question_type') == "T"){
                                                $true_false = "";
                                            }
                                        }
                                    ?>
                                    <div class="true-false" id="<?php echo e(isset($true_false)? $true_false: 'true-false'); ?>">
                                        <div class="row  mt-25">
                                            <div class="col-lg-12 d-flex">
                                                <p class="text-uppercase fw-500 mb-10"></p>
                                                <div class="d-flex radio-btn-flex">
                                                    <div class="mr-30">
                                                        <input type="radio" name="trueOrFalse" id="relationFather"
                                                               value="T"
                                                               class="common-radio relationButton" <?php echo e(isset($bank)? $bank->trueFalse == "T"? 'checked': '' : 'checked'); ?>>
                                                        <label for="relationFather"> <?php echo e(__('quiz.True')); ?> </label>
                                                    </div>
                                                    <div class="mr-30">
                                                        <input type="radio" name="trueOrFalse" id="relationMother"
                                                               value="F"
                                                               class="common-radio relationButton" <?php echo e(isset($bank)? $bank->trueFalse == "F"? 'checked': '' : ''); ?>>
                                                        <label for="relationMother"><?php echo e(__('quiz.False')); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if(!isset($bank)){
                                            if(old('question_type') == "F"){
                                                $fill_in = "";
                                            }
                                        }else{
                                            if($bank->type == "F" || old('question_type') == "F"){
                                                $fill_in = "";
                                            }
                                        }
                                    ?>

                                    <div class="multiple-choice"
                                         id="<?php echo e(isset($multiple_choice)? $multiple_choice: 'multiple-choice'); ?>">
                                        <div class="row  mt-25">
                                            <div class="col-lg-12">
                                                <div class="input-effect">
                                                    <label> <?php echo e(__('quiz.Explanation')); ?> *</label>
                                                    <textarea
                                                        class="textArea lms_summernote <?php echo e(@$errors->has('details') ? ' is-invalid' : ''); ?>"
                                                        cols="30" rows="10"
                                                        name="explanation"><?php echo e(isset($bank)? $bank->explanation:(old('explanation')!=''?(old('explanation')):'')); ?></textarea>

                                                    <span class="focus-border textarea"></span>
                                                    <?php if($errors->has('explanation')): ?>
                                                        <span
                                                            class="error text-danger"><strong><?php echo e($errors->first('explanation')); ?></strong></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $tooltip = "";
                                          if (permissionCheck('question-bank.store')){
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
                                                <?php if(isset($bank)): ?>
                                                    <?php echo e(__('common.Update')); ?>

                                                <?php else: ?>
                                                    <?php echo e(__('common.Save')); ?>

                                                <?php endif; ?>
                                                <?php echo e(__('quiz.Question')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <div class="modal fade admin-query" id="deleteBank">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('common.Delete')); ?> </h4>
                    <button type="button" class="close" data-dismiss="modal"><i
                            class="ti-close "></i></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo e(route('question-bank-delete')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="text-center">

                            <h4><?php echo e(__('common.Are you sure to delete ?')); ?> </h4>
                        </div>
                        <input type="hidden" name="id" value="" id="classQusId">
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
    <script>
        $('#question-type').change(function (e) {
            var type = $('#question-type').val();

            if (type == "M") {
                $('.multiple-choice').show();
                $('.multiple-options').show();
            } else {
                $('.multiple-choice').hide();
                $('.multiple-options').hide();

            }

            if (type == "S") {
                $('#marks_required').hide();
            } else {
                $('#marks_required').show();
            }
        });
        $('#question-type').trigger('change')
    </script>
    <script src="<?php echo e(asset('/')); ?>/Modules/CourseSetting/Resources/assets/js/course.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Quiz/Resources/views/question_bank.blade.php ENDPATH**/ ?>