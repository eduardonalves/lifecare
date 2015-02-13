<div class="fabricantes index">
	<h2><?php echo __('Fabricantes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($fabricantes as $fabricante): ?>
	<tr>
		<td><?php echo h($fabricante['Fabricante']['id']); ?>&nbsp;</td>
		<td><?php echo h($fabricante['Fabricante']['nome']); ?>&nbsp;</td>
		<td><?php echo h($fabricante['Fabricante']['created']); ?>&nbsp;</td>
		<td><?php echo h($fabricante['Fabricante']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $fabricante['Fabricante']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $fabricante['Fabricante']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $fabricante['Fabricante']['id']), null, __('Are you sure you want to delete # %s?', $fabricante['Fabricante']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Fabricante'), array('action' => 'add')); ?></li>
	</ul>
</div>
