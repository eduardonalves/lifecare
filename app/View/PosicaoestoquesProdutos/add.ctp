<div class="posicaoestoquesProdutos form">
<?php echo $this->Form->create('PosicaoestoquesProduto'); ?>
	<fieldset>
		<legend><?php echo __('Add Posicaoestoques Produto'); ?></legend>
	<?php
		echo $this->Form->input('produto_id');
		echo $this->Form->input('posicaoestoque_id');
		echo $this->Form->input('qtde');
		echo $this->Form->input('lote');
		echo $this->Form->input('data_validade');
		echo $this->Form->input('data');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Posicaoestoques Produtos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('controller' => 'posicaoestoques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('controller' => 'posicaoestoques', 'action' => 'add')); ?> </li>
	</ul>
</div>
