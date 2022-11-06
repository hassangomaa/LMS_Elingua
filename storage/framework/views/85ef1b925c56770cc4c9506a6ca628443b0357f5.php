<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('quiz.Quiz')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="<?php echo e(route('online-quiz')); ?>"><?php echo e(__('quiz.Quiz')); ?></a>
                    <a href="<?php echo e(route("manage_online_exam_question", [$online_exam->id])); ?>"> <?php echo e(__('quiz.Quiz Question')); ?> </a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row">
                <?php if(empty($online_exam->group_id)): ?>
                    <div class="col-lg-12 mb-30">
                        <div class="white_box mb_20">
                            <div class="white_box_tittle list_header">
                                <h4><?php echo e(__('quiz.filterBy')); ?> </h4>
                            </div>
                            <form action="" method="GET">
                                <div class="row">

                                    <div class="col-lg-6 mt-20">

                                        <select class="primary_select" name="group" id="">
                                            <option data-display="<?php echo e(__('quiz.selectGroup')); ?>"
                                                    value=""> <?php echo e(__('quiz.selectGroup')); ?></option>
                                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($group->id); ?>" <?php echo e($group->id==$searchGroup?'selected':''); ?>> <?php echo e($group->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        <div class="search_course_btn ">
                                            <br>
                                            <button type="submit"
                                                    class="primary-btn radius_30px mr-10 fix-gr-bg"><?php echo e(__('courses.Filter')); ?> </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-8 mt--1">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3><?php echo e(__('quiz.Question List')); ?>

                                </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'online_exam_question_assign',
                            'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'student_form'])); ?>

                    <input type="hidden" id="online_exam_id" name="online_exam_id" value="<?php echo e(@$online_exam->id); ?>">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <div class="row">
                                <div class="col-md-12">
                                    Auto result only allow in MCQ
                                </div>
                            </div>
                            <table id="lms_table" class="table quiz_assign_table">
                                <thead>
                                <?php if(session()->has('message-success') != "" ||
                                session()->get('message-danger') != ""): ?>
                                    <tr>
                                        <td colspan="6">
                                            <?php if(session()->has('message-success')): ?>
                                                <div class="alert alert-success">
                                                    <?php echo e(session()->get('message-success')); ?>

                                                </div>
                                            <?php elseif(session()->has('message-danger')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(session()->get('message-danger')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>


                                        <label class="primary_checkbox d-flex  "
                                               for="questionSelectAll">
                                            <input type="checkbox"
                                                   id="questionSelectAll"
                                                   value=""
                                                   <?php if(count($question_banks)==count($already_assigned)): ?> checked <?php endif; ?>
                                                   class="common-checkbox selectAllQuiz">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th> <?php echo e(__('quiz.Group')); ?> </th>
                                    <th><?php echo e(__('quiz.Question Type')); ?></th>
                                    <th><?php echo e(__('quiz.Question')); ?></th>
                                    <th><?php echo e(__('quiz.Marks')); ?></th>
                                    <th><?php echo e(__('quiz.Image')); ?></th>
                                                                         <th><?php echo e(__('common.Action')); ?></th> 
                                </tr>
                                </thead>
                                <tbody>

                                <?php $total_marks = 0; ?>
                                <?php $__currentLoopData = $question_banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question_bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php $total_marks += $question_bank->mark; ?>
                                    <tr class="abc">
                                        <td>
                                            <label class="primary_checkbox d-flex  "
                                                   for="question<?php echo e(@$question_bank->id); ?>">
                                                <input type="checkbox" name="questions[]"
                                                       id="question<?php echo e(@$question_bank->id); ?>"
                                                       value="<?php echo e(@$question_bank->id); ?>"
                                                       <?php echo e(in_array(@$question_bank->id, @$already_assigned)? 'checked': ''); ?>

                                                       class="common-checkbox question">
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                        <td><?php echo e(@$question_bank->questionGroup !=""?@$question_bank->questionGroup->title:""); ?></td>
                                        <td>
                                            <?php
                                                if (@$question_bank->type == "M") {
                                               echo trans('quiz.Multiple Choice');
                                               } elseif (@$question_bank->type == "S") {
                                               echo trans('quiz.Short Answer');
                                               } elseif (@$question_bank->type == "L") {
                                               echo trans('quiz.Long Answer');
                                               } else {
                                               echo trans('quiz.Fill In The Blanks');
                                               }
                                            ?>
                                        </td>
                                        <td><?php echo $question_bank->question; ?></td>
                                        <td><?php echo e(@$question_bank->marks); ?></td>
                                        <td>
                                            <?php if(!empty($question_bank->image)): ?>
                                                <img style="max-width: 150px;" src="<?php echo e(asset($question_bank->image)); ?>">
                                            <?php endif; ?>
                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

                <div class="col-lg-4 mt--1">
                    <div class="row">
                        <div class="col-lg-12 no-gutters">
                            <div class="main-title">
                                <h3> <?php echo e(__('quiz.Quiz Details')); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row student-details">
                        <div class="col-lg-12">
                            <div class="student-meta-box mt_25">
                                <div class=" staff-meta-top"></div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="single-meta mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="value text-left">
                                                            <?php echo e(__('coupons.Title')); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="name">
                                                            <?php echo e($online_exam->title); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="single-meta">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="value text-left">
                                                            <?php echo e(__('quiz.Passing %')); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="name">
                                                            <?php echo e(@$online_exam->percentage); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-meta">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="value text-left">
                                                            <?php echo e(__('quiz.Total Marks')); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="name" id="totalMarks">
                                                            <?php echo e(@$online_exam->total_marks); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="single-meta">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="value text-left">
                                                            <?php echo e(__('quiz.Total Questions')); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="name" id="totalQuestions">
                                                            <?php echo e(@$online_exam->total_questions); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade admin-query" id="deleteOnlineExamQuestion">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.item'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="ti-close "></i></button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                        <?php echo e(Form::open(['route' => 'online-exam-question-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" id="online_exam_question_id">
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <input type="hidden" name="ques_assign" class="ques_assign"
           value="<?php echo e(route('online_exam_question_assign_by_ajax')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('public/backend/js/manage_quiz.js')); ?>"></script>
    <script>

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Quiz/Resources/views/manage_quiz.blade.php ENDPATH**/ ?>