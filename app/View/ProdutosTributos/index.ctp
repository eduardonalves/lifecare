<div class="produtosTributos index">
	<h2><?php echo __('Produtos Tributos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tributo_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produtosTributos as $produtosTributo): ?>
	<tr>
		<td><?php echo h($produtosTributo['ProdutosTributo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($produtosTributo['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $produtosTributo['Produto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($produtosTributo['Tributo']['id'], array('controller' => 'tributos', 'action' => 'view', $produtosTributo['Tributo']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $produtosTributo['ProdutosTributo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $produtosTributo['ProdutosTributo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $produtosTributo['ProdutosTributo']['id']), null, __('Are you sure you want to delete # %s?', $produtosTributo['ProdutosTributo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Produtos Tributo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tributos'), array('controller' => 'tributos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tributo'), array('controller' => 'tributos', 'action' => 'add')); ?> </li>
	</ul>
</div>
