<?php $__env->startSection('mainContent'); ?>


    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('role.role_permission')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('setting.System Settings')); ?></a>
                    <a href="#"><?php echo e(__('role.role_permission')); ?></a>
                </div>
            </div>
        </div>
    </section>


    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30">
                                    <?php if(isset($role)): ?>
                                        <?php echo app('translator')->get('common.Edit'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('common.Add'); ?>
                                    <?php endif; ?>
                                    <?php echo app('translator')->get('role.Role'); ?>
                                </h3>
                            </div>
                            <?php if(isset($role)): ?>
                                <?php if(permissionCheck('permission.roles.update')): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => route('permission.roles.update',$role->id),'method' => 'PUT'])); ?>

                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(permissionCheck('permission.roles.store')): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'permission.roles.store', 'method' => 'POST'])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row  mt-25">
                                        <div class="col-lg-12">
                                            <?php if(session()->has('message-success')): ?>
                                                <div class="alert alert-success">
                                                    <?php echo e(session()->get('message-success')); ?>

                                                </div>
                                            <?php elseif(session()->has('message-danger')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(session()->get('message-danger')); ?>

                                                </div>
                                            <?php endif; ?>
                                            <div class="input-effect">
                                                <label><?php echo app('translator')->get('common.Name'); ?> <span>*</span></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="name" autocomplete="off"
                                                    value="<?php echo e(isset($role)? @$role->name: ''); ?>" required="1">
                                                <input type="hidden" name="id" value="<?php echo e(isset($role)? @$role->id: ''); ?>">
                                                <?php if($errors->has('name')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $tooltip = "";
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <?php if(permissionCheck('permission.roles.update') || permissionCheck('permission.roles.store')): ?>
                                                <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                        title="<?php echo e(@$tooltip); ?>">
                                                    <span class="ti-check"></span>
                                                    <?php echo e(!isset($role)? 'save' : 'update'); ?>


                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo e(__('role.Role')); ?> <?php echo e(__('common.List')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="QA_section QA_section_heading_custom check_box_table">
                                <div class="QA_table ">
                                    <!-- table-responsive -->
                                    <div class="mt-30">
                                        <table class="table Crm_table_active">
                                            <thead>
                                            <?php echo $__env->make('backend.partials.alertMessagePageLevelAll', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <tr>
                                                <th width="30%"><?php echo e(__('role.Role')); ?></th>
                                                <th width="30%"><?php echo e(__('common.Type')); ?></th>
                                                <th width="40%"><?php echo e(__('common.Action')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $RoleList->where('id','<>',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($role->id == 5 && !isModuleActive('Organization')): ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td><?php echo e(@$role->name); ?></td>
                                                        <td><?php echo e(@$role->type); ?></td>
                                                        <td>
                                                            <?php if(@$role->type == 'User Defined'): ?>
                                                                <div class="dropdown CRM_dropdown d-inline">
                                                                    <button
                                                                        class="btn btn-secondary dropdown-toggle mt-1"
                                                                        type="button" id="dropdownMenu2"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <?php echo e(__('common.select')); ?>

                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                         aria-labelledby="dropdownMenu2">
                                                                        <?php if(permissionCheck('permission.roles.update')): ?>
                                                                            <a href="<?php echo e(route('permission.roles.edit',$role->id)); ?>"
                                                                               class="dropdown-item"
                                                                               type="button"><?php echo app('translator')->get('common.edit'); ?></a>
                                                                        <?php endif; ?>

                                                                        <?php if(permissionCheck('permission.roles.destroy')): ?>
                                                                            <a onclick="confirm_modal('<?php echo e(route('permission.roles.destroy', $role->id)); ?>');"
                                                                               class="dropdown-item edit_brand"><?php echo e(__('common.delete')); ?></a>
                                                                        <?php endif; ?>

                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        <!-- shortby  -->
                                                            <?php if(@$role->id != 1): ?>
                                                                <?php if(permissionCheck('permission.permissions.store')): ?>
                                                                    <a href="<?php echo e(route('permission.permissions.index', [ 'id' => @$role->id])); ?>"
                                                                       class="">
                                                                        <button type="button"
                                                                                class="primary-btn small fix-gr-bg"> <?php echo e(__('role.assign_permission')); ?> </button>
                                                                    </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('backend.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/RolePermission/Resources/views/index.blade.php ENDPATH**/ ?>