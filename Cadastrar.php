<?php 
require_once'UserController.php';
$userController = new UserController("db_projetounu","localhost","root","");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<div class="container">
		<head>
			<meta charset="utf-8">
			<title>Cadastrar Usuario</title>
			<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
			<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>	
		</head>
		<body>
<?php
		
			if (isset($_POST['nome'])) 
			{
				$nome = addslashes($_POST['nome']);
				$usename = addslashes($_POST['usename']);
				$email = addslashes($_POST['email']);
				$senha = addslashes($_POST['senha']);
				$confSenha = ($_POST["confSenha"]);

				if ($senha != $confSenha) 
				{
?>
				<div class="aviso">
					<img src="aviso.jpg">
					<h4>As senha estão diferentes ,repita!</h4>
				</div>
<?php
				}
				elseif (!empty($nome) && !empty($usename) && !empty($email) && !empty($senha) && !empty($confSenha))
				{
					if (!$userController->cadastrarUsuario($nome, $usename, $email, $senha)) 
					{
?>
						<div class="aviso">
							<img src="aviso.jpg">
							<h4>Não cadastrado,pois ja existe usuario com este email</h4>
						</div>
<?php
					}
				}
				else
				{
?>
					<div class="aviso">
						<img src="aviso.jpg">
						<h4>Preencha todos os campos!</h4>
					</div>
<?php
				}
			}
				
?>			
			<form method="POST" >
				<div class="form-group row" >
					<label for="nome" class="col-sm-1 col-form-label">Nome</label>
					<div class="col-sm-6">					
						<input type="text" class="form-control" name="nome" id="nome" placeholder="EX: João">
					</div>
				</div>
				<div class="form-group row">
					<label for="usename" class="col-sm-1 col-form-label">Usenane</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="usename" id="usename" placeholder="EX: joao10">
					</div>
				</div>
				<div class="form-group row" >
					<label for="email"  class="col-sm-1 col-form-label">E-MAIL</label>
					<div class="col-sm-6">
						<input type="email" class="form-control" name="email" id="email" placeholder="joao@gmail.com">
					</div>
				</div>
				<div class="form-group row">
					<label for="senha" class="col-sm-1 col-form-label">Senha</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="senha" id="senha" placeholder="J#123">
					</div>	
				</div>	
				<div class="form-group row">
					<label for="confSenha" class="col-sm-1 col-form-label">Confirma Senha</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="confSenha" id="confSenha" placeholder="J#123">
					</div>	
				</div>
				<div class="form-group" >
					 <button type="submit" class="btn btn-primary">CADASTRAR</button>
				</div>
			</form>
		</body>
	</div>	
</html>