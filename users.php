
<?php
require_once "checks.php";

function saveUser($usrName, $usrSurname, $birthDate, $radioGenre, $email, $pass) {

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
var_dump($jsonUser);
  if (writeUserFile($jsonUser)) {
    uploadPhoto($photo);
    return $result;
  }
  else {
    return $errors;
  }
  }

  function writeUserFile($jsonUser) {
  $fp = fopen("users.json", "a+");

  $result = fwrite($fp, $jsonUser . PHP_EOL);

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


function checkUser($usrName,$usrSurname, $email, $pass) {

 $errors = [];

 if (! checkNameSurname($usrName, 2)){
   $errors["usrName"] = "El nombre es inválido";
 }
 if (! checkNameSurname($usrName, 2)) {
   $errors["usrSurname"] = "El apellido es inválido";
 }
 if (! checkEmail($email)) {
   $errors["email"] = "El email ingresado no es válido";
 }
 if (! checkPass($pass)) {
   $errors["pass"] = "El password ingresado no es válido";
 }
 return $errors;
}


function uploadPhoto($foto){
  if (count($photo)) {
      $avatarFileName = $photo['name'];
      $avatarFile = $photo['tmp_name'];
      $avatarExtension = pathinfo($avatarFileName, PATHINFO_EXTENSION);

      $result = move_uploaded_file($avatarFile, 'avatars/' . sha1($user['username']) . '.' . $avatarExtension);
  }
  return $resultado;
}


?>
