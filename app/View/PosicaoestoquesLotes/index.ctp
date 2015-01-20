<div class="posicaoestoquesLotes index">
	<h2><?php echo __('Posicaoestoques Lotes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('lote_id'); ?></th>
			<th><?php echo $this->Paginator->sort('posicaoestoque_id'); ?></th>
			<th><?php echo $this->Paginator->sort('qtde'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($posicaoestoquesLotes as $posicaoestoquesLote): ?>
	<tr>
		<td><?php echo h($posicaoestoquesLote['PosicaoestoquesLote']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($posicaoestoquesLote['Lote']['id'], array('controller' => 'lotes', 'action' => 'view', $posicaoestoquesLote['Lote']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($posicaoestoquesLote['Posicaoestoque']['id'], array('controller' => 'posicaoestoques', 'action' => 'view', $posicaoestoquesLote['Posicaoestoque']['id'])); ?>
		</td>
		<td><?php echo h($posicaoestoquesLote['PosicaoestoquesLote']['qtde']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $posicaoestoquesLote['PosicaoestoquesLote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $posicaoestoquesLote['PosicaoestoquesLote']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $posicaoestoquesLote['PosicaoestoquesLote']['id']), null, __('Are you sure you want to delete # %s?', $posicaoestoquesLote['PosicaoestoquesLote']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Posicaoestoques Lote'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Lotes'), array('controller' => 'lotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lote'), array('controller' => 'lotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('controller' => 'posicaoestoques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('controller' => 'posicaoestoques', 'action' => 'add')); ?> </li>
	</ul>
</div>
