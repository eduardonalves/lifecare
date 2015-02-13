<div class="posicaoestoquesProdutos view">
<h2><?php echo __('Posicaoestoques Produto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($posicaoestoquesProduto['PosicaoestoquesProduto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($posicaoestoquesProduto['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $posicaoestoquesProduto['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Posicaoestoque'); ?></dt>
		<dd>
			<?php echo $this->Html->link($posicaoestoquesProduto['Posicaoestoque']['id'], array('controller' => 'posicaoestoques', 'action' => 'view', $posicaoestoquesProduto['Posicaoestoque']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qtde'); ?></dt>
		<dd>
			<?php echo h($posicaoestoquesProduto['PosicaoestoquesProduto']['qtde']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lote'); ?></dt>
		<dd>
			<?php echo h($posicaoestoquesProduto['PosicaoestoquesProduto']['lote']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Validade'); ?></dt>
		<dd>
			<?php echo h($posicaoestoquesProduto['PosicaoestoquesProduto']['data_validade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($posicaoestoquesProduto['PosicaoestoquesProduto']['data']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Posicaoestoques Produto'), array('action' => 'edit', $posicaoestoquesProduto['PosicaoestoquesProduto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Posicaoestoques Produto'), array('action' => 'delete', $posicaoestoquesProduto['PosicaoestoquesProduto']['id']), null, __('Are you sure you want to delete # %s?', $posicaoestoquesProduto['PosicaoestoquesProduto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques Produtos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoques Produto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('controller' => 'posicaoestoques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('controller' => 'posicaoestoques', 'action' => 'add')); ?> </li>
	</ul>
</div>
