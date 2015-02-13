<div class="entradas form">
<?php echo $this->Form->create('Entrada'); ?>
	<fieldset>
		<legend><?php echo __('Edit Entrada'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('data_entrada');
		echo $this->Form->input('user_id');
		echo $this->Form->input('origem');
		echo $this->Form->input('fornecedore_id');
		echo $this->Form->input('nota_fiscal');
		echo $this->Form->input('valor_total');
		echo $this->Form->input('tiposmovimentacao_id');
		echo $this->Form->input('vb_icms');
		echo $this->Form->input('valor_icms');
		echo $this->Form->input('vb_cst');
		echo $this->Form->input('valor_st');
		echo $this->Form->input('valor_frete');
		echo $this->Form->input('valor_seguro');
		echo $this->Form->input('valor_desconto');
		echo $this->Form->input('vii');
		echo $this->Form->input('valor_ipi');
		echo $this->Form->input('valor_pis');
		echo $this->Form->input('v_confins');
		echo $this->Form->input('valor_outros');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Entrada.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Entrada.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fornecedores'), array('controller' => 'fornecedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fornecedore'), array('controller' => 'fornecedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiposmovimentacaos'), array('controller' => 'tiposmovimentacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiposmovimentacao'), array('controller' => 'tiposmovimentacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Itensentradas'), array('controller' => 'itensentradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Itensentrada'), array('controller' => 'itensentradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lotesentradas'), array('controller' => 'lotesentradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lotesentrada'), array('controller' => 'lotesentradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seriaisentradas'), array('controller' => 'seriaisentradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seriaisentrada'), array('controller' => 'seriaisentradas', 'action' => 'add')); ?> </li>
	</ul>
</div>
