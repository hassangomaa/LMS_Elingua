<div class="header_iner d-flex justify-content-between align-items-center">
    <div class="sidebar_icon d-lg-none">
        <i class="ti-menu"></i>
    </div>
    <div class="category_search d-flex category_box_iner">

        <div class="input-group-prepend2">
            <a href="#" class="categories_menu">
                <i class="fas fa-th"></i>
                <?php echo e(__('courses.Category')); ?>

            </a>

            <div class="menu_dropdown">
                <ul>
                    <?php if(isset($categories )): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="mega_menu_dropdown active_menu_item">
                                <a href="<?php echo e(route('categoryCourse',[$category->id,$category->slug])); ?>"><?php echo e($category->name); ?></a>
                                <?php if(isset($category->activeSubcategories)): ?>
                                    <?php if(count($category->activeSubcategories)!=0): ?>
                                        <ul>
                                            <li>
                                                <div class="menu_dropdown_iner d-flex">
                                                    <div class="single_menu_dropdown">
                                                        <h4><?php echo e(__('courses.Sub Category')); ?></h4>
                                                        <ul>
                                                            <?php if(isset($category->activeSubcategories)): ?>
                                                                <?php $__currentLoopData = $category->activeSubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li>
                                                                        <a href="<?php echo e(route('subCategory.course',[$subcategory->id,$subcategory->slug])); ?>"><?php echo e($subcategory->name); ?></a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <form action="<?php echo e(route('search')); ?>">
            <div class="input-group theme_search_field ">
                <div class="input-group-prepend">
                    <button class="btn" type="button" id="button-addon1"><i
                            class="ti-search"></i>
                    </button>
                </div>

                <input type="text" class="form-control" name="query"
                       placeholder="<?php echo e(__('frontend.Search for course, skills and Videos')); ?>"
                       onfocus="this.placeholder = ''"
                       onblur="this.placeholder = '<?php echo e(__('frontend.Search for course, skills and Videos')); ?>'">

            </div>
        </form>
    </div>
    <div class="d-flex align-items-center">
        <div class="notification_wrapper" id="main-nav-for-chat">
            <ul>
                <li class="position-relative">
                    <a href="#" class="show_notify">
                        <div class="notify_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/bell.svg" alt="">
                              <i class="ti-bell"></i>  
                        </div>
                        <span class="notify_count"><?php echo e(Auth::user()->unreadNotifications->count()); ?></span>
                    </a>
                    <div class="notification_menu">
                        <ul>
                            <?php $__currentLoopData = Auth::user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php dd($notification->data['body']); ?>  
                                <li>
                                    <a href="#" class="unread_notification" title="Mark As Read" data-notification_id="<?php echo e($notification->id); ?>"> <?php echo e(\Illuminate\Support\Str::limit($notification->data['title'], 70, $end='...')); ?> </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                        <div class="notification_footer">
                            <a href="<?php echo e(route('myNotification')); ?>" class="readMore_text theme_btn small_btn2 p-2 m-1 ">Readmore</a>
                            <a href="<?php echo e(route('NotificationMakeAllRead')); ?>" class="readMore_text theme_btn small_btn2 p-2 m-1 ">Mark As Read</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="<?php echo e(route('myWishlists')); ?>">
                        <div class="notify_icon">
                            <img src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/heart.svg" alt="">
                        </div>
                        <span class="notify_count"><?php echo e(@totalWhiteList()); ?></span>
                    </a>
                </li>
                <li>
                    <a href="#" class="cart_store">
                        <div class="notify_icon">
                            <img class="" src="<?php echo e(asset('/public/frontend/infixlmstheme/')); ?>/img/svg/cart.svg" alt="">
                        </div>
                        <span class="notify_count "><?php echo e(@cartItem()); ?></span>
                    </a>
                </li>

                <?php if(isModuleActive('Chat')): ?>
                    <li class="scroll_notification_list">
                        <?php if(env('BROADCAST_DRIVER') == null): ?>
                            <jquery-notification-component
                                :loaded_unreads="<?php echo e(json_encode($notifications_for_chat)); ?>"
                                :user_id="<?php echo e(json_encode(auth()->id())); ?>"
                                :redirect_url="<?php echo e(json_encode(route('chat.index'))); ?>"
                                :check_new_notification_url="<?php echo e(json_encode(route('chat.notification.check'))); ?>"
                                :mark_all_as_read_url="<?php echo e(json_encode(route('chat.notification.allRead'))); ?>"
                                :asset_type="<?php echo e(json_encode('/public')); ?>"
                            ></jquery-notification-component>
                        <?php else: ?>
                            <notification-component
                                :loaded_unreads="<?php echo e(json_encode($notifications_for_chat)); ?>"
                                :user_id="<?php echo e(json_encode(auth()->id())); ?>"
                                :redirect_url="<?php echo e(json_encode(route('chat.index'))); ?>"
                                :mark_all_as_read_url="<?php echo e(json_encode(route('chat.notification.allRead'))); ?>"
                                :asset_type="<?php echo e(json_encode('/public')); ?>"
                            ></notification-component>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="profile_info collaps_part">
            <div class="profile_img collaps_icon     d-flex align-items-center">
                <div class="studentProfileThumb"
                     style="background-image: url('<?php echo e(getProfileImage(Auth::user()->image)); ?>')"></div>

                <span class=""><?php echo e(Auth::user()->name); ?>

                    <br style="display: block">
          <small>
                        <?php if(Auth::user()->balance==0): ?>
                  <?php echo e(Settings('currency_symbol') ??'৳'); ?> 0
              <?php else: ?>
                  <?php echo e(getPriceFormat(Auth::user()->balance)); ?>

              <?php endif; ?>
          </small>

                </span>

            </div>
            <div class="profile_info_iner collaps_part_content">
                <a href="<?php echo e(url('/')); ?>"><?php echo e(__('frontendmanage.Home')); ?></a>
                <a href="<?php echo e(route('myProfile')); ?>"><?php echo e(__('frontendmanage.My Profile')); ?></a>
                <a href="<?php echo e(route('myAccount')); ?>"><?php echo e(__('frontend.Account Settings')); ?></a>
                <?php if(isModuleActive('Affiliate') && auth()->user()->affiliate_request!=1): ?>
                    <a href="<?php echo e(routeIsExist('affiliate.users.request')?route('affiliate.users.request'):''); ?>"><?php echo e(__('frontend.Join Affiliate Program')); ?></a>
                <?php endif; ?>
                <?php if(isModuleActive('UserType')): ?>
                    <?php $__currentLoopData = auth()->user()->userRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if ($role->id==auth()->user()->role_id){
                                continue;
                            }
                        ?>
                        <a href="<?php echo e(route('usertype.changePanel',$role->id)); ?>">
                            <?php echo e(__('common.Switch to')); ?> <?php echo e($role->name); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <a href="<?php echo e(route('logout')); ?>"><?php echo e(__('frontend.Log Out')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/partials/_dashboard_menu.blade.php ENDPATH**/ ?>