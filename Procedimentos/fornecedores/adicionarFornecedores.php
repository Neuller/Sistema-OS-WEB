<?php 

session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/fornecedores.php";


$idusuario = $_SESSION['IDUser'];


$obj = new fornecedores();


$dados = array(
$idusuario,
$_POST['razaosocial'],		
$_POST['endereco'],
$_POST['email'],		
$_POST['telefone'],		
$_POST['cnpj']
);

echo $obj-> adicionarFornecedor($dados);

 ?>