<?php
    session_start();
    require_once "users.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Playfair+Display:i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>El Baul Dorado - Home</title>
  </head>
  <body>
    <header class="mainHeader">
        <h1 class="title">El Baul Dorado</h1>
    </header>
    <nav class="mainNav navbar navbar-default">
      <div class="container-fluid">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar" roll="navigation">
          <ul class="nav navbar-nav">
            <li><a href="#">Mujeres</a></li>
            <li><a href="#">Hombres</a></li>
            <li><a href="#">Conocenos</a></li>
            <li><a href="faq.php">FAQ's</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <span>
            <li>
               <?php
               if (isset($_SESSION['email'])) {
                  echo '<a class="logButtons" href="logOut.php"><span class="logButtons glyphicon glyphicon-user"></span>Deslogear</a>';
               } else {
                  echo '<a class="logButtons" href="register.php"><span class="logButtons  glyphicon glyphicon-user"></span>Registrate</a>';
                  }
               ?>
              </li>
          </span>
          <span><li>
              <?php
              if (isset($_SESSION['email'])) {
                 echo $_SESSION['email'];
              } else {
                 echo'<a class="logButtons" href="login.php" ><span class="logButtons glyphicon glyphicon-log-in"></span>Login</a>';
                 }
              ?>
          </li>
          </span>
        </ul>
        </div>
      </div>
    </nav>
    <section class="carousel">
      <img class="girlspics" src="images/girls.jpg" alt="Girls">
    </section>

    <footer class="footerMain">
      <ul class="footerUl">
        <li>2017</li>
      </ul>
    </footer>

  </body>
</html>
