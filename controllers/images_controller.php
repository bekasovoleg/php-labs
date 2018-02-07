<?php
  class ImagesController {
    public function index() {
      // we store all the images in a variable
      $images = Images::all();
      usort($images, function($a, $b) {
        return $a->views < $b->views;
      });
      require_once('views/images/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=images&action=show&id=x
      // without an id we just redirect to the error page as we need the image id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right image
      Images::addView($_GET['id']);
      $image = Images::find($_GET['id']);
      require_once('views/images/show.php');
    }

    public function update() {
      $target_dir = "assets/img/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);
      $target_file_min = $target_dir . 'min_' . basename($_FILES["file"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["file"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
          self::compress($target_file, $target_file_min, 30);
          echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
          Images::add($_FILES["file"]["name"], $_POST["alt"], $_POST["title"]);
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }


      // if (isset($_FILES['file'])) {
      //   self::upload_file($_FILES['file'], $_POST["alt"], $_POST["title"]);
      // }
    }

    // private static function upload_file($file, $alt, $title) {
    //   if ($file['name'] == '') {
    //     echo 'No file!';
    //     return;
    //   }

    //   if(copy($file['tmp_name'], 'assets/img/'.$file['name'])) {
    //     Images::add($file['name'], $alt, $title);
    //     echo 'File loaded';
    //   } else {
    //     echo 'Error loading file';
    //     echo $_SERVER['DOCUMENT_ROOT'];
    //   }
    // }


    private static function compress($source, $destination, $quality) {
      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
      } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source);
      } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
      }

      imagejpeg($image, $destination, $quality);

      return $destination;
      }
  }
?>
