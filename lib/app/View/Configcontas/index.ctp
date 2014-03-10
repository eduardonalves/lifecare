<div class="configcontas index">
	<h2><?php echo __('Configcontas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parcela'); ?></th>
			<th><?php echo $this->Paginator->sort('identificacao'); ?></th>
			<th><?php echo $this->Paginator->sort('data_emissao'); ?></th>
			<th><?php echo $this->Paginator->sort('data_vencimento'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio'); ?></th>
			<th><?php echo $this->Paginator->sort('periodocritico'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($configcontas as $configconta): ?>
	<tr>
		<td><?php echo h($configconta['Configconta']['id']); ?>&nbsp;</td>
		<td><?php echo h($configconta['Configconta']['parcela']); ?>&nbsp;</td>
		<td><?php echo h($configconta['Configconta']['identificacao']); ?>&nbsp;</td>
		<td><?php echo h($configconta['Configconta']['data_emissao']); ?>&nbsp;</td>
		<td><?php echo h($configconta['Configconta']['data_vencimento']); ?>&nbsp;</td>
		<td><?php echo h($configconta['Configconta']['valor']); ?>&nbsp;</td>
		<td><?php echo h($configconta['Configconta']['parceirodenegocio']); ?>&nbsp;</td>
		<td><?php echo h($configconta['Configconta']['periodocritico']); ?>&nbsp;</td>
		<td><?php echo h($configconta['Configconta']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($configconta['Configconta']['status']); ?>&nbsp;</td>
		<td><?php echo h($configconta['Configconta']['user_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $configconta['Configconta']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $configconta['Configconta']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $configconta['Configconta']['id']), null, __('Are you sure you want to delete # %s?', $configconta['Configconta']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Configconta'), array('action' => 'add')); ?></li>
	</ul>
</div>
