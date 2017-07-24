
<?php

function saveUser($usrName, $usrSurname, $birthDate, $radioGenre, $email, $pass, $photo) {

    $pass = sha1($pass);

    // Transformarlo a json
  $jsonUser = json_encode([
      'name'      => $usrName,
      'surname'   => $usrSurname,
      'birthDate' => $birthDate,
      'genre'     => $radioGenre,
      'email'     => $email,
      'password'  => $pass,
      'avatar'    => uploadPhoto($photo)
  ]);

  if (writeUserFile($jsonUser)) {
    return true;
  }
  else {
    return false;
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
