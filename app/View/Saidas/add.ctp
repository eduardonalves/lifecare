<?php 
	$this->start('css');
	echo $this->Html->css('entradas');
	echo $this->Html->css('table');
	$this->end();
?>

<div id="fase2" class="fase">
	
<header >
	<?php 
		echo $this->Html->image('titulo-entrada.png', array('id' => 'titulo-entrada', 'alt' => 'Entrada', 'title' => 'Entrada'));
	 ?>
	 <h1>Entrada</h1>
	 
	  <section id="passos-bar">
		<div id="passos-bar-total">
			<div class="linha-verde complete"></div>
			
			<div class="circle complete">
				<span>Modo de Entrada</span>
			</div>
			
			<div class="linha-verde complete"></div>

			<div class="circle complete">
				<span>Preencher Campos</span>
			</div>

			<div class="linha-verde"></div>

			<div class="circle">
				<span>Visualizar e Salvar</span>
			</div>
		</div>
	
</section>
	 
</header>

<section>
	<header>Entrada Manual</header>
	
<!--Div primeiro Campo--> 	
	<div class="campo-superior-direito">
		<?php
			echo $this->Form->input('Forma de Entrada', array('name'=>'vale','id'=>'vale','options'=>array('Notas', 'Vale')));
			echo $this->Form->input('', array('label'=>'Entrada de uma devolução','type'=>'checkbox'));
		?>

	</div>
<!--Fim Div primeiro Campo-->	

<!--Fieldset total-->
<fieldset class="field-total">
	
