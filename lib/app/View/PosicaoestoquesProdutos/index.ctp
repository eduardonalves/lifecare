<div class="posicaoestoquesProdutos index">
	<h2><?php echo __('Posicaoestoques Produtos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('posicaoestoque_id'); ?></th>
			<th><?php echo $this->Paginator->sort('qtde'); ?></th>
			<th><?php echo $this->Paginator->sort('lote'); ?></th>
			<th><?php echo $this->Paginator->sort('data_validade'); ?></th>
			<th><?php echo $this->Paginator->sort('data'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($posicaoestoquesProdutos as $posicaoestoquesProduto): ?>
	<tr>
		<td><?php echo h($posicaoestoquesProduto['PosicaoestoquesProduto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($posicaoestoquesProduto['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $posicaoestoquesProduto['Produto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($posicaoestoquesProduto['Posicaoestoque']['id'], array('controller' => 'posicaoestoques', 'action' => 'view', $posicaoestoquesProduto['Posicaoestoque']['id'])); ?>
		</td>
		<td><?php echo h($posicaoestoquesProduto['PosicaoestoquesProduto']['qtde']); ?>&nbsp;</td>
		<td><?php echo h($posicaoestoquesProduto['PosicaoestoquesProduto']['lote']); ?>&nbsp;</td>
		<td><?php echo h($posicaoestoquesProduto['PosicaoestoquesProduto']['data_validade']); ?>&nbsp;</td>
		<td><?php echo h($posicaoestoquesProduto['PosicaoestoquesProduto']['data']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $posicaoestoquesProduto['PosicaoestoquesProduto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $posicaoestoquesProduto['PosicaoestoquesProduto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $posicaoestoquesProduto['PosicaoestoquesProduto']['id']), null, __('Are you sure you want to delete # %s?', $posicaoestoquesProduto['PosicaoestoquesProduto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Posicaoestoques Produto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('controller' => 'posicaoestoques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('controller' => 'posicaoestoques', 'action' => 'add')); ?> </li>
	</ul>
</div>
