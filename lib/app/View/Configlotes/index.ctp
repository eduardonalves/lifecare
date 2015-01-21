<div class="configlotes index">
	<h2><?php echo __('Configlotes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_lote'); ?></th>
			<th><?php echo $this->Paginator->sort('data_fabricacao'); ?></th>
			<th><?php echo $this->Paginator->sort('data_validade'); ?></th>
			<th><?php echo $this->Paginator->sort('fabricante'); ?></th>
			<th><?php echo $this->Paginator->sort('estoque'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($configlotes as $configlote): ?>
	<tr>
		<td><?php echo h($configlote['Configlote']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($configlote['User']['id'], array('controller' => 'users', 'action' => 'view', $configlote['User']['id'])); ?>
		</td>
		<td><?php echo h($configlote['Configlote']['numero_lote']); ?>&nbsp;</td>
		<td><?php echo h($configlote['Configlote']['data_fabricacao']); ?>&nbsp;</td>
		<td><?php echo h($configlote['Configlote']['data_validade']); ?>&nbsp;</td>
		<td><?php echo h($configlote['Configlote']['fabricante']); ?>&nbsp;</td>
		<td><?php echo h($configlote['Configlote']['estoque']); ?>&nbsp;</td>
		<td><?php echo h($configlote['Configlote']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $configlote['Configlote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $configlote['Configlote']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $configlote['Configlote']['id']), null, __('Are you sure you want to delete # %s?', $configlote['Configlote']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Configlote'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
