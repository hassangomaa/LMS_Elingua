<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 up_breadcrumb white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e(__('zoom.Manage')); ?> <?php echo e(__('zoom.Zoom Setting')); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('common.Dashboard')); ?></a>
                    <a href="#"><?php echo e(__('zoom.Setting')); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?php echo e(route('zoom.settings.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="white-box">
                            <div class="row p-0">
                                <div class="col-lg-12">
                                    <h3 class="text-center"><?php echo e(__('zoom.Setting')); ?></h3>
                                    <hr>


                                    <div class="row mb-40 mt-40">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo e(__('zoom.Class Join Approval')); ?></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <select
                                                        class="w-100 bb niceSelect form-control <?php echo e(@$errors->has('approval_type') ? ' is-invalid' : ''); ?>"
                                                        name="approval_type">
                                                        <option data-display="<?php echo e(__('zoom.Select')); ?> *"
                                                                value=""><?php echo e(__('zoom.Select')); ?> *
                                                        </option>
                                                        <option
                                                            value="0" <?php if(!empty($setting)): ?> <?php echo e(old('approval_type',$setting->approval_type) == 0? 'selected' : ''); ?> <?php endif; ?>>
                                                            <?php echo e(__('zoom.Automatically')); ?>

                                                        </option>
                                                        <option
                                                            value="1"<?php if(!empty($setting)): ?> <?php echo e(old('approval_type',$setting->approval_type) == 1? 'selected' : ''); ?> <?php endif; ?>>
                                                            <?php echo e(__('zoom.Manually Approve')); ?>

                                                        </option>
                                                        <option
                                                            value="2" <?php if(!empty($setting)): ?> <?php echo e(old('approval_type',$setting->approval_type) == 2? 'selected' : ''); ?> <?php endif; ?>>
                                                            <?php echo e(__('zoom.No Registration Required')); ?>

                                                        </option>
                                                    </select>
                                                    <?php if($errors->has('approval_type')): ?>
                                                        <span class="invalid-feedback invalid-select" role="alert">
                                                                <strong><?php echo e(@$errors->first('approval_type')); ?></strong>
                                                            </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo e(__('zoom.Host Video')); ?> </p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="radio-btn-flex ml-20">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="host_video_on">
                                                                        <input type="radio" name="host_video"
                                                                               id="host_video_on" value="1"
                                                                               class="common-radio relationButton"<?php if(!empty($setting)): ?> <?php echo e(old('host_video',$setting->host_video) == 1 ? 'checked': ''); ?> <?php endif; ?>>
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('zoom.Enable')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="host_video">
                                                                        <input type="radio" name="host_video"
                                                                               id="host_video" value="0"
                                                                               class="common-radio relationButton" <?php if(!empty($setting)): ?> <?php echo e(old('host_video',$setting->host_video) == '0' ? 'checked': ''); ?><?php endif; ?>>
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('zoom.Disable')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mb-40 mt-40">

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo e(__('zoom.Auto Recording')); ?>

                                                        ( <?php echo e(__('zoom.For Paid Package')); ?> )</p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <select
                                                        class="w-100 bb niceSelect form-control <?php echo e(@$errors->has('auto_recording') ? ' is-invalid' : ''); ?>"
                                                        name="auto_recording">
                                                        <option data-display="<?php echo e(__('zoom.Select')); ?> *"
                                                                value=""><?php echo e(__('zoom.Select')); ?> *
                                                        </option>
                                                        <option
                                                            value="none" <?php if(!empty($setting)): ?> <?php echo e(old('auto_recording',$setting->auto_recording) == 'none'? 'selected' : ''); ?> <?php endif; ?> >
                                                            <?php echo e(__('zoom.None')); ?>

                                                        </option>
                                                        <option
                                                            value="local"<?php if(!empty($setting)): ?> <?php echo e(old('auto_recording',$setting->auto_recording) == 'local'? 'selected' : ''); ?> <?php endif; ?> >
                                                            <?php echo e(__('zoom.Local')); ?>

                                                        </option>
                                                        <option
                                                            value="cloud" <?php if(!empty($setting)): ?><?php echo e(old('auto_recording',$setting->auto_recording) == 'cloud'? 'selected' : ''); ?> <?php endif; ?>>
                                                            <?php echo e(__('zoom.Cloud')); ?>

                                                        </option>
                                                    </select>
                                                    <?php if($errors->has('auto_recording')): ?>
                                                        <span class="invalid-feedback invalid-select" role="alert">
                                                            <strong><?php echo e(@$errors->first('auto_recording')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo e(__('zoom.Participant video')); ?> </p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="radio-btn-flex ml-20">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="participant_video_on">
                                                                        <input type="radio" name="participant_video"
                                                                               id="participant_video_on" value="1"
                                                                               class="common-radio relationButton" <?php if(!empty($setting)): ?> <?php echo e(old('participant_video',$setting->participant_video) == 1? 'checked': ''); ?><?php endif; ?>>
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('zoom.Enable')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="participant_video">
                                                                        <input type="radio" name="participant_video"
                                                                               id="participant_video" value="0"
                                                                               class="common-radio relationButton"<?php if(!empty($setting)): ?> <?php echo e(old('participant_video',$setting->participant_video) == 0? 'checked': ''); ?> <?php endif; ?>>
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('zoom.Disable')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mb-40 mt-40">

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10">
                                                        <?php echo e(__('zoom.Audio Options')); ?></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <select
                                                        class="w-100 bb niceSelect form-control <?php echo e(@$errors->has('audio') ? ' is-invalid' : ''); ?>"
                                                        name="audio">
                                                        <option data-display="<?php echo e(__('zoom.Select')); ?> *"
                                                                value=""><?php echo e(__('zoom.Select')); ?>*
                                                        </option>
                                                        <option
                                                            value="both" <?php if(!empty($setting)): ?> <?php echo e(old('audio',$setting->audio) == 'both' ? 'selected' : ''); ?> <?php endif; ?> >
                                                            <?php echo e(__('zoom.Both')); ?>

                                                        </option>
                                                        <option
                                                            value="telephony" <?php if(!empty($setting)): ?> <?php echo e(old('audio',$setting->audio) == 'telephony'? 'selected' : ''); ?> <?php endif; ?>>
                                                            <?php echo e(__('zoom.Telephony')); ?>

                                                        </option>
                                                        <option
                                                            value="voip" <?php if(!empty($setting)): ?> <?php echo e(old('audio',$setting->audio) == 'voip'? 'selected' : ''); ?> <?php endif; ?> >
                                                            <?php echo e(__('zoom.Voip')); ?>

                                                        </option>

                                                    </select>
                                                    <?php if($errors->has('audio')): ?>
                                                        <span class="invalid-feedback invalid-select" role="alert">
                                                            <strong><?php echo e(@$errors->first('audio')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo e(__('zoom.Join Before Host')); ?> </p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class=" radio-btn-flex ml-20">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="join_before_host_on">
                                                                        <input type="radio" name="join_before_host"
                                                                               id="join_before_host_on" value="0"
                                                                               class="common-radio relationButton" <?php if(!empty($setting)): ?> <?php echo e(old('join_before_host',$setting->join_before_host) == 1? 'checked': ''); ?> <?php endif; ?>>
                                                                        <span
                                                                            class="checkmark mr-2"></span><?php echo e(__('zoom.Enable')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="join_before_host">
                                                                        <input type="radio" name="join_before_host"
                                                                               id="join_before_host" value="0"
                                                                               class="common-radio relationButton" <?php if(!empty($setting)): ?> <?php echo e(old('join_before_host',$setting->join_before_host) == 0? 'checked': ''); ?> <?php endif; ?>>
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('zoom.Disable')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-40 mt-40">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo e(__('zoom.Package')); ?></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <select
                                                        class="w-100 bb niceSelect form-control <?php echo e(@$errors->has('package_id') ? ' is-invalid' : ''); ?>"
                                                        name="package_id">
                                                        <option data-display="<?php echo e(__('zoom.Select Package')); ?> *"
                                                                value=""><?php echo e(__('zoom.Select Package')); ?> *
                                                        </option>
                                                        <option
                                                            value="1" <?php if(!empty($setting)): ?> <?php echo e(old('package_id',$setting->package_id) == 1 ? 'selected' : ''); ?> <?php endif; ?> >
                                                            <?php echo e(__('zoom.Basic (Free)')); ?>

                                                        </option>
                                                        <option
                                                            value="2" <?php if(!empty($setting)): ?><?php echo e(old('package_id',$setting->package_id) == 2 ? 'selected' : ''); ?> <?php endif; ?> >
                                                            <?php echo e(__('zoom.Pro')); ?>

                                                        </option>
                                                        <option
                                                            value="3"<?php if(!empty($setting)): ?> <?php echo e(old('package_id',$setting->package_id) == 3 ? 'selected' : ''); ?><?php endif; ?> >
                                                            <?php echo e(__('zoom.Business')); ?>

                                                        </option>
                                                        <option
                                                            value="4" <?php if(!empty($setting)): ?> <?php echo e(old('package_id',$setting->package_id) == 4 ? 'selected' : ''); ?> <?php endif; ?> >
                                                            <?php echo e(__('zoom.Enterprise')); ?>

                                                        </option>
                                                    </select>
                                                    <?php if($errors->has('package_id')): ?>
                                                        <span class="invalid-feedback invalid-select" role="alert">
                                                            <strong><?php echo e(@$errors->first('package_id')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo e(__('zoom.Waiting Room')); ?></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class=" radio-btn-flex ml-20">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="waiting_room_on">
                                                                        <input type="radio" name="waiting_room"
                                                                               id="waiting_room_on" value="1"
                                                                               class="common-radio relationButton" <?php if(!empty($setting)): ?> <?php echo e(old('waiting_room',$setting->waiting_room) == 1? 'checked': ''); ?> <?php endif; ?>>
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('zoom.Enable')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="waiting_room">
                                                                        <input type="radio" name="waiting_room"
                                                                               id="waiting_room" value="0"
                                                                               class="common-radio relationButton" <?php if(!empty($setting)): ?><?php echo e(old('waiting_room',$setting->waiting_room) == 0? 'checked': ''); ?> <?php endif; ?>>
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('zoom.Disable')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row mb-40 mt-40">
                                        <div class="col-lg-6">
                                            <div class="input-effect sm2_mb_20 md_mb_20">
                                                <input
                                                    class="primary-input form-control<?php echo e($errors->has('api_key') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="api_key"
                                                    value="<?php if(!empty($setting)): ?> <?php echo e(old('api_key',$setting->zoom_api_key_of_user)); ?> <?php endif; ?>">
                                                <label><?php echo e(__('zoom.Api Key')); ?><span>*</span> </label>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('api_key')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('api_key')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10">
                                                        <?php echo e(__('zoom.Mute Upon Entry')); ?> </p>
                                                </div>
                                                <div class="col-lg-7">

                                                    <div class="radio-btn-flex ml-20">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="">
                                                                    <label class="primary_checkbox d-flex mr-12 "
                                                                           for="mute_upon_entr_on">
                                                                        <input type="radio" name="mute_upon_entry"
                                                                               id="mute_upon_entr_on" value="1"
                                                                               class="common-radio relationButton" <?php if(!empty($setting)): ?> <?php echo e(old('mute_upon_entry',$setting->mute_upon_entry) == 1? 'checked': ''); ?> <?php endif; ?>>
                                                                        <span
                                                                            class="checkmark mr-2"></span>  <?php echo e(__('zoom.Enable')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="">
                                                                    <label class="primary_checkbox d-flex mr-12 "
                                                                           for="mute_upon_entry">
                                                                        <input type="radio" name="mute_upon_entry"
                                                                               id="mute_upon_entry" value="0"
                                                                               class="common-radio relationButton" <?php if(!empty($setting)): ?> <?php echo e(old('mute_upon_entry',$setting->mute_upon_entry) == 0? 'checked': ''); ?> <?php endif; ?>>
                                                                        <span
                                                                            class="checkmark mr-2"></span> <?php echo e(__('zoom.Disable')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row mb-40 mt-40">
                                        <div class="col-lg-6">
                                            <div class="input-effect sm2_mb_20 md_mb_20">
                                                <input
                                                    class="primary-input form-control<?php echo e($errors->has('secret_key') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="secret_key"
                                                    value=" <?php if(!empty($setting)): ?> <?php echo e(old('secret_key',$setting->zoom_api_serect_of_user)); ?> <?php endif; ?>">
                                                <label><?php echo e(__('zoom.Secret Key')); ?><span>*</span></label>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('secret_key')): ?>
                                                    <span class="invalid-feedback invalid-select" role="alert">
                                                        <strong><?php echo e($errors->first('secret_key')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg" id="_submit_btn_admission">
                                                <span class="ti-check"></span>
                                                <?php echo e(__('zoom.Update')); ?>

                                            </button>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/Modules/Zoom/Resources/views/settings.blade.php ENDPATH**/ ?>