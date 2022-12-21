<?php 
  session_start();
  include_once("conexao.php");
  if((isset($_POST["crn"])) && (isset($_POST["senha"]))) {

    $sql = "SELECT * FROM user WHERE crn = :crn AND senha = :senha LIMIT 1";
    $resultado=$connection->prepare($sql);

    $crn = ($_POST["crn"]);
    $senha = MD5($_POST["senha"]);

    $resultado->bindValue(":crn",$crn);
    $resultado->bindValue(":senha",$senha);

    $resultado->execute();

    $registro = $resultado->rowCount();

    if ($registro<='0'){
      $_SESSION['loginErro'] = "Login ou Senha incorretos";
      header("Location:index.php"); 

    }elseif($registro =='1') {
      $_SESSION['usuario'] = $registro;
      header("Location:inserir_criancaF.php");
    }else{
      $_SESSION['loginErro'] = "Login ou Senha incorretos";
      header("Location:index.php"); 
    }  
  }else{
      $_SESSION['loginErro'] = "Login ou Senha incorretos";
      header("Location:index.php");  
    }  
?>