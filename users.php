<?php
require_once "checks.php";

function saveUser($usrName,$usrSurname, $birthDate, $radioGenre, $email, $pass) {

  $errores= checkUser($usrName,$usrSurname, $birthDate, $radioGenre, $email, $pass);

  if(empty($errors)) {
    $pass = sha1($pass);

    $jsonUser = json_encode ([
      "usrName"     => $usrName,
      "usrSurname"  => $usrSurname,
      "birthDate"   => $birthDate,
      "radioGenre"  => $radiogenre,
      "email"       => $email,
      "pass"        => $pass
    ]);

    $fp = fopen("users.json", "a+");
    echo ($fp);

    $result = fwrite($fp, $jsonUser . PHP_EOL);

    return $result;
  } else {

    return $errors;
  }

}


 ?>
