<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/status.php";

$id = $_POST['idstatus'];

$obj = new status();

echo $obj->excluirStatus($id);

?>