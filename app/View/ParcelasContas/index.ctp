<div class="parcelasContas index">
	<h2><?php echo __('Parcelas Contas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parcela_id'); ?></th>
			<th><?php echo $this->Paginator->sort('conta_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parcelasContas as $parcelasConta): ?>
	<tr>
		<td><?php echo h($parcelasConta['ParcelasConta']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($parcelasConta['Parcela']['id'], array('controller' => 'parcelas', 'action' => 'view', $parcelasConta['Parcela']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($parcelasConta['Conta']['id'], array('controller' => 'contas', 'action' => 'view', $parcelasConta['Conta']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $parcelasConta['ParcelasConta']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $parcelasConta['ParcelasConta']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $parcelasConta['ParcelasConta']['id']), null, __('Are you sure you want to delete # %s?', $parcelasConta['ParcelasConta']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Parcelas Conta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
	</ul>
</div>
