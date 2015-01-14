<div class="transportadores form">
<?php echo $this->Form->create('Transportadore'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transportadore'); ?></legend>
	<?php
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Transportadore.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Transportadore.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transportadores'), array('action' => 'index')); ?></li>
	</ul>
</div>
