<?php 

session_start();
if(isset($_SESSION['User'])){

	?>

<!DOCTYPE html>
	<html>
	<head>
		<title>ERP Nserv</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		<div class="container">
			<br>
			<h3 align="center">OPÇÕES DE USUÁRIOS</h3>
			<br>
			<div class="row">
				<div class="col-sm-4" align="center">
					<form id="frmRegistro">
						<br>
						<label>Usuário</label>
						<input type="text" class="form-control input-sm" name="usuario" id="usuario">
						<br>
						<label>Nome</label>
						<input type="text" class="form-control input-sm" name="nome" id="nome">
						<br>
						<label>Email</label>
						<input type="text" class="form-control input-sm" name="email" id="email">
						<br>
						<label>Senha</label>
						<input type="text" class="form-control input-sm" name="senha" id="senha">
						<p></p>
						<span class="btn btn-primary" id="registro">Cadastrar Usuário</span>

					</form>
				</div>
				<div class="col-sm-7">
					<div id="tabelaUsuariosLoad"></div>
				</div>
			</div>
		</div>


		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="atualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Editar Usuário</h4>
					</div>
					<div class="modal-body">
						<form id="frmRegistroU">
							<input type="text" hidden="" id="idUsuario" name="idUsuario">
							<label>Nome</label>
							<input type="text" class="form-control input-sm" name="nomeU" id="nomeU">
							<br>
							<label>Usuário</label>
							<input type="text" class="form-control input-sm" name="usuarioU" id="usuarioU">
							<br>
							<label>Email</label>
							<input type="text" class="form-control input-sm" name="emailU" id="emailU">

						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAtualizaUsuario" type="button" class="btn btn-warning" data-dismiss="modal">Editar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function adicionarDados(idusuario){

			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"../Procedimentos/usuarios/obterDados.php",
				success:function(r){

					dado=jQuery.parseJSON(r);

					$('#idUsuario').val(dado['ID']);
					$('#usuarioU').val(dado['usuario']);
					$('#nomeU').val(dado['nome']);
					$('#emailU').val(dado['email']);
				}
			});
		}

		function eliminarUsuario(idusuario){
			alertify.confirm('ATENÇÃO','Realmente deseja Excluir?', function(){ 
				$.ajax({
					type:"POST",
					data:"idusuario=" + idusuario,
					url:"../Procedimentos/usuarios/eliminarUsuario.php",
					success:function(r){
						if(r==1){
							$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');
							alertify.success("Excluído com Sucesso");
						}else{
							alertify.error("Erro ao Excluir");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelado')
			});
		}


	</script>

	<script type="text/javascript">

		$(document).ready(function(){

			$('#btnAtualizaUsuario').click(function(){

				dados=$('#frmRegistroU').serialize();

				$.ajax({

					type:"POST",
					data:dados,
					url:"../Procedimentos/usuarios/atualizarUsuario.php",

					success:function(r){

						if(r==1){
							$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');
							alertify.success("Editado com Sucesso");
						}else{
							alertify.error("Não foi possível Editar");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');

			$('#registro').click(function(){

				vazios=validarFormVazio('frmRegistro');

				if(vazios > 0){
					alertify.alert("ATENÇÃO","Preencha todos os Campos");
					return false;
				}

				datos=$('#frmRegistro').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/login/registrarUsuarios.php",
					success:function(r){
						//alert(r);

						if(r==1){
							$('#frmRegistro')[0].reset();
							$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');
							alertify.success("Cadastro com Sucesso");
						}else{
							alertify.error("Não foi possível Cadastrar");
						}
					}
				});
			});
		});
	</script>

<?php

	}else{
	header("location:../index.php");
}
?>