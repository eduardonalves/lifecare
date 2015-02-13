<div class="tipodecontas form">
<?php echo $this->Form->create('Tipodeconta'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipodeconta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tipodeconta.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tipodeconta.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tipodecontas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
	</ul>
</div>
