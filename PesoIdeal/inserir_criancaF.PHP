<?php  
	session_start();
	//echo $_SESSION['usuario'];
	/*include_once("conexao.php");
	$rs = $connection->prepare("SELECT nome FROM user ");
    if($rs->execute()){
    	while($registro = $rs->fetch(PDO::FETCH_OBJ))
        {
        	 echo $registro->nome;
        }

    }
	*/
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta http-equiv="X-UA-campatible" content="ie=edge">
		<link href="bootstrap/CSSS/bootstrap-responsive.css" type="text/css" rel="stylesheet"/>
        <link href="bootstrap/CSSS/bootstrap.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="css/inserir_crianca.css">
		<link rel="stylesheet" type="text/css" href="css/head.css">
		<title>Inserir Medição</title>
		<script type="text/javascript"  src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/funcoes.js"></script>
	</head>
	<body  class="layout" onload="time()"> <!-- O body Executa a função time logo após quando a Página é Carregada -->
		<!-- topo -->
		<header style="background-color: #fff" class="grid grid-header">
			<figure class ="logo">
				<img src="img/Logo Ideal Weight.png" class="img_logo">
				<figcaption id="nomeLogo">
					<h1>PESO IDEAL</h1>
				</figcaption>
			</figure>
			<figure class="mesAno" >
				<img  class="calendario" src="img/calendar.png" alt="calendario" >
				<p class="data_hora"><?php include "data_hora.php";?></p>
				<img  class="relogio" src="img/circular-clock.png" alt="relogio">
				<script type="text/javascript">
					function time()
					{
						today=new Date();
						h=today.getHours();
						m=today.getMinutes();
						s=today.getSeconds();
						document.getElementById('hora').innerHTML=h+":"+m+":"+s;
						setTimeout('time()',500);
					}
				</script>
				<div id="hora"></div>
			</figure>
			<a href="vlogindex.php">Sair</a>
		</header>
		<nav style= "background-color: #fff" class="grid grid-nav">
			<ul>
				<a href=""><li class="home">HOME</li></a>
				<a href="ListagemCompleta.php"><li>LISTAGEM COMPLETA</li></a>
				<a href="indicador.php"><li>TODOS INDICADORES</li></a>
			</ul>
		</nav>
		<main style= "background-color: #fff"  class="grid grid-main">
			<div>
				<p>Favor Inserir os Dados da Criança</p>
			</div>
			<hr>
				<form>
					<label> Nome</label>
					<input type="text" name="nome" onkeypress="return lettersOnly(event);">
					<label> Data Nasc.</label>
					<input type="text" name="data_nasc" onkeydown="dataContadown(this);" onkeyup="dataConta(this);"onkeypress='return SomenteNumero(event)'>
					<label> Sexo</label>
					<select name="sexo">
						<option></option>
						<option>Masculino</option>
						<option>Feminino</option>
					</select>
					<label>Peso</label>
					<input type="text" name="peso" onkeypress='return SomenteNumero(event)' onkeyup="Pesoup(this);">
					<label>Altura</label>
					<input type="text" name="altura" onkeypress='return SomenteNumero(event)'  onkeyup="Alturaup(this);">
					<input class="botao" type="submit" name="" value="Enviar">
				</form>	
		</main>
		<aside style= "background-color: #fff" class="grid grid-aside">
			<div>
				<p>Pesquisar Dados da Criança</p>
			</div>
			<hr>
				<form>
					<label>Nome</label>
					<input type="text" name="">
					<!-- <label>Data Nasc</label>
					<input type="text" name=""> -->
					<label>Sexo</label>
					<select>
						<option></option>
						<option></option>
					</select>
					<label>Idade</label>
					<select>
						<option></option>
					</select>
					<input id="radio" type="radio" name="">
					<label>Menor</label>
					<input id="radio"  type="radio" name="">
					<label  >Menor/Igual</label>
					<input id="radio"  type="radio" name="">
					<label>Igual</label>
					<input id="radio"  type="radio" name="">
					<label>Maior</label>
					<input id="radio"  type="radio" name="">
					<label>Maior/Igual</label>
					<label class="lastatus">Status</label>
					<select>
						<option></option>
						<option></option>
					</select>
					<input class="botao pesquisar" type="submit" name="" value="Pesquisar">
				</form>	
		</aside>
		<footer style= "background-color:" class="grid grid-footer"><p> Peso Ideal 2018</p></footer>
	</body>
</html>	
