<?php $__env->startSection('mainContent'); ?>




    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('quiz.Question')); ?> <?php echo e(__('quiz.Bulk Import')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?> </a>
                    <a href="#"><?php echo e(__('quiz.Quiz')); ?></a>
                    <a href="#"><?php echo e(__('quiz.Bulk Import')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="box_header">
                <div class="main-title d-flex justify-content-between w-100">
                    <h3 class="mb-0 mr-30">  <?php echo e(__('quiz.Bulk Import')); ?></h3>

                    <div class="">
                        <a href="<?php echo e(route('download-sample')); ?>" class="primary-btn small fix-gr-bg float-right ml-2">
                            <span class="ti-plus pr-2"></span>
                            <?php echo e(__('quiz.Sample Download')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="mb-40 student-details">
        <div class="container-fluid p-0">
            <div class="row">

                <div class="col-lg-12">


                    <form class="form-horizontal" action="<?php echo e(route('question-bank-bulk-submit')); ?>" method="POST"
                          enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <div class="white-box">

                            <div class="col-md-12 p-0">

                                <div class="row mb-30">
                                    <div class="col-md-12">

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <p>
                                                    <pl>
                                                        <li>01. You need to import Excel File. For sample you can
                                                            download by clicking <b>Sample Download</b></li>
                                                        <li>02. Make sure input correct answer in right column.</li>
                                                        <li>03. Use Type <b>M</b>= Multiple Choice; <b>S</b>=Short
                                                            Answer; <b>L</b>=Long Answer
                                                        </li>
                                                    </pl>
                                                </p>
                                                <hr>
                                            </div>

                                            <div class="col-xl-3">

                                                <label class="primary_input_label"
                                                       for="groupInput"><?php echo e(__('quiz.Group')); ?> *</label>

                                                <select <?php echo e($errors->has('group') ? ' autofocus' : ''); ?>

                                                        class="primary_select<?php echo e($errors->has('group') ? ' is-invalid' : ''); ?>"
                                                        name="group" id="groupInput">
                                                    <option
                                                        data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Group')); ?> *"
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
                                            </div>

                                            <div class="col-xl-3">
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
                                            </div>

                                            <div class="col-xl-3">
                                                <div class="col-lg-12 mt-30-md" id="subCategoryDiv">
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
                                                </div>
                                            </div>
                                            <div class="col-xl-3">

                                                <label class="primary_input_label"
                                                       for="groupInput"><?php echo e(__('quiz.Excel File')); ?> *</label>
                                                <div class="primary_input mb-35">
                                                    <div class="primary_file_uploader">

                                                        <label for="placeholderFileOneName" class="d-none"></label>
                                                        <input class="primary-input" type="text"
                                                               id="placeholderFileOneName"
                                                               placeholder="<?php echo e(__('quiz.Browse Excel File')); ?>"
                                                               readonly="">
                                                        <button class="" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                   for="document_file_1"><?php echo e(__('common.Browse')); ?></label>
                                                            <input type="file" class="d-none" name="excel_file"
                                                                   id="document_file_1"
                                                                   onchange="nameChange(this.value)">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="row justify-content-center">

                                            <?php if(session()->has('message-success')): ?>
                                                <p class=" text-success">
                                                    <?php echo e(session()->get('message-success')); ?>

                                                </p>
                                            <?php elseif(session()->has('message-danger')): ?>
                                                <p class=" text-danger">
                                                    <?php echo e(session()->get('message-danger')); ?>

                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button id="submitBtn" type="submit" disabled
                                            class="btn primary_btn_2"><?php echo e(__('quiz.Bulk Import')); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('Modules/Appearance/Resources/assets/js/script.js')); ?>"></script>
    <script src="<?php echo e(asset('Modules/Quiz/Resources/assets/js/quiz.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Quiz/Resources/views/bulk-import.blade.php ENDPATH**/ ?>