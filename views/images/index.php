<section class="img-prew-list">
  <aside class="load-image">
    <h3>Add new image:</h3>

    <form class="load-image-form" action="?controller=images&action=update" method="post" enctype="multipart/form-data">

        <label for="alt">Alt text:</label>
        <input id="alt" type="text" name="alt" required><br>

        <label for="title">Title:</label>
        <input id="title" type="text" name="title" required><br>

        <input type="file" accept="image/*" name="file" />

        <input type="submit" value="Load file">
    </form>
  </aside>

  <section class="images">
    <h3>Here is a list of all images:</h3>


    <div class="images-list">
    <?php foreach($images as $image) { ?>
      <div class="image-box">

        <div class="image-preview">
          <img src="<?php echo "assets/img/min_$image->name"; ?>"
               alt="<?php echo "$image->alt"; ?>"
               title="<?php echo "$image->title"; ?>">
        </div>

        <div class="full-image-link">
          <a target="_blank" href='?controller=images&action=show&id=<?php echo $image->id; ?>'><?php echo "$image->name ($image->views views)"; ?></a>
        </div>
      </div>
    <?php } ?>
    </div>
  </section>
</section>
