
<?php
  session_start();
  session_destroy();
  /*si no esta iniciada la sesion se redirige al home*/
    if (isset($_SESSION['email'])){
    }  else{
      header('Location: index.php');
    }
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
    <title>El Baul Dorado - Log Out</title>
  </head>
  <body>

    <header class="mainHeader">
        <a class="title" href="index.php">El Baul Dorado</a>
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
            <a class="logButtons" href="register.php"><span class="logButtons glyphicon glyphicon-user"></span>Registrate</a>
              </li>
          </span>
          <span><li>
            <a class="logButtons" href="login.php" ><span class="logButtons glyphicon glyphicon-log-in"></span>Login</a>
          </li>
          </span>
          </ul>
        </div>
      </div>
    </nav>
    <div class="containerLogin">
      <h2 class="titleLogin" >Has sido deslogeado</h2>
      <form>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <div class="form-group">
          <label>Gracias Vuelvas Prontos</label>
        </div>
      </form>
    </div>

    <footer class="footerMain">
      <ul class="footerUl">
        <li>2017</li>
      </ul>
    </footer>

  </body>
</html>
