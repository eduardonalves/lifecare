<div class="modalidadebcs form">
<?php echo $this->Form->create('Modalidadebc'); ?>
	<fieldset>
		<legend><?php echo __('Edit Modalidadebc'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descricao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Modalidadebc.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Modalidadebc.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Modalidadebcs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Icms'), array('controller' => 'icms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Icm'), array('controller' => 'icms', 'action' => 'add')); ?> </li>
	</ul>
</div>
