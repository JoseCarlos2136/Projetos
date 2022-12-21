<?php
session_start();
  /*$login_session = $_SESSION['crn'];
    if(isset($login_session)){
      //echo"<script language='javascript' type='text/javascript'>alert('Login realizado com sucesso');window.location.href='inserir_criancaf.php'</script>";
      //echo"Bem-Vindo, convidado <br>";
    }else{
      echo"Bem-Vindo, convidado <br>";
      echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
      echo"<br><a href='index.php'>Faça Login</a> Para ler o conteúdo";
    }
    */
    unset($_SESSION['usuario']);
    header("Location:index.php");
?>