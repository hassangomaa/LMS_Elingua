<?php $__env->startSection('table'); ?>
    <?php
        $table_name='withdraws';
    ?>
    <?php echo e($table_name); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('withdraw.Instructor Payment')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('/dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?> </a>
                    <a href="#"><?php echo e(__('quiz.Report')); ?> </a>
                    <a href="#"><?php echo e(__('withdraw.Instructor Payment')); ?></a>
                </div>
            </div>
        </div>

    </section>
    <?php if(\Illuminate\Support\Facades\Auth::user()->role_id==1): ?>
        <div class="row justify-content-center mt-50">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="white_box_tittle list_header">
                        <h4><?php echo e(__('courses.Advanced Filter')); ?> </h4>
                    </div>
                    <form action="<?php echo e(route('admin.instructor.payout')); ?>" method="GET">

                        <div class="row">

                            <div class="col-lg-3 mt-30">

                                <label class="primary_input_label" for="month"><?php echo e(__('courses.Month')); ?></label>
                                <select name="month" size='1' class="primary_select" id="month">
                                    <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Month')); ?>"
                                            value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Month')); ?></option>
                                    <?php
                                        for ($i = 0; $i < 12; $i++) {
                                        $time = strtotime(sprintf('%d months', $i));
                                        $label = date('F', $time);
                                        $value = date('n', $time);
                                    ?>
                                    <option value="<?php echo e($value); ?>"
                                    <?php if(isset($_GET['month'])): ?> <?php echo e($_GET['month']==$value?'selected':''); ?> <?php endif; ?>><?php echo e($label); ?></option>

                                    <?php
                                        }
                                    ?>
                                </select>

                            </div>
                            <div class="col-lg-3 mt-30">

                                <label class="primary_input_label" for="year"><?php echo e(__('courses.Year')); ?></label>
                                <select name="year" size='1' class="primary_select" id="year">
                                    <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Year')); ?>"
                                            value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Year')); ?></option>
                                    <?php
                                        for ($i = date('Y'); $i > 2010; $i--) {
                                    ?>
                                    <option value="<?php echo e($i); ?>"
                                    <?php if(isset($_GET['year'])): ?> <?php echo e($_GET['year']==$i?'selected':''); ?> <?php endif; ?>><?php echo e($i); ?></option>


                                    <?php            }
                                    ?>
                                </select>

                            </div>
                            <div class="col-lg-3 mt-30">

                                <label class="primary_input_label"
                                       for="instructor"><?php echo e(__('courses.Instructor')); ?></label>
                                <select class="primary_select" name="instructor" id="instructor">
                                    <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Instructor')); ?>"
                                            value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Instructor')); ?></option>
                                    <?php $__currentLoopData = @$instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                                value="<?php echo e($instructor->id); ?>"
                                        <?php if(isset($_GET['instructor'])): ?> <?php echo e($_GET['instructor']==$instructor->id?'selected':''); ?> <?php endif; ?>
                                        ><?php echo e(@$instructor->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>

                            <div class="col-lg-3 mt-30">


                                <div class="search_course_btn mt-40">
                                    <button type="submit"
                                            class="primary-btn radius_30px mr-10 fix-gr-bg"><?php echo e(__('courses.Filter')); ?> </button>
                                </div>

                            </div>


                            <div class="col-12 mt-20">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-4">
                <div class="white-box p-3" style="height: 200px">
                    <h1><?php echo e(__('payment.Balance')); ?> </h1>
                    <p class="mt-30"><?php echo e(__('withdraw.You Currently Have')); ?>

                        <?php if(Auth::user()->balance==0): ?>
                            <?php echo e(Settings('currency_symbol')??'৳'); ?> 0
                        <?php else: ?>
                            <?php echo e(getPriceFormat(Auth::user()->balance)); ?>

                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="white-box p-3" style="height: 200px">
                    <h1><?php echo e(__('withdraw.Next Payout')); ?></h1>
                    <p class="mt-10"><?php echo e(__('withdraw.You Currently Have')); ?> <?php echo e($remaining!=0?getPriceFormat($remaining):0); ?> <?php echo e(__('withdraw.in earnings for next months payout')); ?></p>

                    <?php if($remaining!=0): ?>
                        <button type="button" data-toggle="modal" data-target="#requestForm"
                                class="primary-btn fix-gr-bg mt-40"><?php echo e(__('withdraw.Payment Request')); ?></button>
                    <?php endif; ?>

                </div>
            </div>

            <div class="col-md-4">
                <div class="white-box p-3" style="height: 200px">
                    <h1><?php echo e(__('withdraw.Payout Account')); ?></h1>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(auth()->user()->payout=="Bank Payment"): ?>
                                                         <b class="pt-3  "><?php echo e(auth()->user()->payout); ?></b> 
                                <p class="pb-20">
                                    <b><?php echo e(__('setting.Bank Name')); ?></b>: <?php echo e(auth()->user()->bank_name); ?> <br>
                                    <b><?php echo e(__('setting.Branch Name')); ?></b>: <?php echo e(auth()->user()->branch_name); ?> <br>
                                    <b><?php echo e(__('setting.Account Number')); ?></b>: <?php echo e(auth()->user()->bank_account_number); ?>

                                    <br>
                                    <b><?php echo e(__('setting.Account Holder')); ?></b>: <?php echo e(auth()->user()->account_holder_name); ?>

                                    <br>
                                </p>
                            <?php else: ?>
                                <img src="<?php echo e(asset(auth()->user()->payout_icon)); ?>" width="100px"
                                     alt="<?php echo e(auth()->user()->payout_icon); ?>">
                                <p class="pt-3 pb-3"><?php echo e(auth()->user()->payout_email); ?></p>
                            <?php endif; ?>

                            <a href="<?php echo e(route('set.payout')); ?>" class="primary-btn fix-gr-bg pl-2 pr-2" style="    right: 15px;
    width: 120px;
    text-align: center;
    float: right;
    top: 0;
    position: absolute;
    right: 15px;"><?php echo e(__('withdraw.Set Account')); ?></a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-40 mb-25">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo e(__('withdraw.Instructor Payment')); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <div class="QA_section QA_section_heading_custom check_box_table mt-30">
                <div class="QA_table ">
                    <!-- table-responsive -->
                    <table id="lms_table" class="table Crm_table_active3">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('common.SL')); ?></th>
                            <th scope="col"><?php echo e(__('withdraw.Instructor')); ?></th>
                            <th scope="col"><?php echo e(__('withdraw.Amount')); ?></th>
                            <th scope="col"><?php echo e(__('withdraw.Request Date')); ?></th>
                            <th scope="col"><?php echo e(__('payment.Payment Method')); ?></th>
                            <th scope="col"><?php echo e(__('withdraw.Payment Status')); ?></th>
                            <?php if(\Illuminate\Support\Facades\Auth::user()->role_id==1): ?>
                                <th scope="col"><?php echo e(__('common.Action')); ?></th>
                            <?php endif; ?>
                        </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <div class="modal fade admin-query" id="requestForm">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('withdraw.Request for payment')); ?>? </h4>
                    <button type="button" class="close" data-dismiss="modal"><i
                                class="ti-close "></i></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo e(route('admin.instructor.instructorRequestPayout')); ?>" method="post">
                        <?php echo csrf_field(); ?>


                        <div class="primary_input mb-25">
                            <label class="primary_input_label"
                                   for="nameInput"><?php echo e(__('common.Amount')); ?> <strong
                                        class="text-danger">*</strong></label>
                            <input class="primary_input_field" name="amount" type="number" min="0"
                                   value="<?php echo e($remaining); ?>"
                                   max="<?php echo e($remaining); ?>" required step="any">

                        </div>

                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>

                            <button class="primary-btn fix-gr-bg"
                                    type="submit"><?php echo e(__('withdraw.Confirm')); ?></button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade admin-query" id="makeAsPay">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('withdraw.Confirm')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal"><i
                                class="ti-close "></i></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo e(route('admin.instructor.instructorCompletePayout')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="text-center">
                            <input type="hidden" value="" name="withdraw_id" id="withdraw_id">
                            <input type="hidden" value="" name="instructor_id" id="instructor_id">
                            <h4><?php echo e(__('withdraw.Are you Sure, You want to mark as payment?')); ?> </h4>
                        </div>
                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>

                            <button class="primary-btn fix-gr-bg"
                                    type="submit"><?php echo e(__('withdraw.Confirm')); ?></button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).on('click', '.makeAsPaid', function () {
            let instructor_id = $(this).data('instructor_id');
            let id = $(this).data('withdraw_id');
            $("#instructor_id").val(instructor_id);
            $("#withdraw_id").val(id);
            $("#makeAsPay").modal('show');

        });
    </script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>

    <?php
        if (isset($_GET['instructor'])){
        $instructor =$_GET['instructor'];
    }else{
        $instructor ='';
    }

    if (isset($_GET['month'])){
        $month =$_GET['month'];
    }else{
        $month ='';
    }

    if (isset($_GET['year'])){
        $year =$_GET['year'];
    }else{
        $year ='';
    }


            $url =route('admin.getPayoutData').'?instructor='.$instructor.'&month='.$month.'&year='.$year;
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
                {data: 'user.name', name: 'user.name'},
                {data: 'amount', name: 'amount'},
                {data: 'requested_date', name: 'requested_date'},
                {data: 'method', name: 'method', orderable: false},
                {data: 'status', name: 'status', orderable: false},
                    <?php if(\Illuminate\Support\Facades\Auth::user()->role_id==1): ?>
                {
                    data: 'action', name: 'action', orderable: false
                },
                <?php endif; ?>

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


    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Payment/Providers/../Resources/views/instructor_payout.blade.php ENDPATH**/ ?>