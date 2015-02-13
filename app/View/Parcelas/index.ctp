<div class="parcelas index">
	<h2><?php echo __('Parcelas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('identificacao_documento'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('data_vencimento'); ?></th>
			<th><?php echo $this->Paginator->sort('data_pagamento'); ?></th>
			<th><?php echo $this->Paginator->sort('periodocritico'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th><?php echo $this->Paginator->sort('desconto'); ?></th>
			<th><?php echo $this->Paginator->sort('codigodebarras'); ?></th>
			<th><?php echo $this->Paginator->sort('parcela'); ?></th>
			<th><?php echo $this->Paginator->sort('banco'); ?></th>
			<th><?php echo $this->Paginator->sort('agencia'); ?></th>
			<th><?php echo $this->Paginator->sort('conta'); ?></th>
			<th><?php echo $this->Paginator->sort('obs'); ?></th>
			<th><?php echo $this->Paginator->sort('comprovante'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parcelas as $parcela): ?>
	<tr>
		<td><?php echo h($parcela['Parcela']['id']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['identificacao_documento']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['data_vencimento']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['data_pagamento']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['periodocritico']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['valor']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['desconto']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['codigodebarras']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['parcela']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['banco']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['agencia']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['conta']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['obs']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['comprovante']); ?>&nbsp;</td>
		<td><?php echo h($parcela['Parcela']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($parcela['User']['id'], array('controller' => 'users', 'action' => 'view', $parcela['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $parcela['Parcela']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $parcela['Parcela']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $parcela['Parcela']['id']), null, __('Are you sure you want to delete # %s?', $parcela['Parcela']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Parcela'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagamentos'), array('controller' => 'pagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagamento'), array('controller' => 'pagamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
