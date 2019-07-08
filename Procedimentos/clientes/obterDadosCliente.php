<?php 

session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/clientes.php";


$obj = new clientes();

echo json_encode($obj->obterDadosCliente($_POST['idcliente']));

?>