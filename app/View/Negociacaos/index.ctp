<div class="negociacaos index">
	<h2><?php echo __('Negociacaos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('data'); ?></th>
			<th><?php echo $this->Paginator->sort('obs'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($negociacaos as $negociacao): ?>
	<tr>
		<td><?php echo h($negociacao['Negociacao']['id']); ?>&nbsp;</td>
		<td><?php echo h($negociacao['Negociacao']['data']); ?>&nbsp;</td>
		<td><?php echo h($negociacao['Negociacao']['obs']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($negociacao['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $negociacao['Parceirodenegocio']['id'])); ?>
		</td>
		<td><?php echo h($negociacao['Negociacao']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $negociacao['Negociacao']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $negociacao['Negociacao']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $negociacao['Negociacao']['id']), null, __('Are you sure you want to delete # %s?', $negociacao['Negociacao']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Negociacao'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
	</ul>
</div>
