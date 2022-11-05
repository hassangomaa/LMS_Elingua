<?php $__env->startPush('styles'); ?>
    <style>
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            width: 100%;
            height: 46px;
            line-height: 46px;
            font-size: 13px;
            padding: 3px 20px;
            padding-left: 20px;
            font-weight: 300;
            border-radius: 30px;
            color: var(--base_color);
            border: 1px solid #ECEEF4
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 46px;
            position: absolute;
            top: 1px;
            right: 20px;
            width: 20px;
            color: var(--text-color);
        }

        .select2-dropdown {
            background-color: white;
            border: 1px solid #ECEEF4;
            border-radius: 4px;
            box-sizing: border-box;
            display: block;
            position: absolute;
            left: -100000px;
            width: 100%;
            width: 100%;
            background: var(--bg_white);
            overflow: auto !important;
            border-radius: 0px 0px 10px 10px;
            margin-top: 1px;
            z-index: 9999 !important;
            border: 0;
            box-shadow: 0px 10px 20px rgb(108 39 255 / 30%);
            z-index: 1051;
            min-width: 200px;
        }

        .select2-search--dropdown .select2-search__field {
            padding: 4px;
            width: 100%;
            box-sizing: border-box;
            box-sizing: border-box;
            background-color: #fff;
            border: 1px solid rgba(130, 139, 178, 0.3) !important;
            border-radius: 3px;
            box-shadow: none;
            color: #333;
            display: inline-block;
            vertical-align: middle;
            padding: 0px 8px;
            width: 100% !important;
            height: 46px;
            line-height: 46px;
            outline: 0 !important;
        }

        .select2-container {
            width: 100% !important;
            min-width: 90px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 40px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backend.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex">
                            <h3 class="mb-0 mr-30"><?php echo e(__('common.My Profile')); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="common_grid_wrapper">
                        <!-- white_box -->
                        <div class="white_box_30px">
                            <div class="main-title mb-25">
                                <h3 class="mb-0"><?php echo e(__('common.Profile Settings')); ?></h3>
                            </div>
                            <form action="<?php echo e(route('update_user')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="name"><?php echo e(__('common.Name')); ?> <strong
                                                        class="text-danger">*</strong></label>
                                            <input class="primary_input_field" name="name" value="<?php echo e(@$user->name); ?>"
                                                   id="name" placeholder="" required
                                                   type="text" <?php echo e($errors->first('name') ? 'autofocus' : ''); ?>>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="role"><?php echo e(__('common.Role')); ?> </label>
                                            <input class="primary_input_field" name="" readonly
                                                   id="role" value="<?php echo e(@$user->role->name); ?>" placeholder="-" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="email"><?php echo e(__('common.Email')); ?>

                                                <strong
                                                        class="text-danger">*</strong></label>
                                            <input class="primary_input_field" name="email" value="<?php echo e(@$user->email); ?>"
                                                   id="email" placeholder="-"
                                                   type="email" <?php echo e($errors->first('email') ? 'autofocus' : ''); ?>>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="phone"><?php echo e(__('common.Phone')); ?> </label>
                                            <input class="primary_input_field" name="phone" value="<?php echo e(@$user->phone); ?>"
                                                   id="phone" placeholder="-" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-25">
                                        <label class="primary_input_label"
                                               for="country"><?php echo e(__('common.Country')); ?> </label>
                                        <select class="primary_select" name="country" id="country">
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$country->id); ?>"
                                                        <?php if(@$user->country==$country->id): ?> selected <?php endif; ?>><?php echo e(@$country->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-25">
                                        <label class="primary_input_label"
                                               for="state"><?php echo e(__('common.State')); ?> </label>
                                        <select class="select2  stateList" name="state" id="state">
                                            <option
                                                    data-display=" <?php echo e(__('common.Select')); ?> <?php echo e(__('common.State')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('common.State')); ?>

                                            </option>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$state->id); ?>"
                                                        <?php if(@$user->state==$state->id): ?> selected <?php endif; ?>><?php echo e(@$state->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-25">
                                        <label class="primary_input_label"
                                               for="city"><?php echo e(__('common.City')); ?> </label>
                                        <select class="select2  cityList" name="city" id="city">
                                            <option
                                                    data-display=" <?php echo e(__('common.Select')); ?> <?php echo e(__('common.City')); ?>"
                                                    value=""><?php echo e(__('common.Select')); ?> <?php echo e(__('common.City')); ?>

                                            </option>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$city->id); ?>"
                                                        <?php if(@$user->city==$city->id): ?> selected <?php endif; ?>><?php echo e(@$city->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="zip"><?php echo e(__('common.Zip Code')); ?> </label>
                                            <input class="primary_input_field" name="zip" value="<?php echo e(@$user->zip); ?>"
                                                   id="zip" placeholder="-" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-25">
                                        <label class="primary_input_label"
                                               for="currency"><?php echo e(__('common.Currency')); ?></label>
                                        <select class="primary_select" name="currency" id="currency">
                                            <option data-display="<?php echo e(__('common.Select')); ?> Currency"
                                                    value=""><?php echo e(__('common.Select')); ?> Currency
                                            </option>
                                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$currency->id); ?>"
                                                        <?php if(@$user->currency_id==$currency->id): ?> selected <?php endif; ?>><?php echo e(@$currency->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-25">
                                        <label class="primary_input_label"
                                               for="language"><?php echo e(__('common.Language')); ?> </label>
                                        <select class="primary_select" name="language" id="language">
                                            <option data-display="<?php echo e(__('common.Select')); ?> Language"
                                                    value=""><?php echo e(__('common.Select')); ?>

                                                <?php echo e(__('passwords.Language')); ?></option>
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$language->id); ?>"
                                                        <?php if(@$user->language_id==$language->id): ?> selected <?php endif; ?>><?php echo e(@$language->native); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="facebook"><?php echo e(__('common.Facebook URL')); ?> </label>
                                            <input class="primary_input_field" name="facebook" id="facebook"
                                                   value="<?php echo e(@$user->facebook); ?>" placeholder="-" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="twitter"><?php echo e(__('common.Twitter URL')); ?> </label>
                                            <input class="primary_input_field" name="twitter" id="twitter"
                                                   value="<?php echo e(@$user->twitter); ?>" placeholder="-" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="linkedin"><?php echo e(__('common.LinkedIn URL')); ?> </label>
                                            <input class="primary_input_field" name="linkedin" id="linkedin"
                                                   value="<?php echo e(@$user->linkedin); ?>" placeholder="-" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="instagram"><?php echo e(__('common.Instagram URL')); ?> </label>
                                            <input class="primary_input_field" name="instagram" id="instagram"
                                                   value="<?php echo e(@$user->instagram); ?>" placeholder="-" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="shortDetails"><?php echo e(__('common.Short Description')); ?> </label>
                                            <input class="primary_input_field" name="short_details"
                                                   id="shortDetails" value="<?php echo e(@$user->short_details); ?>" placeholder="-"
                                                   type="text">
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="about"><?php echo e(__('common.Description')); ?> </label>
                                            <textarea class="lms_summernote" name="about"

                                                      id="about" cols="30"
                                                      rows="10"><?php echo @$user->about; ?></textarea>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="primary_input mb-35">
                                            <label class="primary_input_label"
                                                   for=""><?php echo e(__('common.Browse')); ?>  <?php echo e(__('common.Avatar')); ?> </label>
                                            <div class="primary_file_uploader">
                                                <input class="primary-input" type="text" id="placeholderFileOneName"
                                                       placeholder="<?php echo e(showPicName($user->image)); ?>" readonly="">
                                                <button class="primary_btn_2" type="button">
                                                    <label class="primary_btn_2"
                                                           for="document_file_1"><?php echo e(__('common.Browse')); ?> </label>
                                                    <input type="file" class="d-none" name="image" id="document_file_1">
                                                </button>
                                            </div>
                                        </div>


                                    </div>

                                    <?php if(auth()->guard()->check()): ?>
                                        <?php if(\Illuminate\Support\Facades\Auth::user()->role_id==1): ?>
                                            <div class="col-12">
                                                <div class="col-md-12 mb-25">
                                                    <label class="primary_input_label"
                                                           for="subscription_method"><?php echo e(__('common.Subscription Method')); ?> </label>
                                                    <select class="primary_select" name="subscription_method">
                                                        <option value=""><?php echo e(__('common.None')); ?></option>
                                                        <option
                                                                value="Mailchimp"
                                                                <?php if($user->subscription_method=="Mailchimp"): ?> selected <?php endif; ?>><?php echo e(__('newsletter.Mailchimp')); ?></option>

                                                        <option
                                                                value="GetResponse"
                                                                <?php if($user->subscription_method=="GetResponse"): ?> selected <?php endif; ?> ><?php echo e(__('newsletter.GetResponse')); ?></option>

                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-25" style="    margin-top: 70px;">

                                                    <label class="primary_input_label"
                                                           for="subscription_api_key"><?php echo e(__('common.Subscription Api Key')); ?>

                                                        <small>(<?php echo e($user->subscription_api_status==1?'Connected':'Not Connected'); ?>

                                                            )</small> </label>
                                                    <input class="primary_input_field" name="subscription_api_key"
                                                           value="<?php echo e(@$user->subscription_api_key); ?>"
                                                           id="subscription_api_key" placeholder="-" type="text">

                                                </div>

                                                <div class="col-md-12">

                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="col-12 mb-10">
                                        <div class="submit_btn text-center">
                                            <button class="primary_btn_large" type="submit"><i
                                                        class="ti-check"></i> <?php echo e(__('common.Save')); ?> </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- white_box  -->
                        <div class="white_box_30px">
                            <div class="main-title mb-25">
                                <h3 class="mb-0"><?php echo e(__('common.Change')); ?>  <?php echo e(__('common.Password')); ?> </h3>
                            </div>
                            <form action="<?php echo e(route('updatePassword')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="password-field"><?php echo e(__('common.Current')); ?> <?php echo e(__('common.Password')); ?>

                                                <strong
                                                        class="text-danger">*</strong></label>
                                            <div>

                                                <input class="primary_input_field" name="current_password"
                                                       <?php echo e($errors->first('current_password') ? 'autofocus' : ''); ?>

                                                       placeholder="<?php echo e(__('common.Current')); ?> <?php echo e(__('common.Password')); ?>"
                                                       id="password-field"
                                                       type="password">
                                                <span toggle="#password-field"
                                                      class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="password-field2"><?php echo e(__('common.New')); ?>  <?php echo e(__('common.Password')); ?>

                                                <strong
                                                        class="text-danger">*</strong></label>
                                            <input class="primary_input_field" name="new_password"
                                                   placeholder="<?php echo e(__('common.New')); ?>  <?php echo e(__('common.Password')); ?> <?php echo e(__('common.Minimum 8 characters')); ?>"
                                                   id="password-field2"
                                                   type="password" <?php echo e($errors->first('new_password') ? 'autofocus' : ''); ?>>
                                            <span toggle="#password-field2"
                                                  class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="password-field3"><?php echo e(__('common.Re-Type Password')); ?>

                                                <strong class="text-danger">*</strong></label>
                                            <input class="primary_input_field" name="confirm_password"
                                                   <?php echo e($errors->first('confirm_password') ? 'autofocus' : ''); ?>

                                                   id="password-field3" placeholder="<?php echo e(__('common.Re-Type Password')); ?>"
                                                   type="password">
                                            <span toggle="#password-field3"
                                                  class="fa fa-fw fa-eye field-icon toggle-password3"></span>
                                        </div>
                                    </div>


                                    <div class="col-12 mb-10">
                                        <div class="submit_btn text-center">
                                            <button class="primary_btn_large" type="submit"><i
                                                        class="ti-check"></i> <?php echo e(__('common.Update')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php echo $__env->make('backend.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>


    <script>
        $('.cityList').select2({
            ajax: {
                url: '<?php echo e(route('ajaxCounterCity')); ?>',
                type: "GET",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1,
                        id: $('#state').find(':selected').val(),
                    }
                    return query;
                },
                cache: false
            }
        });

        $('.stateList').select2({
            ajax: {
                url: '<?php echo e(route('ajaxCounterState')); ?>',
                type: "GET",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1,
                        id: $('#country').find(':selected').val(),
                    }
                    return query;
                },
                cache: false
            }
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/backend/changePassword.blade.php ENDPATH**/ ?>