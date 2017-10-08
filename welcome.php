
<?php
  session_start();
  require_once "users.php";

/*si no esta iniciada la sesion se redirige al home*/
  if (isset($_SESSION['email'])){
  }  else{
    header('Location: index.php');
  }
?>
<?php include("header.php"); ?>
    <div class="containerLogin">
      <h2 class="titleLogin" >Bienvenido!</h2>
      <form class="formLogin" action="login.php" method='post' enctype="multipart/form-data">
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <div class="form-group">
          <label > <?php echo "Bienvenido a nuestra pagina "; echo $_SESSION['email'];  ?>  </label>
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
