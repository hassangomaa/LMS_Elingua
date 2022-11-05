<div>
    <div class="main_content_iner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="purchase_history_wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="section__title3 mb_40">
                                    <h3 class="mb-0"><?php echo e(__('payment.Fund Deposit')); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <form action="<?php echo e(route('depositSelectOption')); ?>" method="post">
                                    <div class="single_totl_warp col-lg-12 pl-0">
                                        <?php echo csrf_field(); ?>

                                        <h3 class="font_18 mb-2"><?php echo e(__('payment.Payment Amount')); ?>

                                            (<?php echo e(Settings('currency_symbol') ??'৳'); ?>)
                                            <span
                                                class="text-danger">*</span></h3>
                                        <div class="input-group mb-3 input-group-lg">

                                            <input
                                                placeholder="<?php echo e(Settings('currency_symbol') ??'৳'); ?>"
                                                name="deposit_amount" type="number" step="any"
                                                min="1" value="<?php echo e(!empty($amount)?$amount:''); ?>"
                                                class="primary_input col-md-6"
                                                required>

                                            <div class="input-group-prepend">
                                                <button type="submit" style="margin-bottom: 30px;"
                                                        class="theme_btn btn-sm  small_btn2"><?php echo e(__('payment.Save Info')); ?> </button>

                                            </div>
                                            <strong
                                                class="text-danger"><?php echo e($errors->first('deposit_amount')); ?></strong>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if(!empty($amount)): ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="section__title3 mb_40">
                                                    <h3 class="mb-0"><?php echo e(__('common.Select')); ?> <?php echo e(__('payment.Payment Method')); ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="deposit_lists_wrapper mb-50">
                                                    <?php if(isset($methods)): ?>
                                                        <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                if (!paymentGateWayCredentialsEmptyCheck($gateway->method)){
                                                                continue;
                                                                }
                                                            ?>
                                                            <div
                                                                class="single_deposite <?php echo e($gateway->method=="Bank Payment"?'p-0 border-0':''); ?>">

                                                                <?php if($gateway->method=="Stripe"): ?>
                                                                    <form action="<?php echo e(route('depositSubmit')); ?>"
                                                                          method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="method"
                                                                               value="<?php echo e($gateway->method); ?>">
                                                                        <input type="hidden" name="deposit_amount"
                                                                               value="<?php echo e($amount); ?>">
                                                                        <!-- single_deposite_item  -->
                                                                        <button type="submit" class="">
                                                                            <img
                                                                                src="<?php echo e(asset($gateway->logo)); ?>"
                                                                                alt="">
                                                                        </button>
                                                                        <?php echo csrf_field(); ?>
                                                                        <script
                                                                            src="https://checkout.stripe.com/checkout.js"
                                                                            class="stripe-button"
                                                                            data-key="<?php echo e(getPaymentEnv('STRIPE_KEY')); ?>"
                                                                            data-name="Stripe Payment"
                                                                            data-image="<?php echo e(asset(Settings('favicon') )); ?>"
                                                                            data-locale="auto"
                                                                            data-currency="usd">
                                                                        </script>


                                                                    </form>
                                                                <?php elseif($gateway->method=="MercadoPago"): ?>

                                                                    <div class="">

                                                                        <a href="#" data-toggle="modal"
                                                                           data-target="#MakePaymentFromCreditMercadoPago"
                                                                           class=" ">
                                                                            <img class=" w-100" style="    padding: 0;
                                                                    margin-top: -2px;"
                                                                                 src="<?php echo e(asset($gateway->logo)); ?>"
                                                                                 alt="">
                                                                        </a>
                                                                    </div>


                                                                    <div class="modal fade "
                                                                         id="MakePaymentFromCreditMercadoPago"
                                                                         tabindex="-1"
                                                                         role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg"
                                                                             role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="">MercadoPago</h5>
                                                                                </div>


                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <?php
                                                                                            $total_amount =$amount;
                                                                                            $route =route('depositSubmit');
                                                                                            $payment_type ='Deposit'
                                                                                        ?>
                                                                                        <div class="col-md-12">
                                                                                            <?php echo $__env->make('mercadopago::partials._checkout',compact('total_amount','payment_type'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                <?php elseif($gateway->method=="RazorPay"): ?>

                                                                    <?php echo csrf_field(); ?>

                                                                    <div class="single_deposite_item">

                                                                        <div class="deposite_button text-center">
                                                                            <form action="<?php echo e(route('depositSubmit')); ?>"
                                                                                  method="POST">
                                                                                <input type="hidden" name="method"
                                                                                       value="<?php echo e($gateway->method); ?>">
                                                                                <input type="hidden"
                                                                                       name="deposit_amount"
                                                                                       value="<?php echo e($amount); ?>">
                                                                                <button type="button"
                                                                                        class="">
                                                                                    <img class="submitBtn"
                                                                                         src="<?php echo e(asset($gateway->logo)); ?>"
                                                                                         alt="">
                                                                                </button>
                                                                                <?php echo csrf_field(); ?>
                                                                                <script
                                                                                    src="https://checkout.razorpay.com/v1/checkout.js"
                                                                                    data-key="<?php echo e(getPaymentEnv('RAZOR_KEY')); ?>"
                                                                                    data-amount="<?php echo e(convertCurrency(Settings('currency_code') ??'BDT', 'INR', $amount)*100); ?>"
                                                                                    data-name="<?php echo e(str_replace('_', ' ',config('app.name') )); ?>"
                                                                                    data-description="Cart Payment"
                                                                                    data-image="<?php echo e(asset(Settings('favicon') )); ?>"
                                                                                    data-prefill.name="<?php echo e(@Auth::user()->username); ?>"
                                                                                    data-prefill.email="<?php echo e(@Auth::user()->email); ?>"
                                                                                    data-theme.color="#ff7529">
                                                                                </script>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                <?php elseif($gateway->method=="PayPal"): ?>

                                                                    <form action="<?php echo e(route('depositSubmit')); ?>"
                                                                          method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="method"
                                                                               value="<?php echo e($gateway->method); ?>">
                                                                        <input type="hidden" name="deposit_amount"
                                                                               value="<?php echo e($amount); ?>">
                                                                        <button type="submit" class="">
                                                                            <img class=""
                                                                                 src="<?php echo e(asset($gateway->logo)); ?>"
                                                                                 alt="">
                                                                        </button>

                                                                    </form>
                                                                <?php elseif($gateway->method=="PayTM"): ?>

                                                                    <form action="<?php echo e(route('depositSubmit')); ?>"
                                                                          method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="method"
                                                                               value="<?php echo e($gateway->method); ?>">
                                                                        <input type="hidden" name="deposit_amount"
                                                                               value="<?php echo e($amount); ?>">
                                                                        <button type="submit" class="">
                                                                            <img
                                                                                src="<?php echo e(asset($gateway->logo)); ?>"
                                                                                alt="">
                                                                        </button>

                                                                    </form>

                                                                <?php elseif($gateway->method=="PayStack"): ?>

                                                                    <form action="<?php echo e(route('depositSubmit')); ?>"
                                                                          method="post">
                                                                        <?php echo csrf_field(); ?>

                                                                        <input type="hidden" name="email"
                                                                               value="<?php echo e(@Auth::user()->email); ?>">   required  
                                                                        <input type="hidden" name="orderID"
                                                                               value="<?php echo e(md5(uniqid(rand(), true))); ?>">
                                                                        <input type="hidden" name="amount"
                                                                               value="<?php echo e($amount*100); ?>">
                                                                        <input type="hidden" name="deposit_amount"
                                                                               value="<?php echo e($amount*100); ?>">

                                                                        <input type="hidden" name="currency"
                                                                               value="<?php echo e(Settings('currency_code')); ?>">
                                                                        <input type="hidden" name="metadata"
                                                                               value="<?php echo e(json_encode($array = ['type' => 'Deposit',])); ?>">
                                                                        <input type="hidden" name="reference"
                                                                               value="<?php echo e(Paystack::genTranxRef()); ?>">   required  

                                                                        <input type="hidden" name="method"
                                                                               value="<?php echo e($gateway->method); ?>">

                                                                        <button type="submit" class="">
                                                                            <img
                                                                                src="<?php echo e(asset($gateway->logo)); ?>"
                                                                                alt="">
                                                                        </button>

                                                                    </form>
                                                                <?php elseif($gateway->method=="Bkash"): ?>

                                                                    <form action="<?php echo e(route('depositSubmit')); ?>"
                                                                          method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php if(env('IS_BKASH_LOCALHOST')): ?>
                                                                            <script id="myScript"
                                                                                    src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>
                                                                        <?php else: ?>
                                                                            <script id="myScript"
                                                                                    src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"></script>
                                                                        <?php endif; ?>

                                                                        <input type="hidden" name="method"
                                                                               value="<?php echo e($gateway->method); ?>">
                                                                        <input type="hidden" name="deposit_amount"
                                                                               value="<?php echo e($amount); ?>">
                                                                        <button type="button" class="" id="bKash_button"
                                                                                onclick="BkashPayment()">
                                                                            <img class=""
                                                                                 src="<?php echo e(asset($gateway->logo)); ?>"
                                                                                 alt="">
                                                                        </button>
                                                                        <?php
                                                                            $type ='Deposit';
                                                                        ?>
                                                                        <?php echo $__env->make('bkash::bkash-script',compact('type','amount'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                                    </form>
                                                                <?php elseif($gateway->method=="Bank Payment"): ?>
                                                                    <form class="w-100" action="" method="post">
                                                                        <?php echo csrf_field(); ?>

                                                                        <a href="#" data-toggle="modal"
                                                                           data-target="#bankModel"
                                                                           class="payment_btn_text2 w-100">
                                                                            <?php echo e($gateway->method); ?>

                                                                        </a>
                                                                    </form>
                                                                <?php else: ?>

                                                                    <form action="<?php echo e(route('depositSubmit')); ?>"
                                                                          method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="method"
                                                                               value="<?php echo e($gateway->method); ?>">
                                                                        <input type="hidden" name="deposit_amount"
                                                                               value="<?php echo e($amount); ?>">
                                                                        <button type="submit" class="">
                                                                            <img
                                                                                src="<?php echo e(asset($gateway->logo)); ?>"
                                                                                alt="">
                                                                        </button>

                                                                    </form>

                                                                <?php endif; ?>


                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(count($records)!=0): ?>
        <div class="main_content_iner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="purchase_history_wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section__title3 mb_40">
                                        <h3 class="mb-0"><?php echo e(__('payment.Deposit history')); ?></h3>
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
                                                <th scope="col"><?php echo e(__('common.Date')); ?></th>
                                                <th scope="col"><?php echo e(__('payment.Amount')); ?></th>
                                                <th scope="col"><?php echo e(__('payment.Method')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(isset($records)): ?>
                                                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(@$key+1); ?></td>
                                                        <td><?php echo e(showDate($record->created_at)); ?></td>
                                                        <td><?php echo e(@$record->amount); ?>   </td>
                                                        <td><?php echo e(@$record->method); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                        <div class="pt-3">
                                            <?php echo e($records->links()); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="modal fade " id="bankModel"
         tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg"
             role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLabel">Bank
                        Payment </h5>
                </div>
                <form name="bank_payment"
                      enctype="multipart/form-data"
                      action="<?php echo e(route('depositSubmit')); ?> "
                      class="single_account-form"
                      method="POST">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <input type="hidden"
                               name="method"
                               value="Bank Payment">
                        <div class="row">
                            <div
                                class="col-xl-6 col-md-6">
                                <label for="name"
                                       class="mb-2"><?php echo app('translator')->get('setting.Bank Name'); ?>
                                    <span>*</span></label>
                                <input type="text"
                                       required
                                       class="primary_input4 mb_20"
                                       placeholder="Bank Name"
                                       name="bank_name"
                                       value="<?php echo e(@old('bank_name')); ?>">
                                <span
                                    class="invalid-feedback"
                                    role="alert"
                                    id="bank_name"></span>
                            </div>
                            <div
                                class="col-xl-6 col-md-6">
                                <label for="name"
                                       class="mb-2"><?php echo app('translator')->get('setting.Branch Name'); ?>
                                    <span>*</span></label>
                                <input type="text"
                                       required
                                       name="branch_name"
                                       class="primary_input4 mb_20"
                                       placeholder="Name of account owner"
                                       value="<?php echo e(@old('branch_name')); ?>">
                                <span
                                    class="invalid-feedback"
                                    role="alert"
                                    id="owner_name"></span>
                            </div>
                        </div>
                        <div class="row mb-20">

                            <div
                                class="col-xl-6 col-md-6">
                                <label for="name"
                                       class="mb-2"><?php echo app('translator')->get('setting.Account Number'); ?>
                                    <span>*</span></label>
                                <input type="text"
                                       required
                                       class="primary_input4 mb_20"
                                       placeholder="Account number"
                                       name="account_number"
                                       value="<?php echo e(@old('account_number')); ?>">
                                <span
                                    class="invalid-feedback"
                                    role="alert"
                                    id="account_number"></span>
                            </div>
                            <div
                                class="col-xl-6 col-md-6">
                                <label for="name"
                                       class="mb-2"><?php echo app('translator')->get('setting.Account Holder'); ?>
                                    <span>*</span></label>
                                <input type="text"
                                       required
                                       name="account_holder"
                                       class="primary_input4 mb_20"
                                       placeholder="Account Holder"
                                       value="<?php echo e(@old('account_holder')); ?>">
                                <span
                                    class="invalid-feedback"
                                    role="alert"
                                    id="account_holder"></span>
                            </div>
                            <input type="hidden"
                                   name="deposit_amount"
                                   value="<?php echo e($amount); ?>">


                        </div>

                        <div class="row  mb-20">


                            <div
                                class="col-xl-6 col-md-12">
                                <label for="name"
                                       class="mb-2"><?php echo app('translator')->get('setting.Account Type'); ?>
                                    <span>*</span></label>
                                <select class="theme_select wide update-select-arrow" name="type" required
                                        id="type"
                                        style="margin-top: -10px;">
                                    <option
                                        data-display="<?php echo e(__('common.Select')); ?>  <?php echo e(__('setting.Account Type')); ?>"
                                        value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('setting.Account Type')); ?></option>
                                    <option
                                        value="Current Account" <?php echo e((getPaymentEnv('ACCOUNT_TYPE')? getPaymentEnv('ACCOUNT_TYPE') : '')=='Current Account'?'selected':''); ?>>
                                        Current Account
                                    </option>

                                    <option
                                        value="Savings Account" <?php echo e((getPaymentEnv('ACCOUNT_TYPE')? getPaymentEnv('ACCOUNT_TYPE') : '')=='Savings Account'?'selected':''); ?>>
                                        Savings Account
                                    </option>
                                    <option
                                        value="Salary Account" <?php echo e((getPaymentEnv('ACCOUNT_TYPE')? getPaymentEnv('ACCOUNT_TYPE') : '')=='Salary Account'?'selected':''); ?>>
                                        Salary Account
                                    </option>
                                    <option
                                        value="Fixed Deposit" <?php echo e((getPaymentEnv('ACCOUNT_TYPE')? getPaymentEnv('ACCOUNT_TYPE') : '')=='Fixed Deposit'?'selected':''); ?>>
                                        Fixed Deposit
                                    </option>

                                </select>
                            </div>
                            <div
                                class="col-xl-6 col-md-12">
                                <label for="name"
                                       class="mb-2">Cheque
                                    Slip
                                    <span>*</span></label>
                                <input type="file"
                                       required
                                       name="image"
                                       class="primary_input4 mb_20">
                                <span
                                    class="invalid-feedback"
                                    role="alert"
                                    id="amount_validation"></span>
                            </div>
                        </div>

                        <fieldset class="mt-3">
                            <legend>Bank Account Info
                            </legend>
                            <table
                                class="table table-bordered">

                                <tr>
                                    <td><?php echo app('translator')->get('setting.Bank Name'); ?></td>
                                    <td><?php echo e(getPaymentEnv('BANK_NAME')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('setting.Branch Name'); ?></td>
                                    <td><?php echo e(getPaymentEnv('BRANCH_NAME')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('setting.Account Type'); ?></td>
                                    <td><?php echo e(getPaymentEnv('ACCOUNT_TYPE')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('setting.Account Number'); ?></td>
                                    <td><?php echo e(getPaymentEnv('ACCOUNT_NUMBER')); ?></td>
                                </tr>

                                <tr>
                                    <td><?php echo app('translator')->get('setting.Account Holder'); ?></td>
                                    <td><?php echo e(getPaymentEnv('ACCOUNT_HOLDER')); ?></td>
                                </tr>
                            </table>
                        </fieldset>
                    </div>
                    <div
                        class="modal-footer d-flex justify-content-between">
                        <button type="button"
                                class=" theme_line_btn "
                                data-dismiss="modal"><?php echo app('translator')->get('common.Cancel'); ?></button>
                        <button class="  theme_btn"
                                type="submit"><?php echo app('translator')->get('payment.Payment'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/deposit-page-section.blade.php ENDPATH**/ ?>