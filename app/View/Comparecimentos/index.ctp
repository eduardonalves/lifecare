<div class="comparecimentos index">
	<h2><?php echo __('Comparecimentos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('funcionario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comparecimentos as $comparecimento): ?>
	<tr>
		<td><?php echo h($comparecimento['Comparecimento']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comparecimento['Funcionario']['id'], array('controller' => 'funcionarios', 'action' => 'view', $comparecimento['Funcionario']['id'])); ?>
		</td>
		<td><?php echo h($comparecimento['Comparecimento']['date']); ?>&nbsp;</td>
		<td><?php echo h($comparecimento['Comparecimento']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comparecimento['Comparecimento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comparecimento['Comparecimento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comparecimento['Comparecimento']['id']), null, __('Are you sure you want to delete # %s?', $comparecimento['Comparecimento']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Comparecimento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Funcionarios'), array('controller' => 'funcionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Funcionario'), array('controller' => 'funcionarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
