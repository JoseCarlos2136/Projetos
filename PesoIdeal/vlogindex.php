<?php
session_start();
  /*$login_session = $_SESSION['crn'];
    if(isset($login_session)){
      //echo"<script language='javascript' type='text/javascript'>alert('Login realizado com sucesso');window.location.href='inserir_criancaf.php'</script>";
      //echo"Bem-Vindo, convidado <br>";
    }else{
      echo"Bem-Vindo, convidado <br>";
      echo"Essas informa��es <font color='red'>N�O PODEM</font> ser acessadas por voc�";
      echo"<br><a href='index.php'>Fa�a Login</a> Para ler o conte�do";
    }
    */
    unset($_SESSION['usuario']);
    header("Location:index.php");
?>