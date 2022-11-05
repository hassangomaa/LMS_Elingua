<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/student_list.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php
    $table_name='users';
?>
<?php $__env->startSection('table'); ?>
    <?php echo e($table_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('student.Students')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('student.Students')); ?></a>
                    <a href="#"><?php echo e(__('student.Students List')); ?></a>
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
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('student.Students List')); ?></h3>

                            <ul class="d-flex">
                                <?php if(permissionCheck('student.store')): ?>
                                    <li><a class="primary-btn radius_30px mr-10 fix-gr-bg" data-toggle="modal"
                                           id="add_student_btn"
                                           data-target="#add_student" href="#"><i
                                                class="ti-plus"></i><?php echo e(__('student.Add Student')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isModuleActive('TeachOffline')): ?>
                                    <li><a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                           href="<?php echo e(route('student_import')); ?>"><i
                                                class="ti-plus"></i><?php echo e(__('student.Import Student')); ?></a></li>
                                <?php endif; ?>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-40">
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
                                        <th scope="col"><?php echo e(__('student.Phone')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Courses')); ?></th>
                                        <th scope="col"><?php echo e(__('common.gender')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Date of Birth')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Country')); ?></th>
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
                <div class="modal fade admin-query" id="add_student">
                    <div class="modal-dialog modal_1000px modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo e(__('student.Add New Student')); ?></h4>
                                <button type="button" class="close " data-dismiss="modal">
                                    <i class="ti-close "></i>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="<?php echo e(route('student.store')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Name')); ?> <strong
                                                        class="text-danger">*</strong></label>
                                                <input class="primary_input_field" name="name" placeholder="-"
                                                       type="text" id="addName"
                                                       value="<?php echo e(old('name')); ?>" <?php echo e($errors->first('name') ? 'autofocus' : ''); ?>>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.About')); ?></label>
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
                                                                <input placeholder="Date"
                                                                       class="primary_input_field primary-input date form-control"
                                                                       id="startDate" type="text" name="dob"
                                                                       value="<?php echo e(old('dob')); ?>"
                                                                       autocomplete="off" <?php echo e($errors->first('dob') ? 'autofocus' : ''); ?>>
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
                                                <input class="primary_input_field" value="<?php echo e(old('phone')); ?>"
                                                       name="phone" id="addPhone"
                                                       placeholder="-"
                                                       type="text" <?php echo e($errors->first('phone') ? 'autofocus' : ''); ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Email')); ?> <strong
                                                        class="text-danger">*</strong></label>
                                                <input class="primary_input_field" name="email" placeholder="-"
                                                       value="<?php echo e(old('email')); ?>" id="addEmail"
                                                       <?php echo e($errors->first('email') ? 'autofocus' : ''); ?>

                                                       type="email">
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.gender')); ?>

                                                </label>

                                                <select class="primary_select"
                                                        data-course_id="<?php echo e(@$course->id); ?>" name="gender">
                                                    <option
                                                        data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('common.gender')); ?>"
                                                        value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('common.gender')); ?> </option>

                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.company')); ?> </label>
                                                <input class="primary_input_field" value="<?php echo e(old('company')); ?>"
                                                       name="company" id="addCompany"
                                                       placeholder="-"
                                                       type="text" <?php echo e($errors->first('company') ? 'autofocus' : ''); ?>>
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
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Password')); ?>

                                                    <strong
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
                                                       for=""><?php echo e(__('common.Confirm Password')); ?> <strong
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
                                                                                                     <input class="primary_input_field"  name="password_confirmation" placeholder="-" type="text"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Facebook URL')); ?></label>
                                                <input class="primary_input_field" name="facebook" placeholder="-"
                                                       id="addFacebook"
                                                       type="text" value="<?php echo e(old('facebook')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Twitter URL')); ?></label>
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
                                                       for=""><?php echo e(__('common.LinkedIn URL')); ?></label>
                                                <input class="primary_input_field" name="linkedin" placeholder="-"
                                                       id="addLinked"
                                                       type="text" value="<?php echo e(old('linkedin')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Youtube URL')); ?></label>
                                                <input class="primary_input_field" name="youtube" placeholder="-"
                                                       id="addYoutube"
                                                       type="text" value="<?php echo e(old('youtube')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center pt_15">
                                        <div class="d-flex justify-content-center">
                                            <button class="primary-btn semi_large2  fix-gr-bg" id="save_button_parent"
                                                    type="submit"><i
                                                    class="ti-check"></i> <?php echo e(__('common.Save')); ?> <?php echo e(__('student.Student')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade admin-query" id="editStudent">
                    <div class="modal-dialog modal_1000px modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo e(__('student.Update Student')); ?></h4>
                                <button type="button" class="close " data-dismiss="modal">
                                    <i class="ti-close "></i>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="<?php echo e(route('student.update')); ?>" method="POST"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e(old('id')); ?>" id="studentId">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Name')); ?> <strong
                                                        class="text-danger">*</strong></label>
                                                <input class="primary_input_field"
                                                       value="<?php echo e(old('name')); ?>" name="name"
                                                       placeholder="-" id="studentName"
                                                       type="text" <?php echo e($errors->first('name') ? 'autofocus' : ''); ?>>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.About')); ?></label>
                                                <textarea class="lms_summernote" name="about"
                                                          id="studentAbout" cols="30"
                                                          rows="10"><?php echo e(old('about')); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-15">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Date of Birth')); ?>  </label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="Date"
                                                                       class="primary_input_field primary-input date form-control"
                                                                       id="studentDob"
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
                                                <input class="primary_input_field" id="studentPhone"
                                                       <?php echo e($errors->first('phone') ? 'autofocus' : ''); ?>

                                                       value="<?php echo e(old('phone')); ?>" name="phone"
                                                       placeholder="-" type="text">
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
                                                       <?php echo e($errors->first('email') ? 'autofocus' : ''); ?>

                                                       value="<?php echo e(old('email')); ?>" name="email" id="studentEmail"
                                                       placeholder="-" type="email">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.gender')); ?>

                                                </label>
                                                <select class="primary_select"
                                                        data-course_id="<?php echo e(@$course->id); ?>" name="gender"
                                                        id="studentGender">
                                                    <option
                                                        data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('common.gender')); ?>"
                                                        value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('common.gender')); ?> </option>

                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.company')); ?> </label>
                                                <input class="primary_input_field" value="<?php echo e(old('company')); ?>"
                                                       name="company" id="studentCompany"
                                                       placeholder="-"
                                                       type="text" <?php echo e($errors->first('company') ? 'autofocus' : ''); ?>>
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
                                                           id="studentImage"
                                                           placeholder="<?php echo e(trans('student.Browse Image file')); ?>"
                                                           readonly="">
                                                    <button class="" type="button">
                                                        <label
                                                            class="primary-btn small fix-gr-bg"
                                                            for="document_file_edit"><?php echo e(__('common.Browse')); ?></label>
                                                        <input type="file"
                                                               <?php echo e($errors->first('image') ? 'autofocus' : ''); ?>

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
                                                           <?php echo e($errors->first('password') ? 'autofocus' : ''); ?>

                                                           class="form-control primary_input_field"
                                                           id="password" name="password"
                                                           placeholder="<?php echo e(__('common.Minimum 8 characters')); ?>">
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
                                                           <?php echo e($errors->first('password_confirmation') ? 'autofocus' : ''); ?>

                                                           name="password_confirmation"
                                                           placeholder="<?php echo e(__('common.Minimum 8 characters')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Facebook URL')); ?></label>
                                                <input class="primary_input_field"
                                                       value='<?php echo e(old('facebook')); ?>'
                                                       id="studentFacebook"
                                                       name="facebook" placeholder="-"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Twitter URL')); ?></label>
                                                <input class="primary_input_field"
                                                       id="studentTwitter"
                                                       value="<?php echo e(old('twitter')); ?>"
                                                       name="twitter" placeholder="-"
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.LinkedIn URL')); ?></label>
                                                <input class="primary_input_field"
                                                       id="studentLinkedin"
                                                       value="<?php echo e(old('linkedin')); ?>"
                                                       name="linkedin" placeholder="-"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for="studentYoutube"><?php echo e(__('common.Youtube URL')); ?></label>
                                                <input class="primary_input_field"
                                                       value="<?php echo e(old('youtube')); ?>"
                                                       id="studentYoutube"
                                                       name="youtube" placeholder="-"
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center pt_15">
                                        <div class="d-flex justify-content-center">
                                            <button class="primary-btn semi_large2  fix-gr-bg"
                                                    id="save_button_parent" type="submit"><i
                                                    class="ti-check"></i> <?php echo e(__('student.Update Student')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade admin-query" id="deleteStudent">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo e(__('common.Delete')); ?> <?php echo e(__('student.Student')); ?> </h4>
                                <button type="button" class="close" data-dismiss="modal"><i
                                        class="ti-close "></i></button>
                            </div>

                            <div class="modal-body">
                                <form action="<?php echo e(route('student.delete')); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <div class="text-center">

                                        <h4><?php echo e(__('common.Are you sure to delete ?')); ?> </h4>
                                    </div>
                                    <input type="hidden" name="id" value="" id="studentDeleteId">
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
            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

    <?php if($errors->any()): ?>
        <script>
            <?php if(Session::has('type')): ?>
            <?php if(Session::get('type')=="store"): ?>
            $('#add_student').modal('show');
            <?php else: ?>
            $('#editStudent').modal('show');
            <?php endif; ?>
            <?php endif; ?>
        </script>
    <?php endif; ?>


    <?php
        $url = route('student.getAllStudentData');
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
                data: function () {
                    //pass variable
                },
                pages: 5 // number of pages to cache
            }),
            columns: [
                {data: 'DT_RowIndex', name: 'id', orderable: true},
                {data: 'image', name: 'image', orderable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'course_count', name: 'course_count'},
                {data: 'gender', name: 'gender'},
                {data: 'dob', name: 'dob'},
                {data: 'country', name: 'country'},
                {data: 'status', name: 'status', orderable: false},
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

        // let table = $('#allData').DataTable() ;
        // table.clearPipeline();
        // table.ajax.reload();


    </script>

    <script src="<?php echo e(asset('public/backend/js/student_list.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/StudentSetting/Providers/../Resources/views/student_list.blade.php ENDPATH**/ ?>