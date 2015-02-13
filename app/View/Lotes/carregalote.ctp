<script>
$(document).ready(function() {
	$("#add-lote_saida").change(function(){
	
		fabricacao = $('option:selected', this).attr('data-fabricacao');
		validade =$('option:selected', this).attr('data-validade');
		
						var dayFabricacao = fabricacao.slice(8,10);
						var monthFabricacao = fabricacao.slice(5,7);
						var yearFabricacao = fabricacao.slice(0,4);

						var dayValidade = validade.slice(8,10);
						var monthValidadeo = validade.slice(5,7);
						var yearValidade = validade.slice(0,4);



		$("#LoteDataFabricacao").val(dayFabricacao + '/' + monthFabricacao + '/' + yearFabricacao);
		$("#LoteDataValidade").val(dayValidade + '/' + monthValidadeo + '/' + yearValidade);
		
		nomeFabricante = $('option:selected', this).attr('data-fabricante');
		estoque= $('option:selected', this).attr('data-estoque');
		
		$("#LoteParceirodenegocioId").val(nomeFabricante);
		
		$("#LoteEstoque").val(estoque);
		$(".btn-addLoteSaida").show();
		
	});
});
</script>

<div class="carregaLote">
		<div class="input autocompleteLote">
			<label>Pesquisar Lote<span class="campo-obrigatorio">*</span>:</label>
			<select class="tamanho-medio" id="add-lote_saida">
				<option id="optvazioForn"></option>
				
				<?php
						if(empty($allLotes)){
							echo "<option>Produto sem lotes disponíveis!</option>";
						}else{
							
							foreach($allLotes as $allLote)
							{
								echo "<option id='".$allLote['Lote']['numero_lote']."'data-fabricacao='".$allLote['Lote']['data_fabricacao']."'data-validade='".$allLote['Lote']['data_validade']."' data-status='".$allLote['Lote']['status']."' data-estoque='".$allLote['Lote']['estoque']."' data-fabricante='".$allLote['Fabricante']['nome']."'  data-fabricanteid='".$allLote['Fabricante']['id']."' value='".$allLote['Lote']['id']."' >";
								echo $allLote['Lote']['numero_lote'];
								echo "</option>";
							}
						}

				?>
			</select>
		</div>
</div>


