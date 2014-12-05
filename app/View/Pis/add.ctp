<div class="pis form">
<?php echo $this->Form->create('Pi'); ?>
	<fieldset>
		<legend><?php echo __('Add Pi'); ?></legend>
	<?php
		echo $this->Form->input('situacaotribpi_id');
		echo $this->Form->input('alq_pis');
		echo $this->Form->input('tipodecalculo');
		echo $this->Form->input('produto_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pis'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Situacaotribpis'), array('controller' => 'situacaotribpis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribpi'), array('controller' => 'situacaotribpis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
