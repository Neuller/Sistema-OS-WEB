<?php 

session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/status.php";

$data = date("Y-m-d");
$idusuario = $_SESSION['IDUser'];
$descricao = $_POST['descricao'];

$obj = new status();



$dados = array(
$idusuario,
$descricao,
$data
);

echo $obj-> adicionarStatus($dados);

 ?>