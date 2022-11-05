<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('common.Staff List')); ?></h3>
                            <?php if(permissionCheck('staffs.store')): ?>
                            <ul class="d-flex">
                                <li><a class="primary-btn radius_30px mr-10 fix-gr-bg" href="<?php echo e(route('staffs.create')); ?>"><i class="ti-plus"></i><?php echo e(__('common.Add New')); ?> <?php echo e(__('common.Staff')); ?></a></li>
                                  <li><a class="primary-btn radius_30px mr-10 fix-gr-bg" href="<?php echo e(route('staffs.csv_upload')); ?>"><i class="ti-export"></i><?php echo e(__('leave.Upload Via CSV')); ?></a></li>  
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
                                <table class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('common.ID')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Name')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Email')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Phone')); ?></th>
                                        <th scope="col"><?php echo e(__('role.Role')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                        <th scope="col"><?php echo e(__('department.Department')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Registered Date')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($staff->user != null): ?>
                                            <tr>

                                                <th><?php echo e($key+1); ?></th>
                                                <td><?php echo e(@$staff->user->name); ?></td>
                                                <td><a href="mailto:<?php echo e(@$staff->user->email); ?>"><?php echo e(@$staff->user->email); ?></a></td>
                                                <td><a href="tel:<?php echo e(@$staff->phone); ?>"><?php echo e(@$staff->phone); ?></a></td>
                                                <td><?php echo e(@$staff->user->role->name); ?></td>
                                                <td>
                                                    <?php if(@$staff->user->role_id != 1): ?>

                                                            <label class="switch_toggle" for="active_checkbox<?php echo e($staff->id); ?>">
                                                                <input type="checkbox" id="active_checkbox<?php echo e($staff->id); ?>" <?php echo e(permissionCheck('staffs.edit') ? '' : 'disabled'); ?> <?php echo e($staff->user->is_active == 1 ? 'checked' : ''); ?>

                                                                value="<?php echo e($staff->user->id); ?>" onchange="update_active_status(this)">
                                                                <div class="slider round"></div>
                                                            </label>

                                                    <?php endif; ?>

                                                </td>
                                                <td><?php echo e(@$staff->department->name ?? ''); ?></td>
                                                <td><?php echo e($staff->created_at); ?></td>

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
                                                            <?php if(permissionCheck('staffs.update')): ?>
                                                            <a href="<?php echo e(route('staffs.edit', $staff->id)); ?>"  class="dropdown-item"><?php echo e(__('common.Edit')); ?></a>
                                                            <?php endif; ?>

                                                            <?php if(permissionCheck('staffs.view')): ?>
                                                            <a href="<?php echo e(route('staffs.view', $staff->id)); ?>" class="dropdown-item"><?php echo e(__('common.View')); ?></a>
                                                            <?php endif; ?>

                                                            <?php if(permissionCheck('staffs.destroy')): ?>
                                                            <a onclick="confirm_modal('<?php echo e(route('staffs.destroy', $staff->user->id)); ?>');" class="dropdown-item edit_brand"><?php echo e(__('common.Delete')); ?></a>
                                                            <?php endif; ?>
                                                             <?php if(permissionCheck('staffs.active') && $staff->user->is_active == 0): ?> 
                                                                 <a data-id="<?php echo e($staff->user->id); ?>" class="dropdown-item active_staff"><?php echo e(__('common.Active')); ?></a> 
                                                             <?php endif; ?> 
                                                             <?php if(permissionCheck('staffs.inactive') && $staff->user->is_active == 1): ?> 
                                                                 <a data-id="<?php echo e($staff->user->id); ?>" class="dropdown-item inactive_staff"><?php echo e(__('common.Inactive')); ?></a> 
                                                             <?php endif; ?> 
                                                            <?php if(permissionCheck('staffs.resume')): ?>
                                                                <a data-id="<?php echo e($staff->user->id); ?>" class="dropdown-item staff_resume"><?php echo e(__('common.Resume')); ?></a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <!-- shortby  -->
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
    </section>
    <div id="inactive_form"></div>
    <input type="hidden" value="<?php echo e(route("staffs.resume", ":id")); ?>" id="resume_url">
    <input type="hidden" value="<?php echo e(route("staffs.active", ":id")); ?>" id="active_url">
    <input type="hidden" value="<?php echo e(route("staffs.inactive", ":id")); ?>" id="inactive_url">
    <input type="hidden" value="<?php echo e(route("staffs.inactive.update", ":id")); ?>" id="inactive_update_url">
<?php echo $__env->make('backend.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        let _token = $('meta[name=_token]').attr('content') ;
        $(document).on('click','.active_staff',function (event){
            event.preventDefault();
            let id = $(this).data('id');
            let url =  $('#active_url').val();
            url = url.replace(':id',id);
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if(response){
                        window.location.reload();
                        toastr.success('Staff Active Successfully');
                    }
                },
                error: function(response) {
                    toastr.error("Something went wrong");
                }
            });

        });
        $(document).on('click','.inactive_staff',function (event){
            event.preventDefault();
            let id = $(this).data('id');
            let url =  $('#inactive_url').val();
            url = url.replace(':id',id);
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if(response){
                        $('#inactive_form').html(response);
                        $('.date').datepicker();
                        $('#inactive_staff_modal').modal('show');
                    }
                },
                error: function(response) {
                    toastr.error("Something went wrong");
                }
            });

        });
        $(document).on('submit', '#inactive_staff_submit', function(event){
            event.preventDefault();
            let formElement = $(this).serializeArray()
            let formData = new FormData();
            formElement.forEach(element => {
                formData.append(element.name,element.value);
            });
            formData.append('_token',_token);
            let id = $('#rowId').val();
            let url = $('#inactive_update_url').val();
            url = url.replace(':id',id);
            $.ajax({
                url: url,
                type:"POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success:function(response){
                    $('#inactive_staff_modal').modal('hide');
                    window.location.reload();
                    toastr.success('Staff Inactive Successfully');
                },
                error:function(response) {
                    $('#inactive_staff_modal').modal('show');
                }
            });
        });
        $(document).on('click','.staff_resume',function (event){
            event.preventDefault();
            let id = $(this).data('id');
            let url =  $('#resume_url').val();
            url = url.replace(':id',id);
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if(response){
                        $('#inactive_form').html(response);
                        $('#resume_staff_modal').modal('show');
                    }
                },
                error: function(response) {
                    toastr.error("Something went wrong");
                }
            });

        });

        function update_active_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('staffs.update_active_status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data.success){
                    toastr.success(data.success);
                }
                else{
                    toastr.error(data.error);
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/SystemSetting/Providers/../Resources/views/staffs/index.blade.php ENDPATH**/ ?>