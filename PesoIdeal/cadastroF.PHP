<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta http-equiv="X-UA-campatible" content="ie=edge">
		<link href="bootstrap/CSSS/bootstrap-responsive.css" type="text/css" rel="stylesheet"/>
        <link href="bootstrap/CSSS/bootstrap.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="css/cadastrar_nutricionistas.css">
		<title>Cadastro de Nutricionistas</title>
	</head>
	<body>
		<div id="caixa_login">	
			<div id="caixa_logo">
				<figure>
					<img src="img/Logo Ideal Weight.png" class="img_logo">
					<figcaption>Cadastro de Nutricionistas</figcaption>
				</figure>	
			</div>
			<form  action="?validar=true" method="POST">
			<div id="CA_nome">	
				<label for="Cnome">Nome&nbsp</label>
				<input type="text" name="nome" id="Cnome" class="inpunt_form"/>
			</div>
			<div id="form" >	
				<label for="crn">CRN &nbsp&nbsp</label>
				<input type="text" name="crn"  id="crn" class="inpunt_form"/>
			</div>	
			<div id="form">	
				<label for="Cemail">Email &nbsp</label>
				<input type="email" name="email"  id ="Cemail" class="inpunt_form"/>
			</div>
			<div id="form">	
				<label for="Csenha">Senha</label>
				<input type="password" name="senha"  id ="Csenha" class="inpunt_form"/>
			</div>	
			<div class="meu">
				<input type="submit"  id ="cadastrar" name="submit" value="Cadastrar" class="btn_cadastro">
			</div>
			</form>
			<div class="divlink">
				<p class="p_link">Já efetuou o seu cadastro? Faça o seu <a href="index.php" class="link_login">Login</a></p>
			</div>
			<?php 
				require"cadastro-nutricionista.php";

			   if($validar == true)
                {
                    echo "<div class='alert alert-success' role='alert'>Dados Cadastrados  com sucesso</div>";     
                }
				else if(isset($erro))
                {
                  	echo "<div class='alert alert-danger' role='alert'>".$erro."</div>"; 
                }
			?> 	
		</div>
		<div id="footer">
			<p >&copy Peso Ideal <?php   
			date_default_timezone_set('America/Sao_Paulo');
			echo $ano = date('Y')?></p> <!-- Este comando Php exibi no navegador o ano dinâmicamente o ano direto no servidor.-->
		</div>
	</div><!-- Finaliza o Container para Responsividade -->
	</body>
</html>	
