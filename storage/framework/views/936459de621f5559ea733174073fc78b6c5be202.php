<div>
    <?php if(showEcommerce()): ?>
        <span class="prise_tag">

               <?php if(@$discount!=null): ?>
                <span class="prev_prise">
                  <?php echo e(getPriceFormat($price)); ?>

                  </span>
            <?php endif; ?>

              <span>
            <?php if(@$discount!=null): ?>
                      <?php echo e(getPriceFormat($discount)); ?>

                  <?php else: ?>
                      <?php echo e(getPriceFormat($price)); ?>

                  <?php endif; ?>

          </span>
</span>
    <?php endif; ?>
</div>
<?php /**PATH /home/hassangomaa/Documents/Laravel_projects/noLicenceLMS/LMS_Elingua/resources/views/frontend/infixlmstheme/components/price-tag.blade.php ENDPATH**/ ?>