<?php
  session_start();
  require_once "users.php";
  $errorDeDatos = "";

/*si esta iniciada la sesion se redirige al home*/
  if (!(isset($_SESSION['email']))){
  }  else{
    header('Location: index.php');
  }

/*comparacion de mail y pass para logearse*/
  if (isset($_REQUEST['submitted']) && $_REQUEST['submitted'] == 1) {
    $login = loginUser($_REQUEST['email'], $_REQUEST['password'] );
    if ($login) {
      header('Location: welcome.php');
      $_SESSION['email'] = $_REQUEST['email'];
      $userLogIn = $_SESSION['email'] ;
      $errorDeDatos = "";
    } else {
      $errorDeDatos = "DATOS INCORRECTOS";
    }
  }

?>
<?php include("header.php"); ?>

    <div class="containerLogin">
      <h2 class="titleLogin" >Ingresa tus datos</h2>
      <form class="formLogin" action="login.php" method='post' enctype="multipart/form-data">
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value=''>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
        <div>
          <?php
            echo $errorDeDatos;
          ?>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
        <div class="forgot">
            <a href="forgotPassword.php" class="buttonForgotPassword">Olvidé mi contraseña</a>
        </div>
        <button type="submit" class="btn btn-default" value='Enviar'>Submit</button>
      </form>
    </div>

    <footer class="footerMain">
      <ul class="footerUl">
        <li>2017</li>
      </ul>
    </footer>

  </body>
</html>
