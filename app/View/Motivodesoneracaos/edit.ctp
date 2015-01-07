<div class="motivodesoneracaos form">
<?php echo $this->Form->create('Motivodesoneracao'); ?>
	<fieldset>
		<legend><?php echo __('Edit Motivodesoneracao'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descricao');
		echo $this->Form->input('codigo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Motivodesoneracao.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Motivodesoneracao.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Motivodesoneracaos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Icms'), array('controller' => 'icms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Icm'), array('controller' => 'icms', 'action' => 'add')); ?> </li>
	</ul>
</div>
