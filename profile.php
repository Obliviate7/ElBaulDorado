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
    <title class="titleLink">El Baul Dorado - Profile</title>
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
                        echo '<a class="logButtons " href="logOut.php"><span class="logButtons glyphicon glyphicon-user"></span>Deslogear</a>';
                   } else {
                      echo '<a class="logButtons" href="register.php"><span class="logButtons glyphicon glyphicon-user"></span>Registrate</a>';
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
                     echo'<a class="logButtons" href="login.php" ><span class="logButtons glyphicon glyphicon-log-in"></span>Login</a>';
                     }
                  ?>
              </li>
              </span>
              </ul>
            </div>
          </div>
        </nav>
    <div class="containerRegister">
      <h2 class="titleRegister">Modifica tus datos de perfil</h2>
      <form action="register.php" method="post" enctype="multipart/form-data" class="formRegister">
      <input type='hidden' name='submitted' id='submitted' value='1'/>
      <p>Cambia los datos que desees a continuacion:</p>
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

        <div class="form-group">
          <label for="country">Pais:</label>
          <select name="country" class="form-control" id="country">
              <option value="afganistan">Afganistán</option>
              <option value="albania">Albania</option>
              <option value="alemania">Alemania</option>
              <option value="andorra">Andorra</option>
              <option value="angola">Angola</option>
              <option value="antigua y barbuda">Antigua y Barbuda</option>
              <option value="arabia saudita">Arabia Saudita</option>
              <option value="argelia">Argelia</option>
              <option value="argentina">Argentina</option>
              <option value="armenia">Armenia</option>
              <option value="australia">Australia</option>
              <option value="austria">Austria</option>
              <option value="azerbaiyan">Azerbaiyán</option>
              <option value="bahamas">Bahamas</option>
              <option value="banglades">Bangladés</option>
              <option value="barbados">Barbados</option>
              <option value="barein">Baréin</option>
              <option value="belgica">Bélgica</option>
              <option value="belice">Belice</option>
              <option value="benin">Benín</option>
              <option value="bielorrusia">Bielorrusia</option>
              <option value="birmania">Birmania</option>
              <option value="bolivia">Bolivia</option>
              <option value="bosnia-herzegovina">Bosnia-Herzegovina</option>
              <option value="botsuana">Botsuana</option>
              <option value="brasil">Brasil</option>
              <option value="brunei">Brunéi</option>
              <option value="bulgaria">Bulgaria</option>
              <option value="burkina faso">Burkina Faso</option>
              <option value="burundi">Burundi</option>
              <option value="butan">Bután</option>
              <option value="cabo verde">Cabo Verde</option>
              <option value="camboya">Camboya</option>
              <option value="camerun">Camerún</option>
              <option value="canada">Canadá</option>
              <option value="catar">Catar</option>
              <option value="chad">Chad</option>
              <option value="chile">Chile</option>
              <option value="china">China</option>
              <option value="chipre">Chipre</option>
              <option value="colombia">Colombia</option>
              <option value="comoras">Comoras</option>
              <option value="congo">Congo</option>
              <option value="corea del norte">Corea del Norte</option>
              <option value="corea del sur">Corea del Sur</option>
              <option value="costa de marfil">Costa de Marfil</option>
              <option value="costa rica">Costa Rica</option>
              <option value="croacia">Croacia</option>
              <option value="cuba">Cuba</option>
              <option value="dinamarca">Dinamarca</option>
              <option value="dominica">Dominica</option>
              <option value="ecuador">Ecuador</option>
              <option value="egipto">Egipto</option>
              <option value="el salvador">El Salvador</option>
              <option value="emiratos arabes unidos">Emiratos Árabes Unidos</option>
              <option value="eritrea">Eritrea</option>
              <option value="eslovaquia">Eslovaquia</option>
              <option value="eslovenia">Eslovenia</option>
              <option value="españa">España</option>
              <option value="estados unidos">Estados Unidos</option>
              <option value="estonia">Estonia</option>
              <option value="etiopia">Etiopía</option>
              <option value="filipinas">Filipinas</option>
              <option value="finlandia">Finlandia</option>
              <option value="fiyi">Fiyi</option>
              <option value="francia">Francia</option>
              <option value="gabon">Gabón</option>
              <option value="gambia">Gambia</option>
              <option value="georgia">Georgia</option>
              <option value="ghana">Ghana</option>
              <option value="granada">Granada</option>
              <option value="grecia">Grecia</option>
              <option value="guatemala">Guatemala</option>
              <option value="guinea">Guinea</option>
              <option value="guinea ecuatorial">Guinea Ecuatorial</option>
              <option value="guinea-bisau">Guinea-Bisáu</option>
              <option value="guyana">Guyana</option>
              <option value="haiti">Haití</option>
              <option value="honduras">Honduras</option>
              <option value="hungria">Hungría</option>
              <option value="india">India</option>
              <option value="indonesia">Indonesia</option>
              <option value="irak">Irak</option>
              <option value="iran">Irán</option>
              <option value="irlanda">Irlanda</option>
              <option value="islandia">Islandia</option>
              <option value="islas marshall">Islas Marshall</option>
              <option value="islas salomon">Islas Salomón</option>
              <option value="israel">Israel</option>
              <option value="italia">Italia</option>
              <option value="jamaica">Jamaica</option>
              <option value="japon">Japón</option>
              <option value="jordania">Jordania</option>
              <option value="kazajistan">Kazajistán</option>
              <option value="kenia">Kenia</option>
              <option value="kirguistan">Kirguistán</option>
              <option value="kiribati">Kiribati</option>
              <option value="kosovo">Kosovo</option>
              <option value="kuwait">Kuwait</option>
              <option value="laos">Laos</option>
              <option value="lesoto">Lesoto</option>
              <option value="letonia">Letonia</option>
              <option value="libano">Líbano</option>
              <option value="liberia">Liberia</option>
              <option value="libia">Libia</option>
              <option value="liechtenstein">Liechtenstein</option>
              <option value="lituania">Lituania</option>
              <option value="luxemburgo">Luxemburgo</option>
              <option value="macedonia">Macedonia</option>
              <option value="madagascar">Madagascar</option>
              <option value="malasia">Malasia</option>
              <option value="malaui">Malaui</option>
              <option value="maldivas">Maldivas</option>
              <option value="mali">Malí</option>
              <option value="malta">Malta</option>
              <option value="marruecos">Marruecos</option>
              <option value="mauricio">Mauricio</option>
              <option value="mauritania">Mauritania</option>
              <option value="mexico">México</option>
              <option value="micronesia">Micronesia</option>
              <option value="moldavia">Moldavia</option>
              <option value="monaco">Mónaco</option>
              <option value="mongolia">Mongolia</option>
              <option value="montenegro">Montenegro</option>
              <option value="mozambique">Mozambique</option>
              <option value="namibia">Namibia</option>
              <option value="nauru">Nauru</option>
              <option value="nepal">Nepal</option>
              <option value="nicaragua">Nicaragua</option>
              <option value="niger">Níger</option>
              <option value="nigeria">Nigeria</option>
              <option value="noruega">Noruega</option>
              <option value="nueva zelanda">Nueva Zelanda</option>
              <option value="oman">Omán</option>
              <option value="paises bajos">Países Bajos</option>
              <option value="pakistan">Pakistán</option>
              <option value="palaos">Palaos</option>
              <option value="palestina">Palestina</option>
              <option value="panama">Panamá</option>
              <option value="papua nueva guinea">Papúa Nueva Guinea</option>
              <option value="paraguay">Paraguay</option>
              <option value="peru">Perú</option>
              <option value="polonia">Polonia</option>
              <option value="portugal">Portugal</option>
              <option value="reino unido">Reino Unido</option>
              <option value="republica centroafricana">República Centroafricana</option>
              <option value="republica checa">República Checa</option>
              <option value="republica democratica del congo">República Democrática del Congo</option>
              <option value="republica dominicana">República Dominicana</option>
              <option value="ruanda">Ruanda</option>
              <option value="rumania">Rumania</option>
              <option value="rusia">Rusia</option>
              <option value="samoa">Samoa</option>
              <option value="san cristobal y nieves">San Cristóbal y Nieves</option>
              <option value="san marino">San Marino</option>
              <option value="san vicente y las granadinas">San Vicente y las Granadinas</option>
              <option value="santa lucia">Santa Lucía</option>
              <option value="santo tome y principe">Santo Tomé y Príncipe</option>
              <option value="senegal">Senegal</option>
              <option value="serbia">Serbia</option>
              <option value="seychelles">Seychelles</option>
              <option value="sierra leona">Sierra Leona</option>
              <option value="singapur">Singapur</option>
              <option value="siria">Siria</option>
              <option value="somalia">Somalia</option>
              <option value="sri lanka">Sri Lanka</option>
              <option value="suazilandia">Suazilandia</option>
              <option value="sudafrica">Sudáfrica</option>
              <option value="sudan">Sudán</option>
              <option value="sudan del sur">Sudán del Sur</option>
              <option value="suecia">Suecia</option>
              <option value="suiza">Suiza</option>
              <option value="surinam">Surinam</option>
              <option value="tailandia">Tailandia</option>
              <option value="taiwan">Taiwán</option>
              <option value="tanzania">Tanzania</option>
              <option value="tayikistan">Tayikistán</option>
              <option value="timor oriental">Timor Oriental</option>
              <option value="togo">Togo</option>
              <option value="tonga">Tonga</option>
              <option value="trinidad y tobago">Trinidad y Tobago</option>
              <option value="tunez">Túnez</option>
              <option value="turkmenistan">Turkmenistán</option>
              <option value="turquia">Turquía</option>
              <option value="tuvalu">Tuvalu</option>
              <option value="ucrania">Ucrania</option>
              <option value="uganda">Uganda</option>
              <option value="uruguay">Uruguay</option>
              <option value="uzbekistan">Uzbekistán</option>
              <option value="vanuatu">Vanuatu</option>
              <option value="vaticano">Vaticano</option>
              <option value="venezuela">Venezuela</option>
              <option value="vietnam">Vietnam</option>
              <option value="yemen">Yemen</option>
              <option value="yibuti">Yibuti</option>
              <option value="zambia">Zambia</option>
              <option value="zimbabue">Zimbabue</option>
          </select>
        </div>

        <div class="form-group">
          <label for="city">Ciudad:</label>
          <input type="text" class="form-control" id="city" >
        </div>

        <div class="form-group">
          <label for="clothes">Tipo de ropa favorita:</label>
              <input type="checkbox" class="form-control" name="clothes1" value="casual"> Casual
              <input type="checkbox" class="form-control" name="clothes2" value="urban">  Urbana
              <input type="checkbox" class="form-control" name="clothes2" value="formal"> Formal
              <input type="checkbox" class="form-control" name="clothes2" value="dress">  Vestidos
              <input type="checkbox" class="form-control" name="clothes2" value="pants">  Pantalones
              <input type="checkbox" class="form-control" name="clothes2" value="shirt">  Camisetas
              <input type="checkbox" class="form-control" name="clothes2" value="beach">  Playa
              <input type="checkbox" class="form-control" name="clothes2" value="man">    Hombre
              <input type="checkbox" class="form-control" name="clothes2" value="woman">  Mujer
        </div>

        <div class="form-group">
          <label for="phone">Telefono:</label>
          <input type="text" class="form-control" id="phone" >
        </div>

        <div class="form-group">
          <label for="addressStreet">Direccion - calle:</label>
          <input type="text" class="form-control" id="addressStreet" >
        </div>

        <div class="form-group">
          <label for="addressNumber">Direccion - altura:</label>
          <input type="text" class="form-control" id="addressNumber" >
        </div>

        <div class="form-group">
          <label for="addressFloor">Direccion - piso:</label>
          <input type="text" class="form-control" id="addressFloor" >
        </div>

        <div class="form-group">
          <label for="addressDepart">Direccion - departamento:</label>
          <input type="text" class="form-control" id="addressDepart" >
        </div>

        <div class="form-group">
          <label for="addressZip">Direccion - codigo postal:</label>
          <input type="text" class="form-control" id="addressZip" >
        </div>

        <div class="form-group">
          <label for="addressNeig">Direccion - barrio:</label>
          <input type="text" class="form-control" id="addressNeig" >
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
