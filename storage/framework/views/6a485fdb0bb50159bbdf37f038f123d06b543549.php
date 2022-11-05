<?php $__env->startSection('mainContent'); ?>
    <?php
        $LanguageList = getLanguageList();
    ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('frontendmanage.Login Page')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('frontendmanage.Frontend CMS')); ?></a>
                    <a class="active"
                       href="<?php echo e(route('frontend.loginpage.index')); ?>"><?php echo e(__('frontendmanage.Login Page')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex">

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="">
                        <div class="row">

                            <div class="col-lg-12">
                                <!-- tab-content  -->
                                <div class="tab-content " id="myTabContent">
                                    <!-- General -->
                                    <div class="tab-pane fade white_box_30px show active" id="Activation"
                                         role="tabpanel" aria-labelledby="Activation-tab">
                                        <div class="main-title mb-25">

                                            <?php if(permissionCheck('frontend.loginpage.store')): ?>
                                                <form action="<?php echo e(route('frontend.loginpage.store')); ?>" id="form_data_id"
                                                      method="POST"
                                                      enctype="multipart/form-data">
                                                    <?php endif; ?>
                                                    <?php echo csrf_field(); ?>
                                                    <div class="main-title mb-25">
                                                        <h3 class="mb-0"><?php echo e(__('frontendmanage.Login Page')); ?></h3>
                                                    </div>
                                                    <div class="General_system_wrap_area">
                                                        <div class="single_system_wrap">
                                                            <div class="single_system_wrap_inner text-center">
                                                                <div class="logo">
                                                                    <span><?php echo e(__('frontendmanage.Banner Image')); ?></span>
                                                                </div>
                                                                <div class="logo_img">
                                                                    <img class="imagePreview1"
                                                                         src="<?php echo e(asset($page->banner)); ?>"
                                                                         style="width: 200px;max-width: 100%; height: auto;"
                                                                         alt="">

                                                                </div>
                                                                <div class="update_logo_btn">
                                                                    <button class="primary-btn small fix-gr-bg"
                                                                            type="button">
                                                                        <input class="imgInput1"
                                                                               placeholder="Upload Header Logo"
                                                                               type="file" name="banner"
                                                                               id="site_logo">
                                                                        <?php echo e(__('frontendmanage.Banner Image')); ?>

                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="single_system_wrap student-details header-menu">


                                                            <div class="row pt-0">
                                                                <?php if(isModuleActive('FrontendMultiLang')): ?>
                                                                    <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                                                                        role="tablist">
                                                                        <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link  <?php if(auth()->user()->language_code == $language->code): ?> active <?php endif; ?>"
                                                                                   href="#element<?php echo e($language->code); ?>"
                                                                                   role="tab"
                                                                                   data-toggle="tab"><?php echo e($language->native); ?>  </a>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="tab-content">
                                                                <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div role="tabpanel"
                                                                         class="tab-pane fade <?php if(auth()->user()->language_code == $language->code): ?> show active <?php endif; ?>  "
                                                                         id="element<?php echo e($language->code); ?>">
                                                                        <div class="row">
                                                                            <div class="col-xl-12">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for=""><?php echo e(__('frontendmanage.Title')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="InfixLMS"
                                                                                           type="text"
                                                                                           id="site_title"
                                                                                           name="title[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('title',$language->code)); ?>"
                                                                                    >
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xl-4">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for="slogan1"><?php echo e(__('frontendmanage.Slogan 1')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="Excellence"
                                                                                           type="text"
                                                                                           id="slogan1"
                                                                                           name="slogan1[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('slogans1',$language->code)); ?>">
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-xl-4">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for="slogan2"><?php echo e(__('frontendmanage.Slogan 2')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="Diversity."
                                                                                           type="text"
                                                                                           id="slogan2"
                                                                                           name="slogan2[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('slogans2',$language->code)); ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xl-4">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for="slogan3"><?php echo e(__('frontendmanage.Slogan 3')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="Community."
                                                                                           type="text"
                                                                                           id="slogan3"
                                                                                           name="slogan3[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('slogans3',$language->code)); ?>">
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>

                                                            <div class="submit_btn text-center mt_60">
                                                                <button class="primary_btn_large" type="submit"
                                                                        data-toggle="tooltip"
                                                                        id="general_info_sbmt_btn"><i
                                                                        class="ti-check"></i> <?php echo e(__('common.Save')); ?>

                                                                </button>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <hr>
                                                    <div class="main-title mb-25">
                                                        <h3 class="mb-0"><?php echo e(__('frontendmanage.Registration Page')); ?></h3>
                                                    </div>

                                                    <div class="General_system_wrap_area">
                                                        <div class="single_system_wrap">
                                                            <div class="single_system_wrap_inner text-center">
                                                                <div class="logo">
                                                                    <span><?php echo e(__('frontendmanage.Banner Image')); ?></span>
                                                                </div>
                                                                <div class="logo_img">
                                                                    <img class="imagePreview2"
                                                                         src="<?php echo e(asset($page->reg_banner)); ?>"
                                                                         style="width: 200px;max-width: 100%; height: auto;"
                                                                         alt="">

                                                                </div>
                                                                <div class="update_logo_btn">
                                                                    <button class="primary-btn small fix-gr-bg"
                                                                            type="button">
                                                                        <input class="imgInput2"
                                                                               placeholder="Upload Header Logo"
                                                                               type="file" name="reg_banner"
                                                                               id="site_logo">
                                                                        <?php echo e(__('frontendmanage.Banner Image')); ?>

                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="single_system_wrap student-details header-menu">
                                                            <div class="row pt-0">
                                                                <?php if(isModuleActive('FrontendMultiLang')): ?>
                                                                    <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                                                                        role="tablist">
                                                                        <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link  <?php if(auth()->user()->language_code == $language->code): ?> active <?php endif; ?>"
                                                                                   href="#element1<?php echo e($language->code); ?>"
                                                                                   role="tab"
                                                                                   data-toggle="tab"><?php echo e($language->native); ?>  </a>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="tab-content">
                                                                <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div role="tabpanel"
                                                                         class="tab-pane fade <?php if(auth()->user()->language_code == $language->code): ?> show active <?php endif; ?>  "
                                                                         id="element1<?php echo e($language->code); ?>">
                                                                        <div class="row">
                                                                            <div class="col-xl-12">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for=""><?php echo e(__('frontendmanage.Title')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="InfixLMS"
                                                                                           type="text"
                                                                                           id="reg_title"
                                                                                           name="reg_title[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('reg_title',$language->code)); ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xl-4">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for="slogan1"><?php echo e(__('frontendmanage.Slogan 1')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="Excellence"
                                                                                           type="text"
                                                                                           id="reg_slogan1"
                                                                                           name="reg_slogan1[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('reg_slogans1',$language->code)); ?>">
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-xl-4">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for="slogan2"><?php echo e(__('frontendmanage.Slogan 2')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="Diversity."
                                                                                           type="text"
                                                                                           id="reg_slogan2"
                                                                                           name="reg_slogan2[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('reg_slogans2',$language->code)); ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xl-4">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for="slogan3"><?php echo e(__('frontendmanage.Slogan 3')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="Community."
                                                                                           type="text"
                                                                                           id="reg_slogan3"
                                                                                           name="reg_slogan3[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('reg_slogans3',$language->code)); ?>">
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <div class="submit_btn text-center mt_60">
                                                                <button class="primary_btn_large" type="submit"
                                                                        data-toggle="tooltip"
                                                                        id="general_info_sbmt_btn"><i
                                                                        class="ti-check"></i> <?php echo e(__('common.Save')); ?>

                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="main-title mb-25">
                                                        <h3 class="mb-0"><?php echo e(__('frontendmanage.Forget Password/Others Page')); ?></h3>
                                                    </div>
                                                    <div class="General_system_wrap_area">
                                                        <div class="single_system_wrap">
                                                            <div class="single_system_wrap_inner text-center">
                                                                <div class="logo">
                                                                    <span><?php echo e(__('frontendmanage.Banner Image')); ?></span>
                                                                </div>
                                                                <div class="logo_img">
                                                                    <img class="imagePreview3"
                                                                         src="<?php echo e(asset($page->forget_banner)); ?>"
                                                                         style="width: 200px;max-width: 100%; height: auto;"
                                                                         alt="">

                                                                </div>
                                                                <div class="update_logo_btn">
                                                                    <button class="primary-btn small fix-gr-bg"
                                                                            type="button">
                                                                        <input class="imgInput3"
                                                                               placeholder="Upload Header Logo"
                                                                               type="file" name="forget_banner"
                                                                               id="forget_site_logo">
                                                                        <?php echo e(__('frontendmanage.Banner Image')); ?>

                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="single_system_wrap student-details header-menu">
                                                            <div class="row pt-0">
                                                                <?php if(isModuleActive('FrontendMultiLang')): ?>
                                                                    <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                                                                        role="tablist">
                                                                        <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link  <?php if(auth()->user()->language_code == $language->code): ?> active <?php endif; ?>"
                                                                                   href="#element2<?php echo e($language->code); ?>"
                                                                                   role="tab"
                                                                                   data-toggle="tab"><?php echo e($language->native); ?>  </a>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="tab-content">
                                                                <?php $__currentLoopData = $LanguageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div role="tabpanel"
                                                                         class="tab-pane fade <?php if(auth()->user()->language_code == $language->code): ?> show active <?php endif; ?>  "
                                                                         id="element2<?php echo e($language->code); ?>">
                                                                        <div class="row">
                                                                            <div class="col-xl-12">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for="forget_site_title"><?php echo e(__('frontendmanage.Title')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="InfixLMS"
                                                                                           type="text"
                                                                                           id="forget_site_title"
                                                                                           name="forget_title[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('forget_title',$language->code)); ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xl-4">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for="forget_slogan1"><?php echo e(__('frontendmanage.Slogan 1')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="Excellence"
                                                                                           type="text"
                                                                                           id="forget_slogan1"
                                                                                           name="forget_slogan1[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('forget_slogans1',$language->code)); ?>">
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-xl-4">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for="forget_slogan2"><?php echo e(__('frontendmanage.Slogan 2')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="Diversity."
                                                                                           type="text"
                                                                                           id="forget_slogan2"
                                                                                           name="forget_slogan2[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('forget_slogans2',$language->code)); ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xl-4">
                                                                                <div class="primary_input mb-25">
                                                                                    <label class="primary_input_label"
                                                                                           for="forget_slogan3"><?php echo e(__('frontendmanage.Slogan 3')); ?></label>
                                                                                    <input class="primary_input_field"
                                                                                           placeholder="Community."
                                                                                           type="text"
                                                                                           id="forget_slogan3"
                                                                                           name="forget_slogan3[<?php echo e($language->code); ?>]"
                                                                                           value="<?php echo e($page->getTranslation('forget_slogans3',$language->code)); ?>">
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <div class="submit_btn text-center mt_60">
                                                                <button class="primary_btn_large" type="submit"
                                                                        data-toggle="tooltip"
                                                                        id="general_info_sbmt_btn"><i
                                                                        class="ti-check"></i> <?php echo e(__('common.Save')); ?>

                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </form>
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
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontendmanage::script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('setting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/FrontendManage/Resources/views/loginpage.blade.php ENDPATH**/ ?>