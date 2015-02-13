<div class="itenstransps index">
	<h2><?php echo __('Itenstransps'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('qVol'); ?></th>
			<th><?php echo $this->Paginator->sort('mod_frete'); ?></th>
			<th><?php echo $this->Paginator->sort('peso_liq'); ?></th>
			<th><?php echo $this->Paginator->sort('peso_bruto'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($itenstransps as $itenstransp): ?>
	<tr>
		<td><?php echo h($itenstransp['Itenstransp']['id']); ?>&nbsp;</td>
		<td><?php echo h($itenstransp['Itenstransp']['qVol']); ?>&nbsp;</td>
		<td><?php echo h($itenstransp['Itenstransp']['mod_frete']); ?>&nbsp;</td>
		<td><?php echo h($itenstransp['Itenstransp']['peso_liq']); ?>&nbsp;</td>
		<td><?php echo h($itenstransp['Itenstransp']['peso_bruto']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($itenstransp['Parceirodenegocio']['id'], array('controller' => 'parceirodenegocios', 'action' => 'view', $itenstransp['Parceirodenegocio']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $itenstransp['Itenstransp']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $itenstransp['Itenstransp']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $itenstransp['Itenstransp']['id']), null, __('Are you sure you want to delete # %s?', $itenstransp['Itenstransp']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Itenstransp'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
