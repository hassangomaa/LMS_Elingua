<table>
    <tr>
        <th scope="col"><?php echo e(__('SL')); ?></th>
        <th scope="col"><?php echo e(__('courses.Course')); ?></th>
        <?php if(isModuleActive('Org')): ?>
            <th scope="col"><?php echo e(__('courses.Required Type')); ?></th>
        <?php endif; ?>
        <th scope="col"><?php echo e(__('courses.Enrolled')); ?></th>
        <th scope="col"><?php echo e(__('courses.Not Started yet')); ?></th>
        <th scope="col"><?php echo e(__('courses.In Progress')); ?></th>
        <th scope="col"><?php echo e(__('courses.Finished')); ?></th>
        <th scope="col"><?php echo e(__('courses.Finish Rate')); ?></th>
    </tr>
    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $statistic =$course->totalStatistic();
           $finished =$statistic['finished'];
                 $total = $course->total_enrolled;
                 $percentage = 0;
                 if ($total != 0) {
                     $percentage = ($finished / $total) * 100;
                     if ($percentage > 100) {
                         $percentage = 100;
                     }
                 }
                 $percentage= round($percentage) . '%';
        ?>
        <tr>
            <td><?php echo e(++$key); ?></td>
            <td><?php echo e($course->title); ?></td>
            <?php if(isModuleActive('Org')): ?>
                <td><?php echo e($course->required_type == 1 ? trans('courses.Compulsory') : trans('courses.Open')); ?></td>
            <?php endif; ?>
            <td><?php echo e($course->total_enrolled); ?></td>
            <td><?php echo e($statistic['not_start']); ?></td>
            <td><?php echo e($statistic['in_process']); ?></td>
            <td><?php echo e($statistic['finished']); ?></td>
            <td><?php echo e($percentage); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/CourseSetting/Providers/../Resources/views/exports/course-statistic-report.blade.php ENDPATH**/ ?>