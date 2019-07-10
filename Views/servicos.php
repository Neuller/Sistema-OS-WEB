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

		$sql="SELECT ID_Status, Nome_Status FROM status";

		$result=mysqli_query($conexao,$sql);

		?>

</head>

<body>

	<div class="container">

		 <div class="row">

		 	<div class="col-sm-12" align="center">
		 		<span class="btn btn-primary" id="novoServicoBtn">Cadastrar Serviço</span>
		 	</div>

		 </div>

		 <div class="row">

		 	<div class="col-sm-12">
		 		<div id="novoServico"></div>
		 	</div>

		 </div>

		 <div class="row">
			<br>
			<h3 align="center">TABELA DE SERVIÇOS</h3>
			<br>
		 	<div class="col-sm-12" align="center">
		 		<div id="tabelaServicosEntrada"></div>
		 	</div>

		 </div>

	</div>

	<!-- MODAL EDIÇÃO -->
		<div class="modal fade" id="atualizaServico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

			<div class="modal-dialog modal-sm" role="document">

				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">EDITAR SERVIÇO</h4>
					</div>

					<div class="modal-body">
						<form id="frmServicoU">
							<input type="text" hidden="" id="idservicoU" name="idservicoU">
							<label style="padding-bottom: 5px;">STATUS</label>
							<select class="form-control input-sm" id="StatusSelectU" name="StatusSelectU">
								<option value="A">Selecione um Status</option>
								<?php 
								$sql="SELECT ID_Status, Nome_Status FROM status";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<br>	
							<label style="padding-bottom: 5px;">SERVIÇO EXECUTADO</label>
							<input type="text" class="form-control input-sm" id="ServicoU" name="ServicoU">
							<br>
							<label style="padding-bottom: 5px;">GARANTIA</label>
							<select class="form-control input-sm" id="GarantiaU" name="GarantiaU">
				            <option value="Funcional">Funcional</option>
				            <option value="30 Dias">30 Dias</option>
				            <option value="90 Dias">90 Dias</option>
				            <option value="06 Meses">06 Meses</option>
				            <option value="12 Meses">12 Meses</option>
				            </select>
							<br>
							<label style="padding-bottom: 5px;">VALOR TOTAL</label>
							<input type="text" class="form-control input-sm" id="precoU" name="precoU">
							<br>	
						</form>
					</div>

					<div class="modal-footer">
						<button type="button" id="btnAtualizaServico" class="btn btn-warning" data-dismiss="modal">Editar</button>
					</div>

				</div>

			</div>

		</div>
		<!-- FIM MODAL EDIÇÃO -->

		<!-- MODAL VISUALIZAÇÃO -->
		<div class="modal fade" id="visualizarServico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

			<div class="modal-dialog modal-sm" role="document">

				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">VISUALIZAR DETALHES</h4>
					</div>

					<div class="modal-body">
						<form id="frmVisualizaServico">
							<input readonly="" type="text" hidden="" id="idservicoV" name="idservicoV">	
							<label>EQUIPAMENTO</label>
							<input readonly="" type="text" class="form-control input-sm" id="equipamentoV" name="equipamentoV">
							<br>
							<label>OBSERVAÇÃO</label>
							<input readonly="" type="text" class="form-control input-sm" id="infoV" name="infoV">
							<br>
							<label>SERVIÇO EXECUTADO</label>
							<input readonly="" type="text" class="form-control input-sm" id="ServicoV" name="ServicoV">
							<br>
							<label>GARANTIA</label>
							<input readonly="" type="text" class="form-control input-sm" id="GarantiaV" name="GarantiaV">
							<br>
							<label>VALOR TOTAL</label>
							<input readonly="" type="text" class="form-control input-sm" id="precoV" name="precoV">
							<br>	
						</form>
					</div>

				</div>

			</div>

		</div>
		<!-- FIM MODAL VISUALIZAÇÃO -->

</body>

</html>
	
	<script type="text/javascript">
		
		$(document).ready(function(){

            $('#tabelaServicosEntrada').load('servicos/tabelaServicosEntrada.php');

			$('#novoServicoBtn').click(function(){

				$('#novoServico').load('servicos/cadastrarServico.php');
				$('#novoServico').show();

		});

		});

		function esconderSessao(){
			
			$('#novoServico').hide();
		}

	</script>

	<script type="text/javascript">

		function adicionarDadoU(idservico){

			$.ajax({
				type:"POST",
				data:"idservico=" + idservico,
				url:"../Procedimentos/servicos/obterDadosServicos.php",
				success:function(r){

					dado=jQuery.parseJSON(r);


					$('#idservicoU').val(dado['ID_Servico']);
					$('#StatusSelectU').val(dado['ID_Status']);
					$('#ServicoU').val(dado['Servico']);
					$('#GarantiaU').val(dado['Garantia']);
					$('#precoU').val(dado['Preco']);

				}
			});
		}

		function visualizaDado(idservico){

			$.ajax({
				type:"POST",
				data:"idservico=" + idservico,
				url:"../Procedimentos/servicos/obterDadosServicos.php",
				success:function(r){

					dado=jQuery.parseJSON(r);


					$('#idservicoV').val(dado['ID_Servico']);
					$('#equipamentoV').val(dado['Equipamento']);
					$('#infoV').val(dado['Info']);
					$('#ServicoV').val(dado['Servico']);
					$('#GarantiaV').val(dado['Garantia']);
					$('#precoV').val(dado['Preco']);

				}
			});
		}

		$(document).ready(function(){
			$('#btnAtualizaServico').click(function(){

				dados=$('#frmServicoU').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/servicos/atualizarServicos.php",
					success:function(r){
						if(r==1){
							$('#tabelaServicosEntrada').load("servicos/tabelaServicosEntrada.php");
							alertify.success("Editado com Sucesso");
						}else{
							alertify.error("Não foi possível Editar");
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