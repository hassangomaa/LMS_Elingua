<div>
    <style>
        .pb_50 {
            padding-bottom: 50px;
        }
    </style>
    <div class="main_content_iner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="purchase_history_wrapper pb_50">
                        <div class="row">
                            <div class="col-12">
                                <div class="section__title3 mb_40">
                                    <h3 class="mb-0"><?php echo e(__('payment.Purchase history')); ?></h3>
                                    <h4></h4>
                                </div>
                            </div>
                        </div>
                        <?php if(count($enrolls)==0): ?>
                            <div class="col-12">
                                <div class="section__title3 margin_50">
                                    <p class="text-center"><?php echo e(__('student.No Course Purchased Yet')); ?>!</p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="table-responsive">
                                        <table class="table custom_table3">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?php echo e(__('common.SL')); ?></th>
                                                <th scope="col"><?php echo e(__('common.Date')); ?></th>
                                                <th scope="col"><?php echo e(__('common.Total Courses')); ?></th>
                                                <th scope="col"><?php echo e(__('payment.Total Price')); ?></th>
                                                <th scope="col"><?php echo e(__('common.Discount')); ?></th>
                                                <?php if(hasTax()): ?>
                                                    <th scope="col"><?php echo e(__('tax.TAX')); ?></th>
                                                <?php endif; ?>
                                                <th scope="col"><?php echo e(__('common.Payment Type')); ?></th>
                                                <th scope="col"><?php echo e(__('payment.Invoice')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(isset($enrolls)): ?>
                                                <?php $__currentLoopData = $enrolls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$enroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td scope="row"><?php echo e(@$key+1); ?></td>

                                                        <td><?php echo e(showDate($enroll->created_at)); ?></td>

                                                        <td>
                                                            <?php if(count($enroll->courses)==0): ?>
                                                                1
                                                            <?php else: ?>
                                                                <?php echo e(count($enroll->courses)); ?>

                                                            <?php endif; ?>

                                                        </td>
                                                        <td>

                                                            <?php echo e(getPriceFormat($enroll->purchase_price)); ?>


                                                        </td>


                                                        <td>
                                                            <?php if($enroll->discount!=0): ?>

                                                                <?php echo e(getPriceFormat($enroll->discount)); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <?php if(hasTax()): ?>
                                                            <td>
                                                                <?php if($enroll->tax): ?>

                                                                    <?php echo e(getPriceFormat($enroll->tax)); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                        <?php endif; ?>
                                                        <td>
                                                            <?php echo e($enroll->payment_method); ?>

                                                        </td>
                                                        <td>
                                                            <a href="<?php echo e(route('invoice',$enroll->id)); ?>"
                                                               class="link_value theme_btn small_btn4"><?php echo e(__('common.View')); ?></a>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                        <?php echo e($enrolls->links()); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                    <?php if(isSubscribe()): ?>
                        <div class="purchase_history_wrapper mt-0 pt-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section__title3 mb_40">
                                        <h3 class="mb-0"><?php echo e(__('subscription.Subscription History')); ?></h3>
                                        <h4></h4>
                                    </div>
                                </div>
                            </div>
                            <?php if(count($checkouts)==0): ?>
                                <div class="col-12">
                                    <div class="section__title3 margin_50">
                                        <p class="text-center"><?php echo e(__('subscription.No Subscription Purchased Yet')); ?>!</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table custom_table3 mb-0">
                                                <thead>
                                                <tr>
                                                    <th scope="col"><?php echo e(__('common.SL')); ?></th>
                                                    <th scope="col"><?php echo e(__('subscription.Plan')); ?></th>
                                                    <th scope="col"><?php echo e(__('subscription.Start Date')); ?></th>
                                                    <th scope="col"><?php echo e(__('subscription.End Date')); ?></th>
                                                    <th scope="col"><?php echo e(__('subscription.Days')); ?></th>
                                                    <th scope="col"><?php echo e(__('subscription.Price')); ?></th>
                                                    <th scope="col"><?php echo e(__('subscription.Payment Method')); ?></th>
                                                    <th scope="col"><?php echo e(__('subscription.Status')); ?></th>
                                                    <th scope="col"><?php echo e(__('payment.Invoice')); ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(isset($checkouts)): ?>
                                                    <?php $__currentLoopData = $checkouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$checkout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td scope="row"><?php echo e(@$key+1); ?></td>
                                                            <td><?php echo e($checkout->plan->title); ?></td>

                                                            <td><?php echo e(showDate($checkout->start_date)); ?></td>
                                                            <td><?php echo e(showDate($checkout->end_date)); ?></td>


                                                            <td> <?php echo e($checkout->days); ?>    </td>
                                                            <td> <?php echo e($checkout->price); ?>    </td>
                                                            <td> <?php echo e($checkout->payment_method); ?>    </td>
                                                            <td>
                                                                <?php
                                                                    $date_of_subscription = $checkout->end_date;
    $now = new DateTime();
    $startdate = new DateTime($checkout->start_date);
    $enddate = new DateTime($checkout->end_date);

    if($startdate <= $now && $now <= $enddate) {
        echo "Valid";
    }else{
        echo "Expire";
    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo e(route('subInvoice',$checkout->id)); ?>"
                                                                   class="link_value theme_btn small_btn4"><?php echo e(__('common.View')); ?></a>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                            <?php echo e($checkouts->links()); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/my-purchase-page-secton.blade.php ENDPATH**/ ?>