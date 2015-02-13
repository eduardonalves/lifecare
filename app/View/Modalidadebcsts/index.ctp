<div class="modalidadebcsts index">
	<h2><?php echo __('Modalidadebcsts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($modalidadebcsts as $modalidadebcst): ?>
	<tr>
		<td><?php echo h($modalidadebcst['Modalidadebcst']['id']); ?>&nbsp;</td>
		<td><?php echo h($modalidadebcst['Modalidadebcst']['descricao']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $modalidadebcst['Modalidadebcst']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $modalidadebcst['Modalidadebcst']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $modalidadebcst['Modalidadebcst']['id']), null, __('Are you sure you want to delete # %s?', $modalidadebcst['Modalidadebcst']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Modalidadebcst'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Icms'), array('controller' => 'icms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Icm'), array('controller' => 'icms', 'action' => 'add')); ?> </li>
	</ul>
</div>
