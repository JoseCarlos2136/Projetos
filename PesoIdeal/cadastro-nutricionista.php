<?php 
   require 'conexao.php';
	// Menssagem de erro primeiro vai receber o valor nulo e a variável validar vai receber o valor falso.
	$erro=null;
	$validar=false;
	//$resultado = $connection->prepare("SELECT id FROM user WHERE crn = :crn LIMIT 1");
	//$crn = $_POST['crn'];
	//$resultado->bindparam('crn',$crn,PDO::PARAM_STR);
	//$resultado->execute();
	//$registro = $resultado->fetchAll();
	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true)
	{
		$resultado = $connection->prepare("SELECT id FROM user WHERE crn = :crn LIMIT 1");
		$crn = $_POST['crn'];
		$resultado->bindparam('crn',$crn,PDO::PARAM_STR);
		$resultado->execute();

		//Tratamento de Erro
		if(strlen(utf8_decode($_POST["nome"]))<=3)
    	{
       	  $erro="Preencha o campo Nome do Usuário corretamente (3 ou mais caracteres)";
    	}
    	else if(is_numeric($_POST["nome"]) == true)
   		{
   	     $erro = "Campo: Nome do Solicitante não pode conter Números";  
    	}
    	 else if(strlen(utf8_decode($_POST["crn"]))==7)
    	{
       	  $erro="Preencha o campo Crn do Usuário corretamente (8 ou mais caracteres)";
    	}
    	else if(is_numeric($_POST["crn"]) == false)
   		{
   	     $erro = "Campo: CRN só pode conter Números";  
    	}
    	 else if(strlen(utf8_decode($_POST["senha"]))<=7)
    	{
       	  $erro="Preencha o campo Senha do Usuário corretamente (8 ou mais caracteres)";
    	}

    	// verifica se já tem um Usuário válido
    	else if($resultado->rowCount() == '1') {
    		
    		$erro="Usuário Já existente ";
    	}

    	else
    {
        $validar=true;
        require 'conexao.php';
        
        $sql = "INSERT INTO user (nome, crn, email, senha)
        VALUES (?, ?, ?, ?)";

       $stmt = $connection->prepare($sql);
       $senha = MD5($_POST['senha']);
       $stmt->bindParam(1, $_POST["nome"]);
       $stmt->bindParam(2, $_POST["crn"]);
       $stmt->bindParam(3, $_POST["email"]);
       $stmt->bindParam(4, $senha);

       //Cria uma nova tabela toda vez que um usuário é Cadastrado

       $novaTabela = "CREATE TABLE crn".$crn." (
       id int UNSIGNED NOT NULL AUTO_INCREMENT, 
       nome varchar(60) not null, 
       data_nasc date not null, 
       peso float(3) not null, 
       altura float(3) not null, 
       idade tinyint UNSIGNED not null, 
       imc float(5) not null, 
       sexo char(9) not null, 
       status varchar(20) not null, 
       data datetime not null, 
       Primary Key (id));";
       $criarTabela=$connection->prepare($novaTabela);
       $criarTabela->execute();
       $stmt->execute();
    
     if( $stmt->errorCode() != "00000" )
     {
       $validar = false;
       echo "Erro código " . $stmt->errorCode() . ": ";
       echo implode(", ", $stmt->errorInfo());
     }
    }
	}
?>