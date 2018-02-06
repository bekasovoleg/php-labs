<?php
  class Images {
    // we define 3 attributes
    // they are public so that we can access them using $image->name directly
    public $id;
    public $name;
    public $alt;
    public $title;
    public $views ;

    public function __construct($id, $name, $alt, $title, $views) {
      $this->id    = $id;
      $this->name  = $name;
      $this->alt   = $alt;
      $this->title = $title;
      $this->views = $views;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM images');

      // we create a list of Images objects from the database results
      foreach($req->fetchAll() as $image) {
        $list[] = new Images($image['id'], $image['name'], $image['alt'], $image['title'], $image['views']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM images WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $image = $req->fetch();

      return new Images($image['id'], $image['name'], $image['alt'], $image['title'], $image['views']);
    }
  }
?>
