<div class="comitensrepostas index">
	<h2><?php echo __('Comitensrepostas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('comresposta_id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_unit'); ?></th>
			<th><?php echo $this->Paginator->sort('qtde'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_total'); ?></th>
			<th><?php echo $this->Paginator->sort('obs'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comitensrepostas as $comitensreposta): ?>
	<tr>
		<td><?php echo h($comitensreposta['Comitensreposta']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comitensreposta['Comresposta']['id'], array('controller' => 'comrespostas', 'action' => 'view', $comitensreposta['Comresposta']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($comitensreposta['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $comitensreposta['Produto']['id'])); ?>
		</td>
		<td><?php echo h($comitensreposta['Comitensreposta']['valor_unit']); ?>&nbsp;</td>
		<td><?php echo h($comitensreposta['Comitensreposta']['qtde']); ?>&nbsp;</td>
		<td><?php echo h($comitensreposta['Comitensreposta']['valor_total']); ?>&nbsp;</td>
		<td><?php echo h($comitensreposta['Comitensreposta']['obs']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comitensreposta['Comitensreposta']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comitensreposta['Comitensreposta']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comitensreposta['Comitensreposta']['id']), null, __('Are you sure you want to delete # %s?', $comitensreposta['Comitensreposta']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Comitensreposta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('controller' => 'comrespostas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comresposta'), array('controller' => 'comrespostas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
