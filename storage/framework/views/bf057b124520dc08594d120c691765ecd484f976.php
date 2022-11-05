<footer class="footer-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">

                <p class="p-3 mt-5"><?php echo Settings('copyright_text'); ?></p>
            </div>
        </div>
    </div>
</footer>
 </div>


<?php if(isModuleActive("WhatsappSupport")): ?>
    <?php echo $__env->make('whatsappsupport::partials._popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('backend.partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php if(env('APP_SYNC')): ?>
    <a target="_blank" href="https://1.envato.market/LP0k1Y" class="float_button"> <i class="ti-shopping-cart-full"></i>
        <h3>Purchase InfixLMS</h3>
    </a>
<?php endif; ?>
<?php echo \Livewire\Livewire::scripts(); ?>


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
<?php echo $__env->yieldPushContent('js'); ?>

</body>
</html>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/backend/partials/footer.blade.php ENDPATH**/ ?>