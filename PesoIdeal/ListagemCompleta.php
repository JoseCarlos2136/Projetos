<?php
/*
session_start();
if(!isset($_SESSION['login'])==true){
    echo"<script language='javascript' type='text/javascript'>alert('Usuário não identificado, faça o login!');window.location.href='index.php';</script>";
}*/

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-campatible" content="ie=edge">
        <link href="bootstrap/CSSS/bootstrap-responsive.css" type="text/css" rel="stylesheet"/>
        <link href="bootstrap/CSSS/bootstrap.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="css/head.css">
        <link rel="stylesheet" type="text/css" href="css/ListagemCompleta.css">
        <title>Listgem Completa</title>
        <script type="text/javascript"  src="js/jquery.min.js"></script>
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
        </header>
        <nav style= "background-color: #fff" class="grid grid-nav">
            <ul>
                <a href="inserir_criancaF.php"><li>HOME</li></a>
                <a href=""><li class="listagem">LISTAGEM COMPLETA</li></a>
                <a href="indicador.php"><li>TODOS INDICADORES</li></a>
            </ul>
        </nav>
        <main style= "background-color: #fff"  class="grid grid-main">
            <div>
                <p>Resultado</p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th><input type="checkbox" name=""></th>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Data Nasc.</th>
                        <th>Idade</th>
                        <th>Peso</th>
                        <th>Altura</th>
                        <th>Imc</th>
                        <th>Status</th>
                        <th class="data">Data</th>
                    </tr>
                </thead> 
                <tbody>    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10">Foram Encontrados:</td>
                    </tr>
                </tfoot>
            </table>
        </main>
        <footer style= "background-color:" class="grid grid-footer"><p> Peso Ideal 2018</p></footer>
      <!--hhhh -->
      <!-- ?php 

$login = $_SESSION['login'];
date_default_timezone_set('America/Sao_Paulo');

//iniciando a conexão com o banco de dados
$cx = mysqli_connect("localhost", "root", "usbw");

//selecionando o banco de dados
$db = mysqli_select_db($cx, "PI");

//criando a query de consulta à tabela criada
$sql = mysqli_query($cx, "SELECT * FROM `nutri` WHERE `login` = '$login';") or die(
    mysqli_error($cx) //caso haja um erro na consulta
);

$tabela = "crn".$login;

//criando a query de consulta à tabela criada
$sql = mysqli_query($cx, "SELECT * FROM $tabela ORDER BY data DESC, nome ASC") or die(
    mysqli_error($cx) //caso haja um erro na consulta
);

$resultados = mysqli_num_rows($sql);

//EXIBE A TABELA 

echo "<center>";
if($resultados<=0){
 echo "<p class='registroNaoEncontrado'>Nenhum Registro Encontrado!</p>";
}elseif($resultados==1){ 
    echo "<p class='registroEncontrados'>Foi encontrado apenas ".$resultados." resultado!</p>";
}else{
    echo " <p class='registroEncontrados'>Foram encontrados ".$resultados." resultados!</p>";
}
echo "<div id='tabelaPesquisa'>
        <table class='tbPesquisa'>
            <tr class='head'>
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
echo "</div>"; 
echo "</center>";
?>
*/
-->
    </body>
</html> 


