<div class="produtoitens index">
	<h2><?php echo __('Produtoitens'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nota_id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ncm_sh'); ?></th>
			<th><?php echo $this->Paginator->sort('cst'); ?></th>
			<th><?php echo $this->Paginator->sort('cfop'); ?></th>
			<th><?php echo $this->Paginator->sort('unidade'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_unitario'); ?></th>
			<th><?php echo $this->Paginator->sort('qtde'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_total'); ?></th>
			<th><?php echo $this->Paginator->sort('valorbase_icms'); ?></th>
			<th><?php echo $this->Paginator->sort('percentual_icms'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_icms'); ?></th>
			<th><?php echo $this->Paginator->sort('valorbase_st'); ?></th>
			<th><?php echo $this->Paginator->sort('percentual_st'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_st'); ?></th>
			<th><?php echo $this->Paginator->sort('percentual_ipi'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_ipi'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produtoitens as $produtoiten): ?>
	<tr>
		<td><?php echo h($produtoiten['Produtoiten']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($produtoiten['Nota']['id'], array('controller' => 'notas', 'action' => 'view', $produtoiten['Nota']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($produtoiten['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $produtoiten['Produto']['id'])); ?>
		</td>
		<td><?php echo h($produtoiten['Produtoiten']['ncm_sh']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['cst']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['cfop']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['unidade']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['valor_unitario']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['qtde']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['valor_total']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['valorbase_icms']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['percentual_icms']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['valor_icms']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['valorbase_st']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['percentual_st']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['valor_st']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['percentual_ipi']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['valor_ipi']); ?>&nbsp;</td>
		<td><?php echo h($produtoiten['Produtoiten']['tipo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $produtoiten['Produtoiten']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $produtoiten['Produtoiten']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $produtoiten['Produtoiten']['id']), null, __('Are you sure you want to delete # %s?', $produtoiten['Produtoiten']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Produtoiten'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
