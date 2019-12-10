<?php
include_once('conexao.php');

session_start();
ob_start();
//recebendo os dados
$button = filter_input(INPUT_POST, 'button', FILTER_SANITIZE_STRING);
if($button){
	include_once 'conexao2.php';
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	$erro = false;

	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);

  // validação da senha
	if((strlen($dados['senha'])) < 6){
		$erro = true;
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' style='border:2px solid #F9360E;text-align:center;padding:10px 0 10px 0;background-color:#161C08;;font-weight: bold;font-size:18px;color:#F9360E;margin-top:0px;margin-bottom:50px;''>A senha deve ter no minímo 6 caracteres e no maximo 16</div>";

  }
  elseif(strlen($dados['senha']) > 16){
		$erro = true;
    $_SESSION['msg'] = $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' style='border:2px solid #F9360E;text-align:center;padding:10px 0 10px 0;background-color:#161C08;;font-weight: bold;font-size:18px;color:#F9360E;margin-top:0px;margin-bottom:50px;''>A senha nao deve passar de 16 caracteres!</div>";

  }
  elseif($dados['senha'] != $dados['conf_senha']){
      $erro = true;
      $_SESSION['msg'] = $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' style='border:2px solid #F9360E;text-align:center;padding:10px 0 10px 0;background-color:#161C08;;font-weight: bold;font-size:18px;color:#F9360E;margin-top:0px;margin-bottom:50px;''>Senhas diferentes. Tente novamente</div>";

	}elseif(stristr($dados['senha'], "'")) {
    $erro = true;
    $_SESSION['msg'] = $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' style='border:2px solid #F9360E;text-align:center;padding:10px 0 10px 0;background-color:#161C08;;font-weight: bold;font-size:18px;color:#F9360E;margin-top:0px;margin-bottom:50px;''>Caracter ( ' ) utilizado na senha é inválido</div>";

  //verificando se o CEP já foi cadastrado CPF
	}else{
		$result_usuario = "SELECT id FROM usuario WHERE cpf='". $dados['cpf'] ."'";
    $resultado_usuario = mysqli_query($conexao, $result_usuario);

		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "<h2 style='border:2px solid #F9360E;text-align:center;padding:10px 0 10px 0;background-color:#161C08;;font-weight: bold;font-size:18px;color:#F9360E;margin-top:0px;margin-bottom:50px;''>Este CPF já está sendo utilizado</h2>";
		}

    //verificando se o E-mail já foi cadastrado
		$result_usuario = "SELECT id FROM usuario WHERE email='". $dados['email'] ."'";
		$resultado_usuario = mysqli_query($conexao, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "<h2 style='border:2px solid #F9360E;text-align:center;padding:10px 0 10px 0;background-color:#161C08;;font-weight: bold;font-size:18px;color:#F9360E;margin-top:0px;margin-bottom:50px;''>Este E-mail já está cadastrado</h2>";
		}
	}






  //Enviando os dados para o banco
	if(!$erro){

		$dados['senha'] = SHA1($dados['senha']);
		if (isset($_FILES['arquivo'])) {
			$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
			$novo_nome = $dados['cpf'].$extensao;
			$dire = 'perfil/img/';

			move_uploaded_file($_FILES['arquivo']['tmp_name'],$dire.$novo_nome);
			$result_usuario = "INSERT INTO usuario (nome, sobrenome,sem_img, cpf, email, senha, cep, endereco, num, bairro , cidade, uf,refe,comple)
	    VALUES (
							'" .$dados['nome']. "',
	            '" .$dados['sobrenome']. "',
							'perfil/img/sem.png',
	            '" .$dados['cpf']. "',
							'" .$dados['email']. "',
							'" .$dados['senha']. "',
	            '" .$dados['cep']. "',
	            '" .$dados['endereco']. "',
	            '" .$dados['num']. "',
							'" .$dados['bairro']. "',
	            '" .$dados['cidade']. "',
	            '" .$dados['uf']. "',
	            '" .$dados['refe']. "',
							'" .$dados['comple']. "'
							)";

		$sql = "INSERT INTO datas SET data = CURRENT_DATE(), email = '$dados[email]', hora = CURRENT_TIME(), estado = '2'";
		$sql = $pdo->query($sql);
		}
		else {
			$result_usuario = "INSERT INTO usuario (nome, sobrenome,img,sem_img, cpf, email, senha, cep, endereco, num, bairro , cidade, uf,comple,refe)
			VALUES (
							'" .$dados['nome']. "',
							'" .$dados['sobrenome']. "',
							'perfil/img/$dados[cpf].jpg',
							'perfil/img/sem.png',
							'" .$dados['cpf']. "',
							'" .$dados['email']. "',
							'" .$dados['senha']. "',
							'" .$dados['cep']. "',
							'" .$dados['endereco']. "',
							'" .$dados['num']. "',
							'" .$dados['bairro']. "',
							'" .$dados['cidade']. "',
							'" .$dados['uf']. "',
							'" .$dados['refe']. "',
							'" .$dados['comple']. "'
						)";
							$sql = "INSERT INTO datas SET data = CURRENT_DATE(), email = '$dados[email]', hora = CURRENT_TIME(), estado = '2'";
							$sql = $pdo->query($sql);
		}
		$resultado_usario = mysqli_query($conexao, $result_usuario);
		if(mysqli_insert_id($conexao)){
			$_SESSION['msgcad'];
			header("Location: login.php");
		}else{
			$_SESSION['msg'] = "<h2 style='border:2px solid #F9360E;text-align:center;padding:10px 0 10px 0;background-color:#161C08;;font-weight: bold;font-size:18px;color:#F9360E;margin-top:0px;margin-bottom:50px;''>Erro ao cadastrar o usuário</h2>";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
	  <link rel="icon" type="image/png" href="img/logo_veridico.png" sizes="64x64">
		<meta name="viewport" content="width=device-width,inicial-scale=1.0;maximum-scale=1.0">
  <link rel="stylesheet" href="css/cadas.css">
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
  <title>Cadastro - ShooterSoft</title>
</head>
<body>
    <header>
        <div class="cadas">
          <div class="background">
                <div class="img">
    					<div class="respon">
								<a href="index.php"><img src="img/logo_veridico2.png" alt=""></a>
    					</div>
      </div>
          </div>
          <div class="respon">
            <div class="side">
              <div class="cobertura-top">
                <img style="height:150px;" src="img/prancheta.png" alt="">
              </div>
              <h2>Cadastro</h2>
              <?php
		          if(isset($_SESSION['msg'])){
			      	echo $_SESSION['msg'];
              unset($_SESSION['msg']);
              }
		          ?>

              <form method="POST" action="" enctype="multipart/form-data">
                <br><br>
								<div class="input_img">
									<label for="arquivo">Escolha uma imagem</label>
								  <input type="file" name="arquivo" value="Selecione uma imagem"><br><br>
								</div>

								 <label style="margin-top:100px;" for="nome">Nome</label><br>
                <input  type="text" name="nome" placeholder="Nome" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>" required><br><br>

                <label for="sobrenome">Sobrenome</label><br>
                <input type="text" name="sobrenome" placeholder="Sobrenome" value="<?php echo isset($_POST['sobrenome']) ? $_POST['sobrenome'] : ''; ?>" required><br><br>

                <label for="cpf">CPF</label><br>
                <input type="text" name="cpf" placeholder="000.000.000-00" value="<?php echo isset($_POST['cpf']) ? $_POST['cpf'] : ''; ?>" required><br><br>

                <label for="email">E-mail</label><br>
                <input type="email" name="email" placeholder="E-mail" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required><br><br>

                <label for="senha">Senha</label><br>
                <input type="password" name="senha" maxlength="16" placeholder="Sua senha" value="<?php echo isset($_POST['senha']) ? $_POST['senha'] : ''; ?>"><br><br>

                <label for="conf-senha">Confirme sua senha</label><br>
                <input type="password" name="conf_senha" maxlength="16" placeholder="Confirmação de sua senha" value="<?php echo isset($_POST['conf_senha']) ? $_POST['conf_senha'] : ''; ?>"><br><br>

                <div class="cep">
                  <label for="cep">CEP</label><br>
                  <input type="text" name="cep" placeholder="00000-000" value="<?php echo isset($_POST['cep']) ? $_POST['cep'] : ''; ?>" required><a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank">Buscar CEP</a><br><br>
                </div>

								<label for="endereco">Endereço</label><br>
									<input type="text" name="endereco" value="<?php echo isset($_POST['endereco']) ? $_POST['endereco'] : ''; ?>"><br><br>

									<label for="num">Numero</label><br>
									<input type="text" name="num" value="<?php echo isset($_POST['num']) ? $_POST['num'] : ''; ?>"><br><br>

									<label for="comple">Complemento</label><br>
									<input type="text" name="comple" value="<?php echo isset($_POST['comple']) ? $_POST['comple'] : ''; ?>"><br><br>

									<label for="bairro">Bairro</label><br>
									<input type="text" name="bairro" value="<?php echo isset($_POST['bairro']) ? $_POST['bairro'] : ''; ?>"><br><br>

									<label for="cidade">Cidade</label><br>
									<input type="text" name="cidade" value="<?php echo isset($_POST['cidade']) ? $_POST['cidade'] : ''; ?>"><br><br>

									<label for="uf">UF</label><br>
									<input type="text" name="uf" value="<?php echo isset($_POST['uf']) ? $_POST['uf'] : ''; ?>"><br><br>

									<label for="refe">Referência</label><br>
									<input type="text" name="refe" value="<?php echo isset($_POST['refe']) ? $_POST['refe'] : ''; ?>"><br><br>

                <button type="submit" name="button" value="Cadastrar">Cadastrar-se</button>
              </form>

          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- script
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
   integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
 integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
 integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
 <script src="http://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
		 <script>
		 $('nav.menu-mobile h2').click(function()
				 {
						 $('nav.menu-mobile ul').slideToggle(); //função do jQuery
				 })
		 </script>
</body>
</html>
