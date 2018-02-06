<section class="load-image">
  <form class="load-image-form" action="?controller=images&action=update" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="alt">Alt text:</label>
      <input id="alt" type="text" name="alt" required><br>
    </div>

    <div class="form-group">
      <label for="title">Title</label>
      <input id="title" type="text" name="title" required><br>
    </div>

    <div class="form-group">
      <input type="file" accept="image/*" name="file" />
    </div>

    <div class="form-group">
      <button type="submit">Load file!</button>
    </div>

  </form>
</section>

<section class="images">
  <h3>Here is a list of all images:</h3>


  <div class="images-list">
  <?php foreach($images as $image) { ?>
    <div class="image-box">

      <div class="image-preview">
        <img src="<?php echo "assets/img/$image->name"; ?>"
             alt="<?php echo "$image->alt"; ?>"
             title="<?php echo "$image->title"; ?>">
      </div>

      <div class="full-image-link">
        <a href='?controller=images&action=show&id=<?php echo $image->id; ?>'><?php echo "$image->name ($image->views views)"; ?></a>
      </div>
    </div>
  <?php } ?>
  </div>
</section>
