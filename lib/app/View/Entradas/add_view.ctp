<?php 
	$this->start('css');
	echo $this->Html->css('entradas');
	echo $this->Html->css('table');
	$this->end();
?>

<div id="fase3" class="fase">

<header>
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
	<header>Visualizar e Salvar</header>
	
	

<!--Fieldset total-->
<fieldset class="field-total">
	
<!--Fieldset Dados da nota-->	
	<fieldset class="primeira-field">
		<legend>Dados da Nota</legend>
		
		<section class="lateral-a-esquerda">
			<?php
				echo $this->Form->input('Nota.nota_fiscal', array('type'=>'text','label'=>'Nota Fiscal:','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Fornecedor.nome', array('type'=>'select','class'=>'select','options'=>array('','add-fornecedor'=>'cadastrar',1,2,3),'label'=>'Fornecedor:','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
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
												     'id'=>'voltar3',
													 'class'=>'bt-voltar voltar',
													 ));
													 
	
	
	echo $this->html->image('botao-editar.png',array('alt'=>'Confirmar',
												     'title'=>'Confirmar',
												     'id'=>'avnancar3',
												     'class'=>'bt-confirmar avancar',
													 ));
													 
													 
													
	
	?>
	
</footer>

</section>


</div>
