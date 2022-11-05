<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> | <?php echo e(__('courses.Courses')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/classes.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>




    <?php if (isset($component)) { $__componentOriginal3a5e00c35df92ba00166354818816394acac10fd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CoursePageSection::class, ['request' => $request,'categories' => $categories,'languages' => $languages]); ?>
<?php $component->withName('course-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a5e00c35df92ba00166354818816394acac10fd)): ?>
<?php $component = $__componentOriginal3a5e00c35df92ba00166354818816394acac10fd; ?>
<?php unset($__componentOriginal3a5e00c35df92ba00166354818816394acac10fd); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make(theme('layouts.master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/courses.blade.php ENDPATH**/ ?>