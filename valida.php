<?php
session_start();
include 'conexao.php';
include_once("conexao2.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = SHA1(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

	if((!empty($email)) AND (!empty($senha))){

	$query = "select * from usuario where email = '$email' and senha = '$senha'";
	$result = mysqli_query($conexao, $query);
	$row = mysqli_num_rows($result);
	if($row == 1) {
	$_SESSION['usuario'] = $email;

	$sql = "INSERT INTO datas SET data = CURRENT_DATE(), email = '$_SESSION[usuario]', hora = CURRENT_TIME()";
	$sql = $pdo->query($sql);
	header('Location: index.php');
	} else {
	$_SESSION['nao_autenticado'] = true;
	$_SESSION['msg'] = "<h1 style='border:2px solid #F9360E;text-align:center;padding:10px 0 10px 0;background-color:#161C08;;font-weight: bold;font-size:18px;color:#F9360E;margin-top:-50px;margin-bottom:50px;'>Login ou senha incorreto!</h1>";
	header('Location: login.php');
	}

	exit;
}

}?>
