<?php
  class ImagesController {
    public function index() {
      // we store all the images in a variable
      $images = Images::all();
      require_once('views/images/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=images&action=show&id=x
      // without an id we just redirect to the error page as we need the image id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right image
      $image = Images::find($_GET['id']);
      require_once('views/images/show.php');
    }

    public function update() {
      echo "Load image";
    }

  }
?>
