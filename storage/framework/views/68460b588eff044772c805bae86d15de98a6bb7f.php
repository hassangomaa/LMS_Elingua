<?php $__env->startSection('title'); ?><?php echo e(Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'); ?> |  <?php echo e($course->title); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_image'); ?><?php echo e(asset($course->image)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        .course__details .video_screen {
            background-image: url('<?php echo e(getCourseImage(@$course->image)); ?>');
        }

        iframe {
            position: relative !important;
        }
    </style>
    <link href="<?php echo e(asset('public/frontend/infixlmstheme/css/videopopup.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/frontend/infixlmstheme/css/video.popup.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/frontend/infixlmstheme/css/class_details.css')); ?>" rel="stylesheet"/>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('mainContent'); ?>







    <?php if (isset($component)) { $__componentOriginalaad4265c79f637f2fa1a822286eea69aab6e1506 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CourseDeatilsPageSection::class, ['course' => $course,'request' => $request,'isEnrolled' => $isEnrolled]); ?>
<?php $component->withName('course-deatils-page-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaad4265c79f637f2fa1a822286eea69aab6e1506)): ?>
<?php $component = $__componentOriginalaad4265c79f637f2fa1a822286eea69aab6e1506; ?>
<?php unset($__componentOriginalaad4265c79f637f2fa1a822286eea69aab6e1506); ?>
<?php endif; ?>


    <?php if($course->host=='VdoCipher'): ?>

        <?php echo $__env->make(theme('partials._player_modal'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/class_details.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/videopopup.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/infixlmstheme/js/video.popup.js')); ?>"></script>

    <script>


        $("#formSubmitBtn").on("click", function (e) {
            e.preventDefault();

            var form = $('#deleteCommentForm');
            var url = form.attr('action');
            var element = form.data('element');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function (data) {

                }
            });
            var el = '#' + element;
            $(el).hide('slow');
            $('#deleteComment').modal('hide');

        });
    </script>

    <script>
        function deleteCommnet(item, element) {
            let form = $('#deleteCommentForm')
            form.attr('action', item);
            form.attr('data-element', element);
        }
    </script>


    <script>

        var SITEURL = "<?php echo e(courseDetailsUrl($course->id,$course->type,$course->slug)); ?>";
        var page = 1;
        load_more(page);
        $(window).scroll(function () { //detect page scroll
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 400) {
                page++;
                load_more(page);
            }


        });

        function load_more(page) {
            $.ajax({
                url: SITEURL + "?page=" + page,
                type: "get",
                datatype: "html",
                data: {'type': 'comment'},
                beforeSend: function () {
                    $('.ajax-loading').show();
                }
            })
                .done(function (data) {
                    if (data.length == 0) {

                        //notify user if nothing to load
                        $('.ajax-loading').html("");
                        return;
                    }
                    $('.ajax-loading').hide(); //hide loading animation once data is received
                    $("#conversition_box").append(data); //append data into #results element


                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('No response from server');
                });

        }


        load_more_review(page);


        $(window).scroll(function () { //detect page scroll
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 400) {
                page++;
                load_more_review(page);
            }


        });

        function load_more_review(page) {
            $.ajax({
                url: SITEURL + "?page=" + page,
                type: "get",
                datatype: "html",
                data: {'type': 'review'},
                beforeSend: function () {
                    $('.ajax-loading').show();
                }
            })
                .done(function (data) {
                    if (data.length == 0) {

                        //notify user if nothing to load
                        $('.ajax-loading').html("");
                        return;
                    }
                    $('.ajax-loading').hide(); //hide loading animation once data is received
                    $("#customers_reviews").append(data); //append data into #results element


                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('No response from server');
                });

        }
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make(theme('layouts.master'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/pages/courseDetails.blade.php ENDPATH**/ ?>