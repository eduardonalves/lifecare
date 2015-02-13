<div class="tributos index">
	<h2><?php echo __('Tributos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ncm'); ?></th>
			<th><?php echo $this->Paginator->sort('cfop'); ?></th>
			<th><?php echo $this->Paginator->sort('al_icms'); ?></th>
			<th><?php echo $this->Paginator->sort('al_ipi'); ?></th>
			<th><?php echo $this->Paginator->sort('al_cst'); ?></th>
			<th><?php echo $this->Paginator->sort('al_pis'); ?></th>
			<th><?php echo $this->Paginator->sort('al_confins'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo_selo_ipi'); ?></th>
			<th><?php echo $this->Paginator->sort('qtde_selo_ipi'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tributos as $tributo): ?>
	<tr>
		<td><?php echo h($tributo['Tributo']['id']); ?>&nbsp;</td>
		<td><?php echo h($tributo['Tributo']['ncm']); ?>&nbsp;</td>
		<td><?php echo h($tributo['Tributo']['cfop']); ?>&nbsp;</td>
		<td><?php echo h($tributo['Tributo']['al_icms']); ?>&nbsp;</td>
		<td><?php echo h($tributo['Tributo']['al_ipi']); ?>&nbsp;</td>
		<td><?php echo h($tributo['Tributo']['al_cst']); ?>&nbsp;</td>
		<td><?php echo h($tributo['Tributo']['al_pis']); ?>&nbsp;</td>
		<td><?php echo h($tributo['Tributo']['al_confins']); ?>&nbsp;</td>
		<td><?php echo h($tributo['Tributo']['codigo_selo_ipi']); ?>&nbsp;</td>
		<td><?php echo h($tributo['Tributo']['qtde_selo_ipi']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tributo['Tributo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tributo['Tributo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tributo['Tributo']['id']), null, __('Are you sure you want to delete # %s?', $tributo['Tributo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tributo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
