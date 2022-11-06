<div>
    <div class="checkout_wrapper payment_area" id="mainFormData">

        <div class="billing_details_wrapper">
            <div class="biling_address gray-bg">
                <div class="biling-header d-flex justify-content-between align-items-center">
                    <h4><?php echo e(__('frontendmanage.Billing Address')); ?></h4>
                    <a href="<?php echo e(route('CheckOut')); ?>?type=edit"><?php echo e(__('common.Edit')); ?></a>
                </div>
                <div class="biling_body_content">
                    <p><?php echo e(@$checkout->billing->first_name); ?> <?php echo e(@$checkout->billing->last_name); ?></p>
                    <p><?php echo e(@$checkout->billing->address); ?></p>
                    <p><?php echo e(@$checkout->billing->stateDetails->name); ?>,<?php echo e(@$checkout->billing->cityDetails->name); ?> -
                        <?php echo e(@$checkout->billing->zip_code); ?> </p>
                    <p> <?php echo e(@$checkout->billing->countryDetails->name); ?> </p>
                </div>
            </div>
            <div class="select_payment_method">
                <div class="input_box_tittle">
                    <h4><?php echo app('translator')->get('frontendmanage.Payment Method'); ?></h4>

                </div>

                <div class="privaci_polecy_area section-padding checkout_area ">
                    <div class="">
                        <div class="row">
                            <div class="col-12">
                                <div class="payment_method_wrapper">
                                    <?php if(isset($methods)): ?>
                                        <?php $__currentLoopData = $methods->where('method','!=','Bank Payment')->where('method','!=','Offline Payment'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                if (!paymentGateWayCredentialsEmptyCheck($gateway->method)){
                                                continue;
                                                }
                                            ?>
                                            <div class="payment_method_single">
                                                <div class="deposite_payment_wrapper customer_payment_wrapper">
                                                    <?php if($gateway->method=="Stripe"): ?>
                                                        <form action="<?php echo e(route('paymentSubmit')); ?>" method="post">
                                                            <input type="hidden" name="tracking_id"
                                                                   value="<?php echo e($checkout->tracking); ?>">
                                                            <input type="hidden" name="id" value="<?php echo e($checkout->id); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="payment_method"
                                                                   value="<?php echo e($gateway->method); ?>">
                                                            <!-- single_deposite_item  -->
                                                            <button type="submit" class="Payment_btn">
                                                                <img class=" w-100 " style="padding: 12px;
                                        margin-top: -9px;"
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

                                                            <input hidden
                                                                   value="<?php echo e(convertCurrency(Settings('currency_code') ??'BDT', 'USD', $checkout->purchase_price)); ?>"
                                                                   readonly="readonly" type="text" id="amount"
                                                                   name="amount">


                                                        </form>
                                                    <?php elseif($gateway->method=="Wallet"): ?>

                                                        <form action="<?php echo e(route('paymentSubmit')); ?>" method="post">

                                                            <?php echo csrf_field(); ?>

                                                            <div class="bank_check">

                                                                <a href="#" data-toggle="modal"
                                                                   data-target="#MakePaymentFromCredit"
                                                                   class=" payment_btn_text">Wallet</a>

                                                            </div>
                                                        </form>

                                                        <div class="modal fade " id="MakePaymentFromCredit"
                                                             tabindex="-1"
                                                             role="dialog" aria-labelledby="exampleModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel"><?php echo e(__('student.My Account')); ?></h5>
                                                                    </div>
                                                                    <form action="<?php echo e(route('paymentSubmit')); ?>"
                                                                          id="infix_payment_form1" method="POST"
                                                                          name="payment_main_balance">
                                                                        <?php echo csrf_field(); ?>

                                                                        <input type="hidden" name="payment_method"
                                                                               value="<?php echo e($gateway->method); ?>">
                                                                        <input name="payment_method" value="Wallet"
                                                                               id="balanceInput"
                                                                               style="display: <?php echo e(Auth::user()->balance >= $checkout->purchase_price?'':'none'); ?>"
                                                                               class="method"
                                                                               type="hidden">
                                                                        <input type="hidden" name="tracking_id"
                                                                               value="<?php echo e($checkout->tracking); ?>">
                                                                        <input type="hidden" name="id"
                                                                               value="<?php echo e($checkout->id); ?>">


                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-xl-6 col-md-6">
                                                                                    <label for="name"
                                                                                           class="mb-2"><?php echo e(__('frontend.Balance')); ?></label>
                                                                                    <input type="text"
                                                                                           class="primary_input3"
                                                                                           value="<?php if(Auth::user()->balance==0): ?><?php echo e(Settings('currency_symbol') ??'৳'); ?>0 <?php else: ?><?php echo e(getPriceFormat(Auth::user()->balance)); ?>

                                                                                           <?php endif; ?>"
                                                                                           readonly>
                                                                                </div>
                                                                                <div class="col-xl-6 col-md-6">
                                                                                    <label for="name"
                                                                                           class="mb-2"><?php echo app('translator')->get('common.Purchase Price'); ?></label>
                                                                                    <input type="text" name="amount"
                                                                                           class="primary_input3"
                                                                                           value="<?php echo e(getPriceFormat($checkout->purchase_price)); ?>"
                                                                                           readonly>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                        <div
                                                                            class="modal-footer payment_btn d-flex justify-content-between">
                                                                            <button type="button" class="theme_line_btn"
                                                                                    data-dismiss="modal"><?php echo app('translator')->get('common.Cancel'); ?></button>

                                                                            <?php if(Auth::user()->balance >= $checkout->purchase_price): ?>
                                                                                <button class=" theme_btn"
                                                                                        type="submit">
                                                                                    <?php echo app('translator')->get('common.Pay'); ?>
                                                                                </button>
                                                                            <?php else: ?>
                                                                                <a class="theme_btn"
                                                                                   href="<?php echo e(route('deposit')); ?>"><?php echo e(__('common.Deposit')); ?></a>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php elseif($gateway->method=="MercadoPago"): ?>


                                                        <div class="">

                                                            <a href="#" data-toggle="modal"
                                                               data-target="#MakePaymentFromCreditMercadoPago"
                                                               class=" Payment_btn">
                                                                <img class=" w-100" style="    padding: 0;
                                                                    margin-top: -2px;"
                                                                     src="<?php echo e(asset($gateway->logo)); ?>"
                                                                     alt="">
                                                            </a>
                                                        </div>


                                                        <div class="modal fade " id="MakePaymentFromCreditMercadoPago"
                                                             tabindex="-1"
                                                             role="dialog" aria-labelledby="exampleModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="">MercadoPago</h5>
                                                                    </div>


                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <?php
                                                                                $total_amount =$checkout->purchase_price;
                                                                                $route =route('paymentSubmit');
                                                                            ?>
                                                                            <div class="col-md-12">
                                                                                <?php echo $__env->make('mercadopago::partials._checkout',compact('total_amount','checkout'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                                                <form action="<?php echo e(route('paymentSubmit')); ?>"
                                                                      method="POST">
                                                                    <input type="hidden" name="payment_method"
                                                                           value="<?php echo e($gateway->method); ?>">
                                                                    <button type="submit" class="Payment_btn">
                                                                        <img class=" w-100" style="padding: 0;
                                        margin-top: -2px;"
                                                                             src="<?php echo e(asset($gateway->logo)); ?>"
                                                                             alt="">
                                                                    </button>
                                                                    <input type="hidden" name="tracking_id"
                                                                           value="<?php echo e($checkout->tracking); ?>">
                                                                    <input type="hidden" name="id"
                                                                           value="<?php echo e($checkout->id); ?>">
                                                                    <?php echo csrf_field(); ?>
                                                                    <script
                                                                        src="https://checkout.razorpay.com/v1/checkout.js"
                                                                        data-key="<?php echo e(getPaymentEnv('RAZOR_KEY')); ?>"
                                                                        data-amount="<?php echo e(convertCurrency(Settings('currency_code') ??'BDT', 'INR', $checkout->purchase_price)*100); ?>"
                                                                        data-name="<?php echo e(str_replace('_', ' ',Settings('site_title') )); ?>"
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

                                                        <form action="<?php echo e(route('paymentSubmit')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="payment_method"
                                                                   value="<?php echo e($gateway->method); ?>">
                                                            <input type="hidden" name="tracking_id"
                                                                   value="<?php echo e($checkout->tracking); ?>">
                                                            <input type="hidden" name="id" value="<?php echo e($checkout->id); ?>">
                                                            <button type="submit" class="Payment_btn">
                                                                <img class=" w-100" style="    padding: 0;
                                                                    margin-top: -2px;"
                                                                     src="<?php echo e(asset($gateway->logo)); ?>"
                                                                     alt="">
                                                            </button>

                                                        </form>
                                                    <?php elseif($gateway->method=="PayTM"): ?>

                                                        <form action="<?php echo e(route('paymentSubmit')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="payment_method"
                                                                   value="<?php echo e($gateway->method); ?>">
                                                            <input type="hidden" name="tracking_id"
                                                                   value="<?php echo e($checkout->tracking); ?>">
                                                            <input type="hidden" name="id" value="<?php echo e($checkout->id); ?>">
                                                            <button type="submit" class="Payment_btn">
                                                                <img class=" w-100" style="    padding: 10px;
                                                                         margin-top: -6px;"
                                                                     src="<?php echo e(asset($gateway->logo)); ?>"
                                                                     alt="">
                                                            </button>

                                                        </form>
                                                    <?php elseif($gateway->method=="PayStack"): ?>

                                                        <form action="<?php echo e(route('paymentSubmit')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="email"
                                                                   value="<?php echo e(@Auth::user()->email); ?>">   required  
                                                            <input type="hidden" name="orderID"
                                                                   value="<?php echo e($checkout->tracking); ?>">
                                                            <input type="hidden" name="amount"
                                                                   value="<?php echo e($checkout->purchase_price*100); ?>">   required in kobo  

                                                            <input type="hidden" name="currency"
                                                                   value="<?php echo e(Settings('currency_code')); ?>">
                                                            <input type="hidden" name="metadata"
                                                                   value="<?php echo e(json_encode($array = ['type' => 'Payment',])); ?>">
                                                            <input type="hidden" name="reference"
                                                                   value="<?php echo e(Paystack::genTranxRef()); ?>">   required  

                                                            <input type="hidden" name="payment_method"
                                                                   value="<?php echo e($gateway->method); ?>">
                                                            <input type="hidden" name="tracking_id"
                                                                   value="<?php echo e($checkout->tracking); ?>">
                                                            <input type="hidden" name="id" value="<?php echo e($checkout->id); ?>">
                                                            <button type="submit" class="Payment_btn">
                                                                <img class=" w-100" style="    padding: 10px;
                                        margin-top: -6px;"
                                                                     src="<?php echo e(asset($gateway->logo)); ?>"
                                                                     alt="">
                                                            </button>

                                                        </form>
                                                    <?php elseif($gateway->method=="Bkash"): ?>

                                                        <form action="<?php echo e(route('paymentSubmit')); ?>"
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
                                                                   value="<?php echo e($checkout->purchase_price); ?>">
                                                            <button type="button" class="Payment_btn" id="bKash_button"
                                                                    onclick="BkashPayment()">
                                                                <img class=""
                                                                     src="<?php echo e(asset($gateway->logo)); ?>"
                                                                     alt="">
                                                            </button>
                                                            <?php
                                                                $type ='Payment';
                                                                $amount =$checkout->purchase_price;
                                                            ?>
                                                            <?php echo $__env->make('bkash::bkash-script',compact('type','amount'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        </form>
                                                    <?php else: ?>

                                                        <form action="<?php echo e(route('paymentSubmit')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="payment_method"
                                                                   value="<?php echo e($gateway->method); ?>">
                                                            <input type="hidden" name="tracking_id"
                                                                   value="<?php echo e($checkout->tracking); ?>">
                                                            <input type="hidden" name="id" value="<?php echo e($checkout->id); ?>">
                                                            <button type="submit" class="Payment_btn">
                                                                <img class=" w-100"
                                                                     src="<?php echo e(asset($gateway->logo)); ?>"
                                                                     alt="">
                                                            </button>

                                                        </form>

                                                    <?php endif; ?>

                                                </div>

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="order_wrapper">
            <h3 class="font_22 f_w_700 mb_30"><?php echo e(__('frontend.Your order')); ?></h3>
            <div class="ordered_products">
                <?php $totalSum=0; ?>
                <?php if(isset($carts)): ?>
                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if ($cart->course_id !=0){
                                if ($cart->course->discount_price!=null) {
                                        $price = $cart->course->discount_price;
                                    } else {
                                        $price = $cart->course->price;
                                    }
                                }else{
                                      $price = $cart->bundle->price;
                                }

                                  $totalSum =  $totalSum + @$price;

                        ?>
                        <div class="single_ordered_product">
                            <div class="product_name d-flex align-items-center">
                                <div class="thumb">
                                    <img src="<?php echo e(getCourseImage(@$cart->course->thumbnail)); ?>" alt="">
                                </div>
                                <span><?php echo e(@$cart->course->title); ?></span>
                            </div>
                            <span class="order_prise f_w_500 font_16">
                             <?php echo e(getPriceFormat($price)); ?>

                            </span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="ordered_products_lists">
                <div class="single_lists">
                    <span class=" total_text"><?php echo e(__('frontend.Subtotal')); ?></span>
                    <span><?php echo e(getPriceFormat($checkout->price)); ?></span>
                </div>
                <?php if($checkout->purchase_price > 0): ?>
                    <div class="single_lists">

                        <span class="total_text"><?php echo e(__('payment.Discount Amount')); ?></span>
                        <span><?php echo e($checkout->discount==""?'0':getPriceFormat($checkout->discount)); ?></span>
                    </div>
                    <?php if(hasTax()): ?>
                        <div class="single_lists">
                            <span class="total_text"><?php echo e(__('tax.TAX')); ?>   </span>

                            <span class="totalTax"><?php echo e(getPriceFormat($checkout->tax)); ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="single_lists">
                        <span class="total_text"><?php echo e(__('frontend.Payable Amount')); ?> </span>
                        <span class="totalBalance"><?php echo e(getPriceFormat($checkout->purchase_price)); ?></span>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/payment-page-section.blade.php ENDPATH**/ ?>