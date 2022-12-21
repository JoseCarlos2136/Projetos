<?php
/*
session_start();
if(!isset($_SESSION['login'])==true){
	echo"<script language='javascript' type='text/javascript'>alert('Usuário não identificado, faça o login!');window.location.href='index.php';</script>";
}

$cx = mysqli_connect("localhost", "root", "usbw");
//Echo "Filtrar Dados";
//selecionando o banco de dados
$db = mysqli_select_db($cx, "PI");
$login = $_SESSION['login'];
$tabela = "crn".$login;
*/
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/pesquisar.css">
		<title>Pesquisar</title>
		<script type="text/javascript"  src="js/jquery.min.js"></script>
	</head>
	<body onload="time()"> <!-- O body Executa a função time logo após quando a Página é Carregada -->
		<!-- topo -->
		<div class="container_12 clearfix">
			<div class="topo">
				<header>
					<img src="img/Logo Ideal Weight.png"  alt="logo" class="img_logo">
					<h2>Peso Ideal</h2>
					<p class="bemVindo" ><?php 
					/*
						$login = $_SESSION['login'];
						//iniciando a conexão com o banco de dados
						$cx = mysqli_connect("localhost", "root", "usbw");
						//selecionando o banco de dados
						$db = mysqli_select_db($cx, "PI");
						//criando a query de consulta à tabela criada
						$sql = mysqli_query($cx, "SELECT * FROM `nutri` WHERE `login` = '$login';") or die(
    					mysqli_error($cx) //caso haja um erro na consulta
						);
						while($aux = mysqli_fetch_assoc($sql)){
			    			echo "Bem-Vindo(a): ".$aux["nome"];
	 					}*/
	 					?>
	 				</p> 
					<div id="mes_ano">
						<img src="img/calendar.png" alt="calendario" class="img_calendar">
						<img src="img/circular-clock.png" alt="relogio" class="img_relogio">
						<p class="Pdata"><?php include "data_hora.php";?></p>
					<div>
					<div id="hora">
						<!-- script para definir a hora do dia em java script sem a necessidade de ar um refresh em toda a página -->
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
					</div>	
					<div class="logout">
						<a class="sair" href="logout.php">Sair</a>	
					</div>	
				</header>
			</div>
			<!-- Menu principal -->
			<section>
				<nav>
					<div id="menuPrincipal">
						<ul>
							<a href="inserir_criancaF.php" class=""><li class="liCrianca">Inserir Criança</li></a>
							<a href="pesquisarf.php" class=""><li class="liPesquisa">Pesquisar</li></a>
							<a href="ListagemCompleta.php" class=""><li class="liListaCompleta">Listagem Completa</li></a>
							<a href="indicador.php" class=""><li class="liIndicador">Indicadores</li></a>
						</ul>
					</div>
				</nav>	
			</section>
			<!-- Formulário -->
			<section>
				<div id="divForm">
					<div>
						<p><b>Pesquisar os dados</b></p>
					</div>	
					<form  action="pesquisar.php" method="GET">
						<div id="PE_nome">	
							<label for="Pnome" ><span class="span_form"><p class="p_form">Nome</p></span></label>
							<input type="text" name="nome" id="Pnome" class="inpunt_form"   onkeypress="return lettersOnly(event);"/>
						</div>
						<div id="PE_data_nasc">  
						    <script>
						    	//Script para a formatação da data
								function dataConta(c){
  								if(c.value.length ==2){
									c.value += '/';
  								}
  								if(c.value.length ==5){
									c.value += '/';
	  								}
								}
							</script>
							<label for="data_nasc"><span class="span_form"><p class="p_form">Data de Nasc.</p></span></label>
							<input type="text" name="data_nasc"  maxlength="10" id ="data_nasc" class="inpunt_form" onkeyup="dataConta(this);"/>
						</div>	
						<div id="PE_sexo">	
							<label for="Psexo"><span class="span_form"><p class="p_form">Sexo</p></span></label>
							<select name="sexo" id="Psexo" class="inpunt_form">
								<option value=""></option>
								<option value="M">Masculino</option>
								<option value="F">Feminino</option>
							</select>
						</div>
						<div id="PE_idade">	
							<label for="P_idade" ><span class="span_form"><p class="p_form">Idade</p></span></label>
							<select name="idade" id="P_idade" class="inpunt_form">
								<option value=""></option>
									<?php
										$sql = mysqli_query($cx, "SELECT DISTINCT idade FROM $tabela ORDER by idade ASC;") or die(
    									mysqli_error($cx) //caso haja um erro na consulta
										);
										while($aux = mysqli_fetch_assoc($sql))
										{    
    										echo "<option value='".$aux["idade"]."'>".$aux["idade"]."</option>"  ;
										}
									?>
							</select>
						</div>
						<div id="PE_radios">	
							<input type="radio" name="qidade" class="radio"  value="<"/>Menor |
                			<input type="radio" name="qidade" class="radio" value="<="/>Menor/Igual |
               				<input type="radio" name="qidade" class="radio" value="=" checked />Igual |
                			<input type="radio" name="qidade" class="radio" value=">"/>Maior |
               				<input type="radio" name="qidade" class="radio" value=">="/>Maior/Igual
                		</div>	
						<div id="PE_status">	
							<label for="Pstatus" ><span class="span_form"><p class="p_form">Status</p></span></label>
							<select name="status" id="Pstatus" class="inpunt_form">
								<option value=""></option>
								<option value="Baixo Peso">Baixo Peso</option>
								<option value="Eutrofia">Eutrofia</option>
								<option value="Sobrepeso">Sobrepeso</option>
								<option value="Obesidade">Obesidade</option>
							</select>
						</div>
						<input type="submit" name="entrar" id ="entrar" value="Pesquisar" class="btn_pesquisar">
					</form>
				</div>
			</section>
			<div id="footer" class="grid_12">
				<p>&copy Peso Ideal  <?php echo $ano = date('Y')?></p> <!-- Este comando Php exibe no navegador o ano dinâmicamente  direto no servidor.-->
			</div>
		</div><!-- Finaliza o Container para Responsividade -->
		<script>
			//Script para tratar o campo nome
			function lettersOnly(evt) {
   			evt = (evt) ? evt : event;
    		var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
       		((evt.which) ? evt.which : 0));
    		if (charCode > 32 && (charCode < 65 || charCode > 90) &&
        	(charCode < 97 || charCode > 251)) {
        	alert("Insira no Campo Somente Caracteres(Letras e Acentos)");
        	return false;
    		}
    		return true;
			}
	</script>
	</body>
</html>	
