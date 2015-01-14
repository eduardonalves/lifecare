<div class="situacaotribpis form">
<?php echo $this->Form->create('Situacaotribpi'); ?>
	<fieldset>
		<legend><?php echo __('Add Situacaotribpi'); ?></legend>
	<?php
		echo $this->Form->input('descricao',array('maxlength'=>'200'));
		echo $this->Form->input('codigo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Situacaotribpis'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pis'), array('controller' => 'pis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pi'), array('controller' => 'pis', 'action' => 'add')); ?> </li>
	</ul>
</div>
