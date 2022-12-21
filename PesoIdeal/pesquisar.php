<?php

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
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/pesquisarP.css">
        <title>Pesquisar</title>
        <script src="checkbox.js"></script>
    </head>
    <body onload="time()"> <!-- O body Executa a função time logo após quando a Página é Carregada -->
        <!-- topo -->
        <div class="container_12 clearfix">
            <div class="topo">
                <header>
                    <img src="img/Logo Ideal Weight.png"  alt="logo" class="img_logo">
                    <h2>Peso Ideal</h2>
                    <p class="bemVindo" ><?php 
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
                        }?>
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
                <div id="divPesquisa">
                    <div id="resultado">
                        <p class="resultado"> Resultado</p>
                    </div>    
                  
                </div>  
                    
            </section>
            <div id="footer" class="grid_12">
                <p>&copy Peso Ideal  <?php echo $ano = date('Y')?></p> <!-- Este comando Php exibe no navegador o ano dinâmicamente  direto no servidor.-->
            </div>
        </div><!-- Finaliza o Container para Responsividade -->
    </body>
</html> 	
<?php

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$login = $_SESSION['login'];
$tabela = "crn".$login;
$nome = $_GET['nome'];
$data_nasc = $_GET['data_nasc'];
$sexo = $_GET['sexo'];
$idade = $_GET['idade'];
$status = $_GET['status'];
$qidade=$_GET['qidade'];
echo "<script src='checkbox.js'></script>";
 
//iniciando a conexão com o banco de dados
$cx = mysqli_connect("localhost", "root", "usbw");
//selecionando o banco de dados
$db = mysqli_select_db($cx, "PI");
//criando a query de consulta à tabela criada
$sql = mysqli_query($cx, "SELECT * FROM `nutri` WHERE `login` = '$login';") or die(
    mysqli_error($cx) //caso haja um erro na consulta
);

//INICIO FORMAR QUERY
$query=" ";

$filtrar ="Filtro Selecionado: ";

if(!empty($nome)){
$query.= " AND nome like '%$nome%'";
$filtrar.= "Nome= ".$nome;
if(!empty($data_ins) || !empty($sexo) || !empty($idade) || !empty($data_nasc) || !empty($status) ){
    $filtrar.= " | ";}
}

if(!empty($data_nasc)){
$query.= " AND dt_nasc like '$data_nasc'";
$filtrar.= "Data Nascimento= ".$data_nasc;
if( !empty($sexo) || !empty($idade) || !empty($data_nasc) || !empty($status) ){
    $filtrar.= " | ";}
}

if(!empty($sexo)){
$query.= " AND sexo = '$sexo'";
$filtrar.= "Sexo= ".$sexo;
    if( !empty($idade) || !empty($data_nasc) || !empty($status) ){
    $filtrar.= " | ";
}
}
    
if(!empty($idade)){
$query.= " AND idade".$qidade.$idade;
$filtrar.= "Idade".$qidade.$idade;
    if(  !empty($status) ){
    $filtrar.= " | ";}

}

if(!empty($status)){
$query.= " AND status = '$status'";
$filtrar.= "Status= ".$status;
}

if( !empty($nome) ||  !empty($sexo) || !empty($idade) || !empty($data_nasc) || !empty($status) ){
    echo "<p class='filtro'>".$filtrar."</p>";
}


$sql = "SELECT * FROM $tabela WHERE id > 0".$query; 
$sql=$sql." ORDER BY data DESC, nome ASC;";


//criando a query de consulta à tabela criada
$sql = mysqli_query($cx, $sql) or die(
    mysqli_error($cx) //caso haja um erro na consulta
);

$i=1;

$querydelete="";
while($aux = mysqli_fetch_assoc($sql)){
$ID=$aux["ID"];

if(isset($_POST[$ID])){

    $querydelete="delete FROM pi.$tabela WHERE $tabela.ID=".$aux["ID"].";";
    
        if($querydelete!=""){
            $delete = mysqli_query($cx, $querydelete) or die(
                mysqli_error($cx) //caso haja um erro na consulta
                );      
        }

    }
$i++;
}

