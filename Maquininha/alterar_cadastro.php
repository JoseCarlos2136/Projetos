<?php
 $erro=null;
 $valido=false;
 require 'ConexaoBD.php';
 
    if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true)
    {
      require 'ConexaoBD.php';
      
        if(strlen(utf8_decode($_POST["nome_solicitante"]))<3)
        {
            $erro="Preencha o campo Nome do Solicitante corretamente (3 ou mais caracteres)";
        }
        else if(is_numeric($_POST["nome_solicitante"]) == true)
        {
            $erro = "Campo: Nome do Solicitante não pode conter Números";  
        }
        else if(strlen(utf8_decode($_POST["marca_maquininha"]))<5)
        {
            $erro="Preencha o Campo Marca da Maquininha corretamente (5 ou mais caracteres)";
        }
        else if(is_numeric($_POST["marca_maquininha"]) == true)
        {
            $erro = "Campo: Marca da Maquininha não pode conter Números";  
        }
        
        else
        {
            $valido=true;
            
            $sql = "UPDATE cadastro SET
            nome_solicitante = ?,
            marca_maquininha = ?,
            data_solicitacao = ?,
            quantidade = ?
            WHERE id = ?";
    
           $stmt = $connection->prepare($sql);
    
           $stmt->bindParam(1, $_POST["nome_solicitante"]);
           $stmt->bindParam(2, $_POST["marca_maquininha"]);
           $stmt->bindParam(3, $_POST["data_solicitacao"]);
           $stmt->bindParam(4, $_POST["quantidade"]);
           $stmt->bindParam(5, $_POST["id"]);
    
           $stmt->execute();
        
         if( $stmt->errorCode() != "00000" )
         {
           $valido = false;
           echo "Erro código " . $stmt->errorCode() . ": ";
           echo implode(", ", $stmt->errorInfo());
        
         }
        }
    }
    else
    {
        $rs= $connection->prepare("SELECT * FROM cadastro WHERE id = ?");
        $rs->bindParam(1,$_REQUEST["id"]);
        
        if($rs->execute())
        {
            if($registro = $rs->fetch(PDO::FETCH_OBJ))
            {
                $_POST["nome_solicitante"] = $registro->nome_solicitante;
                $_POST["marca_maquininha"] = $registro->marca_maquininha;
                $_POST["data_solicitacao"] = $registro->data_solicitacao;
                $_POST["quantidade"] = $registro->quantidade;
            }
            else
            {
                $erro = "Registro Não Encontrado";    
            }
        }
        else
        {
           $erro = "Falha na Captura do Registro"; 
        }
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Maquinha</title>
            <link href="css/alterar_cadastro.css" type="text/css" rel="stylesheet"/>
        </head>
        <body>

                <div id="solicitante">
                    <p><h3 class="inserir">Alterar dados do Solicitante da Maquininha</h3></p>
                    <hr/><br/></br>
                    <form action="?validar=true&id=<?php echo $_REQUEST["id"];?>" method="POST">
                         <div id="formNome">
                            <label for="Cnome" class="dado">Nome do Solicitante</label>
                            <input type="text" class="inputNome" name="nome_solicitante" <?php if(isset($_POST["nome_solicitante"])){ echo "value='" .$_POST["nome_solicitante"]. "'"; } ?>id="Cnome" maxlength="50"/>
                        </div>
                        <div id= "formMarca">
                            <label for="Cmarca" class="dado">Marca da Maquininha</label>
                            <input type="text" class="inputMarca" name="marca_maquininha" <?php if(isset($_POST["marca_maquininha"])){ echo "value='" .$_POST["marca_maquininha"]. "'"; } ?> id="Cmarca" maxlength="50"/>
                        </div>
                        <div id="formData">
                             <label for="Csolicit" class="dado">Data da Solicitação</label>
                            <input type="date" class="inputData" name="data_solicitacao" <?php if(isset($_POST["data_solicitacao"])){ echo "value='" .$_POST["data_solicitacao"]. "'"; } ?>   id="Csolicit"/>
                        </div>
                        <div id="formQtd">
                            <label for="Cqtd" class="dado">Quantidade</label>
                            <input type="number" min="1" max="999" class="inputQtd" name="quantidade" <?php if(isset($_POST["quantidade"])){ echo "value='" .$_POST["quantidade"]. "'"; } ?> id="Cqtd"/>
                        </div>
                        <div id="botaoSub">
                            <input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>">
                            <input class="subCadastrar" type="submit" value="Gravar" id="subimit"/>
                        </div>
                    </form>
                 <?php
                       
                     if($valido == true)
                    {
                       echo "<div id='mensagem_sucesso'><p class='psucesso'>Dados Alterados  com sucesso ! ! !</p></div>";
                        
                    }
                    else
                    {
                      if(isset($erro))
                     {
                      echo "<div id='mensagem_Error'><p class='pmensagem_error'>" .$erro."</p></div>"; 
                     }
                    } 
                 ?>
                 </div>
        </body>
    </html>