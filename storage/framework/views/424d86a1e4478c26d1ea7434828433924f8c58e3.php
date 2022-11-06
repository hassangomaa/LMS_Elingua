<!DOCTYPE html>
<html dir="<?php echo e(isRtl()?'rtl':''); ?>" class="<?php echo e(isRtl()?'rtl':''); ?>">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(getCourseImage(Settings('favicon'))); ?>" type="image/png"/>
    <title>
        <?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?>

    </title>
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <?php echo $__env->make('backend.partials.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('public/js/common.js')); ?>"></script>


    <script>
        window.Laravel = {
            "baseUrl": '<?php echo e(url("/")); ?>' + '/',
            "current_path_without_domain": '<?php echo e(request()->path()); ?>',
            "csrfToken": '<?php echo e(csrf_token()); ?>',
        }
    </script>

    <script>
        window._locale = '<?php echo e(app()->getLocale()); ?>';
        window._translations = <?php echo json_encode(cache('translations'), JSON_INVALID_UTF8_IGNORE); ?>

    </script>


    <script>
        window.jsLang = function(key, replace) {
            let translation = true

            let json_file = $.parseJSON(window._translations[window._locale]['json'])
            translation = json_file[key]
                ? json_file[key]
                : key
            $.each(replace, (value, key) => {
                translation = translation.replace(':' + key, value)
            })
            return translation
        }

    </script>


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

    <script>
        const RTL = "<?php echo e(isRtl()); ?>";
        const LANG = "<?php echo e(app()->getLocale()); ?>";
    </script>

    <?php echo \Livewire\Livewire::styles(); ?>



</head>

<body class="admin">
<?php echo $__env->make('preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<input type="hidden" name="demoMode" id="demoMode" value="<?php echo e(appMode()); ?>">
<input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
<input type="hidden" name="table_name" id="table_name" value="<?php echo $__env->yieldContent('table'); ?>">
<input type="hidden" name="csrf_token" class="csrf_token" value="<?php echo e(csrf_token()); ?>">
<input type="hidden" name="currency_symbol" class="currency_symbol" value="<?php echo e(Settings('currency_symbol')); ?>">
<input type="hidden" name="currency_show" class="currency_show" value="<?php echo e(Settings('currency_show')); ?>">
<input type="hidden" name="chat_settings" id="chat_settings" value="<?php echo e(env('BROADCAST_DRIVER')); ?>">
<div class="main-wrapper" style="min-height: 600px">
    <!-- Sidebar  -->
<?php if(isModuleActive('LmsSaas') && Auth::user()->is_saas_admin==1 && Auth::user()->active_panel=='saas'): ?>
    <?php echo $__env->make('lmssaas::partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(isModuleActive('LmsSaasMD') && Auth::user()->is_saas_admin==1 && Auth::user()->active_panel=='saas'): ?>
    <?php echo $__env->make('lmssaasmd::partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('backend.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<!-- Page Content  -->
    <div id="main-content">


<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/backend/partials/header.blade.php ENDPATH**/ ?>