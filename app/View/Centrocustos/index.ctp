<div class="centrocustos index">
	<h2><?php echo __('Centrocustos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('limite'); ?></th>
			<th><?php echo $this->Paginator->sort('limiteatual'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($centrocustos as $centrocusto): ?>
	<tr>
		<td><?php echo h($centrocusto['Centrocusto']['id']); ?>&nbsp;</td>
		<td><?php echo h($centrocusto['Centrocusto']['nome']); ?>&nbsp;</td>
		<td><?php echo h($centrocusto['Centrocusto']['limite']); ?>&nbsp;</td>
		<td><?php echo h($centrocusto['Centrocusto']['limiteatual']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $centrocusto['Centrocusto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $centrocusto['Centrocusto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $centrocusto['Centrocusto']['id']), null, __('Are you sure you want to delete # %s?', $centrocusto['Centrocusto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Centrocusto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
	</ul>
</div>
