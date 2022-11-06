<?php
    $table_name='course_enrolleds';
$role_id =\Illuminate\Support\Facades\Auth::user()->role_id;
?>
<?php $__env->startSection('table'); ?><?php echo e($table_name); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>


    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('courses.Instructor')); ?> <?php echo e(__('courses.Course')); ?> <?php echo e(__('courses.Revenue')); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('/dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?> </a>
                    <a href="#"><?php echo e(__('quiz.Report')); ?> </a>
                    <a href="#"><?php echo e(__('courses.Instructor')); ?> <?php echo e(__('courses.Course')); ?> <?php echo e(__('courses.Revenue')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="white_box_tittle list_header">
                            <h4><?php echo e(__('courses.Advanced Filter')); ?> </h4>
                        </div>
                        <form action="" method="GET">

                            <div class="row">
                                <?php if($role_id==1): ?>

                                    <div class="col-lg-4 mt-30">

                                        <label class="primary_input_label"
                                               for="instructor"><?php echo e(__('courses.Instructor')); ?></label>
                                        <select class="primary_select" name="instructor" id="instructor">
                                            <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Instructor')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Instructor')); ?></option>
                                            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($search_instructor==$instructor->id?'selected':''); ?>

                                                        value="<?php echo e($instructor->id); ?>"><?php echo e(@$instructor->name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-4 mt-30 ">
                                    <label class="primary_input_label" for="month"><?php echo e(__('courses.Month')); ?></label>
                                    <select class="primary_select" name="month" id="month">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Month')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Month')); ?></option>
                                        <?php
                                            $formattedMonthArray = array(
                              "1" => "January", "2" => "February", "3" => "March", "4" => "April",
                              "5" => "May", "6" => "June", "7" => "July", "8" => "August",
                              "9" => "September", "10" => "October", "11" => "November", "12" => "December",
                          );
                                        ?>
                                        <?php $__currentLoopData = $formattedMonthArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <option
                                                <?php echo e($search_month==$key?'selected':''); ?> value="<?php echo e($key); ?>"><?php echo e($month); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                <div class="col-lg-4 mt-30">

                                    <label class="primary_input_label" for="year"><?php echo e(__('courses.Year')); ?></label>
                                    <select class="primary_select" name="year" id="year">

                                        <?php
                                            $starting_year  =date('Y');
                                            $ending_year = date('Y', strtotime('-10 year'));
                                            $yearArray = range($starting_year,$ending_year);
                                            $current_year = date('Y');
                                            foreach ($yearArray as $year) {
                                            echo '<option value="'.$year.'"';
                                            if ($search_year==$year){
                                                    echo ' selected="selected"';
                                            }
                                            elseif( $year ==  $current_year ) {
                                            echo ' selected="selected"';
                                            }
                                            echo ' >'.$year.'</option>';
                                            }
                                        ?>
                                    </select>

                                </div>

                                <?php if($role_id==1): ?>
                                    <div class="col-12 mt-20">
                                        <?php else: ?>
                                            <div class="col-lg-4 float-right mt-30">
                                                <label class="primary_input_label pt-4"
                                                       style="    margin-top: 5px;"> </label>

                                                <?php endif; ?>


                                                <div
                                                    class="search_course_btn  <?php if($role_id==1): ?> text-right <?php endif; ?>">

                                                    <button type="submit"
                                                            class="primary-btn radius_30px mr-10 fix-gr-bg"><?php echo e(__('courses.Filter')); ?> </button>
                                                </div>
                                            </div>
                                    </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-40 mb-25">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo e(__('courses.Instructor')); ?> <?php echo e(__('courses.Course')); ?> <?php echo e(__('courses.Revenue')); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <div class="QA_section QA_section_heading_custom check_box_table mt-30">
                <div class="QA_table ">
                    <table id="lms_table" class="table Crm_table_active3">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('report.Purchase ID')); ?></th>
                            <th scope="col"><span class="m-2"><?php echo e(__('courses.Course Title')); ?></span></th>
                            <th scope="col"><?php echo e(__('courses.Enrollment')); ?> <?php echo e(__('certificate.Date')); ?></th>
                            <?php if($role_id==1): ?>
                                <th scope="col"><?php echo e(__('courses.Instructor')); ?> </th>
                            <?php endif; ?>
                            <th scope="col"><?php echo e(__('courses.Purchase')); ?> <?php echo e(__('courses.By')); ?> </th>
                            <th scope="col"><?php echo e(__('courses.Purchase')); ?> <?php echo e(__('courses.Price')); ?></th>
                            <th scope="col"><?php echo e(__('courses.Instructor')); ?> <?php echo e(__('courses.Revenue')); ?></th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php if(isModuleActive('Subscription')): ?>
                            <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td>S-<?php echo e(@$subscription['checkout_id']+1000); ?></td>
                                    <td>
                                        <span class="m-2">
                                            <strong>Subscription - </strong>
                                            <?php echo e(@$subscription['plan']); ?></span>
                                    </td>
                                    <td>
                                        <?php echo e(showDate(@$subscription['date'] )); ?>

                                    </td>


                                    <?php if($role_id==1): ?>
                                        <td><?php echo e(@$subscription->instructor); ?></td>
                                    <?php endif; ?>

                                    <td></td>
                                    <td></td>
                                    <td><?php echo e(getPriceFormat($subscription['price'])); ?></td>


                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php $__currentLoopData = $enrolls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>C-<?php echo e(@$enroll->id+1000); ?></td>
                                <td>
                                    <span class="m-2"> <?php echo e(@$enroll->course->title); ?></span>
                                </td>
                                <td>
                                    <?php echo e(showDate(@$enroll->created_at )); ?>

                                </td>


                                <?php if($role_id==1): ?>
                                    <td><?php echo e(@$enroll->course->user->name); ?></td>
                                <?php endif; ?>

                                <td><?php echo e(@$enroll->user->name); ?></td>
                                <td><?php echo e(getPriceFormat($enroll->purchase_price)); ?></td>
                                <td><?php echo e(getPriceFormat($enroll->reveune)); ?></td>
                            </tr>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Payment/Providers/../Resources/views/instructor_revenue_report.blade.php ENDPATH**/ ?>