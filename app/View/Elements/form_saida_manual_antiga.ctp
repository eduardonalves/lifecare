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
<form>	
<!--Div primeiro Campo--> 	
	<div class="campo-superior-total tela-resultado">
		
		<div class="campo-superior-esquerdo">
			
			<?php 
				echo $this->Form->input('Forma de Entrada', array('name'=>'vale','id'=>'vale','options'=>array('Nota', 'Vale')));
			?>
		</div>
		
		<div class="campo-superior-direito">
			<?php	
				echo $this->Form->input('', array('label'=>'Entrada de uma devolução','type'=>'checkbox'));
			?>
		</div>	

	</div>
<!--Fim Div primeiro Campo-->	

<!--Fieldset total-->
<fieldset class="field-total">
	
<!--Fieldset Dados da nota-->	
	<fieldset class="primeira-field">
		<legend>Dados da Nota</legend>
		
		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('Nota.chave_acesso', array('type'=>'text','class'=>'tamanho-medio desabilita','label'=>'Chave de Acesso:','maxlength' => '50'));
				//echo $this->Form->input('Fornecedore.nome', array('type'=>'select','class'=>'tamanho-medio select desabilita','options'=>array('','add-fornecedor'=>'cadastrar',1,2,3),'label'=>'Fornecedor:','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php
				
				echo $this->Form->input('Nota.nota_fiscal', array('type'=>'text','class'=>'nfiscal tamanho-medio desabilita','label'=>'Número NF:','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				//echo $this->Form->input('Nota.origem', array('type'=>'text','label'=>'Origem:','class'=>'tamanho-pequeno desabilita' ,'required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				//echo $this->Form->input('Nota.valor_frete', array('type'=>'text','label'=>'Valor de Frete:','class'=>'tamanho-pequeno desabilita','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>			
		</section>
		
		<section class="coluna-direita" id="campo-direita">
			<?php
				echo $this->Form->input('Nota.data', array('type'=>'text','required'=>'true','class'=>'tamanho-pequeno forma-data desabilita','label'=>'Data Emissão:'));
			?>
		</section>
	
	</fieldset>
<!--Fim Fieldset Dados da nota-->		

<!--Fieldset Do FORNECEDOR-->	
	<fieldset class="primeira-field">
		<legend>Dados do Fornecedor</legend>
		
		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('parceirodenegocio.cpf_cnpj', array('type'=>'text','required'=>'true','class'=>'cnpj tamanho-medio desabilita','label'=>'CNPJ:','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php
				echo $this->Form->input('parceirodenegocio.nome', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-medio desabilita','required'=>'true','allowEmpty' => 'false','maxlength'=>'50','title'=>'Campo Obrigatório'));
			?>			
		</section>
		
		<section class="coluna-direita" id="campo-direita">
			<?php
				//echo $this->Form->input('parceirodenegocio.regime_tributario', array('type'=>'text','class'=>'tamanho-pequeno desabilita','label'=>'Regime Tributário:'));
			?>
		</section>
	
	</fieldset>
<!--Fim Fieldset Dados da nota-->
	
<!--Fieldset Dados tributários-->
	<fieldset id="tributos">
		<legend>Dados tributários da Nota</legend>
		
		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('Nota.valor_total_produtos', array('type'=>'text','label'=>'Valor Total Produto:','class'=>'dinheiro tamanho-pequeno desabilita','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_ipi', array('type'=>'text','label'=>'Valor Total IPI:','class'=>'vipi tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_outros', array('type'=>'text','label'=>'Outras Despesas:','class'=>'tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php
				echo $this->Form->input('Nota.valor_total', array('disable'=>'disable','type'=>'text','label'=>'Valor Total da Nota:','class'=>'dinheiro tamanho-pequeno desabilita'));
				echo $this->Form->input('Nota.valor_seguro', array('type'=>'text','label'=>'Valor Seguro:','class'=>'dinheiro tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				
			?>			
		</section>
		
		<section class="coluna-direita">
			<?php
				
				echo $this->Form->input('Nota.valor_icms', array('type'=>'text','label'=>'Valor Total ICMS:','class'=>'vicms tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_frete', array('type'=>'text','label'=>'Valor Frete:','class'=>'dinheiro tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
		</section>
		
	</fieldset>
<!--Fim Fieldset Dados tributários-->	
	
<!--Fieldset Dados do produto-->	
	<fieldset class="dados-produto">
		<legend>Dados do Produto</legend>
			<!-- <pre>
			<?php //print_r($allProdutos); ?>
			</pre> -->
		<div class="campo-superior-produto">
				
		<?php
				
				$produtosFilter = array(" " => " ", "add-produtos" => "Cadastrar");
				foreach($allProdutos as $key)
				{
					$produtosFilter[$key['Produto']['id']] = $key['Produto']['nome'];
				}
				
				
				echo $this->Form->input('Produto', array('label'=>'Buscar Produto:','class'=>'tamanho-medio select combo-autocomplete','div'=>array('class'=>'input'),'type'=>'select','options'=> $produtosFilter));
				//echo $this->Form->input('Produto.nome', array('class'=>'tamanho-medio','type'=>'select', 'value'=>'','options'=>array('0'=>'','add-produtos'=>'Cadastrar')));
				
				
				
				echo $this->html->image('preencher.png',array('alt'=>'Preencher',
												     'title'=>'Preencher',
													 'class'=>'bt-preencher',
													 ));
			?>
			
		</div>

		<div class="lado-esquerdo">
			<section class="coluna-esquerda">
				<?php
					echo $this->Form->input('Produto.codigo', array('type'=>'text','label'=>'Código:','class'=>'tamanho-pequeno desativados','disabled'=>'disabled'));
					echo $this->Form->input('Produto.nome', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-pequeno desativados','disabled'=>'disabled'));
					echo $this->Form->input('Produto.unidade', array('type'=>'text','label'=>'Unidade Comercial:','class'=>'tamanho-pequeno desativados','disabled'=>'disabled'));
					echo $this->Form->input('Produto.descricao:', array('type'=>'text','label'=>'Descrição:','class'=>'tamanho-pequeno desativados','disabled'=>'disabled'));
					//echo $this->Form->input('Produto.dosagem', array('type'=>'text','label'=>'Dosagem:','class'=>'tamanho-pequeno desativados','disabled'=>'disabled'));
					
				?>
			</section>
			
			<section class="coluna-central" id="alinhamento-direita">
				<div class="direita-superior">
					<?php
						echo $this->Form->input('Produtoiten.qtde', array('type'=>'text','label'=>'Quantidade:','id'=>'resultado','class'=>'tamanho-pequeno resultado-qtde','disabled'=>'disabled'));
						echo $this->Form->input('Produtoiten.valor_unitario', array('type'=>'text','label'=>'Valor Unitário:','class'=>'dinheiro tamanho-pequeno ativos desativados vu','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
						echo $this->Form->input('Produtoiten.valor_total', array('type'=>'text','label'=>'Valor Total:','class'=>'tamanho-pequeno ativos desativados vt','required'=>'true','disabled'=>'disabled'));
						
						?>
						<div class="imposto">
							<?php
								echo $this->Form->input('Produtoiten.cfop', array('type'=>'text','label'=>'CFOP:','class'=>'cfo tamanho-pequeno ativos desativados','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
								echo $this->Form->input('Produtoiten.valor_icms', array('type'=>'text','label'=>'Valor ICMS:','class'=>'vicms tamanho-pequeno ativos desativados','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
								echo $this->Form->input('Produtoiten.valor_ipi', array('type'=>'text','label'=>'Valor IPI:','class'=>'vipi tamanho-pequeno ativos desativados','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
							?>
							</div>
						<?php
						?>
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
		<fieldset class="dados-lote coluna direita">
		<legend>Dados do Lote</legend>
			<?php
			
				echo $this->Form->input('Model.Lote', array('label'=>'Lista de Lotes:','class' =>'tamanho-medio select-multiple ativos desativados', 'type'=>'select','multiple' => 'multiple','options' => array('add-lote' => 'Cadastrar', 'option' => 'Adicionar')));	
				echo $this->Form->input('Lote.qtde', array('type'=>'text','label'=>'Quantidade:','class'=>'tamanho-pequeno ativos desativados','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório','maxlength'=>'10'));
				echo $this->Form->input('fabricante', array('type'=>'text','label'=>'Fabricante:','class'=>'tamanho-pequeno desativados','allowEmpty' => 'false','title'=>'Campo Obrigatório','disabled'=>'disabled'));
				echo $this->Form->input('data_validade', array('type'=>'text','label'=>'Validade:','class'=>'tamanho-pequeno desativados','allowEmpty' => 'false','disabled'=>'disabled'));
				echo $this->Form->input('posicao', array('type'=>'text','label'=>'Posição:','class'=>'tamanho-pequeno desativados','allowEmpty' => 'false','title'=>'Campo Obrigatório','disabled'=>'disabled'));
				
				echo $this->html->image('botao-add.png',array('alt'=>'Adicionar',
															'title'=>'Adicionar',
															'class'=>'bt-add',
															));
			?>
			
	<table class="tabela-lote">

		<tr>
			<th>Lote</th>
			<th>Quantidade</th>
			<th>Validade</th>
			<th>Ações</th>
		</tr>
		
	</table>	
			
			
			
			
			
		</fieldset>
		
<!--Fim Fieldset Dados do lote-->
		<?php 
					
					echo $this->html->image('botao-adcionar.png',array('alt'=>'Adicionar',
																 'title'=>'Adicionar',
																 'class'=>'bt-adicionar',
																 ));

					?>
	</fieldset>
<!--Fim Fieldset Dados do Produto-->	
		
</fieldset>		
<!--Fim Fieldset total-->	

	<div class="entradas add">

		<table id="tabela-principal" cellpadding="0" cellspacing="0">
			<tr>
								
					<th><?php echo ('Cod.Produto'); ?></th>
					<th><?php echo ('Nome Prod.'); ?></th>
					<th><?php echo ('Und. Comercial'); ?></th>
					<th><?php echo ('Descrição'); ?></th>
					<th><?php echo ('Qtde'); ?></th>
					<th><?php echo ('V. Unitário'); ?></th>
					<th><?php echo ('V. Total Prod.'); ?></th>
					
					<th class="imposto"><?php echo ('CFOP'); ?></th>
					<th class="imposto"><?php echo ('V. ICMS'); ?></th>
					<th class="imposto"><?php echo ('V. IPI'); ?></th>
					<th class="imposto"><?php echo ('Lote'); ?></th>
					
					
					<th class="actions"><?php echo __('Ações'); ?></th>
			</tr>	

		</table>
	
	</div>
</form>
<footer>
	
	<?php
	
	
	echo $this->html->image('voltar.png',array('alt'=>'Voltar',
						    'title'=>'Voltar',
						    'id'=>'voltar2',
						    'class'=>'bt-voltar voltar',
						));
						
	
	
	
	echo $this->html->image('botao-confirmar.png',array('alt'=>'Confirmar',
								'title'=>'Confirmar',
								'id'=>'avancar2 bt-confirmar',
								'class'=>'bt-confirmar resultado',
							    ));
													 
													
	
	?>
	
</footer>

</section>
