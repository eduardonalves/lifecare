<div class="dadosbancarios index">
	<h2><?php echo __('Dadosbancarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_banco'); ?></th>
			<th><?php echo $this->Paginator->sort('nome_banco'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_agencia'); ?></th>
			<th><?php echo $this->Paginator->sort('nome_agencia'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone_banco'); ?></th>
			<th><?php echo $this->Paginator->sort('gerente'); ?></th>
			<th><?php echo $this->Paginator->sort('conta'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dadosbancarios as $dadosbancario): ?>
	<tr>
		<td><?php echo h($dadosbancario['Dadosbancario']['id']); ?>&nbsp;</td>
		<td><?php echo h($dadosbancario['Dadosbancario']['numero_banco']); ?>&nbsp;</td>
		<td><?php echo h($dadosbancario['Dadosbancario']['nome_banco']); ?>&nbsp;</td>
		<td><?php echo h($dadosbancario['Dadosbancario']['numero_agencia']); ?>&nbsp;</td>
		<td><?php echo h($dadosbancario['Dadosbancario']['nome_agencia']); ?>&nbsp;</td>
		<td><?php echo h($dadosbancario['Dadosbancario']['telefone_banco']); ?>&nbsp;</td>
		<td><?php echo h($dadosbancario['Dadosbancario']['gerente']); ?>&nbsp;</td>
		<td><?php echo h($dadosbancario['Dadosbancario']['conta']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dadosbancario['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $dadosbancario['Parceirodenegocio']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dadosbancario['Dadosbancario']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dadosbancario['Dadosbancario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dadosbancario['Dadosbancario']['id']), null, __('Are you sure you want to delete # %s?', $dadosbancario['Dadosbancario']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Dadosbancario'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
