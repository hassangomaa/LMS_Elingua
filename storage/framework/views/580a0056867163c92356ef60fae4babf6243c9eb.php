<?php
    $table_name='courses';
?>
<?php $__env->startSection('table'); ?><?php echo e($table_name); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('courses.Courses')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('courses.Courses')); ?></a>
                    <a href="#"><?php echo e(__('courses.Courses List')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row justify-content-center mt-50">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="white_box_tittle list_header">
                            <h4><?php echo e(__('courses.Advanced Filter')); ?> </h4>
                        </div>
                        <form action="<?php echo e(route('courseSortBy')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <div class="col-lg-3 mt-30">

                                    <label class="primary_input_label" for="category"><?php echo e(__('courses.Category')); ?></label>
                                    <select class="primary_select" name="category" id="category">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Category')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Category')); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($category->id); ?>" <?php echo e(isset($category_search)?$category_search==$category->id?'selected':'':''); ?>><?php echo e(@$category->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-3 mt-30">

                                    <label class="primary_input_label" for="type"><?php echo e(__('courses.Type')); ?></label>
                                    <select class="primary_select" name="type" id="type">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Type')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Type')); ?></option>
                                        <option
                                            value="1" <?php echo e(isset($category_type)?$category_type==1?'selected':'':''); ?>><?php echo e(__('courses.Course')); ?></option>
                                        <option
                                            value="2" <?php echo e(isset($category_type)?$category_type==2?'selected':'':''); ?>><?php echo e(__('quiz.Quiz')); ?></option>
                                    </select>

                                </div>
                                <div class="col-lg-3 mt-30">

                                    <label class="primary_input_label"
                                           for="instructor"><?php echo e(__('courses.Instructor')); ?></label>
                                    <select class="primary_select" name="instructor" id="instructor">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Instructor')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Instructor')); ?></option>
                                        <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($instructor->id); ?>" <?php echo e(isset($category_instructor)?$category_instructor==$instructor->id?'selected':'':''); ?>><?php echo e(@$instructor->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                <div class="col-lg-3 mt-30 d-none">
                                    <label class="primary_input_label" for="course"><?php echo e(__('courses.Statistics')); ?></label>
                                    <select class="primary_select" name="course" id="course">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Statistics')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Statistics')); ?></option>
                                        <option value="statistics"><?php echo e(__('courses.Statistics')); ?></option>
                                        <option value="topSell">Top Sells</option>
                                        <option value="mostReview">Most Review</option>
                                        <option value="mostComment">Most Comment</option>
                                        <option value="topReview">Top Review</option>
                                    </select>

                                </div>
                                <div class="col-lg-3 mt-30">

                                    <label class="primary_input_label" for="status"><?php echo e(__('common.Status')); ?></label>
                                    <select class="primary_select" name="search_status" id="status">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('common.Status')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('common.Status')); ?></option>
                                        <option
                                            value="1" <?php echo e(isset($category_status)?$category_status=="1"?'selected':'':''); ?>><?php echo e(__('courses.Active')); ?> </option>
                                        <option
                                            value="0" <?php echo e(isset($category_status)?$category_status=="0"?'selected':'':''); ?>><?php echo e(__('courses.Pending')); ?> </option>
                                    </select>

                                </div>
                                <?php if(isModuleActive('Org')): ?>
                                    <div class="col-lg-3 mt-30">
                                        <label class="primary_input_label"
                                               for="search_required_type"><?php echo e(__('courses.Required Type')); ?></label>
                                        <select class="primary_select" name="search_required_type"
                                                id="search_required_type">
                                            <option
                                                data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Required Type')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Required Type')); ?></option>
                                            <option
                                                value="1" <?php echo e(isset($search_required_type)?$search_required_type=="1"?'selected':'':''); ?>><?php echo e(__('courses.Compulsory')); ?> </option>
                                            <option
                                                value="0" <?php echo e(isset($search_required_type)?$search_required_type=="0"?'selected':'':''); ?>> <?php echo e(__('courses.Open')); ?></option>
                                        </select>

                                    </div>

                                    <div class="col-lg-3 mt-30">

                                        <label class="primary_input_label"
                                               for="status"><?php echo e(__('courses.Delivery Mode')); ?></label>
                                        <select class="primary_select" name="search_delivery_mode" id="status">
                                            <option
                                                data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Delivery Mode')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Delivery Mode')); ?></option>
                                            <option
                                                value="1" <?php echo e(isset($search_delivery_mode)?$search_delivery_mode=="1"?'selected':'':''); ?>><?php echo e(__('courses.Online')); ?> </option>
                                            <option
                                                value="3" <?php echo e(isset($search_delivery_mode)?$search_delivery_mode=="3"?'selected':'':''); ?>><?php echo e(__('courses.Offline')); ?></option>
                                        </select>

                                    </div>
                                <?php endif; ?>
                                <div class="col-12 mt-20">
                                    <div class="search_course_btn text-right">
                                        <button type="submit"
                                                class="primary-btn radius_30px mr-10 fix-gr-bg"><?php echo e(__('courses.Filter')); ?> </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e($title??""); ?> <?php echo e(__('courses.Course')); ?>

                                /<?php echo e(__('quiz.Quiz')); ?> <?php echo e(__('courses.List')); ?></h3>
                            <?php if(permissionCheck('course.store')): ?>
                                <ul class="d-flex">
                                    <li>


                                        <a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                           href="<?php echo e(route('addNewCourse')); ?>">
                                            <i class="ti-plus"></i><?php echo e(__('common.Add')); ?> <?php echo e(__('courses.Course')); ?>

                                            /<?php echo e(__('quiz.Quiz')); ?></a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table classList">
                                    <thead>
                                    <tr>
                                        <th scope="col"> <?php echo e(__('common.SL')); ?></th>
                                        <th scope="col"> <?php echo e(__('coupons.Type')); ?></th>
                                        <?php if(isModuleActive('Org')): ?>
                                            <th scope="col"> <?php echo e(__('courses.Required Type')); ?></th>
                                        <?php endif; ?>
                                        <th scope="col"><?php echo e(__('courses.Course')); ?>

                                            /<?php echo e(__('quiz.Quiz')); ?> <?php echo e(__('coupons.Title')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Delivery')); ?></th>
                                        <th scope="col"><?php echo e(__('quiz.Category')); ?></th>
                                        <?php if(!isModuleActive('Org')): ?>
                                            <th scope="col"><?php echo e(__('quiz.Quiz')); ?></th>
                                        <?php endif; ?>
                                        <th scope="col"><?php echo e(__('courses.Instructor')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Lesson')); ?></th>
                                        <th scope="col"><?php echo e(__('courses.Enrolled')); ?></th>
                                        <?php if(showEcommerce()): ?>
                                            <th scope="col"><?php echo e(__('courses.Price')); ?></th>
                                        <?php endif; ?>
                                        <th scope="col"><?php echo e(__('courses.View Scope')); ?></th>
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
                  <?php dd(Auth::user()); ?>  


                <div class="modal fade admin-query" id="editCourse">
                    <div class="modal-dialog modal_1000px modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo e(__('common.Edit')); ?> <?php echo e(__('quiz.Topic')); ?> </h4>
                                <button type="button" class="close " data-dismiss="modal">
                                    <i class="ti-close "></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('AdminUpdateCourse')); ?>" method="POST"
                                      enctype="multipart/form-data" id="courseEditForm">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-xl-6 ">
                                            <div class="primary_input mb-25">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="primary_input_label"
                                                               for="    "> <?php echo e(__('courses.Type')); ?></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="radio"
                                                               class="common-radio type1"
                                                               id="type_edit_1"
                                                               name="type"
                                                               value="1">
                                                        <label
                                                            for="type_edit_1"><?php echo e(__('courses.Course')); ?></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="radio"
                                                               class="common-radio type2"
                                                               id="type_edit_2"
                                                               name="type"
                                                               value="2">
                                                        <label
                                                            for="type_edit_2"><?php echo e(__('quiz.Quiz')); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-6 dripCheck">
                                            <div class="primary_input mb-25">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="primary_input_label"
                                                               for="    "> <?php echo e(__('common.Drip Content')); ?></label>
                                                    </div>

                                                    <div class="col-md-6">

                                                        <input type="radio"
                                                               class="common-radio drip0"
                                                               id="drip_edit_0"
                                                               name="drip"
                                                               value="0" <?php echo e(@$course->drip==0?"checked":""); ?>>
                                                        <label
                                                            for="drip_edit_0"><?php echo e(__('common.No')); ?></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="radio"
                                                               class="common-radio drip1"
                                                               id="drip_edit_1"
                                                               name="drip"
                                                               value="1" <?php echo e(@$course->drip==1?"checked":""); ?>>
                                                        <label
                                                            for="drip_edit_1"><?php echo e(__('common.Yes')); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for="title"><?php echo e(__('quiz.Topic')); ?> <?php echo e(__('common.Title')); ?>

                                                    *</label>
                                                <input class="primary_input_field" name="title"
                                                       id="title"
                                                       placeholder="-"
                                                       type="text" <?php echo e($errors->has('title') ? 'autofocus' : ''); ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" class="course_id" id="editCourseId"
                                           value="">

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                       for="about"><?php echo e(__('courses.Course')); ?> <?php echo e(__('courses.Requirements')); ?> </label>
                                                <textarea class="lms_summernote"
                                                          name="requirements"

                                                          id="requirementsEdit" cols="30"
                                                          rows="10"> </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                       for="about"><?php echo e(__('courses.Course')); ?> <?php echo e(__('courses.Description')); ?></label>
                                                <textarea class="lms_summernote" name="about"

                                                          id="aboutEdit" cols="30"
                                                          rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                       for="about"><?php echo e(__('courses.Course')); ?> <?php echo e(__('courses.Outcomes')); ?>  </label>
                                                <textarea class="lms_summernote" name="outcomes"

                                                          id="outcomesEdit" cols="30"
                                                          rows="10"> </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-xl-6 courseBox">
                                            <select class="primary_select edit_category_id"
                                                    name="category"
                                                <?php echo e($errors->has('category') ? 'autofocus' : ''); ?>>
                                                <option
                                                    data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Category')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Category')); ?>

                                                    *
                                                </option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"><?php echo e(@$category->name); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="col-xl-6 courseBox"
                                             id="edit_subCategoryDiv<?php echo e(@$course->id); ?>">
                                            <select class="primary_select " name="sub_category"
                                                    id="edit_subcategory_id" <?php echo e($errors->has('sub_category') ? 'autofocus' : ''); ?>>
                                                <option
                                                    data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Sub Category')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Sub Category')); ?>


                                                </option>


                                            </select>
                                        </div>
                                        <div class="col-xl-6 mt-30 quizBox"
                                             style="display: none">
                                            <select class="primary_select" name="quiz"
                                                    id="quiz_edit_id" <?php echo e($errors->has('quiz') ? 'autofocus' : ''); ?>>
                                                <option
                                                    data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Quiz')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('quiz.Quiz')); ?>

                                                    *
                                                </option>
                                                <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($quiz->id); ?>"
                                                    ><?php echo e(@$quiz->title); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="col-xl-4 mt-30 makeResize">
                                            <select class="primary_select" id="levelEdit"
                                                    name="level" <?php echo e($errors->has('level') ? 'autofocus' : ''); ?>>
                                                <option
                                                    data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Level')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Level')); ?>

                                                    *
                                                </option>
                                                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($level->id); ?>"
                                                    >
                                                        <?php echo e($level->title); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                        </div>
                                        <div class="col-xl-4 mt-30 makeResize" id="">
                                            <select class="primary_select mb_30" name="language"
                                                    id="languageEdit" <?php echo e($errors->has('language') ? 'autofocus' : ''); ?>>
                                                <option
                                                    data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Language')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Language')); ?>

                                                    *
                                                </option>

                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($language->id); ?>"
                                                    ><?php echo e($language->native); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-4 makeResize">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Duration')); ?> (<?php echo e(__('common.In Minute')); ?>)
                                                    *</label>
                                                <input class="primary_input_field" id="durationEdit"
                                                       name="duration" placeholder="-"

                                                       min="0" step="any"
                                                       type="number" <?php echo e($errors->has('duration') ? 'autofocus' : ''); ?>>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row d-none">
                                        <div class="col-lg-6">
                                            <div
                                                class="checkbox_wrap d-flex align-items-center">
                                                <label for="course_1" class="switch_toggle">
                                                    <input type="checkbox" id="edit_course_1">
                                                    <i class="slider round"></i>
                                                </label>
                                                <label><?php echo e(__('courses.This course is a top course')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-lg-6">
                                            <div
                                                class="checkbox_wrap d-flex align-items-center mt-40">
                                                <label for="editCourseFree"
                                                       class="switch_toggle">
                                                    <input type="checkbox" class="edit_course_2" name="is_free"
                                                           value="1"
                                                           id="editCourseFree"
                                                    >
                                                    <i class="slider round"></i>
                                                </label>
                                                <label><?php echo e(__('courses.This course is a free course')); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4"
                                             id="edit_price_div">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('courses.Price')); ?></label>
                                                <input class="primary_input_field" name="price" id="priceEdit"
                                                       placeholder="-"
                                                       value="" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20 editDiscountDiv">
                                        <div class="col-lg-6">
                                            <div
                                                class="checkbox_wrap d-flex align-items-center mt-40">
                                                <label for="editCourseDiscount"
                                                       class="switch_toggle">
                                                    <input type="checkbox" class="edit_course_3"
                                                           name="is_discount" value="1"
                                                           id="editCourseDiscount">
                                                    <i class="slider round"></i>
                                                </label>
                                                <label><?php echo e(__('courses.This course has discounted price')); ?></label>
                                            </div>
                                        </div>

                                        <div class="col-xl-4"
                                             id="edit_discount_price_div">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('courses.Discount')); ?> <?php echo e(__('courses.Price')); ?></label>
                                                <input class="primary_input_field editDiscount"
                                                       name="discount_price" id="editDiscountPrice"

                                                       placeholder="-" type="text">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-20 videoOption">
                                        <div class="col-xl-4 mt-25">
                                            <select class="primary_select category_id "
                                                    name="host"
                                                    id="editCourseHost">
                                                <option
                                                    data-display="<?php echo e(__('courses.Course overview host')); ?> *"
                                                    value=""><?php echo e(__('courses.Course overview host')); ?>

                                                </option>

                                                <option value="Youtube"
                                                >
                                                    <?php echo e(__('courses.Youtube')); ?>

                                                </option>
                                                <option value="Vimeo"
                                                >
                                                    <?php echo e(__('courses.Vimeo')); ?>

                                                </option>
                                                <?php if(isModuleActive("AmazonS3")): ?>
                                                    <option value="AmazonS3"
                                                    >
                                                        <?php echo e(__('courses.Amazon S3')); ?>

                                                    </option>
                                                <?php endif; ?>

                                                <option value="Self"
                                                >
                                                    <?php echo e(__('courses.Self Host')); ?>

                                                </option>


                                            </select>
                                        </div>
                                        <div class="col-xl-8 ">
                                            <div class="input-effect videoUrl"
                                                 style="display:<?php if((isset($course) && (@$course->host!="Youtube")) || !isset($course)): ?> none  <?php endif; ?>">
                                                <label><?php echo e(__('courses.Video URL')); ?>

                                                    <span>*</span></label>
                                                <input
                                                    id="couseEditViewUrl"
                                                    class="primary_input_field youtubeVideo name<?php echo e($errors->has('trailer_link') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="trailer_link"
                                                    placeholder="<?php echo e(__('courses.Video URL')); ?>"
                                                    autocomplete="off"
                                                    value=" " <?php echo e($errors->has('trailer_link') ? 'autofocus' : ''); ?>>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('trailer_link')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('trailer_link')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="row  vimeoUrl" id=""
                                                 style="display: <?php if((isset($course) && (@$course->host!="Vimeo")) || !isset($course)): ?> none  <?php endif; ?>">
                                                <div class="col-lg-12" id="">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('courses.Vimeo Video')); ?></label>
                                                    <select class="primary_select vimeoVideo"
                                                            name="vimeo"
                                                            id="viemoEditCourse">
                                                        <option
                                                            data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Video')); ?>"
                                                            value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('courses.Video')); ?>

                                                        </option>
                                                        <?php $__currentLoopData = $video_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option
                                                                value="<?php echo e(@$video['uri']); ?>"><?php echo e(@$video['name']); ?></option>


                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php if($errors->has('vimeo')): ?>
                                                        <span
                                                            class="invalid-feedback invalid-select"
                                                            role="alert">
                                            <strong><?php echo e($errors->first('vimeo')); ?></strong>
                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="row  videofileupload" id=""
                                                 style="display: <?php if((isset($course) && ((@$course->host=="Vimeo") ||  (@$course->host=="Youtube")) ) || !isset($course)): ?> none  <?php endif; ?>">

                                                <div class="col-xl-12">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label"
                                                               for=""><?php echo e(__('courses.Video File')); ?></label>
                                                        <div class="primary_file_uploader">
                                                              <input
                                                                 class="primary-input filePlaceholder"
                                                                 type="text"

                                                                 placeholder="<?php echo e(__('courses.Browse Video file')); ?>"
                                                                 readonly="">
                                                             <button class="" type="button">
                                                                 <label
                                                                     class="primary-btn small fix-gr-bg"
                                                                     for="document_file_edit"><?php echo e(__('common.Browse')); ?></label>
                                                                 <input type="file"
                                                                        class="d-none fileUpload"
                                                                        name="file"
                                                                        id="document_file_edit">
                                                             </button>

                                                             <?php if($errors->has('file')): ?>
                                                                 <span
                                                                     class="invalid-feedback invalid-select"
                                                                     role="alert">
                                             <strong><?php echo e($errors->first('file')); ?></strong>
                                         </span>
                                                             <?php endif; ?> 
                                                            <input type="file" class="filepond" name="file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-20">


                                        <div class="col-xl-6">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('courses.Course Thumbnail')); ?>

                                                    (<?php echo e(__('common.Max Image Size 1MB')); ?>)
                                                    *</label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary-input filePlaceholder"
                                                           type="text"
                                                           id=""

                                                           placeholder="<?php echo e(__('courses.Browse Image file')); ?>"
                                                           readonly="" <?php echo e($errors->has('image') ? 'autofocus' : ''); ?>>
                                                    <button class="" type="button">
                                                        <label
                                                            class="primary-btn small fix-gr-bg"
                                                            for="document_file_1_edit_"><?php echo e(__('common.Browse')); ?></label>
                                                        <input type="file"
                                                               class="d-none fileUpload"
                                                               name="image"
                                                               id="document_file_1_edit_">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(\Illuminate\Support\Facades\Auth::user()->subscription_api_status==1): ?>
                                            <div class="col-xl-6">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('newsletter.Subscription List')); ?>

                                                </label>
                                                <select class="primary_select" id="subscriptionEdit"
                                                        name="subscription_list" <?php echo e($errors->has('subscription_list') ? 'autofocus' : ''); ?>>
                                                    <option
                                                        data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('newsletter.Subscription List')); ?>"
                                                        value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('newsletter.Subscription List')); ?>


                                                    </option>
                                                    <?php $__currentLoopData = $sub_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($list['id']); ?>">
                                                            <?php echo e($list['name']); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">


                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('courses.Meta keywords')); ?></label>
                                                <input class="primary_input_field"
                                                       name="meta_keywords" id="editMetaKey"
                                                       placeholder="-" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('courses.Meta description')); ?></label>
                                                <textarea id="editMetaDetails"
                                                          class="primary_input_field"
                                                          name="meta_description"
                                                          style="height: 200px"
                                                          rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center pt_15">
                                        <div class="d-flex justify-content-center">
                                            <button class="primary-btn semi_large2  fix-gr-bg"
                                                    id="save_button_parent" type="submit"><i
                                                    class="ti-check"></i> <?php echo e(__('common.Update')); ?>  <?php echo e(__('courses.Course')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section>
    <?php echo $__env->make('backend.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('/')); ?>/Modules/CourseSetting/Resources/assets/js/course.js"></script>

    <?php

        if (\Route::current()->getName() == 'getAllCourse') {
            $url = route('getAllCourseData').'?course_status=3';
        }  elseif (\Route::current()->getName() == 'getActiveCourse') {
         $url = route('getAllCourseData').'?course_status=1';
        } elseif (\Route::current()->getName() == 'getPendingCourse') {
        $url = route('getAllCourseData').'?course_status=0';
        } elseif (\Route::current()->getName() == 'courseSortBy' ||\Route::current()->getName() == 'courseSortByGet') {

    $category=request()->get('category');
    $type=request()->get('type');
    $instructor=request()->get('instructor');
    $status=request()->get('search_status');
    $search_required_type=request()->get('search_required_type');
    $search_delivery_mode=request()->get('search_delivery_mode');
    $url = route('getAllCourseData').'?search_status='.$status.'&category='.$category.'&type='.$type.'&instructor='.$instructor.'&required_type='.$search_required_type.'&mode_of_delivery='.$search_delivery_mode;

        }else{
             $url = route('getAllCourseData');
        }
    ?>

    <script>
        let table = $('.classList').DataTable({
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
                {data: 'type', name: 'type'},
                    <?php if(isModuleActive('Org')): ?>
                {
                    data: 'required_type', name: 'required_type'
                },
                    <?php endif; ?>
                {
                    data: 'title', name: 'title'
                },
                {data: 'mode_of_delivery', name: 'mode_of_delivery'},
                {data: 'category', name: 'category.name'},
                    <?php if(!isModuleActive('Org')): ?>
                {
                    data: 'quiz', name: 'quiz.title'
                },
                    <?php endif; ?>
                {
                    data: 'user', name: 'user.name'
                },

                {data: 'lessons', name: 'lessons'},
                {data: 'enrolled_users', name: 'enrolled_users'},
                    <?php if(showEcommerce()): ?>
                {
                    data: 'price', name: 'price'
                }, <?php endif; ?>
                {
                    data: 'scope', name: 'scope'
                },
                {data: 'status', name: 'search_status', orderable: false, searchable: false},
                {
                    data: 'action', name: 'action', orderable: false
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

        $('#lms_table_info').append('<span id="add_here"> new-dynamic-text</span>');
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/CourseSetting/Providers/../Resources/views/courses.blade.php ENDPATH**/ ?>