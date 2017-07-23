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
      <h2 class="titleRegister">Perfil</h2>
      <form class="formRegister">
        <p>En esta seccion puedes modificar los datos
        de usuario con los que te registraste:</p>

        <div class="form-group">
          <label for="usr">Nombre:</label>
          <input type="text" class="form-control" id="usr" >
        </div>

        <div class="form-group">
          <label for="usrsurname">Apellido:</label>
          <input type="text" class="form-control" id="usrsurname" >
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="ejemplo@elbauldorado.com" name="email">
        </div>

        <div class="form-group">
          <label for="pwd">Contraseña:</label>
          <input type="password" class="form-control" id="pwd" placeholder="*******">
        </div>

        <div class="form-group">
          <label for="pwdcheck">Confirmar Contraseña:</label>
          <input type="password" class="form-control" id="pwdcheck" placeholder="*******">
        </div>

        <div class="form-group">
          <label for="birthDate" class="control-label">Fecha de Nacimiento:</label>
          <div>
              <input type="date" id="birthDate" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label for="genre">Género:</label>
          <div>
            <label class="genre"><input type="radio" name="optradio">Mujer</label>
            <label class="genre"><input type="radio" name="optradio">Hombre</label>
          </div>
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
        <li>2017</li>
      </ul>
    </footer>

  </body>
</html>
