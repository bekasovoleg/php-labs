<p>Here is a list of all images:</p>

<form action="?controller=images&action=update" method="post" enctype="multipart/form-data">
  <input type="file" name="file" />
  <input type="submit" value="Load file!" />
</form>

<?php foreach($images as $image) { ?>
  <p>
    <?php echo $image->name; ?>
    <a href='?controller=images&action=show&id=<?php echo $image->id; ?>'>See full</a>
  </p>
<?php } ?>
