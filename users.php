<?php
require_once "checks.php";

/*funcion para salvar usuario en json*/
function saveUser($usrName, $usrSurname, $birthDate, $radioGenre, $email, $pass, $pass2, $photo) {
  $errors = checkUser($usrName,$usrSurname, $email, $pass, $pass2);
    if (empty($errors)) {
        $pass = sha1($pass);

        // Transformarlo a json
        $jsonUser = json_encode([
        'name'      => $usrName,
        'surname'   => $usrSurname,
        'birthDate' => $birthDate,
        'genre'     => $radioGenre,
        'email'     => $email,
        'password'  => $pass
        ]);
        if (writeUserFile($jsonUser)) {
          uploadPhoto($photo);
        }
        return $result;
      } else {
      return $errors;
    }
  }

/*funcion para escribir usuario en json*/
  function writeUserFile($jsonUser2) {
    $fp = fopen("users.json", "a+");
    $result = fwrite($fp, $jsonUser2 . PHP_EOL);
    return $result;
  }

/*funcion para buscar mail y pass registrado*/
function loginUser($email, $password)
{
  $password = sha1($password);
  $fp = fopen('users.json', 'r');
  while ($line = fgets($fp)) {
    if (!empty($line)) {
      $line = json_decode($line, true);
      if (($line['email'] == $email) && ($line['password'] == $password)) {
        return $line;
      }
    }
  }
  return false;
}

/*funcion para buscar mail registrado*/
function searchUser($email)
{
  $fp = fopen('users.json', 'r');
  while ($line = fgets($fp)) {
    if (!empty($line)) {
      $line = json_decode($line, true);
      if ($line['email'] == $email) {
        return $line;
      }
    }
  }
  return false;
}

/*funcion para checkear usuario*/
  function checkUser($usrName,$usrSurname, $email, $pass, $pass2) {
    $errors = [];
    if (! checkNameSurname($usrName)){
      $errors["usrName"] = "El nombre es inválido";
    }
    if (! checkNameSurname($usrSurname)) {
      $errors["usrSurname"] = "El apellido es inválido";
    }
    if (! checkEmail($email)) {
      $errors["email"] = "El email ingresado no es válido";
    }
    if (! checkPass($pass)) {
      $errors["pass"] = "El password ingresado no es válido";
    }
    if (! checkPass2($pass, $pass2)) {
      $errors["pass2"] = "El password no coincide";
    }
    return $errors;
  }

function uploadPhoto($photo){
  if (count($photo)) {
      $avatarFileName = $photo['name'];
      $avatarFile = $photo['tmp_name'];
      $avatarExtension = pathinfo($avatarFileName, PATHINFO_EXTENSION);
      $hash= sha1($user['username']);
      $result = move_uploaded_file($avatarFile, 'avatars/' . $hash . '.' . $avatarExtension);
      $arch= $hash.".".$avatarExtension;
       return $arch;
  }
  else {
    return "";
  }
}


?>
