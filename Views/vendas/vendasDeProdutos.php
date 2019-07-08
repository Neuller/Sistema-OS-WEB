<?php 

require_once "../../Classes/Conexao.php";

	$c= new conectar();
	$conexao=$c->conexao();
?>
<br>
<div class="row">
	<div class="col-sm-4" align="center">
		<form id="frmVendasProdutos">
			<label>Selecione um Cliente</label>
			<select class="form-control input-sm" id="clienteVenda" name="clienteVenda">
				<option value="A">Selecionar</option>
				<option value="0">Sem Cliente</option>
				<?php

				$sql="SELECT ID_Cliente, Nome, Sobrenome FROM clientes";

				$result=mysqli_query($conexao,$sql);

				while ($cliente=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1]." ".$cliente[2] ?></option>
				<?php endwhile; ?>
			</select>
			<br>
			<br>
			<label>Selecione um Produto</label>
			<select class="form-control input-sm" id="produtoVenda" name="produtoVenda">
				<option value="A">Selecionar</option>
				<?php

				$sql="SELECT ID_Produto, Nome FROM produtos";

				$result=mysqli_query($conexao,$sql);

				while ($produto=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $produto[0] ?>"><?php echo $produto[1] ?></option>
				<?php endwhile; ?>
			</select>
			<br>
			<br>
			<label>Descrição</label>
			<textarea readonly="" id="descricaoV" name="descricaoV" class="form-control input-sm"></textarea>
			<label>Estoque</label>
			<input readonly="" type="text" class="form-control input-sm" id="quantidadeV" name="quantidadeV">
			<label>Preço</label>
			<input readonly="" type="text" class="form-control input-sm" id="precoV" name="precoV">
			<p></p>
			<span class="btn btn-primary" id="btnAddVenda">Adicionar Produto</span>
			<span class="btn btn-danger" id="btnLimparVendas">Limpar Venda</span>
		</form>
	</div>
	<div class="col-sm-3">
		<div id="imgProduto"></div>
	</div>
	<div class="col-sm-4">
		<div id="tabelaVendasTempLoad"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");

		$('#produtoVenda').change(function(){

			$.ajax({
				type:"POST",
				data:"idproduto=" + $('#produtoVenda').val(),
				url:"../Procedimentos/vendas/obterDadosProdutos.php",

				success:function(r){

					dado=jQuery.parseJSON(r);

					$('#descricaoV').val(dado['descricao']);

					$('#quantidadeV').val(dado['quantidade']);

					$('#precoV').val(dado['preco']);

					$( "#imgProduto" ).empty();
					
					$('#imgProduto').prepend('<img class="img-thumbnail" id="imgp" src="' + dado['url'] + '" />');
					
				}
			});
		});

		$('#btnAddVenda').click(function(){
			vazios=validarFormVazio('frmVendasProdutos');

			quant = 0;
			quantidade = 0;

			quant = $('#quantV').val();
			quantidade = $('#quantidadeV').val();



			if(quant > quantidade){
				alertify.alert('ATENÇÃO','Quantidade Inexistente em Estoque');
				quant = $('#quantV').val("");
				return false;
			}else{
				quantidade = $('#quantidadeV').val();
			}

			if(vazios > 0){
				alertify.alert("ATENÇÃO","Preencha todos os Campos");
				return false;
			}

			dados=$('#frmVendasProdutos').serialize();
			$.ajax({
				type:"POST",
				data:dados,
				url:"../Procedimentos/vendas/adicionarProdutoTemp.php",
				success:function(r){
					$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
				}
			});
		});

		$('#btnLimparVendas').click(function(){

		$.ajax({
			url:"../Procedimentos/vendas/limparTemp.php",
			success:function(r){
				$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
			}
		});
	});

	});
</script>

<script type="text/javascript">

	/*
	function editarP(dados){
		
		$.ajax({
			type:"POST",
			data:"dados=" + dados,
			url:"../Procedimentos/vendas/editarEstoque.php",
			success:function(r){
				
				$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
				alertify.success("Estoque Atualizado");
			}
		});
	}
	*/


	function fecharP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"../Procedimentos/vendas/fecharProduto.php",
			success:function(r){
				$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
				alertify.success("Produto Removido");
			}
		});
	}

	function criarVenda(){
		
		$.ajax({
			url:"../Procedimentos/vendas/criarVenda.php",
			success:function(r){

				if(r > 0){
					$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
					$('#frmVendasProdutos')[0].reset();
					alertify.success("Venda Realizada");
				}else if(r==0){
					alertify.alert("ATENÇÃO","Adicione Produto(s) à sua Lista");
				}else{
					alertify.error("Venda não Realizada");
				}
			}
		});
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){

		$('#clienteVenda').select2();
		$('#produtoVenda').select2();

	});
</script>