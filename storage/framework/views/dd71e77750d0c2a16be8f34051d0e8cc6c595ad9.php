<table>
    <tr>
        <th scope="col"><?php echo e(__('SL')); ?></th>
        <th scope="col"><?php echo e(__('quiz.Quiz')); ?></th>
        <?php if(isModuleActive('Org')): ?>
            <th scope="col"><?php echo e(__('courses.Required Type')); ?></th>
        <?php endif; ?>
        <th scope="col"><?php echo e(__('courses.Enrolled')); ?></th>
        <th scope="col"><?php echo e(__('courses.Not Started yet')); ?></th>
        <th scope="col"><?php echo e(__('common.Fail')); ?></th>
        <th scope="col"><?php echo e(__('common.Pass')); ?></th>
        <th scope="col"><?php echo e(__('quiz.Taken Pass Rate')); ?></th>
    </tr>
    <tr>
        <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $statistic =$quiz->totalQuizStatistic();

                 $pass = $statistic['pass'];
                    $total = $quiz->total_enrolled;
                    $percentage = 0;
                    if ($total != 0) {
                        $percentage = ($pass / $total) * 100;
                        if ($percentage > 100) {
                            $percentage = 100;
                        }
                    }
                    $percentage= $percentage . '%';
            ?>
            <td><?php echo e(++$key); ?></td>
            <td><?php echo e($quiz->title); ?></td>
            <?php if(isModuleActive('Org')): ?>
                <td><?php echo e($quiz->required_type == 1 ? trans('courses.Compulsory') : trans('courses.Open')); ?></td>
            <?php endif; ?>
            <td><?php echo e($quiz->total_enrolled); ?></td>
            <td><?php echo e($statistic['not_start']); ?></td>
            <td><?php echo e($statistic['fail']); ?></td>
            <td><?php echo e($statistic['pass']); ?></td>
            <td><?php echo e($percentage); ?></td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
</table>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/CourseSetting/Providers/../Resources/views/exports/quiz-statistic-report.blade.php ENDPATH**/ ?>