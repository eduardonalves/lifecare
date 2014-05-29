<div class="saidas index">
	<h2><?php echo __('Saidas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($saidas as $saida): ?>
	<tr>
		<td><?php echo h($saida['Saida']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($saida['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $saida['Cliente']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Parceirodenegocio']['id'], array('controller' => 'parceirodenegocios', 'action' => 'view', $saida['Parceirodenegocio']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $saida['Saida']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $saida['Saida']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $saida['Saida']['id']), null, __('Are you sure you want to delete # %s?', $saida['Saida']['id'])); ?>
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
	<?php
	
		echo "<pre>";
			print_r($saidas);
		echo "</pre>";
	?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Saida'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
