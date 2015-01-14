<div class="cofins index">
	<h2><?php echo __('Cofins'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('situacaotribcofin_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipodecalculo'); ?></th>
			<th><?php echo $this->Paginator->sort('valorunitcofins'); ?></th>
			<th><?php echo $this->Paginator->sort('aliq_cofins'); ?></th>
			<th><?php echo $this->Paginator->sort('aliq_cofinsst'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cofins as $cofin): ?>
	<tr>
		<td><?php echo h($cofin['Cofin']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cofin['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $cofin['Produto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cofin['Situacaotribcofin']['id'], array('controller' => 'situacaotribcofins', 'action' => 'view', $cofin['Situacaotribcofin']['id'])); ?>
		</td>
		<td><?php echo h($cofin['Cofin']['tipodecalculo']); ?>&nbsp;</td>
		<td><?php echo h($cofin['Cofin']['valorunitcofins']); ?>&nbsp;</td>
		<td><?php echo h($cofin['Cofin']['aliq_cofins']); ?>&nbsp;</td>
		<td><?php echo h($cofin['Cofin']['aliq_cofinsst']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cofin['Cofin']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cofin['Cofin']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cofin['Cofin']['id']), null, __('Are you sure you want to delete # %s?', $cofin['Cofin']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cofin'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribcofins'), array('controller' => 'situacaotribcofins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribcofin'), array('controller' => 'situacaotribcofins', 'action' => 'add')); ?> </li>
	</ul>
</div>
