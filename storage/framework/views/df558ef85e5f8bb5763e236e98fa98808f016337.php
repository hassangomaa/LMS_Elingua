<?php $__env->startSection('mainContent'); ?>
    <input type="text" hidden value="<?php echo e(@$clas->class_name); ?>" id="cls">
    <input type="text" hidden value="<?php echo e(@$sec->section_name); ?>" id="sec">
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo e(__('quiz.Online Quiz')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('quiz.Quiz')); ?></a>
                    <a href="#"> <?php echo e(__('quiz.Online Quiz')); ?> </a>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="white-box mb-30">
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => false,  'method' => 'GET','id' => 'search_student'])); ?>

                <div class="row">

                    <div class="col-lg-4 mt-30-md md_mb_20">
                        <label class="primary_input_label" for="category_id"><?php echo e(__('common.Type')); ?></label>
                        <select class="primary_select "
                                id="category_id" name="type">
                            <option data-display=" <?php echo e(__('common.Select')); ?>" value=""> <?php echo e(__('common.Type')); ?>

                            </option>
                            <option value="Course" <?php echo e($type=='Course'?'selected':''); ?>>Course</option>
                            <option value="Quiz" <?php echo e($type=='Quiz'?'selected':''); ?>>Quiz</option>
                        </select>

                    </div>


                    <div class="col-lg-4 mt-100-md md_mb_20">
                        <label class="primary_input_label" for="" style="    height: 30px;"></label>
                        <button type="submit" class="primary-btn small fix-gr-bg">
                            <span class="ti-search pr-2"></span>
                            <?php echo e(__('quiz.Search')); ?>

                        </button>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>

    <section class="mt-20 admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-40">
                <div class="col-lg-6 col-md-6">
                    <div class="box_header">
                        <div class="main-title mb_xs_20px">
                            <h3 class="mb-0 mb_xs_20px"> <?php echo e(__('quiz.Result')); ?> <?php echo e(__('common.View')); ?> </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="QA_section QA_section_heading_custom check_box_table">
                <div class="QA_table ">

                    <table id="lms_table" class="table Crm_table_active3">
                        <thead>
                        <tr>
                            <th><?php echo e(__('common.SL')); ?> </th>
                            <th> <?php echo e(__('common.Date')); ?> </th>
                            <th> <?php echo e(__('quiz.Student')); ?> </th>
                            <th> <?php echo e(__('quiz.Status')); ?> </th>
                            <th> <?php echo e(__('quiz.Result')); ?> </th>
                            <th> <?php echo e(__('quiz.Duration')); ?> </th>
                            <th> <?php echo e(__('quiz.Obtain Marks')); ?> </th>
                            <th> <?php echo e(__('common.Action')); ?> </th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php $__currentLoopData = $student_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php
                                    if (($student['status']==1)){
        $totalQus = totalQuizQus($student['quiz_id']);
                                                  $totalAns = count($student['quizDetails']);
                                                  $totalScore = totalQuizMarks($student['quiz_id']);
                                                  $score = 0;
                                                  if ($totalAns != 0) {
                                                      foreach ($student['quizDetails'] as $test) {
                                                           if ($test->status == 1) {
                                                                  $score += $test->mark ?? 1;
                                                              }

                                                      }
                                                  }
    }else{
        $score='--';
    }


                                ?>
                                <td> <?php echo e(++$key); ?> </td>
                                <td> <?php echo e($student['date']); ?> </td>
                                <td> <?php echo e($student['name']); ?> </td>
                                <td> <?php echo e($student['status']==1?'Publish':'Pending'); ?> </td>
                                <td>
                                    <?php if($student['status']==1): ?>
                                        <?php echo e($student['pass']==1?'Pass':'Fail'); ?>

                                    <?php else: ?>
                                        --
                                    <?php endif; ?>
                                </td>
                                <td> <?php echo e($student['duration']); ?> Min</td>

                                <td> <?php echo e(@$score); ?> </td>


                                <td>

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
                                               href="<?php echo e(route('markingScript', [$student['test_id']])); ?>">
                                                <?php echo e(__('quiz.View Marking Script')); ?>

                                            </a>
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
    </section>





<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('/')); ?>/Modules/Quiz/Resources/assets/js/quiz.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Quiz/Resources/views/online_exam_enrolled.blade.php ENDPATH**/ ?>