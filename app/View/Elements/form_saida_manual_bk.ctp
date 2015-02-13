<?php

	$this->start('modais');
		
		
		echo $this->element('produtos_add', array('modal'=>'add-produtos'));
		echo $this->element('lote_add', array('modal'=>'add-lote'));
		echo $this->element('fabricante_add', array('modal'=>'add-fabricante'));
		echo $this->element('fornecedor_add', array('modal'=>'add-fornecedor'));
		echo $this->element('categoria_add', array('modal'=>'add-categoria'));
		//echo $this->element('cliente_add', array('modal'=>'add-cliente'));
	
	$this->end();

?>


<header >
	<?php 
		echo $this->Html->image('titulo-saida.png', array('id' => 'titulo-saida', 'alt' => 'Saída', 'title' => 'Saída')); 
	?>
	
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption24">Saída</h1>
	 
	  <section id="passos-bar">
		<div id="passos-bar-total">
			
			<div class="linha-verde complete">
			</div>
			
			<div class="circle complete">
				<span>Modo de Saída</span>
			</div>
			
			<div class="linha-verde complete">
			</div>

			<div class="circle">
				<span>Preencher Campos</span>
			</div>

			<div class="linha-verde">
			</div>

			<div class="circle">
				<span></span>
			</div>
			
		</div>

	</section>
	 
</header>

<section>
	<header id="titulo-header">Saída Manual</header>

	<?php
		echo $this->Form->create('Saida',array('action'=>'add'));
	?>

