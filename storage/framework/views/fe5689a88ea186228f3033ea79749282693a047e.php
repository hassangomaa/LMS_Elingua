<div class="">
    <!-- table-responsive -->
    <table class="table Crm_table_active3">
        <thead>
        <tr>

            <th scope="col"><?php echo e(__('common.ID')); ?></th>
            <th scope="col"><?php echo e(__('common.Name')); ?></th>
            <th scope="col"><?php echo e(__('leave.Department Head')); ?></th>
            <th scope="col"><?php echo e(__('common.Action')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

                <th><?php echo e($key + 1); ?></th>
                <td><?php echo e($item->name); ?></td>
                <td><?php echo e($item->staff->user->name ?? ''); ?></td>
                <td>
                    <!-- shortby  -->
                    <div class="dropdown CRM_dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="dropdownMenu2" data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                            <?php echo e(__('common.Select')); ?>

                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                <a href="#" class="dropdown-item edit_brand"
                                   onclick="editItem(<?php echo e($item); ?>)"><?php echo e(__('common.Edit')); ?></a>
                                <a href="#" class="dropdown-item edit_brand"
                                   onclick="showDeleteModal(<?php echo e($item->id); ?>)"><?php echo e(__('common.Delete')); ?></a>
                        </div>
                    </div>
                    <!-- shortby  -->
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/SystemSetting/Providers/../Resources/views/department/components/list.blade.php ENDPATH**/ ?>