<div class="quicklinks form">
<?php echo $this->Form->create('Quicklink'); ?>
	<fieldset>
		<legend><?php echo __('Edit Quicklink'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Quicklink.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Quicklink.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Quicklinks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
