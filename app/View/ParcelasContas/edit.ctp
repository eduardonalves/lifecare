<div class="parcelasContas form">
<?php echo $this->Form->create('ParcelasConta'); ?>
	<fieldset>
		<legend><?php echo __('Edit Parcelas Conta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parcela_id');
		echo $this->Form->input('conta_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ParcelasConta.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ParcelasConta.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Parcelas Contas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
	</ul>
</div>
