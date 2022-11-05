<div class="single_comment_box" id="<?php echo e($comment->id); ?>_single_comment">
    <div class="comment_box_inner">
        <div class="comment_box_info">
            <div class="thumb">
                <div
                    class="profile_info profile_img collaps_icon d-flex align-items-center">
                    <div class="studentProfileThumb"
                         style="background-image: url('<?php echo e(getProfileImage(@$comment->user['image'])); ?>');margin: 0"></div>

                </div>

            </div>
            <div class="comment_box_text link">
                <?php if($isEnrolled): ?>
                    <a class="position_right reply_btn   <?php if(commentCanDelete($comment->id,$comment->instructor_id)): ?> mr_20 <?php endif; ?>"
                       data-comment="<?php echo e(@$comment->id); ?>" href="#">

                        <?php echo e(__('frontend.Reply')); ?>

                        <i class="fas fa-chevron-right"></i>
                    </a>
                <?php endif; ?>
                <?php if(commentCanDelete($comment->id,$comment->instructor_id)): ?>
                    <a class="position_right deleteBtn" href="#"
                       data-toggle="modal"
                       onclick="deleteCommnet('<?php echo e(route('deleteComment',$comment->id)); ?>','<?php echo e($comment->id); ?>_single_comment')"
                       data-target="#deleteComment">
                        <i class="fas fa-trash  fa-xs"></i>
                    </a>
                <?php endif; ?>
                <a href="#">
                    <h5><?php echo e($comment->user['name']); ?></h5>
                </a>
                <span><?php echo e(\Carbon\Carbon::parse($comment->created_at)->diffForHumans()); ?>  </span>


                <p><?php echo e(@$comment->comment); ?></p>

            </div>
        </div>
    </div>
    <div
        class="d-none inputForm comment_box_inner comment_box_inner_reply reply_form_<?php echo e(@$comment->id); ?>">

        <form action="<?php echo e(route('submitCommnetReply')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="comment_id"
                   value="<?php echo e(@$comment->id); ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_input mb_25">
                                                                                            <textarea
                                                                                                placeholder="Leave a reply"
                                                                                                rows="2" name="reply"
                                                                                                class="primary_textarea gray_input h-25"></textarea>
                    </div>
                </div>
                <div class="col-lg-12 mb_30">
                    <?php if($isEnrolled): ?>
                        <button type="submit"
                                class="theme_btn small_btn4">
                            <i class="fas fa-reply"></i>
                            <?php echo e(__('frontend.Reply')); ?>

                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
    <?php if(isset($comment->replies)): ?>
        <?php $__currentLoopData = $comment->replies->where('reply_id',null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="comment_box_inner comment_box_inner_reply" id="<?php echo e($replay->id); ?>_single_comment_reply">
                <div class="comment_box_info ">

                    <div class="thumb">
                        <div
                            class="profile_info profile_img collaps_icon d-flex align-items-center">
                            <div class="studentProfileThumb"
                                 style="background-image: url('<?php echo e(getProfileImage($replay->user['image']??'')); ?>');margin: 0"></div>

                        </div>

                    </div>

                    <div class="comment_box_text link">
                        <?php if($isEnrolled): ?>
                            <a class="position_right reply2_btn   <?php if(ReplyCanDelete($replay->user_id,$course->user_id)): ?> mr_20 <?php endif; ?>"
                               data-reply="<?php echo e(@$replay->id); ?>" href="#">

                                <?php echo e(__('frontend.Reply')); ?>

                                <i class="fas fa-chevron-right"></i>
                            </a>
                        <?php endif; ?>
                        <?php if(ReplyCanDelete($replay->user_id,$course->user_id)): ?>
                            <a class="position_right" href="#"
                               data-toggle="modal"
                               onclick="deleteCommnet('<?php echo e(route('deleteCommentReply',$replay->id)); ?>','<?php echo e($replay->id); ?>_single_comment_reply')"
                               data-target="#deleteComment">
                                <i class="fas fa-trash  fa-xs"></i>
                            </a>
                        <?php endif; ?>
                        <a href="#">
                            <h5><?php echo e(@$replay->user['name']); ?></h5>
                        </a>
                        <span>
                                                                            <?php echo e(\Carbon\Carbon::parse($replay->created_at)->diffForHumans()); ?>

                                                             </span>
                        <p><?php echo e(@$replay->reply); ?></p>

                    </div>

                </div>
            </div>
            <div
                class="d-none inputForm comment_box_inner comment_box_inner_reply reply2_form_<?php echo e(@$replay->id); ?>">

                <form action="<?php echo e(route('submitCommnetReply')); ?>"
                      method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="comment_id"
                           value="<?php echo e(@$comment->id); ?>">
                    <input type="hidden" name="reply_id"
                           value="<?php echo e(@$replay->id); ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single_input mb_25">
                                                                                            <textarea
                                                                                                placeholder="Leave a reply"
                                                                                                rows="2" name="reply"
                                                                                                class="primary_textarea gray_input h-25"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 mb_30">
                            <?php if($isEnrolled): ?>
                                <button type="submit"
                                        class="theme_btn small_btn4">
                                    <i class="fas fa-reply"></i>
                                    <?php echo e(__('frontend.Reply')); ?>

                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>


            <?php $__currentLoopData = $comment->replies->where('reply_id',$replay->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="comment_box_inner comment_box_inner_reply2" id="<?php echo e($replay->id); ?>_single_comment_reply_reply">
                    <div class="comment_box_info ">
                        <div class="thumb">
                            <div
                                class="profile_info profile_img collaps_icon d-flex align-items-center">
                                <div class="studentProfileThumb"
                                     style="background-image: url('<?php echo e(getProfileImage($replay->user['image']??'')); ?>');margin: 0"></div>

                            </div>

                        </div>
                        <div class="comment_box_text link">
                            <?php if(ReplyCanDelete($replay->user_id,$course->user_id)): ?>
                                <a class="position_right" href="#"
                                   data-toggle="modal"
                                   onclick="deleteCommnet('<?php echo e(route('deleteCommentReply',$replay->id)); ?>','<?php echo e($replay->id); ?>_single_comment_reply_reply')"
                                   data-target="#deleteComment">
                                    <i class="fas fa-trash  fa-xs"></i>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="comment_box_text ">

                            <a href="#">
                                <h5><?php echo e(@$replay->user['name']); ?></h5>
                            </a>
                            <span>
                                                                                      <?php echo e(\Carbon\Carbon::parse($replay->created_at)->diffForHumans()); ?> </span>
                            <p><?php echo e(@$replay->reply); ?></p>

                        </div>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/partials/_single_comment.blade.php ENDPATH**/ ?>