<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
</html>
<?php 
session_start();
if(!isset($_SESSION['login'])==true){
  echo"<script language='javascript' type='text/javascript'>alert('Usuário não identificado, faça o login!');window.location.href='index.php';</script>";
}

$nome = $_POST['nome'];
$data_nasc = $_POST['data_nasc'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$sexo = $_POST['sexo'];
$login = $_SESSION['login'];

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i:s');

$connect = mysql_connect('localhost','root','usbw'); 
$db = mysql_select_db('PI');
$query_select = "SELECT login FROM nutri WHERE login = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);

 
  if($nome == "" || $nome == null || $data_nasc == "" || $data_nasc == null || $peso == "" || $peso == null || $altura == "" || $altura == null){
    echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos');window.location.href='inserir_criancaF.php';</script>";
    
      }else{
    //1 - calcula idade
   
    // Separa em dia, mês e ano
    list($dia, $mes, $ano) = explode('/', $data_nasc);
   
    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
   
    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    if($idade>12){
      echo"<script language='javascript' type='text/javascript'>alert('Idade Maior que 12 Anos!!!Somente criança deve ser Cadastrada. ');window.location.href='inserir_criancaF.php';</script>";
    }
    
    //2-caclula imc
        $conta1 = $altura*$altura;
        $imc = ($peso/$conta1)*10000;
        $imc = number_format($imc, 2);

        IF($sexo == "M"){
          if($idade <= 6 && $imc < 14.5 ){$status = "Baixo Peso"; }else
          if($idade <= 6 && $imc < 16.6 ){$status = "Eutrofia"; }else
          if($idade <= 6 && $imc < 18.0 ){$status = "Sobrepeso"; }else
          if($idade <= 6 && $imc >= 18.0 ){$status = "Obesidade"; }else

          if($idade == 7 && $imc < 15.0 ){$status = "Baixo Peso"; }else
          if($idade == 7 && $imc < 17.3 ){$status = "Eutrofia"; }else
          if($idade == 7 && $imc < 19.1 ){$status = "Sobrepeso"; }else
          if($idade == 7 && $imc >= 19.1 ){$status = "Obesidade"; }else

          if($idade == 8 && $imc < 15.6 ){$status = "Baixo Peso"; }else
          if($idade == 8 && $imc < 16.7 ){$status = "Eutrofia"; }else
          if($idade == 8 && $imc < 20.3 ){$status = "Sobrepeso"; }else
          if($idade == 8 && $imc >= 20.3 ){$status = "Obesidade"; }else

          if($idade == 9 && $imc < 16.1 ){$status = "Baixo Peso"; }else
          if($idade == 9 && $imc < 18.8 ){$status = "Eutrofia"; }else
          if($idade == 9 && $imc < 21.4 ){$status = "Sobrepeso"; }else
          if($idade == 9 && $imc >= 21.4 ){$status = "Obesidade"; }else

          if($idade == 10 && $imc < 16.7 ){$status = "Baixo Peso"; }else
          if($idade == 10 && $imc < 19.6 ){$status = "Eutrofia"; }else
          if($idade == 10 && $imc < 22.5 ){$status = "Sobrepeso"; }else
          if($idade == 10 && $imc >= 22.5 ){$status = "Obesidade"; }else

          if($idade == 11 && $imc < 17.2 ){$status = "Baixo Peso"; }else
          if($idade == 11 && $imc < 20.3 ){$status = "Eutrofia"; }else
          if($idade == 11 && $imc < 23.7 ){$status = "Sobrepeso"; }else
          if($idade == 11 && $imc >= 23.7 ){$status = "Obesidade"; }else

          if($idade == 12 && $imc < 17.8 ){$status = "Baixo Peso"; }else
          if($idade == 12 && $imc < 21.1 ){$status = "Eutrofia"; }else
          if($idade == 12 && $imc < 24.8 ){$status = "Sobrepeso"; }else
          if($idade == 12 && $imc >= 24.8 ){$status = "Obesidade"; }else

          if($idade == 13 && $imc < 18.5 ){$status = "Baixo Peso"; }else
          if($idade == 13 && $imc < 21.9 ){$status = "Eutrofia"; }else
          if($idade == 13 && $imc < 25.9 ){$status = "Sobrepeso"; }else
          if($idade == 13 && $imc >= 25.9 ){$status = "Obesidade"; }else

          if($idade == 14 && $imc < 19.2 ){$status = "Baixo Peso"; }else
          if($idade == 14 && $imc < 22.7 ){$status = "Eutrofia"; }else
          if($idade == 14 && $imc < 26.9 ){$status = "Sobrepeso"; }else
          if($idade == 14 && $imc >= 26.9 ){$status = "Obesidade"; }else

          if($idade == 15 && $imc < 19.9 ){$status = "Baixo Peso"; }else
          if($idade == 15 && $imc < 23.6 ){$status = "Eutrofia"; }else
          if($idade == 15 && $imc < 27.7 ){$status = "Sobrepeso"; }else
          if($idade == 15 && $imc >= 27.7 ){$status = "Obesidade"; }else

          if($idade > 15 && $imc <= 18.49 ){$status = "Baixo Peso"; }else
          if($idade > 15 && $imc <= 24.99 ){$status = "Eutrofia"; }else
          if($idade > 15 && $imc <= 29.99 ){$status = "Sobrepeso"; }else
          if($idade > 15 && $imc > 29.99  ){$status = "Obesidade"; }

        }else

        IF($sexo == "F"){
          if($idade <= 6 && $imc < 14.3 ){$status = "Baixo Peso"; }else
          if($idade <= 6 && $imc < 16.1 ){$status = "Eutrofia"; }else
          if($idade <= 6 && $imc < 17.4 ){$status = "Sobrepeso"; }else
          if($idade <= 6 && $imc >= 17.4 ){$status = "Obesidade"; }else

          if($idade == 7 && $imc < 14.9 ){$status = "Baixo Peso"; }else
          if($idade == 7 && $imc < 17.1 ){$status = "Eutrofia"; }else
          if($idade == 7 && $imc < 18.9 ){$status = "Sobrepeso"; }else
          if($idade == 7 && $imc >= 18.9 ){$status = "Obesidade"; }else

          if($idade == 8 && $imc < 15.6 ){$status = "Baixo Peso"; }else
          if($idade == 8 && $imc < 18.1 ){$status = "Eutrofia"; }else
          if($idade == 8 && $imc < 20.3 ){$status = "Sobrepeso"; }else
          if($idade == 8 && $imc >= 20.3 ){$status = "Obesidade"; }else

          if($idade == 9 && $imc < 16.3 ){$status = "Baixo Peso"; }else
          if($idade == 9 && $imc < 19.1 ){$status = "Eutrofia"; }else
          if($idade == 9 && $imc < 21.7 ){$status = "Sobrepeso"; }else
          if($idade == 9 && $imc >= 21.7 ){$status = "Obesidade"; }else

          if($idade == 10 && $imc < 17.0 ){$status = "Baixo Peso"; }else
          if($idade == 10 && $imc < 20.1 ){$status = "Eutrofia"; }else
          if($idade == 10 && $imc < 23.2 ){$status = "Sobrepeso"; }else
          if($idade == 10 && $imc >= 23.2 ){$status = "Obesidade"; }else

          if($idade == 11 && $imc < 17.6 ){$status = "Baixo Peso"; }else
          if($idade == 11 && $imc < 21.1 ){$status = "Eutrofia"; }else
          if($idade == 11 && $imc < 24.5 ){$status = "Sobrepeso"; }else
          if($idade == 11 && $imc >= 24.5 ){$status = "Obesidade"; }else

          if($idade == 12 && $imc < 18.3 ){$status = "Baixo Peso"; }else
          if($idade == 12 && $imc < 22.1 ){$status = "Eutrofia"; }else
          if($idade == 12 && $imc < 25.9 ){$status = "Sobrepeso"; }else
          if($idade == 12 && $imc >= 25.9 ){$status = "Obesidade"; }else

          if($idade == 13 && $imc < 18.9 ){$status = "Baixo Peso"; }else
          if($idade == 13 && $imc < 23.0 ){$status = "Eutrofia"; }else
          if($idade == 13 && $imc < 27.7 ){$status = "Sobrepeso"; }else
          if($idade == 13 && $imc >= 27.7 ){$status = "Obesidade"; }else

          if($idade == 14 && $imc < 19.3 ){$status = "Baixo Peso"; }else
          if($idade == 14 && $imc < 23.8 ){$status = "Eutrofia"; }else
          if($idade == 14 && $imc < 27.9 ){$status = "Sobrepeso"; }else
          if($idade == 14 && $imc >= 27.9 ){$status = "Obesidade"; }else

          if($idade == 15 && $imc < 19.6 ){$status = "Baixo Peso"; }else
          if($idade == 15 && $imc < 24.2 ){$status = "Eutrofia"; }else
          if($idade == 15 && $imc < 28.8 ){$status = "Sobrepeso"; }else
          if($idade == 15 && $imc >= 28.8 ){$status = "Obesidade"; }else

          if($idade > 15 && $imc <= 18.49 ){$status = "Baixo Peso"; }else
          if($idade > 15 && $imc <= 24.99 ){$status = "Eutrofia"; }else
          if($idade > 15 && $imc <= 29.99 ){$status = "Sobrepeso"; }else
          if($idade > 15 && $imc > 29.99  ){$status = "Obesidade"; }
          }

    // Insere no BD    

        $query = "INSERT INTO crn".$login." (nome,dt_nasc,peso,altura,idade,imc,sexo,status,data) VALUES ('$nome','$data_nasc','$peso','$altura','$idade','$imc','$sexo','$status','$date')";
        $insert = mysql_query($query,$connect);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='inserir_criancaf.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='inserir_criancaF.php'</script>";
        }
      }
  
?>