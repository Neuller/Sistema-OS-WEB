<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/status.php";


$obj = new status();



$dados = array(
$_POST['idstatus'],
$_POST['descricaoU'],

);

echo $obj-> editarStatus($dados);

 ?>