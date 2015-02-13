<div class="confignotas index">
	<h2><?php echo __('Confignotas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio'); ?></th>
			<th><?php echo $this->Paginator->sort('data'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('nota_fiscal'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_total'); ?></th>
			<th><?php echo $this->Paginator->sort('vb_icms'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_icms'); ?></th>
			<th><?php echo $this->Paginator->sort('vb_cst'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_st'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_frete'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_seguro'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_desconto'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_ipi'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_pis'); ?></th>
			<th><?php echo $this->Paginator->sort('v_cofins'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_outros'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($confignotas as $confignota): ?>
	<tr>
		<td><?php echo h($confignota['Confignota']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($confignota['User']['id'], array('controller' => 'users', 'action' => 'view', $confignota['User']['id'])); ?>
		</td>
		<td><?php echo h($confignota['Confignota']['tipo']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['parceirodenegocio']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['data']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['nota_fiscal']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['valor_total']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['vb_icms']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['valor_icms']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['vb_cst']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['valor_st']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['valor_frete']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['valor_seguro']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['valor_desconto']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['valor_ipi']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['valor_pis']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['v_cofins']); ?>&nbsp;</td>
		<td><?php echo h($confignota['Confignota']['valor_outros']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $confignota['Confignota']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $confignota['Confignota']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $confignota['Confignota']['id']), null, __('Are you sure you want to delete # %s?', $confignota['Confignota']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Confignota'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
