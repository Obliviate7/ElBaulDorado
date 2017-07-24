
<?php

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
?>
