<?php
  include_once("valida.php");
  include_once("conexao.php");

  if(isset($_GET['id']) && empty($_GET['id']) == false)
  {
  $id = addslashes($_GET['id']);
  $sql = "SELECT * FROM usuario WHERE id='$id'";
  $sql = $pdo->query($sql);
  foreach($sql -> fetchAll() as $usuario) {
    $sql = "INSERT INTO datas SET data = CURRENT_DATE(), email = '$usuario[email]', hora = CURRENT_TIME(), estado = '3'";
    $sql = $pdo->query($sql);
  }
  }
  unset($_SESSION['usuario']);
  session_destroy();
  header("Location: index.php");
?>
