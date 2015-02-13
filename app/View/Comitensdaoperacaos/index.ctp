<div class="comitensdaoperacaos index">
	<h2><?php echo __('Comitensdaoperacaos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('comoperacao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_unit'); ?></th>
			<th><?php echo $this->Paginator->sort('qtde'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_total'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comitensdaoperacaos as $comitensdaoperacao): ?>
	<tr>
		<td><?php echo h($comitensdaoperacao['Comitensdaoperacao']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comitensdaoperacao['Comoperacao']['id'], array('controller' => 'comoperacaos', 'action' => 'view', $comitensdaoperacao['Comoperacao']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($comitensdaoperacao['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $comitensdaoperacao['Produto']['id'])); ?>
		</td>
		<td><?php echo h($comitensdaoperacao['Comitensdaoperacao']['valor_unit']); ?>&nbsp;</td>
		<td><?php echo h($comitensdaoperacao['Comitensdaoperacao']['qtde']); ?>&nbsp;</td>
		<td><?php echo h($comitensdaoperacao['Comitensdaoperacao']['valor_total']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comitensdaoperacao['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $comitensdaoperacao['Parceirodenegocio']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comitensdaoperacao['Comitensdaoperacao']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comitensdaoperacao['Comitensdaoperacao']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comitensdaoperacao['Comitensdaoperacao']['id']), null, __('Are you sure you want to delete # %s?', $comitensdaoperacao['Comitensdaoperacao']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Comitensdaoperacao'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
