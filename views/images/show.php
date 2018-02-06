<h3>This is the requested image:</h3>

<div class="image-box-full">
  <div class="image-full">
    <img src="<?php echo "assets/img/$image->name"; ?>"
         alt="<?php echo "$image->alt"; ?>"
         title="<?php echo "$image->title"; ?>">
  </div>

  <div class="full-image-link">
   <?php echo "$image->name ($image->views views)"; ?>
  </div>
</div>
