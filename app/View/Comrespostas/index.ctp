<div class="comrespostas index">
	<h2><?php echo __('Comrespostas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('comoperacao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('data_resposta'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th><?php echo $this->Paginator->sort('forma_pagamento'); ?></th>
			<th><?php echo $this->Paginator->sort('prazo_entrega'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th><?php echo $this->Paginator->sort('obs'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comrespostas as $comresposta): ?>
	<tr>
		<td><?php echo h($comresposta['Comresposta']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comresposta['Comoperacao']['id'], array('controller' => 'comoperacaos', 'action' => 'view', $comresposta['Comoperacao']['id'])); ?>
		</td>
		<td><?php echo h($comresposta['Comresposta']['data_resposta']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comresposta['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $comresposta['Parceirodenegocio']['id'])); ?>
		</td>
		<td><?php echo h($comresposta['Comresposta']['forma_pagamento']); ?>&nbsp;</td>
		<td><?php echo h($comresposta['Comresposta']['prazo_entrega']); ?>&nbsp;</td>
		<td><?php echo h($comresposta['Comresposta']['valor']); ?>&nbsp;</td>
		<td><?php echo h($comresposta['Comresposta']['obs']); ?>&nbsp;</td>
		<td><?php echo h($comresposta['Comresposta']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comresposta['Comresposta']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comresposta['Comresposta']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comresposta['Comresposta']['id']), null, __('Are you sure you want to delete # %s?', $comresposta['Comresposta']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Comresposta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comtokencotacaos'), array('controller' => 'comtokencotacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comtokencotacao'), array('controller' => 'comtokencotacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
