<div class="negociacaos form">
<?php echo $this->Form->create('Negociacao'); ?>
	<fieldset>
		<legend><?php echo __('Add Negociacao'); ?></legend>
	<?php
		echo $this->Form->input('data');
		echo $this->Form->input('obs');
		echo $this->Form->input('parceirodenegocio_id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Negociacaos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
	</ul>
</div>
