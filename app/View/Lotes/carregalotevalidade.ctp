<script>
$(document).ready(function() {
	
	var idPrinc = '';
	var comloteitem = '';
	var comoperacao_id = '';
	var produto_id = '';
	var comitensdaoperacao_id = '';
	var tipo = '';
	var lote_id = '';
	var qtd_nolote = '';
	
	$("#add-lote_saida").change(function(){
		
		idPrinc = $('#identificacao').val(); 	
		comloteitem = $('#vazio-comloteitem'+idPrinc).val();
		comoperacao_id = $('#vazio-comoperacaoid'+idPrinc).val();
		produto_id = $('#vazio-produtoid'+idPrinc).val();
		comitensdaoperacao_id = $('#vazio-comitensdaoperacaoid'+idPrinc).val();
		tipo = $('#vazio-tipo'+idPrinc).val();
		lote_id = $('option:selected', this).val();
		qtd_nolote = $('option:selected', this).attr('data-estoque');
		$('#qtd_novoLote').val(qtd_nolote);
		
	});	
	
	$('#bt-adicionarLote').click(function(){
		
		//Adiciona os valores na tabela pra visualização
		//$('#formHiddenTrocaLote').append('<tr class="fornecedorTr_'+in_fornecedor+'"><td>'+valorNome+'</td> <td>'+valorCpfCnpj+'</td> <td class="confirma"><img title="Remover" alt="Remover" src="/app/webroot/img/lixeira.png" id=excluir_'+in_fornecedor+' class="btnRemoveForne"/></td></tr>');
		
		var qtd_novolote = $('#qtd_novoLote').val();
			
		//SETA AS INPUT HIDDEN	
		$('#formHiddenTrocaLote').append('\
		\<section id="comLoteOperacao'+idPrinc+'">\
			<input name="data[comlotesoperacaos]['+idPrinc+'][comloteitem]" step="any" class="existe" value="'+comloteitem+'" type="hidden">\
			<input name="data[comlotesoperacaos]['+idPrinc+'][comoperacao_id]" step="any" class="existe"  value="'+comoperacao_id+'" type="hidden">\
			\
			<input name="data[comlotesoperacaos]['+idPrinc+'][produto_id]" step="any" class="existe"  value="'+produto_id+'" type="hidden">\
			<input name="data[comlotesoperacaos]['+idPrinc+'][comitensdeoperacao_id]" step="any" class="existe"  value="'+comitensdaoperacao_id+'" type="hidden">\
			\
			<input name="data[comlotesoperacaos]['+idPrinc+'][tipo]" step="any" class="existe"  value="'+tipo+'" type="hidden">\
			<input name="data[comlotesoperacaos]['+idPrinc+'][qtde]" step="any" class="existe"  value="'+qtd_novolote+'" type="hidden">\
			<input name="data[comlotesoperacaos]['+idPrinc+'][lote_id]" step="any" class="existe"  value="'+lote_id+'" type="hidden">\
		\</section>');
			
		
	});
	
	
	/*		echo $this->Form->input('comloteitem');
			echo $this->Form->input('qtde');
			echo $this->Form->input('comlotesoperacaos.0.lote_id',array('type'=>'text'));
			
			echo $this->Form->input('comlotesoperacaos.0.comoperacao_id',array('type'=>'text'));
			echo $this->Form->input('comlotesoperacaos.0.produto_id',array('type'=>'text'));
			echo $this->Form->input('comlotesoperacaos.0.comitensdeoperacao',array('type'=>'text'));
			
			echo $this->Form->input('comlotesoperacaos.0.qtde',array('type'=>'text'));
			echo $this->Form->input('comlotesoperacaos.0.tipo',array('type'=>'text','value'=>'SAIDA'));
			*/	
});
</script>


<br>

<div class="carregaLote">
	
	<input type="hidden" id="identificacao">		
	
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
		
		<label>
			<span>Quantidade do Lote:
			<input type="text" id="qtd_novoLote" class="tamanho-pequeno">
			</span>
		</label>
		<?php
			echo $this->Form->create('Comoperacao',array('action'=>'checkLoteRestante','id'=>'formHiddenTrocaLote'));
				
					
			echo $this->html->image('botao-adcionar.png',array('alt'=>'Adicionar Lote','title'=>'Adicionar Lote','class'=>'bt_preencher','id'=>'bt-adicionarLote'));

			echo $this->Form->end();
		?>
</div>


