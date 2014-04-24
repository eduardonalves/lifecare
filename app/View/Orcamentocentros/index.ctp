<div class="orcamentocentros index">
	<h2><?php echo __('Orcamentocentros'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('limite'); ?></th>
			<th><?php echo $this->Paginator->sort('limite_usado'); ?></th>
			<th><?php echo $this->Paginator->sort('periodo_inicial'); ?></th>
			<th><?php echo $this->Paginator->sort('periodo_final'); ?></th>
			<th><?php echo $this->Paginator->sort('centrocusto_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orcamentocentros as $orcamentocentro): ?>
	<tr>
		<td><?php echo h($orcamentocentro['Orcamentocentro']['id']); ?>&nbsp;</td>
		<td><?php echo h($orcamentocentro['Orcamentocentro']['limite']); ?>&nbsp;</td>
		<td><?php echo h($orcamentocentro['Orcamentocentro']['limite_usado']); ?>&nbsp;</td>
		<td><?php echo h($orcamentocentro['Orcamentocentro']['periodo_inicial']); ?>&nbsp;</td>
		<td><?php echo h($orcamentocentro['Orcamentocentro']['periodo_final']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orcamentocentro['Centrocusto']['id'], array('controller' => 'centrocustos', 'action' => 'view', $orcamentocentro['Centrocusto']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orcamentocentro['Orcamentocentro']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orcamentocentro['Orcamentocentro']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orcamentocentro['Orcamentocentro']['id']), null, __('Are you sure you want to delete # %s?', $orcamentocentro['Orcamentocentro']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Orcamentocentro'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Centrocustos'), array('controller' => 'centrocustos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Centrocusto'), array('controller' => 'centrocustos', 'action' => 'add')); ?> </li>
	</ul>
</div>
