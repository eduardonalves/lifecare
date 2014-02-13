<div class="parceirodenegocios index">
	<h2><?php echo __('Parceirodenegocios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('cpf_cnpj'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('categoria'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parceirodenegocios as $parceirodenegocio): ?>
	<tr>
		<td><?php echo h($parceirodenegocio['Parceirodenegocio']['id']); ?>&nbsp;</td>
		<td><?php echo h($parceirodenegocio['Parceirodenegocio']['nome']); ?>&nbsp;</td>
		<td><?php echo h($parceirodenegocio['Parceirodenegocio']['cpf_cnpj']); ?>&nbsp;</td>
		<td><?php echo h($parceirodenegocio['Parceirodenegocio']['tipo']); ?>&nbsp;</td>
		<td><?php echo h($parceirodenegocio['Parceirodenegocio']['categoria']); ?>&nbsp;</td>
		<td><?php echo h($parceirodenegocio['Parceirodenegocio']['created']); ?>&nbsp;</td>
		<td><?php echo h($parceirodenegocio['Parceirodenegocio']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $parceirodenegocio['Parceirodenegocio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $parceirodenegocio['Parceirodenegocio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $parceirodenegocio['Parceirodenegocio']['id']), null, __('Are you sure you want to delete # %s?', $parceirodenegocio['Parceirodenegocio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Contatos'), array('controller' => 'contatos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contato'), array('controller' => 'contatos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enderecos'), array('controller' => 'enderecos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Endereco'), array('controller' => 'enderecos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saidas'), array('controller' => 'saidas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Saida'), array('controller' => 'saidas', 'action' => 'add')); ?> </li>
	</ul>
</div>
