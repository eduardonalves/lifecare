<?php
	echo $this->Html->css('saidas_view.css');
	echo $this->Html->css('table.css');
//echo $this->Html->script('funcoes_entrada.js');

?>

<script>
	$(document).ready(function() {
		$('#add-cliente').bind('change',function(){
			alert('teste');
		});

		$(function(){
		var companyList = $("#add-cliente").autocomplete({
			change: function() {
			//alert('changed');
		}
		});
			companyList.autocomplete('option','change').call(companyList);
		});
		
		$('.loaderAjaxCarregarLoteDIV').css('display','none');
		
		$('.bt-add ').click(function(){
			if($('#spanNomeProduto').text() == ''){
				$('.loaderAjaxCarregarLoteDIV').css('display','none');
			}else{
				$('.loaderAjaxCarregarLoteDIV').css('display','block');
			}
		});
		
		$('#btn-addLote').click(function(){			
			if($('#spanNomeProduto').text() != ''){			
				$('.campo-superior-produto a').css('display','none');
				$(".custom-combobox-input").attr("disabled", disable);
			}
		});
		
		/*
		$('.btnExcluir').on('click',function(){
			alert($('#qtdTotalProduto').val());
			
			if($('#qtdTotalProduto').val() == 0){
				$('.ui-button').css('display','block');
				$(".custom-combobox-input").attr("disabled", none);
			}
		});
		*/
});

</script>

<header >

	<?php
		echo $this->Html->image('titulo-saida.png', array('id' => 'titulo-saida', 'alt' => 'Saída', 'title' => 'Saída'));
	?>

	 <h1 class="menuOption24">Saida</h1>

	  <section id="passos-bar">
		<div id="passos-bar-total">

			<div class="linha-verde complete">
			</div>

			<div class="circle complete">
				<span>Modo de Saida</span>
			</div>

			<div class="linha-verde complete">
			</div>

			<div id="visualizar-circulo" class="circle">
				<span>Preencher Campos</span>
			</div>

			<div id="visualizar-linha" class="linha-verde">
			</div>

			<div class="circle">
				<span id="visualizar-escrita"></span>
			</div>

		</div>

	</section>

</header>



<section>
	<header id="titulo-header">Saida Manual</header>

	<?php
		echo $this->Form->create('Saida',array('action'=>'add'));
	?>

<!--Div primeiro Campo-->
	<div class="campo-superior-total tela-resultado">
		<div class="campo-superior-esquerdo">
			<?php
			    echo "Tipo de movimentação: ".$saida['Saida']['tipo'];
			?>
		</div>

		<div class="campo-superior-direito">
			<?php if($saida['Saida']['tipo'] ==""){
				echo "Devolução";
			}?>
		</div>

	</div>
<!--Fim Div primeiro Campo-->

<!--Fieldset total-->
<fieldset class="field-total">

<!--Fieldset Dados da nota-->
	<div class="fieldset">
		<h2 class="legendEffect"><span class="dadosVale">Dados da Nota</span></h2>

		<section class="coluna-esquerda">
			<div class="imposto">
			<?php
				if($saida['Saida']['chave_acesso'] !=""){
					echo $this->Form->input('chave_acesso', array('type'=>'text','class'=>'tamanho-medio desabilita','label'=>'Chave de Acesso:','maxlength' => '50', 'value' => $saida['Saida']['chave_acesso'], 'readonly' => 'readonly'));
				}
				
				
			?>
			</div>
		</section>

		<section class="coluna-central">
			<?php
				echo $this->Form->input('nota_fiscal', array('type'=>'text','class'=>'nfiscal nvale tamanho-medio desabilita validacao-saida','label'=>'Número NF:','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório', 'readonly' => 'readonly', 'value' => $saida['Saida']['nota_fiscal']));
				
			?>
		</section>



		<section class="coluna-direita" id="campo-direita">
			<?php
				
				$auxDataNota = explode('-', $saida['Saida']['data']);
				$dataNota = $auxDataNota[2].'/'.$auxDataNota[1].'/'.$auxDataNota[0];
				echo $this->Form->input('data', array('type'=>'text','required'=>'true','class'=>'tamanho-pequeno  desabilita limpa validacao-saida','title'=>'Campo Obrigatório','label'=>'Data Emissão:', 'readonly' => 'readonly', 'value' => $dataNota));
			
			?>
			
		</section>

	</div>
