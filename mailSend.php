
<?php
  session_start();

  /*si esta iniciada la sesion se redirige al home*/
    if (!(isset($_SESSION['email']))){
    }  else{
      header('Location: index.php');
    }
?>
<?php include("header.php"); ?>
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
