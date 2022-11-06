<?php $__env->startPush('styles'); ?>
    <style>
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            width: 100%;
            height: 46px;
            line-height: 46px;
            font-size: 13px;
            padding: 3px 20px;
            padding-left: 20px;
            font-weight: 300;
            border-radius: 30px;
            color: var(--base_color);
            border: 1px solid #ECEEF4
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 46px;
            position: absolute;
            top: 1px;
            right: 20px;
            width: 20px;
            color: var(--text-color);
        }

        .select2-dropdown {
            background-color: white;
            border: 1px solid #ECEEF4;
            border-radius: 4px;
            box-sizing: border-box;
            display: block;
            position: absolute;
            left: -100000px;
            width: 100%;
            width: 100%;
            background: var(--bg_white);
            overflow: auto !important;
            border-radius: 0px 0px 10px 10px;
            margin-top: 1px;
            z-index: 9999 !important;
            border: 0;
            box-shadow: 0px 10px 20px rgb(108 39 255 / 30%);
            z-index: 1051;
            min-width: 200px;
        }

        .select2-search--dropdown .select2-search__field {
            padding: 4px;
            width: 100%;
            box-sizing: border-box;
            box-sizing: border-box;
            background-color: #fff;
            border: 1px solid rgba(130, 139, 178, 0.3) !important;
            border-radius: 3px;
            box-shadow: none;
            color: #333;
            display: inline-block;
            vertical-align: middle;
            padding: 0px 8px;
            width: 100% !important;
            height: 46px;
            line-height: 46px;
            outline: 0 !important;
        }

        .select2-container {
            width: 100% !important;
            min-width: 90px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 40px;
        }

        .max{
            z-index: 9999999999999;
        }
        .modal-open .modal{
            z-index: 1050!important;
        }
        .modal-backdrop {
            /*background-color:transparent;*/
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .page-item.active .page-link {
            background: linear-gradient(
                90deg, #7c32ff 0%, #c738d8 100%);
        }
    </style>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo e(__('setting.City List')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('setting.Setting')); ?></a>
                    <a class="active" href="#"> <?php echo e(__('setting.City List')); ?></a>
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
                        <form action="<?php echo e(route('city.index')); ?>" method="GET">
                            <div class="row">

                                <div class="col-lg-3 mt-10">

                                    <label class="primary_input_label" for="country"><?php echo e(__('common.Country')); ?></label>
                                    <select class="primary_select" name="country" id="country">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('common.Country')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('common.Country')); ?></option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($country->id); ?>" <?php echo e(isset($country_search)?$country_search==$country->id?'selected':'':''); ?>><?php echo e(@$country->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-3 mt-10">

                                    <label class="primary_input_label" for="state"><?php echo e(__('common.State')); ?></label>
                                    <select class="stateList" name="state" id="state">
                                        <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('common.State')); ?>"
                                                value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('common.State')); ?></option>
                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($state->id); ?>" <?php echo e(isset($state_search)?$state_search==$state->id?'selected':'':''); ?>><?php echo e(@$state->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-3 mt-10">
                                    <label class="primary_input_label" for="category"><?php echo e(__('common.Name')); ?></label>
                                    <input name="name" class="primary_input_field name" placeholder="City Name"
                                           value="<?php echo e($city_search); ?>"
                                           type="text">

                                </div>


                                <div class="col-lg-2 mt-50">
                                    <div class="search_course_btn text-right">
                                        <button type="submit"
                                                class="primary-btn radius_30px mr-10 fix-gr-bg"><?php echo e(__('courses.Filter')); ?> </button>
                                    </div>
                                </div>
                            </div>
                                                         <input type="hidden" name="page" value="<?php echo e(isset($_GET['page'])?$_GET['page']:1); ?>"> 
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('setting.City List')); ?></h3>
                                    <ul class="d-flex">

                                        <li><a data-toggle="modal" class="primary-btn radius_30px mr-10 fix-gr-bg"
                                               href="#" onclick="open_add_city_modal()"><i
                                                    class="ti-plus"></i><?php echo e(__('common.Add New')); ?> <?php echo e(__('common.City')); ?>

                                            </a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table  ">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('common.SL')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Country')); ?></th>
                                        <th scope="col"><?php echo e(__('common.State')); ?></th>
                                        <th scope="col"><?php echo e(__('common.City')); ?></th>

                                        <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($cities)==0): ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No Data Found</td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($key+1); ?></th>
                                            <td><?php echo e($city->state->country->name); ?></td>
                                            <td><?php echo e($city->state->name); ?></td>
                                            <td><?php echo e($city->name); ?></td>

                                            <td>
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <?php echo e(__('common.Select')); ?>

                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">

                                                        <a href="#" data-toggle="modal" data-target="#Item_Edit"
                                                           class="dropdown-item edit_brand"
                                                           onclick="edit_city_modal(<?php echo e($city->id); ?>)"><?php echo e(__('common.Edit')); ?></a>


                                                        <a onclick="confirm_modal('<?php echo e(route('city.destroy', $city->id)); ?>');"
                                                           class="dropdown-item edit_brand"><?php echo e(__('common.Delete')); ?></a>

                                                    </div>
                                                </div>
                                                <!-- shortby  -->
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>

                                </table>

                            </div>
                            <div class="mt-3">
                                <?php echo e($cities->appends(Request::all())->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="edit_form">

    </div>
    <div id="add_city_modal">
        <div class="modal fade admin-query" id="city_add">
            <div class="modal-dialog modal_800px modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('common.Add New')); ?> <?php echo e(__('common.City')); ?></h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="ti-close "></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo e(route('city.store')); ?>" method="POST" id="city_addForm">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for=""><?php echo e(__('common.Country')); ?> <strong
                                                class="text-danger">*</strong></label>
                                        <select class="primary_select" name="country" id="country_add">
                                            <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('common.Country')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('common.Country')); ?></option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($country->id); ?>"><?php echo e(@$country->name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for=""><?php echo e(__('common.State')); ?> <strong
                                                class="text-danger">*</strong></label>
                                        <select class="stateList max" name="state" id="state_add">
                                            <option data-display="<?php echo e(__('common.Select')); ?> <?php echo e(__('common.State')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('common.State')); ?></option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for=""><?php echo e(__('common.Name')); ?> <strong
                                                class="text-danger">*</strong></label>
                                        <input name="name" class="primary_input_field name" placeholder="City Name"
                                               type="text" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <div class="d-flex justify-content-center pt_20">
                                        <button type="submit" class="primary-btn semi_large2  fix-gr-bg"
                                                id="save_button_parent"><i
                                                class="ti-check"></i><?php echo e(__('common.Save')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="city_edit" class="city_edit" value="<?php echo e(route('city.edit_modal')); ?>">

    <?php echo $__env->make('backend.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('public/backend/js/city.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Setting/Resources/views/city/index.blade.php ENDPATH**/ ?>