<div class="loteitens index">
	<h2><?php echo __('Loteitens'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nota_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lote_id'); ?></th>
			<th><?php echo $this->Paginator->sort('qtde'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($loteitens as $loteiten): ?>
	<tr>
		<td><?php echo h($loteiten['Loteiten']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($loteiten['Nota']['id'], array('controller' => 'notas', 'action' => 'view', $loteiten['Nota']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($loteiten['Lote']['id'], array('controller' => 'lotes', 'action' => 'view', $loteiten['Lote']['id'])); ?>
		</td>
		<td><?php echo h($loteiten['Loteiten']['qtde']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $loteiten['Loteiten']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $loteiten['Loteiten']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $loteiten['Loteiten']['id']), null, __('Are you sure you want to delete # %s?', $loteiten['Loteiten']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Loteiten'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lotes'), array('controller' => 'lotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lote'), array('controller' => 'lotes', 'action' => 'add')); ?> </li>
	</ul>
</div>
