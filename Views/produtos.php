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
		<?php require_once "../Classes/Conexao.php"; 

		$c= new conectar();
		$conexao=$c->conexao();

		$sql="SELECT ID_Categoria, Nome_Categoria FROM categorias";

		$result=mysqli_query($conexao,$sql);

		?>

	</head>
	<body>
		<div class="container">
			<br>
			<h3 align="center">OPÇÕES DE PRODUTOS</h3>
			<br>
			<div class="row">
				<div class="col-sm-4" align="center">
					<form id="frmProdutos" enctype="multipart/form-data">
						<br>
						<label>Categoria</label>
						<select class="form-control input-sm align" id="categoriaSelect" name="categoriaSelect">
							<option value="A">Selecione uma Categoria</option>
							<?php while($mostrar=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
							<?php endwhile; ?>
						</select>
						<br>
						<label>Nome</label>
						<input type="text" class="form-control input-sm align" id="nome" name="nome">
						<br>
						<label>Descrição</label>
						<input type="text" class="form-control input-sm align" id="descricao" name="descricao">
						<br>
						<label>Quantidade</label>
						<input type="text" class="form-control input-sm align" id="quantidade" name="quantidade">
						<br>
						<label>Preço</label>
						<input type="text" class="form-control input-sm align" id="preco" name="preco">
						<br>
						<label>Imagem</label>
						<input type="file" id="imagem" name="imagem">
						<br>
						<p></p>
						<span id="btnAddProduto" class="btn btn-primary">Cadastrar Produto</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tabelaProdutosLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="abremodalUpdateProduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Editar Produto</h4>
					</div>
					<div class="modal-body">
						<form id="frmProdutosU" enctype="multipart/form-data">
							<input type="text" id="idProduto" hidden="" name="idProduto">
							<label>Categoria</label>
							<select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
								<option value="A">Selecione uma Categoria</option>
								<?php 
								$sql="SELECT ID_Categoria, Nome_Categoria FROM categorias";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<br>
							<label>Nome</label>
							<input type="text" class="form-control input-sm" id="nomeU" name="nomeU">
							<br>
							<label>Descrição</label>
							<input type="text" class="form-control input-sm" id="descricaoU" name="descricaoU">
							<br>
							<label>Quantidade</label>
							<input type="text" class="form-control input-sm" id="quantidadeU" name="quantidadeU">
							<br>
							<label>Preço</label>
							<input type="text" class="form-control input-sm" id="precoU" name="precoU">
							
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAtualizarProduto" type="button" class="btn btn-warning" data-dismiss="modal">Editar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function addDadosProduto(idproduto){
			$.ajax({
				type:"POST",
				data:"idpro=" + idproduto,
				url:"../Procedimentos/produtos/obterDados.php",
				success:function(r){
					
					dado=jQuery.parseJSON(r);
					$('#idProduto').val(dado['ID_Produto']);
					$('#categoriaSelectU').val(dado['ID_Categoria']);
					$('#nomeU').val(dado['Nome']);
					$('#descricaoU').val(dado['Descricao']);
					$('#quantidadeU').val(dado['Quantidade']);
					$('#precoU').val(dado['Preco']);

				}
			});
		}

		function eliminarProduto(idProduto){
			alertify.confirm('ATENÇÃO','Realmente deseja Excluir?', function(){ 
				$.ajax({
					type:"POST",
					data:"idproduto=" + idProduto,
					url:"../Procedimentos/produtos/eliminarProdutos.php",
					success:function(r){
						if(r==1){
							$('#tabelaProdutosLoad').load("produtos/tabelaProdutos.php");
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
			$('#btnAtualizarProduto').click(function(){

				dados=$('#frmProdutosU').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/produtos/atualizarProdutos.php",
					success:function(r){
						if(r==1){
							$('#tabelaProdutosLoad').load("produtos/tabelaProdutos.php");
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

			$('#tabelaProdutosLoad').load("produtos/tabelaProdutos.php");

			$('#btnAddProduto').click(function(){

				vazios=validarFormVazio('frmProdutos');

				if(vazios > 0){
					alertify.alert("ATENÇÃO","Preencha todos os Campos");
					return false;
				}

				var formData = new FormData(document.getElementById("frmProdutos"));

				$.ajax({

					url: "../Procedimentos/produtos/inserirProdutos.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						
						if(r == 1){
							$('#frmProdutos')[0].reset();
							$('#tabelaProdutosLoad').load("produtos/tabelaProdutos.php");
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