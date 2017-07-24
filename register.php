<?php

require_once "checks.php";
require_once "users.php";

//Inicializar el usuario

$completed = isset($_POST);

if ($completed) {
  echo "puto";
  if (empty($errores)){
    $result = saveUser($_REQUEST['usrName'], $_REQUEST['usrSurname'], $_REQUEST['birthDate'], $_REQUEST['radioGenre'], $_REQUEST['email'], $_REQUEST['pass']);

    if (is_array($result) && ! empty($result)) {
        echo "Dummie!";
      }
    else {
        echo "Saved. Awesome!";
      }
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
    <title class="titleLink">El Baul Dorado - Register</title>
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
            <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Registrate </a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Ingresa </a></li>
          </ul>
        </div>

      </div>

    </nav>

    <div class="containerRegister">

      <h2 class="titleRegister">Registrate</h2>
      <form action="register.php" method="post" enctype="multipart/form-data" class="formRegister">
        <p>Por favor completa los datos a continuacion:</p>
        <?php
            if (count($errors)) {
                var_dump($errors);
            }
        ?>
        <p><strong class="red">*</strong> campos obligatorios</p>

        <div class="form-group">

          <label for="usrName">Nombre:<strong class="red">*</strong></label>
          <input type="text" name="usrName" class="form-control" id="usrNname" >
          <span style='color:red' class="error">
            <?php
            if(isset($errors["usrName"])) {
              echo "El nombre ingresado no es válido";
            }
             ?>
          </span>
        </div>

        <div class="form-group">
          <label for="usrSurname">Apellido:<strong class="red">*</strong></label>
          <input type="text" name="usrSurname" class="form-control" id="usrSurname" >
          <span style='color:red' class="error">
            <?php
            if(isset($errors["usrSurname"])) {
              echo "El apellido ingresado no es válido";
            }
             ?>
          </span>
        </div>

        <div class="form-group">
          <label for="birthDate" class="control-label">Fecha de Nacimiento:</label>
          <div>
              <input type="date" id="birthDate" name="birthDate" class="form-control">
              <span style='color:red' class="error">
                <?php
                if(isset($errors["birthDate"])) {
                  echo "La fecha ingresada no es válida";
                }
                 ?>
              </span>
          </div>
        </div>

        <div class="form-group">
          <label for="radioGenre">Género:<strong class="red">*</strong></label>
          <div>
            <label class="genre"><input type="radio" name="radioGenre" value="Mujer" required>Mujer</label>
            <label class="genre"><input type="radio" name="radioGenre" value="Hombre">Hombre</label>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email:<strong class="red">*</strong></label>
          <input type="email" name="email" class="form-control" id="email" placeholder="ejemplo@elbauldorado.com" name="email">
          <span style='color:red' class="error">
            <?php
            if(isset($errors["email"])) {
              echo "El email ingresado no es válido";
            }
             ?>
          </span>
        </div>

        <div class="form-group">
          <label for="pass">Contraseña:<strong class="red">*</strong></label>
          <input type="password" name="pass" class="form-control" id="pass" placeholder="*******">
          <span style='color:red' class="error">
            <?php
            if(isset($errors["pass"])) {
              echo "La contraseña ingresada no es válida";
            }
             ?>
          </span>
        </div>

        <div class="form-group">
          <label for="passCheck">Confirmar Contraseña:<strong class="red">*</strong></label>
          <input type="password" name="passCheck" class="form-control" id="passCheck" placeholder="*******">
          <span style='color:red' class="error">
            <?php
            if(isset($errors["passCheck"])) {
              echo "La contraseña ingresada no es válida";
            }
             ?>
          </span>
        </div>

        <div class="form-gruop">
          <label for="avatar">Foto de Perfil</label>
          <input type="file" name="avatar">
        </div>
        <br>

          <button type="submit" class="btn btn-default">Confirmar</button>
      </form>
    </div>

    <footer class="footerMain">
      <ul class="footerUl">
        <li>Gracias!</li>
      </ul>
    </footer>

  </body>
</html>
