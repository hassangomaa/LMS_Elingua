<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> |
<?php if( routeIs('myClasses')): ?>
    <?php echo e(__('courses.Live Class')); ?>

<?php elseif( routeIs('myQuizzes')): ?>
    <?php echo e(__('courses.My Quizzes')); ?>

<?php else: ?>
    <?php echo e(__('courses.My Courses')); ?>

<?php endif; ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/my_course.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <?php if (isset($component)) { $__componentOriginalee594883564c9d346e1a1f2817147c97ec0d7a99 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MyCoursesPageSection::class, ['request' => $request]); ?>
<?php $component->withName('my-courses-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee594883564c9d346e1a1f2817147c97ec0d7a99)): ?>
<?php $component = $__componentOriginalee594883564c9d346e1a1f2817147c97ec0d7a99; ?>
<?php unset($__componentOriginalee594883564c9d346e1a1f2817147c97ec0d7a99); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.dashboard_master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/myCourses.blade.php ENDPATH**/ ?>