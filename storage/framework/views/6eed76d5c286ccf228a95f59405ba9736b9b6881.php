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

    <div class="row">
        <div class="col-lg-12">
            <div class="white-box mb-30">
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => false,  'method' => 'GET','id' => 'search_group'])); ?>

                <div class="row">

                    <div class="col-lg-4 mt-30-md md_mb_20">
                        <label class="primary_input_label" for="category_id"><?php echo e(__('common.Type')); ?></label>
                        <select class="primary_select "
                                id="group" name="group">
                            <option data-display=" <?php echo e(__('common.Select')); ?>" value=""> <?php echo e(__('common.Type')); ?>

                            </option>
                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($g->id); ?>" <?php echo e($group==$g->id?'selected':''); ?>><?php echo e($g->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title">
                        <h3 class="mb-20"><?php echo e(__('quiz.Question Bank List')); ?></h3>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">

                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>

                                    <tr>
                                        <th>
                                            <div class="d-flex items-center">


                                                <label class="primary_checkbox d-flex  " for="questionSelectAll">
                                                    <input type="checkbox"
                                                           id="questionSelectAll"
                                                           class="common-checkbox selectAllQuizQuestion">
                                                    <span class="checkmark"></span>
                                                </label>

                                                <a href="#" id="deleteAllBtn"
                                                   style="display: none;    margin-top: -5px;"
                                                   class="primary-btn small fix-gr-bg ml-2">
                                                    <span class="ti-trash"></span>
                                                </a>
                                            </div>
                                        </th>
                                        <th><?php echo e(__('common.SL')); ?></th>
                                        <th><?php echo e(__('quiz.Group')); ?></th>
                                        <th><?php echo e(__('quiz.Category')); ?></th>
                                        <th><?php echo e(__('quiz.Question')); ?></th>
                                        <th><?php echo e(__('common.Type')); ?></th>
                                        <th><?php echo e(__('quiz.Image')); ?></th>
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


    <div class="modal fade admin-query" id="deleteAllBank">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('common.Delete')); ?> </h4>
                    <button type="button" class="close" data-dismiss="modal"><i
                                class="ti-close "></i></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo e(route('question-bank-bulk-delete')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="text-center">
                            <h4><?php echo e(__('common.Are you sure to delete ?')); ?> </h4>
                        </div>
                        <input type="hidden" name="questions" value="" id="qusList">
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
        $("#lms_table").on("change", ".question", function () {
            qusIsCheck();
        });

        function qusIsCheck() {
            if ($("#lms_table input:checkbox:checked").length > 0) {
                $('#deleteAllBtn').show();
            } else {
                $('#deleteAllBtn').hide();

            }
        }

        var questions = [];

        $('#deleteAllBtn').click(function (e) {
            e.preventDefault();
            $('#qusList').val('');

            $('#lms_table input:checkbox').each(function () {
                if (this.checked) {
                    questions.push($(this).val());
                }

            });
            $('#qusList').val(questions.toString());
            $('#deleteAllBank').modal('show');
        });
    </script>

    <?php
        $url = route('getAllQuizData').'?group='.$group;
    ?>

    <script>
        let table = $('#lms_table').DataTable({

            bLengthChange: true,
            "bDestroy": true,
            processing: true,
            serverSide: true,
            order: [[1, "desc"]],
            "ajax": $.fn.dataTable.pipeline({
                url: '<?php echo $url; ?>',
                pages: 5 // number of pages to cache
            }),
            columns: [
                {data: 'delete_btn', name: 'delete_btn', orderable: false, searchable: false},
                {data: 'DT_RowIndex', name: 'id', orderable: true},

                {data: 'questionGroup_title', name: 'questionGroup.title'},
                {data: 'category_name', name: 'category.name'},
                {data: 'question', name: 'question'},
                {data: 'type', name: 'type'},
                {data: 'image', name: 'image', orderable: false},
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
            dom: 'Blfrtip',
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

            paging: true,
            "lengthChange": true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]

        });


        $(document).on('click', '.deleteQuiz_bank', function () {
            let id = $(this).data('id');
            $('#classQusId').val(id);
            $("#deleteBank").modal('show');
        });


        $(document).on('click', '.selectAllQuizQuestion', function () {
            if ($(this).is(':checked') == true) {

                table.rows().nodes().to$().find('input[type="checkbox"].question').each(function () {
                    $(this).prop('checked', true);
                });
            } else {
                table.rows().nodes().to$().find('input[type="checkbox"].question').each(function () {
                    $(this).prop('checked', false);

                });
            }
            qusIsCheck();
        });
    </script>
    <script src="<?php echo e(asset('/')); ?>/Modules/CourseSetting/Resources/assets/js/course.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Quiz/Resources/views/question_bank_list.blade.php ENDPATH**/ ?>