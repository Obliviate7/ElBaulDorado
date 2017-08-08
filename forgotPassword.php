<?php
  session_start();
  require_once "users.php";
  $errorDeDatos = "";
  /*si esta iniciada la sesion se redirige al home*/
    if (!(isset($_SESSION['email']))){
    }  else{
      header('Location: index.php');
    }

/*comparacion de mail para enviar correo*/
  if (isset($_REQUEST['submitted']) && $_REQUEST['submitted'] == 1) {
    $loginForgot = searchUser($_REQUEST['email'] );
    if ($loginForgot) {
      $errorDeDatos = "";
      header('Location: mailSend.php');
      mail( $_REQUEST['forgotEmail'],"El Baul Dorado, Contraseña Olvidada","Olvidaste tu contraseña");
      $_SESSION['forgotEmail'] = $_REQUEST['email'];
      $userForgot = $_SESSION['forgotEmail'] ;
    } else {
      $errorDeDatos = "CORREO INCORRECTO";
    }
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
    <title>El Baul Dorado - Forgot Password</title>
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
               <?php
               if (isset($_SESSION['email'])) {
                    echo '<a href="logOut.php"><span class="logButtons glyphicon glyphicon-user"></span>Deslogear</a>';
               } else {
                  echo '<a href="register.php"><span class="logButtons glyphicon glyphicon-user"></span>Registrate</a>';
                  }
               ?>
              </li>
          </span>
          <span><li>
              <?php
              if (isset($_SESSION['email'])) {
                 echo $_SESSION['email'];
              } else {
                 echo'<a href="login.php" ><span class="logButtons glyphicon glyphicon-log-in"></span>Login</a>';
                 }
              ?>
          </li>
          </span>
          </ul>
        </div>
      </div>
    </nav>
    <div class="containerRegister">
        <h2 class="titleRegister">Olvide mi contraseña</h2>
      <form class="formRegister" action="forgotPassword.php" method='post' enctype="multipart/form-data">
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <div class="form-group">
          <p>Ingresa el correo con el que te registraste, enviaremos un link para que recuperes tu contraseña </p>
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value=''>
        </div>
        <div>
          <?php
            echo $errorDeDatos;
          ?>
        </div>
        <button type="submit" class="btn btn-default" value='Enviar'>Enviar Correo</button>
      </form>
    </div>

    <footer class="footerMain">
      <ul class="footerUl">
        <li>2017</li>
      </ul>
    </footer>

  </body>
</html>
