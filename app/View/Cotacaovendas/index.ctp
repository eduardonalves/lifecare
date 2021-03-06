<div class="cotacaovendas index">
	<h2><?php echo __('Cotacaovendas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('data_inici'); ?></th>
			<th><?php echo $this->Paginator->sort('data_fim'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th><?php echo $this->Paginator->sort('prazo_entrega'); ?></th>
			<th><?php echo $this->Paginator->sort('forma_pagamento'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cotacaovendas as $comoperacao): ?>
	<tr>
		<td><?php echo h($comoperacao['Cotacaovenda']['id']); ?>&nbsp;</td>
		<td><?php echo h($comoperacao['Cotacaovenda']['data_inici']); ?>&nbsp;</td>
		<td><?php echo h($comoperacao['Cotacaovenda']['data_fim']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comoperacao['User']['id'], array('controller' => 'users', 'action' => 'view', $comoperacao['User']['id'])); ?>
		</td>
		<td><?php echo h($comoperacao['Cotacaovenda']['valor']); ?>&nbsp;</td>
		<td><?php echo h($comoperacao['Cotacaovenda']['prazo_entrega']); ?>&nbsp;</td>
		<td><?php echo h($comoperacao['Cotacaovenda']['forma_pagamento']); ?>&nbsp;</td>
		<td><?php echo h($comoperacao['Cotacaovenda']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comoperacao['Cotacaovenda']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comoperacao['Cotacaovenda']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comoperacao['Cotacaovenda']['id']), null, __('Are you sure you want to delete # %s?', $comoperacao['Cotacaovenda']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cotacaovenda'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comitensdaoperacaos'), array('controller' => 'comitensdaoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comitensdaoperacao'), array('controller' => 'comitensdaoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('controller' => 'comrespostas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comresposta'), array('controller' => 'comrespostas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comtokencotacaovendas'), array('controller' => 'comtokencotacaovendas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comtokencotacao'), array('controller' => 'comtokencotacaovendas', 'action' => 'add')); ?> </li>
	</ul>
</div>
