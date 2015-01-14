<div class="configcobrancas form">
<?php echo $this->Form->create('Configcobranca'); ?>
	<fieldset>
		<legend><?php echo __('Edit Configcobranca'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('data_inicio');
		echo $this->Form->input('data_fim');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Configcobranca.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Configcobranca.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Configcobrancas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
