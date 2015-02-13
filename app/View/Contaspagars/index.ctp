<div class="contas index">
	<h2><?php echo __('Contas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('identificacao'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th><?php echo $this->Paginator->sort('data_emissao'); ?></th>
			<th><?php echo $this->Paginator->sort('data_quitacao'); ?></th>
			<th><?php echo $this->Paginator->sort('imagem'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($contas as $conta): ?>
	<tr>
		<td><?php echo h($conta['Conta']['id']); ?>&nbsp;</td>
		<td><?php echo h($conta['Conta']['identificacao']); ?>&nbsp;</td>
		<td><?php echo h($conta['Conta']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($conta['Conta']['valor']); ?>&nbsp;</td>
		<td><?php echo h($conta['Conta']['data_emissao']); ?>&nbsp;</td>
		<td><?php echo h($conta['Conta']['data_quitacao']); ?>&nbsp;</td>
		<td><?php echo h($conta['Conta']['imagem']); ?>&nbsp;</td>
		<td><?php echo h($conta['Conta']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($conta['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $conta['Parceirodenegocio']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $conta['Conta']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $conta['Conta']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $conta['Conta']['id']), null, __('Are you sure you want to delete # %s?', $conta['Conta']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Conta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagamentos'), array('controller' => 'pagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagamento'), array('controller' => 'pagamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
