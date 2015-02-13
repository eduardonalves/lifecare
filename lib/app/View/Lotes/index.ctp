<div class="lotes index">
	<h2><?php echo __('Lotes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_lote'); ?></th>
			<th><?php echo $this->Paginator->sort('data_fabricacao'); ?></th>
			<th><?php echo $this->Paginator->sort('data_validade'); ?></th>
			<th><?php echo $this->Paginator->sort('fabricante'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($lotes as $lote): ?>
	<tr>
		<td><?php echo h($lote['Lote']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($lote['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $lote['Produto']['id'])); ?>
		</td>
		<td><?php echo h($lote['Lote']['numero_lote']); ?>&nbsp;</td>
		<td><?php echo h($lote['Lote']['data_fabricacao']); ?>&nbsp;</td>
		<td><?php echo h($lote['Lote']['data_validade']); ?>&nbsp;</td>
		<td><?php echo h($lote['Lote']['fabricante']); ?>&nbsp;</td>
		<td><?php echo h($lote['Lote']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $lote['Lote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $lote['Lote']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $lote['Lote']['id']), null, __('Are you sure you want to delete # %s?', $lote['Lote']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Lote'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Loteitens'), array('controller' => 'loteitens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loteiten'), array('controller' => 'loteitens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('controller' => 'posicaoestoques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('controller' => 'posicaoestoques', 'action' => 'add')); ?> </li>
	</ul>
</div>
