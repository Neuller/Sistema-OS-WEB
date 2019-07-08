<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/clientes.php";

$id = $_POST['idcliente'];

$obj = new clientes();

echo $obj->excluirCliente($id);

?>