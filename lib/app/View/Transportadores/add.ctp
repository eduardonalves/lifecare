<div class="transportadores form">
<?php echo $this->Form->create('Transportadore'); ?>
	<fieldset>
		<legend><?php echo __('Add Transportadore'); ?></legend>
	<?php
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Transportadores'), array('action' => 'index')); ?></li>
	</ul>
</div>