<!--Fim Fieldset Dados da nota-->

<!--Fieldset Do CLIENTE-->
	<div id="fieldCliente" class="fieldset">
		<h2 class="legendEffect"><span>Dados do Cliente</span></h2>

		<section class="coluna-esquerda">
		

		</section>

		<section id="campoSaidaNome" class="coluna-central">
			<?php
			    echo $this->Form->input('parceiro', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-medio limpa borderZero','allowEmpty' => 'false','readonly'=>'readonly','title'=>'Nome do Cliente', 'value' => $saida['Saida']['nota_fiscal'], 'readonly' => 'readonly'));
			?>
			<div class="tela-resultado">
			   
		</section>
		
		<script>

		$(document).ready(function(){



				$('body').on('click', '#ui-id-1 li',function(){
					valorCad= $(this).text();
					if(valorCad=="Cadastrar"){
					    $(".campo-superior-produto input").val('');
					    $("#myModal_add-produtos").modal('show');
					}

				});

				$('body').on('click', '#ui-id-3 a',function(){
					valorCad= $(this).text();
					if(valorCad=="Cadastrar"){
					    $(".autocompleteCliente input").val('');
					    $("#myModal_add-cliente").modal('show');
					    $("#spanClienteCPFExistente").hide();
					}

				});
				$(".bt-preencher_Cliente").click(function(){
					valorForncedor=	$("#add-cliente option:selected" ).val();
					valorCpfCnpj= $("#add-cliente option:selected" ).attr('class');
					valorNome= $("#add-cliente option:selected" ).attr('id');

					if(!valorForncedor==""){
						if(valorForncedor=="add-Cliente"){
							//chama modal cliente
							//$("#myModal_add-cliente").modal('show');
						}else{
						    $(".autocompleteCliente input").val('');
						    $(".autocompleteCliente input").removeAttr('required','required');
						    
						    $("#SaidaParceirodenegocioId").val(valorForncedor);
						    $("#SaidaCpfCnpj").val(valorCpfCnpj);
						    $("#SaidaParceiro").val(valorNome);
						}
					}

				});
				$(function() {
					$( "#add-cliente" ).combobox();

				  });


		});
		</script>
		<section class="coluna-direita" id="campo-SaidaCnpj">
			<?php
			    
			    echo $this->Form->input('cpf_cnpj', array('type'=>'text','required'=>'true','class'=>'tamanho-medio desabilita validacao-saida','label'=>'CPF/CNPJ:','disabled'=>'disabled', 'value' =>  $saida['Cliente']['cpf_cnpj']));

			?>
		</section>
	</div>
<!--Fim Fieldset Dados da nota-->

<!--Fieldset Dados tributários-->
	<div class="fieldset">
		<h2 class="legendEffect"><span class="tributoVale">Dados tributários da Nota</span></h2>

		<section class="coluna-esquerda">
			<?php
			
				$valorProdAxux = explode('.' , $saida['Saida']['valor_total_produtos']);
				if(isset ($valorProdAxux[1])){
					$saida['Saida']['valor_total_produtos']= $valorProdAxux[0].','$valorProdAxux[1];
				}else{
					$saida['Saida']['valor_total_produtos']= $valorProdAxux[0].','00;
				}
				
				
				echo $this->Form->input('valor_total_produtos', array('type'=>'text','onfocus'=>'this.blur()','label'=>'Valor Total Produto:','class'=>' tamanho-pequeno limpa','readonly'=>'readonly', 'value' = $saida['Saida']['valor_total_produtos']));
				echo $this->Form->input('valor_ipi', array('div'=>array('class'=>'imposto input text'),'type'=>'text','label'=>'Valor Total IPI:','class'=>'limpa tamanho-pequeno ','allowEmpty' => 'false','title'=>'Campo Obrigatório' ,'readonly'=>'readonly' ,'onfocus'=>'this.blur()'));
			?>
			<div class="imposto">
			<?php
				echo $this->Form->input('valor_outros', array('type'=>'text','maxlength'=>'20', 'label'=>'Outras Despesas:','class'=>'dinheiro limpa tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
			</div>
		</section>

		<span id="spanSaidaValorTotalProdutos" class="MsgValorTotalProdutos" style="display:none">Preencha o campo Valor Total Produtos</span>

		<section class="coluna-central">
			<?php
				echo $this->Form->input('valor_total', array('disable'=>'disable','onfocus'=>'this.blur()','type'=>'text','label'=>'Valor Total da Nota:','class'=>'tamanho-pequeno limpa','readonly'=>'readonly'));
				?>
			<div class="imposto">
			<?php
				echo $this->Form->input('valor_seguro', array('type'=>'text','maxlength'=>'20','label'=>'Valor Seguro:','class'=>'dinheiro  limpa tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));

			?>
			</div>
		</section>

		<span id="spanSaidaValorTotal" class="MsgSaidaValorTotal" style="display:none">Preencha o campo Valor Total</span>

		<section class="coluna-direita">
			<?php

				echo $this->Form->input('valor_icms', array('div'=>array('class'=>'imposto input text'),'type'=>'text','label'=>'Valor Total ICMS:','class'=>' limpa tamanho-pequeno','allowEmpty' => 'false','title'=>'Campo Obrigatório' ,'readonly'=>'readonly' ,'onfocus'=>'this.blur()'));
			?>
			<div class="imposto">
			<?php
				echo $this->Form->input('valor_frete', array('type'=>'text','label'=>'Valor Frete:','class'=>'dinheiro limpa tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
			</div>
		</section>
	</div>
<!--Fim Fieldset Dados tributários-->

<!--Fieldset Dados do produto-->
	<div class="fieldset dados-produto">

		<h2 class="legendEffect"><span>Dados do Produto</span></h2>

		<div class="campo-superior-produto">
			<div class="input">
				<label id="pesquisaProdutos">Pesquisar produtos<span class="campo-obrigatorio">*</span>:</label>
				<select class="tamanho-medio select selectProduto combo-autocomplete">
					<option id="optvazioProd"></option>
					
					<?php

							$produtosFilter = array();

							foreach($allProdutos as $produto)
							{
								foreach($produto['Tributo'] as $tributo){
									$cfop=$tributo['cfop'];
								}
								echo "<option id='".$produto['Produto']['codigo']."' class='".$produto['Produto']['unidade']."' rel='".$produto['Produto']['descricao']."'  data-cfop='".$cfop."' value='".$produto['Produto']['id']."' >";
								echo $produto['Produto']['nome'];
								
								echo "</option>";
							}

					?>
				</select>
			</div>
		<?php
				//echo $this->Form->input('Produto', array('label'=>'Buscar Produto:','class'=>'tamanho-medio select combo-autocomplete','div'=>array('class'=>'input'),'type'=>'select', 'value'=>'','options'=>array(''=>'','add-produtos'=>'Cadastrar')+$produtosFilter));
				//echo $this->Form->input('Produto.nome', array('class'=>'tamanho-medio','type'=>'select', 'value'=>'','options'=>array('0'=>'','add-produtos'=>'Cadastrar')));



				echo $this->html->image('preencher2.png',array('alt'=>'Preencher',
												     'title'=>'Preencher',
													 'class'=>'bt-preencher',
													 'id'=>'bt-preencherProduto'
													 ));
			?>
			<span id="spanValProduto" class="MsgValProduto tooltipMensagemErroDireta" style="display:none">Preencha o campos Produtos</span>

		</div>

		<div class="lado-esquerdo">
			<section class="coluna-esquerda">
				<?php
					echo $this->Form->input('Produto.codigo', array('type'=>'text','label'=>'Código:','class'=>'borderZero tamanho-pequeno ','disabled'=>'disabled'));
					echo $this->Form->input('Produto.nome', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-pequeno inputNomeHidden','disabled'=>'disabled'));
				?>

				<div id="divNomeProduto"></div>

				<?php
					echo $this->Form->input('Produto.unidade', array('type'=>'text','label'=>'Unidade Comercial:','class'=>'borderZero tamanho-pequeno desativados','disabled'=>'disabled'));
					echo $this->Form->input('Produto.descricao', array('type'=>'text','label'=>'Descrição:','class'=>'tamanho-pequeno desativados inputDescHidden','disabled'=>'disabled'));
				//	echo $this->Form->input('Produto.dosagem', array('type'=>'text','label'=>'Dosagem:','class'=>'tamanho-pequeno desativados','disabled'=>'disabled'));

				?>

				<div id="divDescProduto"></div>
			</section>

			<section class="coluna-central" id="alinhamento-direita">
				<div class="direita-superior">
					<?php
						echo $this->Form->input('qtde', array('type'=>'text', 'onfocus'=>'this.blur()', 'label'=>'Quantidade:','id'=>'qtdTotalProduto','class'=>'tamanho-pequeno resultado-qtde','readonly'=>'readonly'));
					?>

					<div id="divQtdProduto"></div>

					<?php
						echo $this->Form->input('vunitario', array('type'=>'text','maxlength'=>'20','id'=>'ProdutoitenValorUnitario','label'=>'Valor Unitário:','class'=>'dinheiro tamanho-pequeno ativos desativados vu desabilita validacao-saida ','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
					?>

				<!--	<input id='valor-qtde' type='hidden'/>
					<input id='valor-unitario' type='hidden'/>
					<input id='valor-total' type='hidden'/>
				-->
					<span id="spanProdutoitenValorUnitario" class="MsgProdutoitenValorUnitario tooltipMensagemErroDireta" style="display:none">Preencha o campo Valor Unitário</span>

					<?php
						echo $this->Form->input('vtotal', array('type'=>'text','onfocus'=>'this.blur()','id'=>'ProdutoitenValorTotal', 'label'=>'Valor Total:','class'=>'tamanho-pequeno ativos desativados vt','allowEmpty' => 'false','readonly'=>'readonly'));

					?>

					<div class="imposto">

							<?php
								echo $this->Form->input('cfo', array('type'=>'text','id'=>'ProdutoitenCfop','label'=>'CFOP:', 'onfocus'=>'this.blur()', 'class'=>'borderZero tamanho-pequeno ativos','readonly'=>'readonly'));
								echo $this->Form->input('vicm', array('type'=>'text','id'=>'ProdutoitenValorIcms','label'=>'Valor ICMS:','class'=>'dinheiro tamanho-pequeno ativos desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
								echo $this->Form->input('vip', array('type'=>'text','id'=>'ProdutoitenValorIpi', 'label'=>'Valor IPI:','class'=>'dinheiro tamanho-pequeno ativos desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
							?>
					</div>

				</div>

				<div class="direita-infeior">
					<div class="imposto">
					<?php

						?>
					</div>

				</div>
			</section>

		</div>

<!--Fieldset Dados do lote-->
		<div class="fieldsetLote">
			<h2 class="legendEffect"><span>Dados do Lote</span></h2>

			<!--<fieldset class="dados-lote coluna direita">
			<legend>Dados do Lote</legend>-->
					<span class="spanlotes ">Adicionar Lotes<span class="campo-obrigatorio">*</span>:</span>
					
				<?php
					/*
					echo $this->Form->input('Model.Lote', array('label'=>'Lista de Lotes:','class' =>'tamanho-medio select-multiple ativos desabilita', 'type'=>'select','multiple' => 'multiple','options' => array('add-lote' => 'Cadastrar', 'option' => 'Adicionar')));
					echo $this->Form->input('Lote.qtde', array('type'=>'text','label'=>'Quantidade:','class'=>'tamanho-pequeno ativos desabilita','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório','maxlength'=>'10'));
					echo $this->Form->input('fabricante', array('type'=>'text','label'=>'Fabricante:','class'=>'tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório','disabled'=>'disabled'));
					echo $this->Form->input('data_validade', array('type'=>'text','label'=>'Validade:','class'=>'tamanho-pequeno desabilita','allowEmpty' => 'false','disabled'=>'disabled'));
					echo $this->Form->input('posicao', array('type'=>'text','label'=>'Posição:','class'=>'tamanho-pequeno desativados','allowEmpty' => 'false','disabled'=>'disabled'));
					*/

					echo $this->html->image('botao-add2.png',array('alt'=>'Adicionar',
																	'title'=>'Adicionar lote',
																	'class'=>'bt-add select'
																	));
				?>

			<span id="spanAdicionarLote" class="MsgAdicionarLote tooltipMensagemErroDireta" style="display:none">Adicione lotes</span>
				<div class="loaderAjaxCarregarLoteDIV" style="display:none">
						<?php
							
							echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
																		 'title'=>'Carregando',
																		 'class'=>'loaderAjaxCarregarLote',
																		 ));
						?>
						<span>Carregando lotes aguarde...</span>
				</div>	
				<table class="tabela-lote">

					<tr>
						<th>Lote</th>
						<th>Quantidade</th>
						<th>Validade</th>
						<th>Ações</th>
					</tr>

				</table>
		</div>

		<?php
			echo $this->Form->input('tipo',array('value'=>'SAIDA','type'=>'hidden'));
			//echo $this->Form->input('Produtoiten.tipo',array('value'=>'SAIDA','type'=>'hidden'));
		?>

<!--Fim Fieldset Dados do lote-->

		<?php
			echo $this->html->image('botao-adcionar2.png',array('alt'=>'Adicionar',
														 'title'=>'Adicionar Produto',
														 'class'=>'bt-adicionar calcularProdutos',
														 ));
		?>

	</div>
<!--Fim Fieldset Dados do Produto-->

</fieldset>
<!--Fim Fieldset total-->

	<div class="saidas add">

		<table id="tabela-principal" cellpadding="0" cellspacing="0">
			<tr>

					<th><?php echo ('Cod.Produto'); ?></th>
					<th><?php echo ('Nome Prod.'); ?></th>
					<th><?php echo ('Und. Comercial'); ?></th>
					<th><?php echo ('Descrição'); ?></th>
					<th><?php echo ('Qtde'); ?></th>
					<th><?php echo ('V. Unitário'); ?></th>
					<th><?php echo ('V. Total'); ?></th>

					<th class="imposto"><?php echo ('CFOP'); ?></th>
					<th class="imposto"><?php echo ('V. ICMS'); ?></th>
					<th class="imposto"><?php echo ('V. IPI'); ?></th>
					<th><?php echo ('Lote'); ?></th>


					<th class="actions"><?php echo __('Ações'); ?></th>
			</tr>

		</table>

	</div>

<footer>

	<?php


		echo $this->html->image('voltar.png',array('alt'=>'Voltar',
								'title'=>'Voltar',
								'id'=>'voltar2',
								'class'=>'bt-voltar voltar',
							));




		echo $this->html->image('botao-confirmar.png',array('alt'=>'Confirmar',
									'title'=>'Confirmar',
									'id'=>'avancar2',
									'class'=>'bt-confirmar',
									));


		echo $this->form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvar-saida-manual'));
		echo $this->form->end();

	?>


</footer>

</section>
<pre>
<?php
print_r($saida);
?>
</pre>

