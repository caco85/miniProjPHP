 <?php 
require_once'usuarioModel.php';
$usuarioModel = new Usuario("db_projetounu","localhost","root","");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>	
	<meta charset="utf-8">
	<title>Cadastrar Usuario</title>
	<link rel="stylesheet" href="estilo.css"> 
</head>
<body>
	<?php
		if (isset($_GET['id_up']) && !empty($_GET['id_up'])) 
		{
			if (isset($_POST['nome'])) 
			{
				$useID_up = addslashes($_GET['id_up']);
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
			 		$usuarioModel->atualizarUsuario($useID_up,$nome, $usename, $email, $senha); 
			 		header("location: index.php");
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
		}
		else
		{
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
			 		if (!$usuarioModel->cadastrarUsuario($nome, $usename, $email, $senha)) 
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

		}	
	 ?>
	 <?php 
		if (isset($_GET['id_up']))
		{
			$useID = addslashes($_GET['id_up']);
			$result = $usuarioModel->buscarDadosUse($useID);
			//var_dump($result);
		}

	if (isset($_GET['id']))
	{
		$useID = addslashes($_GET['id']);
		$usuarioModel->excluirUsuario($useID);
		header("location: index.php");
	}	
	?>
	<section id="esquerda">
		<form method="POST">
			<h2>CADASTRAR USUARIO</h2>
			<label for="nome">NOME</label>
			<input type="text" name="nome" id="nome" 
			value="<?php if(isset($result)){echo $result['nome'];}?>">
			<label for="usename">USENAME</label>
			<input type="text" name="usename" id="usename"
			value="<?php if(isset($result)){echo $result['usename'];}?>">
			<label for="email">E-MAIL</label>
			<input type="email" name="email" id="email"
			value="<?php if(isset($result)){echo $result['email'];}?>">
			<label for="senha">SENHA</label>
			<input type="password" name="senha" id="senha"
			value="<?php if(isset($result)){echo $result['senha'];}?>">
			<label for="confSenha">CONFIRMA SENHA</label>
			<input type="password" name="confSenha" id="confSenha"
			value="<?php if(isset($result)){echo $result['senha'];}?>">
			<input type="submit" value="<?php if(isset($result)){echo"Atualizar";}else{echo"Cadastrar";}?>">
		</form>
	</section>
	<section  id= "direita">
		<table>
			<tr id="titulo">
				<td>useID</td>
				<td>Nome</td>
				<td>UseName</td>
				<td>E-Mail</td>
				<td colspan="2">Senha</td>
			</tr>
		<?php
			$dados = $usuarioModel->buscarDados();
		
			if (count($dados) > 0)
			{
				for ($i=0; $i < count($dados); $i++ ) 
					{ 
						echo "<tr>";
						foreach ($dados[$i] as $key => $value)
						{
							echo "<td>".$value."</td>";
						}
						?>
							<td>
								<a href="index.php?id_up=<?php echo $dados[$i]['useID'];?>">Editar</a>
								<a href="index.php?id=<?php echo $dados[$i]['useID'];?>">Excluir</a>
							</td>
						<?php 	
						echo "</tr>";
					}	
			}
			else
			{
				?>
			</table>	
				 <div class="aviso">
				 	<h4>Sem Usuarios cadastrados!</h4>
				 </div> 
				<?php
			}
		//var_dump($dados); 
		?>			
		
	</section>
</body>
</html>

