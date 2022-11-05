    
<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/daterangepicker.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('common.Welcome'); ?> <?php echo app('translator')->get('common.To'); ?> - <?php echo e(Settings('site_title')); ?>

                        | <?php echo e(@Auth::user()->role->name); ?></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            <?php if(permissionCheck('dashboard.number_of_student')): ?>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="d-block">
                        <div class="white-box single-summery">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3><?php echo e(__('student.Students')); ?></h3>
                                    <p class="mb-0"><?php echo e(__('student.Number of Students')); ?></p>
                                </div>
                                <h1 class="gradient-color2" id="totalStudent"> ...
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>


            <?php if(permissionCheck('dashboard.number_of_instructor')): ?>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="d-block">
                        <div class="white-box single-summery">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3><?php echo e(__('quiz.Instructor')); ?></h3>
                                    <p class="mb-0"><?php echo e(__('quiz.Number of Instructor')); ?></p>
                                </div>
                                <h1 class="gradient-color2" id="totalInstructor"> ...
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if(permissionCheck('dashboard.number_of_subject')): ?>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="d-block">
                        <div class="white-box single-summery">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3><?php echo e(__('dashboard.Subjects')); ?></h3>
                                    <p class="mb-0"><?php echo e(__('dashboard.Number of Subjects')); ?></p>
                                </div>
                                <h1 class="gradient-color2" id="totalCourses"> ...
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if(permissionCheck('dashboard.number_of_enrolled')): ?>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="d-block">
                        <div class="white-box single-summery">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3><?php echo e(__('dashboard.Enrolled')); ?></h3>
                                    <p class="mb-0"><?php echo e(__('dashboard.Number of Enrolled')); ?></p>
                                </div>
                                <h1 class="gradient-color2" id="totalEnroll"> ...
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if(showEcommerce()): ?>
                <?php if(permissionCheck('dashboard.total_amount_from_enrolled')): ?>
                    <div class="col-md-6 col-lg-3">
                        <a href="#" class="d-block">
                            <div class="white-box single-summery">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo e(__('dashboard.Enrolled Amount')); ?></h3>
                                        <p class="mb-0"><?php echo e(__('dashboard.Total Enrolled Amount')); ?></p>
                                    </div>
                                    <h1 class="gradient-color2" id="totalSell"> ...
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if(permissionCheck('dashboard.total_revenue')): ?>
                    <div class="col-md-6 col-lg-3">
                        <a href="#" class="d-block">
                            <div class="white-box single-summery">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo e(__('courses.Revenue')); ?></h3>
                                        <p class="mb-0"><?php echo e(__('courses.Total Revenue')); ?></p>
                                    </div>
                                    <h1 class="gradient-color2" id="totalRevenue"> ...
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(permissionCheck('dashboard.total_enrolled_today')): ?>
                    <div class="col-md-6 col-lg-3">
                        <a href="#" class="d-block">
                            <div class="white-box single-summery">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo e(__('dashboard.Enrolled Today')); ?></h3>
                                        <p class="mb-0"><?php echo e(__('dashboard.Total Enrolled Today')); ?></p>
                                    </div>
                                    <h1 class="gradient-color2" id="totalToday"> ...
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if(permissionCheck('dashboard.total_enrolled_this_month')): ?>
                    <div class="col-md-6 col-lg-3">
                        <a href="#" class="d-block">
                            <div class="white-box single-summery">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo e(__('dashboard.This Month')); ?></h3>
                                        <p class="mb-0"><?php echo e(__('dashboard.Total Enrolled This Month')); ?></p>
                                    </div>
                                    <h1 class="gradient-color2" id="totalThisMonth"> ...
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <?php if(permissionCheck('dashboard.monthly_income')): ?>
                            <div class="col-lg-6">
                                <div class="white_box chart_box mt_30">
                                    <h4><?php echo e(__('dashboard.Monthly Income Stats for')); ?> <?php echo e(date('Y')); ?></h4>
                                    <div class="">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="myChart" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(permissionCheck('dashboard.payment_statistic')): ?>
                            <div class="col-lg-6">
                                <div class="white_box chart_box mt_30">
                                    <h4><?php echo e(__('dashboard.Payment Statistics for')); ?> <?php echo e(\Carbon\Carbon::now()->format('F')); ?></h4>
                                    <div class="">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                    </div>
                                    <canvas id="payment_statistics" width="400" height="400"></canvas>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row justify-content-center">
            <?php if(permissionCheck('dashboard.recent_enrolls')): ?>
                <div class="col-lg-8">
                    <div class="white_box QA_section mt_30">
                        <div class="white_box_tittle list_header">
                            <h4><?php echo e(__('dashboard.Recent Enrolls')); ?></h4>
                        </div>
                        <div class="table-responsive QA_table">
                            <table class="table lms_table_active">
                                <thead>
                                <tr>
                                    <th scope="col"><?php echo e(__('courses.Course Title')); ?></th>
                                    <th scope="col"><?php echo e(__('courses.Instructor')); ?></th>
                                    <th scope="col"><?php echo e(__('common.Email Address')); ?></th>
                                    <?php if(showEcommerce()): ?>
                                        <th scope="col"><?php echo e(__('dashboard.Recent Enrolls')); ?></th>
                                    <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $recentEnroll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$enroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($enroll->course->slug)): ?>
                                        <tr>
                                            <th scope="row"><a target="_blank"
                                                               href="<?php echo e(route('courseDetailsView',[@$enroll->course->id,@$enroll->course->slug])); ?>"
                                                               class="question_content"><?php echo e(@$enroll->course->title); ?>

                                                </a>
                                            </th>
                                            <td><?php echo e(@$enroll->course->user->name); ?></td>
                                            <td><?php echo e(@$enroll->user->email); ?></td>
                                            <?php if(showEcommerce()): ?>
                                                <td>
                                                    <?php echo e(getPriceFormat($enroll->purchase_price - @$enroll->reveune)); ?>

                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-lg-4">
                <?php if(permissionCheck('dashboard.overview_status_of_courses')): ?>
                    <div class="white_box chart_box mt_30">
                        <h4><?php echo e(__('dashboard.Status Overview of Topics')); ?></h4>
                        <div class="">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                        </div>
                        <canvas id="course_overview" width="400" height="400"></canvas>
                    </div>
                <?php endif; ?>
                <?php if(permissionCheck('dashboard.overview_of_courses')): ?>
                    <div class="white_box chart_box mt_30">
                        <h4><?php echo e(__('dashboard.Overview of Topics')); ?></h4>
                        <div class="">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                        </div>
                        <canvas id="course_overview2" width="400" height="400"></canvas>
                    </div>
                <?php endif; ?>
            </div>

        </div>
        <div class="row mt-20">
            <div class="col-lg-12">
                <div class="white_box QA_section mt_30">
                    <div class="white_box_tittle list_header">
                        <h4><?php echo e(__('dashboard.Total student by each course')); ?></h4>
                    </div>
                    <div class="table-responsive QA_table" style="max-height: 800px; overflow:auto">
                        <table class="table lms_table_active">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo e(__('courses.Course Title')); ?></th>
                                <th scope="col"><?php echo e(__('courses.Instructor')); ?></th>
                                <th scope="col"><?php echo e(__('dashboard.Enrolled')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $allCourses->where('type',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($enroll->course->slug)): ?>
                                    <tr>
                                        <th scope="row">
                                            <a target="_blank"
                                               href="<?php echo e(route('courseDetailsView',[@$course->id,@$course->slug])); ?>"
                                               class="question_content"><?php echo e(@$course->title); ?>

                                            </a>
                                        </th>
                                        <td><?php echo e(@$course->user->name); ?></td>
                                        <td><?php echo e(@$course->enrolls->count()); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php if(permissionCheck('dashboard.daily_wise_enroll')): ?>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box chart_box mt_30">
                        <div class="white_box_tittle list_header">
                            <h4><?php echo e(__('dashboard.Daily Wise Enroll Status for')); ?> <?php echo e(\Carbon\Carbon::now()->format('F')); ?></h4>
                        </div>
                        <div class="">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="enroll_overview" width="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="row justify-content-center">
        <?php if(permissionCheck('userLoginChartByDays')): ?>
            <div class="col-lg-12">
                <div class="white_box chart_box mt_30">
                    <div class="white_box_tittle list_header">
                        <h4><?php echo e(__('dashboard.User Login Chart')); ?> (<?php echo e(__('dashboard.By Date')); ?>)</h4>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col-md-3">
                            <input type="radio" checked
                                   class="common-radio userLoginChartByDays "
                                   id="userLoginChartByDays7"
                                   name="userLoginChartByDays"
                                   value="7">
                            <label
                                for="userLoginChartByDays7"><?php echo e(__('dashboard.Last 7 Days')); ?></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio"
                                   class="common-radio userLoginChartByDays "
                                   id="userLoginChartByDays14"
                                   name="userLoginChartByDays"
                                   value="14">
                            <label
                                for="userLoginChartByDays14"><?php echo e(__('dashboard.Last 14 Days')); ?></label>
                        </div>

                        <div class="col-md-3">
                            <input type="radio"
                                   class="common-radio userLoginChartByDays"
                                   id="userLoginChartByDays30"
                                   name="userLoginChartByDays"
                                   value="30">
                            <label
                                for="userLoginChartByDays30"><?php echo e(__('dashboard.Last 30 Days')); ?></label>
                        </div>


                        <div class="col-md-3">
                            <input type="radio"
                                   class="common-radio "
                                   id="userLoginChartByDaysCustom"
                                   name="userLoginChartByDays"
                                   value="custom">
                            <label
                                for="userLoginChartByDaysCustom"><?php echo e(__('dashboard.Others')); ?></label>

                            <input type="text" class="form-control userLoginChartDateRange"
                                   name="userLoginChartByDaysDateRange" id="userLoginDayChartDateRange"
                                   value="<?php echo e(date('m/d/Y')); ?> - <?php echo e(date('m/d/Y')); ?>"/>
                        </div>
                    </div>
                    <div class="">
                        <canvas id="userLoginChartByDays" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(permissionCheck('userLoginChartByTime')): ?>
            <div class="col-lg-12">
                <div class="white_box chart_box mt_30">
                    <div class="white_box_tittle list_header">
                        <h4><?php echo e(__('dashboard.User Login Chart')); ?> (<?php echo e(__('dashboard.By Time')); ?>)</h4>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col-md-3">
                            <input type="radio" checked
                                   class="common-radio userLoginChartByTime "
                                   id="userLoginChartByTime7"
                                   name="userLoginChartByTime"
                                   value="7">
                            <label
                                for="userLoginChartByTime7"><?php echo e(__('dashboard.Last 7 Days')); ?></label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio"
                                   class="common-radio userLoginChartByTime "
                                   id="userLoginChartByTime14"
                                   name="userLoginChartByTime"
                                   value="14">
                            <label
                                for="userLoginChartByTime14"><?php echo e(__('dashboard.Last 14 Days')); ?></label>
                        </div>

                        <div class="col-md-3">
                            <input type="radio"
                                   class="common-radio userLoginChartByTime"
                                   id="userLoginChartByTime30"
                                   name="userLoginChartByTime"
                                   value="30">
                            <label
                                for="userLoginChartByTime30"><?php echo e(__('dashboard.Last 30 Days')); ?></label>
                        </div>


                        <div class="col-md-3">
                            <input type="radio"
                                   class="common-radio "
                                   id="userLoginChartByTimeCustom"
                                   name="userLoginChartByTime"
                                   value="custom">
                            <label
                                for="userLoginChartByTimeCustom"><?php echo e(__('dashboard.Others')); ?></label>

                            <input type="text" class="form-control userLoginChartDateRange"
                                   name="userLoginTimeChartDateRange" id="userLoginTimeChartDateRange"
                                   value="<?php echo e(date('m/d/Y')); ?> - <?php echo e(date('m/d/Y')); ?>"/>
                        </div>
                    </div>
                    <div class="">
                        <canvas id="userLoginChartByTime" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('public/backend/vendors/chartlist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backend/js/daterangepicker.min.js')); ?>"></script>

    <script>
        $('.userLoginChartDateRange').daterangepicker();
        <?php if(permissionCheck('userLoginChartByDays')): ?>
        var userLoginChartByDaysElement = $('input[name="userLoginChartByDays"]');
        var userLoginChartByDaysDateRangeElement = $('input[name="userLoginChartByDaysDateRange"]');


        userLoginChartByDaysDateRangeElement.change(function () {
            getLoginUserDataFromDays('custom', this.value);
        });
        userLoginChartByDaysElement.change(function () {
            if (this.value === 'custom') {
                $('#userLoginDayChartDateRange').show();
            } else {
                $('#userLoginDayChartDateRange').hide();
                getLoginUserDataFromDays('days', this.value);
            }
        });


        var userLoginChartByDaysCanvas = $('#userLoginChartByDays').get(0).getContext('2d');

        function getLoginUserDataFromDays(type, days) {
            $.ajax({
                url: '<?php echo e(url('userLoginChartByDays')); ?>',
                type: 'GET',
                data: {type: type, days: days},
                success: function (result) {

                    var userLoginChartByDaysData = {
                        labels: result.date,
                        datasets: [
                            {
                                label: '<?php echo e(__('dashboard.User Login Attempt')); ?>',
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 0.5)',
                                pointRadius: true,
                                pointColor: '#3b8bba',
                                borderWidth: 3,
                                pointDot: true,
                                pointDotRadius: 10,
                                pointHoverRadius: 15,
                                pointStrokeColor: 'rgba(54, 162, 235, 1)',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(54, 162, 235, 1)',
                                data: result.data
                            },
                        ]
                    }

                    var userLoginChartByDaysOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: {
                            display: true
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    display: false,
                                }
                            }]
                        }
                    }


                    new Chart(userLoginChartByDaysCanvas, {
                        type: 'line',
                        data: userLoginChartByDaysData,
                        options: userLoginChartByDaysOptions
                    })

                }, error: function (result, statut, error) { // Handle errors
                    console.log(error);
                }

            });
        }

        getLoginUserDataFromDays('days', 7);
        <?php endif; ?>
        // ------------------------
        <?php if(permissionCheck('userLoginChartByTime')): ?>

        var userLoginChartByTimeElement = $('input[name="userLoginChartByTime"]');
        var userLoginTimeChartDateRange = $('input[name="userLoginTimeChartDateRange"]');


        userLoginTimeChartDateRange.change(function () {
            getLoginUserDataFromTime('custom', this.value);
        });
        userLoginChartByTimeElement.change(function () {
            if (this.value === 'custom') {
                $('#userLoginTimeChartDateRange').show();
            } else {
                $('#userLoginTimeChartDateRange').hide();
                getLoginUserDataFromTime('days', this.value);
            }
        });


        var userLoginChartByTimeCanvas = $('#userLoginChartByTime').get(0).getContext('2d');

        function getLoginUserDataFromTime(type, days) {
            $.ajax({
                url: '<?php echo e(url('userLoginChartByTime')); ?>',
                type: 'GET',
                data: {type: type, days: days},
                success: function (result) {
                    var userLoginChartByTimeData = {
                        labels: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23],
                        datasets: [
                            {
                                label: '<?php echo e(__('dashboard.User Login Attempt')); ?>',
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 0.5)',
                                pointRadius: true,
                                pointColor: '#3b8bba',
                                borderWidth: 3,
                                pointDot: true,
                                pointDotRadius: 10,
                                pointHoverRadius: 15,
                                pointStrokeColor: 'rgba(54, 162, 235, 1)',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(54, 162, 235, 1)',
                                data: result
                            },
                        ]
                    }

                    var userLoginChartByTimeOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: {
                            display: true
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    display: false,
                                }
                            }]
                        }
                    }


                    new Chart(userLoginChartByTimeCanvas, {
                        type: 'line',
                        data: userLoginChartByTimeData,
                        options: userLoginChartByTimeOptions
                    })

                }, error: function (result, statut, error) { // Handle errors
                    console.log(error);
                }

            });
        }

        getLoginUserDataFromTime('days', 7);
        <?php endif; ?>
    </script>

    <script>

        <?php if(permissionCheck('dashboard.overview_status_of_courses')): ?>
        var ctx = document.getElementById('course_overview').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['<?php echo e(__('dashboard.Active')); ?>', '<?php echo e(__('dashboard.Pending')); ?>'],
                datasets: [{
                    label: '<?php echo e(__('Status Overview of Topics')); ?>',
                    data: [<?php echo e($course_overview['active']); ?>, <?php echo e($course_overview['pending']); ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'

                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            display: false,
                        }
                    }]
                }
            }
        });
        <?php endif; ?>
        <?php if(permissionCheck('dashboard.overview_of_courses')): ?>
        var ctx = document.getElementById('course_overview2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['<?php echo e(__('dashboard.Courses')); ?>', '<?php echo e(__('dashboard.Quizzes')); ?>', '<?php echo e(__('dashboard.Classes')); ?>'],
                datasets: [{
                    label: '<?php echo e(__('Overview of Topics')); ?>',
                    data: [<?php echo e($course_overview['courses']); ?>, <?php echo e($course_overview['quizzes']); ?>, <?php echo e($course_overview['classes']); ?>],
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
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        <?php endif; ?>


        <?php if(permissionCheck('dashboard.payment_statistic')): ?>
        var ctx = document.getElementById('payment_statistics').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['<?php echo e(__('dashboard.Completed')); ?>', '<?php echo e(__('dashboard.Pending')); ?>'],
                datasets: [{
                    label: '<?php echo e(__('dashboard.Payment Statistics for')); ?> <?php echo e(@$payment_statistics['month']); ?>',
                    data: [<?php echo e($payment_statistics['paid']->count()); ?>, <?php echo e($payment_statistics['unpaid']->count()); ?>],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        <?php endif; ?>
        var enroll_day = [];
        <?php $__currentLoopData = $enroll_day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        enroll_day.push('<?php echo e($val); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var enroll_count = [];
        <?php $__currentLoopData = $enroll_count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        enroll_count.push('<?php echo e($val); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var ctx = document.getElementById('enroll_overview').getContext('2d');
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        <?php if(permissionCheck('dashboard.daily_wise_enroll')): ?>
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {

                labels: enroll_day,
                datasets: [{
                    label: '<?php echo e(__('dashboard.Daily Wise Enroll Status for')); ?> <?php echo e(\Carbon\Carbon::now()->format('F')); ?>',
                    data: enroll_count,
                    backgroundColor: 'rgba(124, 50, 255, 0.5)',
                    borderColor: 'rgba(124, 50, 255, 0.5)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        <?php endif; ?>
        var month_name = [];
        <?php $__currentLoopData = $courshEarningM_onth_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        month_name.push('<?php echo e($val); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var monthly_earn = [];
        <?php $__currentLoopData = $courshEarningMonthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        monthly_earn.push('<?php echo e($val); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <?php if(permissionCheck('dashboard.monthly_income')): ?>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {

                labels: month_name,
                datasets: [{
                    label: '<?php echo e(__('dashboard.Monthly Income Stats for')); ?> <?php echo e(@$payment_statistics['month']); ?>' + new Date().getFullYear(),
                    data: monthly_earn,
                    backgroundColor: 'rgba(124, 50, 255, 0.5)',
                    borderColor: 'rgba(124, 50, 255, 0.5)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        <?php endif; ?>
    </script>


    <script>
        let url = "<?php echo e(route('getDashboardData')); ?>";
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: url,
                success: function (data) {
                    $('#totalStudent').html(data.student);
                    $('#totalInstructor').html(data.instructor);
                    $('#totalCourses').html(data.allCourse);
                    $('#totalEnroll').html(data.totalEnroll);
                    $('#totalSell').html(getPriceFormet(data.totalSell));
                    $('#totalRevenue').html(getPriceFormet(data.adminRev));
                    $('#totalToday').html(getPriceFormet(data.today));
                    $('#totalThisMonth').html(getPriceFormet(data.thisMonthEnroll));
                }
            });
        });

        function getPriceFormet(price) {
            let currency_symbol = $('.currency_symbol').val();
            let currency_show = $('.currency_show').val();
            let res;
            if (currency_show == 1) {
                res = currency_symbol + price;
            } else if (currency_show == 2) {
                res = currency_symbol + ' ' + price;
            } else if (currency_show == 3) {
                res = price + currency_symbol;
            } else if (currency_show == 4) {
                res = price + ' ' + currency_symbol;
            } else {
                res = price;
            }
            return res;
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/dashboard.blade.php ENDPATH**/ ?>