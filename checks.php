<?php

function checkAll($miUsuario){

		$errores = [];

		if (trim($miUsuario["usrName"]) == "")
		{
			$errores[] = "Falta el nombre";
		}
		if (trim($miUsuario["usrSurname"]) == "")
		{
			$errores[] = "Falta el apellido";
		}
		if (trim($miUsuario["pass"]) == "")
		{
			$errores[] = "Falta la pass";
		}
		if (trim($miUsuario["passCheck"]) == "")
		{
			$errores[] = "Falta el cpass";
		}
		if ($miUsuario["pass"] != $miUsuario["passCheck"])
		{
			$errores[] = "Pass y Cpass son distintas";
		}
		if ($miUsuario["email"] == "")
		{
			$errores[] = "Falta el mail";
		}
		if (!filter_var($miUsuario["email"], FILTER_VALIDATE_EMAIL))
		{
			$errores[] = "El mail tiene forma fea";
		}
		return $errores;
	}



/*Como verificar que las passwords sean iguales?
function samePass($pass, $passcheck){
$_REQUEST['usrName'], $_REQUEST['usrSurname'], $_REQUEST['birthDate'], $_REQUEST['radioGenre'], $_REQUEST['email'], $_REQUEST['pass']
  return $passcheck == $pass;
}

 PENDIENTE CON REGEX = CAOS
function checkdate($birthDate){

}
*/


 ?>
