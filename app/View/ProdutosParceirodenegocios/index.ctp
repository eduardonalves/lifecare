<div class="produtosParceirodenegocios index">
	<h2><?php echo __('Produtos Parceirodenegocios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produtosParceirodenegocios as $produtosParceirodenegocio): ?>
	<tr>
		<td><?php echo h($produtosParceirodenegocio['ProdutosParceirodenegocio']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($produtosParceirodenegocio['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $produtosParceirodenegocio['Produto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($produtosParceirodenegocio['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $produtosParceirodenegocio['Parceirodenegocio']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $produtosParceirodenegocio['ProdutosParceirodenegocio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $produtosParceirodenegocio['ProdutosParceirodenegocio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $produtosParceirodenegocio['ProdutosParceirodenegocio']['id']), null, __('Are you sure you want to delete # %s?', $produtosParceirodenegocio['ProdutosParceirodenegocio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Produtos Parceirodenegocio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
