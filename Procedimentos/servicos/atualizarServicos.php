<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/servicos.php";


$obj = new servicos();



$dados = array(
$_POST['idservicoU'],
$_POST['StatusSelectU'],
$_POST['ServicoU'],
$_POST['GarantiaU'],
$_POST['precoU']
);

echo $obj-> editarServico($dados);

 ?>