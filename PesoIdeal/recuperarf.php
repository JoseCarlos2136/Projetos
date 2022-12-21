<html>
<?php
date_default_timezone_set("America/Sao_Paulo");
ini_set('smtp_port', '8080');
	mysql_connect('localhost', 'root', 'usbw');
	mysql_select_db('pi');
?>
	<head>
		<title>Recuperar Senha</title>
	</head>

	<body>
		<?php
		if(isset($_POST['acao']) && $_POST['acao'] == 'recuperar'):
			$email = strip_tags(filter_input(INPUT_POST, 'emailRecupera', FILTER_SANITIZE_STRING));

			$verificar = mysql_query("SELECT `email` FROM `nutri` WHERE email = '$email'");
			if(mysql_num_rows($verificar) == 1){
				$codigo = base64_encode($email);
				$data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));

				$mensagem = '<p>Recebemos uma tentativa de recuperação de senha para este e-mail, caso não tenha sido você,
					desconsidere este e-mail, caso contrário clique no link abaixo<br /> 
					<a href="recuperar.php?codigo='.$codigo.'">Recuperar Senha</a></p>';
				$email_remetente = 'contato@downsmaster.com';

				$headers = "MIME-Version: 1.1\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= "From: $email_remetente\n";
				$headers .= "Return-Path: $email_remetente\n"; 
				$headers .= "Reply-To: $email\n"; 

				$inserir = mysql_query("INSERT INTO `codigos` SET codigo = '$codigo', data = '$data_expirar'");
				if($inserir){
					if(mail("$email", "Assunto", "$mensagem", $headers, "-f$email_remetente")){
						echo 'Enviamos um e-mail com um link para recuperação de senha, para o endereço de e-mail informado!';
					}
				}
			}
		endif;
		?>
		<form action="" method="post" enctype="multipart/form-data">
			
				<input type="text" name="emailRecupera" value="" />
				<input type="hidden" name="acao" value="recuperar" />
				<input type="submit" value="Recuperar Senha" />
				<a href="index.php">Logar</a>
			
		</form>
	</body>
</html>