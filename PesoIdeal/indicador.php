<?php
/*
session_start();
if(!isset($_SESSION['login'])==true){
    echo"<script language='javascript' type='text/javascript'>alert('Usuário não identificado, faça o login!');window.location.href='index.php';</script>";
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
        <link rel="stylesheet" type="text/css" href="css/indicador.css">
        <link rel="stylesheet" type="text/css" href="css/head.css">
        <title>Pesquisar</title>
        <script src="checkbox.js"></script>
    </head>
    <body  class="layout" onload="time()"> <!-- O body Executa a função time logo após quando a Página é Carregada -->
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
        </header>
        <nav style= "background-color: #fff" class="grid grid-nav">
            <ul>
                <a href="inserir_criancaF.php"><li class="home">HOME</li></a>
                <a href="ListagemCompleta.php"><li>LISTAGEM COMPLETA</li></a>
                <a href="indicador.php"><li class="indicador">TODOS INDICADORES</li></a>
            </ul>
        </nav>
        <main style= "background-color: #fff"  class="grid grid-main">
            <div>
                <p>Indicador Geral</p>
            </div>
              <table>
                <thead>
                    <tr>
                       <th class="thleft">Sexo</th>
                        <th>Quantidade</th>
                        <th>Staus</th>
                        <th class="porcentagem">%</th>
                    </tr>
                </thead>
                <tbody>
                      <tr>
                        <td>Masculino</td>
                        <td>300</td>
                        <td>Baixo Peso</td>
                        <td>100%</td>
                    </tr>
                     <tr>
                        <td>Masculino</td>
                        <td>300</td>
                        <td>Baixo Peso</td>
                        <td>100%</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">foram Encontrados:</td>
                    </tr>
                </tfoot>
            </table>
        </main>
        <aside style= "background-color: #fff" class="grid grid-aside">
            <div>
                <p>Indicador por Idade</p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="thleft">Idade</th>
                        <th>Eutrofia</th>
                        <th>Obesidade</th>
                        <th>Sobre Peso</th>
                        <th>Baixo Peso</th>
                        <th>Total</th>
                        <th class="porcentagem">%</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>21</td>
                        <td>300</td>
                        <td>200</td>
                        <td>400</td>
                        <td>500</td>
                        <td>600</td>
                        <td>100%</td>
                    </tr>
                     <tr>
                        <td>21</td>
                        <td>300</td>
                        <td>200</td>
                        <td>400</td>
                        <td>500</td>
                        <td>600</td>
                        <td>100%</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">foram Encontrados:</td>
                    </tr>
                </tfoot>
            </table>
        </aside>
          <aside style= "background-color: #fff" class="grid grid-aside-2">
            <div>
                <p>Indicador por Sexo</p>
            </div>
              <table>
                <thead>
                    <tr>
                        <th class="thleft">Sexo</th>
                        <th>Quantidade</th>
                        <th>Staus</th>
                        <th class="porcentagem">%</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                         <td>Masculino</td>
                         <td>100</td>
                         <td>baixo peso</td>
                         <td>100%</td>
                    </tr>
                     <tr>
                         <td>Masculino</td>
                         <td>100</td>
                         <td>baixo peso</td>
                         <td>100%</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">foram Encontrados:</td>
                    </tr>
                </tfoot>
            </table>
        </aside>
        <footer style= "background-color:" class="grid grid-footer"><p> Peso Ideal 2018</p></footer>
    </body>
</html> 

<?php
/*

$login = $_SESSION['login'];
date_default_timezone_set('America/Sao_Paulo');

//iniciando a conexão com o banco de dados
$cx = mysqli_connect("localhost", "root", "usbw");

//selecionando o banco de dados
$db = mysqli_select_db($cx, "PI");

//concatena o crn antes no nome da tabela
$tabela = "crn".$login;

//Geral
{
//criando a query de consulta à tabela criada
$baixopeso = mysqli_query($cx, "SELECT * FROM $tabela WHERE status='Baixo Peso';");
$baixopeso = mysqli_num_rows($baixopeso);

//criando a query de consulta à tabela criada
$eutrofia = mysqli_query($cx, "SELECT * FROM $tabela WHERE status='Eutrofia';");
$eutrofia = mysqli_num_rows($eutrofia);

//criando a query de consulta à tabela criada
$sobrepeso = mysqli_query($cx, "SELECT * FROM $tabela WHERE status='Sobrepeso';");
$sobrepeso = mysqli_num_rows($sobrepeso);

//criando a query de consulta à tabela criada
$obesidade = mysqli_query($cx, "SELECT * FROM $tabela WHERE status='Obesidade';");
$obesidade = mysqli_num_rows($obesidade);

$soma=$baixopeso+$eutrofia+$sobrepeso+$obesidade;

if($soma==0){
$pbaixopeso=0;
$peutrofia=0;
$psobrepeso=0;
$pobesidade=0;

}else{

$pbaixopeso=number_format((($baixopeso/$soma)*100),2);
$peutrofia=number_format((($eutrofia/$soma)*100),2);
$psobrepeso=number_format((($sobrepeso/$soma)*100),2);
$pobesidade=number_format((($obesidade/$soma)*100),2);
}

$psoma=$pbaixopeso+$peutrofia+$psobrepeso+$pobesidade;

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

//tabela por sexo
$feminino = mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND sexo ='F' ;" );
$feminino = mysqli_num_rows($feminino);

$masculino = mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND sexo ='M' ;" );
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
echo "<div id='Indicador_Sexo'>
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
     </div>";
echo "<center>";
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

$sql = mysqli_query($cx, "SELECT DISTINCT idade FROM $tabela ORDER by idade ASC;") or die(
    mysqli_error($cx) //caso haja um erro na consulta
	);

	$idtotal= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0 ;");
	$idtotal = mysqli_num_rows($idtotal);

	while($aux = mysqli_fetch_array($sql))
	{    
		echo "<tr><td>".$aux["idade"]."</td>";
		$iidade=$aux["idade"];

		
		$idbaixopeso= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND idade = $iidade AND status='Baixo Peso'  ;" );
		$idbaixopeso = mysqli_num_rows($idbaixopeso);
		echo "<td>".$idbaixopeso."</td>";

		$ideutrofia= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND idade = $iidade AND status='Eutrofia' ;" );
		$ideutrofia = mysqli_num_rows($ideutrofia);
		echo "<td>".$ideutrofia."</td>";

		$idsobrepeso= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND idade = $iidade AND status='Sobrepeso' ;" );
		$idsobrepeso = mysqli_num_rows($idsobrepeso);
		echo "<td>".$idsobrepeso."</td>";

		$idobesidade= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND idade = $iidade AND status='Obesidade' ;" );
		$idobesidade = mysqli_num_rows($idobesidade);
		echo "<td>".$idobesidade."</td>";

		$idtotals=$idbaixopeso+$ideutrofia+$idsobrepeso+$idobesidade;
		echo "<td>".$idtotals."</td>";
		$pidtotals=number_format((($idtotals/$idtotal)*100),1);

		echo "<td>".$pidtotals."%</td></tr>";

	}
		$idbaixopeso= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND status='Baixo Peso' ;" );
		$idbaixopeso = mysqli_num_rows($idbaixopeso);
		echo "<tr><td>Total</td><td>".$idbaixopeso."</td>";

		$ideutrofia= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND status='Eutrofia' ;" );
		$ideutrofia = mysqli_num_rows($ideutrofia);
		echo "<td>".$ideutrofia."</td>";

		$idsobrepeso= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND status='Sobrepeso' ;" );
		$idsobrepeso = mysqli_num_rows($idsobrepeso);
		echo "<td>".$idsobrepeso."</td>";

		$idobesidade= mysqli_query($cx, "SELECT * FROM $tabela WHERE id > 0  AND status='Obesidade' ;" );
		$idobesidade = mysqli_num_rows($idobesidade);
		echo "<td>".$idobesidade."</td>";

		$idtotals=$idbaixopeso+$ideutrofia+$idsobrepeso+$idobesidade;
		echo "<td>".$idtotals."</td>";
        if($idtotals==0){
            $pidtotals=0;
        }else{

		$pidtotals=number_format((($idtotals/$idtotal)*100),1);
    }
		echo "<td>".$pidtotals."%</td></tr>";

		echo "</table></center>";}
	*/	
?>