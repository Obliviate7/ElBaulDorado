
<?php
  session_start();
  session_destroy();
  /*si no esta iniciada la sesion se redirige al home*/
    if (isset($_SESSION['email'])){
    }  else{
      header('Location: index.php');
    }
?>
<?php include("header.php"); ?>
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
