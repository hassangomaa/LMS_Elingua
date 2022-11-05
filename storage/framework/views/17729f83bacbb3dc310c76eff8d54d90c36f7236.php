<!-- FOOTER::START  -->
<?php if (isset($component)) { $__componentOriginal37ea9f6a2f553b40f2f014d8d4731ffdddf89467 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PopupContent::class, []); ?>
<?php $component->withName('popup-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37ea9f6a2f553b40f2f014d8d4731ffdddf89467)): ?>
<?php $component = $__componentOriginal37ea9f6a2f553b40f2f014d8d4731ffdddf89467; ?>
<?php unset($__componentOriginal37ea9f6a2f553b40f2f014d8d4731ffdddf89467); ?>
<?php endif; ?>
<footer class="<?php echo e(Settings('footer_show')==0?'d-none d-sm-none d-md-block d-lg-block d-xl-block':''); ?>">
    <?php if(@$homeContent->show_subscribe_section==1): ?>
        <?php if (isset($component)) { $__componentOriginalad88a9851bf0461a2bf875b148005ecbb16bdc19 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FooterNewsLetter::class, []); ?>
<?php $component->withName('footer-news-letter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad88a9851bf0461a2bf875b148005ecbb16bdc19)): ?>
<?php $component = $__componentOriginalad88a9851bf0461a2bf875b148005ecbb16bdc19; ?>
<?php unset($__componentOriginalad88a9851bf0461a2bf875b148005ecbb16bdc19); ?>
<?php endif; ?>
    <?php endif; ?>
    <div class="copyright_area">
        <div class="container">
            <div class="row">


                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="<?php echo e(getCourseImage(Settings('logo2'))); ?>" alt=""
                                     style="width: 108px">
                            </a>
                        </div>
                        <p><?php echo e(function_exists('footerSettings')?footerSettings('footer_about_description'):''); ?></p>
                        <div class="copyright_text">
                            <p><?php echo function_exists('footerSettings')?footerSettings('footer_copy_right'):''; ?></p>
                        </div>

                        <style>


                        </style>
                        <div class="">
                            <ul class="pt-3 ">
                                <ul class="social-network social-circle col-lg-12 ">
                                    <?php if (isset($component)) { $__componentOriginal26713553f82cefeab9a52e076638705322f16265 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FooterSocialLinks::class, []); ?>
<?php $component->withName('footer-social-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26713553f82cefeab9a52e076638705322f16265)): ?>
<?php $component = $__componentOriginal26713553f82cefeab9a52e076638705322f16265; ?>
<?php unset($__componentOriginal26713553f82cefeab9a52e076638705322f16265); ?>
<?php endif; ?>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-6">

                    <?php if (isset($component)) { $__componentOriginal4ea579f24b442f4c924b3cf35249ff3cd8d5a94c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FooterSectionWidgets::class, []); ?>
<?php $component->withName('footer-section-widgets'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ea579f24b442f4c924b3cf35249ff3cd8d5a94c)): ?>
<?php $component = $__componentOriginal4ea579f24b442f4c924b3cf35249ff3cd8d5a94c; ?>
<?php unset($__componentOriginal4ea579f24b442f4c924b3cf35249ff3cd8d5a94c); ?>
<?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</footer>
 <!-- FOOTER::END  -->

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Quick Link</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">FAQs & Help</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA
                </p>
                <p class="mb-2">
                    <i class="fa fa-phone-alt me-3"></i>+012 345 67890
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope me-3"></i>info@example.com
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Gallery</h4>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="public/img/course-1.jpg" alt="" />
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="public/img/course-2.jpg" alt="" />
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="public/img/course-3.jpg" alt="" />
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="public/img/course-2.jpg" alt="" />
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="public/img/course-3.jpg" alt="" />
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="public/img/course-1.jpg" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Newsletter</h4>
                <p>
                    Dolor amet sit justo amet elitr clita ipsum elitr est.
                </p>
                <div class="position-relative mx-auto" style="max-width: 400px">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email" />
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
                        SignUp
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy;
                    <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By
                    <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br /><br /> Distributed By
                    <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
<!-- shoping_cart::start  -->
<div class="shoping_wrapper">
    <div class="dark_overlay"></div>
    <div class="shoping_cart">
        <div class="shoping_cart_inner">
            <div class="cart_header d-flex justify-content-between">
                <h4><?php echo e(__('frontend.Shopping Cart')); ?></h4>
                <div class="chart_close">
                    <i class="ti-close"></i>
                </div>
            </div>
            <div id="cartView">
                <div class="single_cart">
                    Loading...
                </div>
            </div>


        </div>
        <div class="view_checkout_btn d-flex justify-content-end gap_10 flex-wrap" style="display: none!important;">
            <a href="<?php echo e(url('my-cart')); ?>"
               class="theme_btn small_btn3 flex-fill text-center"><?php echo e(__('frontend.View cart')); ?></a>
            <a href="<?php echo e(route('myCart',['checkout'=>true])); ?>"
               class="theme_btn small_btn3 flex-fill text-center"><?php echo e(__('frontend.Checkout')); ?></a>
        </div>
    </div>
</div>
<!-- shoping_cart::end  -->

<!-- UP_ICON  -->
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="fa fa-angle-up"></i>
    </a>
</div>

<input type="hidden" name="item_list" class="item_list" value="<?php echo e(url('getItemList')); ?>">
<input type="hidden" name="enroll_cart" class="enroll_cart" value="<?php echo e(url('enrollOrCart')); ?>">
<input type="hidden" name="csrf_token" class="csrf_token" value="<?php echo e(csrf_token()); ?>">
<!--/ UP_ICON -->

<?php if (isset($component)) { $__componentOriginal905399d9d9d9c10667580aebb918b5b86c134818 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FooterCookie::class, []); ?>
<?php $component->withName('footer-cookie'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal905399d9d9d9c10667580aebb918b5b86c134818)): ?>
<?php $component = $__componentOriginal905399d9d9d9c10667580aebb918b5b86c134818; ?>
<?php unset($__componentOriginal905399d9d9d9c10667580aebb918b5b86c134818); ?>
<?php endif; ?>

<!--ALL JS SCRIPTS -->


<script src="<?php echo e(asset('public/frontend/infixlmstheme/js/app.js')); ?>"></script>

<script src="<?php echo e(asset('public/backend/js/summernote-bs4.min.js')); ?>"></script>


<?php echo Toastr::message(); ?>


<?php if($errors->any()): ?>
    <script>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        toastr.error('<?php echo e($error); ?>', 'Error', {
            closeButton: true,
            progressBar: true,
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php endif; ?>

<?php if(isModuleActive('Appointment')): ?>
    <script src="<?php echo e(asset('Modules\Appointment\Resources\assets\frontend\5\bootstrap.min.js')); ?><?php echo e(assetVersion()); ?>"></script>
    <script
        src="<?php echo e(asset('Modules\Appointment\Resources\assets\frontend\plugins\jquery-ui\jquery-ui.min.js')); ?><?php echo e(assetVersion()); ?>"></script>
    <script
        src="<?php echo e(asset('Modules\Appointment\Resources\assets\frontend\plugins\jquery-ui\jquery.ui.touch-punch.min.js')); ?><?php echo e(assetVersion()); ?>">
    </script>
    <script src="<?php echo e(asset('Modules\Appointment\Resources\assets\frontend\plugins\price-range\ion.rangeslider.min.js')); ?><?php echo e(assetVersion()); ?>">
    </script>
    <script src="<?php echo e(asset('Modules\Appointment\Resources\assets\frontend\js\main.js')); ?><?php echo e(assetVersion()); ?>"></script>
<?php endif; ?>

<?php echo $__env->yieldContent('js'); ?>

<script>
    setTimeout(function () {
        $('.preloader').fadeOut('hide', function () {
            // $(this).remove();

        });
    }, 0);


    $('#cartView').on('click', '.remove_cart', function () {
        let id = $(this).data('id');
        let total = $('.notify_count').html();

        $(this).closest(".single_cart").hide();
        let url = "<?php echo e(url(('/home/removeItemAjax'))); ?>" + '/' + id;

        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {

                $('.notify_count').html(total - 1);
            }
        });
    });

    $(function () {
        $('.lazy').Lazy();
    });


</script>
<?php if(auth()->guard()->check()): ?>
    <?php if(Settings('device_limit_time')!=0): ?>
        <?php if(\Illuminate\Support\Facades\Auth::user()->role_id==3): ?>
            <script>
                function update() {
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo e(url('/')); ?>" + "/update-activity",
                        success: function (data) {


                        }
                    });
                }

                var intervel = "<?php echo e(Settings('device_limit_time')); ?>"
                var time = (intervel * 60) - 20;

                setInterval(function () {
                    update();
                }, time * 1000);

            </script>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<script>
    $(document).on('click', '.show_notify', function (e) {
        e.preventDefault();

        console.log('notify');
    });
    if ($('#main-nav-for-chat').length) {
    } else {
        $('#main-content').append('<div id="main-nav-for-chat" style="visibility: hidden;"></div>');
    }

    if ($('#admin-visitor-area').length) {
    } else {
        $('#main-content').append('<div id="admin-visitor-area" style="visibility: hidden;"></div>');
    }
