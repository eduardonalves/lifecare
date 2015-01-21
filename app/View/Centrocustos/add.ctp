<div class="centrocustos form">
<?php echo $this->Form->create('Centrocusto'); ?>
	<fieldset>
		<legend><?php echo __('Add Centrocusto'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('limite');
		echo $this->Form->input('limite_usado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Centrocustos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
	</ul>
</div>
