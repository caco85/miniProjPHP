<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Portal Academico Unu-Digital</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
	<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>
<div class="jumbotron">
	<div class="container">
	<body>
			<header class="container" >	
				<img src="imagens/unu-digital.jpg">
			</header>
			<div class="container">
				<div class="navbar navbar-inverse nav-justified ">
					<div class="navbar-inner">
						<ul class="nav navbar-nav ">
							<li><a href="?p=home"  title="Home Page">Home</a></li>
							<li> <a href="?p=sobre" title="Sobre">Sobre</a></li>

						</ul>
						<ul class="nav navbar-nav pull-right">
							<li> <a href="?p=login"
							 title="Login">Login</a></li> 
							<li> <a href="?p=cadastrar" title="Cadastrar">Cadastrar</a></li> 
						</ul>
					</div>
				</div>
			</div>
			<div class="container body-content">
				<div class="span12">
					<?php        
						if(isset ($_GET['p'])){
							$inc = $_GET['p'];
						}else{
							$inc = 'home';
						}
						if($inc == ""){
							$inc = 'home';
						}
						include $inc.".php";
					?>
				 	
				</div>
			</div>
			
		</body>
		<div class"row">
				<footer>
					<p> &copy; Portal Academico Unu-Digital 2020- Todos o Direitos Reservados </p>
				</footer>
		</div>
	</div>
</div>

</html>
