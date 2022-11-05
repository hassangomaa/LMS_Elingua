<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/student_list.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('table'); ?>
    <?php
        $table_name='users';
    ?>
    <?php echo e($table_name); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('quiz.Instructor')); ?> <?php echo e(__('common.List')); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('instructor.Instructors')); ?></a>
                    <a href="#"><?php echo e(__('quiz.Instructor')); ?> <?php echo e(__('common.List')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('quiz.Instructor')); ?> <?php echo e(__('common.List')); ?></h3>
                            <?php if(permissionCheck('instructor.store')): ?>
                                <ul class="d-flex">
                                    <li>
                                        <?php if(isModuleActive('Appointment')): ?>
                                            <a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                               id="add_instructor_btn" href="<?php echo e(route('appointment.instructor.create')); ?>"><i
                                                    class="ti-plus"></i><?php echo e(__('instructor.Add Instructor')); ?></a>
                                        <?php else: ?>
                                            <a class="primary-btn radius_30px mr-10 fix-gr-bg" data-toggle="modal"
                                               id="add_instructor_btn"
                                               data-target="#add_instructor" href="#"><i
                                                    class="ti-plus"></i><?php echo e(__('instructor.Add Instructor')); ?></a>
                                        <?php endif; ?>

                                    </li>
                                </ul>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('common.SL')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Image')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Name')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Email')); ?></th>
                                        <?php if(isModuleActive('OrgInstructorPolicy')): ?>
                                            <th scope="col"><?php echo e(__('policy.Group')); ?> <?php echo e(__('policy.Policy')); ?></th>
                                        <?php endif; ?>
                                        <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Modal Item_Details -->
                <!-- new product -->
                <div class="modal fade admin-query" id="add_instructor">
                    <div class="modal-dialog modal_1000px modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo e(__('common.Add New')); ?> <?php echo e(__('quiz.Instructor')); ?></h4>
                                <button type="button" class="close " data-dismiss="modal">
                                    <i class="ti-close "></i>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="<?php echo e(route('instructor.store')); ?>" method="POST"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Name')); ?> <strong
                                                        class="text-danger">*</strong></label>
                                                <input class="primary_input_field" name="name" placeholder="-"
                                                       id="addName"
                                                       type="text"
                                                       value="<?php echo e(old('name')); ?>" <?php echo e($errors->first('name') ? 'autofocus' : ''); ?>>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('instructor.About')); ?></label>
                                                <textarea class="lms_summernote" name="about" id="addAbout" cols="30"
                                                          rows="10"><?php echo e(old('about')); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-15">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Date of Birth')); ?>

                                                </label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="<?php echo e(__('common.Date')); ?>"
                                                                       class="primary_input_field primary-input date form-control"
                                                                       id="startDate" type="text" name="dob"
                                                                       value="<?php echo e(old('dob')); ?>"
                                                                       <?php echo e($errors->first('dob') ? 'autofocus' : ''); ?>

                                                                       autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Phone')); ?> </label>
                                                <input class="primary_input_field" value="<?php echo e(old('phone')); ?>" name="phone"
                                                       id="addPhone"
                                                       placeholder="-" <?php echo e($errors->first('phone') ? 'autofocus' : ''); ?>

                                                       type="text">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Email')); ?> <strong
                                                        class="text-danger">*</strong></label>
                                                <input class="primary_input_field" name="email" placeholder="-"
                                                       id="addEmail"
                                                       value="<?php echo e(old('email')); ?>"
                                                       <?php echo e($errors->first('email') ? 'autofocus' : ''); ?>

                                                       type="email">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Image')); ?>

                                                    <small><?php echo e(__('student.Recommended size')); ?> (330x400)</small></label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary-input imgName" type="text"
                                                           id="placeholderFileOneName"
                                                           placeholder="<?php echo e(__('student.Browse Image file')); ?>"
                                                           readonly="">
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                               for="document_file"><?php echo e(__('common.Browse')); ?></label>
                                                        <input type="file" class="d-none imgBrowse" name="image"
                                                               id="document_file">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""><?php echo e(__('Password')); ?> <strong
                                                        class="text-danger">*</strong></label>
                                                <div class="input-group mb-2 mr-sm-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="cursor:pointer;"
                                                                                         class="fas fa-eye-slash eye toggle-password"></i>
                                                        </div>
                                                    </div>
                                                    <input type="password" class="form-control primary_input_field"
                                                           id="addPassword" name="password"
                                                           placeholder="<?php echo e(__('common.Minimum 8 characters')); ?>" <?php echo e($errors->first('password') ? 'autofocus' : ''); ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('Confirm Password')); ?> <strong
                                                        class="text-danger">*</strong></label>
                                                <div class="input-group mb-2 mr-sm-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="cursor:pointer;"
                                                                                         class="fas fa-eye-slash eye toggle-password"></i>
                                                        </div>
                                                    </div>
                                                    <input type="password" class="form-control primary_input_field"
                                                           <?php echo e($errors->first('password_confirmation') ? 'autofocus' : ''); ?>

                                                           id="addCpassword" name="password_confirmation"
                                                           placeholder="<?php echo e(__('common.Minimum 8 characters')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""> <?php echo e(__('common.Facebook URL')); ?></label>
                                                <input class="primary_input_field" name="facebook" placeholder="-"
                                                       id="addFacebook"
                                                       type="text" value="<?php echo e(old('facebook')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""> <?php echo e(__('common.Twitter URL')); ?></label>
                                                <input class="primary_input_field" name="twitter" placeholder="-"
                                                       id="addTwitter"
                                                       type="text" value="<?php echo e(old('twitter')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""> <?php echo e(__('common.LinkedIn URL')); ?></label>
                                                <input class="primary_input_field" name="linkedin" placeholder="-"
                                                       id="addLinkedin"
                                                       type="text" value="<?php echo e(old('linkedin')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""> <?php echo e(__('common.Instagram URL')); ?></label>
                                                <input class="primary_input_field" name="instagram" placeholder="-"
                                                       id="addInstagram"
                                                       type="text" value="<?php echo e(old('instagram')); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-center pt_15">
                                        <div class="d-flex justify-content-center">
                                            <button class="primary-btn semi_large2  fix-gr-bg" id="save_button_parent"
                                                    type="submit"><i
                                                    class="ti-check"></i> <?php echo e(__('common.Save')); ?> <?php echo e(__('courses.Instructor')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade admin-query" id="editInstructor">
                    <div class="modal-dialog modal_1000px modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo e(__('common.Update')); ?> <?php echo e(__('quiz.Instructor')); ?></h4>
                                <button type="button" class="close " data-dismiss="modal">
                                    <i class="ti-close "></i>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="<?php echo e(route('instructor.update')); ?>" method="POST"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="" id="instructorId">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Name')); ?> <strong
                                                        class="text-danger">*</strong></label>
                                                <input class="primary_input_field"
                                                       <?php echo e($errors->first('name') ? 'autofocus' : ''); ?>

                                                       value="<?php echo e(old('name')); ?>"
                                                       name="name"
                                                       id="instructorName"
                                                       placeholder="-" type="text">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('instructor.About')); ?></label>
                                                <textarea class="lms_summernote" name="about"
                                                          id="instructorAbout"
                                                          cols="30"
                                                          rows="10"><?php echo e(old('about')); ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-15">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('instructor.Date of Birth')); ?>

                                                </label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="Date"
                                                                       class="primary_input_field primary-input date form-control"
                                                                       id="instructorDob"
                                                                       <?php echo e($errors->first('dob') ? 'autofocus' : ''); ?>

                                                                       type="text" name="dob"
                                                                       value="<?php echo e(old('dob')); ?>"
                                                                       autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <i class="ti-calendar"
                                                               id="start-date-icon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Phone')); ?>  </label>
                                                <input class="primary_input_field"
                                                       value="<?php echo e(old('phone')); ?>"
                                                       name="phone" placeholder="-"
                                                       id="instructorPhone"
                                                       type="text" <?php echo e($errors->first('phone') ? 'autofocus' : ''); ?>>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Email')); ?> <strong
                                                        class="text-danger">*</strong></label>
                                                <input class="primary_input_field"
                                                       value="<?php echo e(old('email')); ?>"
                                                       name="email" placeholder="-"
                                                       id="instructorEmail"
                                                       type="email" <?php echo e($errors->first('email') ? 'autofocus' : ''); ?>>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Image')); ?>

                                                    <small><?php echo e(__('student.Recommended size')); ?>

                                                        (330x400)</small></label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary-input imgName"
                                                           type="text"
                                                           id="instructorImage"
                                                           readonly="">
                                                    <button class="" type="button">
                                                        <label
                                                            class="primary-btn small fix-gr-bg"
                                                            for="document_file_edit"><?php echo e(__('common.Browse')); ?></label>
                                                        <input type="file"
                                                               class="d-none imgBrowse"
                                                               name="image"
                                                               id="document_file_edit">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Password')); ?> </label>

                                                <div class="input-group mb-2 mr-sm-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i
                                                                style="cursor:pointer;"
                                                                class="fas fa-eye-slash eye toggle-password"></i>
                                                        </div>
                                                    </div>
                                                    <input type="password"
                                                           class="form-control primary_input_field"
                                                           id="password" name="password"
                                                           placeholder="<?php echo e(__('common.Minimum 8 characters')); ?>" <?php echo e($errors->first('password') ? 'autofocus' : ''); ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Confirm Password')); ?>

                                                </label>

                                                <div class="input-group mb-2 mr-sm-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i
                                                                style="cursor:pointer;"
                                                                class="fas fa-eye-slash eye toggle-password"></i>
                                                        </div>
                                                    </div>
                                                    <input type="password"
                                                           class="form-control primary_input_field"
                                                           id="password"
                                                           name="password_confirmation"
                                                           placeholder="<?php echo e(__('common.Minimum 8 characters')); ?>" <?php echo e($errors->first('password_confirmation') ? 'autofocus' : ''); ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""> <?php echo e(__('common.Facebook URL')); ?></label>
                                                <input class="primary_input_field"
                                                       value="<?php echo e(old('facebook')); ?>"
                                                       name="facebook" placeholder="-"
                                                       id="instructorFacebook"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""> <?php echo e(__('common.Twitter URL')); ?></label>
                                                <input class="primary_input_field"
                                                       value="<?php echo e(old('twitter')); ?>"
                                                       name="twitter" placeholder="-"
                                                       id="instructorTwitter"
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""> <?php echo e(__('common.LinkedIn URL')); ?></label>
                                                <input class="primary_input_field"
                                                       value="<?php echo e(old('linkedin')); ?>"
                                                       name="" placeholder="-"
                                                       id="instructorLinkedin"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""> <?php echo e(__('common.Instagram URL')); ?></label>
                                                <input class="primary_input_field"
                                                       value="<?php echo e(old('instagram')); ?>"
                                                       name="instagram" placeholder="-"
                                                       id="instructorInstragram"
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-center pt_15">
                                        <div class="d-flex justify-content-center">
                                            <button class="primary-btn semi_large2  fix-gr-bg"
                                                    id="save_button_parent" type="submit"><i
                                                    class="ti-check"></i> <?php echo e(__('common.Update')); ?> <?php echo e(__('courses.Instructor')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade admin-query" id="deleteInstructor">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="<?php echo e(route('instructor.delete')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="modal-header">
                                    <h4 class="modal-title"><?php echo e(__('common.Delete')); ?> <?php echo e(__('quiz.Instructor')); ?> </h4>
                                    <button type="button" class="close" data-dismiss="modal"><i
                                            class="ti-close "></i></button>
                                </div>

                                <div class="modal-body">
                                    <div class="text-center">

                                        <h4><?php echo e(__('common.Are you sure to delete ?')); ?></h4>
                                    </div>
                                    <input type="hidden" name="id" value="" id="instructorDeleteId">

                                    <div class="mt-40 d-flex justify-content-between">
                                        <button type="button" class="primary-btn tr-bg"
                                                data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>
                                        <button class="primary-btn fix-gr-bg"
                                                type="submit"><?php echo e(__('common.Delete')); ?></button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php if($errors->any()): ?>
        <script>
            <?php if(Session::has('type')): ?>
            <?php if(Session::get('type')=="store"): ?>
            $('#add_instructor').modal('show');
            <?php else: ?>
            $('#editInstructor').modal('show');
            <?php endif; ?>
            <?php endif; ?>
        </script>
    <?php endif; ?>

    <?php
        $url = route('getAllInstructorData');
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
                {data: 'image', name: 'image', orderable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                    <?php if(isModuleActive('OrgInstructorPolicy')): ?>
                {
                    data: 'group_policy', name: 'group_policy'
                },
                    <?php endif; ?>
                {
                    data: 'status', name: 'status', orderable: false
                },
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
    <script src="<?php echo e(asset('public/backend/js/instructor_list.js')); ?>"></script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/SystemSetting/Providers/../Resources/views/instructor.blade.php ENDPATH**/ ?>