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
			<h3 align="center">OPÇÕES DE FORNECEDORES</h3>
			<br>
			<div class="row">
				<div class="col-sm-4" align="center">
					<form id="frmFornecedores">
						<br>
						<label>Razão Social</label>
						<input type="text" class="form-control input-sm align" id="razaosocial" name="razaosocial">
						<br>
						<label>Endereço</label>
						<input type="text" class="form-control input-sm align" id="endereco" name="endereco">
						<br>
						<label>Email</label>
						<input type="text" class="form-control input-sm align" id="email" name="email">
						<br>
						<label>Telefone</label>
						<input type="text" class="form-control input-sm align" id="telefone" name="telefone">
						<br>						
						<label>CNPJ</label>
						<input type="text" class="form-control input-sm align" id="cnpj" name="cnpj">
		
						<p></p>
						<span class="btn btn-primary" id="btnAdicionarFornecedor">Cadastrar Fornecedor</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tabelaFornecedoresLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="abremodalFornecedoresUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Editar Fornecedor</h4>
					</div>
					<div class="modal-body">
						<form id="frmFornecedoresU">
							<input type="text" hidden="" id="idfornecedorU" name="idfornecedorU">
							<label>Razão Social</label>
							<input type="text" class="form-control input-sm" id="razaosocialU" name="razaosocialU">
							<br>
							<label>Endereço</label>
							<input type="text" class="form-control input-sm" id="enderecoU" name="enderecoU">	
							<br>	
							<label>Email</label>
							<input type="text" class="form-control input-sm" id="emailU" name="emailU">	  <br>	
							<label>Telefone</label>
							<input type="text" class="form-control input-sm" id="telefoneU" name="telefoneU">
							<br>
							<label>CNPJ</label>
							<input type="text" class="form-control input-sm" id="cnpjU" name="cnpjU">
												
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAdicionarFornecedorU" type="button" class="btn btn-warning" data-dismiss="modal">Editar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function adicionarDado(idfornecedor){

			$.ajax({
				type:"POST",
				data:"idfornecedor=" + idfornecedor,
				url:"../Procedimentos/fornecedores/obterDadosFornecedor.php",
				success:function(r){

					dado=jQuery.parseJSON(r);


					$('#idfornecedorU').val(dado['ID_Fornecedor']);
					$('#razaosocialU').val(dado['RazaoSocial']);
					$('#enderecoU').val(dado['Endereco']);
				    $('#emailU').val(dado['Email']);
					$('#telefoneU').val(dado['Telefone']);
					$('#cnpjU').val(dado['CNPJ']);


				}
			});
		}

		function eliminarFornecedor(idfornecedor){
			alertify.confirm('ATENÇÃO','Realmente deseja Excluir?', function(){ 
				$.ajax({
					type:"POST",
					data:"idfornecedor=" + idfornecedor,
					url:"../Procedimentos/fornecedores/deletarFornecedores.php",
					success:function(r){
						if(r==1){
							$('#tabelaFornecedoresLoad').load("fornecedores/tabelaFornecedores.php");
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

			$('#tabelaFornecedoresLoad').load("fornecedores/tabelaFornecedores.php");

			$('#btnAdicionarFornecedor').click(function(){

				vazios=validarFormVazio('frmFornecedores');

				if(vazios > 0){
					alertify.alert("ATENÇÃO","Preencha todos os Campos");
					return false;
				}

				dados=$('#frmFornecedores').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/fornecedores/adicionarFornecedores.php",
					success:function(r){

						if(r==1){
							$('#frmFornecedores')[0].reset();
							$('#tabelaFornecedoresLoad').load("fornecedores/tabelaFornecedores.php");
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
			$('#btnAdicionarFornecedorU').click(function(){
				dados=$('#frmFornecedoresU').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/fornecedores/atualizarFornecedores.php",
					success:function(r){

						if(r==1){
							$('#frmFornecedores')[0].reset();
							$('#tabelaFornecedoresLoad').load("fornecedores/tabelaFornecedores.php");
							alertify.success("Editado com Sucesso");
						}else{
							alertify.error("Não foi possível Editar");
						}
					}
				});
			})
		})
	</script>


	<?php 
}else{
	header("location:../index.php");
}
?>