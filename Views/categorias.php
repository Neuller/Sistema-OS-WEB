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
			<h3 align="center">OPÇÕES DE CATEGORIAS</h3>
			<br>
			<div class="row">
				<div class="col-sm-4" align="center">
					<form id="frmCategorias">					
						<br>
						<label class="required">NOME</label>
						<input type="text" class="form-control input-sm align" name="categoria" id="categoria">
						<p></p>
						<span class="btn btn-primary" id="btnAdicionarCategoria">Cadastrar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tabelaCategoriaLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- MODAL EDIÇÃO -->
		<div class="modal fade" id="atualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Editar</h4>
					</div>
					<div class="modal-body">
						<form id="frmCategoriaU">
							<br>
							<input type="text" hidden="" id="idcategoria" name="idcategoria">
						    <label class="required">NOME</label>			
							<input type="text" id="categoriaU" name="categoriaU" class="form-control input-sm">
							<br>
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnAtualizaCategoria" class="btn btn-warning" data-dismiss="modal">Editar</button>

					</div>
				</div>
			</div>
		</div>
		<!-- FIM MODAL EDIÇÃO -->

	</body>
	</html>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tabelaCategoriaLoad').load("categorias/tabelaCategorias.php");

			$('#btnAdicionarCategoria').click(function(){

				vazios=validarFormVazio('frmCategorias');

				if(vazios > 0){
					alertify.alert("ATENÇÃO","Preencha o campo vazio");
					return false;
				}

				dados=$('#frmCategorias').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/categorias/adicionarCategorias.php",
					success:function(r){
						if(r==1){
					//limpar formulário
					$('#frmCategorias')[0].reset();

					$('#tabelaCategoriaLoad').load("categorias/tabelaCategorias.php");
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
			$('#btnAtualizaCategoria').click(function(){

				dados=$('#frmCategoriaU').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/categorias/atualizarCategorias.php",
					success:function(r){
						if(r==1){
							$('#tabelaCategoriaLoad').load("categorias/tabelaCategorias.php");
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

		function adicionarDado(idcategoria,categoria){
			$('#idcategoria').val(idcategoria);
			$('#categoriaU').val(categoria);
		}

		function eliminarCategoria(idcategoria){
			alertify.confirm('ATENÇÃO','Realmente deseja Excluir?', function(){ 
				$.ajax({
					type:"POST",
					data:"idcategoria=" + idcategoria,
					url:"../Procedimentos/categorias/deletarCategorias.php",
					success:function(r){
						if(r==1){
							$('#tabelaCategoriaLoad').load("categorias/tabelaCategorias.php");
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