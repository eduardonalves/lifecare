<div class="posicaoestoques form">
<?php echo $this->Form->create('Posicaoestoque'); ?>
	<fieldset>
		<legend><?php echo __('Edit Posicaoestoque'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descricao');
		echo $this->Form->input('Lote');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Posicaoestoque.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Posicaoestoque.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Lotes'), array('controller' => 'lotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lote'), array('controller' => 'lotes', 'action' => 'add')); ?> </li>
	</ul>
</div>
