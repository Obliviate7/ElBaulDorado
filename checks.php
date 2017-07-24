<?php

function checkNameSurname($nameSurname, $minlength){
  $nameSurname = trim($nameSurname);

  return ! empty($nameSurname) && ctype_alpha($nameSurname)
  && (strlen($nameSurname) > $minlength && strlen($nameSurname) < 20);
}

function checkEmail($email){
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function checkPass($pass){
  $pass = trim($pass);
  return ! empty($pass) && strlen($pass) > 7  && ! preg_match("/[0-9]+/i", $pass);
}

/*Como verificar que las passwords sean iguales?
function samePass($pass, $passcheck){

  return $passcheck == $pass;
}

 PENDIENTE CON REGEX = CAOS
function checkdate($birthDate){

}
*/


 ?>
