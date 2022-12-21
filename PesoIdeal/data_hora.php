<?php

//função retorna a data atual

function retorna_data()
{
	
date_default_timezone_set('America/Sao_Paulo');
$agora = time();

$data = getdate($agora);

//condição para retornar o nome do dia e o número.

if($data["wday"]==0)  { echo "Domingo,";}
elseif($data["wday"]==1)  { echo "Segunda-feira,";}
elseif($data["wday"]==2)  { echo "Terca-feira,";}
elseif($data["wday"]==3)  { echo "Quarta-feira,";}
elseif($data["wday"]==4)  { echo "Quinta-feira,";}
elseif($data["wday"]==5)  { echo "Sexta-feira,";}
elseif($data["wday"]==6)  { echo "Sábado, ";}

//condição para retornar o mes

if($data["mon"]==1) { $mes = "Janeiro";}
elseif($data["mon"]==2) { $mes = "Fevereiro";}
elseif($data["mon"]==3) { $mes = "Março";}
elseif($data["mon"]==4) { $mes = "Abril";}
elseif($data["mon"]==5) { $mes = "Maio";}
elseif($data["mon"]==6) { $mes = "Junho";}
elseif($data["mon"]==7) { $mes = "Julho";}
elseif($data["mon"]==8) { $mes = "Agosto";}
elseif($data["mon"]==9) { $mes = "Setembro";}
elseif($data["mon"]==10) { $mes = "Outubro";}
elseif($data["mon"]==11) { $mes = "Novembro";}
elseif($data["mon"]==12) { $mes = "Dezembro";}

$data_atual = $data["mday"].  " de " .$mes." de " .$data["year"];
return $data_atual;
}

$hoje = retorna_data();

echo $hoje;

?>