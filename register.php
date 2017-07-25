<?php
  session_start();
require_once "checks.php";
require_once "users.php";

/*si esta iniciada la sesion se redirige al home*/
  if (!(isset($_SESSION['email']))){
  }  else{
    header('Location: index.php');
  }

//Inicializar el usuario

$completed = isset($_REQUEST['submitted']);

if ($completed) {
    $result = saveUser($_REQUEST['usrName'], $_REQUEST['usrSurname'], $_REQUEST['birthDate'], $_REQUEST['radioGenre'], $_REQUEST['email'], $_REQUEST['pass'], $_REQUEST['passCheck'], $_FILES['avatar']);
    if (is_array($result) && ! empty($result)) {
        }
    else {
        header('Location: registerOk.php');
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
                <span>
                <li>
                   <?php
                   /*si esta iniciada la sesion muestra el deslogear, si no el register*/
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
                  /*si esta iniciada la sesion muestra el mail, si no el login*/
                  if (isset($_SESSION['email'])) {
                     echo $_SESSION['usrName'];
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

      <h2 class="titleRegister">Registrate</h2>
      <form action="register.php" method="post" enctype="multipart/form-data" class="formRegister">
      <input type='hidden' name='submitted' id='submitted' value='1'/>
      <p>Por favor completa los datos a continuacion:</p>

        <p><strong class="red">*</strong> campos obligatorios</p>

        <div class="form-group">

          <label for="usrName">Nombre:<strong class="red">*</strong></label>
          <input type="text" name="usrName" class="form-control" id="usrNname"  value=
          <?php if ($completed) {
            echo $_REQUEST['usrName'];
          }else{
            echo"";
          }
            ?>>
          <span style='color:red' class="error">
            <?php
            if(isset($result["usrName"])) {
              echo "El nombre ingresado no es válido";
            }
             ?>
          </span>
        </div>

        <div class="form-group">
          <label for="usrSurname">Apellido:<strong class="red">*</strong></label>
          <input type="text" name="usrSurname" class="form-control" id="usrSurname"
          value=
         <?php if ($completed) {
           echo $_REQUEST['usrSurname'];
         }else{
           echo"";
         }
           ?>
           >
          <span style='color:red' class="error">
            <?php
            if(isset($result["usrSurname"])) {
              echo "El apellido ingresado no es válido";
            }
             ?>
          </span>
        </div>

        <div class="form-group">
          <label for="birthDate" class="control-label">Fecha de Nacimiento:</label>
          <div>
              <input type="date" id="birthDate" name="birthDate" class="form-control"

              value=
             <?php if ($completed) {
               echo $_REQUEST['birthDate'];
             }else{
               echo"";
             }
               ?>

               >
              <span style='color:red' class="error">
                <?php
                if(isset($result["birthDate"])) {
                  echo "La fecha ingresada no es válida";
                }
                 ?>
              </span>
          </div>
        </div>

        <div class="form-group">
          <label for="genre">Género:<strong class="red">*</strong></label>
          <div>
            <label class="genre"><input type="radio" name="radioGenre" value="Mujer" required checked="checked">Mujer</label>
            <label class="genre"><input type="radio" name="radioGenre" value="Hombre">Hombre</label>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email:<strong class="red">*</strong></label>
          <input type="email" name="email" class="form-control" id="email" placeholder="ejemplo@elbauldorado.com" name="email"
          value=
         <?php if ($completed) {
           echo $_REQUEST['email'];
         }else{
           echo"";
         }
           ?>
          >
          <span style='color:red' class="error">
            <?php
            if (isset($result["email"])) {
              echo "El email ingresado no es valido";
            }
             ?>
          </span>
        </div>

        <div class="form-group">
          <label for="pass">Contraseña:<strong class="red">*</strong></label>
          <input type="password" name="pass" class="form-control" id="pass" placeholder="*******">
          <span style='color:red' class="error">
            <?php
            if(isset($result["pass"])) {
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
            if(isset($result["passCheck"])) {
              echo "La contraseña no coincide";
            }
             ?>
          </span>
        </div>

        <div class="form-gruop">
          <label for="avatar">Foto de Perfil</label>
          <input type="file" name="avatar">
        </div>
        <br>

          <button type="submit" class="btn btn-default" value='Enviar'>Confirmar</button>
      </form>
    </div>

    <footer class="footerMain">
      <ul class="footerUl">
        <li>Gracias!</li>
      </ul>
    </footer>

  </body>
</html>
