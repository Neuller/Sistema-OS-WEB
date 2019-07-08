<?php

require_once "Classes/Conexao.php";
$obj = new conectar();
$conexao = $obj->Conexao();

$sql = "SELECT * from usuarios WHERE usuario = 'admin' ";
$result = mysqli_query($conexao, $sql);

$validar = 0;
if(mysqli_num_rows($result) > 0){
	header("location:index.php");
}

?>

 <!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
	

</head>
<body style="background-color: gray">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Cadastre-se Agora</div>
					<div class="panel panel-body">
						<p>
							<img src="img/Registrar.jpg"  width="100%">
						</p>
						<form id="frmRegistro">
							<br>
							<label>Nome</label>
							<input type="text" class="form-control input-sm" name="nome" id="nome">
							<br>
							<label>Usuário</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<br>
							<label>Email</label>
							<input type="text" class="form-control input-sm" name="email" id="email">
							<br>
							<label>Senha</label>
							<input type="password" class="form-control input-sm" name="senha" id="senha">
							<br>
							<p></p>
							<span class="btn btn-primary" id="registro">Registrar</span>
							<a href="index.php" class="btn btn-default">Voltar</a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){

			vazios=validarFormVazio('frmRegistro');

			if(vazios > 0){
				alert("Preencha todos os Campos");
				return false;
			}

			dados=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:dados,
				url:"Procedimentos/login/registrarUsuarios.php",
				success:function(r){
					//alert(r);

					if(r==1){
					alert("Cadastro Realizado com Sucesso");
					$('#frmRegistro')[0].reset();
					window.location="index.php";
					}else{
					alert("Erro ao Cadastrar");
					$('#frmRegistro')[0].reset();
					}
				}
			});
		});
	});
</script>
