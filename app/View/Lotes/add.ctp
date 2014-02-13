<div class="lotes form">
<?php echo $this->Form->create('Lote'); ?>
	<fieldset>
		<legend><?php echo __('Add Lote'); ?></legend>
	<?php
		echo $this->Form->input('produto_id');
		echo $this->Form->input('numero_lote');
		echo $this->Form->input('data_fabricacao');
		echo $this->Form->input('data_validade');
		echo $this->Form->input('fabricante');
		echo $this->Form->input('status');
		echo $this->Form->input('Posicaoestoque');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Lotes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Loteitens'), array('controller' => 'loteitens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loteiten'), array('controller' => 'loteitens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('controller' => 'posicaoestoques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('controller' => 'posicaoestoques', 'action' => 'add')); ?> </li>
	</ul>
</div>
