<?php

  $dsn = 'mysql:host=localhost;dbname=el_baul_dorado;
  charset=utf8mb4;port=3306';
  $user ="root";
  $pass = "root";

  try {
    $this->conn = new PDO($dsn, $user, $pass);
  } catch (Exception $e) {
    echo "La conexion a la base de datos falló: " . $e->getMessage();
  }
  }



 ?>
