<?php 

session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/servicos.php";


$obj = new servicos();

echo json_encode($obj->obterDadosServicos($_POST['idservico']));

?>