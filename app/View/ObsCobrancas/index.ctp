<div class="obsCobrancas index">
	<h2><?php echo __('Obs Cobrancas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parcela_id'); ?></th>
			<th><?php echo $this->Paginator->sort('data'); ?></th>
			<th><?php echo $this->Paginator->sort('obs'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($obsCobrancas as $obsCobranca): ?>
	<tr>
		<td><?php echo h($obsCobranca['ObsCobranca']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($obsCobranca['Parcela']['id'], array('controller' => 'parcelas', 'action' => 'view', $obsCobranca['Parcela']['id'])); ?>
		</td>
		<td><?php echo h($obsCobranca['ObsCobranca']['data']); ?>&nbsp;</td>
		<td><?php echo h($obsCobranca['ObsCobranca']['obs']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $obsCobranca['ObsCobranca']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $obsCobranca['ObsCobranca']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $obsCobranca['ObsCobranca']['id']), null, __('Are you sure you want to delete # %s?', $obsCobranca['ObsCobranca']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Obs Cobranca'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
	</ul>
</div>
