<div class="icms index">
	<h2><?php echo __('Icms'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('produto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modalidadebc_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modalidadebcst_id'); ?></th>
			<th><?php echo $this->Paginator->sort('situacaotribicm_id'); ?></th>
			<th><?php echo $this->Paginator->sort('aliq_icms'); ?></th>
			<th><?php echo $this->Paginator->sort('margemvaloradic'); ?></th>
			<th><?php echo $this->Paginator->sort('reducaobasecalcst'); ?></th>
			<th><?php echo $this->Paginator->sort('precounitpautast'); ?></th>
			<th><?php echo $this->Paginator->sort('alq_icmsst'); ?></th>
			<th><?php echo $this->Paginator->sort('motivodesoneracao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('percentualbcoppropria'); ?></th>
			<th><?php echo $this->Paginator->sort('ufpgtoicmsst'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($icms as $icm): ?>
	<tr>
		<td><?php echo h($icm['Icm']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($icm['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $icm['Produto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($icm['Modalidadebc']['id'], array('controller' => 'modalidadebcs', 'action' => 'view', $icm['Modalidadebc']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($icm['Modalidadebcst']['id'], array('controller' => 'modalidadebcsts', 'action' => 'view', $icm['Modalidadebcst']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($icm['Situacaotribicm']['id'], array('controller' => 'situacaotribicms', 'action' => 'view', $icm['Situacaotribicm']['id'])); ?>
		</td>
		<td><?php echo h($icm['Icm']['aliq_icms']); ?>&nbsp;</td>
		<td><?php echo h($icm['Icm']['margemvaloradic']); ?>&nbsp;</td>
		<td><?php echo h($icm['Icm']['reducaobasecalcst']); ?>&nbsp;</td>
		<td><?php echo h($icm['Icm']['precounitpautast']); ?>&nbsp;</td>
		<td><?php echo h($icm['Icm']['alq_icmsst']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($icm['Motivodesoneracao']['id'], array('controller' => 'motivodesoneracaos', 'action' => 'view', $icm['Motivodesoneracao']['id'])); ?>
		</td>
		<td><?php echo h($icm['Icm']['percentualbcoppropria']); ?>&nbsp;</td>
		<td><?php echo h($icm['Icm']['ufpgtoicmsst']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $icm['Icm']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $icm['Icm']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $icm['Icm']['id']), null, __('Are you sure you want to delete # %s?', $icm['Icm']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Icm'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modalidadebcs'), array('controller' => 'modalidadebcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modalidadebc'), array('controller' => 'modalidadebcs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modalidadebcsts'), array('controller' => 'modalidadebcsts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modalidadebcst'), array('controller' => 'modalidadebcsts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribicms'), array('controller' => 'situacaotribicms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribicm'), array('controller' => 'situacaotribicms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Motivodesoneracaos'), array('controller' => 'motivodesoneracaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motivodesoneracao'), array('controller' => 'motivodesoneracaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
