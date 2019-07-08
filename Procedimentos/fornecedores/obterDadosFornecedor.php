<?php 

session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/fornecedores.php";


$obj = new fornecedores();

echo json_encode($obj->obterDadosFornecedor($_POST['idfornecedor']));

?>