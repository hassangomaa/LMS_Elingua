<option value="<?php echo e($category->id); ?>"
    <?php echo e($category_search==$category->id?'selected':''); ?>

>
    <?php for($i=2;$i<=$level;$i++): ?>
        &#160; &#160;
    <?php endfor; ?>
    <?php echo e($category->name); ?>

</option>


<?php if(isset($category->childs)): ?>
    <?php if(count($category->childs)!=0): ?>
        <?php $__currentLoopData = $category->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('coursesetting::parts_of_course_details.category_select_option',['category'=>$child,'level'=>$level + 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?>

<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/CourseSetting/Providers/../Resources/views/parts_of_course_details/category_select_option.blade.php ENDPATH**/ ?>