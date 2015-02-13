<div class="comoperacaosParceirodenegocios index">
	<h2><?php echo __('Comoperacaos Parceirodenegocios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('comoperacao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comoperacaosParceirodenegocios as $comoperacaosParceirodenegocio): ?>
	<tr>
		<td><?php echo h($comoperacaosParceirodenegocio['ComoperacaosParceirodenegocio']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comoperacaosParceirodenegocio['Comoperacao']['id'], array('controller' => 'comoperacaos', 'action' => 'view', $comoperacaosParceirodenegocio['Comoperacao']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($comoperacaosParceirodenegocio['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $comoperacaosParceirodenegocio['Parceirodenegocio']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comoperacaosParceirodenegocio['ComoperacaosParceirodenegocio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comoperacaosParceirodenegocio['ComoperacaosParceirodenegocio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comoperacaosParceirodenegocio['ComoperacaosParceirodenegocio']['id']), null, __('Are you sure you want to delete # %s?', $comoperacaosParceirodenegocio['ComoperacaosParceirodenegocio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Comoperacaos Parceirodenegocio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
