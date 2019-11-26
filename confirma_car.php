<?php
include_once("conexao.php");
include_once("valida.php");

if(isset($_SESSION['usuario'])){
    header('Location: carrinho.php');
}else{
    header('Location: carrinho-semconta.php');
}
?>