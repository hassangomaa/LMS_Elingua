<div>
    <div class="main_content_iner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="purchase_history_wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="section__title3 mb_40">
                                    <h3 class="mb-0"><?php echo e(__('communication.Your referral link')); ?></h3>
                                    <p><?php echo e(__('communication.Share the referral link with your friends.')); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="col-12">
                                    <div class="referral_copy_link mb_30">
                                        <div class="referral_copy_inner">
                                            <div class="single_input">
                                                <input type="text" id="referral_link"
                                                       placeholder="-"
                                                       value="<?php echo e(route('referralCode',Auth::user()->referral)); ?>"
                                                       class="primary_input white_input">
                                            </div>
                                            <button onclick="copyCurrentUrl()"
                                                    class="theme_btn mt-3 height_50"><?php echo e(__('communication.Copy Link')); ?></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php if(count($referrals)!=0): ?>
        <div class="main_content_iner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="purchase_history_wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section__title3 mb_40">
                                        <h3 class="mb-0"><?php echo e(__('communication.Your referral list')); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="table-responsive">
                                        <table class="table custom_table3 mb-0">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?php echo e(__('common.SL')); ?></th>
                                                <th scope="col"><?php echo e(__('common.User')); ?></th>
                                                <th scope="col"><?php echo e(__('common.Date')); ?></th>
                                                <th scope="col"><?php echo e(__('payment.Discount Amount')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(isset($referrals)): ?>
                                                <?php $__currentLoopData = $referrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $referral): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <?php echo e(dd($referral)); ?>  
                                                    <tr>
                                                        <td><?php echo e($key+1); ?></td>
                                                        <td>
                                                            <div class="CourseMeta d-flex align-items-center">
                                                                <div class="profile_info">
                                                                    <img class=""
                                                                         src="<?php echo e(getProfileImage(@$referral->image)); ?>"
                                                                         alt="">
                                                                </div>
                                                                <div class="reffer_meta">
                                                                    <a href="#"><h4
                                                                            class="font_16 f_w_400 mb-0 d-inline-block"><?php echo e(@$referral->name); ?></h4>
                                                                    </a>
                                                                                                                                         <a href="#"><p 
                                                                                                                                                 class="font_14"><?php echo e(@$referral->email); ?></p> 
                                                                                                                                         </a> 
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><?php echo e(showDate($referral->created_at)); ?></td>
                                                        <td><?php echo e(Settings('currency_symbol') ??'৳'); ?>  <?php echo e(@$referral->bonus_amount); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/referal-page-section.blade.php ENDPATH**/ ?>