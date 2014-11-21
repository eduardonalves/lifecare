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
	var lote_nome = '';
	var idSalvar = 0;
	var verifica = 0;
	
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
			lote_nome = $('option:selected', this).attr('id');
	});		
	
	$('#bt-adicionarLote').click(function(){
		if( $('#add-lote_saida option:selected').hasClass('inserido') || $('#add-lote_saida option:selected').val() == '' ){
			alert('Insira um Lote Valido');
			$('#add-lote_saida').val('');
			$('#qtd_novoLote').val('');
		}else{			
			var qtd_novolote = $('#qtd_novoLote').val();
				
			$('#tabela-lotes').append('\
			\<tr id="linhaLote'+idSalvar+'">\
				<td class="nameLote">'+lote_nome+'</td>\
				<td>'+qtd_novolote+'</td>\
				<td><img title="Remover" alt="Remover" src="/app/webroot/img/lixeira.png" id=excluir_'+idSalvar+' class="btnRemoveLote"/></td>\
			\</tr>\
			');
				
			//SETA AS INPUT HIDDEN	
			$('#formHiddenTrocaLote').append('\
			\<section id="comLoteOperacao'+idSalvar+'">\
				<input name="data[comlotesoperacaos]['+idSalvar+'][comloteitem]" step="any" class="existe" value="'+comloteitem+'" type="hidden">\
				<input name="data[comlotesoperacaos]['+idSalvar+'][comoperacao_id]" step="any" class="existe"  value="'+comoperacao_id+'" type="hidden">\
				\
				<input name="data[comlotesoperacaos]['+idSalvar+'][produto_id]" step="any" class="existe"  value="'+produto_id+'" type="hidden">\
				<input name="data[comlotesoperacaos]['+idSalvar+'][comitensdeoperacao_id]" step="any" class="existe"  value="'+comitensdaoperacao_id+'" type="hidden">\
				\
				<input name="data[comlotesoperacaos]['+idSalvar+'][tipo]" step="any" class="existe"  value="'+tipo+'" type="hidden">\
				<input name="data[comlotesoperacaos]['+idSalvar+'][qtde]" step="any" class="existe"  value="'+qtd_novolote+'" type="hidden">\
				<input name="data[comlotesoperacaos]['+idSalvar+'][lote_id]" step="any" id="loteIdHide'+idSalvar+'"  value="'+lote_id+'" type="hidden">\
			\</section>');
			
			idSalvar = idSalvar + 1;
			$('#add-lote_saida option:selected').addClass('inserido');
			$('#add-lote_saida').val('');
			$('#qtd_novoLote').val('');
			$('#submitLotes').show();
			verifica++;
			
		}
		
	});
	
	$('body').on('click','.btnRemoveLote', function(){		
		var n = $(this).attr('id');
		n = n.substring(8);
		var lot = $('#loteIdHide'+n).val();
		$('#add-lote_saida option').each(function(){
			if($(this).val() == lot){
				$(this).removeClass('inserido');
				$('#tabela-lotes #linhaLote'+n).remove();
				$('#comLoteOperacao'+n).remove();		
			}
		});
	
		verifica--;		
		if(verifica == 0){
				$('#submitLotes').hide();
			}
	});
	
});
</script>


<br>

<div class="carregaLote">
	
	<input type="hidden" id="identificacao">		
	<section>
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
		
		<?php
			echo $this->Form->input('putQtd',array('label'=>'Quantidade do Lote:','id'=>'qtd_novoLote','class'=>'tamanho-pequeno'));
			echo $this->html->image('botao-adcionar.png',array('alt'=>'Adicionar Lote','title'=>'Adicionar Lote','class'=>'bt_preencher','id'=>'bt-adicionarLote'));
		?>
		</section>
		<section class="section-Tabela-Lote">
			<table>
				<thead>
					<tr>
						<td>Lote</td>
						<td>Quantidade</td>
						<td>Remover</td>
					</tr>
				</thead>
				
				<tbody id="tabela-lotes"> 
				
				
				</tbody>
			</table>
		
		</section>
		<secttion style="clear:both;display: block;padding-top: 30px;">
		<?php
			echo $this->Form->create('Comoperacao',array('action'=>'checkLoteRestante','id'=>'formHiddenTrocaLote'));
				echo $this->form->submit('botao-salvar.png',array(
								'id'=>'submitLotes',
							    'class'=>'bt-salvar',
							    'alt'=>'Salvar',
							    'title'=>'Salvar',
							    'style'=>'display:none'
				));
			echo $this->Form->end();
		?>
		</secttion>
</div>


