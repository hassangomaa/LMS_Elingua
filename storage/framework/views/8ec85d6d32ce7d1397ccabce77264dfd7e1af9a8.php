<div>
    <div class="main_content_iner account_main_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <!-- account_profile_wrapper  -->
                    <div class="account_profile_wrapper">
                        <div class="account_profile_thumb text-center mb_30">
                              <div class="thumb">
                                <img src="<?php echo e(getProfileImage($profile->image)); ?>" alt="">
                            </div>  
                            <?php if (isset($component)) { $__componentOriginalc5e251d2e2bde66bceaceeb9629442b0e551f755 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\StudentProfileImageUpdate::class, ['profile' => $profile]); ?>
<?php $component->withName('student-profile-image-update'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc5e251d2e2bde66bceaceeb9629442b0e551f755)): ?>
<?php $component = $__componentOriginalc5e251d2e2bde66bceaceeb9629442b0e551f755; ?>
<?php unset($__componentOriginalc5e251d2e2bde66bceaceeb9629442b0e551f755); ?>
<?php endif; ?>
                            <h4><?php echo e($profile->name); ?></h4>
                            <p><?php echo e($profile->headline); ?></p>
                        </div>
                        <div class="account_profile_form">
                            <h3 class="font_22 f_w_700 mb_30"><?php echo e(__('frontendmanage.My Profile')); ?></h3>

                            <form action="<?php echo e(route('myProfileUpdate')); ?>" method="POST"
                                  enctype="multipart/form-data"><?php echo csrf_field(); ?>
                                <div class="row">
                                    <input type="hidden" name="username" value="<?php echo e($profile->email); ?>">
                                    <div class="col-lg-12">
                                        <label class="primary_label2"><?php echo e(__('student.Full Name')); ?>

                                            <span>*</span></label>
                                        <input name="name" placeholder="<?php echo e(__('frontend.Enter First Name')); ?>"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = '<?php echo e(__('frontend.Enter First Name')); ?>'"
                                               class="primary_input4" <?php echo e($errors->first('name') ? 'autofocus' : ''); ?>

                                               <?php echo e(!$custom_field->editable_name ? 'readonly' : ''); ?>

                                               value="<?php echo e($profile->name !=""? @$profile->name:old('name')); ?>" type="text">
                                        <span class="text-danger" role="alert"><?php echo e($errors->first('name')); ?></span>
                                    </div>


                                    <div class="col-lg-12 mt_20">
                                        <label class="primary_label2"><?php echo e(__('student.Add a professional headline like')); ?>

                                            (<?php echo e(__('student.Student')); ?>)</label>
                                        <input name="headline" placeholder="<?php echo e(__('student.Headline')); ?>"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = '<?php echo e(__('student.Headline')); ?>'"
                                               class="primary_input4" type="text"
                                               value="<?php echo e($profile->headline !=""? @$profile->headline:old('headline')); ?>">
                                        <span class="text-danger" role="alert"><?php echo e($errors->first('headline')); ?></span>
                                    </div>


                                    <div class="col-lg-6 col-md-6 mt_20">
                                        <div class="single_input ">
                                            <span class="primary_label2"><?php echo e(__('student.Phone Number')); ?> </span>
                                            <input type="text" placeholder="<?php echo e(__('student.Phone Number')); ?>"
                                                   class="primary_input4  <?php echo e(@$errors->has('phone') ? ' is-invalid' : ''); ?>"
                                                   value="<?php echo e($profile->phone !=""? @$profile->phone:old('phone')); ?>"
                                                   name="phone" <?php echo e($errors->first('phone') ? 'autofocus' : ''); ?>>
                                            <span class="text-danger" role="alert"><?php echo e($errors->first('phone')); ?></span>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 mt_20">
                                        <div class="single_input ">
                                            <span class="primary_label2"><?php echo e(__('common.Email')); ?> <span
                                                    class=""> *</span></span>
                                            <input type="email" placeholder="<?php echo e(__('common.Email')); ?>"
                                                   class="primary_input4 <?php echo e(@$errors->has('email') ? ' is-invalid' : ''); ?>"
                                                   value="<?php echo e($profile->email !=""? @$profile->email:old('email')); ?>"
                                                   name="email" <?php echo e($errors->first('email') ? 'autofocus' : ''); ?>>
                                            <span class="text-danger" role="alert"><?php echo e($errors->first('email')); ?></span>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 mt_20">
                                        <div class="single_input ">
                                            <span class="primary_label2"><?php echo e(__('common.Language')); ?>  <span
                                                    class=""> *</span> </span>
                                            <select class="theme_select wide mb_20"
                                                    name="language" <?php echo e($errors->first('language') ? 'autofocus' : ''); ?>>
                                                <option data-display="<?php echo e(__('common.Language')); ?>"
                                                        value="#"><?php echo e(__('common.Select')); ?> <?php echo e(__('common.Language')); ?></option>
                                                <?php if(isset($langs)): ?>
                                                    <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value="<?php echo e(@$lang->id); ?>|<?php echo e(@$lang->code); ?>|<?php echo e(@$lang->native); ?>|<?php echo e(@$lang->rtl); ?>"
                                                            <?php if($profile->language_code==$lang->code): ?> selected <?php endif; ?>><?php echo e(@$lang->native); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <span class="text-danger" role="alert"><?php echo e($errors->first('language')); ?></span>
                                        </div>

                                    </div>


                                    <?php if($custom_field->show_dob): ?>
                                        <div class="col-lg-6 col-md-6 mt_20">
                                            <div class="single_input ">
                                                <span class="primary_label2"><?php echo e(__('common.Date of Birth')); ?> <span><?php echo e($custom_field->required_dob ? '*' : ''); ?></span> </span>
                                                <input type="date" placeholder="<?php echo e(__('common.Date of Birth')); ?>"
                                                       class="primary_input4  <?php echo e(@$errors->has('dob') ? ' is-invalid' : ''); ?>"
                                                       value="<?php echo e($profile->dob !=""? @$profile->dob:old('dob')); ?>"
                                                       name="dob" <?php echo e($errors->first('dob') ? 'autofocus' : ''); ?>

                                                    <?php echo e($custom_field->required_dob ? 'required' : ''); ?> <?php echo e($custom_field->editable_dob ? '' : 'readonly'); ?>>
                                                <span class="text-danger" role="alert"><?php echo e($errors->first('dob')); ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($custom_field->show_gender): ?>
                                            <div class="col-lg-6 col-md-6 mt_20">
                                            <div class="single_input ">
                                                <span class="primary_label2"><?php echo e(__('common.gender')); ?> <span><?php echo e($custom_field->required_gender ? '*' : ''); ?></span> </span>

                                                <select class="theme_select wide mb_20"
                                                        name="gender" <?php echo e($errors->first('gender') ? 'autofocus' : ''); ?>  <?php echo e($custom_field->editable_gender ? '' : 'readonly'); ?>>
                                                    <?php echo e($errors->first('gender') ? 'autofocus' : ''); ?>>
                                                    <option data-display="<?php echo e(__('common.gender')); ?>" value=""><?php echo e(__('common.Select')); ?></option>
                                                    <option value="male" <?php if($profile->gender=='male'): ?> selected <?php endif; ?>>Male</option>
                                                    <option value="female" <?php if($profile->gender=='female'): ?> selected <?php endif; ?>>Female</option>
                                                    <option value="other" <?php if($profile->gender=='other'): ?> selected <?php endif; ?>>Other</option>
                                                </select>
                                                <span class="text-danger" role="alert"><?php echo e($errors->first('gender')); ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($custom_field->show_company): ?>
                                            <div class="col-lg-6 col-md-6 mt_20">
                                            <div class="single_input ">
                                                <span class="primary_label2"><?php echo e(__('common.company')); ?> <span><?php echo e($custom_field->required_company ? '*' : ''); ?></span> </span>
                                                <input type="text" placeholder="<?php echo e(__('common.company')); ?>"
                                                       class="primary_input4  <?php echo e(@$errors->has('company_id') ? ' is-invalid' : ''); ?>"
                                                       value="<?php echo e($profile->company_id !=""? @$profile->company_id:old('company_id')); ?>"
                                                       name="company_id" <?php echo e($errors->first('company_id') ? 'autofocus' : ''); ?>

                                                    <?php echo e($custom_field->required_company ? 'required' : ''); ?> <?php echo e($custom_field->editable_company ? '' : 'readonly'); ?>>
                                                <span class="text-danger" role="alert"><?php echo e($errors->first('company_id')); ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($custom_field->show_student_type): ?>
                                            <div class="col-lg-6 col-md-6 mt_20">
                                            <div class="single_input ">
                                                <span class="primary_label2"><?php echo e(__('common.student_type')); ?> <span><?php echo e($custom_field->required_student_type ? '*' : ''); ?></span> </span>


                                                <select class="theme_select wide mb_20" name="student_type"
                                                        <?php echo e($custom_field->required_student_type ? 'required' : ''); ?> <?php echo e($custom_field->editable_student_type ? '' : 'readonly'); ?>

                                                        id="student_type" <?php echo e($errors->first('student_type') ? 'autofocus' : ''); ?>>
                                                    <option data-display="<?php echo e(__('common.student_type')); ?>"
                                                            value=""><?php echo e(__('common.Select')); ?></option>
                                                    <option value="personal"
                                                            <?php if($profile->student_type=='personal'): ?> selected <?php endif; ?>>Personal</option>

                                                    <option value="corporate"
                                                            <?php if($profile->student_type=='corporate'): ?> selected <?php endif; ?>>Corporate</option>
                                                </select>
                                                <span class="text-danger" role="alert"><?php echo e($errors->first('student_type')); ?></span>
                                            </div>
                                        </div>

                                    <?php endif; ?>

                                    <?php if($custom_field->show_identification_number): ?>
                                            <div class="col-lg-6 col-md-6 mt_20">
                                            <div class="single_input ">
                                                <span class="primary_label2"><?php echo e(__('common.identification_number')); ?> <span><?php echo e($custom_field->required_identification_number ? '*' : ''); ?></span> </span>
                                                <input type="text" placeholder="<?php echo e(__('common.identification_number')); ?>"
                                                       class="primary_input4  <?php echo e(@$errors->has('identification_number') ? ' is-invalid' : ''); ?>"
                                                       value="<?php echo e($profile->identification_number !=""? @$profile->identification_number:old('identification_number')); ?>"
                                                       name="identification_number" <?php echo e($errors->first('identification_number') ? 'autofocus' : ''); ?>

                                                    <?php echo e($custom_field->required_identification_number ? 'required' : ''); ?> <?php echo e($custom_field->editable_identification_number ? '' : 'readonly'); ?>>
                                                <span class="text-danger" role="alert"><?php echo e($errors->first('identification_number')); ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($custom_field->show_job_title): ?>
                                            <div class="col-lg-6 col-md-6 mt_20">
                                            <div class="single_input ">
                                                <span class="primary_label2"><?php echo e(__('common.job_title')); ?> <span><?php echo e($custom_field->required_job_title ? '*' : ''); ?></span> </span>
                                                <input type="text" placeholder="<?php echo e(__('common.job_title')); ?>"
                                                       class="primary_input4  <?php echo e(@$errors->has('job_title') ? ' is-invalid' : ''); ?>"
                                                       value="<?php echo e($profile->job_title !=""? @$profile->job_title:old('job_title')); ?>"
                                                       name="job_title" <?php echo e($errors->first('job_title') ? 'autofocus' : ''); ?>

                                                    <?php echo e($custom_field->required_job_title ? 'required' : ''); ?> <?php echo e($custom_field->editable_job_title ? '' : 'readonly'); ?>>
                                                <span class="text-danger" role="alert"><?php echo e($errors->first('job_title')); ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-lg-6 col-md-6 mt_20">
                                        <div class="single_input ">
                                            <span class="primary_label2"><?php echo e(__('common.Country')); ?> <span
                                                    class=""> *</span></span>
                                            <select class="mb-3 wide w-100" name="country"
                                                    id="country" <?php echo e($errors->first('country') ? 'autofocus' : ''); ?>>
                                                <option data-display="<?php echo e(__('common.Country')); ?>"
                                                        value=""><?php echo e(__('common.Select')); ?></option>
                                                <?php if(isset($countries)): ?>
                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e(@$country->id); ?>"
                                                                <?php if($profile->country==$country->id): ?> selected <?php endif; ?>><?php echo e(@$country->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <span class="text-danger" role="alert"><?php echo e($errors->first('country')); ?></span>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 mt_20">
                                        <div class="single_input " id="state_div">
                                            <span class="primary_label2"><?php echo e(__('common.State')); ?> <span
                                                    class=""> *</span></span>
                                            <select class="  wide mb_20 stateList" name="state"
                                                    id="state" <?php echo e($errors->first('state') ? 'autofocus' : ''); ?>>
                                                <option data-display="<?php echo e(__('common.State')); ?>"
                                                        value="#"><?php echo e(__('common.Select')); ?> <?php echo e(__('common.State')); ?></option>
                                                <?php if(isset($states)): ?>
                                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($state->id); ?>"
                                                                <?php if($profile->state==$state->id): ?> selected <?php endif; ?>><?php echo e($state->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <span class="text-danger" role="alert"><?php echo e($errors->first('state')); ?></span>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 mt_20">
                                        <div class="single_input " id="city_div">
                                            <span class="primary_label2"><?php echo e(__('common.City')); ?> <span
                                                    class=""> *</span></span>
                                            <select class="  wide mb_20 cityList" name="city"
                                                    id="city" <?php echo e($errors->first('city') ? 'autofocus' : ''); ?>>
                                                <option data-display="<?php echo e(__('common.City')); ?>"
                                                        value="#"><?php echo e(__('common.Select')); ?> <?php echo e(__('common.City')); ?></option>
                                                <?php if(isset($cities)): ?>
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($city->id); ?>"
                                                                <?php if($profile->city==$city->id): ?> selected <?php endif; ?>><?php echo e($city->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <span class="text-danger" role="alert"><?php echo e($errors->first('city')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mt_20">
                                        <div class="single_input ">
                                            <span class="primary_label2"><?php echo e(__('common.Address')); ?> <span
                                                    class=""> *</span></span>
                                            <input type="text" placeholder="<?php echo e(__('common.Address')); ?>"
                                                   class="primary_input4 <?php echo e(@$errors->has('address') ? ' is-invalid' : ''); ?>"
                                                   value="<?php echo e($profile->address !=""? @$profile->address:old('address')); ?>"
                                                   name="address" <?php echo e($errors->first('address') ? 'autofocus' : ''); ?>>
                                            <span class="text-danger" role="alert"><?php echo e($errors->first('address')); ?></span>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 mt_20">
                                        <div class="single_input ">
                                            <span class="primary_label2"><?php echo e(__('common.Zip Code')); ?> <span
                                                    class=""> *</span></span>
                                            <input type="text" placeholder="<?php echo e(__('common.Zip Code')); ?>"
                                                   class="primary_input4 <?php echo e(@$errors->has('zip') ? ' is-invalid' : ''); ?>"
                                                   value="<?php echo e($profile->zip !=""? @$profile->zip:old('zip')); ?>"
                                                   name="zip" <?php echo e($errors->first('zip') ? 'autofocus' : ''); ?>>
                                            <span class="text-danger" role="alert"><?php echo e($errors->first('zip')); ?></span>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 mt_20 mb-3">
                                        <label class="primary_label2"><?php echo e(__('common.About')); ?></label>
                                        <textarea name="about" class="primary_textarea4 mb_20"
                                                  placeholder="<?php echo e(__('student.Write Note here')); ?>"
                                                  onfocus="this.placeholder = ''"
                                                  onblur="this.placeholder = '<?php echo e(__('student.Write Note here')); ?>'"><?php echo $profile->about !=""? @$profile->about:old('about'); ?></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="preview_upload">
                                            <div class="preview_upload_thumb">
                                                <img src="" alt="" id="imgPreview"
                                                     style=" display:none;height: 100%;width: 100%;">
                                                <span id="previewTxt"><?php echo e(__('student.Preview')); ?></span>
                                            </div>
                                            <div class="preview_drag">
                                                <div class="preview_drag_inner">
                                                    <div class="img">
                                                        <img
                                                            src="<?php echo e(asset('public/frontend/infixlmstheme')); ?>/img/account/gallery_icon.png"
                                                            alt="">
                                                    </div>
                                                    <p><?php echo e(__('student.Drop your file here')); ?></p>
                                                    <small><?php echo e(__('student.Recommended image size')); ?> (330x400)</small>
                                                    <div class="chose_file">
                                                        <input type="file" name="image" id="imgInp"
                                                               onchange="readURL(this)">
                                                        <?php echo e(__('student.or choose files to upload')); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="font_22 f_w_700 mb_30"><?php echo e(__('student.Social Links')); ?></h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="primary_label2"><?php echo e(__('student.Add your Facebook URL')); ?></label>
                                        <div class="input-group custom_input_group mb_20">
                                            <div class="input-group-prepend">

                                                <span class="input-group-text"> <i class="ti-facebook"></i> <span>www.facebook.com/</span> </span>
                                            </div>
                                            <input name="facebook" type="text"
                                                   value="<?php echo e($profile->facebook !=""? @$profile->facebook:old('facebook')); ?>"
                                                   placeholder="<?php echo e(__('student.Facebook URL')); ?>"
                                                   onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = '<?php echo e(__('student.Facebook URL')); ?>'"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="primary_label2"><?php echo e(__('student.Add your Twitter URL')); ?></label>
                                        <div class="input-group custom_input_group mb_20">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text twitter_bg"> <i
                                                            class="ti-twitter-alt"></i> <span>www.twitter.com/</span> </span>
                                            </div>
                                            <input type="text" placeholder="<?php echo e(__('student.Twitter URL')); ?>"
                                                   name="twitter"
                                                   onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = '<?php echo e(__('student.Twitter URL')); ?>'"
                                                   class="form-control"
                                                   value="<?php echo e($profile->twitter !=""? @$profile->twitter:old('twitter')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="primary_label2"><?php echo e(__('student.Add your LinkedIn URL')); ?></label>
                                        <div class="input-group custom_input_group mb_20">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text linkedin_bg"> <i
                                                            class="ti-linkedin"></i> <span>www.linkedin.com/</span> </span>
                                            </div>
                                            <input type="text" placeholder="<?php echo e(__('student.LinkedIn profile')); ?>"
                                                   onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = '<?php echo e(__('student.LinkedIn profile')); ?>'"
                                                   class="form-control" name="linkedin"
                                                   value="<?php echo e($profile->linkedin !=""? @$profile->linkedin:old('linkedin')); ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="primary_label2"><?php echo e(__('student.Add your Youtube URL')); ?></label>
                                        <div class="input-group custom_input_group mb_20">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text youtube_bg"> <i
                                                            class="ti-youtube"></i> <span>www.youtube.com/</span> </span>
                                            </div>
                                            <input type="text" placeholder="<?php echo e(__('student.Youtube Profile')); ?>"
                                                   onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = '<?php echo e(__('student.Youtube Profile')); ?>'"
                                                   class="form-control"
                                                   value="<?php echo e($profile->youtube !=""? @$profile->youtube:old('youtube')); ?>"
                                                   name="youtube">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button
                                            class="theme_btn w-100 text-center mt_40"><?php echo e(__('student.Save')); ?></button>
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
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/my-profile-page-section.blade.php ENDPATH**/ ?>