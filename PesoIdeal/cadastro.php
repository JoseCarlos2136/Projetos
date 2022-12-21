<?php 
$nome = $_POST['nome'];
$login = $_POST['crn'];
$senha = MD5($_POST['senha']);
$connect = mysql_connect('localhost','root','usbw'); 
$db = mysql_select_db('PI');
$query_select = "SELECT login FROM nutri WHERE login = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['login'];
 
  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastrof.php';</script>";
 
    }else{
      if($logarray == $login){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.php';</script>";
        die();
 
      }else{
        $query = "INSERT INTO nutri (nome,login,senha) VALUES ('$nome','$login','$senha')";
        $insert = mysql_query($query,$connect);

        if($insert){
          
          $dbname = 'pi'; // nome do banco de dados a ser usado
          $conecta = mysql_connect('localhost', 'root', 'usbw', 'pi');
          $seleciona = mysql_select_db($dbname);
          $sqlcriatabela = "CREATE TABLE crn".$login." (ID INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, nome VARCHAR(50) not null, dt_nasc TEXT(10) not null, peso FLOAT(3) not null, altura FLOAT(3) not null, idade INT(3) not null, imc FLOAT(5) not null, sexo TEXT(1) not null, status TEXT(20) not null, data datetime not null, Primary Key (ID));";
          $criatabela = mysql_query( $sqlcriatabela, $conecta );




          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='index.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastrof.php'</script>";
        }
      }
    }
?>