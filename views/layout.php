<DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="assets/css/layout.css">
  </head>
  <body>
    <div class="wrapper">
      <header>
        <a href='/home'>Home</a>
        <a href='?controller=images&action=index'>Images</a>
      </header>

      <main>
        <section>
          <?php require_once('routes.php'); ?>
        </section>

      </main>


      <footer>
        Copyright
      </footer>
    </div>
  <body>
<html>