</script>



<?php if(str_contains(request()->url(), 'chat')): ?>
    <script src="<?php echo e(asset('public/backend/js/jquery-ui.js')); ?><?php echo e(assetVersion()); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/select2.min.js')); ?><?php echo e(assetVersion()); ?>"></script>
    <script src="<?php echo e(asset('public/js/app.js')); ?><?php echo e(assetVersion()); ?>"></script>
    <script src="<?php echo e(asset('public/chat/js/custom.js')); ?><?php echo e(assetVersion()); ?>"></script>
<?php endif; ?>

<?php if(auth()->check() && auth()->user()->role_id == 3 && !str_contains(request()->url(), 'chat')): ?>
    <script src="<?php echo e(asset('public/js/app.js')); ?><?php echo e(assetVersion()); ?>"></script>
<?php endif; ?>


<?php if(isModuleActive("WhatsappSupport")): ?>
    <script src="<?php echo e(asset('public/whatsapp-support/scripts.js')); ?><?php echo e(assetVersion()); ?>"></script>

    <?php echo $__env->make('whatsappsupport::partials._popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="public/lib/wow/wow.min.js"></script>
<script src="public/lib/easing/easing.min.js"></script>
<script src="public/lib/waypoints/waypoints.min.js"></script>
<script src="public/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="public/js/main.js"></script>


<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/partials/_footer.blade.php ENDPATH**/ ?>