<div class="posicaoestoquesLotes form">
<?php echo $this->Form->create('PosicaoestoquesLote'); ?>
	<fieldset>
		<legend><?php echo __('Edit Posicaoestoques Lote'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lote_id');
		echo $this->Form->input('posicaoestoque_id');
		echo $this->Form->input('qtde');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PosicaoestoquesLote.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PosicaoestoquesLote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques Lotes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Lotes'), array('controller' => 'lotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lote'), array('controller' => 'lotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('controller' => 'posicaoestoques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('controller' => 'posicaoestoques', 'action' => 'add')); ?> </li>
	</ul>
</div>
