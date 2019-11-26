<?php
  $dns = "mysql:dbname=login;host=localhost";
  $dbuser = "root";
  $dbpass = "";


  try {
    $pdo = new PDO($dns,$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  } catch (PDOException $e) {
    echo "Falha na Conexão";
  }

 ?>