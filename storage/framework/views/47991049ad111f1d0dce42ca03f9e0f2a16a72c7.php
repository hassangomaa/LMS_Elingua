<li>
    <a href="javascript:;" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small"><span class="fas fa-question-circle"></span></div>
        <div class="nav_title"><span><?php echo e(__('quiz.Quiz')); ?></span></div>
    </a>
    <ul>
        <?php if(permissionCheck('question-group')): ?>
            <li><a href="<?php echo e(route('question-group')); ?>"><?php echo e(__('quiz.Question Group')); ?></a></li>
        <?php endif; ?>

        <?php if(permissionCheck('question-bank')): ?>
            <li><a href="<?php echo e(route('question-bank')); ?>"><?php echo e(__('quiz.Add')); ?> <?php echo e(__('quiz.Question')); ?></a></li>
        <?php endif; ?>

        <?php if(permissionCheck('question-bank')): ?>
            <li><a href="<?php echo e(route('question-bank-list')); ?>"><?php echo e(__('quiz.Question Bank')); ?> </a>
            </li>
        <?php endif; ?>


        <?php if(permissionCheck('question-bank-bulk')): ?>
            <li><a href="<?php echo e(route('question-bank-bulk')); ?>"><?php echo e(__('quiz.Question')); ?> <?php echo e(__('quiz.Bulk Import')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(permissionCheck('set-quiz.store')): ?>
            <li><a href="<?php echo e(route('online-quiz')); ?>"><?php echo e(__('quiz.Add Quiz')); ?></a></li>
        <?php endif; ?>
        <?php if(permissionCheck('quizSetup')): ?>
            <li><a href="<?php echo e(route('quizSetup')); ?>"><?php echo e(__('quiz.Quiz Setup')); ?></a></li>
        <?php endif; ?>

        <?php if(isModuleActive('Assignment')): ?>
            <li><a href="<?php echo e(route('assignment_list')); ?>"><?php echo e(__('assignment.Assignment List')); ?>

                    <?php if(env('APP_SYNC')): ?>
                        <span class="demo_addons_sub">Addon</span>
                    <?php endif; ?>
                </a></li>
        <?php endif; ?>
    </ul>
</li>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Quiz/Resources/views/menu.blade.php ENDPATH**/ ?>