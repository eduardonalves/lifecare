<div class="produtosTributos form">
<?php echo $this->Form->create('ProdutosTributo'); ?>
	<fieldset>
		<legend><?php echo __('Add Produtos Tributo'); ?></legend>
	<?php
		echo $this->Form->input('produto_id');
		echo $this->Form->input('tributo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Produtos Tributos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tributos'), array('controller' => 'tributos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tributo'), array('controller' => 'tributos', 'action' => 'add')); ?> </li>
	</ul>
</div>
