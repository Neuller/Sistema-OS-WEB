<?php 
session_start();
if(isset($_SESSION['User'])){

	?>


	<!DOCTYPE html>
	<html>

<link rel="stylesheet" type="text/css" href="../css/ERP.css">

	<head>
		<title>ERP Nserv</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
            <br>
			<h3 align="center">OPÇÕES STATUS SERVIÇOS</h3>
			<br>
			<div class="row">
				<div class="col-sm-4" align="center">
					<form id="frmStatus">					
						<br>
						<label class="required">DESCRIÇÃO</label>
						<input type="text" class="form-control input-sm align" name="descricao" id="descricao">
						<p></p>
						<span class="btn btn-primary" id="btnAdicionarStatus">Cadastrar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tabelaStatusLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- MODAL EDIÇÃO -->
		<div class="modal fade" id="atualizaStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Editar</h4>
					</div>
					<div class="modal-body">
						<form id="frmStatusU">
							<br>
							<input type="text" hidden="" id="idstatus" name="idstatus">
							<label class="required">DESCRIÇÃO</label>		
							<input type="text" id="descricaoU" name="descricaoU" class="form-control input-sm">
							<br>
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnAtualizaStatus" class="btn btn-warning" data-dismiss="modal">Editar</button>

					</div>
				</div>
			</div>
		</div>
		<!-- FIM MODAL EDIÇÃO -->

	</body>
	</html>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tabelaStatusLoad').load("status/tabelaStatus.php");

			$('#btnAdicionarStatus').click(function(){

				vazios=validarFormVazio('frmStatus');

				if(vazios > 0){
					alertify.alert("ATENÇÃO","Preencha o campo vazio");
					return false;
				}

				dados=$('#frmStatus').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/status/adicionarStatus.php",
					success:function(r){
						if(r==1){
					//limpar formulário
					$('#frmStatus')[0].reset();

					$('#tabelaStatusLoad').load("status/tabelaStatus.php");
					alertify.success("Cadastro com Sucesso");
				}else{
					alertify.error("Não foi possível Cadastrar");
				}
			}
		});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#btnAtualizaStatus').click(function(){

				dados=$('#frmStatusU').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/status/atualizarStatus.php",
					success:function(r){
						if(r==1){
							$('#tabelaStatusLoad').load("status/tabelaStatus.php");
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

		function adicionarDado(idstatus,descricao){
			$('#idstatus').val(idstatus);
			$('#descricaoU').val(descricao);
		}

		function eliminarStatus(idstatus){
			alertify.confirm('ATENÇÃO','Realmente deseja Excluir?', function(){ 
				$.ajax({
					type:"POST",
					data:"idstatus=" + idstatus,
					url:"../Procedimentos/status/deletarStatus.php",
					success:function(r){
						if(r==1){
							$('#tabelaStatusLoad').load("status/tabelaStatus.php");
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


<?php
	}else{
	header("location:../index.php");
}
?>