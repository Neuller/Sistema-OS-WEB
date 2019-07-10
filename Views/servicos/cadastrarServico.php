<?php 

require_once "../../Classes/Conexao.php";

	$c= new conectar();
	$conexao=$c->conexao();
?>

<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../css/ERP.css">

<script src="../../lib/bootstrap/js/bootstrap.js"></script>

<br>

<div class="row">
	<div class="col-4 mx-auto align" align="center">
		<form id="frmNovoServico">
			<label>SELECIONE UM CLIENTE</label>
			<select class="form-control input-sm" id="clienteSelect" name="clienteSelect">
				<option value="A">Selecionar</option>
				<option value="0">Sem Cliente</option>
				<?php

				$sql="SELECT ID_Cliente, Nome, Sobrenome FROM clientes ORDER BY ID_CLIENTE DESC";

				$result=mysqli_query($conexao,$sql);

				while ($cliente=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1]." ".$cliente[2] ?></option>
				<?php endwhile; ?>
			</select>
			<br>

			<label>SELECIONE UM STATUS</label>
			<select class="form-control input-sm" id="StatusSelect" name="StatusSelect">
				<?php

				$sql="SELECT ID_Status, Nome_Status FROM status";

				$result=mysqli_query($conexao,$sql);

				while ($Nome=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $Nome[0] ?>"><?php echo $Nome[1] ?></option>
				<?php endwhile; ?>
			</select>
			<br>



			<label class="required">EQUIPAMENTO</label>
			<input type="text" class="form-control input-sm" id="equipamento" name="equipamento">
			<br>
			<label>OBSERVAÇÃO</label>
			<textarea type="text" class="form-control input-sm" id="informacao" name="informacao" rows="2" />
			<br>
			<label class="required">NÚMERO SERIAL</label>
			<input type="text" class="form-control input-sm" id="serialnumber" name="serialnumber">
			<p></p>
			<span class="btn btn-success" id="btnAddServico">Cadastrar</span>
			<span class="btn btn-danger" id="btnCancelarServico">Cancelar</span>
		</form>
	</div>
</div>


<script type="text/javascript">

		$(document).ready(function(){

			$('#btnCancelarServico').click(function(){

				esconderSessao();

		    });

			$('#btnAddServico').click(function(){

				var equipamento = frmNovoServico.equipamento.value;
				var serialnumber = frmNovoServico.serialnumber.value;
				
				if(equipamento == ""){
				    alertify.alert("ATENÇÃO","Preencha o Campo Equipamento");
				    return false;
				}if(serialnumber == ""){
				    alertify.alert("ATENÇÃO","Preencha o Campo Número de Serial");
				    return false;
			}

				dados=$('#frmNovoServico').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../Procedimentos/servicos/cadastrarServico.php",
					success:function(r){

						if(r==1){
							$('#frmNovoServico')[0].reset();
							alertify.success("Cadastro com Sucesso");
							$('#tabelaServicosEntrada').load('servicos/tabelaServicosEntrada.php');
							esconderSessao();
						}else{
							alertify.error("Não foi possível Cadastrar");
						}
					}
				});
			});
		});
	</script>

