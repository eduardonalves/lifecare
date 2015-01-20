<div class="configparcelas index">
	<h2><?php echo __('Configparcelas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parcela'); ?></th>
			<th><?php echo $this->Paginator->sort('identificacao_documento'); ?></th>
			<th><?php echo $this->Paginator->sort('data_vencimento'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th><?php echo $this->Paginator->sort('periodocritico'); ?></th>
			<th><?php echo $this->Paginator->sort('desconto'); ?></th>
			<th><?php echo $this->Paginator->sort('banco'); ?></th>
			<th><?php echo $this->Paginator->sort('agencia'); ?></th>
			<th><?php echo $this->Paginator->sort('conta'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($configparcelas as $configparcela): ?>
	<tr>
		<td><?php echo h($configparcela['Configparcela']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($configparcela['User']['id'], array('controller' => 'users', 'action' => 'view', $configparcela['User']['id'])); ?>
		</td>
		<td><?php echo h($configparcela['Configparcela']['parcela']); ?>&nbsp;</td>
		<td><?php echo h($configparcela['Configparcela']['identificacao_documento']); ?>&nbsp;</td>
		<td><?php echo h($configparcela['Configparcela']['data_vencimento']); ?>&nbsp;</td>
		<td><?php echo h($configparcela['Configparcela']['valor']); ?>&nbsp;</td>
		<td><?php echo h($configparcela['Configparcela']['periodocritico']); ?>&nbsp;</td>
		<td><?php echo h($configparcela['Configparcela']['desconto']); ?>&nbsp;</td>
		<td><?php echo h($configparcela['Configparcela']['banco']); ?>&nbsp;</td>
		<td><?php echo h($configparcela['Configparcela']['agencia']); ?>&nbsp;</td>
		<td><?php echo h($configparcela['Configparcela']['conta']); ?>&nbsp;</td>
		<td><?php echo h($configparcela['Configparcela']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $configparcela['Configparcela']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $configparcela['Configparcela']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $configparcela['Configparcela']['id']), null, __('Are you sure you want to delete # %s?', $configparcela['Configparcela']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Configparcela'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
