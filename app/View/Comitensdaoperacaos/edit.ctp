<div class="comitensdaoperacaos form">
<?php echo $this->Form->create('Comitensdaoperacao'); ?>
	<fieldset>
		<legend><?php echo __('Edit Comitensdaoperacao'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('comoperacao_id');
		echo $this->Form->input('produto_id');
		echo $this->Form->input('valor_unit');
		echo $this->Form->input('qtde');
		echo $this->Form->input('valor_total');
		echo $this->Form->input('parceirodenegocio_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Comitensdaoperacao.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Comitensdaoperacao.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Comitensdaoperacaos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
