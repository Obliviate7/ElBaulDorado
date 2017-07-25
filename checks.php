<?php

function checkNameSurname($nameSurname){
  $nameSurname = trim($nameSurname);

  return ! empty($nameSurname) && ctype_alpha($nameSurname)
  && (strlen($nameSurname) > 2 && strlen($nameSurname) < 20);
}

function checkEmail($email){
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function checkPass($pass){
  $pass = trim($pass);
  return ! empty($pass) && strlen($pass) > 7;
}

function checkPass2($pass, $pass2){
  return $pass==$pass2;
}

/*Each $_POST variable with be checked by the function*/
function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}

 ?>
