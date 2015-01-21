<div class="comitensrepostas form">
<?php echo $this->Form->create('Comitensreposta'); ?>
	<fieldset>
		<legend><?php echo __('Add Comitensreposta'); ?></legend>
	<?php
		echo $this->Form->input('comresposta_id');
		echo $this->Form->input('produto_id');
		echo $this->Form->input('valor_unit');
		echo $this->Form->input('qtde');
		echo $this->Form->input('valor_total');
		echo $this->Form->input('obs');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Comitensrepostas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('controller' => 'comrespostas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comresposta'), array('controller' => 'comrespostas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
