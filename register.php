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

<?php include("header.php"); ?>
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
