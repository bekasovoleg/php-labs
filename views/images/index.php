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

<section>
  <h3>Here is a list of all images:</h3>


  <?php foreach($images as $image) { ?>

    <img src="<?php echo "assets/img/$image->name"; ?>"
         alt="<?php echo "$image->alt"; ?>"
         title="<?php echo "$image->title"; ?>"
         height="42"
         width="42">

    <p>
      <a href='?controller=images&action=show&id=<?php echo $image->id; ?>'><?php echo "$image->name ($image->views views)"; ?></a>
    </p>



  <?php } ?>
</section>
