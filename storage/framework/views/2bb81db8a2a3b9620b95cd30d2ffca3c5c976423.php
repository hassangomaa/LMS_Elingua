<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/role_module_style.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e($role->name); ?> <?php echo e(__('role.Role')); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('dashboard.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('setting.System Settings')); ?></a>
                    <a href="#"><?php echo e($role->name); ?> <?php echo e(__('role.Role')); ?></a>
                </div>
            </div>
        </div>
    </section>

    <div class="role_permission_wrap">
        <div class="permission_title">
            <h4><?php echo e(__('role.assign_permission')); ?> </h4>
        </div>
    </div>
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'permission.permissions.store','method' => 'POST'])); ?>

    <div class="erp_role_permission_area ">
        <!-- single_permission  -->
        <input type="hidden" name="role_id" value="<?php echo e(@$role->id); ?>">
        <div class="mesonary_role_header">
            <?php $__currentLoopData = $MainMenuList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $Module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('rolepermission::page-components.permissionModule',[ 'key' =>$key, 'Module' =>$Module ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


        <div class="row mt-40">
            <div class="col-lg-12 text-center">
                <button class="primary-btn fix-gr-bg">
                    <span class="ti-check"></span>
                    <?php echo e(__('common.Submit')); ?>

                </button>
            </div>
        </div>

    </div>
    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('public/backend/js/permission.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/RolePermission/Resources/views/permission.blade.php ENDPATH**/ ?>