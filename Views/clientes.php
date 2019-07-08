<!-- VERIFICA SESSÃO LOGADA --> 
<?php 
session_start();
if(isset($_SESSION['User'])){

?>


	<!DOCTYPE html>

	<html>

<!-- REFERÊNCIAS --> 
	<link rel="stylesheet" type="text/css" href="../css/ERP.css">

<!-- TOPO --> 	
	<head>
		<title>ERP Nserv</title>
		<?php require_once "menu.php"; ?>
	</head>

<!-- MEIO --> 
	<body>
		<div class="container">

<!-- TITULO PÁGINA --> 
			<br>
			<h3 align="center">OPÇÕES DE CLIENTES</h3>
			<br>

<!-- FORMULÁRIO DE CADASTRO CLIENTES --> 
			<div class="row">
				<div class="col-sm-4" align="center">
					<form id="frmClientes">
						<br>
						<label class="required">NOME</label>
						<input type="text" class="form-control input-sm align" id="nome" name="nome">
						<br>
						<label class="required">SOBRENOME</label>
						<input type="text" class="form-control input-sm align" id="sobrenome" name="sobrenome">
						<br>
						<label>ENDEREÇO</label>
						<input type="text" class="form-control input-sm align" id="endereco" name="endereco">
						<br>
						<label>TELEFONE</label>
						<input type="text" class="form-control input-sm align" id="telefone" name="telefone">
						<br>
						<label class="required">CELULAR</label>			
						<input type="text" class="form-control input-sm align" id="celular" name="celular">
						<br>
						<label>EMAIL</label>
						<input type="text" class="form-control input-sm align" id="email" name="email">		
						<p></p>
						<span class="btn btn-primary" id="btnAdicionarCliente">Cadastrar Cliente</span>
					</form>
				</div>

<!-- CARREGA PAGINA TABELA CLIENTES --> 
				<div class="col-sm-8">
					<div id="tabelaClientesLoad"></div>
				</div>
			</div>
		</div>

<!-- MODAL EDIÇÃO -->
		<div class="modal fade" id="abremodalClientesUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Editar Cliente</h4>
					</div>
					<div class="modal-body">
						<form id="frmClientesU">
							<input type="text" hidden="" id="idclienteU" name="idclienteU">
							<label>NOME</label>
							<input type="text" class="form-control input-sm" id="nomeU" name="nomeU">
							<br>
							<label>SOBRENOME</label>
							<input type="text" class="form-control input-sm" id="sobrenomeU" name="sobrenomeU">
							<br>
							<label>ENDEREÇO</label>
							<input type="text" class="form-control input-sm" id="enderecoU" name="enderecoU">	
							<br>						
							<label>TELEFONE</label>
							<input type="text" class="form-control input-sm" id="telefoneU" name="telefoneU">
							<br>
							<label>CELULAR</label>
							<input type="text" class="form-control input-sm" id="celularU" name="celularU">
							<br>
							<label>EMAIL</label>
							<input type="text" class="form-control input-sm" id="emailU" name="emailU">
						</form>
					</div>

					<!-- BOTÃO EDITAR --> 
					<div class="modal-footer">
						<button id="btnAdicionarClienteU" type="button" class="btn btn-warning" data-dismiss="modal">Editar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>


<!-- SCRIPT FUNCIONALIDADES --> 
	<script type="text/javascript">
		function adicionarDado(idcliente){

			$.ajax({
				type:"POST",
				data:"idcliente=" + idcliente,
				url:"../Procedimentos/clientes/obterDadosCliente.php",
				success:function(r){

					dado=jQuery.parseJSON(r);


					$('#idclienteU').val(dado['ID_Cliente']);
					$('#nomeU').val(dado['Nome']);
					$('#sobrenomeU').val(dado['Sobrenome']);
					$('#enderecoU').val(dado['Endereco']);
					$('#telefoneU').val(dado['Telefone']);
					$('#celularU').val(dado['Celular']);
				    $('#emailU').val(dado['Email']);

				}
			});
		}

		function eliminarCliente(idcliente){
			alertify.confirm('ATENÇÃO','Realmente deseja Excluir?', function(){ 
				$.ajax({
					type:"POST",
					data:"idcliente=" + idcliente,
					url:"../Procedimentos/clientes/deletarClientes.php",
					success:function(r){
						if(r==1){
							$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");
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

			$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");

			$('#btnAdicionarCliente').click(function(){

				var nome = frmClientes.nome.value;
				var sobrenome = frmClientes.sobrenome.value;
				var celular = frmClientes.celular.value;

				
				if(nome == ""){
					alertify.alert("ATENÇÃO","Preencha o Campo Nome");
					return false;
				}if(sobrenome == ""){
					alertify.alert("ATENÇÃO","Preencha o Campo Sobrenome");
					return false;
				}if(celular == ""){
				    alertify.alert("ATENÇÃO","Preencha o Campo Celular");
				    return false;
			}

				dados=$('#frmClientes').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/clientes/adicionarClientes.php",
					success:function(r){

						if(r==1){
							$('#frmClientes')[0].reset();
							$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");
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
			$('#btnAdicionarClienteU').click(function(){
				dados=$('#frmClientesU').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/clientes/atualizarClientes.php",
					success:function(r){

						if(r==1){
							$('#frmClientes')[0].reset();
							$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");
							alertify.success("Editado com Sucesso");
						}else{
							alertify.error("Não foi possível Editar");
						}
					}
				});
			})
		})
	</script>


<!-- RETORNA PAGINA INICIAL --> 
	<?php 
}else{
	header("location:../index.php");
}
?>