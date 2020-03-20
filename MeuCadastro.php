<?php 
require_once'UserController.php';
$userController = new UserController("db_projetounu","localhost","root","");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>	
		<meta charset="utf-8">
		<title>Meu Cadastro</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
		<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
	</head>
	<body>
	<?php
		if (isset($_GET['id']))
		{
			$useID = addslashes($_GET['id']);
			$userController->excluirUsuario($useID);
			header("location: Logout.php");
		}	 
	?>
	<?php
			$id = $_SESSION['userID'];
			$result = $userController->buscarDadosUse($id);
	?>
	<?php
	if (isset($_POST['nome'])) 
	{
				$useID = addslashes ($_SESSION['userID']);
			 	$nome = addslashes($_POST['nome']);
			 	$usename = addslashes($_POST['usename']);
			 	$email = addslashes($_POST['email']);
			 	$senha = addslashes($_POST['senha']);
			 	$confSenha = ($_POST["confSenha"]);
			 	
			 	if ($senha != $confSenha) 
			 	{
	?>
 					<h4>As senha estão diferentes ,repita!</h4>
	<?php
			 	}
			 	elseif (!empty($nome) && !empty($usename) && !empty($email) && !empty($senha) && !empty($confSenha))
			 	{
			 		
			 		$userController->atualizarUsuario($useID,$nome, $usename, $email, $senha); 
			 		header("location: userLogado.php");
			 				 	}
			 	else
			 	{
	?> 
 					<h4>Preencha todos os campos!</h4>
	<?php
			 	}

	}		 	
	?>	
	<form method="POST" >
				<div class="form-group row" >
					<label for="nome" class="col-sm-1 col-form-label">Nome</label>
					<div class="col-sm-6">					
						<input type="text" class="form-control" name="nome" id="nome" value="<?php if(isset($result)){echo $result['nome'];}?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="usename" class="col-sm-1 col-form-label">Usenane</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="usename" id="usename" value="<?php if(isset($result)){echo $result['usename'];}?>">
					</div>
				</div>
				<div class="form-group row" >
					<label for="email"  class="col-sm-1 col-form-label">E-MAIL</label>
					<div class="col-sm-6">
						<input type="email" class="form-control" name="email" id="email" value="<?php if(isset($result)){echo $result['email'];}?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="senha" class="col-sm-1 col-form-label">Senha</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="senha" id="senha" value="<?php if(isset($result)){echo $result['senha'];}?>">
					</div>	
				</div>	
				<div class="form-group row">
					<label for="confSenha" class="col-sm-1 col-form-label">Confirma Senha</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="confSenha" id="confSenha" value="<?php if(isset($result)){echo $result['senha'];}?>">
					</div>	
				</div>
				<div class="form-group" >
					 <button type="submit" class="btn btn-primary">Atualizar</button>
					 <a class="btn btn-danger" href="meucadastro.php?id=<?php echo $id;?>">Excluir</a>
				</div>
			</form>
			
	</body>
</html>