<?php 

session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/categorias.php";

$data = date("Y-m-d");
$idusuario = $_SESSION['IDUser'];
$categoria = $_POST['categoria'];

$obj = new categorias();



$dados = array(
$idusuario,
$categoria,
$data
);

echo $obj-> adicionarCategoria($dados);

 ?>