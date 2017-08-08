<?php
    session_start();
    require_once "users.php";
?>

prueba
<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Playfair+Display:i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>El Baul Dorado - FAQ'S</title>
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
    <div class="containerFaqs">
      <h2 class="titleFaqs">FAQ'S</h2>
      <p>Tienes preguntas? aca te respondemos las mas frecuentes, si no encuentras tu pregunta aca, envianos un mail a "consultas@elbauldorado.com"</p>
      <div class="panel-group" id="accordion">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">1) Quiero vender, Como puedo publicar?</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">Es muy facil, tienes que seguir los siguientes pasos:
              <ol>
                <li>Seleccionar la ropa que quieras enviar, tiene que estar limpia y en perfectas condiciones.</li>
                <li>Enviarnos un correo a “publicaciones@elbauldorado.com” con fotos de cada prenda individualmente por frente y por detrás, y  con el precio que pienses que es adecuado por cada prenda.</li>
                <li>Te enviaremos un correo en las próximas 24 horas con nuestros comentarios acerca del precio y de las condiciones de las prendas.</li>
                <li>Cuando estés de acuerdo con los comentarios enviados, envías la ropa por OCA o la podes dejar en nuestro depósito por Cabildo y Juramento (CABA).</li>
                <li>En 5 días publicamos la ropa en nuestro portal.</li>
                <li>Cuando tu ropa se venda tendrás tu dinero en las próximas 12 horas siguientes, por el método que elijas previamente (efectivo, transferencia bancaria, mercado pago.)</li>
              <ol>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">2) Quiero vender, Donde se puede dejar la ropa?</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">Por OCA o dejarla en nuestro depósito por Cabildo y Juramento (barrio Belgrano, CABA).</div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">3) Quiero comprar, Donde puedo retirar la ropa?</a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">Te las podemos enviar por OCA o la podes retirar por nuestro deposito en Cabildo y Juramento (barrio Belgrano, CABA).</div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">4) Quiero comprar, Qué métodos de pago se ofrecen?</a>
            </h4>
          </div>
          <div id="collapse4" class="panel-collapse collapse">
            <div class="panel-body">Transferencia bancaria, pagofacil o MercadoPago.</div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">5) Quiero comprar, puedo cambiar alguna prenda ya comprada?</a>
            </h4>
          </div>
          <div id="collapse5" class="panel-collapse collapse">
            <div class="panel-body">Ya que nuestra plataforma funciona como intermediaria entre dos partes no hacemos reembolsos.</div>
          </div>
        </div>
      </div>
    </div>

    <footer class="footerMain">
      <ul class="footerUl">
        <li>2017</li>
      </ul>
    </footer>

  </body>
</html>
