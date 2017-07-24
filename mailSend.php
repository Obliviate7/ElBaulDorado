
<?php
  session_start();

  /*si esta iniciada la sesion se redirige al home*/
    if (!(isset($_SESSION['email']))){
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
    <title>El Baul Dorado - Mail Enviado</title>
  </head>
  <body>
    <header class="mainHeader">
      <!--   <h1 class="title" href="index.html">El Baul Dorado</h1> -->
        <a class="title" href="index.php">El Baul Dorado</a>
      <!-- <a href="#" class="buttonLogin btn btn-default">Ingresa</a> -->
      <!-- <a href="#" class="buttonSignIn btn btn-default">Registrate</a> -->
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
                    echo '<a href="logOut.php"><span class="glyphicon glyphicon-user"></span>Deslogear</a>';
               } else {
                  echo '<a href="register.php"><span class="glyphicon glyphicon-user"></span>Registrate</a>';
                  }
               ?>
              </li>
          </span>
          <span><li>
              <?php
              if (isset($_SESSION['email'])) {
                 echo $_SESSION['email'];
              } else {
                 echo'<a href="login.php" ><span class="glyphicon glyphicon-log-in"></span>Login</a>';
                 }
              ?>
          </li>
          </span>
          </ul>
        </div>
      </div>
    </nav>
    <div class="containerLogin">
      <h2 class="titleLogin" >Correo enviado</h2>
      <form>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <div class="form-group">
          <label>Revisa tu bandeja de entrada y por las dudas en la carpeta de spam ;)</label>
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
