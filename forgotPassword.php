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
<?php include("header.php"); ?>
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
