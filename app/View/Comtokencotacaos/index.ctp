<div class="comtokencotacaos index">
	<h2><?php echo __('Comtokencotacaos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('comoperacao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comresposta_id'); ?></th>
			<th><?php echo $this->Paginator->sort('respondido'); ?></th>
			<th><?php echo $this->Paginator->sort('codigoseguranca'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comtokencotacaos as $comtokencotacao): ?>
	<tr>
		<td><?php echo h($comtokencotacao['Comtokencotacao']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comtokencotacao['Comoperacao']['id'], array('controller' => 'comoperacaos', 'action' => 'view', $comtokencotacao['Comoperacao']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($comtokencotacao['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $comtokencotacao['Parceirodenegocio']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($comtokencotacao['Comresposta']['id'], array('controller' => 'comrespostas', 'action' => 'view', $comtokencotacao['Comresposta']['id'])); ?>
		</td>
		<td><?php echo h($comtokencotacao['Comtokencotacao']['respondido']); ?>&nbsp;</td>
		<td><?php echo h($comtokencotacao['Comtokencotacao']['codigoseguranca']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comtokencotacao['Comtokencotacao']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comtokencotacao['Comtokencotacao']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comtokencotacao['Comtokencotacao']['id']), null, __('Are you sure you want to delete # %s?', $comtokencotacao['Comtokencotacao']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Comtokencotacao'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('controller' => 'comrespostas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comresposta'), array('controller' => 'comrespostas', 'action' => 'add')); ?> </li>
	</ul>
</div>
