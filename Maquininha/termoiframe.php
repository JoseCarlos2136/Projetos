<!DOCTYPE html>
    <html lang="pt-BR">
        <head>
            <meta charset=utf-8>
            <meta name="description content="">
            <link href="bootstrap/css/bootstrap-responsive.css" type="text/css" rel="stylesheet"/>
            <link href="bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet"/>
            
            <title></title>
            <link href="css/termoiframe.css" type="text/css" rel="stylesheet"/>
        </head>
        <body>
            <div id="tabela">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome do Solicitante</th>
                            <th>Marca da Maquininha</th>
                            <th>Data da Solicitação</th>
                            <th>Quantidade</th>
                            <th class="acao">Termo</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <table class="table1">
<?php
    require 'ConexaoBD.php';
    
    if(isset($_REQUEST["excluir"]) && $_REQUEST["excluir"] ==true)
    {
        $stmt = $connection->prepare("DELETE FROM cadastro WHERE id = ?");
        $stmt->bindparam(1, $_REQUEST["id"]);
        $stmt->execute();
        
        if($stmt->errorCode() !="00000")
        {
            echo"errocódigo" .$stmt->errorCoder() .":";
            echo implode(",",$stmt->errorInfo());
        }
        else
        {
            
        }
    }
    
        $rs = $connection->prepare("SELECT * FROM cadastro");
    
    if($rs->execute())
    {
        while($registro = $rs->fetch(PDO::FETCH_OBJ))
        {
           
                echo "<tr class='efeito'>";
                
                    echo "<td class='tdnome'>" .$registro->nome_solicitante."</td>";
                    echo "<td class='tdmarca'>" .$registro->marca_maquininha."</td>";
                    echo "<td class='tddata'>" .$registro->data_solicitacao."</td>";
                    echo "<td class='tdqtd'>" .$registro->quantidade."</td>";
                    echo "<td class='tdacao'> <a href='#'><img class='resp_termo' src='img/termo.png' title='Imprimir Temo de Responsabilidade'/></td>";
                
                echo "</tr>";
        }
    }   
?>                
            </table>
        </body>
    </html>   