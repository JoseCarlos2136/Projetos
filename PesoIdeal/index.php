<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link href="bootstrap/CSSS/bootstrap-responsive.css" type="text/css" rel="stylesheet"/>
    <link href="bootstrap/CSSS/bootstrap.css" type="text/css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>login</title>
</head>
<body>
	<!-- Icicilaiza o Container para Responsividade -->
	<div id="caixa_login">
		<div id="imagem">
			<figure>
				<img src="img/Logo Ideal Weight.png" class="img_logo">
				<figcaption>Peso Ideal</figcaption>
			</figure>
		</div>
		<form  action="login.php" method="POST">
			<div class="divInput">	
				<label for="login"><span ><img src="img/user.png"  class="login_img"></span></label>
				<input type="text" name="crn" id="login" placeholder="Crn"  class="inpunt_login"/>
			</div>
			<div class="divInput">	
				<label for="pasw"><span><img src="img/senha1.png" class="login_img"></span></label>
				<input type="password" name="senha" id="pasw" placeholder="Senha"  class="inpunt_senha"/>
			</div>	
			<input type="submit"  value="Entrar" class="btn_entrar">
		</form>
		<p class="esqueci"> Esqueceu sua Senha? Click<a href="#">  Aqui  </a></p>
		<a href="cadastrof.php" class="link_nutri">Cadastrar Usurário</a>
		<?php
			if(isset($_SESSION['loginErro'])) {
				echo"<div class='alert alert-danger' role='alert'>" .$_SESSION['loginErro']."</div>";
				unset($_SESSION['loginErro']);
			}
		?>
	</div>
	<div id="footer" >
		<p>&copy  Peso Ideal <?php   
		date_default_timezone_set('America/Sao_Paulo');
		echo $ano = date('Y')?></p> <!-- Este comando Php exibi no navegador o ano dinâmicamente o ano direto no servidor.-->
	</div>
</body>
</html>