<div class="obsCobrancas form">
<?php echo $this->Form->create('ObsCobranca'); ?>
	<fieldset>
		<legend><?php echo __('Edit Obs Cobranca'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parcela_id');
		echo $this->Form->input('data');
		echo $this->Form->input('obs');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ObsCobranca.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ObsCobranca.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Obs Cobrancas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
	</ul>
</div>
