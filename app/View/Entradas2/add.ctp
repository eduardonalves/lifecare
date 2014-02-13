<div class="entradas form">
<?php echo $this->Form->create('Entrada'); ?>
	<fieldset>
		<legend><?php echo __('Add Entrada'); ?></legend>
	<?php
		echo $this->Form->input('parceirodenegocio_id', array('label' => 'Fornecedor' ));
		echo $this->Form->input('tipo', array('type' => 'hidden', 'value' => 'ENTRADA' ));
		echo $this->Form->input('data');
		echo $this->Form->input('user_id');
		echo $this->Form->input('descricao');
		echo $this->Form->input('nota_fiscal');
		echo $this->Form->input('valor_total');
		echo $this->Form->input('vb_icms');
		echo $this->Form->input('valor_icms');
		echo $this->Form->input('vb_cst');
		echo $this->Form->input('valor_st');
		echo $this->Form->input('valor_frete');
		echo $this->Form->input('valor_seguro');
		echo $this->Form->input('valor_desconto');
		echo $this->Form->input('valor_ipi');
		echo $this->Form->input('valor_pis');
		echo $this->Form->input('v_cofins');
		echo $this->Form->input('valor_outros');
		echo $this->Form->input('Produtoiten.0.produto_id');
		echo $this->Form->input('Produtoiten.0.valor_unitario');
		echo $this->Form->input('Produtoiten.0.qtde');
		echo $this->Form->input('Produtoiten.0.valor_total');
		echo $this->Form->input('Loteiten.0.lote_id');
		echo $this->Form->input('Loteiten.0.qtde');
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Entradas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
