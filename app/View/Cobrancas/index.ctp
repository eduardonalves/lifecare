<div class="cobrancas index">
	<h2><?php echo __('Cobrancas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parcela_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th><?php echo $this->Paginator->sort('data_inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('data_fim'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cobrancas as $cobranca): ?>
	<tr>
		<td><?php echo h($cobranca['Cobranca']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cobranca['Parcela']['id'], array('controller' => 'parcelas', 'action' => 'view', $cobranca['Parcela']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cobranca['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $cobranca['Parceirodenegocio']['id'])); ?>
		</td>
		<td><?php echo h($cobranca['Cobranca']['data_inicio']); ?>&nbsp;</td>
		<td><?php echo h($cobranca['Cobranca']['data_fim']); ?>&nbsp;</td>
		<td><?php echo h($cobranca['Cobranca']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cobranca['Cobranca']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cobranca['Cobranca']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cobranca['Cobranca']['id']), null, __('Are you sure you want to delete # %s?', $cobranca['Cobranca']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cobranca'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Negociacaos'), array('controller' => 'negociacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Negociacao'), array('controller' => 'negociacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
