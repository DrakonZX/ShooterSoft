<?php
include 'valida.php';
include 'conexao.php';
$sql = "select * from usuario where id='$_GET[id]'";
$sql = $pdo->query($sql);
  if ($sql->rowCount()>0) {
    foreach ($sql ->fetchAll() as $u) {
      $sql = "DELETE FROM soma_total WHERE cliente_id='$_GET[id]'";
      $sql = $pdo->query($sql);
      if ($sql->rowCount()>0) {
        $sql = "DELETE FROM carrinho WHERE cliente_id='$_GET[id]'";
        $sql = $pdo->query($sql);
        if ($sql->rowCount()>0) {
          $loca = " Cidade: ".$u['cidade'].",  Estado: ".$u['uf'].",  Endereço: ".$u['endereco'].",  Número: ".$u['num'].",  no Bairro: ".$u['bairro'];
          echo "<h1>Sua compra foi enviada para: .$loca.</h1>";
        }
      }
    }
  }
 ?>