<!--Div primeiro Campo-->
	<div class="campo-superior-total tela-resultado">
		<div class="campo-superior-esquerdo">
			<?php

				echo $this->Form->input('forma_de_saida', array('id'=>'vale','options'=>array('Nota', 'Vale')));
			?>
		</div>

		<div class="campo-superior-direito">
			<?php
				echo $this->Form->input('devolucao', array('label'=>'saida de uma devolução'));
			?>
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
				echo $this->Form->input('chave_acesso', array('type'=>'text','class'=>'tamanho-medio desabilita','label'=>'Chave de Acesso:','maxlength' => '50'));
				//echo $this->Form->input('Fornecedore.nome', array('type'=>'select','class'=>'tamanho-medio select desabilita','options'=>array('','add-fornecedor'=>'cadastrar',1,2,3),'label'=>'Fornecedor:','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
			</div>
		</section>

		<section class="coluna-central">
			<?php
				echo $this->Form->input('nota_fiscal', array('type'=>'text','class'=>'nfiscal nvale tamanho-medio desabilita validacao-saida','label'=>'Número NF<span class="campo-obrigatorio">*</span>:','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				//echo $this->Form->input('Nota.origem', array('type'=>'text','label'=>'Origem:','class'=>'tamanho-pequeno desabilita' ,'required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				//echo $this->Form->input('Nota.valor_frete', array('type'=>'text','label'=>'Valor de Frete:','class'=>'tamanho-pequeno desabilita','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
		</section>



		<section class="coluna-direita" id="campo-direita">
			<?php
				echo $this->Form->input('data', array('type'=>'text','required'=>'true','class'=>'tamanho-pequeno forma-data desabilita validacao-saida','title'=>'Campo Obrigatório','label'=>'Data Emissão<span class="campo-obrigatorio">*</span>:'));
			?>
		</section>

	</div>
<!--Fim Fieldset Dados da nota-->

<!--Fieldset Do FORNECEDOR-->
	<div id="fieldFornecedor" class="fieldset">
		<h2 class="legendEffect"><span>Dados do Fornecedor</span></h2>

		<section class="coluna-esquerda">
			<?php
				//echo $this->Form->input('cpf_cnpj', array('type'=>'text','required'=>'true','class'=>'cnpj tamanho-medio desabilita','label'=>'CPF/CNPJ:','allowEmpty' => 'false','title'=>'Campo Obrigatório', 'disabled' => 'disabled'));
			//print_r($allFornecedores);
			?>
			<div class="input autocompleteFornecedor combo-autocomplete">
				<label>Pesquisar Fornecedor<span class="campo-obrigatorio">*</span>:</label>
				<select class="tamanho-medio" id="add-fornecedor">
					<option id="optvazioForn"></option>
					<option value="add-Fornecedor">Cadastrar</option>
					<?php
							foreach($allFornecedores as $allFornecedore)
							{
								echo "<option id='".$allFornecedore['Fornecedore']['nome']."' class='".$allFornecedore['Fornecedore']['cpf_cnpj']."' rel='".$allFornecedore['Fornecedore']['tipo']."' value='".$allFornecedore['Fornecedore']['id']."' >";
								echo $allFornecedore['Fornecedore']['nome'];
								echo "</option>";
							}

					?>
				</select>
			</div>
		</section>

		<section class="coluna-central">
			<?php
				//echo $this->Form->input('nome', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-medio desabilita','required'=>'true','allowEmpty' => 'false','maxlength'=>'50','title'=>'Campo Obrigatório'));
				echo $this->Form->input('cpf_cnpj', array('type'=>'text','required'=>'true','class'=>'tamanho-medio desabilita validacao-saida','label'=>'CPF/CNPJ:','disabled'=>'disabled'));
				echo $this->html->image('preencher2.png',array('alt'=>'Preencher',
												     'title'=>'Preencher',
													 'class'=>'bt-preencher_Fornecedor',
													 ));
			?>
		</section>
		<span id="spanSaidaCpfCnpj" class="MsgCpfCnpj" style="display:none">Preencha os Dados do Fornecedor</span>
		<script>

		$(document).ready(function(){



				$('body').on('click', '#ui-id-1 li',function(){
					valorCad= $(this).text();
					if(valorCad=="Cadastrar"){
						$("#myModal_add-produtos").modal('show');
					}

				});

				$('body').on('click', '#ui-id-4 li',function(){
					valorCad= $(this).text();
					if(valorCad=="Cadastrar"){
						$("#myModal_add-fornecedor").modal('show');
					}

				});
				$(".bt-preencher_Fornecedor").click(function(){
					valorForncedor=	$("#add-fornecedor option:selected" ).val();
					valorCpfCnpj= $("#add-fornecedor option:selected" ).attr('class');

					if(!valorForncedor==""){
						if(valorForncedor=="add-Fornecedor"){
							//chama modal fornecedor
							//$("#myModal_add-fornecedor").modal('show');
						}else{
							$("#saidaParceirodenegocioId").val(valorForncedor);
							$("#saidaCpfCnpj").val(valorCpfCnpj);
						}
					}

				});
				$(function() {
					$( "#add-fornecedor" ).combobox();

				  });


		});
		</script>
		<section class="coluna-direita" id="campo-direita">
			<?php
			//	echo $this->Form->input('parceirodenegocio.regime_tributario', array('type'=>'text','class'=>'tamanho-pequeno desabilita','label'=>'Regime Tributário:'));

			echo   $this->Form->input('parceirodenegocio_id', array('type' => 'hidden'));
			?>
		</section>
	</div>
<!--Fim Fieldset Dados da nota-->

<!--Fieldset Dados tributários-->
	<div class="fieldset">
		<h2 class="legendEffect"><span class="tributoVale">Dados tributários da Nota</span></h2>

		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('valor_total_produtos', array('type'=>'text','onfocus'=>'this.blur()','label'=>'Valor Total Produto:','class'=>' tamanho-pequeno borderZero','readonly'=>'readonly'));
				echo $this->Form->input('valor_ipi', array('div'=>array('class'=>'imposto input text'),'type'=>'text','label'=>'Valor Total IPI:','class'=>' tamanho-pequeno  borderZero','allowEmpty' => 'false','title'=>'Campo Obrigatório' ,'readonly'=>'readonly' ,'onfocus'=>'this.blur()'));
			?>
			<div class="imposto">
			<?php
				echo $this->Form->input('valor_outros', array('type'=>'text','maxlength'=>'20', 'label'=>'Outras Despesas:','class'=>'dinheiro tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
			</div>
		</section>

		<span id="spanSaidaValorTotalProdutos" class="MsgValorTotalProdutos" style="display:none">Preencha o campo Valor Total Produtos</span>

		<section class="coluna-central">
			<?php
				echo $this->Form->input('valor_total', array('disable'=>'disable','onfocus'=>'this.blur()','type'=>'text','label'=>'Valor Total da Nota:','class'=>'tamanho-pequeno borderZero','readonly'=>'readonly'));
				?>
			<div class="imposto">
			<?php
				echo $this->Form->input('valor_seguro', array('type'=>'text','maxlength'=>'20','label'=>'Valor Seguro:','class'=>'dinheiro tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));

			?>
			</div>
		</section>

		<span id="spanSaidaValorTotal" class="MsgSaidaValorTotal" style="display:none">Preencha o campo Valor Total</span>

		<section class="coluna-direita">
			<?php

				echo $this->Form->input('valor_icms', array('div'=>array('class'=>'imposto input text'),'type'=>'text','label'=>'Valor Total ICMS:','class'=>'tamanho-pequeno borderZero','allowEmpty' => 'false','title'=>'Campo Obrigatório' ,'readonly'=>'readonly' ,'onfocus'=>'this.blur()'));
			?>
			<div class="imposto">
			<?php
				echo $this->Form->input('valor_frete', array('type'=>'text','label'=>'Valor Frete:','class'=>'dinheiro tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
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
					<option value="add-produtos" class="testechange">Cadastrar</option>
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
			<span id="spanValProduto" class="MsgValProduto" style="display:none">Preencha o campos Produtos</span>

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

					<input id='valor-qtde' type='hidden'/>
					<input id='valor-unitario' type='hidden'/>
					<input id='valor-total' type='hidden'/>

					<span id="spanProdutoitenValorUnitario" class="MsgProdutoitenValorUnitario" style="display:none">Preencha o campo Valor Unitário</span>

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
					<span class="spanlotes">Adicionar Lotes<span class="campo-obrigatorio">*</span>:</span>
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

			<span id="spanAdicionarLote" class="MsgAdicionarLote" style="display:none">Adicione lotes</span>

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
			echo $this->Form->input('tipo',array('value'=>'saida','type'=>'hidden'));
			//echo $this->Form->input('Produtoiten.tipo',array('value'=>'saida','type'=>'hidden'));
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

	<div class="saida add">

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


		echo $this->form->submit('botao-salvar.png',array('class' => 'bt-salvar saida-manual', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvar-saida-manual'));
		echo $this->form->end();

	?>


</footer>

</section>
