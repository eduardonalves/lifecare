<div class="dadoscreditos index">
	<h2><?php echo __('Dadoscreditos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th><?php echo $this->Paginator->sort('limite'); ?></th>
			<th><?php echo $this->Paginator->sort('limite_usado'); ?></th>
			<th><?php echo $this->Paginator->sort('data_liberacao'); ?></th>
			<th><?php echo $this->Paginator->sort('validade_limite'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('bloqueado'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dadoscreditos as $dadoscredito): ?>
	<tr>
		<td><?php echo h($dadoscredito['Dadoscredito']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dadoscredito['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $dadoscredito['Parceirodenegocio']['id'])); ?>
		</td>
		<td><?php echo h($dadoscredito['Dadoscredito']['limite']); ?>&nbsp;</td>
		<td><?php echo h($dadoscredito['Dadoscredito']['limite_usado']); ?>&nbsp;</td>
		<td><?php echo h($dadoscredito['Dadoscredito']['data_liberacao']); ?>&nbsp;</td>
		<td><?php echo h($dadoscredito['Dadoscredito']['validade_limite']); ?>&nbsp;</td>
		<td><?php echo h($dadoscredito['Dadoscredito']['status']); ?>&nbsp;</td>
		<td><?php echo h($dadoscredito['Dadoscredito']['bloqueado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dadoscredito['User']['id'], array('controller' => 'users', 'action' => 'view', $dadoscredito['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dadoscredito['Dadoscredito']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dadoscredito['Dadoscredito']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dadoscredito['Dadoscredito']['id']), null, __('Are you sure you want to delete # %s?', $dadoscredito['Dadoscredito']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Dadoscredito'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
