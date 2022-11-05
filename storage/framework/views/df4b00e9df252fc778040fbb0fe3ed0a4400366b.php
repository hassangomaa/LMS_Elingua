<!doctype html>
<html dir="<?php echo e(isRtl()?'rtl':''); ?>" class="<?php echo e(isRtl()?'rtl':''); ?>" lang="en" itemscope
      itemtype="<?php echo e(url('/')); ?>">

<head>
    <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>

    <meta property="og:url" content="<?php echo e(url()->current()); ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo e(Settings('site_title')); ?>"/>
    <meta property="og:description" content="<?php echo e(Settings('footer_about_description')); ?>"/>
    <meta property="og:image" content=" <?php echo $__env->yieldContent('og_image'); ?>"/>

    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
<?php if(!empty(Settings('google_analytics') )): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(Settings('google_analytics')); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', '<?php echo e(Settings('google_analytics')); ?>');
        </script>
<?php endif; ?>
<!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="<?php echo e(Settings('site_name')); ?>">

    <meta itemprop="image" content="<?php echo e(asset(Settings('logo') )); ?>">
    <?php if(routeIs('frontendHomePage')): ?>
        <meta itemprop="description" content="<?php echo e(Settings('meta_description')); ?>">
        <meta property="og:description" content="<?php echo e(Settings('meta_description')); ?>">
        <meta itemprop="keywords" content="<?php echo e(Settings('meta_keywords')); ?>">

    <?php elseif(routeIs('courseDetailsView')): ?>
        <meta itemprop="description" content="<?php echo e($course->meta_description); ?>">
        <meta property="og:description" content="<?php echo e($course->meta_description); ?>">
        <meta itemprop="keywords" content="<?php echo e($course->meta_keywords); ?>">
    <?php elseif(routeIs('quizDetailsView')): ?>
        <meta itemprop="description" content="<?php echo e($course->meta_description); ?>">
        <meta property="og:description" content="<?php echo e($course->meta_description); ?>">
        <meta itemprop="keywords" content="<?php echo e($course->meta_keywords); ?>">
    <?php endif; ?>
    <meta itemprop="author" content="<?php echo e(Settings('site_name')); ?>">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e(Settings('site_title')); ?>">

    <meta property="og:image" content="<?php echo e(asset(Settings('logo') )); ?>"/>
    <meta property="og:image:type" content="image/png"/>
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset(Settings('favicon') )); ?>">
    <!-- Place favicon.ico in the root directory -->


    <?php if (isset($component)) { $__componentOriginala67d418518b630fe5034b23b29df155692a4e945 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FrontendDynamicStyleColor::class, []); ?>
<?php $component->withName('frontend-dynamic-style-color'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala67d418518b630fe5034b23b29df155692a4e945)): ?>
<?php $component = $__componentOriginala67d418518b630fe5034b23b29df155692a4e945; ?>
<?php unset($__componentOriginala67d418518b630fe5034b23b29df155692a4e945); ?>
<?php endif; ?>


    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/css/fontawesome.css<?php echo e(assetVersion()); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/themify-icons.css')); ?><?php echo e(assetVersion()); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/css/flaticon.css<?php echo e(assetVersion()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/css/nice-select.css<?php echo e(assetVersion()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/css/notification.css<?php echo e(assetVersion()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/infixlmstheme/css/mega_menu.css')); ?>">

    <link href="<?php echo e(asset('public/backend/css/summernote-bs4.min.css')); ?><?php echo e(assetVersion()); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/preloader.css')); ?><?php echo e(assetVersion()); ?>"/>

    <?php if(str_contains(request()->url(), 'chat')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/jquery-ui.css')); ?><?php echo e(assetVersion()); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('public/backend/vendors/select2/select2.css')); ?><?php echo e(assetVersion()); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('public/chat/css/style-student.css')); ?><?php echo e(assetVersion()); ?>">
    <?php endif; ?>

    <?php if(auth()->check() && auth()->user()->role_id == 3 && !str_contains(request()->url(), 'chat')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/chat/css/notification.css')); ?><?php echo e(assetVersion()); ?>">
    <?php endif; ?>

    <?php if(isModuleActive("WhatsappSupport")): ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/whatsapp-support/style.css')); ?><?php echo e(assetVersion()); ?>">
    <?php endif; ?>
    <script>
        window.Laravel = {
            "baseUrl": '<?php echo e(url('/')); ?>' + '/',
            "current_path_without_domain": '<?php echo e(request()->path()); ?>',
            "csrfToken": '<?php echo e(csrf_token()); ?>',
        }
    </script>

    <script>
        window._locale = '<?php echo e(app()->getLocale()); ?>';
        window._translations = <?php echo json_encode(cache('translations'), JSON_INVALID_UTF8_IGNORE); ?>

    </script>

    <?php if(auth()->check() && auth()->user()->role_id == 3): ?>
        <style>
            .admin-visitor-area {
                margin: 0 30px 30px 30px !important;
            }

            .dashboard_main_wrapper .main_content_iner.main_content_padding {
                padding-top: 50px !important;
            }

            .primary_input {
                height: 50px;
                border-radius: 0px;
                border: unset;
                font-family: "Jost", sans-serif;
                font-size: 14px;
                font-weight: 400;
                color: unset;
                padding: unset;
                width: 100%;
                <?php if($errors->any()): ?>
                      margin-bottom: 5px;
                <?php else: ?>
     margin-bottom: 30px;
            <?php endif; ?>






            }

            .primary_input_field {
                border: 1px solid #ECEEF4;
                font-size: 14px;
                color: #415094;
                padding-left: 20px;
                height: 46px;
                border-radius: 30px;
                width: 100%;
                padding-right: 15px;
            }

            .primary_input_label {
                font-size: 12px;
                text-transform: uppercase;
                color: #828BB2;
                display: block;
                margin-bottom: 6px;
                font-weight: 400;
            }

            .chat_badge {
                color: #ffffff;
                border-radius: 20px;
                font-size: 10px;
                position: relative;
                left: -20px;
                top: -12px;
                padding: 0px 4px !important;
                max-width: 18px;
                max-height: 18px;
                box-shadow: none;
                background: #ed353b;
            }

            .chat-icon-size {
                font-size: 1.35em;
                color: #687083;
            }
        </style>
    <?php endif; ?>


    <?php if(!empty(Settings('facebook_pixel'))): ?>
    <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', <?php echo e(Settings('facebook_pixel')); ?>);
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id=<?php echo e(Settings('facebook_pixel')); ?>/&ev=PageView&noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    <?php endif; ?>


    <input type="hidden" id="baseUrl" value="<?php echo e(url('/')); ?>">
    <input type="hidden" name="chat_settings" id="chat_settings" value="<?php echo e(env('BROADCAST_DRIVER')); ?>">
    <input type="hidden" name="slider_transition_time" id="slider_transition_time" value="<?php echo e(Settings('slider_transition_time')?Settings('slider_transition_time'):5); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/css/app.css<?php echo e(assetVersion()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/css/frontend_style.css<?php echo e(assetVersion()); ?>">
    <script src="<?php echo e(asset('public/js/common.js')); ?><?php echo e(assetVersion()); ?>"></script>
    <?php echo $__env->yieldContent('css'); ?>

    <!-- Favicon -->
    <link href="public/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="public/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="public/css/style.css" rel="stylesheet" />

    <!-- Edu-wise Stylesheet -->
    <link href="public/css/eduwise.css" rel="stylesheet" />

</head>

<body>

<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/partials/_header.blade.php ENDPATH**/ ?>