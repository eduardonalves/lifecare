<div class="ipis form">
<?php echo $this->Form->create('Ipi'); ?>
	<fieldset>
		<legend><?php echo __('Add Ipi'); ?></legend>
	<?php
		echo $this->Form->input('produto_id');
		echo $this->Form->input('situacaotribipi_id');
		echo $this->Form->input('classe_enquadramento');
		echo $this->Form->input('cnpj_produtor');
		echo $this->Form->input('codigo_selo');
		echo $this->Form->input('qtd_selo');
		echo $this->Form->input('tipodecalculo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ipis'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribipis'), array('controller' => 'situacaotribipis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribipi'), array('controller' => 'situacaotribipis', 'action' => 'add')); ?> </li>
	</ul>
</div>
