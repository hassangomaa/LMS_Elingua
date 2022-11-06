<?php
    $category=request()->get('category');
    $required_type=request()->get('required_type');
    $type=request()->get('type');
    $mode_of_delivery=request()->get('mode_of_delivery');
    $job_position=request()->get('job_position');
    $org_branch_code_search=request()->get('org_branch_code_search');
    $student_status=request()->get('student_status');
    if (!$mode_of_delivery){
        $mode_of_delivery =1;
    }
    if (!$student_status){
        $student_status =1;
    }
    if (!$type){
        $type =1;
    }
    $parem ='?student_status='.$student_status.'&category='.$category. '&type='.$type. '&required_type='.$required_type.'&mode_of_delivery='.$mode_of_delivery.'&org_branch_code_search='.$org_branch_code_search.'&job_position='.$job_position;
    $url = route('course.courseStatisticsCourseData').$parem;
    $url2 = route('course.courseStatisticsQuizData').$parem;

?>


<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/student_list.css')); ?>"/>
    <style>
        .progress-bar {
            background-color: #9734f2;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>

    <div class="container-fluid p-0 ">
        <section class="sms-breadcrumb white-box" style="margin-bottom: 80px">
            <div class="container-fluid">
                <div class="row justify-content-between">
                    <h1><?php echo e(__('courses.Course Statistics')); ?></h1>
                    <div class="bc-pages">
                        <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                        <a href="#"><?php echo e(__('courses.Courses')); ?></a>
                        <a href="#"><?php echo e(__('courses.Course Statistics')); ?></a>
                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="white_box_tittle list_header">
                        <h4><?php echo e(__('courses.Advanced Filter')); ?> </h4>
                    </div>
                    <form action="<?php echo e(route('course.courseStatistics')); ?>" method="GET">
                        <div class="row">

                            <div class="col-lg-3 mt-30">

                                <label class="primary_input_label" for="category"><?php echo e(__('courses.Category')); ?></label>
                                <select class="primary_select" name="category" id="category">
                                    <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Category')); ?>"
                                            value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Category')); ?></option>
                                    <?php $__currentLoopData = $categories->where('parent_id',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('coursesetting::parts_of_course_details.category_select_option',['category'=>$category,'level'=>1,'category_search'=>request('category')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-lg-3 mt-30">
                                <label class="primary_input_label"
                                       for="type"><?php echo e(__('courses.Course')); ?> <?php echo e(__('common.Type')); ?></label>
                                <select class="primary_select" name="type"
                                        id="type">
                                                                         <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('common.Type')); ?>" 
                                                                                 value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Type')); ?></option> 
                                    <option
                                        value="1" <?php echo e(request()->get('type')=="1"?'selected':''); ?>><?php echo e(__('courses.Course')); ?> </option>
                                    <option
                                        value="2" <?php echo e(request()->get('type')=="2"?'selected':''); ?>> <?php echo e(__('quiz.Quiz')); ?></option>
                                </select>

                            </div>
                            <?php if(isModuleActive('Org')): ?>
                                <div class="col-lg-3 mt-30">
                                    <label class="primary_input_label"
                                           for="required_type"><?php echo e(__('courses.Required Type')); ?></label>
                                    <select class="primary_select" name="required_type"
                                            id="required_type">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Required Type')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Required Type')); ?></option>
                                        <option
                                            value="1" <?php echo e(request()->get('required_type')=="1"?'selected':''); ?>><?php echo e(__('courses.Compulsory')); ?> </option>
                                        <option
                                            value="0" <?php echo e(request()->get('required_type')=="0"?'selected':''); ?>> <?php echo e(__('courses.Open')); ?></option>
                                    </select>

                                </div>

                                <div class="col-lg-3 mt-30">

                                    <label class="primary_input_label"
                                           for="status"><?php echo e(__('courses.Delivery Mode')); ?></label>
                                    <select class="primary_select" name="delivery_mode" id="status">

                                        <option
                                            value="1" <?php echo e(request('delivery_mode')=="1"?'selected':''); ?>><?php echo e(__('courses.Online')); ?> </option>
                                        <option
                                            value="3" <?php echo e(request('delivery_mode')=="3"?'selected':''); ?>><?php echo e(__('courses.Offline')); ?></option>
                                    </select>

                                </div>

                                <div class="col-lg-3 mt-30">

                                    <label class="primary_input_label"
                                           for="org_branch_code_search"><?php echo e(__('org.Org Chart')); ?></label>
                                    <select class="primary_select" name="org_branch_code_search"
                                            id="org_branch_code_search">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('org.Org Chart')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('org.Org Chart')); ?></option>
                                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $__env->make('coursesetting::_single_select_option',['branch'=>$branch,'level'=>1,'org_branch_code_search'=>request('org_branch_code_search')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

                                </div>

                                <div class="col-lg-3 mt-30">

                                    <label class="primary_input_label"
                                           for="job_position"><?php echo e(__('org.Job Position')); ?></label>
                                    <select class="primary_select" name="job_position" id="job_position">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('org.Job Position')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('org.Job Position')); ?></option>
                                        <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($position->code); ?>" <?php echo e(request('job_position')==$position->code?'selected':''); ?>><?php echo e($position->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                            <?php endif; ?>


                            <div class="col-lg-3 mt-30">

                                <label class="primary_input_label"
                                       for="student_status"><?php echo e(__('student.Student Status')); ?></label>
                                <select class="primary_select" name="student_status" id="student_status">

                                    <option
                                        value="1" <?php echo e(request('student_status')=="1"?'selected':''); ?>><?php echo e(__('common.Active')); ?> </option>
                                    <option
                                        value="0" <?php echo e(request('student_status')=="0"?'selected':''); ?>><?php echo e(__('common.Inactive')); ?></option>

                                </select>

                            </div>


                            <div class="col-12 mt-20">
                                <div class="course_btn text-right">
                                    <button type="submit"
                                            class="primary-btn radius_30px mr-10 fix-gr-bg"><?php echo e(__('courses.Filter')); ?> </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if($type!=2): ?>
                <div class="col-lg-12">
                    <section class="sms-breadcrumb mb-40 white-box">
                        <div class="container-fluid">
                            <div class="row justify-content-between">
                                <h1><?php echo e(__('courses.Course Overview')); ?></h1>
                                <div class="bc-pages">
                                    <a href="<?php echo e(route('course.courseStatisticsCourseReport').$parem); ?>"
                                       class="primary-btn radius_30px mr-10 fix-gr-bg text-white"><?php echo e(__('common.Export')); ?></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-9">

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="" class="table coursesList">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('SL')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Course')); ?></th>
                                        <?php if(isModuleActive('Org')): ?>
                                            <th scope="col"><?php echo e(__('courses.Required Type')); ?></th>
                                        <?php endif; ?>
                                        <th scope="col"><?php echo e(__('courses.Enrolled')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Not Started yet')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.In Progress')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Finished')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Finish Rate')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="white_box chart_box">
                        <h4><?php echo e(__('dashboard.Status Overview of Topics')); ?></h4>
                        <canvas id="course_overview" width="200" height="200"></canvas>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($type!=1): ?>
                <div class="col-lg-12 mt_30">
                    <section class="sms-breadcrumb mb-40 white-box">
                        <div class="container-fluid">
                            <div class="row justify-content-between">
                                <h1><?php echo e(__('quiz.Quiz Overview')); ?></h1>
                                <div class="bc-pages">
                                    <a href="<?php echo e(route('course.courseStatisticsQuizReport').$parem); ?>"
                                       class="primary-btn radius_30px mr-10 fix-gr-bg text-white"><?php echo e(__('common.Export')); ?></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-9">

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="" class="table quizList">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('SL')); ?></th>
                                        <th scope="col"><?php echo e(__('quiz.Quiz')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Required Type')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Enrolled')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Not Started yet')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Fail')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Pass')); ?></th>
                                        <th scope="col"><?php echo e(__('quiz.Taken Pass Rate')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="white_box chart_box">
                        <h4><?php echo e(__('quiz.Quiz')); ?> <?php echo e(__('quiz.Taken Rate')); ?></h4>
                        <canvas id="token_rate" width="200" height="200"></canvas>
                    </div>

                    <div class="white_box chart_box mt_30">
                        <h4><?php echo e(__('quiz.Quiz')); ?> <?php echo e(__('quiz.Taken Pass Rate')); ?></h4>

                        <canvas id="token_pass_rate" width="200" height="200"></canvas>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('public/backend/vendors/chartlist/Chart.min.js')); ?>"></script>

    <script>
        <?php if($type!=2): ?>
        $('.coursesList').DataTable({
            bLengthChange: false,
            "bDestroy": true,
            processing: true,
            serverSide: true,
            // order: [[0, "desc"]],
            "ajax": $.fn.dataTable.pipeline({
                url: '<?php echo $url; ?>',
                pages: 5 // number of pages to cache
            }),
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'title', name: 'title'},
                    <?php if(isModuleActive('Org')): ?>
                {
                    data: 'required_type', name: 'required_type'
                },
                    <?php endif; ?>
                {
                    data: 'total_enrolled', name: 'total_enrolled'
                }, {
                    data: 'not_start', name: 'not_start'
                },
                {
                    data: 'in_process', name: 'in_process'
                },
                {
                    data: 'finished', name: 'finished'
                }, {
                    data: 'finished_rate', name: 'finished_rate'
                },


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
            dom: 'frtip',

            columnDefs: [{
                visible: false
            }, {responsivePriority: 1, targets: -1},
                {responsivePriority: 2, targets: -2},
            ],
            responsive: true,
        });
        <?php endif; ?>
        <?php if($type!=1): ?>
        $('.quizList').DataTable({
            bLengthChange: false,
            "bDestroy": true,
            processing: true,
            serverSide: true,
            // order: [[0, "desc"]],
            "ajax": $.fn.dataTable.pipeline({
                url: '<?php echo $url2; ?>',
                pages: 5 // number of pages to cache
            }),
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'title', name: 'title'},
                    <?php if(isModuleActive('Org')): ?>
                {
                    data: 'required_type', name: 'required_type'
                },
                    <?php endif; ?>
                {
                    data: 'total_enrolled', name: 'total_enrolled'
                }, {
                    data: 'not_start', name: 'not_start'
                },
                {
                    data: 'fail', name: 'fail'
                },
                {
                    data: 'pass', name: 'pass'
                }, {
                    data: 'pass_rate', name: 'pass_rate'
                },


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
            dom: 'frtip',

            columnDefs: [{
                visible: false
            }, {responsivePriority: 1, targets: -1},
                {responsivePriority: 2, targets: -2},
            ],
            responsive: true,
        });
        <?php endif; ?>

    </script>

    <script>
        <?php if($type!=2): ?>
        let ctx = document.getElementById('course_overview').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['<?php echo e(__('courses.Finished')); ?>', '<?php echo e(__('courses.In Progress')); ?>', '<?php echo e(__('courses.Not Started yet')); ?>'],
                datasets: [{
                    label: '<?php echo e(__('Status Overview of Topics')); ?>',
                    data: [<?php echo e($overviewStatus['finished']); ?>, <?php echo e($overviewStatus['in_process']); ?>, <?php echo e($overviewStatus['not_start']); ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)'

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            display: false,
                        }
                    }]
                }
            }
        });
        <?php endif; ?>
        <?php if($type!=1): ?>
        let token_rate = document.getElementById('token_rate').getContext('2d');
        new Chart(token_rate, {
            type: 'doughnut',
            data: {
                labels: ['<?php echo e(__('quiz.Taken')); ?>', '<?php echo e(__('courses.Not Started yet')); ?>'],
                datasets: [{
                    label: '<?php echo e(__('quiz.Quiz')); ?> <?php echo e(__('quiz.Taken Rate')); ?>',
                    data: [<?php echo e($quizStatistics['fail']+$quizStatistics['pass']); ?>, <?php echo e($quizStatistics['not_start']); ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)'

                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            display: false,
                        }
                    }]
                }
            }
        });


        let token_pass_rate = document.getElementById('token_pass_rate').getContext('2d');
        new Chart(token_pass_rate, {
            type: 'doughnut',
            data: {
                labels: ['<?php echo e(__('quiz.Pass Rate')); ?>', '<?php echo e(__('quiz.Fail Rate')); ?>'],
                datasets: [{
                    label: '<?php echo e(__('quiz.Quiz')); ?> <?php echo e(__('quiz.Taken Pass Rate')); ?>',
                    data: [<?php echo e($quizStatistics['pass']); ?>, <?php echo e($quizStatistics['fail']); ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)'

                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            display: false,
                        }
                    }]
                }
            }
        });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/CourseSetting/Providers/../Resources/views/statistics.blade.php ENDPATH**/ ?>