//apos tratar query direcinando tabelas
if(!empty($idade) && ($nome)==null && ($sexo)==null && ($data_nasc)==null && ($status)==null ){
	goto porsexo;
}else
if(!empty($status) && ($idade)==null && ($nome)==null  && ($sexo)==null && ($data_nasc)==null ){
	goto porsexo;
}else
if(!empty($sexo) && ($data_nasc)==null && ($status)==null && ($idade)==null && ($nome)==null ){
	goto poridade;
}else
if(!empty($data_ins) && !empty($data_nasc) ){
	goto porsexo;
}else
if(!empty($data_ins) && !empty($idade) ){
	goto porsexo;
}else
if(!empty($data_ins) && !empty($status) ){
	goto porsexo;
}else
if(!empty($data_nasc) && !empty($nome) ){
	goto porsexo;
}else
if(!empty($data_nasc) && !empty($status) ){
	goto porsexo;
}else
if(!empty($idade) && !empty($nome) ){
	goto porsexo;
}else
if(!empty($idade) && !empty($status) ){
	goto porsexo;
}else
if(!empty($nome) && !empty($status) ){
	goto porsexo;
}else
if(!empty($data_ins) && !empty($sexo) ){
	goto poridade;
}else
if(!empty($nome) && !empty($sexo) ){
	goto poridade;
}else
if(!empty($status) && !empty($sexo) ){
	goto poridade;
}else
if(!empty($data_ins) && !empty($nome) ){
	goto geral;
}else
if(!empty($idade) && !empty($sexo) ){
	goto geral;
}else goto geral;

