<?php
    require 'ConexaoBD.php';
    
    $sql = "INSERT INTO cadastro (nome_solicitante, marca_maquininha, data_solicitacao, quantidade)
            VALUES (?, ?, ?, ?)";
    
    $stmt = $connection->prepare($sql);
    
    $stmt->bindParam(1, $_POST["nome_solicitante"]);
    $stmt->bindParam(2, $_POST["marca_maquininha"]);
    $stmt->bindParam(3, $_POST["data_solicitacao"]);
    $stmt->bindParam(4, $_POST["quantidade"]);
    
    $stmt->execute();
        
    if( $stmt->errorCode() != "00000" )
    {
        echo "Erro código " . $stmt->errorCode() . ": ";
        echo implode(", ", $stmt->errorInfo());
        
    }
   
?>