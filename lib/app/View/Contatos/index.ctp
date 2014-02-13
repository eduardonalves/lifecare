<div class="contatos index">
	<h2><?php echo __('Contatos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone1'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone2'); ?></th>
			<th><?php echo $this->Paginator->sort('telfefone3'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('redesSociais1'); ?></th>
			<th><?php echo $this->Paginator->sort('redesSociais2'); ?></th>
			<th><?php echo $this->Paginator->sort('redesSociais3'); ?></th>
			<th><?php echo $this->Paginator->sort('redesSociais4'); ?></th>
			<th><?php echo $this->Paginator->sort('redesSociais5'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($contatos as $contato): ?>
	<tr>
		<td><?php echo h($contato['Contato']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($contato['Parceirodenegocio']['id'], array('controller' => 'parceirodenegocios', 'action' => 'view', $contato['Parceirodenegocio']['id'])); ?>
		</td>
		<td><?php echo h($contato['Contato']['nome']); ?>&nbsp;</td>
		<td><?php echo h($contato['Contato']['telefone1']); ?>&nbsp;</td>
		<td><?php echo h($contato['Contato']['telefone2']); ?>&nbsp;</td>
		<td><?php echo h($contato['Contato']['telfefone3']); ?>&nbsp;</td>
		<td><?php echo h($contato['Contato']['email']); ?>&nbsp;</td>
		<td><?php echo h($contato['Contato']['redesSociais1']); ?>&nbsp;</td>
		<td><?php echo h($contato['Contato']['redesSociais2']); ?>&nbsp;</td>
		<td><?php echo h($contato['Contato']['redesSociais3']); ?>&nbsp;</td>
		<td><?php echo h($contato['Contato']['redesSociais4']); ?>&nbsp;</td>
		<td><?php echo h($contato['Contato']['redesSociais5']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contato['Contato']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contato['Contato']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contato['Contato']['id']), null, __('Are you sure you want to delete # %s?', $contato['Contato']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Contato'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
