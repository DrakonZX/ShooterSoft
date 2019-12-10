<?php
  include 'valida.php';
  include 'conexao.php';
  if (isset($_GET['id'])) {
    $sql = "DELETE FROM soma_total WHERE cliente_id='$_GET[id]'";
    $sql = $pdo->query($sql);
    if ($sql->rowCount()>0) {
      $sql = "DELETE FROM carrinho WHERE cliente_id='$_GET[id]'";
      $sql = $pdo->query($sql);
      if ($sql->rowCount()>0) {
      header("Location: index.php");
    }
   }
  }
 ?>
