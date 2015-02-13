<div class="ipis index">
	<h2><?php echo __('Ipis'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('situacaotribipi_id'); ?></th>
			<th><?php echo $this->Paginator->sort('classe_enquadramento'); ?></th>
			<th><?php echo $this->Paginator->sort('cnpj_produtor'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo_selo'); ?></th>
			<th><?php echo $this->Paginator->sort('qtd_selo'); ?></th>
			<th><?php echo $this->Paginator->sort('tipodecalculo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ipis as $ipi): ?>
	<tr>
		<td><?php echo h($ipi['Ipi']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ipi['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $ipi['Produto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ipi['Situacaotribipi']['id'], array('controller' => 'situacaotribipis', 'action' => 'view', $ipi['Situacaotribipi']['id'])); ?>
		</td>
		<td><?php echo h($ipi['Ipi']['classe_enquadramento']); ?>&nbsp;</td>
		<td><?php echo h($ipi['Ipi']['cnpj_produtor']); ?>&nbsp;</td>
		<td><?php echo h($ipi['Ipi']['codigo_selo']); ?>&nbsp;</td>
		<td><?php echo h($ipi['Ipi']['qtd_selo']); ?>&nbsp;</td>
		<td><?php echo h($ipi['Ipi']['tipodecalculo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ipi['Ipi']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ipi['Ipi']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ipi['Ipi']['id']), null, __('Are you sure you want to delete # %s?', $ipi['Ipi']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ipi'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribipis'), array('controller' => 'situacaotribipis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribipi'), array('controller' => 'situacaotribipis', 'action' => 'add')); ?> </li>
	</ul>
</div>
