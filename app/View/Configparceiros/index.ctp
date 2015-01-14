<div class="configparceiros index">
	<h2><?php echo __('Configparceiros'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('cnpj'); ?></th>
			<th><?php echo $this->Paginator->sort('endereco'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($configparceiros as $configparceiro): ?>
	<tr>
		<td><?php echo h($configparceiro['Configparceiro']['id']); ?>&nbsp;</td>
		<td><?php echo h($configparceiro['Configparceiro']['nome']); ?>&nbsp;</td>
		<td><?php echo h($configparceiro['Configparceiro']['cnpj']); ?>&nbsp;</td>
		<td><?php echo h($configparceiro['Configparceiro']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($configparceiro['Configparceiro']['telefone']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($configparceiro['User']['id'], array('controller' => 'users', 'action' => 'view', $configparceiro['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $configparceiro['Configparceiro']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $configparceiro['Configparceiro']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $configparceiro['Configparceiro']['id']), null, __('Are you sure you want to delete # %s?', $configparceiro['Configparceiro']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Configparceiro'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
