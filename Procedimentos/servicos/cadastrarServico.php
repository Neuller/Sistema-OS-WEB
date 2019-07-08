<?php 

session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/servicos.php";


$idusuario = $_SESSION['IDUser'];
$idcliente = $_POST['clienteSelect'];
$idstatus = $_POST['StatusSelect'];


$obj = new servicos();

$dados = array(
$idcliente,
$idusuario,
$idstatus,
$_POST['equipamento'],	
$_POST['informacao'],
$_POST['serialnumber']
);

echo $obj-> adicionarServico($dados);

 ?>