{
poridade:
//tabela por idade
echo "<center>";
echo "<div id='Indicador_Idade'>  
        <table class='tbindicadoresIdade'><caption>Indicador por idade</caption>

            <tr>
                <th class='th'>Idade</th>
                <th class='th'>Baixo Peso</th>
                <th class='th'>Eutrofia</th>
                <th class='th'>Sobrepeso</th>
                <th class='th'>Obesidade</th>
                <th class='th'>Total</th>
                <th class='th'>%</th>
            </tr>
        </div>";
echo "<center>";
$sql = mysqli_query($cx, "SELECT DISTINCT idade FROM $tabela ORDER by idade ASC;") or die(
    mysqli_error($cx) //caso haja um erro na consulta
	);

	$idtotal= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0 ".$query.";");
	$idtotal = mysqli_num_rows($idtotal);

	while($aux = mysqli_fetch_array($sql))
	{    
		echo "<tr><td>".$aux["idade"]."</td>";
		$idade=$aux["idade"];

		$idbaixopeso= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND idade = $idade AND status='Baixo Peso' ".$query." ;" );
		$idbaixopeso = mysqli_num_rows($idbaixopeso);
		echo "<td>".$idbaixopeso."</td>";

		$ideutrofia= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND idade = $idade AND status='Eutrofia' ".$query.";" );
		$ideutrofia = mysqli_num_rows($ideutrofia);
		echo "<td>".$ideutrofia."</td>";

		$idsobrepeso= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND idade = $idade AND status='Sobrepeso' ".$query.";" );
		$idsobrepeso = mysqli_num_rows($idsobrepeso);
		echo "<td>".$idsobrepeso."</td>";

		$idobesidade= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND idade = $idade AND status='Obesidade' ".$query.";" );
		$idobesidade = mysqli_num_rows($idobesidade);
		echo "<td>".$idobesidade."</td>";

		$idtotals=$idbaixopeso+$ideutrofia+$idsobrepeso+$idobesidade;
		echo "<td>".$idtotals."</td>";
		$pidtotals=number_format((($idtotals/$idtotal)*100),1);

		echo "<td>".$pidtotals."%</td></tr>";

	}
		$idbaixopeso= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND status='Baixo Peso' ".$query.";" );
		$idbaixopeso = mysqli_num_rows($idbaixopeso);
		echo "<tr><td>Total</td><td>".$idbaixopeso."</td>";

		$ideutrofia= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND status='Eutrofia' ".$query.";" );
		$ideutrofia = mysqli_num_rows($ideutrofia);
		echo "<td>".$ideutrofia."</td>";

		$idsobrepeso= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND status='Sobrepeso' ".$query.";" );
		$idsobrepeso = mysqli_num_rows($idsobrepeso);
		echo "<td>".$idsobrepeso."</td>";

		$idobesidade= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND status='Obesidade' ".$query.";" );
		$idobesidade = mysqli_num_rows($idobesidade);
		echo "<td >".$idobesidade."</td>";

		$idtotals=$idbaixopeso+$ideutrofia+$idsobrepeso+$idobesidade;
		echo "<td>".$idtotals."</td>";
		$pidtotals=number_format((($idtotals/$idtotal)*100),1);
		echo "<td>".$pidtotals."%</td></tr>";

		echo "</table></center>";
		goto listagem;
	}
{
porsexo:
//tabela por sexo
$feminino = mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0 ".$query." AND sexo ='F' ;" );
$feminino = mysqli_num_rows($feminino);

$masculino = mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0 ".$query." AND sexo ='M' ;" );
$masculino = mysqli_num_rows($masculino);

$statsoma = ($feminino+$masculino);
 
if($feminino==0 && $masculino==0){
    $pfeminino=0;
    $pmasculino=0;
    $pstatsoma=0;

goto evitardivzero;
}else{

$pfeminino = number_format((($feminino/$statsoma)*100),1);
$pmasculino = number_format((($masculino/$statsoma)*100),1);
$pstatsoma = $pfeminino+$pmasculino;

evitardivzero:
echo "<center>";
echo "<div id='Indicador_Geral'>
        <table class='tbindicadorSexo'><caption>Indicador por sexo</caption>

            <tr>
                <th class='thSexo'>Sexo</th>
                <th class='thSexo'>Quant</th>
                <th class='thSexo'>%</th>
            </tr>
            <tr>
                <td class='tdSexo'>Feminino</td>
                <td class='tdSexo'>".$feminino."</td>
                <td class='tdSexo'>".$pfeminino."%</td>
            </tr>
            <tr>
                <td class='tdSexo'>Masculino</td>
                <td class='tdSexo'>".$masculino."</td>
                <td class='tdSexo'>".$pmasculino."%</td>
            </tr>
            <tr>
                <td class='tdSexo'>Total</td>
                <td class='tdSexo'>".$statsoma."</td>
                <td class='tdSexo'>".$pstatsoma."%</td>
            </tr>
        </table>    
     </div>";}
     echo "<center>";
goto listagem;
}

{
geral:
//geral
//forma o a tabela indicador

//criando a query de consulta à tabela criada
$baixopeso = mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0 ".$query." AND status='Baixo Peso' ;" );
$baixopeso = mysqli_num_rows($baixopeso);

//criando a query de consulta à tabela criada
$eutrofia = mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0 ".$query." AND status='Eutrofia';");
$eutrofia = mysqli_num_rows($eutrofia);

//criando a query de consulta à tabela criada
$sobrepeso = mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0 ".$query." AND status='Sobrepeso';");
$sobrepeso = mysqli_num_rows($sobrepeso);

//criando a query de consulta à tabela criada
$obesidade = mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0 ".$query." AND status='Obesidade';");
$obesidade = mysqli_num_rows($obesidade);

$soma=$baixopeso+$eutrofia+$sobrepeso+$obesidade;

if($soma==0){
$pbaixopeso=0;
$peutrofia=0;
$psobrepeso=0;
$pobesidade=0;
$psoma=0;

}else{

$pbaixopeso=number_format((($baixopeso/$soma)*100),1);
$peutrofia=number_format((($eutrofia/$soma)*100),1);
$psobrepeso=number_format((($sobrepeso/$soma)*100),1);
$pobesidade=number_format((($obesidade/$soma)*100),1);

$psoma=number_format(($pbaixopeso+$peutrofia+$psobrepeso+$pobesidade),0);

}
 //Mostra os Indicadores Gerais
echo "<center>";
echo"<div id='Indicador_Geral'> 
         <table class='tbIndicadoGeral'><caption>Indicador Geral</caption>
            <tr>
                <th class='thgeral'>Status</th>
                <th class='thgeral'>Quant</th>
                <th class='thgeral'>%</th>
            </tr>
            <tr>
                <td class='tdgeral'>Baixo Peso</td>
                <td class='tdgeral'>".$baixopeso."</td>
                <td class='tdgeral'>".$pbaixopeso."%</td>
            </tr>
            <tr>
                <td class='tdgeral'>Eutrofia</td>
                <td class='tdgeral'>".$eutrofia."</td>
                <td class='tdgeral'>".$peutrofia."%</td>
            </tr>
            <tr>
                <td class='tdgeral'>Sobrepeso</td>
                <td class='tdgeral'>".$sobrepeso."</td>
                <td class='tdgeral'>".$psobrepeso."%</td>
            </tr>
            <tr>
                <td class='tdgeral'>Obesidade</td>
                <td class='tdgeral'>".$obesidade."</td>
                <td class='tdgeral'>".$pobesidade."%</td>
            </tr>
            <tr>
                <td class='tdgeral'>Total</td>
                <td class='tdgeral'>".$soma."</td>
                <td class='tdgeral'>".$psoma."%</td>
            </tr>
        </table>
   </div>";
   echo "<center>";
}
listagem:

$sql = "SELECT * FROM $tabela WHERE id > 0".$query.""; 
$sql=$sql." ORDER BY data DESC, nome ASC;";

//criando a query de consulta à tabela criada
$sql = mysqli_query($cx, $sql) or die(
    mysqli_error($cx) //caso haja um erro na consulta
);
//Se Não encontrar nenhum registro retorna uma mensagem
$sqlrow = mysqli_num_rows( $sql);

if($sqlrow<=0){
echo "<p class='registroNaoEncontrado'>Nenhum Registro Encontrado!</p>";
}
//geral
//EXIBE A TABELA 

echo "<center>";
echo "<form action='".$url."' method='post'><input type='submit' class='btnexcluir' name='delete' value='Excluir'/>";
echo "<div id='tabelaPesquisa'>
        <table class='tbPesquisa'>
             <tr class='head'>
                <th><input type='checkbox'  class='tudo'name='tudo' onclick='verificaStatus(this)'/> Marcar Tudo</th>
                <th>Nº</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>DNA</th>
                <th>Idade</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Imc</th>
                <th>Status</th>
                <th>Data</th>
            </tr>";    
$i=1;
//pecorrendo os registros da consulta.
while($aux = mysqli_fetch_assoc($sql))
{
    echo"<tr class='even'>
            <td><input type='checkbox'  name='".$aux["ID"]."' value='".$aux["ID"]."'/></td> 
            <td>".$i."</td>
            <td>".$aux["nome"]."</td>
            <td>".$aux["sexo"]."</td>
            <td>".$aux["dt_nasc"]."</td>
            <td>".$aux["idade"]."</td>
            <td>".$aux["peso"]."</td>
            <td>".$aux["altura"]."</td>
            <td>".$aux["imc"]."</td>
            <td>".$aux["status"]."</td>
            <td>".$aux["data"]."</td>
         </tr>";
   $i++;
}
echo "</table>";
echo "<input type='checkbox' name='tudo' onclick='verificaStatus(this)'hidden/>";
echo "</form>";
echo "</div>"; 
echo "<p class='voltar'><a href=pesquisarf.php>Nova Pesquisa</a></p>";
echo "<center>";

?>