<div class="produtosTributos form">
<?php echo $this->Form->create('ProdutosTributo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Produtos Tributo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('produto_id');
		echo $this->Form->input('tributo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProdutosTributo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProdutosTributo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos Tributos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tributos'), array('controller' => 'tributos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tributo'), array('controller' => 'tributos', 'action' => 'add')); ?> </li>
	</ul>
</div>