<!--Fieldset Dados da nota-->	
	<fieldset class="primeira-field">
		<legend>Dados da Nota</legend>
		
		<section class="lateral-a-esquerda">
			<?php
				echo $this->Form->input('Nota.nota_fiscal', array('type'=>'text','class'=>'tamanho-medio','label'=>'Nota Fiscal:','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Fornecedor.nome', array('type'=>'select','class'=>'tamanho-medio select','options'=>array('','add-fornecedor'=>'cadastrar',1,2,3),'label'=>'Fornecedor:','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
		</section>
		
		<section class="lateral-central">
			<?php
				echo $this->Form->input('Nota.origem', array('type'=>'text','label'=>'Origem:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_frete', array('type'=>'text','label'=>'Valor de Frete:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>			
		</section>
		
		<section class="lateral-a-direita" id="campo-direita">
			<?php
				echo $this->Form->input('Nota.valor_total', array('type'=>'text','class'=>'tamanho-medio','label'=>'Valor Total:'));
			?>
		</section>
	
	</fieldset>
<!--Fim Fieldset Dados da nota-->		
	
<!--Fieldset Dados tributários-->
	<fieldset id="tributos">
		<legend>Dados tributários da Nota</legend>
		
		<section class="lateral-a-esquerda">
			<?php
				echo $this->Form->input('Nota.vb_icms', array('type'=>'text','label'=>'Valor Base ICMS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_icms', array('type'=>'text','label'=>'Valor ICMS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_seguro', array('type'=>'text','label'=>'Valor Seguro:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
		</section>
		
		<section class="lateral-central centro">
			<?php
				echo $this->Form->input('Nota.vb_cst', array('type'=>'text','label'=>'Valor Base ST:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_ipi', array('type'=>'text','label'=>'Valor IPI:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_desconto', array('type'=>'text','label'=>'Valor Desconto:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>			
		</section>
		
		<section class="lateral-a-direita direita">
			<?php
				
				echo $this->Form->input('Nota.valor_pis', array('type'=>'text','label'=>'Valor PIS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.v_cofins', array('type'=>'text','label'=>'Valor COFINS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_outros', array('type'=>'text','label'=>'Valor Outros:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
		</section>
		
	</fieldset>
<!--Fim Fieldset Dados tributários-->	
	
<!--Fieldset Dados do produto-->	
	<fieldset>
		<legend>Dados do Produto</legend>
			
		<div class="campo-superior-produto">
			
		<?php
				echo $this->Form->input('Produto.nome', array('class'=>'tamanho-medio select','type'=>'select'));
				
				
				echo $this->html->image('preencher.png',array('alt'=>'Preencher',
												     'title'=>'Preencher',
													 'class'=>'bt-preencher',
													 ));
			?>
			
		</div>
		
		<div class="lado-esquerdo">
			<section class="lateral-a-esquerda">
				<?php
					echo $this->Form->input('Produto.codigo', array('type'=>'text','label'=>'Código:','class'=>'tamanho-pequeno'));
					echo $this->Form->input('Produto.nome', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-pequeno'));
					echo $this->Form->input('Produto.dosagem', array('type'=>'text','label'=>'Dosagem:','class'=>'tamanho-pequeno'));
					echo $this->Form->input('Produtoiten.valor_unitario', array('type'=>'text','label'=>'Valor Unitário:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
					echo $this->Form->input('Produtoiten.percentual_icms', array('type'=>'text','label'=>'Percentual ICMS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
					echo $this->Form->input('Produtoiten.valorbase_st', array('type'=>'text','label'=>'Valor Base ST:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
					echo $this->Form->input('Nota.valor_cofins', array('type'=>'text','label'=>'Valor COFINS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
					echo $this->Form->input('Nota.valor_pis:', array('type'=>'text','label'=>'Valor PIS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
					?>
			</section>
			
			<section class="lateral-a-direita" id="alinhamento-direita">
				<div class="direita-superior">
					<?php
						echo $this->Form->input('Produto.codigo_ean', array('type'=>'text','label'=>'Código EAN:','class'=>'tamanho-pequeno','disabled'=>'disabled'));
						echo $this->Form->input('Produto.composicao', array('type'=>'text','label'=>'Composição:','class'=>'tamanho-pequeno','disabled'=>'disabled'));
						echo $this->Form->input('Produto.unidade', array('type'=>'text','label'=>'Unidade:','class'=>'tamanho-pequeno'));
						echo $this->Form->input('Produto.descricao:', array('type'=>'text','label'=>'Descrição:','class'=>'tamanho-pequeno','disabled'=>'disabled'));
					?>
				</div>
				<div class="direita-infeior">
					<?php	
						echo $this->Form->input('Produtoiten.valor_st', array('type'=>'text','label'=>'Valor ST:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
						echo $this->Form->input('Produtoiten.valor_icms', array('type'=>'text','label'=>'Valor ICMS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
						echo $this->Form->input('Produtoiten.valor_ipi', array('type'=>'text','label'=>'Valor IPI:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
						
						 
					
					echo $this->html->image('botao-adcionar.png',array('alt'=>'Adicionar',
																 'title'=>'Adicionar',
																 'class'=>'bt-adicionar',
																 ));
			
					?>
				</div>
			</section>
			
		</div>
		
<!--Fieldset Dados do lote-->		
		<fieldset class="dados-lote">
		<legend>Dados do Lote</legend>
			<?php
			
				echo $this->Form->input('Model.Lote', array('label'=>'Lista de Lotes:','class' =>'tamanho-pequeno select-multiple', 'type'=>'select','multiple' => 'multiple','options' => array('add-lote' => 'Cadastrar', 'option' => 'Adicionar')));	
				echo $this->Form->input('Lote.qtde', array('type'=>'text','label'=>'Quantidade:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('fabricante', array('type'=>'text','label'=>'Fabricante:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório','disabled'=>'disabled'));
				echo $this->Form->input('data_validade', array('type'=>'text','label'=>'Validade:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('posicao', array('type'=>'text','label'=>'Posição:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório','disabled'=>'disabled'));
				
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
	
	</fieldset>
<!--Fim Fieldset Dados do Produto-->	
		
</fieldset>		
<!--Fim Fieldset total-->	

	<div class="entradas add">

		<table id="tabela-principal" cellpadding="0" cellspacing="0">
			<tr>
					<th></th>
					<th><?php echo ('cod.'); ?></th>
					<th><?php echo ('nome'); ?></th>
					<th><?php echo ('Qnt'); ?></th>
					<th><?php echo ('Und'); ?></th>
					<th><?php echo ('Dosagem'); ?></th>
					<th><?php echo ('Lotes'); ?></th>
					<th><?php echo ('Validade'); ?></th>
					<th><?php echo ('V. Unitáro'); ?></th>
					<th><?php echo ('V. Total'); ?></th>
					<th><?php echo ('Frete'); ?></th>
					<th><?php echo ('Desconto'); ?></th>
					<th><?php echo ('IPI'); ?></th>
					<th class="actions"><?php echo __('Ações'); ?></th>
			</tr>	

		</table>
	
	</div>

<!-- Modal Lote-->
			<?php echo $this->element('lote_add');?>
<!-- /.modal -->

<!-- Modal Fabricante -->
			<?php echo $this->element('fabricante_add');?>
<!-- /.modal -->

<!-- Modal Fornecedor -->
			<?php echo $this->element('fornecedor_add');?>
<!-- /.modal -->

<!-- Modal Produto-->
	<?php echo $this->element('produtos_add');?>
<!-- /.modal -->

<!-- Modal Categoria-->
	<?php echo $this->element('categoria_add');?>
<!-- /.modal -->

<!-- Modal Cliente -->
			<?php echo $this->element('cliente_add');?>
<!-- /.modal -->

<footer>
	
	<?php
	
	
	echo $this->html->image('voltar.png',array('alt'=>'Voltar',
												     'title'=>'Voltar',
												     'id'=>'voltar2',
													 'class'=>'bt-voltar voltar',
													 ));
													 
	
	
	echo $this->html->image('botao-editar.png',array('alt'=>'Confirmar',
												     'title'=>'Confirmar',
												     'id'=>'avnancar2',
												     'class'=>'bt-confirmar avancar',
													 ));
													 
													
	
	?>
	
</footer>

</section>

</div>


