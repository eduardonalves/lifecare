<div class="categoriasProdutos index">
	<h2><?php echo __('Categorias Produtos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoriasProdutos as $categoriasProduto): ?>
	<tr>
		<td><?php echo h($categoriasProduto['CategoriasProduto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($categoriasProduto['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $categoriasProduto['Produto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($categoriasProduto['Categoria']['id'], array('controller' => 'categorias', 'action' => 'view', $categoriasProduto['Categoria']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $categoriasProduto['CategoriasProduto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $categoriasProduto['CategoriasProduto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $categoriasProduto['CategoriasProduto']['id']), null, __('Are you sure you want to delete # %s?', $categoriasProduto['CategoriasProduto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Categorias Produto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
	</ul>
</div>
