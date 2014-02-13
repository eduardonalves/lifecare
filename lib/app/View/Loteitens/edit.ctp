<div class="loteitens form">
<?php echo $this->Form->create('Loteiten'); ?>
	<fieldset>
		<legend><?php echo __('Edit Loteiten'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nota_id');
		echo $this->Form->input('lote_id');
		echo $this->Form->input('qtde');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Loteiten.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Loteiten.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Loteitens'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lotes'), array('controller' => 'lotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lote'), array('controller' => 'lotes', 'action' => 'add')); ?> </li>
	</ul>
</div>
