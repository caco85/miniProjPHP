<?php 
require_once'UserController.php';
$userController = new UserController("db_projetounu","localhost","root","");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<div class="container">
		<head>
			<meta charset="utf-8">
			<title>Login</title>
			<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
			<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>	
		</head>
		<body>
			<form method="POST">
			  <div class="form-group row">
			    <label for="usename" class="col-sm-1 col-form-label">Login</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="usename" placeholder="Usename">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="senha" class="col-sm-1 col-form-label">Senha</label>
			    <div class="col-sm-4">
			      <input type="password" class="form-control" name="senha" placeholder="Senha">
			    </div>
			  </div>
			  <div class="form-group row">
			    <div class="col-sm-1"></div>
			    <div class="col-sm-6">
			      <div class="form-check">
			        <input class="form-check-input" type="checkbox" id="lembrarSenha">
			        <label class="form-check-label" for="lembrarSenha">
			          Lembrar Senha?
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="form-group row">
			    <div class="col-sm-10">
			      <button type="submit" value="entrar" class="btn btn-primary">Entrar</button>
			    </div>
			  </div>
			  <h4>OU</h4>
			  <a href="?p=cadastrar" class="btn btn-primary">Cadastre-se</a>
			</form> 
		</body>
	</div>	
</html>
<?php 
	if (isset($_POST['usename'])) 
	{
		$usename = addslashes($_POST['usename']);
		$senha = addslashes($_POST['senha']);
		if (!empty($usename) && !empty($senha))
		{	
			if($userController->logar($usename,$senha))
			{
				header("location: userLogado.php");
			}
			else
			{
				echo"Login e/ou senha estão incorretos";
			}

		}
		else
		{
			echo"Preencha os campos ";
		}
	}			
 ?>